
    <?php echo $this->session->flashdata('msg'); ?>
    <section class='content'>
    <!-- admin -->
    <div class='row'>
        <form action='<?= site_url('add-pengumuman');?>' method='post'>
            <div class='col-md-6'>
                <div class='box box-solid'>
                    <div class='box-header with-border'>
                        <h3 class='box-title'> Tulis Pengumuman</h3>
                        <div class='box-tools pull-right'>
                            <button type='submit' name='submit' class='btn btn-sm btn-flat btn-success'><i class='fa fa-edit'></i> Simpan</button>
                            <a href='pengumuman' class='btn btn-sm bg-maroon'><i class='fa fa-times'></i></a>
                        </div>
                    </div><!-- /.box-header -->
                    <div class='box-body'>
                        <div class='col-sm-12'>
                            <div class='form-group'>
                                <label>Judul </label>
                                <input type='hidden' class='form-control' name='pengumuman' value='<?=__session('fullname');?>' autocomplete="off" required>
                                <input type='text' class='form-control' name='judul' placeholder='Judul' autocomplete="off" required>
                            </div>
                        </div>
                        <div class='col-sm-12'>
                            <div class='form-group'>
                                <label>Jenis Pengumuman </label><br>
                                <input type='radio' name='type' value='internal' checked> <span class='text-green'><b>Internal</b></span> &nbsp; &nbsp;&nbsp;<input type='radio' name='type' value='eksternal'> <span class='text-blue'><b>Eksternal</b></span>
                            </div>
                        </div>
                        <div class='col-sm-12'>
                            <div class='form-group'>
                                <label>Informasi Pengumuman </label>
                                <textarea id='txtpengumuman' name='text' class='form-control'></textarea>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
        </form>
        <div class='col-md-6'>
            <div class='box box-solid'>
                <div class='box-header with-border'>
                    <h3 class='box-title'> Pengumuman</h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
                    <div class='table-responsive'>
                        <table id='example1' class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th width='5px'></th>
                                    <th>Pengumuman</th>
                                    <th>Untuk</th>
                                    <th width='60px'>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($pengumuman as $umum): ?>
                                    <tr>
                                        <td><?=$no++;?></td>
                                        <td><?=$umum['judul']?></td>
                                        <td>
                                        <?php
                                        if($umum['type'] == 'eksternal'){
                                            echo "<botton class='btn btn-xs btn-primary'>Sekolah</botton>";
                                        }elseif($umum['type'] == 'internal'){
                                            echo "<botton class='btn btn-xs btn-success'>Cabang</botton>";
                                        }
                                        ?>
                                        </td>
                                        <td align='center'>
                                            <div class=''>
                                                <a href="#hapus<?=$umum['id_pengumuman']?>" data-toggle='modal'><button class='btn bg-maroon btn-flat btn-xs'><i class='fa fa-trash'></i></button></a>
                                            </div>
                                        </td>
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


<?php foreach($pengumuman as $umum): ?>
<div class="modal fade" id="hapus<?=$umum['id_pengumuman']?>" data-backdrop="static" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body mt-4 text-center">
                <h5>Apakah anda akan menghapus Pengumuman <em><?=$umum['judul']?></em> ?</h5>
                <a href="<?=site_url('hapus-pengumuman/'.$umum['id_pengumuman'])?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-check"></i> Ya, Hapus</a>
                <button data-dismiss="modal" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Tidak</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

