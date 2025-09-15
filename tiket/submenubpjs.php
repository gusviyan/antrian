<!DOCTYPE html>
<?php include "koneksi.php"; ?>
<html lang="id">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>ANTRIAN RS PERMATA PAMULANG</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="refresh" content="10;url=index.html" />
  <link rel="stylesheet" href="css/stylesub.css">
</head>

<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    today.toDateString() + " " + h + ":" + m + ":" + s;
    setTimeout(startTime, 500);
}
function checkTime(i) {
    return (i < 10) ? "0" + i : i;
}
function openWin(n) {
  let date = new Date;
  let year = date.getFullYear();
  let month = date.getMonth();
  let months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Augustus','September','Oktober','November','Desember'];
  let d = date.getDate();
  let day = date.getDay();
  let days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
  let h = (date.getHours()<10?"0":"")+date.getHours();
  let m = (date.getMinutes()<10?"0":"")+date.getMinutes();
  let s = (date.getSeconds()<10?"0":"")+date.getSeconds();
  let result = days[day]+', '+d+' '+months[month]+' '+year+', '+h+':'+m+':'+s;

  let myWindow = window.open("", "myWindow", "width=2,height=1");
  myWindow.document.write("<center><h3>BPJS</h3><h1 style='font-size:500%;'>B" + n + "</h1><p> Silahkan Mengambil No Antrian Yang Baru Bila No Antrian Anda Terlewat </p>" + result + "</center>");
  myWindow.print();
  myWindow.close();
}
</script>


<body onload="startTime()">

<div id="txt"></div>

<div class="container-btn">
  <?php
  date_default_timezone_set('Asia/Bangkok');
  $date = date("l");
  $hour = date("H:i");
  $cenvertedTime = date('H:i',strtotime('+10 minutes',strtotime($hour)));
  $op = "23:590";
  $cl = "07:00";

  if ($date == "sunday"){
      echo "<a href='submenubpjs.php?act=tdkpraktek' class='btn'>RAWAT JALAN</a>";
  } else if ($cenvertedTime > $op || $cenvertedTime < $cl){
      echo "<a href='submenubpjs.php?act=tutup' class='btn'>RAWAT JALAN</a>";
  } else {
      echo "<a href='submenubpjs.php?act=rajal' class='btn'>RAWAT JALAN</a>";
  }
  ?>
  <a href="submenuranapbpjs.php?act=ranap" class="btn">RAWAT INAP</a>
</div>

<div class="homebtn">
  <a href="index.html" class="btn">Kembali</a>
</div>

<?php
$act = $_GET['act'] ?? '';
if ($act == "rajal") {
    $cek = mysqli_query($conn, "SELECT * FROM tbl_bpjs");
    $numrow = mysqli_num_rows($cek);
    $tambah = $numrow + 1; 
    mysqli_query($conn, "INSERT INTO tbl_bpjs (id,keterangan) VALUES ($tambah,'BPJS Rawat Jalan')");
    echo "
    <div id='rajal' class='w3-modal' style='display: block;'>
      <div class='w3-modal-content'>
        <h1 class='modal-title'>Antrian</h1>
        <h2 class='modal-text'>Rawat Jalan</h2>
        <h1 class='modal-big'>B$tambah</h1>
        <h2 class='modal-text'>BPJS</h2> 
      </div>
    </div>
    <script>openWin($tambah);setTimeout(()=>{window.location.href='index.html';},2000);</script>
    ";
} else if ($act == "ranap") {
    $cek = mysqli_query($conn, "SELECT * FROM tbl_umum");
    $numrow = mysqli_num_rows($cek);
    $tambah = $numrow + 1; 
    mysqli_query($conn, "INSERT INTO tbl_umum (id,keterangan) VALUES ($tambah,'BPJS Rawat Inap')");
    echo "
    <div id='ranap' class='w3-modal' style='display: block;'>
      <div class='w3-modal-content'>
        <h1 class='modal-title'>Antrian</h1>
        <h2 class='modal-text'>Rawat Inap</h2>
        <h1 class='modal-big'>A$tambah</h1>
        <h2 class='modal-text'>BPJS</h2> 
      </div>
    </div>
    <script>openWin($tambah);setTimeout(()=>{window.location.href='index.html';},2000);</script>
    ";
} else if ($act == "tutup"){
    echo "
    <div id='tutup' class='w3-modal' style='display: block;'>
      <div class='w3-modal-content'>
        <h1 class='modal-title'>Antrian BPJS</h1>
        <h2 class='modal-text'>Mohon Maaf Antrian Pendaftaran Sudah Tutup</h2>
        <h2 class='modal-text'>Silahkan hubungi bagian Pendaftaran</h2>
      </div>
    </div>
    <script>setTimeout(()=>{window.location.href='index.html';},4000);</script>
    ";
} else if ($act == "tdkpraktek"){
    echo "
    <div id='tutup' class='w3-modal' style='display: block;'>
      <div class='w3-modal-content'>
        <h1 class='modal-title'>Antrian BPJS</h1>
        <h2 class='modal-text'>Mohon Maaf pendaftaran sudah ditutup</h2>
        <h2 class='modal-text'>Silahkan hubungi bagian Pendaftaran</h2>
      </div>
    </div>
    <script>setTimeout(()=>{window.location.href='index.html';},4000);</script>
    ";
}
?>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/vegas.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
