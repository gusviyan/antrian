<!DOCTYPE html>
<?php
include "koneksi.php";
date_default_timezone_set('Asia/Bangkok');
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
</script>
</head>

<body onload="startTime()">

<div id="txt"></div>

<div class="overlay">
<?php
// Ambil data waktu & hari
$hari = strtolower(date("l")); // monday, tuesday, ...
$jamSekarang = date("H:i");

// Tentukan jam buka dan kuota
if (in_array($hari, ["monday", "tuesday", "wednesday", "thursday", "friday"])) {
    $jamBuka = "06:45";
    $jamTutup = "14:00";
    $kuotaMaks = 100;
} elseif ($hari == "saturday") {
    $jamBuka = "06:45";
    $jamTutup = "10:00";
    $kuotaMaks = 30;
} else {
    $jamBuka = null; // Minggu
}

// === TAMPILAN MENU UTAMA ===
if ($hari == "sunday") {
        echo "
    <div class='menu-box'>
        <div class='menu-option btn-large'>
            <h2>Mohon maaf, Customer Care tidak melayani pengambilan antrian pada hari Minggu.</h2>
        </div>
    </div>
    <div class='bottom-box'>
        <a href='index.html' class='menu-option btn-small'>Kembali</a>
    </div>
        <script>
            setTimeout(function(){ window.location.href = 'index.html'; }, 4000);
        </script>
        ";
        exit;
} elseif ($jamSekarang < $jamBuka || $jamSekarang > $jamTutup) {
    echo "
    <div class='menu-box'>
        <div class='menu-option btn-large'>
            <h2>Mohon Maaf Customer Care Sudah Tutup</h2>
            <p>Jam Layanan: $jamBuka - $jamTutup</p>
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

// === PROSES AMBIL ANTRIAN ===
if (isset($_GET['act']) && $_GET['act'] == "rajal") {

    // Jika hari Minggu dan user memaksa ambil tiket
    if ($hari == "sunday") {
        echo "
    <div class='menu-box'>
        <div class='menu-option btn-large'>
            <h2>Mohon Maaf Customer Care Sudah Tutup</h2>
            <p>Jam Layanan: $jamBuka - $jamTutup</p>
        </div>
    </div>
    <div class='bottom-box'>
        <a href='index.html' class='menu-option btn-small'>Kembali</a>
    </div>
        <script>
            setTimeout(function(){ window.location.href = 'index.html'; }, 4000);
        </script>
        ";
        exit;
    }

    $conn = mysqli_connect("localhost", "root", "root", "antrian");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $cek = mysqli_query($conn, "SELECT COUNT(*) as total FROM tbl_cs");
    $data = mysqli_fetch_assoc($cek);
    $numrow = $data['total'] ?? 0;

    if ($numrow >= $kuotaMaks) {
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
            let w = window.open('', 'PRINT', 'width=400,height=600');
            w.document.write('<html><head><title>Print Antrian</title></head><body>');
            w.document.write(\"<center><h3>Customer Care</h3><h1 style='font-size:500%;'>CS$tambah</h1><p>Silahkan tunggu nomor Anda dipanggil</p></center>\");
            w.document.write('</body></html>');
            w.document.close();
            w.focus();
            w.print();
            w.close();

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
