<?php echo $this->session->flashdata('msg'); ?>
    <section class='content'>
        <div class="row">
            <div class="col-md-12">`
                <div class="box box-solid">
                    <div class="box-header whith-border">
                        <h3 class="box-title"><i class="fas fa-file-pdf side-menu-icon fa-fw"></i> Berkas</h3>
                        <div class="box-tools pill-right">
                            <button class="btn btn-sm btn-flat btn-success" data-toggle="modal" data-target="#tabahkab"><i class="fas fa-plus"></i> Berkas</button>
                        </div>
                    </div>

                    <div class="card-body table-responsive pengguna">
                    <table id='example1' class='table table-bordered table-striped '>
                            <thead>
                                <tr>
                                    <th width='10px'>#</th>
                                    <th>Berkas</th>
                                    <th>Tentang </th>
                                    <th>Tanggal </th>
                                    <th>Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($berkas as $row): ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td><a href="<?php echo base_url('./assets/berkas/'.$row['berkas']) ?>"> <?=$row['berkas']?></a></td>
                                    <td><?=$row['tentang']?></td>
                                    <td><?=$row['created_at']?></td>

                                    <td class='text-center'  width='10%'>
                                    <a href="#hapus<?=$row['id_berkas']?>" data-toggle="modal" class='btn btn-flat btn-xs btn-danger'><i class="fas fa-fw fa-trash "></i> Hapus</a>
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

<!-- modal hapus -->
<?php foreach($berkas as $row): ?>
    <div class="modal fade" id="hapus<?=$row['id_berkas']?>" data-backdrop="static" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body mt-4 text-center">
                    <h5>Apakah anda akan menghapus Berkas <em><?=$row['tentang']?></em> ?</h5>
                    <a href="<?=site_url('hapus-berkas/'.$row['id_berkas'])?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-check"></i> Ya, Hapus</a>
                    <button data-dismiss="modal" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Tidak</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end hapus -->