<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cloud | <?=$title;?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Vendor-->
    <link rel='stylesheet' href='<?= site_url();?>/dist/bootstrap/css/bootstrap.min.css' />
    <link rel='stylesheet' href='<?= site_url();?>/vendor/bootstrap/css/sira2.css' />

    <link rel='stylesheet' href='<?= site_url();?>/plugins/fontawesome/css/all.css' />
	<link rel='stylesheet' href='<?= site_url();?>/plugins/select2/select2.min.css' />
	<link rel='stylesheet' href='<?= site_url();?>/dist/css/AdminLTE.css' />
	<link rel='stylesheet' href='<?= site_url();?>/dist/css/skins/1skin-green-light.min.css' />
	<link rel='stylesheet' href='<?= site_url();?>/plugins/jQueryUI/jquery-ui.css'>
	<link rel='stylesheet' href='<?= site_url();?>/plugins/iCheck/square/green.css' />
	<link rel='stylesheet' href='<?= site_url();?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'>
	<link rel='stylesheet' href='<?= site_url();?>/plugins/datatables/dataTables.bootstrap.css' />
	<link rel='stylesheet' href='<?= site_url();?>/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css' />
	<link rel='stylesheet' href='<?= site_url();?>/plugins/datatables/extensions/Select/css/select.bootstrap.css' />
	<link rel='stylesheet' href='<?= site_url();?>/plugins/animate/animate.min.css'>
	<link rel='stylesheet' href='<?= site_url();?>/plugins/datetimepicker/jquery.datetimepicker.css' />
	<link rel='stylesheet' href='<?= site_url();?>/plugins/notify/css/notify-flat.css' />
	<link rel='stylesheet' href='<?= site_url();?>/plugins/sweetalert2/dist/sweetalert2.min.css'>
	<link rel='stylesheet' href='<?= site_url();?>/plugins/toastr/toastr.min.css'>
	<link rel='stylesheet' href='<?= site_url();?>/dist/css/costum.css' />
	<script src='<?= site_url();?>/plugins/tinymce/tinymce.min.js'></script>
	<script src='<?= site_url();?>/plugins/jQuery/jquery-3.1.1.min.js'></script>
	<script src='<?= site_url();?>/plugins/datatables/jquery.dataTables.min.js'></script>
	<script src='<?= site_url();?>/plugins/datatables/dataTables.bootstrap.min.js'></script>
	<script src='<?= site_url();?>/plugins/datatables/extensions/Select/js/dataTables.select.min.js'></script>
	<script src='<?= site_url();?>/plugins/datatables/extensions/Select/js/select.bootstrap.min.js'></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    
    <link rel="shortcut icon" href="<?=__img('logo/sisy.png');?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?=__img('logo/sisy.png');?>" type="image/png">
    
    <noscript>
    <style>html{display:none;}</style>
    Sorry, your browser does not support JavaScript!
    </noscript>

    <style>
        .kiri-bar{
            display:inline-block;
            /* border: 1px solid red; */
            height:100%;
            overflow:auto;
            z-index: 999;
        }

        .tabled {
            display:block;
            /* border: 1px solid red; */
            width:100%;
            overflow:auto;
            z-index: 999;
        }

        .auto-cabdin{
            display:block;
            width:100%;
            height: 200px;
            overflow:scroll;
            z-index: 999;
        }

        .pengguna{
            padding: 10px;
        }

    </style>

    <style>
        #notifications {

            cursor: pointer;
            position: fixed;
            right: 0px;
            z-index: 9999;
            top: 20px;
            margin-bottom: 22px;
            margin-right: 15px;
            min-width: 50px;
        }

        #notif_hapus {
            cursor: pointer;
            position: fixed;
            right: 0px;
            z-index: 9999;
            bottom: -20px;
            margin-bottom: 22px;
            margin-right: 15px;
            min-width: 30px;
        }
    </style>

    <style>
        .btn-saya {
		background-color: #068517;
		color: #ffffff;
		/* font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; */
		position: relative;
		width: 100%;
		height: 25px;
		border: 0;
		border-radius: 5px;
		outline: 0;
		overflow: hidden;
		transition: 0.2s ease-in-out;
		box-shadow: 0 3px 3px rgb(0, 0, 0, 0.6);
	}
        .btn-saya:hover {
		color: #ffffff;
		cursor: pointer;
		/* transform: scale(1.08); */
		box-shadow: 0 10px 20px rgba(0, 0, 0, 0.6);
	}
	.btn-saya:hover .icon {
		top: 150%;
		animation: moveFromTop 0.15s linear forwards;
		animation-delay: 0.15s;
	}
    .icon {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		transition: 0.15s linear;
	}
    @keyframes moveFromTop {
		0% {
			top: -50%;
		}
		100% {
			top: 50%;
		}
	}
    </style>


