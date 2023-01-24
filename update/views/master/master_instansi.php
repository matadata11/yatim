
    <?php echo $this->session->flashdata('msg'); ?>
    <section class='content'>
    <!-- admin -->
    
    <div class='row'>
    
        <div class='col-md-12'>
        
            <div class='box box-solid'>
                <div class='box-header with-border'>
                    <h3 class='box-title'><i class='fas fa-build side-menu-icon fa-fw'></i> Instansi</h3>
                    <div class='box-tools pull-right'>
                        <!-- <button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#upload'><i class='fas fa-upload'></i> Import Pengguna</button> -->
                        <button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#tambahposko'><i class='fa fa-check'></i> Tambah Instansi</button>
                    </div>
                </div><!-- /.box-header -->
                <div class="card-body table-responsive pengguna">
                    <table id='example1' class='table table-bordered table-striped '>
                        <thead>
                            <tr>
                                <th width='5px'>#</th>
                                <th>Kab/Kota</th>
                                <th>Nama Instansi</th>
                                <th>Lat Kantor</th>
                                <th>Long Kantor</th>
                                <th>created_at</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php $no=1; foreach($instansi as $row): ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td><?=$row['nama_kabupaten']?></td>
                                    <td><?=$row['instansi']?></td>
                                    <td><?=$row['lat_kantor']?></td>
                                    <td><?=$row['long_kantor']?></td>
                                    <td><?=indo_date($row['created_at'])?></td>

                                    <td class='text-center'  width='10%'>
                                    <a href="#edit<?=$row['id_instansi']?>" data-toggle="modal" class='btn btn-flat btn-xs btn-warning'><i class="fas fa-fw fa-edit"></i></a>

                                    <a href="#hapus<?=$row['id_instansi']?>" data-toggle="modal" class='btn btn-flat btn-xs btn-danger'><i class="fas fa-fw fa-times "></i></a>
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
                        <h3 class='modal-title'>Tambah Instansi</h3>
                    </div>
                    <div class='modal-body'>
                    <form method="post" action="<?=site_url('add-instansi')?>">

                    <div class="form-group">
                                <label>Provinsi</label>
                                <select name="provinsi_id" class="form-control" id="provinsi">
                                <option>- Select Provinsi -</option>
                                <?php 
                                    foreach($provinsi as $prov)
                                    {
                                        echo '<option value="'.$prov->id_provinsi.'">'.$prov->nama.'</option>';
                                    }
                                ?>
                            </select>
                            </div>

                        <div class="form-group">
                            <label>Kabupaten</label>
                            <select name="kabupaten_id" class="form-control" id="kabupaten">
                                <option value=''>Select Kabupaten</option>
                            </select>
                        </div>

                        

                        <div class="form-group">
                            <label>Nama Instansi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="instansi" placeholder="Nama Instansi" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Lat Kantor <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="lat_kantor" placeholder="Latitude" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Long Kantor <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="long_kantor" placeholder="Longitude" autocomplete="off">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-check"></i> Simpan</button>
                            <button data-dismiss="modal" class="btn btn-danger"><i class="fas fa-times"></i> Tutup</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit posko -->
        <?php foreach($instansi as $row): ?>
        <div class="modal fade" id="edit<?=$row['id_instansi']?>" data-backdrop="static" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-blue">
                        <h5 class="modal-title">Edit Tim Teknis</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?=site_url('edit-instansi')?>">

                        <div class="form-group">
                            <label>Nama Instansi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="instansi" value="<?=$row['instansi']?>" placeholder="Nama Instansi" autocomplete="off">
                            <input type="hidden" class="form-control" name="id_instansi" value="<?=$row['id_instansi']?>" placeholder="Nama Instansi" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Lat Kantor <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="lat_kantor" value="<?=$row['lat_kantor']?>" placeholder="Latitude" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Long Kantor <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="long_kantor" value="<?=$row['long_kantor']?>" placeholder="Longitude" autocomplete="off">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-check"></i> Update</button>
                            <button data-dismiss="modal" class="btn btn-danger"><i class="fas fa-times"></i> Tutup</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <!-- Hapus posko -->
        <!-- Modal Hapus cabang -->
        <?php foreach($instansi as $row): ?>
        <div class="modal fade" id="hapus<?=$row['id_instansi']?>" data-backdrop="static" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body mt-4 text-center">
                        <h5>Apakah anda akan menghapus Instansi <em><?=$row['instansi']?></em> ?</h5>
                        <a href="<?=site_url('hapus-instansi/'.$row['id_instansi'])?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-check"></i> Ya, Hapus</a>
                        <button data-dismiss="modal" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Tidak</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
