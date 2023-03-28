<section class='content'>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-solid">
                            <div class="box-header whith-border">
                                <marquee width="100%" direction="left" style='color:#000000;'>Selamat Datang pada Sistem Pendataan Beasiswa Anak Yatim Piatu pada Bidang Pembinaan Sekolah Menengah Kejuruan Dinas Pendidikan Aceh.</marquee>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- admin -->
        <div class='row'>
            <div class='animated flipInX col-md-8'>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                        <?php if ($this->session->userdata('level') == 'Super') { ?>
                            <div class="col-md-12">
                                
                            </div>
                            <?php } ?>
                        </div>

                        <div class='box box-solid direct-chat direct-chat-warning'>
                            <div class='box-header with-border'>
                                <h3 class='box-title'><i class='fas fa-bullhorn side-menu-icon fa-fw'></i>
                                    Pengumuman
                                </h3>
                                <div class='box-tools pull-right'>

                                    <a href='#' class='btn btn-default' title='Load' onclick='window.location.reload();'><i class='fa fa-sync'  ></i> Refresh</a>
                                </div>
                            </div>
                            <div class='box-body'>
                                <div id='pengumuman'>
                                <div class="lds-ripple"><div></div><div></div></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
            <div class="col-md-4">
                <div class="box box-solid">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id='infoweb' style="margin-bottom: 10px;">
                        <p style="margin-bottom: -3px;"><b>SISY CLOUD <small class="text-muted">NOTFOUND INDONESIA</small></b></p>
                        <b>Internal Teknis - Jangan Dishare Ke Publik</b>

                        </div>
                        <ul class="list-group">
                            <li class="list-group-item"><img src="<?= site_url();?>/dist/img/support-custom.png" style="background-color: #1e81b0;" class="img-circle" width="40" height="40" alt="">
                                <a href="#cabang" data-toggle="modal"> &nbsp;
                                    <strong>Tim Teknis Dinas</strong>
                                </a>
                            </li>
                            <li class="list-group-item"><img src="<?= site_url();?>/dist/img/support-custom.png" width="40" style="background-color: #E08383;" class="img-circle" height="40" alt="">
                                <a href="#pusat" data-toggle="modal"> &nbsp;
                                    <strong>Posko Teknis Notound</strong>
                                </a>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- /.box -->
                </div>

							
							
                <div class='box animated flipInX box-solid direct-chat direct-chat-warning'>
                    <div class='box-header with-border'>
                        <p style="color:#000000;padding-top:5px;"><i class='fa fa-download'></i> <b>Download Berkas</b></p>
                    </div>
                    <div class='box-body'>
                        <div class="container" style="margin-top: 5px;">
                            <?php if ($berkas == null) { ?>
                                    <h5 class="text-danger" style="padding: 1px;"><i class="fa fa-times"></i> Belum Ada File Di Upload.</h5>
                            <?php } ?>

                            <?php if ($berkas == true) { ?>
                                <?php $no=1; foreach($berkas as $file): ?>
                                    <?php if($file['type'] == 'External'){ ?>
                                        <div style="margin-top: 10px;margin-bottom:13px;">
                                            <img src="../dist/img/pdf.png" width="40" alt=""> <a style="word-wrap:break-word;" href="<?= site_url('./assets/berkas/'.$file['berkas']) ?>"> &nbsp; <b style="word-wrap:break-word;"><?=$file['berkas']?></b></a>
                                        </div>
                                    <?php } ?>
                                <?php endforeach; ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class='box animated flipInX box-solid direct-chat direct-chat-warning'>
                    <div class='box-header with-border'>
                        <p style="color:#000000;padding-top:5px;"><i class='fa fa-play-circle'></i> <b>Video Panduan Penggunaan</b></p>
                    </div>
                    <div class='box-body'>
                        <div style="margin-top: 5px;padding:5px;">
                        <!--<iframe width="100%" height="215" src="https://www.youtube.com/embed/zC-6glEA4oU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
                         <h5 class="text-danger" style="padding: 1px;"><i class="fa fa-times"></i> Belum Ada Video di upload.</h5>
                        </div>
                    </div>
                </div>

            </div>

            

        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<div class="modal fade" id="kab" data-backdrop="static" role="dialog">
    <div class='modal-dialog modal-lg'>
        <div class='modal-content'>
            <div class='modal-header bg-white'>
                <button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
                <p class='modal-title'><i class="fas fa-fw fa-phone"></i> Kontak Tim Teknis</p>
            </div>
            <div class="card-body table-responsive pengguna">
                    <table id='example1' class='table table-bordered table-striped '>
                    <thead>
                        <tr>
                            <th width="20%" >Nama wilayah</th>
                            <th>Nama</th>
                            <th>Telpon</th>
                            <th>Keterangan</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach($posko as $tim): ?>
                        <?php if($tim['status'] == 'Kab'){ ?>
                                <tr>
                                    <td width="20%"><?=$tim['nama_wilayah']?></td>
                                    <td><?=$tim['nama']?></td>
                                    <td><a href="https://api.whatsapp.com/send?phone=<?=$tim['telpon']?>"><?=$tim['telpon']?></a></td>
                                    <td><?=$tim['keterangan']?></td>
                                    <td><?=$tim['email']?></td>
                                </tr>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        
                <div class='modal-footer'>
                    <div class='box-tools pull-right '>
                        <button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pusat" data-backdrop="static" role="dialog">
    <div class='modal-dialog modal-lg'>
        <div class='modal-content'>
            <div class='modal-header bg-white'>
                <button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
                <p class='modal-title'><i class="fas fa-fw fa-phone"></i> Kontak Tim Teknis</p>
            </div>
            <div class="card-body table-responsive pengguna">
                    <table id='example3' class='table table-bordered table-striped '>
                    <thead>
                        <tr>
                                <th width="20%">Nama Wilayah</th>
                                <th width="30%">Nama</th>
                                <th>Telpon</th>
                                <th>Keterangan</th>
                                <th>Email</th>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach($posko as $tim): ?>
                        <?php if($tim['status'] == 'Pusat'){ ?>
                                <tr>
                                    <td width="20%"><?=$tim['nama_wilayah']?></td>
                                    <td width="30%"><?=$tim['nama']?></td>
                                    <td><a href="https://api.whatsapp.com/send?phone=<?=$tim['telpon']?>"><?=$tim['telpon']?></a></td>
                                    <td><?=$tim['keterangan']?></td>
                                    <td><?=$tim['email']?></td>
                                </tr>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        
                <div class='modal-footer'>
                    <div class='box-tools pull-right '>
                        <button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- cabang -->
<div class="modal fade" id="cabang" data-backdrop="static" role="dialog">
    <div class='modal-dialog modal-lg'>
        <div class='modal-content'>
            <div class='modal-header bg-white'>
                <button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
                <p class='modal-title'><i class="fas fa-fw fa-phone"></i> Kontak Tim Teknis</p>
            </div>
            <div class="card-body table-responsive pengguna">
                    <table id='example2' class='table table-bordered table-striped '>
                    <thead>
                        <tr>
                                <th width="20%">Nama Wilayah</th>
                                <th>Nama</th>
                                <th>Telpon</th>
                                <th>Keterangan</th>
                                <th>Email</th>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach($posko as $tim): ?>
                        <?php if($tim['status'] == 'Cabang'){ ?>
                                <tr>
                                    <td width="20%"><?=$tim['nama_wilayah']?></td>
                                    <td><?=$tim['nama']?></td>
                                    <td><a href="https://api.whatsapp.com/send?phone=<?=$tim['telpon']?>"><?=$tim['telpon']?></a></td>
                                    <td><?=$tim['keterangan']?></td>
                                    <td><?=$tim['email']?></td>

                                </tr>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        
                <div class='modal-footer'>
                    <div class='box-tools pull-right '>
                        <button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
