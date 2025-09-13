<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "antrian";

// Koneksi dan memilih database di server (PHP 7+ menggunakan mysqli)
$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

date_default_timezone_set('Asia/Jakarta');
?>