</head>

<div class="modal fade" id="modalversidb" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Kesalahan Versi Database</h5>

			</div>
			<div class="modal-body">
				Mohon maaf versi database anda tidak sesuai dengan database versi ini
				mohon gunakan versi terbaru !!
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Oke Mengerti</button>

			</div>
		</div>
	</div>
</div>

<body class='hold-transition skin-green-light fixed <?= $sidebar ?>'>
    <div id='pesan'></div>  
	<div class='loader'></div>
	<div class='wrapper'>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            <?php $this->load->view($navbar) ?>
            <?php $this->load->view($sidebar) ?>
            
            <div class="main-content">
                <?php $this->load->view($content) ?>
            </div>

            <footer class='main-footer hidden-xs'>
                <div class='container'>
                    <div class='pull-left hidden-xs'>
                        <strong>
                            <span id='end-sidebar'>
                            &copy; <?=date('Y')?> - Developer <strong><?=master('Aauthor')?></strong> | versi <?=master('version')?>
                            </span>
                        </strong>
                    </div>
                </div>

            </footer>

        
    </div>

    
    <div class="modal fade" id="welcome" data-backdrop="static" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body mt-4 text-center">
                    <h3>Selamat Datang <br> <strong>SISY Cloud</strong></h3>
                    <p>Developer - Tim IT Notfound Indonesia</p>
                    <img src="<?=__img('undraw_secure_login_pdn4.svg')?>" alt="" width="200" class="bawah" ><br>
                    <p><b>Silahkan perbaharui akun anda agar dapat menggunakan <em>SISYCloud</em>. <br> Terima Kasih</b></p>
                    <a href="perbaharui">
                    <button class="btn btn-sm btn-flat btn-warning" ><i class="fas fa-sync"></i> Perbaharui akun</button>
                    <br >
                    <a href='keluaraja' class='btn btn-sm btn-danger btn-flat' style="margin-top:10px;"><i class="fas fa-power-off"></i> Keluar</a>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="informasi" data-backdrop="static" role="dialog">
    <div class='modal-dialog modal-md'>
        <div class='modal-content'>
            <div class='modal-header bg-white'>
                <button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
                <p class='modal-title'><i class="fas fa-fw fa-info"></i> Informai Pengembang Sistem</p>
            </div>
            <div class="card-body table-responsive pengguna">
                <table id='example2' class='table  table-striped '>
                    <p>Sisy - untuk pendataan Beasiswa Anak Yatim dan Piatu pada Bidang Pembinaan Sekolah Menengah Kejuruan</p>
                    <tr>
                        <th>Developer</th><td>:</td><td>Dwi Satria Pangestu, A.Md.Kom (Programmer) <br> Imannudin, S.Kom (Administrasi) <br> Yasir (Monitoring) </td>
                    </tr>

                    <tr>
                        <th>Core</th><td>:</td><td>Codeigniter Versi 3.1.13</td>
                    </tr>

                    <tr>
                        <th>Job</th><td>:</td><td>- Tim IT Bidang PSMK Dinas Pendidikan Aceh<br> - Tim IT SMK Negeri 1 Simpang Kanan <br> - Notfound Indonesia </td>
                    </tr>

                    <tr>
                        <th>Website</th><td>:</td><td><a href="https://notfound.id">Not Found Indonesia</a></td>
                    </tr>
                </table>
        
                <div class='modal-footer'>
                    <div class='box-tools pull-right '>
                        <button type='button' class='btn btn-danger btn-sm pull-left' data-dismiss='modal'>Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src='<?= site_url();?>/dist/bootstrap/js/bootstrap.min.js'></script>
	<script src='<?= site_url();?>/plugins/fastclick/fastclick.js'></script>
	<script src='<?= site_url();?>/dist/js/adminlte.min.js'></script>
	<script src='<?= site_url();?>/dist/js/app.min.js'></script>
	<script src='<?= site_url();?>/plugins/datetimepicker/build/jquery.datetimepicker.full.min.js'></script>
	<!-- <script src='<?= site_url();?>/plugins/slimScroll/jquery.slimscroll.min.js'></script> -->
	<script src='<?= site_url();?>/plugins/iCheck/icheck.min.js'></script>
	<script src='<?= site_url();?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'></script>
	<script src='<?= site_url();?>/plugins/select2/select2.min.js'></script>
	<script src='<?= site_url();?>/plugins/tableedit/jquery.tabledit.js'></script>
	<script src='<?= site_url();?>/plugins/toastr/toastr.min.js'></script>
	<script src='<?= site_url();?>/plugins/notify/js/notify.js'></script>
	<script src='<?= site_url();?>/plugins/chartjs/dist/Chart.js'></script>
	<script src='<?= site_url();?>/plugins/sweetalert2/dist/sweetalert2.min.js'></script>
	<script src='<?= site_url();?>/plugins/MathJax-2.7.3/MathJax.js?config=TeX-AMS_HTML-full'></script>
    <script src='<?= site_url();?>/plugins/tinymce/tinymce.min.js'></script>
    

    <script>
    $(document).ready(function() {
        $('#example1').DataTable({
            select: true
        });
        $('#example2').DataTable({
            select: true
        });
        $('#example3').DataTable({
            select: true
        });
    });
    
