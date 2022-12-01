<?php echo $this->session->flashdata('msg'); ?>
    <section class='content'>
    <!-- admin -->
    
    <div class='row'>
        <div class='col-md-12'>
            <div class='box box-solid'>
                <div class='box-header with-border'>
                    <h3 class='box-title'><i class='fas fa-server side-menu-icon fa-fw'></i> Data Siswa</h3>
                    <div class='box-tools pull-right'>
                        <button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#upload'><i class='fas fa-upload'></i> Import Siswa</button>
                        <button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#tambahposko'><i class='fa fa-plus'></i> Input Siswa</button>
                    </div>
                </div><!-- /.box-header -->
                <div class="card-body table-responsive pengguna">
                    <table id='example1' class='table table-bordered table-striped '>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kabupaten</th>
                                <th>Nama Sekolah</th>
                                <th>Kelas</th>
                                <th>Nama Siswa</th>
                                <th>NISN</th>
                                <th>Atas Nama</th>
                                <th>No Rekening</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach($siswa as $row): ?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><?=$row['nama_kabupaten']?></td>
                                <td width="0%"><?=$row['nm_sekolah']?></td>
                                <td><?=$row['kelas']?></td>
                                <td><a data-toggle="modal" href="#buku<?=$row['id_siswa'];?>" style="font-style:bold;"><?=$row['nm_siswa']?></a></td>
                                <td><?=$row['nisn']?></td>
                                <td ><?=$row['atas_nama']?></td>
                                <td><?=$row['no_rek']?></td>
                                <td width="19%">

                                    <?php if($row['locks']  == 'Ylock' ): ?>
                                        <button class="btn btn-danger btn-block disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="Dikunci Ops">  <i class="bi bi-lock"></i> Kunci Ops</button>
                                        
                                    <?php elseif($row['locks'] == 'Nlock' ): ?>
                                        <a href="#lock<?=$row['id_siswa'];?>" data-toggle="modal" style="color:#fff;"> <button class="btn btn-flat btn-xs btn-primary">  <i class="fas fa-fw fa-unlock"></i> Lock</button></a>
                                        <a href="#edit<?=$row['id_siswa'];?>" data-toggle="modal" style="color:#fff;"> <button class="btn btn-flat btn-xs btn-warning">  <i class="fas fa-fw fa-edit"></i> Edit</button></a>
                                        <a href="#remove<?=$row['id_siswa'];?>" data-toggle="modal" style="color:#fff;"> <button class='btn btn-flat btn-xs btn-danger'> <i class="fas fa-fw fa-trash"></i> Hapus</button></a>
                                    <?php endif; ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>

        <!-- tambah posko -->
        <div class='modal fade' id='tambahposko' data-backdrop="static" role="dialog">>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header bg-blue'>
                        <button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
                        <h3 class='modal-title'>Input Siswa</h3>
                    </div>
                    <div class='modal-body'>
                    <form class="form" method="post" action="<?=site_url('add-inputan')?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Provinsi</label>
                                <select name="provinsi_id" class="form-control" id="provinsi">
                                    <option>- Select Provinsi -</option>
                                    <?php 
                                        foreach($provinsi as $prov)
                                        {
                                            echo '<option value="'.$prov->id_provinsi.'">'.$prov->nama.'</option>';
                                        }
                                    ?>
                                </select>
                                <input type="hidden" id="email-id-column" class="form-control" name="admin_input" value="<?=__session('fullname');?>" placeholder="ex. 201501015"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="last-name-column">Kabupaten</label>
                                <select name="kabupaten_id" class="form-control js-example-basic-single" style="width:100%;" id="kabupaten">
                                <option value=''>Select Kabupaten</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="city-column">Nama Sekolah</label>
                                <input type="text" id="city-column" class="form-control" placeholder="ex. SMK Negeri 1 Simpang Kanan" name="nm_sekolah"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="country-floating">Nama Siswa</label>
                                <input type="text" id="city-column" class="form-control" placeholder="ex. Dwi Satria" name="nm_siswa"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="company-column">Kelas</label>
                                <select name="kelas" id="first-name-column" class="form-control">
                                <option value="">-kelas-</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                                </select>
                                
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email-id-column">NISN</label>
                                <input type="number" id="email-id-column" class="form-control" name="nisn" placeholder="ex. 201501015"/>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email-id-column">Nama Bank</label>
                                <input type="text" id="email-id-column" class="form-control" name="nm_bank" placeholder="ex. Bank ACeh Syariah" />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email-id-column">Atas Nama <small><font color="red">*</font> Huruf Kapital</small></label>
                                <input type="text" id="email-id-column" class="form-control"   name="atas_nama" placeholder="ex. DWI SATRIA PANGESTU"/>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="company-column">No Rekening</label>
                                <input type="text" id="email-id-column" class="form-control" name="no_rek" placeholder="ex. 130**********"/>
                                
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="company-column">No Hp Siswa</label>
                                <input type="text" id="email-id-column" class="form-control"  value="08" name="no_hp" placeholder="ex. 08">
                                
                            </div>
                        </div>
                        

                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="email-id-column">Buku Rekening <small><font color="red">*</font> Max 2 Mb</small></label>
                                <input type="file" class="form-control" name="photo">
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end text-center">
                            <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                Simpan
                            </button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                Reset
                            </button>
                        </div>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- buku -->
        <?php foreach($siswa as $row): ?>
        <div class="modal fade" id="buku<?=$row['id_siswa']?>" data-backdrop="static" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h5><font ><?=$row['nm_bank'];?></font> <br> <?=$row['atas_nama'];?> <br> <?=$row['no_rek'];?></h5> <hr>
                        <img src="<?= site_url('./assets/images/buku/' . $row['photo_buku']) ?>" style="width: 450px;height:auto;" alt="">
                        <br>
                        <button data-dismiss="modal" class="btn btn-block btn-sm btn-danger" style="margin-top:10px;"><i class="fas fa-times"></i> Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <!-- hapus -->
        <?php foreach($siswa as $row): ?>
        <div class="modal fade" id="remove<?=$row['id_siswa']?>" data-backdrop="static" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body mt-4 text-center">
                        <h5>Apakah anda akan menghapus Pengguna <em><?=$row['nm_siswa']?></em> ?</h5>
                        <a href="<?=site_url('remove-inputan/'.$row['id_siswa'])?>" type="submit" name="submit" class="btn btn-block btn-primary me-1 mb-1">
                                Remove
                        </a> <br>
                        <button data-dismiss="modal" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Tidak</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>


        <!-- lock -->
        <?php foreach($siswa as $row): ?>
        <div class="modal fade" id="lock<?=$row['id_siswa'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form class="form" method="post" action="<?=site_url('lock-inputan')?>">
                            <div class="row">
                                <div class="col-md-12 col-12 text-center">
                                    <h5>Anda yakin ingin mengunci <br> Nama <?=$row['nm_siswa'];?> </h5>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <input type="hidden" id="email-id-column" class="form-control" name="id_siswa" value="<?=$row['id_siswa'];?>>"/>
                                        <input type="hidden" id="email-id-column" class="form-control" name="locks" value="Ylock"/>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" name="submit" class="btn btn-danger me-1 mb-1 btn-block">
                                    <i class="bi bi-lock"></i> Kunci
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->