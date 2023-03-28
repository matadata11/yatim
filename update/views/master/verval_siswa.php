
    <?php echo $this->session->flashdata('msg'); ?>
    <section class='content'>
    <!-- admin -->
    <div class='row'>
        <form class="form form-vertical" method="post" action="<?php echo base_url('cari-siswa') ?>">
            <div class='col-md-4'>
                <div class='box box-solid'>
                    <div class='box-header with-border'>
                        <h3 class='box-title'> Verifikasi dan Validasi</h3>
                        <div class='box-tools pull-right'>
                            <button type='submit'  class='btn btn-sm btn-flat btn-success'><i class='fa fa-search'></i> Cari Data</button>
                            <a href='verval_inputan' class='btn btn-sm bg-maroon'><i class='fa fa-times'></i></a>
                        </div>
                    </div><!-- /.box-header -->
                    <div class='box-body'>
                        <div class='col-sm-12'>
                            <div class='form-group'>
                                <label for="first-name-vertical">NISN</label>
                                <input type="text" id="first-name-vertical" class="form-control" name="nisn" autocomplete="off" placeholder="ex. 201501015" />
                            </div>
                        </div>
                        <div class='col-sm-12'>
                            <div class='form-group'>
                                <label for="email-id-vertical">Atas nama</label>
                                <input type="text" id="email-id-vertical" class="form-control" name="atas_nama" autocomplete="off" placeholder="ex. ANONIM" />
                            </div>
                        </div>
                        <div class='col-sm-12'>
                            <div class='form-group'>
                                <label for="contact-info-vertical">No Rekening</label>
                                <input type="number" id="contact-info-vertical" class="form-control" name="no_rek" autocomplete="off" placeholder="ex. 130********" />
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="col-12">
                            <div class="form-group">
                                <!-- <button type="submit" class="btn btn-block btn-primary me-1 mb-1" >
                                    <i class="bi bi-search"></i> Verifikasi
                                </button> <br> -->
                                <button type="reset" class="btn btn-block btn-warning me-1 mb-1" >
                                    Reset
                                </button>
                            </div>
                        </div>
                    </div><!-- /.box -->
                </div>
            </div>
        </form>
        <div class='col-md-8'>
            <div class='box box-solid'>
                <div class='box-header with-border'>
                    <h3 class='box-title'> Data Siswa</h3>
                    <p style="color:#000;">Data yang sudah di <b style="color:red;">kunci</b> oleh <b style="color:green;">Ops</b></p>
                </div><!-- /.box-header -->
                <div class='box-body'>
                    <div class='table-responsive'>
                        <table id='example1' class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th>Nisn</th>
                                    <th>Atas Nama</th>
                                    <th>No Rek</th>
                                    <th>Nama Bank</th>
                                    <th>Kab</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($siswa as $row): ?>
                                    <tr>
                                        <td><a data-toggle="modal" href="#buku<?=$row['id_siswa'];?>" style="font-style:bold;"><?=$row['nm_siswa']?></a></td>
                                        <td><?=$row['nisn']?></td>
                                        <td><?=$row['atas_nama']?></td>
                                        <td><?=$row['no_rek']?></td>
                                        <td><?=$row['nm_bank']?></td>
                                        <td><?=$row['nama_kabupaten']?></td>
                                        <td><?=$row['status']?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- buku -->
<?php foreach($siswa as $row): ?>
<div class="modal fade" id="buku<?=$row['id_siswa'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h5><font style="text-transform: uppercase;"><?=$row['nm_bank'];?></font> <br> <?=$row['atas_nama'];?> <br> <?=$row['no_rek'];?></h5> <hr>
            <img src="<?= site_url('./assets/images/buku/' . $row['photo_buku']) ?>" style="width: 450px;height:auto;" alt="">
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
