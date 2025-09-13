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
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    today.toDateString() + " " +  h + ":" + m + ":" + s;
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
		poli = "Poli Orthopedi"
	} else if (x == 2) {
		poli = "Poli THT"
	} else if (x == 3) {
		poli = "Poli Obgyn"
	} else if (x == 4) {
		poli = "Poli Anak"
	} else if (x == 5) {
		poli = "Poli Paru"
	} else if (x == 6) {
		poli = "Poli Kulit"
	}
    myWindow = window.open("", "myWindow", "width=2,height=1");
    myWindow.document.write("<center><h3>Rawat Jalan BPJS</h3> <h3>"+ poli +"</h3> <h1 style='font-size:500%;'>B" + n +"</h1> " + "<p> Jika nomor terlewat akan dipanggil setelah 3 nomor</p>" + result + "</center>");
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
  if ($date == "Monday" || $date == "Tuesday" || $date == "Wednesday" || $date == "Thursday" || $date == "Friday" || $date == "Saturday" || $date == "Sunday"){
	  echo"
	  <div class='w3-display-middleleft1' id='feature3'>
	  <a href='submenurajalbpjs2.php?act=poliortho' class='btn btn-lg btn-default wow fadeInUp'>
		<p>POLI ORTHOPEDI</p>
	  </a>
		</div>";
  } else {
	  echo"
	  <div class='w3-display-middleleft1' id='feature3'>
	  <a href='submenurajalbpjs2.php?act=tdkpraktek' class='w3-black btn btn-lg btn-default wow fadeInUp'>
		<p>POLI ORTHOPEDI</p>
	  </a>
		</div>";
  }
  
   if ($date == "Tuesday" || $date == "Thursday" || $date == "Friday"){
	echo"
  <div class='w3-display-middleleft2' id='feature3'>
  <a href='submenurajalbpjs2.php?act=politht' class='btn btn-lg btn-default wow fadeInUp'>  
		<p>POLI THT</p>
  </a>
  </div>
  ";
   } else {
	  echo"
	  <div class='w3-display-middleleft2' id='feature3'>
	  <a href='submenurajalbpjs2.php?act=tdkpraktek' class='w3-black btn btn-lg btn-default wow fadeInUp'>
		<p>POLI THT</p>
	  </a>
		</div>";
  }
  ?>
  
	<div class="w3-display-middleleft3" id="feature3">
		<a href="submenurajalbpjsobgyn.php?act=menu" class="btn btn-lg btn-default wow fadeInUp">  
			<p>POLI OBGYN</p>
		</a>
	</div>
  
 <?php
 /*  $sqlobgyn = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Obgyn'");
  $rowobgyn = mysql_num_rows($sqlobgyn);
  if ($rowobgyn < 2 ){
	  echo"
	  <div class='w3-display-middleleft5 w3-xxxxlarge'>
	  <a href='submenurajalbpjs2.php?act=poliobgyn'>  
		<p><button class='w3-button w3-black' style='border-radius:10%;'>&nbsp&nbsp&nbsp POLI OBGYN &nbsp&nbsp&nbsp</button></p>
	  </a>
	  </div> ";
  } else {
	  echo"
	  <div class='w3-display-middleleft5 w3-xxxxlarge'>
	  <a href='submenurajalbpjs2.php?act=tutup'>  
		<p><button class='w3-button w3-grey' style='border-radius:10%;'>&nbsp&nbsp&nbsp POLI OBGYN &nbsp&nbsp&nbsp</button></p>
	  </a>
	  </div> ";
  } */
  echo"
  <div class='w3-display-middleright1' id='feature3'>
		<a href='submenurajalbpjs2.php?act=polianak' class='btn btn-lg btn-default wow fadeInUp'>  
			<p>POLI ANAK</p>
		</a>
	</div>";
	
 echo" <div class='w3-display-middleright2' id='feature3'>
		<a href='submenurajalbpjsparu.php?act=menu' class='btn btn-lg btn-default wow fadeInUp'>  
			<p>POLI PARU</p>
		</a>
	</div>";
	
	/* <div class='w3-display-middleright2' id='feature3'>
		  <a href='submenurajalbpjs2.php?act=tdkpraktek' class='w3-black btn btn-lg btn-default wow fadeInUp'>
			<p>POLI PARU</p>
		  </a>
		</div>";*/
	
	 $sqlkulit = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Kulit'");
	$rowkulit = mysql_num_rows($sqlkulit);
	 if ($date == "Friday" || $date == "monday"){
		if ($rowkulit < 10 ){
		 echo"
		  <div class='w3-display-middleright3' id='feature3'>
				<a href='submenurajalbpjs2.php?act=polikulit' class='btn btn-lg btn-default wow fadeInUp'>  
					<p>POLI KULIT</p>
				</a>
		  </div>
		 ";
		 }else {
			 echo"
			  <div class='w3-display-middleright3' id='feature3'>
			  <a href='submenurajalbpjs2.php?act=tutup' class='w3-black btn btn-lg btn-default wow fadeInUp'>
				<p>POLI KULIT</p>
			  </a>
				</div>";
		 }
	 } else {
	     echo"
		  <div class='w3-display-middleright3' id='feature3'>
		  <a href='submenurajalbpjs2.php?act=tdkpraktek' class='w3-black btn btn-lg btn-default wow fadeInUp'>
			<p>POLI KULIT</p>
		  </a>
			</div>";
	}
  ?>
	<!--
	<div class="w3-display-middleright4" id="feature3" >
			<a href="submenurajalbpjs.php?act=menu" class='btn btn-lg btn-default wow fadeInUp'>  
				<p><< KEMBALI</p>
			</a>
	</div>
