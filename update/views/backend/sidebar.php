<aside class='main-sidebar kiri-bar' style="background-color: #fff">
	<div class="user-panel" style="text-align:center;z-index:999;">
	<!-- <img src="<?= site_url();?>/dist/img/tutwuri.png" width="75" height="75" alt="" class="mb mt-up img"><br> -->
		<!-- <b>PORTAL DATA</b><br>
		<b>BIDANG PEMBINAAN SMK</b> -->
	</div>
	<div class="menu-header" style="margin-top:-20px;">
		<ul>
			<li>
			<?php if ($this->session->userdata('level') == 'Super' OR $this->session->userdata('level') == 'HD' OR $this->session->userdata('level') == 'Ops' ) { ?>
				<a style="color:#fff" href='dashboard' class="btn-logout">
					<span class="fa fa-home fa-2x"></span><br>Dashboard
				</a>
			<?php } ?>

			<?php if ($this->session->userdata('level') == 'Admin') { ?>
				<a style="color:#fff" href='admin/dashboard' class="btn-logout">
					<span class="fa fa-home fa-2x"></span><br>Dashboard
				</a>
			<?php } ?>
			</li>
			<!-- <li>
				<a style="color:#fff" class="btn-logout" href="pengaturan">
					<span class="fa fa-user-cog fa-2x"></span><br>Pengaturan
				</a>
			</li> -->
			<li>
			<?php if ($this->session->userdata('level') == 'Super' OR $this->session->userdata('level') == 'HD' OR $this->session->userdata('level') == 'Ops' ) { ?>
				<a style="color:#fff" href="keluaraja" class="btn-logout"> <span class="fa fa-sign-out-alt fa-2x"></span><br>Keluar</a>
				<?php } ?>

			<?php if ($this->session->userdata('level') == 'Admin') { ?>
				<a style="color:#fff" href="admin/keluaraja" class="btn-logout"> <span class="fa fa-sign-out-alt fa-2x"></span><br>Keluar</a>
				<?php } ?>
			</li>
		</ul>
	</div>
	<section class='sidebar '>

	<hr style="margin:0px">

	<hr style="margin:0px">
	<ul class=' sidebar-menu  tree data-widget=' tree>

		<li class="header">MENU UTAMA</li>
		<?php if ($this->session->userdata('level') == 'Super') { ?>
			<li class='treeview'>
				<a href='#'><i class="fas fa-cog side-menu-icon fa-fw"></i><span> Data Master </span><span class='pull-right-container'> <i class='fa fa-angle-down pull-right'></i> </span></a>
				<ul class='treeview-menu'>
					<li><a href='provinsi'><i class='fas fa-angle-double-right fa-fw'></i> <span> Data Provinsi</span></a></li>
					<li><a href='kab'><i class='fas fa-angle-double-right fa-fw'></i> <span> Data Kabupaten</span></a></li>
					<li><a href='instansi'><i class='fas fa-angle-double-right fa-fw'></i> <span> Data Instansi</span></a></li>
				</ul>
			</li>
			<?php } ?>

			<!-- <?php if ($this->session->userdata('level') == 'Admin' ) { ?>
			<li class='treeview'>
				<a href='#'><i class="fas fa-cog side-menu-icon fa-fw"></i><span> Data Master </span><span class='pull-right-container'> <i class='fa fa-angle-down pull-right'></i> </span></a>
				<ul class='treeview-menu'>
					<li><a href='jabatan'><i class='fas fa-angle-double-right fa-fw'></i> <span> Data Jabatan</span></a></li>
					<li><a href='gtk'><i class='fas fa-angle-double-right fa-fw'></i> <span> Data Gtk</span></a></li>
				</ul>
			</li>
			<?php } ?> -->

			<!-- sekolah -->
			
			<?php if ($this->session->userdata('level') == 'Ops' OR $this->session->userdata('level') == 'Super' OR $this->session->userdata('level') == 'Admin' OR $this->session->userdata('level') == 'HD' ) { ?>

			<li class='treeview'>
				<a href='#'><i class="fas fa-server side-menu-icon fa-fw"></i><span> Master Sekolah </span><span class='pull-right-container'> <i class='fa fa-angle-down pull-right'></i> </span></a>
				<ul class='treeview-menu'>
					<li><a href='master_siswa'><i class='fas fa-angle-double-right fa-fw'></i> <span> Input Siswa</span></a></li>
					<?php if ( $this->session->userdata('level') == 'Super' OR $this->session->userdata('level') == 'Admin' ) { ?>
					<li><a href='verval_inputan'><i class='fas fa-angle-double-right fa-fw'></i> <span> Verval Siswa</span></a></li>
					<!--<li><a href='pindah'><i class='fas fa-angle-double-right fa-fw'></i> <span> Pindah Siswa</span></a></li>-->
					<?php } ?>
				</ul>
			</li>
			<?php } ?>

			<?php if ($this->session->userdata('level') == 'Super' OR $this->session->userdata('level') == 'Admin' OR $this->session->userdata('level') == 'HD') { ?>
			<li class="header">LAPORAN</li>
			<li class='treeview'>
				<a href='#'><i class="fas fa-print side-menu-icon fa-fw"></i><span> Laporan </span><span class='pull-right-container'> <i class='fa fa-angle-down pull-right'></i> </span></a>
				<ul class='treeview-menu'>
					<li><a href='master_laporan'><i class='fas fa-angle-double-right fa-fw'></i> <span> Verval Siswa</span></a></li> 
				</ul>
			</li>

			<?php } ?>


		
			<?php if ($this->session->userdata('level') == 'Super' OR $this->session->userdata('level') == 'Admin' OR $this->session->userdata('level') == 'HD') { ?>
			<li class="header">PENGATURAN</li>
			<?php } ?>

			<?php if ($this->session->userdata('level') == 'Super') { ?>

				<!-- pengumuman -->
				<!-- <li class='treeview'><a href='notif'><i class="fas fa-bell side-menu-icon fa-fw"></i> <span> Pemberitahuan</span></a></li> -->

				<li class='treeview'><a href='berkas'><i class="fas fa-file-pdf side-menu-icon fa-fw"></i> <span> Berkas</span></a></li>

				<li class='treeview'><a href='pengumuman'><i class="fas fa-bullhorn side-menu-icon fa-fw"></i> <span> Pengumuman</span></a></li>
				<!-- end -->

				<li class='treeview'>
					<a href='#'><i class="fas fa-users side-menu-icon fa-fw"></i><span> Master Pengguna </span><span class='pull-right-container'> <i class='fa fa-angle-down pull-right'></i> </span></a>
					<ul class='treeview-menu'>
						<li><a href='user'><i class='fas fa-angle-double-right fa-fw'></i> <span> Data Pengguna</span></a></li>
					</ul>
				</li>
				<!-- pengguna -->
				<li class='treeview'>
					<a href='#'><i class="fas fa-users side-menu-icon fa-fw"></i><span> Master Posko </span><span class='pull-right-container'> <i class='fa fa-angle-down pull-right'></i> </span></a>
					<ul class='treeview-menu'>
						<li><a href='posko'><i class='fas fa-angle-double-right fa-fw'></i> <span> Data Posko</span></a></li>
					</ul>
				</li>
				<!-- end -->
				
				<li class='treeview'>
					<a href='pengaturan'><i class="fas fa-tools side-menu-icon fa-fw"></i> <span>Pengaturan</span></a>
				</li>
			<?php } ?>
			
			<?php if ($this->session->userdata('level') == 'HD') { ?>

				<!-- pengumuman -->
				<!-- <li class='treeview'><a href='notif'><i class="fas fa-bell side-menu-icon fa-fw"></i> <span> Pemberitahuan</span></a></li> -->

				<li class='treeview'><a href='pengumuman'><i class="fas fa-bullhorn side-menu-icon fa-fw"></i> <span> Pengumuman</span></a></li>
				<!-- end -->

				<li class='treeview'>
					<a href='#'><i class="fas fa-users side-menu-icon fa-fw"></i><span> Master Pengguna </span><span class='pull-right-container'> <i class='fa fa-angle-down pull-right'></i> </span></a>
					<ul class='treeview-menu'>
						<li><a href='user'><i class='fas fa-angle-double-right fa-fw'></i> <span> Data Pengguna</span></a></li>
					</ul>
				</li>
				<!-- pengguna -->
				<!--<li class='treeview'>-->
				<!--	<a href='#'><i class="fas fa-users side-menu-icon fa-fw"></i><span> Master Posko </span><span class='pull-right-container'> <i class='fa fa-angle-down pull-right'></i> </span></a>-->
				<!--	<ul class='treeview-menu'>-->
				<!--		<li><a href='posko'><i class='fas fa-angle-double-right fa-fw'></i> <span> Data Posko</span></a></li>-->
				<!--	</ul>-->
				<!--</li>-->
				<!-- end -->
				
				<!--<li class='treeview'>-->
				<!--	<a href='pengaturan'><i class="fas fa-tools side-menu-icon fa-fw"></i> <span>Pengaturan</span></a>-->
				<!--</li>-->
			<?php } ?>


			<?php if ($this->session->userdata('level') == 'Admin') { ?>

			<li class='treeview'>
				<a href='#'><i class="fas fa-users side-menu-icon fa-fw"></i><span> Master Pengguna </span><span class='pull-right-container'> <i class='fa fa-angle-down pull-right'></i> </span></a>
				<ul class='treeview-menu'>
					<li><a href='user'><i class='fas fa-angle-double-right fa-fw'></i> <span> Data Pengguna</span></a></li>
				</ul>
			</li>
			<?php } ?>


			


		</ul><!-- /.sidebar-menu -->
	</section>
</aside>
