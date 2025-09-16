<?php
include "koneksi.php";

$cekfirst = mysqli_query($conn, "SELECT id FROM tbl_bpjs WHERE loket = 3 AND panggil = 2 LIMIT 1");
$shwfirst = mysqli_fetch_assoc($cekfirst);

$cek = mysqli_query($conn, "SELECT id FROM tbl_bpjs WHERE loket = 3 AND panggil = 1 ORDER BY id DESC LIMIT 1");
$shw = mysqli_fetch_assoc($cek);

if ($shwfirst) {
    echo "B{$shwfirst['id']}";
} elseif ($shw) {
    echo "B{$shw['id']}";
} else {
    echo "-";
}