</script>

    <script>
    $('.dropdown-toggle').dropdown()
    </script>

    <script>
    $(document).ready(function(){
        $("#provinsi").change(function (){
            var url = "<?php echo site_url('admin/user/add_ajax_kab');?>/"+$(this).val();
            $('#kabupaten').load(url);
            return false;
        })

        $("#kabupaten").change(function (){
            var url = "<?php echo site_url('admin/user/add_ajax_instansi');?>/"+$(this).val();
            $('#instansi').load(url);
            return false;
        })

        $("#kabupaten").change(function (){
            var url = "<?php echo site_url('admin/user/add_ajax_sek');?>/"+$(this).val();
            $('#sekolah').load(url);
            return false;
        })

        $("#sekolah").change(function (){
            var url = "<?php echo site_url('admin/user/add_ajax_siswa');?>/"+$(this).val();
            $('#siswa').load(url);
            return false;
        })

        // $("#sekolah").change(function (){
        //     var url = "<?php echo site_url('admin/sekolah/add_ajax_jur');?>/"+$(this).val();
        //     $('#jurusan').load(url);
        //     return false;
        // })

        // $("#sekolah").change(function (){
        //     var url = "<?php echo site_url('admin/sekolah/add_ajax_jur');?>/"+$(this).val();
        //     $('#jurusan2').load(url);
        //     return false;
        // })
    });
</script>


