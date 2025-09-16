<?php
include "koneksi.php";

$cekfirst = mysqli_query($conn, "SELECT id FROM tbl_cs WHERE loket = 5 AND panggil = 2 LIMIT 1");
$shwfirst = mysqli_fetch_assoc($cekfirst);

$cek = mysqli_query($conn, "SELECT id FROM tbl_cs WHERE loket = 5 AND panggil = 1 ORDER BY id DESC LIMIT 1");
$shw = mysqli_fetch_assoc($cek);

if ($shwfirst) {
    echo "CS{$shwfirst['id']}";
} elseif ($shw) {
    echo "CS{$shw['id']}";
} else {
    echo "-";
}
