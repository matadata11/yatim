<header class='main-header'>
    <a href='?' class='logo' style='background-color:#fff' style="z-index: 0;">
        <span class='animated bounce logo-mini'>
        <img src="<?= site_url();?>/dist/img/tutwuri.png" width="40" height="40" alt="" >
        </span>
        <span class='animated bounce logo-lg'>
        <?php foreach($pengaturan as $set): ?>
        <img src="<?= __img('pengaturan/' . $set['logo']) ?>" width="130" height="30" alt="" >
        <?php endforeach; ?>
        </span>
    </a>
    <nav class='navbar navbar-static-top ' style='background-color:#fff;box-shadow: 0px 10px 10px 0px rgba(0,0,0,0.1)' role='navigation'>
        <a style="color:#000" href='#' class='sidebar-baru hidden-xs' data-toggle='offcanvas' role='button'>
            <i class="fa fa-bars fa-lg fa-fw"></i>
        </a>
        <div class='navbar-custom-menu'>
            <ul class='nav navbar-nav'>
						
                <!-- <li class='dropdown notifications-menu'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown' style="color:#000">
                        <i class="fas fa-desktop fa-lg fa-fw"></i> <span style='font-size:14px'></span>
                    </a>
                    <ul class="dropdown-menu" style="height:80px">
                        <li class="header">Ganti Status Server</li>
                        <li> -->
                            <!-- inner menu: contains the actual data -->
                            <!-- <ul class="menu"> -->
                                <!-- <?php if ($setting['server'] == 'lokal') { ?>
                                    <li>
                                        <a id="btnserver" href="#">
                                            <i class="fa fa-users text-aqua"></i> Server Pusat
                                        </a>
                                    </li> -->
                                <!-- <?php } else { ?> -->
                                    <!-- <li>
                                        <a id="btnserver" href="#">
                                            <i class="fa fa-users text-aqua"></i> Server Lokal
                                        </a>
                                    </li> -->
                                <!-- <?php } ?> -->
                            <!-- </ul>
                        </li>
                        </ul>
                </li> -->
                <li><a style="color:#000" href='#informasi' data-toggle="modal"><i class="fas fa-info-circle fa-lg  "></i></a></li>
                    <li class='dropdown user user-menu'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                        <img src="<?= site_url();?>/dist/img/orang.svg" class="user-image" width="40" height="40" alt="">
                            <span style="color:#000" class='hidden-xs'><?= $this->session->userdata('fullname'); ?> &nbsp; <i class='fa fa-caret-down'></i></span>
                        </a>
                        <ul class='dropdown-menu'>
                            <li class='user-header'>
                                <?php
                                if ($this->session->userdata('level') == 'Super') :
                                    echo "<img src='../dist/img/lunkuo.png' class='user-image' class='img-circle' alt='User Image'>";
                                    elseif ($this->session->userdata('level') == 'HD' OR $this->session->userdata('level') == 'Adc' OR $this->session->userdata('level') == 'Penjab') :
                                    echo "<img src='../dist/img/orang.svg' class='user-image' class='img-circle' alt='User Image'>";
                                endif
                                ?>
                                <p>
                                <?= $this->session->userdata('fullname'); ?>
                                    <small>Level. <?= $this->session->userdata('level'); ?></small>
                                </p>
                            </li>
                            <div class='pull-left'>
                                    <?php
                                        if ($this->session->userdata('level') == 'Super') :
                                        echo "<a href='pengaturan' class='btn btn-sm btn-default btn-flat'><i class='fa fa-gear'></i> Pengaturan</a>";
                                    elseif ($this->session->userdata('level') == 'HD' OR $this->session->userdata('level') == 'Adc' OR $this->session->userdata('level') == 'Penjab') :
                                        echo "<a href='perbaharui' class='btn btn-sm btn-default btn-flat'><i class='fa fa-gear'></i> Edit Profil</a>";
                                    endif
                                    ?>
                                </div>
                                <div class='pull-right'>
                                <?php if ($this->session->userdata('level') == 'Super' OR $this->session->userdata('level') == 'HD' OR $this->session->userdata('level') == 'Ops' ) { ?>
                                    <a href='keluaraja' class='btn btn-sm btn-default btn-flat'><i class='fa fa-sign-out'></i> Keluar</a>
                                    <?php } ?>

                                    <?php if ($this->session->userdata('level') == 'Admin') { ?>
                                    <a href='keluaraja' class='btn btn-sm btn-default btn-flat'><i class='fa fa-sign-out'></i> Keluar</a>
                                    <?php } ?>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
        </div>
    </nav>
</header>


<div class='content-wrapper' style='background-image: url(backgroun.jpg);background-size: cover;'>
    <section class='content-header'>
        <h1>
        <?php foreach($pengaturan as $set): ?>
            &nbsp;<span class='hidden-xs'><?= $set['nama_apps'];?>&nbsp;<small style="font-size: 12px;"><?=$set['header'];?></small></span>
            <?php endforeach; ?>
        </h1>

        <?php
            //ubah timezone menjadi jakarta
            date_default_timezone_set("Asia/Jakarta");

            //ambil jam dan menit
            $jam = date('H:i');

            //atur salam menggunakan IF
            if ($jam > '05:30' && $jam < '10:00') {
                $salam = 'Pagi';
            } elseif ($jam >= '10:00' && $jam < '15:00') {
                $salam = 'Siang';
            } elseif ($jam >= '15:00' && $jam < '18:00' ) {
                $salam = 'Sore';
            } elseif ($jam >= '18:00' && $jam < '24:00' ) {
                $salam = 'Malam';
            } else {
                $salam = 'Dini Hari';
            }

            ?>

            <?php
                function tanggal_indonesia($tanggal){
                    $bulan = array (
                    1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                    );
                    
                    $pecahkan = explode('-', $tanggal);
                    
                    // variabel pecahkan 0 = tanggal
                    // variabel pecahkan 1 = bulan
                    // variabel pecahkan 2 = tahun
                    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                }
                
                // echo tanggal_indonesia(date('Y-m-d')); // Hasilnya menampilkan format tanggal 11 Oktober 2017
            ?>

            <?php 
            
            function hari_ini(){
                $hari = date ("D");
            
                switch($hari){
                    case 'Sun':
                        $hari_ini = "Minggu";
                    break;
            
                    case 'Mon':			
                        $hari_ini = "Senin";
                    break;
            
                    case 'Tue':
                        $hari_ini = "Selasa";
                    break;
            
                    case 'Wed':
                        $hari_ini = "Rabu";
                    break;
            
                    case 'Thu':
                        $hari_ini = "Kamis";
                    break;
            
                    case 'Fri':
                        $hari_ini = "Jumat";
                    break;
            
                    case 'Sat':
                        $hari_ini = "Sabtu";
                    break;
                    
                    default:
                        $hari_ini = "Tidak di ketahui";		
                    break;
                }
            
                return "<b>" . $hari_ini . "</b>";
            
            }
            
            // echo "Hari ini adalah ". hari_ini();
            
            ?> 


            <div style='float:right; margin-top:-37px'>
                <button class='btn  btn-flat  bg-green'>Selamat <?=$salam;?></button>
                <button class='btn  btn-flat  bg-purple'><i class='fa fa-calendar'></i> 
                <?php
                date_default_timezone_set("Asia/Jakarta");
                echo hari_ini(), ", ". tanggal_indonesia(date('Y-m-d'));
                ?>
                </button>
                <button class='btn  btn-flat  bg-maroon'><span id='clock'>
                </span></button>
            </div>
            <div class='breadcrumb'></div>
    </section>
