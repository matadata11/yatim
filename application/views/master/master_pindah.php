
    <?php echo $this->session->flashdata('msg'); ?>
    <section class='content'>
    <!-- admin -->
    <div class='row'>
        <form action='<?= site_url('pindah-data');?>' method='post'>
            <div class='col-md-6'>
                <div class='box box-solid'>
                    <div class='box-header with-border'>
                        <h3 class='box-title'> Data Awal</h3>
                        <div class='box-tools pull-right'>
                            <button type='submit' name='submit' class='btn btn-sm btn-flat btn-success'><i class='fa fa-edit'></i> Pindah Data</button>
                            <a href='pindah' class='btn btn-sm bg-maroon'><i class='fa fa-times'></i></a>
                        </div>
                    </div><!-- /.box-header -->
                    <div class='box-body'>
                        <div class='col-sm-12'>
                            <div class="form-group">
                                <label>Provinsi</label>
                                    <select name=""  class="form-control js-example-basic-single" style="width:100%;" id="provinsi">
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
                                <select name=""  class="form-control js-example-basic-single" style="width:100%;" id="kabupaten">
                                <option value=''>Select Kabupaten</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Sekolah <span class="text-danger">*</span></label>
                                <select name="nm_sekolah"  class="form-control js-example-basic-single" style="width:100%;" id="sekolah">
                                    <option>Select Sekolah</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Siswa <span class="text-danger">*</span></label>
                                <select name="id_siswa"  class="form-control js-example-basic-single" style="width:100%;" id="siswa">
                                    <option>Select Siswa</option>
                                </select>
                            </div>
                           
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
            <div class='col-md-6'>
                <div class='box box-solid'>
                    <div class='box-header with-border'>
                        <h3 class='box-title'> Data Baru</h3>
                    </div><!-- /.box-header -->
                    <div class='box-body'>
                        <div class='col-sm-12'>
                            <div class="form-group">
                                <label>Provinsi</label>
                                    <select name="provinsi_id"  class="form-control js-example-basic-single1" style="width:100%;" id="provinsi1">
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
                                <select name="kabupaten_id"  class="form-control js-example-basic-single1" style="width:100%;" id="kabupaten1">
                                <option value=''>Select Kabupaten</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Instansi <span class="text-danger">*</span></label>
                                <select name="admin_id"  class="form-control js-example-basic-single1" style="width:100%;" id="sekolah1">
                                    <option>Select Sekolah</option>
                                </select>
                            </div>
                        </div>

                    </div><!-- /.box-body -->
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </<form>
        </div>
    </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


