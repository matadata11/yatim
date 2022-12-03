
    <?php echo $this->session->flashdata('msg'); ?>
    <section class='content'>
    <!-- admin -->
    
    <div class='row'>
    
        <div class='col-md-12'>
        
            <div class='box box-solid'>
                <div class='box-header with-border'>
                    <h3 class='box-title'><i class='fas fa-users side-menu-icon fa-fw'></i> Data User</h3>
                    <div class='box-tools pull-right'>
                        <!-- <button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#upload'><i class='fas fa-upload'></i> Import Pengguna</button> -->
                        <button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#tambahuser'><i class='fa fa-check'></i> Tambah User</button>
                    </div>
                </div><!-- /.box-header -->
                <div class="card-body table-responsive pengguna">
                    <table id='example1' class='table table-bordered table-striped '>
                        <thead>
                            <tr>
                                <th width='5px'>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Verifikasi</th>
                                <th>Tanggal</th>
                                <th>Updated_at</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($this->session->userdata('level') == 'Super') { ?>
                                <?php $no=1; foreach($user as $usr): ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td><?=$usr['fullname']?></td>
                                    <td><?=$usr['email']?></td>
                                    <td><?=$usr['level']?></td>
                                    <td>
                                    <?php
                                    if($usr['is_active'] == '1'){
                                        echo "<botton class='btn btn-xs btn-primary'>Verifikasi</botton>";
                                    }elseif($usr['is_active'] == '0'){
                                        echo "<botton class='btn btn-xs btn-danger'>Tidak Aktif</botton>";
                                    }
                                    ?></td>
                                    <td><?=$usr['created_at']?></td>
                                    <td><?=$usr['ubah']?></td>
                                    <td class='text-center'>
                                    <a href="#edit<?=$usr['id_admin']?>" data-toggle="modal" class='btn btn-flat btn-xs btn-warning'><i class="fas fa-fw fa-edit"></i></a>

                                    <a href="#hapus<?=$usr['id_admin']?>" data-toggle="modal" class='btn btn-flat btn-xs btn-danger'><i class="fas fa-fw fa-times "></i></a>
                                    </td>
                                    
                                </tr>
                                <?php endforeach; ?>
                            <?php } ?>

                            <?php if ($this->session->userdata('level') == 'Admin') { ?>
                                <?php $no=1; foreach($user_admin as $usr): ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td><?=$usr['fullname']?></td>
                                    <td><?=$usr['email']?></td>
                                    <td><?=$usr['level']?></td>
                                    <td>
                                    <?php
                                    if($usr['is_active'] == '1'){
                                        echo "<botton class='btn btn-xs btn-primary'>Verifikasi</botton>";
                                    }elseif($usr['is_active'] == '0'){
                                        echo "<botton class='btn btn-xs btn-danger'>Tidak Aktif</botton>";
                                    }
                                    ?></td>
                                    <td><?=$usr['created_at']?></td>
                                    <td><?=$usr['ubah']?></td>
                                    <td class='text-center'>
                                    <a href="#edit<?=$usr['id_admin']?>" data-toggle="modal" class='btn btn-flat btn-xs btn-warning'><i class="fas fa-fw fa-edit"></i></a>

                                    <a href="#hapus<?=$usr['id_admin']?>" data-toggle="modal" class='btn btn-flat btn-xs btn-danger'><i class="fas fa-fw fa-times "></i></a>
                                    </td>
                                    
                                </tr>
                                <?php endforeach; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>

        <!-- tambah User -->
        <?php if ($this->session->userdata('level') == 'Super') { ?>
        <div class='modal fade' id='tambahuser' data-backdrop="static" role="dialog">>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header bg-blue'>
                        <button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
                        <h3 class='modal-title'>Tambah Pengguna</h3>
                    </div>
                    <div class='modal-body'>
                        <form action='<?=site_url('add-user')?>' method='post'>
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select name="provinsi_id" class="form-control js-example-basic-single" style="width:100%;" id="provinsi">
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
                                <select name="kabupaten_id" class="form-control js-example-basic-single" style="width:100%;" id="kabupaten">
                                <option value=''>Select Kabupaten</option>
                            </select>
                            </div>

                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Instansi <span class="text-danger">*</span></label>
                                <select name="instansi_id" class="form-control js-example-basic-single" style="width:100%;" id="instansi">
                                    <option>Select Instansi</option>
                                </select>
                            </div>

                            <div class='form-group'>
                                <label>Nama</label>
                                <input type='hidden' name='admin' class='form-control' value="<?=__session('fullname');?>" required='true' autocomplete="off"/>

                                <input type='text' name='fullname' class='form-control' placeholder="ex. Dwi Satria Pangestu, A.Md.Kom" required='true' autocomplete="off"/>
                            </div>


                            <div class='form-group'>
                                <label>NIP</label>
                                <input type='text' name='nip' class='form-control' placeholder="ex. 19960311 ****** * ***" required='true' autocomplete="off"/>
                            </div>

                            <div class='form-group'>
                                <label>Jabatan</label>
                                <input type='text' name='jabatan' class='form-control' placeholder="ex. Staff IT" required='true' autocomplete="off"/>
                            </div>

                            <div class='form-group'>
                                <label>Email <small class="text-red">Email Aktif</small></label>
                                <input type='text' name='email' class='form-control' required='true' placeholder="ex. admin@admin.com" autocomplete="off" />
                            </div>

                            <div class='form-group'>
                                <label>Password</label>
                                <input type='password' name='password' class='form-control' required='true' placeholder="ex. ********" autocomplete="off"/>
                            </div>

                            <div class='form-group'>
                                <label>Ulangi Password</label>
                                <input type='password' name='password2' class='form-control' required='true' placeholder="ex. ********" autocomplete="off" />
                            </div>

                            <div class='form-group'>
                                <label>Level</label>
                                <select name="level" id="level" class="form-control">
                                    <option value="">-pilih-</option>
                                    <option value="Super">Super</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>

                            <div class='modal-footer'>
                                <div class='box-tools pull-right '>
                                    <button type='submit' name='submit' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Simpan</button>
                                    <button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if ($this->session->userdata('level') == 'Admin') { ?>
        <div class='modal fade' id='tambahuser' data-backdrop="static" role="dialog">>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header bg-blue'>
                        <button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
                        <h3 class='modal-title'>Tambah Pengguna</h3>
                    </div>
                    <div class='modal-body'>
                        <form action='<?=site_url('add-user')?>' method='post'>
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select name="provinsi_id"  class="form-control js-example-basic-single" style="width:100%;" id="provinsi">
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
                                <select name="kabupaten_id"  class="form-control js-example-basic-single" style="width:100%;" id="kabupaten">
                                <option value=''>Select Kabupaten</option>
                            </select>
                            </div>

                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Instansi <span class="text-danger">*</span></label>
                                <select name="instansi_id"  class="form-control js-example-basic-single" style="width:100%;" id="instansi">
                                    <option>Select Instansi</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Sekolah <span class="text-danger">*</span></label>
                                <input type="text" name="sekolah" class="form-control" placeholder="ex. SMK Negeri 1 Simpang Kanan" required='true' autocomplete="off"/>
                            </div>

                            <div class='form-group'>
                                <label>Nama</label>
                                <input type='hidden' name='admin' class='form-control' value="<?=__session('fullname');?>" required='true' autocomplete="off"/>

                                <input type='text' name='fullname' class='form-control' placeholder="ex. Dwi Satria Pangestu, A.Md.Kom" required='true' autocomplete="off"/>
                            </div>


                            <div class='form-group'>
                                <label>NIP</label>
                                <input type='text' name='nip' class='form-control' placeholder="ex. 19960311 ****** * ***" required='true' autocomplete="off"/>
                            </div>

                            <div class='form-group'>
                                <label>Jabatan</label>
                                <input type='text' name='jabatan' class='form-control' value="Op Sekolah" readonly autocomplete="off"/>
                            </div>

                            <div class='form-group'>
                                <label>Email <small class="text-red">Email Aktif</small></label>
                                <input type='text' name='email' class='form-control' required='true' placeholder="ex. admin@admin.com" autocomplete="off" />
                            </div>

                            <div class='form-group'>
                                <label>Password</label>
                                <input type='password' name='password' class='form-control' required='true' placeholder="ex. ********" autocomplete="off"/>
                            </div>

                            <div class='form-group'>
                                <label>Ulangi Password</label>
                                <input type='password' name='password2' class='form-control' required='true' placeholder="ex. ********" autocomplete="off" />
                            </div>

                            <div class='form-group'>
                                <!-- <label>Level</label> -->
                                <input type='hidden' name='level' class='form-control' required='true' value="Ops" autocomplete="off" />
                            </div>

                            <div class='modal-footer'>
                                <div class='box-tools pull-right '>
                                    <button type='submit' name='submit' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Simpan</button>
                                    <button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <!-- Modal Edit User -->
        <?php foreach($user as $usr): ?>
        <div class="modal fade" id="edit<?=$usr['id_admin']?>" data-backdrop="static" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Pengguna</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?=site_url('edit-user')?>">

                            <div class="form-group">
                                <!-- <label>ID Code</label> -->
                                <input type="hidden" class="form-control" name="id_admin" value="<?=$usr['id_admin']?>" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>nama</label>
                                <input type="text" class="form-control" name="fullname" value="<?=$usr['fullname']?>" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" class="form-control" name="nip" value="<?=$usr['nip']?>" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" value="<?=$usr['jabatan']?>" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>Email <small class="text-red">Email tidak bisa diganti</small></label>
                                <input type="text" class="form-control" name="email" value="<?=$usr['email']?>" autocomplete="off" readonly>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>Ulangi Password</label>
                                <input type="password" class="form-control" name="password2" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>Level</label>
                                <select name="level" id="level" class="form-control" value="<?=$usr['level'];?>">
                                    <option value="<?=$usr['level']?>"><?=$usr['level']?></option>pt
                                    <option value="Super">Super</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Adc">Adc</option>
                                    <option value="Penjab">Penjab</option>
                                    <option value="HD">HD</option>
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

        <!-- Hapus User -->
        <!-- Modal Hapus cabang -->
        <?php foreach($user as $usr): ?>
        <div class="modal fade" id="hapus<?=$usr['id_admin']?>" data-backdrop="static" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body mt-4 text-center">
                        <h5>Apakah anda akan menghapus Pengguna <em><?=$usr['fullname']?></em> ?</h5>
                        <a href="<?=site_url('hapus-user/'.$usr['id_admin'])?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-check"></i> Ya, Hapus</a>
                        <button data-dismiss="modal" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Tidak</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <div class="modal fade" id="upload" data-backdrop="static" role="dialog">
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header bg-blue'>
                        <button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
                        <h3 class='modal-title'>Upload Pengguna</h3>
                    </div>
                    <div class='modal-body'>
                        
                        <form action='<?=site_url('pages/import')?>' method='post'>

                        <div class="form-grup">
                        <a href="<?php echo base_url("excel/format.xlsx"); ?>" class="btn btn-xs btn-primary ">Download Format</a>
                        </div>

                        <div class='form-group'>
                                <label>Pilih File Exel</label>
                                <input type='file' name='file' class='form-control' placeholder="ex. ex. 0000000000" required='true' autofocus="true" autocomplete="off"/>
                            </div>

                            <div class='modal-footer'>
                                <div class='box-tools pull-right '>
                                    <button type='submit' name='submit' class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Simpan</button>
                                    <button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
