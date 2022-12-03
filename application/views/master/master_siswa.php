<?php echo $this->session->flashdata('msg'); ?>
    <section class='content'>
    <!-- admin -->
    
    <div class='row'>
        <div class='col-md-12'>
            <div class='box box-solid'>
                <div class='box-header with-border'>
                    <h3 class='box-title'><i class='fas fa-server side-menu-icon fa-fw'></i> Data Siswa</h3>
                    <div class='box-tools pull-right'>
                        <button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#upload'><i class='fas fa-upload'></i> Import Siswa</button>
                        <button class='btn btn-sm btn-flat btn-success' data-toggle='modal' data-target='#tambahposko'><i class='fa fa-plus'></i> Input Siswa</button>
                    </div>
                </div><!-- /.box-header -->
                <div class="card-body table-responsive pengguna">
                    <table id='example1' class='table table-bordered table-striped '>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kabupaten</th>
                                <th>Nama Sekolah</th>
                                <th>Kelas</th>
                                <th>Nama Siswa</th>
                                <th>NISN</th>
                                <th>Atas Nama</th>
                                <th>No Rekening</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if ($this->session->userdata('level') == 'Ops' ) { ?>
                        <?php $no=1; foreach($siswa as $row): ?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><?=$row['nama_kabupaten']?></td>
                                <td width="0%"><?=$row['nm_sekolah']?></td>
                                <td><?=$row['kelas']?></td>
                                <td><a data-toggle="modal" href="#buku<?=$row['id_siswa'];?>" style="font-style:bold;"><?=$row['nm_siswa']?></a></td>
                                <td><?=$row['nisn']?></td>
                                <td ><?=$row['atas_nama']?></td>
                                <td><?=$row['no_rek']?></td>
                                <td width="19%">

                                    <?php if($row['locks']  == 'Ylock' ): ?>
                                        <button class="btn btn-danger btn-block disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="Dikunci Ops">  <i class="fas fa-fw fa-lock"></i> Kunci Ops</button>

                                    <?php elseif($row['locks'] == 'Nlock' ): ?>
                                        <a href="#lock<?=$row['id_siswa'];?>" data-toggle="modal" style="color:#fff;"> <button class="btn btn-flat btn-xs btn-primary">  <i class="fas fa-fw fa-unlock"></i> Lock</button></a>
                                        <a href="#edit<?=$row['id_siswa'];?>" data-toggle="modal" style="color:#fff;"> <button class="btn btn-flat btn-xs btn-warning">  <i class="fas fa-fw fa-edit"></i> Edit</button></a>
                                        <a href="#remove<?=$row['id_siswa'];?>" data-toggle="modal" style="color:#fff;"> <button class='btn btn-flat btn-xs btn-danger'> <i class="fas fa-fw fa-trash"></i> Hapus</button></a>
                                    <?php endif; ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php } ?>

                        <!-- role admin cabang -->
                        <?php if ($this->session->userdata('level') == 'Admin' ) { ?>
                            <?php $no=1; foreach($siswa_admin as $row): ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=$row['nama_kabupaten']?></td>
                            <td width="0%"><?=$row['nm_sekolah']?></td>
                            <td><?=$row['kelas']?></td>
                            <td><a data-toggle="modal" href="#buku<?=$row['id_siswa'];?>" style="font-style:bold;"><?=$row['nm_siswa']?></a></td>
                            <td><?=$row['nisn']?></td>
                            <td><?=$row['atas_nama']?></td>
                            <td><?=$row['no_rek']?></td>
                            <td width="16%">

                                <?php if($row['locks']  == 'Ylock' ): ?>
                                        <button class="btn btn-block btn-danger disabled mb-1" data-toggle="tooltip" data-placement="top" title="Dikunci Ops">  <i class="fas fa-fw fa-lock"></i> Sekolah</button>
                                <?php endif; ?>

                                <?php if($row['lock_admin']  == 'Ylock' ): ?>
                                    <button class="btn btn-block btn-danger disabled" data-toggle="tooltip" data-placement="top" title="Dikunci">  <i class="fas fa-fw fa-lock"></i> Cabang</button>
                                    
                                <?php elseif($row['lock_admin'] == 'Nlock' ): ?>
                                    <a href="#locka<?=$row['id_siswa'];?>" data-toggle="modal" style="color:#fff;"> <button class="btn btn-primary btn-xs">  <i class="fas fa-fw fa-unlock"></i> Lock</button></a>
                                    <a href="#edit<?=$row['id_siswa'];?>" data-toggle="modal" style="color:#fff;"> <button class="btn btn-warning btn-xs"> <i class="fas fa-fw fa-edit"></i> Edit</button></a>
                                    <a href="#remove<?=$row['id_siswa'];?>" data-toggle="modal" style="color:#fff;"> <button class="btn btn-danger btn-xs"> <i class="fas fa-fw fa-trash"></i> Hapus</button></a>
                                <?php endif; ?>
                                

                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php } ?>

                        <!-- role super -->
                        <?php if ($this->session->userdata('level') == 'Super' ) { ?>
                            <?php $no=1; foreach($siswa_super as $row): ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=$row['nama_kabupaten']?></td>
                            <td width="0%"><?=$row['nm_sekolah']?></td>
                            <td><?=$row['kelas']?></td>
                            <td><a data-toggle="modal" href="#buku<?=$row['id_siswa'];?>" style="font-style:bold;"><?=$row['nm_siswa']?></a></td>
                            <td><?=$row['nisn']?></td>
                            <td><?=$row['atas_nama']?></td>
                            <td><?=$row['no_rek']?></td>
                            <td width="13%">

                                <?php if($row['locks']  == 'Ylock' ): ?>
                                    <button tton class="btn btn-block btn-danger disabled mb-1" data-toggle="tooltip" data-placement="left" title="Dikunci Ops">  <i class="fas fa-fw fa-lock"></i> Sekolah</button>
                                <?php endif; ?>

                                <?php if($row['lock_admin']  == 'Ylock' ): ?>
                                    <button class="btn btn-block btn-danger disabled mb-1" data-toggle="tooltip" data-placement="left" title="Dikunci Admin Cabang">  <i class="fas fa-fw fa-lock"></i> Cabang</button>
                                <?php endif; ?>

                                <?php if($row['lock_super']  == 'Ylock' ): ?>
                                    <button class="btn btn-block btn-danger disabled">  <i class="fas fa-fw fa-lock"></i></button>
                                    
                                <?php elseif($row['lock_super'] == 'Nlock' ): ?>
                                    <!-- <a href="#locks<?=$row['id_siswa'];?>" data-bs-toggle="modal" style="color:#fff;"> <button class="btn btn-primary">  <i class="bi bi-unlock-fill"></i></button></a> -->
                                    <a href="#edit<?=$row['id_siswa'];?>" data-toggle="modal" style="color:#fff;"> <button class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="left" title="Edit Siswa">  <i class="fas fa-fw fa-edit"></i> Edit</button></a>
                                    <a href="#remove<?=$row['id_siswa'];?>" data-toggle="modal" style="color:#fff;"> <button class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="left" title="Hapus Siswa"> <i class="fas fa-fw fa-trash"></i> Hapus</button></a>

                                    <a href="#pindah<?=$row['id_siswa'];?>" data-toggle="modal" style="color:#fff;"> <button class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="left" title="Pindah Siswa"> <i class="fas fa-fw fa-share"></i> Pindah</button></a>
                                <?php endif; ?>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php } ?>
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
                        <h3 class='modal-title'>Input Siswa</h3>
                    </div>
                    <div class='modal-body'>
                    <form class="form" method="post" action="<?=site_url('add-inputan')?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Provinsi</label>
                                <select name="provinsi_id" class="form-control" id="provinsi">
                                    <option>- Select Provinsi -</option>
                                    <?php 
                                        foreach($provinsi as $prov)
                                        {
                                            echo '<option value="'.$prov->id_provinsi.'">'.$prov->nama.'</option>';
                                        }
                                    ?>
                                </select>
                                <input type="hidden" id="email-id-column" class="form-control" name="admin_input" value="<?=__session('fullname');?>" placeholder="ex. 201501015"/>
                                <input type="hidden" id="email-id-column" class="form-control" name="admin_id" value="<?=__session('id_admin');?>" placeholder="ex. 201501015"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="last-name-column">Kabupaten</label>
                                <select name="kabupaten_id" class="form-control js-example-basic-single" style="width:100%;" id="kabupaten">
                                <option value=''>Select Kabupaten</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="city-column">Nama Sekolah</label>
                                <input type="text" id="city-column" class="form-control" placeholder="ex. SMK Negeri 1 Simpang Kanan" name="nm_sekolah"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="country-floating">Nama Siswa</label>
                                <input type="text" id="city-column" class="form-control" placeholder="ex. Dwi Satria" name="nm_siswa"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="company-column">Kelas</label>
                                <select name="kelas" id="first-name-column" class="form-control">
                                <option value="">-kelas-</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                                </select>
                                
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email-id-column">NISN</label>
                                <input type="number" id="email-id-column" class="form-control" name="nisn" placeholder="ex. 201501015"/>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email-id-column">Nama Bank</label>
                                <input type="text" id="email-id-column" class="form-control" name="nm_bank" placeholder="ex. Bank ACeh Syariah" />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email-id-column">Atas Nama <small><font color="red">*</font> Huruf Kapital</small></label>
                                <input type="text" id="email-id-column" class="form-control"   name="atas_nama" placeholder="ex. DWI SATRIA PANGESTU"/>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="company-column">No Rekening</label>
                                <input type="text" id="email-id-column" class="form-control" name="no_rek" placeholder="ex. 130**********"/>
                                
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="company-column">No Hp Siswa</label>
                                <input type="text" id="email-id-column" class="form-control"  value="08" name="no_hp" placeholder="ex. 08">
                                
                            </div>
                        </div>
                        

                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="email-id-column">Buku Rekening <small><font color="red">*</font> Max 2 Mb</small></label>
                                <input type="file" class="form-control" name="photo">
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end text-center">
                            <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                Simpan
                            </button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                Reset
                            </button>
                        </div>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- edit -->

        <?php foreach($siswa as $row): ?>
        <div class="modal fade" id="edit<?=$row['id_siswa'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">
                            Edit Data Siswa
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" >
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" method="post" action="<?=site_url('edit-inputan')?>">
                            <div class="row">
                                <!-- <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Provinsi</label>
                                        <select name="provinsi_id" class="form-control" id="provinsi1">
                                            <option>- Select Provinsi -</option>
                                            <?php 
                                                foreach($provinsi as $prov)
                                                {
                                                    echo '<option value="'.$prov->id_provinsi.'">'.$prov->nm_provinsi.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Kabupaten</label>
                                        <select name="kabupaten_id" class="form-control" id="kabupaten1">
                                        <option value=''>Select Kabupaten</option>
                                    </select>
                                    </div>
                                </div> -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city-column">Nama Sekolah</label>
                                        <input type="text" id="city-column" class="form-control" placeholder="ex. SMK Negeri 1 Simpang Kanan" name="nm_sekolah" value="<?=$row['nm_sekolah'];?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Nama Siswa</label>
                                        <input type="hidden" id="city-column" class="form-control" placeholder="ex. Dwi Satria" name="id_siswa" value="<?=$row['id_siswa'];?>"/>
                                        <input type="text" id="city-column" class="form-control" placeholder="ex. Dwi Satria" name="nm_siswa" value="<?=$row['nm_siswa'];?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Kelas</label>
                                        <select name="kelas" id="first-name-column" class="form-control">
                                        <option value="<?=$row['kelas'];?>"><?=$row['kelas'];?></option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                        </select>
                                        
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">NISN</label>
                                        <input type="number" id="email-id-column" class="form-control" name="nisn" placeholder="ex. 201501015" value="<?=$row['nisn'];?>"/>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Atas Nama <small><font color="red">*</font> Huruf Kapital</small></label>
                                        <input type="text" id="email-id-column" class="form-control" name="atas_nama" placeholder="ex. DWI SATRIA PANGESTU" value="<?=$row['atas_nama'];?>"/>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">No Rekening</label>
                                        <input type="text" id="email-id-column" class="form-control" name="no_rek" placeholder="ex. 130**********" value="<?=$row['no_rek'];?>"/>
                                        
                                    </div>
                                </div>
                                
                                <!-- <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Buku Rekening <small><font color="red">*</font> Max 2 Mb</small></label>
                                        <input type="file" id="email-id-column" class="form-control" name="photo" placeholder="No Rekening"/>
                                    </div>
                                </div> -->
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                        Ubah Data
                                    </button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <?php foreach($siswa_admin as $row): ?>
        <div class="modal fade" id="edit<?=$row['id_siswa'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">
                            Edit Data Siswa
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" >
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" method="post" action="<?=site_url('edit-inputan')?>">
                            <div class="row">
                                <!-- <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Provinsi</label>
                                        <select name="provinsi_id" class="form-control" id="provinsi1">
                                            <option>- Select Provinsi -</option>
                                            <?php 
                                                foreach($provinsi as $prov)
                                                {
                                                    echo '<option value="'.$prov->id_provinsi.'">'.$prov->nm_provinsi.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Kabupaten</label>
                                        <select name="kabupaten_id" class="form-control" id="kabupaten1">
                                        <option value=''>Select Kabupaten</option>
                                    </select>
                                    </div>
                                </div> -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city-column">Nama Sekolah</label>
                                        <input type="text" id="city-column" class="form-control" placeholder="ex. SMK Negeri 1 Simpang Kanan" name="nm_sekolah" value="<?=$row['nm_sekolah'];?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Nama Siswa</label>
                                        <input type="hidden" id="city-column" class="form-control" placeholder="ex. Dwi Satria" name="id_siswa" value="<?=$row['id_siswa'];?>"/>
                                        <input type="text" id="city-column" class="form-control" placeholder="ex. Dwi Satria" name="nm_siswa" value="<?=$row['nm_siswa'];?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Kelas</label>
                                        <select name="kelas" id="first-name-column" class="form-control">
                                        <option value="<?=$row['kelas'];?>"><?=$row['kelas'];?></option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                        </select>
                                        
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">NISN</label>
                                        <input type="number" id="email-id-column" class="form-control" name="nisn" placeholder="ex. 201501015" value="<?=$row['nisn'];?>"/>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Atas Nama <small><font color="red">*</font> Huruf Kapital</small></label>
                                        <input type="text" id="email-id-column" class="form-control" name="atas_nama" placeholder="ex. DWI SATRIA PANGESTU" value="<?=$row['atas_nama'];?>"/>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">No Rekening</label>
                                        <input type="text" id="email-id-column" class="form-control" name="no_rek" placeholder="ex. 130**********" value="<?=$row['no_rek'];?>"/>
                                        
                                    </div>
                                </div>
                                
                                <!-- <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Buku Rekening <small><font color="red">*</font> Max 2 Mb</small></label>
                                        <input type="file" id="email-id-column" class="form-control" name="photo" placeholder="No Rekening"/>
                                    </div>
                                </div> -->
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                        Ubah Data
                                    </button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <?php foreach($siswa_super as $row): ?>
        <div class="modal fade" id="edit<?=$row['id_siswa'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">
                            Edit Data Siswa
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" >
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" method="post" action="<?=site_url('edit-inputan')?>">
                            <div class="row">
                                <!-- <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Provinsi</label>
                                        <select name="provinsi_id" class="form-control" id="provinsi1">
                                            <option>- Select Provinsi -</option>
                                            <?php 
                                                foreach($provinsi as $prov)
                                                {
                                                    echo '<option value="'.$prov->id_provinsi.'">'.$prov->nm_provinsi.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Kabupaten</label>
                                        <select name="kabupaten_id" class="form-control" id="kabupaten1">
                                        <option value=''>Select Kabupaten</option>
                                    </select>
                                    </div>
                                </div> -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city-column">Nama Sekolah</label>
                                        <input type="text" id="city-column" class="form-control" placeholder="ex. SMK Negeri 1 Simpang Kanan" name="nm_sekolah" value="<?=$row['nm_sekolah'];?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Nama Siswa</label>
                                        <input type="hidden" id="city-column" class="form-control" placeholder="ex. Dwi Satria" name="id_siswa" value="<?=$row['id_siswa'];?>"/>
                                        <input type="text" id="city-column" class="form-control" placeholder="ex. Dwi Satria" name="nm_siswa" value="<?=$row['nm_siswa'];?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Kelas</label>
                                        <select name="kelas" id="first-name-column" class="form-control">
                                        <option value="<?=$row['kelas'];?>"><?=$row['kelas'];?></option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                        </select>
                                        
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">NISN</label>
                                        <input type="number" id="email-id-column" class="form-control" name="nisn" placeholder="ex. 201501015" value="<?=$row['nisn'];?>"/>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Atas Nama <small><font color="red">*</font> Huruf Kapital</small></label>
                                        <input type="text" id="email-id-column" class="form-control" name="atas_nama" placeholder="ex. DWI SATRIA PANGESTU" value="<?=$row['atas_nama'];?>"/>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">No Rekening</label>
                                        <input type="text" id="email-id-column" class="form-control" name="no_rek" placeholder="ex. 130**********" value="<?=$row['no_rek'];?>"/>
                                        
                                    </div>
                                </div>
                                
                                <!-- <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Buku Rekening <small><font color="red">*</font> Max 2 Mb</small></label>
                                        <input type="file" id="email-id-column" class="form-control" name="photo" placeholder="No Rekening"/>
                                    </div>
                                </div> -->
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                        Ubah Data
                                    </button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <!-- buku -->
        <?php foreach($siswa as $row): ?>
        <div class="modal fade" id="buku<?=$row['id_siswa']?>" data-backdrop="static" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h5><font ><?=$row['nm_bank'];?></font> <br> <?=$row['atas_nama'];?> <br> <?=$row['no_rek'];?></h5> <hr>
                        <img src="<?= site_url('./assets/images/buku/' . $row['photo_buku']) ?>" style="width: 450px;height:auto;" alt="">
                        <br>
                        <button data-dismiss="modal" class="btn btn-block btn-sm btn-danger" style="margin-top:10px;"><i class="fas fa-times"></i> Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <?php foreach($siswa_admin as $row): ?>
        <div class="modal fade" id="buku<?=$row['id_siswa']?>" data-backdrop="static" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h5><font ><?=$row['nm_bank'];?></font> <br> <?=$row['atas_nama'];?> <br> <?=$row['no_rek'];?></h5> <hr>
                        <img src="<?= site_url('./assets/images/buku/' . $row['photo_buku']) ?>" style="width: 450px;height:auto;" alt="">
                        <br>
                        <button data-dismiss="modal" class="btn btn-block btn-sm btn-danger" style="margin-top:10px;"><i class="fas fa-times"></i> Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <?php foreach($siswa_super as $row): ?>
        <div class="modal fade" id="buku<?=$row['id_siswa']?>" data-backdrop="static" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h5><font ><?=$row['nm_bank'];?></font> <br> <?=$row['atas_nama'];?> <br> <?=$row['no_rek'];?></h5> <hr>
                        <img src="<?= site_url('./assets/images/buku/' . $row['photo_buku']) ?>" style="width: 450px;height:auto;" alt="">
                        <br>
                        <button data-dismiss="modal" class="btn btn-block btn-sm btn-danger" style="margin-top:10px;"><i class="fas fa-times"></i> Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <!-- hapus -->
        <?php foreach($siswa as $row): ?>
        <div class="modal fade" id="remove<?=$row['id_siswa']?>" data-backdrop="static" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body mt-4 text-center">
                        <h5>Apakah anda akan menghapus Pengguna <em><?=$row['nm_siswa']?></em> ?</h5>
                        <a href="<?=site_url('remove-inputan/'.$row['id_siswa'])?>" type="submit" name="submit" class="btn btn-block btn-primary me-1 mb-1">
                                Remove
                        </a> <br>
                        <button data-dismiss="modal" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Tidak</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <?php foreach($siswa_admin as $row): ?>
        <div class="modal fade" id="remove<?=$row['id_siswa']?>" data-backdrop="static" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body mt-4 text-center">
                        <h5>Apakah anda akan menghapus Pengguna <em><?=$row['nm_siswa']?></em> ?</h5>
                        <a href="<?=site_url('remove-inputan/'.$row['id_siswa'])?>" type="submit" name="submit" class="btn btn-block btn-primary me-1 mb-1">
                                Remove
                        </a> <br>
                        <button data-dismiss="modal" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Tidak</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <?php foreach($siswa_super as $row): ?>
        <div class="modal fade" id="remove<?=$row['id_siswa']?>" data-backdrop="static" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body mt-4 text-center">
                        <h5>Apakah anda akan menghapus Pengguna <em><?=$row['nm_siswa']?></em> ?</h5>
                        <a href="<?=site_url('remove-inputan/'.$row['id_siswa'])?>" type="submit" name="submit" class="btn btn-block btn-primary me-1 mb-1">
                                Remove
                        </a> <br>
                        <button data-dismiss="modal" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Tidak</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>


        <!-- lock -->
        <?php foreach($siswa as $row): ?>
        <div class="modal fade" id="lock<?=$row['id_siswa'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form class="form" method="post" action="<?=site_url('lock-inputan')?>">
                            <div class="row">
                                <div class="col-md-12 col-12 text-center">
                                    <h5>Anda yakin ingin mengunci <br> Nama <?=$row['nm_siswa'];?> </h5>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <input type="hidden" id="email-id-column" class="form-control" name="id_siswa" value="<?=$row['id_siswa'];?>>"/>
                                        <input type="hidden" id="email-id-column" class="form-control" name="locks" value="Ylock"/>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" name="submit" class="btn btn-danger me-1 mb-1 btn-block">
                                    <i class="bi bi-lock"></i> Kunci
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <!-- lock admin -->
        <?php foreach($siswa_admin as $row): ?>
        <div class="modal fade" id="locka<?=$row['id_siswa'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form class="form" method="post" action="<?=site_url('locka-inputan')?>">
                            <div class="row">
                                <div class="col-md-12 col-12 text-center">
                                    <h5>Anda yakin ingin mengunci <br> Nama <?=$row['nm_siswa'];?> </h5>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <input type="hidden" id="email-id-column" class="form-control" name="id_siswa" value="<?=$row['id_siswa'];?>>"/>
                                        <input type="hidden" id="email-id-column" class="form-control" name="lock_admin" value="Ylock"/>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" name="submit" class="btn btn-danger me-1 mb-1 btn-block">
                                    <i class="bi bi-lock"></i> Kunci
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Import Data Menggunakan Excel -->
<div class="modal fade" id="upload" data-backdrop="static" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Data GTK</h5>
            </div>
            <div class="modal-body">
                <div class="my-2">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-center">Silahkan download template data berikut</p>
                            <a href="<?= site_url('assets/excel/format_inport_siswa.xlsx') ?>" download class="btn btn-block btn-primary"><i class="fas fa-download"></i> Download Format</a><br>
                        </div>
                    </div>
                </div>
                <form method="post" action="<?= site_url('import-inputan') ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Pilih File Excel</label>
                        <input type="hidden" class="form-control" name="admin_input" value="<?= $this->session->userdata('fullname'); ?>">
                        <input type="file" class="form-control" name="dataexcel">
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-check"></i> Import</button>
                        <button data-dismiss="modal" class="btn btn-danger"><i class="fas fa-times"></i> Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        <?php endforeach; ?>

        <!-- pindah -->
        <?php foreach($siswa_admin as $row): ?>
        <div class="modal fade" id="pindah<?=$row['id_siswa'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                    <form class="form" method="post" action="<?=site_url('edit-inputan')?>">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Provinsi</label>
                                        <select name="provinsi_id" class="form-control" id="provinsi1">
                                            <option value="<?=$row['provinsi_id'];?>"><?=$row['nama'];?></option>
                                            <?php 
                                                foreach($provinsi as $prov)
                                                {
                                                    echo '<option value="'.$prov->id_provinsi.'">'.$prov->nama.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Kabupaten</label>
                                        <select name="kabupaten_id" class="form-control" id="kabupaten1">
                                        <option value=''>Select Kabupaten</option>
                                    </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Sekolah <span class="text-danger">*</span></label>
                                        <select name="nm_sekolah"  class="form-control" style="width:100%;" id="sekolah1">
                                            <option>Select Sekolah</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">Sekolah <span class="text-danger">*</span></label>
                                        <select name="admin_input"  class="form-control" style="width:100%;" id="siswa1">
                                            <option>Select Admin</option>
                                        </select>
                                    </div>
                                </div>
                                

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Nama Siswa</label>
                                        <input type="hidden" id="city-column" class="form-control" placeholder="ex. Dwi Satria" name="id_siswa" value="<?=$row['id_siswa'];?>"/>
                                        <input type="text" id="city-column" class="form-control" placeholder="ex. Dwi Satria" name="nm_siswa" value="<?=$row['nm_siswa'];?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Kelas</label>
                                        <select name="kelas" id="first-name-column" class="form-control">
                                        <option value="<?=$row['kelas'];?>"><?=$row['kelas'];?></option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                        </select>
                                        
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">NISN</label>
                                        <input type="number" id="email-id-column" class="form-control" name="nisn" placeholder="ex. 201501015" value="<?=$row['nisn'];?>"/>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Atas Nama <small><font color="red">*</font> Huruf Kapital</small></label>
                                        <input type="text" id="email-id-column" class="form-control" name="atas_nama" placeholder="ex. DWI SATRIA PANGESTU" value="<?=$row['atas_nama'];?>"/>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">No Rekening</label>
                                        <input type="text" id="email-id-column" class="form-control" name="no_rek" placeholder="ex. 130**********" value="<?=$row['no_rek'];?>"/>
                                        
                                    </div>
                                </div>
                                
                                <!-- <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Buku Rekening <small><font color="red">*</font> Max 2 Mb</small></label>
                                        <input type="file" id="email-id-column" class="form-control" name="photo" placeholder="No Rekening"/>
                                    </div>
                                </div> -->
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                        Ubah Data
                                    </button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->