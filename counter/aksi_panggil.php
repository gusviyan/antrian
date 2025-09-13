<?php

include "koneksi.php";

// Use mysqli instead of deprecated mysql_* functions
$act = $_GET['act'] ?? '';
$id = intval($_GET['id'] ?? 0);
$loket = intval($_GET['loket'] ?? 0);

// Helper function for query execution
function runQuery($query) {
    global $conn; // Assuming $conn is your mysqli connection from koneksi.php
    return mysqli_query($conn, $query);
}

if ($act === "clear") {
    if ($loket === 1) {
        runQuery("UPDATE tbl_umum SET status=1, panggil=1, loket=1 WHERE id=$id");
    } elseif ($loket === 2) {
        runQuery("UPDATE tbl_umum SET status=1, panggil=1, loket=2 WHERE id=$id");
    } elseif ($loket === 3) {
        runQuery("UPDATE tbl_bpjs SET status=1, panggil=1, loket=3 WHERE id=$id");
    } elseif ($loket === 4) {
        runQuery("UPDATE tbl_bpjs SET status=1, panggil=1, loket=4 WHERE id=$id");
    } elseif ($loket === 5) {
        runQuery("UPDATE tbl_cs SET status=1, panggil=1, loket=5 WHERE id=$id");
    }
} elseif ($act === "clearer") {
    if ($loket === 1) {
        runQuery("UPDATE tbl_umum SET status=1, panggil=0, loket=1 WHERE id=$id");
    } elseif ($loket === 2) {
        runQuery("UPDATE tbl_umum SET status=1, panggil=0, loket=2 WHERE id=$id");
    } elseif ($loket === 3) {
        runQuery("UPDATE tbl_bpjs SET status=1, panggil=0, loket=3 WHERE id=$id");
    } elseif ($loket === 4) {
        runQuery("UPDATE tbl_bpjs SET status=1, panggil=0, loket=4 WHERE id=$id");
    } elseif ($loket === 5) {
        runQuery("UPDATE tbl_cs SET status=1, panggil=0, loket=5 WHERE id=$id");
    }
} elseif ($act === "hold") {
    if ($loket === 1 || $loket === 2) {
        runQuery("UPDATE tbl_umum SET status=2, panggil=0, loket=0 WHERE id=$id");
        runQuery("UPDATE tbl_umum SET panggil=0, loket=0 WHERE status=0 AND loket=$loket");
    } elseif ($loket === 3 || $loket === 4) {
        runQuery("UPDATE tbl_bpjs SET status=2, panggil=0, loket=0 WHERE id=$id");
        runQuery("UPDATE tbl_bpjs SET panggil=0, loket=0 WHERE status=0 AND loket=$loket");
    } elseif ($loket === 5) {
        runQuery("UPDATE tbl_cs SET status=2, panggil=0, loket=0 WHERE id=$id");
        runQuery("UPDATE tbl_cs SET panggil=0, loket=0 WHERE status=0 AND loket=5");
    }
}

switch ($loket) {
    case 1:
        header('Location: counterumumloket1.php?act=default');
        break;
    case 2:
        header('Location: counterumumloket2.php?act=default');
        break;
    case 3:
        header('Location: counterumumloket3.php?act=default');
        break;
    case 4:
        header('Location: counterumumloket4.php?act=default');
        break;
    case 5:
        header('Location: counterumumloket5.php?act=default');
        break;
}

exit;
?>
