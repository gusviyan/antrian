<?php
include "koneksi.php";

$cekfirst = mysqli_query($conn, "SELECT id FROM tbl_umum WHERE loket = 1 AND panggil = 2 LIMIT 1");
$shwfirst = mysqli_fetch_assoc($cekfirst);

$cek = mysqli_query($conn, "SELECT id FROM tbl_umum WHERE loket = 1 AND panggil = 1 ORDER BY id DESC LIMIT 1");
$shw = mysqli_fetch_assoc($cek);

if ($shwfirst) {
    echo "A{$shwfirst['id']}";
} elseif ($shw) {
    echo "A{$shw['id']}";
} else {
    echo "-";
}
