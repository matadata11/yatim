<?php echo $this->session->flashdata('msg'); ?>
    <section class='content'>
        <div class="row">
            <div class="col-md-12">`
                <div class="box box-solid">
                    <div class="box-header whith-border">
                        <h3 class="box-title"><i class="fas fa-info side-menu-icon fa-fw"></i> Data Kabupaten</h3>
                        <div class="box-tools pill-right">
                            <button class="btn btn-sm btn-flat btn-success" data-toggle="modal" data-target="#tabahkab"><i class="fas fa-plus"></i> Kab/Kota</button>
                        </div>
                    </div>

                    <div class="card-body table-responsive pengguna">
                    <table id='example1' class='table table-bordered table-striped '>
                            <thead>
                                <tr>
                                    <th width='10px'>#</th>
                                    <th>ID Kabupaten</th>
                                    <th>Nama Kabupaten</th>
                                    <th>ID Provinsi</th>
                                    <th>Nama Provinsi </th>
                                    <th>Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($kabupaten as $row): ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td><?=$row['id_kabupaten']?></td>
                                    <td><?=$row['nama_kabupaten']?></td>
                                    <td><?=$row['provinsi_id']?></td>
                                    <td><?=$row['nama']?></td>

                                    <td class='text-center'  width='20%'>
                                    <a href="#editkab<?=$row['id_kabupaten']?>" data-toggle="modal" class='btn btn-flat btn-xs btn-warning'><i class="fas fa-fw fa-edit"></i> Ubah</a>

                                    <a href="#hapus<?=$row['id_kabupaten']?>" data-toggle="modal" class='btn btn-flat btn-xs btn-danger'><i class="fas fa-fw fa-trash "></i> Hapus</a>
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
                <h3 class='modal-title'>Tambah Kabupaten</h3>
            </div>
            <div class='modal-body'>
                <form method="post" action="<?=site_url('add-kab')?>">

                    <div class="form-group">
                        <label>ID Provinsi</label>
                        <select name="provinsi_id" class="form-control" id="provinsi_id">
                        <option value="">- pilih provinsi -</option>
                        <?php $no=1; foreach($wilayah as $row): ?>
                            <option value='<?=$row['id_provinsi']?>'><?=$row['nama']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nama Kabupaten</label>
                        <input type="text" class="form-control" name="nama_kabupaten"  placeholder="Nama Kabupaten" autocomplete="off">
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
<?php foreach($kabupaten as $row): ?>
    <div class='modal fade' id='editkab<?=$row['id_kabupaten']?>' data-backdrop="static" role="dialog">
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header bg-blue'>
                <button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
                <h3 class='modal-title'>Edit Kabupaten</h3>
            </div>
            <div class='modal-body'>
                <form method="post" action="<?=site_url('edit-kab')?>">

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id_kabupaten" value='<?=$row['id_kabupaten']?>' required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Kabupaten/Kota</label>
                        <input type="text" class="form-control" name="nama_kabupaten" required value='<?=$row['nama_kabupaten']?>' autocomplete="off">
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
<?php foreach($kabupaten as $row): ?>
    <div class="modal fade" id="hapus<?=$row['id_kabupaten']?>" data-backdrop="static" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body mt-4 text-center">
                    <h5>Apakah anda akan menghapus kab Teknis <em><?=$row['nama_kabupaten']?></em> ?</h5>
                    <a href="<?=site_url('hapus-kab/'.$row['id_kabupaten'])?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-check"></i> Ya, Hapus</a>
                    <button data-dismiss="modal" class="btn btn-sm btn-danger"><i class="fas fa-kabes"></i> Tidak</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end hapus -->