<!-- pindah -->
<script>
    $(document).ready(function(){
        $("#provinsi1").change(function (){
            var url = "<?php echo site_url('admin/pindah/add_ajax_kab');?>/"+$(this).val();
            $('#kabupaten1').load(url);
            return false;
        })

        $("#kabupaten1").change(function (){
            var url = "<?php echo site_url('admin/pindah/add_ajax_instansi');?>/"+$(this).val();
            $('#instansi1').load(url);
            return false;
        })

        $("#kabupaten1").change(function (){
            var url = "<?php echo site_url('admin/pindah/add_ajax_sek');?>/"+$(this).val();
            $('#sekolah1').load(url);
            return fals1e;
        })

        $("#kabupaten1").change(function (){
            var url = "<?php echo site_url('admin/pindah/add_ajax_admin');?>/"+$(this).val();
            $('#admin1').load(url);
            return fals1e;
        })

        $("#sekolah1").change(function (){
            var url = "<?php echo site_url('admin/pindah/add_ajax_siswa');?>/"+$(this).val();
            $('#siswa1').load(url);
            return false;
        })

        // $("#sekolah").change(function (){
        //     var url = "<?php echo site_url('admin/sekolah/add_ajax_jur');?>/"+$(this).val();
        //     $('#jurusan').load(url);
        //     return false;
        // })

        // $("#sekolah").change(function (){
        //     var url = "<?php echo site_url('admin/sekolah/add_ajax_jur');?>/"+$(this).val();
        //     $('#jurusan2').load(url);
        //     return false;
        // })
    });
</script>


<!--  -->

<script>
    $(document).idle({
        onIdle: function(){
            window.location="on";                
        },
        idle: 10
    });
</script>

<script>
    $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
        $("#check-all").click(function(){ // Ketika user men-cek checkbox all
        if($(this).is(":checked")) // Jika checkbox all diceklis
            $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
        else // Jika checkbox all tidak diceklis
            $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
        });
        
        $("#btn-delete").click(function(){ // Ketika user mengklik tombol delete
        var confirm = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?"); // Buat sebuah alert konfirmasi
        
        if(confirm) // Jika user mengklik tombol "Ok"
            $("#form-delete").submit(); // Submit form
        });
    });
</script>


    <script type="text/javascript">
		$(document).ready(function(){
            $('#kode').on('input',function(){
                
                var kode=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('admin/sekolah/get_sarana')?>",
                    dataType : "JSON",
                    data : {kode: kode},
                    cache:false,
                    success: function(data){
                        $.each(data,function(kode, nama){
                            $('[name="nama"]').val(data.nama);
                            // $('[name="j_anggaran"]').val(data.j_anggaran);
                            // $('[name="sk"]').val(data.sk);
                            // $('[name="tahun"]').val(data.tahun);
                            // $('[name="status"]').val(data.status);
                            
                        });
                        
                    }
                });
                return false;
        });

		});
	</script>

<script type="text/javascript">
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

    </script>

    
    <script>
        $('#notifications').slideDown('slow').delay(4000).slideUp('slow');
    </script>
    <script>
        $('#notif_hapus').slideDown('slow').delay(2000).slideUp('slow');
    </script>
    
    <script>
        tinymce.init({
            selector: '#txtpengumuman',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools uploadimage paste'
            ],

            toolbar: 'bold italic fontselect fontsizeselect | alignleft aligncenter alignright bullist numlist  backcolor forecolor | emoticons code | imagetools link image paste ',
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
            paste_data_images: true,
            paste_as_text: true,
            images_upload_handler: function(blobInfo, success, failure) {
                success('data:' + blobInfo.blob().type + ';base64,' + blobInfo.base64());
            },
            image_class_list: [{
                title: 'Responsive',
                value: 'img-responsive'
            }],
        });
    </script>

<script type="text/javascript">
    $("#input1,#input2").keyup(function() {
        var val1 = $('#input1').val(); 
	var val2 = $('#input2').val(); 
	var kali = Number(val1) * Number(val2);
	if ( val1 != "" && val2 != "" ) {
    $('#input3').val(kali);
	}
})
</script>
    

<script>
    $(document).ready(function() {
    $('#post').summernote({
        placeholder: 'Silahkan tulis sesuatu',
        tabsize: 2,
        height: 200
    });
    });
    </script>

    <!-- <script>
    $(document).ready(function() {
        $('#posts').summernote({
            placeholder: "Ketikan sesuatu disini . . .",
            height: '100'
    });
    });
