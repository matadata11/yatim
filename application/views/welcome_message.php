
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISY - Halaman Masuk</title>
    <link rel="stylesheet" href="<?=__css('main/apps.css');?>">
    <link rel="stylesheet" href="<?=__css('pages/log.css');?>">
    <link rel="shortcut icon" href="<?=__img('logo/sisy.png');?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?=__img('logo/sisy.png');?>" type="image/png">
</head>

<body>
    <div id="auth">
        
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo" style="margin-top:1rem;">
                        <a href="<?=site_url('/');?>"><img src="<?=__img('logo/sisy.png');?>" alt="Logo"></a>
                    </div>
                    

                    <h1 class="auth-title">Sistem Informasi Siswa Yatim</h1>
                    <p class="auth-subtitle mb-2">Masuk dengan akun aktif anda.</p>

                    <form method="post" action="<?=site_url('checkdulu')?>">
                        <div class="form-group position-relative has-icon-left mb-2">
                            <input type="text" name="email" class="form-control form-control-lg" placeholder="Username" autocomplete="off">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" autocomplete="off">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <div class="text-danger">
                        <?php echo $this->session->flashdata('notif_false'); ?>
                        </div>
                        <!-- <div class="form-group position-relative has-icon-left mb-3">
                            <input type="password" class="form-control form-control-lg" placeholder="Password">
                            <select name="tahun" id="tahun" class="form-control form-control-lg">
                                <option value="">tahun :</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                            <div class="form-control-icon">
                                <i class="bi bi-folder"></i>
                            </div>
                        </div> -->

                        <!-- <div class="form-check form-check-md d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div> -->
                        <button type="submit" name="submit" class="btn btn-primary btn-block btn-md shadow-md mt-5">Masuk</button>
                    </form>
                    <div class="text-center mt-4 text-lg fs-6" style="margin-bottom:-20px;">
                        <p><a class="font-bold" data-bs-toggle="modal" href="#reset">Reset Password?</a>.</p>
                        <p>Dikembangkan Oleh <a href="https://notfound.id">Notfound Indonesia</a> <br> Suport <a href="https://matadata.tech">Matadata Technologi</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>

<div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                    Reset Data Akun
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" >
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form form-vertical" method="post" action="<?php echo base_url('cari-email') ?>">
                    <div class='col-md-12'>
                        <div class='box box-solid'>
                            <div class='box-body'>
                                <div class='col-sm-12'>
                                    <div class='form-group'>
                                        <label for="first-name-vertical">Email <small><font color="red">*</font> Masukkan Email yang terdaftar </small></label>
                                        <input type="text" id="first-name-vertical" class="form-control" name="email" autocomplete="off" placeholder="ex. admin@admin.com" />
                                    </div>
                                </div>
                                
                                <!-- /.box-body -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <!-- <button type="submit" class="btn btn-block btn-primary me-1 mb-1" >
                                            <i class="bi bi-search"></i> Verifikasi
                                        </button> <br> -->
                                        <button type="submit" class="btn btn-block btn-primary me-1 mb-1" >
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </div><!-- /.box -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?=__js('bootstrap.js');?>"></script>
</body>

</html>
