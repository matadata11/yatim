
    <?php echo $this->session->flashdata('msg'); ?>
    <section class='content'>
    <!-- admin -->
    
    <div class='row'>
    
        <div class='col-md-12'>
        
            <div class='box box-solid'>
                <div class='box-header with-border'>
                    <h3 class='box-title'><i class='fas fa-phone side-menu-icon fa-fw'></i> Kontak Tim Tenis</h3>
                    <div class='box-tools pull-right'>
                        <!-- <button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#upload'><i class='fas fa-upload'></i> Import Pengguna</button> -->
                        <button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#tambahposko'><i class='fa fa-check'></i> Tambah Tim Pusat</button>
                    </div>
                </div><!-- /.box-header -->
                <div class="card-body table-responsive pengguna">
                    <table id='example1' class='table table-bordered table-striped '>
                        <thead>
                            <tr>
                                <th width='5px'>#</th>
                                <th>Nama Wilayah</th>
                                <th>Nama</th>
                                <th>Telpon</th>
                                <th>Keterangan</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php $no=1; foreach($posko as $tim): ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td><?=$tim['nama_wilayah']?></td>
                                    <td><?=$tim['nama']?></td>
                                    <td><?=$tim['telpon']?></td>
                                    <td><?=$tim['keterangan']?></td>
                                    <td><?=$tim['email']?></td>

                                    <td class="text-center"><?php
                                    if($tim['status'] == 'Pusat'){
                                        echo "<botton class='btn btn-xs btn-primary'>Pusat</botton>";
                                    }elseif($tim['status'] == 'Cabang'){
                                        echo "<botton class='btn btn-xs btn-warning'>Cabang</botton>";
                                    }elseif($tim['status'] == 'Kab'){
                                        echo "<botton class='btn btn-xs btn-success'>Kab/Kota</botton>";
                                    }
                                    ?></td>

                                    <td class='text-center'  width='10%'>
                                    <a href="#edit<?=$tim['id_posko']?>" data-toggle="modal" class='btn btn-flat btn-xs btn-warning'><i class="fas fa-fw fa-edit"></i></a>

                                    <a href="#hapus<?=$tim['id_posko']?>" data-toggle="modal" class='btn btn-flat btn-xs btn-danger'><i class="fas fa-fw fa-times "></i></a>
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
                        <h3 class='modal-title'>Tambah Tim Teknis</h3>
                    </div>
                    <div class='modal-body'>
                    <form method="post" action="<?=site_url('add-posko')?>">

                        <div class="form-group">
                            <label>Nama Wilayah</label>
                            <input type="text" class="form-control" name="nama_wilayah"  required placeholder="ex. Nama Wilayah" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" required placeholder="ex. Anonim" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Telpon</label>
                            <input type="number" class="form-control" name="telpon" required placeholder="ex. 0821*******" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" required placeholder="ex. Kordinator Teknis"  autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Email <small class="text-red">Email Aktif</small></label>
                            <input type="text" class="form-control" name="email" required placeholder="ex. admin@admin.com"  autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Status Kerja</label>
                            <select name="status" id="status" class="form-control" required >
                                <option value="">-pilih-</option>
                                <option value="Pusat">Pusat</option>
                                <option value="Cabang">Cabang</option>
                                <option value="Kab">Kab</option>
                            </select>
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
        <?php foreach($posko as $tim): ?>
        <div class="modal fade" id="edit<?=$tim['id_posko']?>" data-backdrop="static" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-blue">
                        <h5 class="modal-title">Edit Tim Teknis</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?=site_url('edit-posko')?>">

                            <div class="form-group">
                                <input type="hidden" name="id_posko" value="<?=$tim['id_posko']?>" autocomplete="off">
                            </div>

                            <div class="form-group">
                            <label>Nama Wilayah</label>
                            <input type="text" class="form-control" name="nama_wilayah" value="<?=$tim['nama_wilayah'];?>" required placeholder="ex. Nama Wilayah" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?=$tim['nama'];?>" required placeholder="ex. Anonim" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Telpon</label>
                            <input type="number" class="form-control" name="telpon" value="<?=$tim['telpon'];?>" required placeholder="ex. 0821*******" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" value="<?=$tim['keterangan'];?>" required placeholder="ex. Kordinator Teknis"  autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Email <small class="text-red">Email Aktif</small></label>
                            <input type="text" class="form-control" name="email" value="<?=$tim['email'];?>" required placeholder="ex. admin@admin.com"  autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Status Kerja</label>
                            <select name="status" id="status" class="form-control" required >
                                <option value="<?=$tim['status'];?>"><?=$tim['status'];?></option>
                                <option value="Pusat">Pusat</option>
                                <option value="Cabang">Cabang</option>
                                <option value="Kab">Kab</option>
                            </select>
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
        <?php foreach($posko as $tim): ?>
        <div class="modal fade" id="hapus<?=$tim['id_posko']?>" data-backdrop="static" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body mt-4 text-center">
                        <h5>Apakah anda akan menghapus Tim Teknis <em><?=$tim['nama']?></em> ?</h5>
                        <a href="<?=site_url('hapus-posko/'.$tim['id_posko'])?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-check"></i> Ya, Hapus</a>
                        <button data-dismiss="modal" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Tidak</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
