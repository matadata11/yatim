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
                        <!-- <button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#tambahuser'><i class='fa fa-check'></i> Tambah User</button> -->
                    </div>
                </div><!-- /.box-header -->
                <div class='box-body'>
                    <table id='example1' class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                                <th width='5px'>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Verifikasi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                        echo "<botton class='btn btn-xs btn-danger'>Belum Verifikasi</botton>";
                                    }
                                    ?></td>
                                    <td><?=$usr['created_at']?></td>
                                    <td class='text-center'>
                                    <a href="#edit<?=$usr['id_admin']?>" data-toggle="modal" class='btn btn-flat btn-xs btn-warning'><i class="fas fa-fw fa-edit"></i></a>

                                    <!-- <a href="#hapus<?=$usr['id_admin']?>" data-toggle="modal" class='btn btn-flat btn-xs btn-danger'><i class="fas fa-fw fa-times "></i></a> -->
                                    </td>
                                    
                                </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</div>

<!-- Modal Edit User -->
<?php foreach($user as $usr): ?>
        <div class="modal fade" id="edit<?=$usr['id_admin']?>" data-backdrop="static" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Pengguna</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?=site_url('edit-akun')?>">

                            <div class="form-group">
                                <!-- <label>ID Code</label> -->
                                <input type="hidden" class="form-control" name="id_admin" value="<?=$usr['id_admin']?>" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>nama</label>
                                <input type="text" class="form-control" name="fullname" value="<?=$usr['fullname']?>" autocomplete="off" readonly>
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
                                <!-- <label>Level</label> -->
                                <input type="hidden" class="form-control" name="level" value="<?=$usr['level'];?>" required autocomplete="off">
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