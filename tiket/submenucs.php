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

<!-- hanya gunakan stylecs.css -->
<link rel="stylesheet" href="css/stylecs.css">

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
    if (i < 10) {i = "0" + i};
    return i;
}

  let myWindow = window.open("", "myWindow", "width=2,height=1");
  myWindow.document.write("<center><h3>Custopmer Care</h3><h1 style='font-size:500%;'>B" + n + "</h1><p> Silahkan Mengambil No Antrian Yang Baru Bila No Antrian Anda Terlewat </p>" + result + "</center>");
  myWindow.print();
  myWindow.close();

</script>
</head>
<body onload="startTime()">

<div id="txt"></div>

<div class="overlay">
<?php
date_default_timezone_set('Asia/Bangkok');
$date = date("l");
$hour = date("H:i");
$cenvertedTime = date('H:i', strtotime('+10 minutes', strtotime($hour)));
$op = "18:00";
$cl = "07:00";

if ($date == "monday") {
    echo "
    <div class='menu-box'>
        <a href='submenucs.php?act=tdkpraktek' class='menu-option btn-large'>
            CUSTOMER CARE
        </a>
    </div>
    <div class='bottom-box'>
        <a href='index.html' class='menu-option btn-small'>Kembali</a>
    </div>
    ";
} elseif ($cenvertedTime > $op || $cenvertedTime < $cl) {
    echo "
    <div class='menu-box'>
        <div class='menu-option btn-large'>
            <h2>Mohon Maaf Customer Care Sudah Tutup</h2>
            <p>Silahkan hubungi bagian Pendaftaran</p>
        </div>
    </div>
    <div class='bottom-box'>
        <a href='index.html' class='menu-option btn-small'>Kembali</a>
    </div>
    ";
} else {
    echo "
    <div class='menu-box'>
        <a href='submenucs.php?act=rajal' class='menu-option btn-large'>
            AMBIL NOMOR ANTRIAN
        </a>
    </div>
    <div class='bottom-box'>
        <a href='index.html' class='menu-option btn-small'>Kembali</a>
    </div>
    ";
}

// ambil nomor antrian
if (isset($_GET['act']) && $_GET['act'] == "rajal") {
    $date = date('l');
    $conn = mysqli_connect("localhost", "root", "", "antrian");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $cek = mysqli_query($conn, "SELECT COUNT(*) as total FROM tbl_cs");
    $data = mysqli_fetch_assoc($cek);
    $numrow = $data['total'] ?? 0;

    if (($date == "Saturday" && $numrow >= 30) || ($date != "Saturday" && $numrow >= 80)) {
        echo "
        <div class='menu-box'>
            <div class='menu-option btn-large'>
                <h2>Mohon Maaf, Kuota Antrian Customer Care Telah Habis</h2>
                <p>Silahkan hubungi Loket Pendaftaran.</p>
            </div>
        </div>
        <div class='bottom-box'>
            <a href='index.html' class='menu-option btn-small'>Kembali</a>
        </div>";
    } else {
        $tambah = $numrow + 1;
        mysqli_query($conn, "INSERT INTO tbl_cs (id, keterangan, status, panggil, loket) 
                     VALUES ($tambah, 'CUSTOMER CARE', 0, 0, 0)");

        // popup antrian
        echo "
        <div class='popup-overlay'>
            <div class='popup-box'>
                <h2>Antrian</h2>
                <h3>Customer Care</h3>
                <h1 style='font-size:4rem;'>CS$tambah</h1>
                <p>Silakan tunggu nomor Anda dipanggil</p>
            </div>
        </div>

        <script type='text/javascript'>
            setTimeout(function () { window.location.href = 'index.html'; }, 4000);
        </script>
        ";
    }
    mysqli_close($conn);
}
?>
</div>

</body>
</html>
