<!DOCTYPE html>
<?php
include "koneksi.php";
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>ANTRIAN RS PERMATA PAMULANG</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="10;url=index.html" />

<!-- hanya gunakan stylesub.css -->
<link rel="stylesheet" href="css/stylesub.css">

<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = (m < 10 ? "0" : "") + m;
    s = (s < 10 ? "0" : "") + s;
    document.getElementById('txt').innerHTML =
        today.toDateString() + " " + h + ":" + m + ":" + s;
    setTimeout(startTime, 500);
}

function openWin(n) {
    let date = new Date();
    let year = date.getFullYear();
    let month = date.getMonth();
    let months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Augustus','September','Oktober','November','Desember'];
    let d = date.getDate();
    let day = date.getDay();
    let days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    let h = date.getHours(); if(h<10){h = "0"+h;}
    let m = date.getMinutes(); if(m<10){m = "0"+m;}
    let s = date.getSeconds(); if(s<10){s = "0"+s;}
    let result = days[day]+', '+d+' '+months[month]+' '+year+', '+h+':'+m+':'+s;

    let myWindow = window.open("", "myWindow", "width=2,height=1");
    myWindow.document.write("<center><h3>umum</h3><h1 style='font-size:500%;'>A" + n +"</h1><p>Silahkan Mengambil No Antrian Yang Baru Bila No Antrian Anda Terlewat</p>" + result + "</center>");
    myWindow.print();
    myWindow.close();
}
</script>
</head>
<body onload="startTime()">

<!-- jam -->
<div id="txt"></div>

<!-- tombol utama -->
<div class="container-btn">
<?php
date_default_timezone_set('Asia/Bangkok');
$date = date("l");
$hour = date("H:i");
$cenvertedTime = date('H:i',strtotime('+10 minutes',strtotime($hour)));
$op = "23:59";
$cl = "07:00";

if ($date == "sunday"){
    echo "<a href='submenuumum.php?act=tdkpraktek' class='btn'>RAWAT JALAN</a>";
} else if ($cenvertedTime > $op || $cenvertedTime < $cl){
    echo "<a href='submenuumum.php?act=tutup' class='btn'>RAWAT JALAN</a>";
} else {
    echo "<a href='submenuumum.php?act=rajal' class='btn'>RAWAT JALAN</a>";
}
?>
    <a href="submenuranapumum.php?act=ranap" class="btn">RAWAT INAP</a>
</div>

<!-- tombol kembali -->
<div class="homebtn">
    <a href="index.html" class="btn">Kembali</a>
</div>

<?php
$act = $_GET['act'] ?? '';

if ($act == "rajal") {
    $cek = mysqli_query($conn, "SELECT * FROM tbl_umum");
    $numrow = mysqli_num_rows($cek);
    $tambah = $numrow + 1; 
    mysqli_query($conn, "INSERT INTO tbl_umum (id,keterangan) VALUES ($tambah,'umum Rawat Jalan')");
    echo "
    <div class='w3-modal' style='display:block;'>
      <div class='w3-modal-content'>
        <h1 class='modal-title'>Antrian</h1>
        <h2 class='modal-text'>Rawat Jalan</h2>
        <div class='modal-big'>A$tambah</div>
        <p class='modal-text'>umum</p>
      </div>
    </div>
    <script>
        openWin($tambah);
        setTimeout(function () { window.location.href = 'index.html'; }, 2000);
    </script>
    ";
} else if ($act == "ranap") {
    $cek = mysqli_query($conn, "SELECT * FROM tbl_umum");
    $numrow = mysqli_num_rows($cek);
    $tambah = $numrow + 1; 
    mysqli_query($conn, "INSERT INTO tbl_umum (id,keterangan) VALUES ($tambah,'umum Rawat Inap')");
    echo "
    <div class='w3-modal' style='display:block;'>
      <div class='w3-modal-content'>
        <h1 class='modal-title'>Antrian</h1>
        <h2 class='modal-text'>Rawat Inap</h2>
        <div class='modal-big'>A$tambah</div>
        <p class='modal-text'>umum</p>
      </div>
    </div>
    <script>
        openWin($tambah);
        setTimeout(function () { window.location.href = 'index.html'; }, 2000);
    </script>
    ";
} else if ($act == "tutup"){
    echo "
    <div class='w3-modal' style='display:block;'>
      <div class='w3-modal-content'>
        <h1 class='modal-title'>Antrian umum</h1>
        <h2 class='modal-text'>Mohon Maaf Antrian Pendaftaran Sudah Tutup</h2>
        <p class='modal-text'>Silahkan hubungi bagian Pendaftaran</p>
      </div>
    </div>
    <script>
        setTimeout(function () { window.location.href = 'index.html'; }, 4000);
    </script>
    ";
} else if ($act == "tdkpraktek"){
    echo "
    <div class='w3-modal' style='display:block;'>
      <div class='w3-modal-content'>
        <h1 class='modal-title'>Antrian umum</h1>
        <h2 class='modal-text'>Mohon Maaf pendaftaran sudah ditutup</h2>
        <p class='modal-text'>Silahkan hubungi bagian Pendaftaran</p>
      </div>
    </div>
    <script>
        setTimeout(function () { window.location.href = 'index.html'; }, 4000);
    </script>
    ";
}
?>

</body>
</html>
