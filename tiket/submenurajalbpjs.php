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
		poli = "Poli Penyakit Dalam"
	} else if (x == 2) {
		poli = "Poli Mata"
	} else if (x == 3) {
		poli = "Poli Syaraf"
	} else if (x == 4) {
		poli = "Poli Rehab Medis"
	} else if (x == 5) {
		poli = "Poli Bedah"
	} else if (x == 6) {
		poli = "Poli Jantung"
	}
   myWindow = window.open("", "myWindow", "width=2,height=1");
   myWindow.document.write("<center><h3>Rawat Jalan BPJS</h3> <h3>"+ poli +"</h3> <h1 style='font-size:500%;'>B" + n +"</h1> " + "<p> Silahkan Mengambil No Antrian Yang Baru Bila No Antrian Anda Terlewat</p>" + result + "</center>");
   myWindow.print();
   myWindow.close();
}
</script>
</head>
<body id="feature" onload="startTime()">

	<svg preserveAspectRatio="none" viewBox="0 0 100 100" height="150" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="svgcolor-light">
        <path d="M0 0 L50 100 L100 0 Z"></path>
      </svg>
  
	<div class="w3-display-middleleft1" id="feature3" >
	  <a href="submenurajalbpjsinternis.php?act=menu" class="btn btn-lg btn-default wow fadeInUp">
			<p>POLI PENYAKIT DALAM</p>
	  </a>
	</div>
	  
  <?php
   date_default_timezone_set('Asia/Jakarta');
  $date = date("l");
  /*$sqlinternis = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Penyakit Dalam'");
  $rowinternis = mysql_num_rows($sqlinternis);
if ($rowinternis < 10 ){ 
	  echo"
	  <div class='w3-display-middleleft1 w3-xxxxlarge'>
	  <a href='submenurajalbpjsinternis.php?act=polipd'>
		<p><button class='w3-button w3-black' style='border-radius:10%;'> &nbsp POLI PENYAKIT &nbsp<br>DALAM</button></p>
	  </a>
	  </div>";
  } else {
	   echo"
	   <div class='w3-display-middleleft1 w3-xxxxlarge'>
	  <a href='submenurajalbpjs.php?act=tutup'>
		<p><button class='w3-button w3-grey' style='border-radius:10%;'> &nbsp POLI PENYAKIT &nbsp<br>DALAM</button></p>
	  </a>
	  </div>";
  }*/
  $sqlmata = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Mata'");
  $rowmata = mysql_num_rows($sqlmata);
   if ($date == "Monday" || $date == "Thursday" || $date == "Wednesday" || $date == "Tuesday" || $date == "Friday"){
	  if ($rowmata < 25 ){
		  echo"
		  <div class='w3-display-middleleft2' id='feature3'>
		  <a href='submenurajalbpjs.php?act=polimata' class='btn btn-lg btn-default wow fadeInUp'>
				<p>POLI MATA</p>
		  </a>
		  </div> ";
	  } else {
		   echo"
			 <div class='w3-display-middleleft2' id='feature3'>
		  <a href='submenurajalbpjs.php?act=tutup' class='w3-black btn btn-lg btn-default wow fadeInUp'>
				<p>POLI MATA</p>
		  </a>
		  </div>";
	  } 
   } else {
	     echo"
	  <div class='w3-display-middleleft2' id='feature3'>
	  <a href='submenurajalbpjs.php?act=tdkpraktek' class='w3-black btn btn-lg btn-default wow fadeInUp'>
		<p>POLI MATA</p>
	  </a>
		</div>";
   }

   $sqljantung = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Jantung'");
  $rowjantung = mysql_num_rows($sqljantung);
   if ($date == "Monday" || $date == "Thursday" || $date == "Wednesday" || $date == "Tuesday" || $date == "Friday"){
	  if ($rowjantung < 25 ){
		  echo"
		  <div class='w3-display-middleright3' id='feature3'>
		  <a href='submenurajalbpjs.php?act=polijantung' class='btn btn-lg btn-default wow fadeInUp'>
				<p>POLI JANTUNG</p>
		  </a>
		  </div> ";
	  } else {
		   echo"
			 <div class='w3-display-middleright3' id='feature3'>
		  <a href='submenurajalbpjs.php?act=tutup' class='w3-black btn btn-lg btn-default wow fadeInUp'>
				<p>POLI JANTUNG</p>
		  </a>
		  </div>";
	  } 
   } else {
	     echo"
	  <div class='w3-display-middleright3' id='feature3'>
	  <a href='submenurajalbpjs.php?act=tdkpraktek' class='w3-black btn btn-lg btn-default wow fadeInUp'>
		<p>POLI JANTUNG</p>
	  </a>
		</div>";
   }
  ?>
  
  <div class="w3-display-middleleft3" id="feature3">
	  <a href="submenurajalbpjssaraf.php?act=menu" class="btn btn-lg btn-default wow fadeInUp">
			<p>POLI SYARAF</p>
	  </a>
	</div>
 
  
  
  <div class="w3-display-middleright1" id="feature3">
	  <a href="submenurajalbpjsfisio.php?act=menu" class="btn btn-lg btn-default wow fadeInUp">
			<p>REHAB MEDIS</p>
	  </a>
	</div>
  
   <?php
 /* $sqlrehab = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Rehab Medis'");
  $rowrehab = mysql_num_rows($sqlrehab);
  if ($rowrehab < 17 ){
	  echo"
	  <div class='w3-display-middleright1' id='feature3'>
	  <a href='submenurajalbpjs.php?act=polirehab' class='btn btn-lg btn-default wow fadeInUp'>
			<p>REHAB MEDIS</p>
	  </a>
	  </div>";
  } else {
	  echo"
	  <div class='w3-display-middleright1' id='feature3'>
	  <a href='submenurajalbpjs.php?act=tutup' class='w3-black btn btn-lg btn-default wow fadeInUp'>
			<p>REHAB MEDIS</p>
	  </a>
	  </div>";
  } */
  echo"
  <div class='w3-display-middleright2' id='feature3'>
  <a href='submenurajalbpjs.php?act=polibedah' class='btn btn-lg btn-default wow fadeInUp'>
		<p>POLI BEDAH</p>
  </a>
  </div>
  <div class='w3-display-bottomright' id='feature3'>
		<a href='submenurajalbpjs2.php?act=menu' class='btn btn-lg btn-default wow fadeInUp'>
			<p>BERIKUT >></p>
		</a>
  </div>
  ";
  ?>
  <div class="w3-display-topmiddle w3-container">
    <div class="w3-xxxlarge" id="txt"></div>
	</div>
	
	<div class="w3-display-bottommiddle w3-container homebtn" style="padding-bottom:5px;">
		<a href="submenubpjs.php?act=menu" class="btn btn-lg btn-default smoothScroll wow fadeInUp hidden-xs">Kembali</a>
	</div>

