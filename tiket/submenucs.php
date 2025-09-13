<!DOCTYPE html>
<?php
include "koneksi.php";
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><title>ANTRIAN RS PERMATA PAMULANG</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="10;url=index.html" />
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/css.css">

	<!-- stylesheets css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.min.css">

	<link rel="stylesheet" href="css/et-line-font.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

	<!-- <link href='https://fonts.googleapis.com/css?family=Rajdhani:400,500,700' rel='stylesheet' type='text/css'> -->

<script>
var n;
function startTime() {
	var today = new Date();
	var h = today.getHours();
	var m = today.getMinutes();
	var s = today.getSeconds();
	m = checkTime(m);
	s = checkTime(s);
	document.getElementById('txt').innerHTML =
	today.toDateString() + " " + h + ":" + m + ":" + s;
	var t = setTimeout(startTime, 500);
}
function checkTime(i) {
	if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
	return i;
}

function openWin(n) {
		date = new Date;
		year = date.getFullYear();
		month = date.getMonth();
		months = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'Desember');
		d = date.getDate();
		day = date.getDay();
		days = new Array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
		h = date.getHours();
		if(h<10)
		{
				h = "0"+h;
		}
		m = date.getMinutes();
		if(m<10)
		{
				m = "0"+m;
		}
		s = date.getSeconds();
		if(s<10)
		{
				s = "0"+s;
		}
		result = ''+days[day]+', '+d+' '+months[month]+' '+year+', '+h+':'+m+':'+s;
		
	
  myWindow = window.open("", "myWindow", "width=2,height=1");
  myWindow.document.write("<center><h3>Customer Care</h3> <h1 style='font-size:500%;'>CS" + n +"</h1> " + "<p> Silahkan Mengambil No Antrian Yang Baru Bila No Antrian Anda Terlewat</p>" + result + "</center>");
  myWindow.print();
  myWindow.close();
}
</script>
</head>
<body id="feature" onload="startTime()">

<svg preserveAspectRatio="none" viewBox="0 0 100 100" height="150" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="svgcolor-light">
	<path d="M0 0 L50 100 L100 0 Z"></path>
</svg>

<?php
date_default_timezone_set('Asia/Bangkok');
$date = date("l");
$hour = date("H:i");
$cenvertedTime = date('H:i', strtotime('+10 minutes', strtotime($hour)));
$op = "18:00";
$cl = "07:00";

if ($date == "Sunday") {
	echo "
	<div class='w3-topmiddle' id='feature' >
		<a href='submenucs.php?act=tdkpraktek' class='w3-black btn btn-lg btn-default wow fadeInUp'>
			<h1 >CUSTOMER CARE</h1>
		</a>
	</div>
	";
} elseif ($cenvertedTime > $op || $cenvertedTime < $cl) {
	echo "
	<div id='tutup' class='w3-modal' style='display: block;'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		  <h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		  <h1 style='font-size:200%;'><b>Mohon Maaf Customer Care Sudah Tutup</b></h1><br>
		  <h1 style='font-size:200%;'><b>Silahkan hubungi bagian Pendaftaran</b></h1>
		</div>
	  </div>
	  </center>
	</div>
	<script type='text/javascript'>
		setTimeout(function () { window.location.href = 'index.html'; }, 2000);
	</script>
	";
} else {
	echo "
	<div class='w3-display-topmiddle' id='feature' >
		<a href='submenucs.php?act=rajal' class='btn btn-lg btn-default wow fadeInUp'>
		<h1>AMBIL NOMOR ANTRIAN</h1>
		</a>
	</div>
	";
}

// Use mysqli instead of deprecated mysql extension
if (isset($_GET['act']) && $_GET['act'] == "rajal") {
	$date = date('l');
	$conn = mysqli_connect("localhost", "root", "", "antrian"); // Change credentials as needed
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$cek = mysqli_query($conn, "SELECT COUNT(*) as total FROM tbl_cs");
	$data = mysqli_fetch_assoc($cek);
	$numrow = $data['total'] ?? 0;

	if (($date == "Saturday" && $numrow >= 30) || ($date != "Saturday" && $numrow >= 100)) {
		echo "<div class='w3-modal' style='display: block;'>
				<center>
					<div class='w3-modal-content'>
						<h2>Mohon Maaf, Kuota Antrian Customer Care Telah Habis</h2>
						<h3>Silahkan hubungi Loket Pendaftaran.</h3>
					</div>
				</center>
			  </div>";
	} else {
		$tambah = $numrow + 1;
		mysqli_query($conn, "INSERT INTO tbl_cs (id, keterangan, status, panggil, loket) 
                     VALUES ($tambah, 'CUSTOMER CARE', 0, 0, 0)");
		echo "
		<div id='rajal' class='w3-modal' style='display: block;'>
		<center>
		  <div class='w3-modal-content w3-animate-zoom'>
				<div class='w3-container w3-black w3-display-container'>
					<h1>Antrian</h1>
				</div>
				<div class='w3-container'>
				<h1 style='color:black;'>CUSTOMER CARE</h1>
					<h1 style='font-size:500%;color:black;'><b>CS$tambah</b></h1>
					<h2 style='color:black;'>BPJS </h2> 
				</div>
		  </div>
		  </center>
		  </div>
		  <script type='text/javascript'>
			openWin($tambah);
			setTimeout(function () { window.location.href = 'index.html'; }, 2000);
		  </script>
		";
	}
	mysqli_close($conn);
}
?>
<div class="w3-display-bottommiddle w3-container homebtn" style="padding-bottom:5px;">
	<a href="index.html" class="btn btn-lg btn-default smoothScroll wow fadeInUp hidden-xs">Kembali</a>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/vegas.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
