<?php echo $this->session->flashdata('msg'); ?>
    <section class='content'>
        <div class="row">
            <div class="col-md-12">`
                <div class="box box-solid">
                    <div class="box-header whith-border">
                        <h3 class="box-title"><i class="fas fa-info side-menu-icon fa-fw"></i> Data Provinsi</h3>
                        <div class="box-tools pill-right">
                            <button class="btn btn-sm btn-flat btn-success" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i> Provinsi</button>
                        </div>
                    </div>

                    <div class="card-body table-responsive pengguna">
                    <table id='example1' class='table table-bordered table-striped '>
                            <thead>
                                <tr>
                                <th width='5px' class='text-center'>#</th>
                                    <th>ID Provinsi</th>
                                    <th>Nama Provinsi</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($wilayah as $row): ?>
                                <tr>
                                    <td class='text-center'><?=$no++;?></td>
                                    <td><?=$row['id_provinsi']?></td>
                                    <td><?=$row['nama']?></td>

                                    <td class='text-center'  width='20%'>
                                    <a href="#editkab<?=$row['id_provinsi']?>" data-toggle="modal" class='btn btn-flat btn-xs btn-warning'><i class="fas fa-fw fa-edit"></i> Ubah</a>

                                    <a href="#hapus<?=$row['id_provinsi']?>" data-toggle="modal" class='btn btn-flat btn-xs btn-danger'><i class="fas fa-fw fa-trash "></i> Hapus</a>
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
<div class='modal fade' id='add' data-backdrop="static" role="dialog">
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header bg-blue'>
                <button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
                <h3 class='modal-title'>Tambah Provinsi</h3>
            </div>
            <div class='modal-body'>
                <form method="post" action="<?=site_url('add-provinsi')?>">

                    <div class="form-group">
                        <label>Nama Provinsi</label>
                        <input type="text" class="form-control" name="nama" value="<?=set_value('nama_prov')?>" placeholder="Nama Provinsi" autocomplete="off">
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

<!-- modal edit -->
<?php $no=1; foreach($wilayah as $row): ?>
    <div class='modal fade' id='editkab<?=$row['id_provinsi']?>' data-backdrop="static" role="dialog">
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header bg-blue'>
                <button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
                <h3 class='modal-title'>Edit Provinsi</h3>
            </div>
            <div class='modal-body'>
                <form method="post" action="<?=site_url('edit-provinsi')?>">

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id_provinsi" value='<?=$row['id_provinsi']?>' required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text" class="form-control" name="nama" required value='<?=$row['nama']?>' autocomplete="off">
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-check"></i> Update</button>
                        <button data-dismiss="modal" class="btn btn-danger"><i class="fas fa-kabes"></i> Cloce</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- end edit -->

<!-- modal hapus -->
<?php foreach($wilayah as $row): ?>
    <div class="modal fade" id="hapus<?=$row['id_provinsi']?>" data-backdrop="static" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body mt-4 text-center">
                    <h5>Apakah anda akan menghapus Provinsi <em><?=$row['nama']?></em> ?</h5>
                    <a href="<?=site_url('hapus-provinsi/'.$row['id_provinsi'])?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-check"></i> Ya, Hapus</a>
                    <button data-dismiss="modal" class="btn btn-sm btn-danger"><i class="fas fa-kabes"></i> Tidak</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end hapus -->