-->
	
  <div class="w3-display-topmiddle w3-container">
    <div class="w3-xxxlarge" id="txt"></div>
	</div>
	
	<div class="w3-display-bottommiddle w3-container homebtn" style="padding-bottom:5px;">
		<a href="submenurajalbpjs.php?act=menu" class="btn btn-lg btn-default smoothScroll wow fadeInUp hidden-xs">Kembali</a>
	</div>

</div>

<!-- Rajal Modal -->
<?php
if ($_GET['act'] == "poliortho"){
	$cek = mysql_query("SELECT * FROM tbl_bpjs_rajal");
	$cekpoli = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Orthopedi'");
	$numrow = mysql_num_rows($cek);
	$numrowpoli = mysql_num_rows($cekpoli);
	$tambah = $numrow + 1;
	$tambahpoli = $numrowpoli + 1;
	mysql_query("INSERT INTO tbl_bpjs_rajal (id,poli,id_poli) VALUES ($tambah,'Poli Orthopedi',$tambahpoli)");
	echo "
	<div id='rajalortho' class='w3-modal' style='display: block;'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		  <h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		<h1>Rawat Jalan</h1>
		<h1>Poli Orthopedi</h1>
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
} else if ($_GET['act'] == "politht") {
	$cek = mysql_query("SELECT * FROM tbl_bpjs_rajal");
	$cekpoli = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli THT'");
	$numrow = mysql_num_rows($cek);
	$numrowpoli = mysql_num_rows($cekpoli);
	$tambah = $numrow + 1;
	$tambahpoli = $numrowpoli + 1;
	mysql_query("INSERT INTO tbl_bpjs_rajal (id,poli,id_poli) VALUES ($tambah,'Poli THT',$tambahpoli)");
	echo"
	<div id='rajaltht' class='w3-modal' style='display: block;'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		  <h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		<h1>Rawat Jalan</h1>
		<h1>Poli THT</h1>
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
} else if ($_GET['act'] == "poliobgyn") {
	$cek = mysql_query("SELECT * FROM tbl_bpjs_rajal");
	$cekpoli = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Obgyn'");
	$numrow = mysql_num_rows($cek);
	$numrowpoli = mysql_num_rows($cekpoli);
	$tambah = $numrow + 1;
	$tambahpoli = $numrowpoli + 1;
	mysql_query("INSERT INTO tbl_bpjs_rajal (id,poli,id_poli) VALUES ($tambah,'Poli Obgyn',$tambahpoli)");
	echo"
	<div id='rajalobgyn' class='w3-modal' style='display: block;'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		  <h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		<h1>Rawat Jalan</h1>
		<h1>Poli Obgyn</h1>
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
} else if ($_GET['act'] == "polianak") {
	$cek = mysql_query("SELECT * FROM tbl_bpjs_rajal");
	$cekpoli = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Anak'");
	$numrow = mysql_num_rows($cek);
	$numrowpoli = mysql_num_rows($cekpoli);
	$tambah = $numrow + 1;
	$tambahpoli = $numrowpoli + 1;
	mysql_query("INSERT INTO tbl_bpjs_rajal (id,poli,id_poli) VALUES ($tambah,'Poli Anak',$tambahpoli)");
	echo"
	<div id='rajalanak' class='w3-modal' style='display: block;'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		  <h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		<h1>Rawat Jalan</h1>
		<h1>Poli Anak</h1>
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
} else if ($_GET['act'] == "poliparu") {
	$cek = mysql_query("SELECT * FROM tbl_bpjs_rajal");
	$cekpoli = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Paru'");
	$numrow = mysql_num_rows($cek);
	$numrowpoli = mysql_num_rows($cekpoli);
	$tambah = $numrow + 1;
	$tambahpoli = $numrowpoli + 1;
	mysql_query("INSERT INTO tbl_bpjs_rajal (id,poli,id_poli) VALUES ($tambah,'Poli Paru',$tambahpoli)");
	echo"
	<div id='rajalparu' class='w3-modal' style='display: block;'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		  <h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		<h1>Rawat Jalan</h1>
		<h1>Poli Paru</h1>
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
} else if ($_GET['act'] == "polikulit") {
	$cek = mysql_query("SELECT * FROM tbl_bpjs_rajal");
	$cekpoli = mysql_query("SELECT * FROM tbl_bpjs_rajal WHERE poli = 'Poli Kulit'");
	$numrow = mysql_num_rows($cek);
	$numrowpoli = mysql_num_rows($cekpoli);
	$tambah = $numrow + 1;
	$tambahpoli = $numrowpoli + 1;
	mysql_query("INSERT INTO tbl_bpjs_rajal (id,poli,id_poli) VALUES ($tambah,'Poli Kulit',$tambahpoli)");
	echo"
	<div id='rajalkulit' class='w3-modal' style='display: block;'>
	<center>
	  <div class='w3-modal-content w3-animate-zoom'>
		<div class='w3-container w3-black w3-display-container'>
		  <h1>Antrian BPJS</h1>
		</div>
		<div class='w3-container'>
		<h1>Rawat Jalan</h1>
		<h1>Poli Kulit</h1>
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