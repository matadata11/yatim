<?php
require("../config/config.default.php");
require("../config/config.function.php");
require("../config/functions.crud.php");
$id_file = (isset($_SESSION['id_file'])) ? $_SESSION['id_file'] : 0;
if (isset($_GET['pg'])) {
	$pg = $_GET['pg'];
	if ($pg == 'waktu') {
		echo $waktu;
	} elseif ($pg == 'log') {
		$logC = 0;
		echo "<div class='direct-chat-messages' style='height:270px'>";
		$logQ = mysqli_query($koneksi, "SELECT * FROM log ORDER BY date DESC limit 6");
		while ($log = mysqli_fetch_array($logQ)) {
			$logC++;
			$file = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM log WHERE id_file='$log[id_file]'"));
			if ($log['type'] == 'External' || $log['type'] == 'logout') {
				($log['type'] == 'External') ? $icon = 'fa-sign-in' : $icon = 'fa-sign-out';
				($log['type'] == 'External') ? $color = 'text-green' : $color = 'text-red';
				echo "
						<div class='direct-chat-msg' >
							<div class='direct-chat-info clearfix'>
								<span class='direct-chat-name pull-left'>$log[fullname]</span>
								<span class='direct-chat-timestamp pull-right'>" . timeAgo($log['date']) . "</span>
							</div><!-- /.direct-chat-info -->
							<span class='direct-chat-img'><img src='../dist/img/support-custom.png' width=35></span><!-- /.direct-chat-img -->
							<div class='direct-chat-text'>
								<a class='$color'><i class='fa $icon'></i> " . ucfirst($log['keterangan']). "&nbsp;". ucfirst($log['berkas']) . "</a>
							</div><!-- /.direct-chat-text -->
						</div><!-- /.direct-chat-msg -->
					";
			} else {
				($log['type'] == 'testongoing') ? $icon = 'fa-pencil-square-o' : $icon = 'fa-check-square-o';
				echo "
						<div class='direct-chat-msg right'>
							<div class='direct-chat-info clearfix'>
								<span class='direct-chat-name pull-right'>$siswa[nama]</span>
								<span class='direct-chat-timestamp pull-left'>" . timeAgo($log['date']) . "</span>
							</div><!-- /.direct-chat-info -->
							<span class='direct-chat-img'><img src='../dist/img/avatar5.png' width=45></span><!-- /.direct-chat-img -->
							<div class='direct-chat-text'>
								<span><i class='fa $icon'></i> " . ucfirst($log['text']) . "...</span>
							</div><!-- /.direct-chat-text -->
						</div><!-- /.direct-chat-msg -->
					";
			}
		}
		if ($logC == 0) {
			echo "<p class='text-center'>Tidak ada aktifitas.</p>";
		}
		echo "</div>";
	} elseif ($pg == 'pengumuman') {
		$logC = 0;
		echo "<ul class='timeline'><li class='time-label' style='margin-top:5px;margin-left:5px;'><span class='bg-blue'>- Terbaru -</span></li>";
		$logQ = mysqli_query($koneksi, "SELECT * FROM mt_pengumuman ORDER BY date DESC");

		while ($log = mysqli_fetch_array($logQ)) {
			$logC++;
			$user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mt_admin WHERE id_admin='$log[user]'"));
			if ($log['type'] == 'internal') {
				$bg = 'bg-green';
				$color = 'text-green';
			} else {
				$bg = 'bg-blue';
				$color = 'text-blue';
			}
			echo "
						
						
						<!-- timeline time label -->
						
						<li><i class='fa fa-envelope $bg'></i>
						<div class='timeline-item'>
						<span class='time'> <i class='fa fa-calendar'></i> " . buat_tanggal('d M Y', $log['date']) . " <i class='fa fa-clock-o'></i> " . buat_tanggal('H:i:s', $log['date']) . "</span>
						<h3 class='timeline-header' style='background-color:#f9f0d5'><a class='$color' href='#'>$log[judul]</a> <small> $log[pengumuman]</small>
						
						</h3>
						<div class='timeline-body'>
						" . ucfirst($log['text']) . "	
						</div>
						
						</div>
						</li>
            
						
					";
		}
		if ($logC == 0) {
			echo "<p class='text-center'>Belum ada pengumuman.</p>";
		}
		echo "</ul>";
	} elseif ($pg == 'pengumumansiswa') {
		$logC = 0;
		echo "<ul class='timeline'><br>";
		$logQ = mysqli_query($koneksi, "SELECT * FROM mt_pengumuman where type='eksternal' ORDER BY date DESC");

		while ($log = mysqli_fetch_array($logQ)) {
			$logC++;
			$user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mt_admin WHERE id_admin='$log[user]'"));
			if ($log['type'] == 'internal') {
				$bg = 'bg-green';
				$color = 'text-green';
			} else {
				$bg = 'bg-blue';
				$color = 'text-blue';
			}
			echo "
						
						
						<!-- timeline time label -->
						
						<li><i class='fa fa-envelope $bg'></i>
						<div class='timeline-item'>
						<span class='time'> <i class='fa fa-calendar'></i> " . buat_tanggal('d-m-Y', $log['date']) . " <i class='fa fa-clock-o'></i> " . buat_tanggal('h:i', $log['date']) . "</span>
						<h3 class='timeline-header' style='background-color:#f9f0d5'><a class='$color' href='#'>$log[judul]</a> <small> $user[fullname]</small>
						
						</h3>
						<div class='timeline-body'>
						" . ucfirst($log['text']) . "	
						</div>
						
						</div>
						</li>
            
						
					";
		}
		if ($logC == 0) {
			echo "<p class='text-center'>Tidak ada aktifitas.</p>";
		}
		echo "</ul>";
	} elseif ($pg == 'token') {
		function create_random($length)
		{
			$data = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$string = '';
			for ($i = 0; $i < $length; $i++) {
				$pos = rand(0, strlen($data) - 1);
				$string .= $data[$pos];
			}
			return $string;
		}
		$token = create_random(6);
		$now = date('Y-m-d H:i:s');
		echo $token;
		$cek = mysqli_num_rows(mysqli_query($koneksi, "select * from token"));
		if ($cek <> 0) {
			$query = mysqli_fetch_array(mysqli_query($koneksi, "select time from token"));
			$time = $query['time'];
			$tgl = buat_tanggal('H:i:s', $time);
			$exec = mysqli_query($koneksi, "update token set token='$token', time='$now' where  id_token='1'");
		} else {
			$exec = mysqli_query($koneksi, "INSERT INTO token (token,masa_berlaku) VALUES ('$token','00:15:00')");
		}
	}
}