</div>

<!-- Rajal Modal -->
<?php
if ($_GET['act'] == "polipd") {
	$cek = mysql_query("SELECT * FROM tbl_bpjs_rajal");
	$cekpoli = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Penyakit Dalam'");
	$numrow = mysql_num_rows($cek);
	$numrowpoli = mysql_num_rows($cekpoli);
	$tambah = $numrow + 1;
	$tambahpoli = $numrowpoli + 1;
	mysql_query("INSERT INTO tbl_bpjs_rajal (id,poli,id_poli) VALUES ($tambah,'Poli Penyakit Dalam',$tambahpoli)");
	echo "
	<div id='rajalpd' class='w3-modal' style='display: block'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		<h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		<h1>Rawat Jalan</h1>
		<h1>Poli Penyakit Dalam</h1>
		  <h1 style='font-size:800%;'><b>B$tambah</b></h1>
		  <h1>BPJS </h1> 
		</div>
	  </div>
	  </center>
	  </div>
	  <script type='text/javascript'>
		openWin($tambah,1);
		setTimeout(function () { window.location.href = 'index.html'; }, 3000);
	  </script>
	  ";
} else if ($_GET['act'] == "polimata"){
	$cek = mysql_query("SELECT * FROM tbl_bpjs_rajal");
	$cekpoli = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Mata'");
	$numrow = mysql_num_rows($cek);
	$numrowpoli = mysql_num_rows($cekpoli);
	$tambah = $numrow + 1;
	$tambahpoli = $numrowpoli + 1;
	mysql_query("INSERT INTO tbl_bpjs_rajal (id,poli,id_poli) VALUES ($tambah,'Poli Mata',$tambahpoli)");
	echo "
	<div id='rajalmata' class='w3-modal' style='display: block;'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		   <h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		<h1>Rawat Jalan</h1>
		<h1>Poli Mata</h1>
		  <h1 style='font-size:800%;'><b>B$tambah</b></h1>
		  <h1>BPJS </h1> 
		</div>
	  </div>
	  </center>
	  </div>
	   <script type='text/javascript'>
		openWin($tambah,2);
		setTimeout(function () { window.location.href = 'index.html'; }, 3000);
	  </script>
	  ";

} else if ($_GET['act'] == "polijantung"){
	$cek = mysql_query("SELECT * FROM tbl_bpjs_rajal");
	$cekpoli = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Jantung'");
	$numrow = mysql_num_rows($cek);
	$numrowpoli = mysql_num_rows($cekpoli);
	$tambah = $numrow + 1;
	$tambahpoli = $numrowpoli + 1;
	mysql_query("INSERT INTO tbl_bpjs_rajal (id,poli,id_poli) VALUES ($tambah,'Poli Jantung',$tambahpoli)");
	echo "
	<div id='rajaljantung' class='w3-modal' style='display: block;'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		   <h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		<h1>Rawat Jalan</h1>
		<h1>Poli Jantung</h1>
		  <h1 style='font-size:800%;'><b>B$tambah</b></h1>
		  <h1>BPJS </h1> 
		</div>
	  </div>
	  </center>
	  </div>
	   <script type='text/javascript'>
		openWin($tambah,6);
		setTimeout(function () { window.location.href = 'index.html'; }, 3000);
	  </script>
	  ";	  
   
} else if ($_GET['act'] == "polisyaraf"){
	$cek = mysql_query("SELECT * FROM tbl_bpjs_rajal");
	$cekpoli = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Syaraf'");
	$numrow = mysql_num_rows($cek);
	$numrowpoli = mysql_num_rows($cekpoli);
	$tambah = $numrow + 1;
	$tambahpoli = $numrowpoli + 1;
	mysql_query("INSERT INTO tbl_bpjs_rajal (id,poli,id_poli) VALUES ($tambah,'Poli Syaraf',$tambahpoli)");
	echo "
	<div id='rajalsyaraf' class='w3-modal' style='display: block;'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		  <h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		<h1>Rawat Jalan</h1>
		<h1>Poli Syaraf</h1>
		  <h1 style='font-size:800%;'><b>B$tambah</b></h1>
		  <h1>BPJS </h1> 
		</div>
	  </div>
	  </center>
	</div>
	 <script type='text/javascript'>
		openWin($tambah,3);
		setTimeout(function () { window.location.href = 'index.html'; }, 3000);
	  </script>
	";
} else if ($_GET['act'] == "polirehab"){
	$cek = mysql_query("SELECT * FROM tbl_bpjs_rajal");
	$cekpoli = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Rehab Medis'");
	$numrow = mysql_num_rows($cek);
	$numrowpoli = mysql_num_rows($cekpoli);
	$tambah = $numrow + 1;
	$tambahpoli = $numrowpoli + 1;
	mysql_query("INSERT INTO tbl_bpjs_rajal (id,poli,id_poli) VALUES ($tambah,'Poli Rehab Medis',$tambahpoli)");
	  echo "
	<div id='rajalrehab' class='w3-modal' style='display: block;'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		  <h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		<h1>Rawat Jalan</h1>
		<h1>Poli Rehab Medik</h1>
		  <h1 style='font-size:800%;'><b>B$tambah</b></h1>
		  <h1>BPJS </h1> 
		</div>
	  </div>
	  </center>
	</div>
	<script type='text/javascript'>
		openWin($tambah,4);
		setTimeout(function () { window.location.href = 'index.html'; }, 3000);
	  </script>
";
} else if ($_GET['act'] == "polibedah"){
	$cek = mysql_query("SELECT * FROM tbl_bpjs_rajal");
	$cekpoli = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Bedah'");
	$numrow = mysql_num_rows($cek);
	$numrowpoli = mysql_num_rows($cekpoli);
	$tambah = $numrow + 1;
	$tambahpoli = $numrowpoli + 1;
	mysql_query("INSERT INTO tbl_bpjs_rajal (id,poli,id_poli) VALUES ($tambah,'Poli Bedah',$tambahpoli)");
	echo "
	<div id='rajalbedah' class='w3-modal' style='display: block;'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		  <h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		<h1>Rawat Jalan</h1>
		<h1>Poli Bedah</h1>
		  <h1 style='font-size:800%;'><b>B$tambah</b></h1>
		  <h1>BPJS </h1> 
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
		  <h1 style='font-size:200%;'><b>Mohon Maaf Antrian Pendaftaran Untuk Poli klinik ini Sudah Tutup</b></h1>
		  <h1 style='font-size:200%;'><b>Silahkan hubungi bagian Pendaftaran</b></h1>
		  <h1>Rumah Sakit Permata Pamulang </h1> 
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