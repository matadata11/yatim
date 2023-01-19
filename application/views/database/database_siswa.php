<?php echo $this->session->flashdata('msg'); ?>
    <section class='content'>
        <div class="row">
            <div class="col-md-12">`
                <div class="box box-solid">
                    <div class="box-header whith-border">
                        <h3 class="box-title"><i class="fas fa-database side-menu-icon fa-fw"></i> Database Siswa</h3>
                        <div class="box-tools pill-right">
                            <button class="btn btn-sm btn-flat btn-success" data-toggle="modal" data-target="#importdb"><i class="fas fa-download"></i> Import</button>
                            <!-- <button class="btn btn-sm btn-flat btn-success" data-toggle="modal" data-target="#tabahkab"><i class="fas fa-plus"></i> Tambah</button> -->
                        </div>
                    </div>

                    <div class="card-body table-responsive pengguna">
                    <table id='example1' class='table table-bordered table-striped '>
                            <thead>
                                <tr>
                                    <th width='10px'>#</th>
                                    <th>NAMA</th>
                                    <th>NISN </th>
                                    <th>NAMA SEKOLAH </th>
                                    <th>NAMA BANK </th>
                                    <th>ATAS NAMA </th>
                                    <th>NO REKENING </th>
                                    <th>KELAS </th>
                                    <th>NO HP </th>
                                    <th>Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($dbsiswa as $row): ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td><?=$row['nama']?></td>
                                    <td><?=$row['nisn']?></td>
                                    <td><?=$row['sekolah']?></td>
                                    <td><?=$row['bank']?></td>
                                    <td><?=$row['atasnama']?></td>
                                    <td><?=$row['no_rek']?></td>
                                    <td><?=$row['kelas']?></td>
                                    <td><?=$row['hp']?></td>

                                    <td class='text-center'  width='10%'>
                                    <a href="#edit<?=$row['id_db']?>" data-toggle="modal" class='btn btn-flat btn-xs btn-warning'><i class="fas fa-fw fa-edit "></i> Edit</a>

                                    <a href="#hapus<?=$row['id_db']?>" data-toggle="modal" class='btn btn-flat btn-xs btn-danger'><i class="fas fa-fw fa-trash "></i> Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- modal tambah -->
<div class='modal fade' id='tabahkab' data-backdrop="static" role="dialog">
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header bg-blue'>
                <button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
                <h3 class='modal-title'>Tambah Berkas</h3>
            </div>
            <div class='modal-body'>
                <form method="post" action="<?=site_url('add-berkas')?>" enctype="multipart/form-data">

                    <div class="form-group" style="margin-top:-20px;">
                        <!-- <label>Nama Pengirim</label> -->
                        <input type="hidden" class="form-control" name="admin"  value="<?= $this->session->userdata('fullname'); ?>" required readonly autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>File Pdf</label>
                        <input type="file" class="form-control" name="berkas">
                    </div>
                    
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="tentang" id="tentang" class="form-control" cols="10" rows="2"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Tipe</label>
                        <select name="type" id="type" class="form-control">
                            <option value="">Pilih:</option>
                            <option value="Internal">Internal</option>
                            <option value="External">External</option>
                        </select>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-check"></i> Submit</button>
                        <button data-dismiss="modal" class="btn btn-danger"><i class="fas fa-kabes"></i> Cloce</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end -->


<!-- Import Data Menggunakan Excel -->
<div class='modal fade' id='importdb' data-backdrop="static" role="dialog">>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class="modal-header">
                        <h5 class="modal-title">Import Dbsiswa</h5>
                    </div>
                    <div class="modal-body">
                        <div class="my-2">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-center">Silahkan download template data berikut</p>
                                    <a href="<?= site_url('assets/excel/dbsiswa/inport_dbsiswa.xlsx') ?>" download class="btn btn-block btn-primary"><i class="fas fa-download"></i> Download Format</a><br>
                                </div>
                            </div>
                        </div>
                        <form method="post" action="<?= site_url('import-dbsiswa') ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Pilih File Excel</label>
                                <!-- <input type="hidden" class="form-control" name="admin_id" value="<?= $this->session->userdata('id_admin'); ?>">
                                <input type="hidden" class="form-control" name="admin_input" value="<?= $this->session->userdata('fullname'); ?>"> -->
                                <input type="file" class="form-control" name="dataexcel">
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-check"></i> Import</button>
                                <button data-dismiss="modal" class="btn btn-danger"><i class="fas fa-times"></i> Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


<!-- modal hapus -->
<?php foreach($dbsiswa as $row): ?>
    <div class="modal fade" id="hapus<?=$row['id_db']?>" data-backdrop="static" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body mt-4 text-center">
                    <h5>Apakah anda akan menghapus SISWA <em><?=$row['nama']?></em> ?</h5>
                    <a href="<?=site_url('hapus_db/'.$row['id_db'])?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-check"></i> Ya, Hapus</a>
                    <button data-dismiss="modal" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Tidak</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end hapus -->