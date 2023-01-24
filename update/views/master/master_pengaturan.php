
    <?php echo $this->session->flashdata('msg'); ?>
    <section class='content'>
    <!-- admin -->
    
    <div class='row'>
    
    <div class='col-md-12'>
		<div class="box box-solid">
			<!-- Add the bg color to the header using any of the bg-* classes -->
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fas fa-tools fa-2x fa-fw"></i> Pengaturan</h3>
			</div>
			<div class="box-body no-padding ">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Pengaturan Umum</a></li>
                    <!-- <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Hapus Data</a></li> -->
                    <li class=""><a href="#Database" data-toggle="tab" aria-expanded="false">Backup & Restore</a></li>
                    <li class=""><a href="#Patcing" data-toggle="tab" aria-expanded="false">Patching Sistem</a></li>
                    <li class=""><a href="#Assets" data-toggle="tab" aria-expanded="false">Patching Assets</a></li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <?php foreach($pengaturan as $set): ?>
                        <form  action='<?= site_url('edit-pengaturan');?>' method='post' enctype="multipart/form-data">

                            <div class='box-body'>
                                <button type='submit' name='submit' class='btn btn-flat pull-right btn-success' style='margin-bottom:5px'><i class='fa fa-check'></i> Simpan</button>
                                <div class='form-group'>
                                    <label>Nama Aplikasi</label>
                                    <input type='hidden' name='id_pengaturan' value="<?=$set['id_pengaturan']?>"  class='form-control'  />
                                    <input type='text' name='nama_apps' value="<?=$set['nama_apps']?>"  class='form-control' autocomplete="off" required="true" />
                                </div>
                                <div class='form-group'>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <label>Nama Instansi</label>
                                            <input type='text' name='nama_instansi' class='form-control'  value="<?=$set['nama_instansi']?>" autocomplete="off" required="true" />
                                        </div>
                                        <div class='col-md-6'>
                                            <label>Telepon</label>
                                            <input type='text' name='telp' class='form-control' value="<?=$set['telp']?>" autocomplete="off" required="true" />
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <label>Nama Jalan</label>
                                            <input type='text' name='nm_jalan' class='form-control' value="<?=$set['nm_jalan']?>" autocomplete="off" required="true" />
                                        </div>
                                        <div class='col-md-6'>
                                            <label>FAX</label>
                                            <input type='text' name='fax'  class='form-control' value="<?=$set['fax']?>" autocomplete="off" required="true" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class='form-group'>
                                            <label>Nama Desa</label>
                                            <input type="text" name="nm_desa" class="form-control"  value="<?=$set['nm_desa']?>" autocomplete="off" required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class='form-group'>
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control"  value="<?=$set['email']?>" autocomplete="off" required="true" />
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label>Kecamatan</label>
                                    <input type='text' name='nm_kec' class='form-control'  value="<?=$set['nm_kec']?>" autocomplete="off" required="true" />
                                </div>
                                <div class='form-group'>
                                    <label>Kabupaten / Kota</label>
                                    <input type='text' name='nm_kab' class='form-control' value="<?=$set['nm_kab']?>" autocomplete="off" required="true" />
                                </div>
                                <div class='form-group'>
                                    <label>Provinsi</label>
                                    <input type='text' name='nm_prov' class='form-control' value="<?=$set['nm_prov']?>" autocomplete="off" required="true" />
                                </div>
                                
                                <div class='form-group'>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <label>Logo</label>
                                            <!-- <input type='file' name='photo' class='form-control' value="<?= $set['picture'];?>" autocomplete="off" required="true" /> -->

                                            <input type="file" class="form-control" name="photo">
                                        </div>
                                        <div class='col-md-2'>
                                            &nbsp;<br />
                                            <img class='img img-responsive' src="<?= __img('pengaturan/' . $set['logo']) ?>" height='50' />
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class='form-group'>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <label>Tanda Tangan</label>
                                            <input type='file' name='ttd' class='form-control' />
                                        </div>
                                        <div class='col-md-2'>
                                            &nbsp;<br />
                                            <img class='img img-responsive' src="
                                            http://localhost:8080/dist/img/ttd.png?date=1634750383 ?>" height='50' />
                                        </div>
                                    </div>
                                </div> -->
                                <div class='form-group'>
                                    <label>Header Laporan</label>
                                    <textarea name='header' class='form-control'  autocomplete="off" required="true" rows='3'><?=$set['header']?></textarea>
                                </div>
                            </div><!-- /.box-body -->

                        </form>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="Database">
                        <div class='col-md-6'>
                            <div class='box box-solid'>
                                <div class='box-header '>
                                    <h3 class='box-title'>Backup Data</h3>
                                </div><!-- /.box-header -->
                                <div class='box-body'>
                                    <p>Klik Tombol dibawah ini untuk membackup database </p>
                                    <button id='btnbackup' class='btn btn-flat btn-success'><i class='fa fa-database'></i> Backup Data</button>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                        <div class='col-md-6'>
                            <div class='box box-solid'>
                                <div class='box-header '>
                                    <h3 class='box-title'>Restore Data</h3>
                                </div><!-- /.box-header -->
                                <div class='box-body'>
                                    <form id='formrestore'>
                                        <p>Klik Tombol dibawah ini untuk merestore database </p>
                                        <div class='col-md-8'>
                                            <input class='form-control' name='datafile' type='file' required />
                                        </div>
                                        <button name='restore' class='btn btn-flat btn-success'><i class='fa fa-database'></i> Restore Data</button>
                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="Patcing">
                        <div class='col-md-6'>
                            <div class=' box-solid'>
                                <div class='box-header '>
                                    <h3 class='box-title'>Saat ini anda menggunakan versi <span class="badge text-white bg-primary"><?=master('version')?></span></h3>
                                </div><!-- /.box-header -->
                                <div class='box-body'>
                                <form method="post" action="<?=site_url('patching')?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Upload Patch File <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="patching">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-block btn-primary"><i class="fas fa-sync"></i> Patching System</button>
                                    </div>
                                </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                    <div class="tab-pane" id="Assets">
                        <div class='col-md-6'>
                            <div class=' box-solid'>
                                <div class='box-header '>
                                    <h3 class='box-title'>Update Assets</h3>
                                </div><!-- /.box-header -->
                                <div class='box-body'>
                                <form method="post" action="<?=site_url('assets')?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Upload Patch File <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="patching">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-block btn-primary"><i class="fas fa-sync"></i> Patching Assets</button>
                                    </div>
                                </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </div>
			</div>
		</div>
	</div>
        
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
