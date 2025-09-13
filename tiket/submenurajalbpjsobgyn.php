<!DOCTYPE html>

<?php
include "koneksi.php";
?>
<html><head>
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
var myWindow;
var n;
var poli;
var x;

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
function openWin(n,x) {
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
        
	
	if (x == 1){
		dokter = "dr. Taufik Zain, Sp.OG (K)"
	} else if (x == 2) {
		dokter = "dr. M. Rejani, Sp.OG"
	} else if (x == 3) {
		dokter = "dr. Neni Anggraini, Sp.OG"
	} else if (x == 4) {
		dokter = "dr. Tety Ernawati, Sp.OG"
	} else if (x == 5) {
		dokter = "dr. Medisa Diantika, Sp.OG"
	}		
   myWindow = window.open("", "myWindow", "width=2,height=1");
   myWindow.document.write("<center><h3>Rawat Jalan BPJS</h3> <h3>"+ "<h3> Poli Obgyn / " + dokter +"</h3>"+"</h3> <h1 style='font-size:400%;'>B" + n +"</h1>" + "<p> Jika nomor terlewat akan dipanggil setelah 3 nomor</p>" + result + "</center>");
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
	date_default_timezone_set('Asia/Jakarta');
	$date = date("l");
	$days = date("d");
	  
   if ($date != "Sunday"){
	echo"
		<div class='w3-display-middleleft1' id='feature3'>
			<a href='submenurajalbpjsobgyn.php?act=drtaufik' class='btn btn-lg btn-default wow fadeInUp'>
			<p style='font-size:50px;'>dr. Taufik Zain, Sp.OG (K)</p></a>
		</div>
	";
   }else{
	echo"
		<div class='w3-display-middleleft1' id='feature3'>
			<a href='submenurajalbpjsobgyn.php?act=tdkpraktek' class='w3-black btn btn-lg btn-default wow fadeInUp'>
			<p style='color:white;font-size:50px;'>dr. Taufik Zain, Sp.OG (K)</p></a>
		</div>
	";   
   }
   
   if ($date != "Sunday"){
	echo"
	  <div class='w3-display-middleleft2' id='feature3'>
			<a href='submenurajalbpjsobgyn.php?act=drrejani' class='btn btn-lg btn-default wow fadeInUp'>
			<p style='font-size:50px;'>dr. M. Rejani, Sp.OG</p></a>
	  </div>
	  ";
   }else{
	 echo"
	  <div class='w3-display-middleleft2' id='feature3'>
			<a href='submenurajalbpjsobgyn.php?act=tdkpraktek' class='w3-black btn btn-lg btn-default wow fadeInUp'>
			<p style='color:white;font-size:50px;'>dr. M. Rejani, Sp.OG</p></a>
	  </div>
	  ";  
   }
  
	if ($date != "Monday" || $date != "Sunday"){
	 echo"
	 <div class='w3-display-middleright1' id='feature3'>
		<a href='submenurajalbpjsobgyn.php?act=drneni' class='btn btn-lg btn-default wow fadeInUp'>
		<p style='font-size:50px;'>dr. Neni Anggraini, Sp.OG</p></a>
	 </div>
		  ";
	}else{
	 echo"
	 <div class='w3-display-middleright1' id='feature3'>
		<a href='submenurajalbpjsobgyn.php?act=tdkpraktek' class='w3-black btn btn-lg btn-default wow fadeInUp'>
		<p style='color:white;font-size:50px;'>dr. Neni Anggraini, Sp.OG</p></a>
	 </div>
		 ";
	}
 
  
  $sqlobgyn = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Obgyn' AND dokter = '4'");
  $rowobgyn = mysql_num_rows($sqlobgyn); 
  if ($date == "Monday" || $date == "Wednesday" || $date == "Friday"|| $date == "Saturday" | $date == "Tuesday"){
	 if ($rowobgyn < 2 ) {
		 echo"	 
		  <div class='w3-display-middleright2' id='feature3'> 
			<a href='submenurajalbpjsobgyn.php?act=drteti' class='btn btn-lg btn-default wow fadeInUp'>
				<p style='font-size:50px;'>dr. Tety Ernawati, Sp.OG</p>
			</a>
		  </div>";
	 } else {
		 echo"	 
		  <div class='w3-display-middleright2' id='feature3'> 
			<a href='submenurajalbpjsobgyn.php?act=tutup' class='w3-black btn btn-lg btn-default wow fadeInUp'>
				<p style='color:white;font-size:50px;'>dr. Tety Ernawati, Sp.OG</p>
			</a>
		  </div>";
	 }
  } else {
	  echo"	 
		<div class='w3-display-middleright2' id='feature3'> 
		<a href='submenurajalbpjsobgyn.php?act=tdkpraktek' class='w3-black btn btn-lg btn-default wow fadeInUp'>
			<p style='color:white;font-size:50px;'>dr. Tety Ernawati, Sp.OG</p>
		</a>
		</div>";
  }
  
  $sqlobgyn = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Obgyn' AND dokter = '5'");
  $rowobgyn = mysql_num_rows($sqlobgyn); 
  if ($date == "Monday" || $date == "Friday"||  $date == "Wednesday"){
	 if ($rowobgyn < 2 ) {
		 echo"	 
		  <div class='w3-display-topmiddle' id='feature3'> 
			<a href='submenurajalbpjsobgyn.php?act=drmedisa' class='btn btn-lg btn-default wow fadeInUp'>
				<p style='font-size:50px;'>dr. Medisa Diantika, Sp.OG</p>
			</a>
		  </div>";
	 } else {
		 echo"	 
		  <div class='w3-display-topmiddle' id='feature3'> 
			<a href='submenurajalbpjsobgyn.php?act=tutup' class='w3-black btn btn-lg btn-default wow fadeInUp'>
				<p style='color:white;font-size:50px;'>dr. Medisa Diantika, Sp.OG</p>
			</a>
		  </div>";
	 }
  } else {
	  echo"	 
		<div class='w3-display-topmiddle' id='feature3'> 
		<a href='submenurajalbpjsobgyn.php?act=tdkpraktek' class='w3-black btn btn-lg btn-default wow fadeInUp'>
			<p style='color:white;font-size:50px;'>dr. Medisa Diantika, Sp.OG</p>
		</a>
		</div>";
  }
  ?>
    
   <div class="w3-display-topmiddle w3-container">
    <div class="w3-xxxlarge" id="txt"></div>
  </div>

		<div class="w3-display-bottommiddle w3-container homebtn" style="padding-bottom:5px;">
		<a href="submenurajalbpjs2.php?act=menu" class="btn btn-lg btn-default smoothScroll wow fadeInUp hidden-xs">Kembali</a>
	</div>

</div>
 
 <?php 
if ($_GET['act'] == "drtaufik") {
	$cek = mysql_query("SELECT * FROM tbl_bpjs_rajal");
	$cekpoli = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Obgyn' AND dokter = '1' ");
	$numrow = mysql_num_rows($cek);
	$numrowpoli = mysql_num_rows($cekpoli);
	$tambah = $numrow + 1;
	$tambahpoli = $numrowpoli + 1;
	mysql_query("INSERT INTO tbl_bpjs_rajal (id,poli,id_poli,dokter) VALUES ($tambah,'Poli Obgyn',$tambahpoli,'1')");
	echo "
	<div id='rajalpd' class='w3-modal' style='display: block'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		<h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		<h1 style='color:black;'>Rawat Jalan</h1>
		<h1 style='color:black;'>Poli Obgyn</h1>
		  <h1 style='font-size:800%;color:black;'><b>B$tambah</b></h1>
		  <h1 style='color:black;'>BPJS </h1> 
		</div>
	  </div>
	  </center>
	  </div>
	  <script type='text/javascript'>
		openWin($tambah,1);
		setTimeout(function () { window.location.href = 'index.html'; }, 3000);
	  </script>
	  ";
} else if ($_GET['act'] == "drrejani") {
	$cek = mysql_query("SELECT * FROM tbl_bpjs_rajal");
	$cekpoli = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Obgyn' AND dokter = '2' ");
	$numrow = mysql_num_rows($cek);
	$numrowpoli = mysql_num_rows($cekpoli);
	$tambah = $numrow + 1;
	$tambahpoli = $numrowpoli + 1;
	mysql_query("INSERT INTO tbl_bpjs_rajal (id,poli,id_poli,dokter) VALUES ($tambah,'Poli Obgyn',$tambahpoli,'2')");
	echo "
	<div id='rajalpd' class='w3-modal' style='display: block'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		<h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		<h1 style='color:black;'>Rawat Jalan</h1>
		<h1 style='color:black;'>Poli Obgyn</h1>
		  <h1 style='font-size:800%;color:black;'><b>B$tambah</b></h1>
		  <h1 style='color:black;'>BPJS </h1> 
		</div>
	  </div>
	  </center>
	  </div>
	  <script type='text/javascript'>
		openWin($tambah,2);
		setTimeout(function () { window.location.href = 'index.html'; }, 3000);
	  </script>
	  ";
} else if ($_GET['act'] == "drneni") {
	$cek = mysql_query("SELECT * FROM tbl_bpjs_rajal");
	$cekpoli = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Obgyn' AND dokter = '3' ");
	$numrow = mysql_num_rows($cek);
	$numrowpoli = mysql_num_rows($cekpoli);
	$tambah = $numrow + 1;
	$tambahpoli = $numrowpoli + 1;
	mysql_query("INSERT INTO tbl_bpjs_rajal (id,poli,id_poli,dokter) VALUES ($tambah,'Poli Obgyn',$tambahpoli,'3')");
	echo "
	<div id='rajalpd' class='w3-modal' style='display: block'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		<h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		<h1 style='color:black;'>Rawat Jalan</h1>
		<h1 style='color:black;'>Poli Obgyn</h1>
		  <h1 style='font-size:800%;color:black;'><b>B$tambah</b></h1>
		  <h1 style='color:black;'>BPJS </h1> 
		</div>
	  </div>
	  </center>
	  </div>
	  <script type='text/javascript'>
		openWin($tambah,3);
		setTimeout(function () { window.location.href = 'index.html'; }, 3000);
	  </script>
	  ";
} else if ($_GET['act'] == "drteti") {
	$cek = mysql_query("SELECT * FROM tbl_bpjs_rajal");
	$cekpoli = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Obgyn' AND dokter = '4' ");
	$numrow = mysql_num_rows($cek);
	$numrowpoli = mysql_num_rows($cekpoli);
	$tambah = $numrow + 1;
	$tambahpoli = $numrowpoli + 1;
	mysql_query("INSERT INTO tbl_bpjs_rajal (id,poli,id_poli,dokter) VALUES ($tambah,'Poli Obgyn',$tambahpoli,'4')");
	echo "
	<div id='rajalpd' class='w3-modal' style='display: block'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		<h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		<h1 style='color:black;'>Rawat Jalan</h1>
		<h1 style='color:black;'>Poli Obgyn</h1>
		  <h1 style='font-size:800%;color:black;'><b>B$tambah</b></h1>
		  <h1 style='color:black;'>BPJS </h1> 
		</div>
	  </div>
	  </center>
	  </div>
	  <script type='text/javascript'>
		openWin($tambah,4);
		setTimeout(function () { window.location.href = 'index.html'; }, 3000);
	  </script>
	  ";
	  
	  
	  } else if ($_GET['act'] == "drmedisa") {
	$cek = mysql_query("SELECT * FROM tbl_bpjs_rajal");
	$cekpoli = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Obgyn' AND dokter = '5' ");
	$numrow = mysql_num_rows($cek);
	$numrowpoli = mysql_num_rows($cekpoli);
	$tambah = $numrow + 1;
	$tambahpoli = $numrowpoli + 1;
	mysql_query("INSERT INTO tbl_bpjs_rajal (id,poli,id_poli,dokter) VALUES ($tambah,'Poli Obgyn',$tambahpoli,'5')");
	echo "
	<div id='rajalpd' class='w3-modal' style='display: block'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		<h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		<h1 style='color:black;'>Rawat Jalan</h1>
		<h1 style='color:black;'>Poli Obgyn</h1>
		  <h1 style='font-size:800%;color:black;'><b>B$tambah</b></h1>
		  <h1 style='color:black;'>BPJS </h1> 
		</div>
	  </div>
	  </center>
	  </div>
	  <script type='text/javascript'>
		openWin($tambah,5);
		setTimeout(function () { window.location.href = 'index.html'; }, 3000);
	  </script>
	  ";
} else if ($_GET['act'] == "tutup"){
	
	echo "
	<div id='tutup' class='w3-modal' style='display: block;'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		  <h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		  <h1 style='font-size:200%;'><b>Mohon Maaf Antrian Pendaftaran Untuk Poli klinik ini Sudah Tutup</b></h1><br>
		  <h1 style='font-size:200%;'><b>Silahkan hubungi bagian Pendaftaran</b></h1>
		</div>
	  </div>
	  </center>
	</div>
	<script type='text/javascript'>
		setTimeout(function () { window.location.href = 'index.html'; }, 4000);
	  </script>
";
} else if ($_GET['act'] == "tdkpraktek"){
	
	echo "
	<div id='tutup' class='w3-modal' style='display: block;'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		  <h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		  <h1 style='font-size:200%;'><b>Mohon Maaf tidak ada jadwal praktek hari ini</b></h1><br>
		  <h1 style='font-size:200%;'><b>Silahkan hubungi bagian Pendaftaran</b></h1>
		</div>
	  </div>
	  </center>
	</div>
	<script type='text/javascript'>
		setTimeout(function () { window.location.href = 'index.html'; }, 4000);
	  </script>
";
}

?>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>


<script src="js/wow.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>

</body>

</html>