</script> -->

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#prev_foto').attr('src', e.target.result);

                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function() {
            $('#file_gambar').change(function() {
                readURL(this);
            });
        });
    </script>

<script>
// Set the date we're counting down to
var countDownDate = new Date("December  23, 2021 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
    var now = new Date().getTime();

  // Find the distance between now and the count down date
    var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
    document.getElementById("demo").innerHTML = days + " Hari " + hours + " Jam "
    + minutes + " Manit " + seconds + " Detik ";

  // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "Jadwal Realisasi Sudah Cut Off, Tunggu Jadwal Berikutnya.";
    }
}, 1000);
</script>

<script type="text/javascript">
    $(document).ready(function(){

        // Format mata uang.
        $( '.uang' ).mask('000.000.000.000.000', {reverse: true});

    })
</script>



<script>
		$('.loader').fadeOut('slow');
		$(function() {
			$('#textarea').wysihtml5()
		});
		var autoRefresh = setInterval(
			function() {
				$('#waktu').load('../_load.php?pg=waktu');
				// $('#log-list').load('../admin/_load.php?pg=log');
				$('#pengumuman').load('../admin/_load.php?pg=pengumuman');
			}, 1000
		);
</script>

<script type="text/javascript">
		var url = window.location;
		// for sidebar menu entirely but not cover treeview
		$('ul.sidebar-menu a').filter(function() {
			return this.href == url;
		}).parent().addClass('active');

		// for treeview
		$('ul.treeview-menu a').filter(function() {
			return this.href == url;
		}).closest('.treeview').addClass('active');
	</script>

<script type="text/javascript">
    var detik = <?php echo date('s'); ?>;
    var menit = <?php echo date('i'); ?>;
    var jam   = <?php echo date('H'); ?>;
    
function clock()
{
    if (detik!=0 && detik%60==0) {
        menit++;
        detik=0;
    }
    second = detik;
        
    if (menit!=0 && menit%60==0) {
        jam++;
        menit=0;
    }
    minute = menit;
        
    if (jam!=0 && jam%24==0) {
        jam=0;
    }
    hour = jam;
        
    if (detik<10){
        second='0'+detik;
    }
    if (menit<10){
        minute='0'+menit;
    }
        
    if (jam<10){
        hour='0'+jam;
    }
    waktu = hour+':'+minute+':'+second;
        
    document.getElementById("clock").innerHTML = waktu;
    detik++;
}

    setInterval(clock,1000);
</script>

<script type="text/javascript">
	$(document).ready(function(){
			$('#instansi1').on('input',function(){
			
			var instansi=$(this).val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('admin/Instansi/get_instansi')?>",
				dataType : "JSON",
				data : {instansi: instansi},
				cache:false,
				success: function(data){
					$.each(data,function(instansi, lat_kantor, long_kantor){
						$('[name="lat_kantor"]').val(data.lat_kantor);
						$('[name="long_kantor"]').val(data.long_kantor);
						// $('[name="harga"]').val(data.harga_jual);
						// $('[name="stok"]').val(data.stok);
						
					});
					
				}
			});
			return false;
		});

	});
</script>




<script type="text/javascript">
	$(document).ready(function(){
			$('#instansi').on('input',function(){
			
			var instansi=$(this).val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('admin/Instansi/get_instansi')?>",
				dataType : "JSON",
				data : {instansi: instansi},
				cache:false,
				success: function(data){
					$.each(data,function(instansi, lat_kantor, long_kantor){
						$('[name="lat_kantor"]').val(data.lat_kantor);
						$('[name="long_kantor"]').val(data.long_kantor);
						// $('[name="harga"]').val(data.harga_jual);
						// $('[name="stok"]').val(data.stok);
						
					});
					
				}
			});
			return false;
		});

	});
</script>
<!-- <script>
	window.print();
</script> -->
</body>
<?php if ($this->session->userdata('status') == '0' ) { ?>
<script>
    $('#welcome').modal('show');
</script>
<?php } ?>

</html>
