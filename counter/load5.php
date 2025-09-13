<?php

include "koneksi.php";

// Assuming $conn is your mysqli connection from koneksi.php
$ceknext = mysqli_query($conn, "SELECT * FROM tbl_cs WHERE status = 0 AND panggil = 0 AND loket = 0 LIMIT 1");
$pglnext = mysqli_fetch_array($ceknext);
if ($pglnext) {
	echo "
	<center>
	<h1 style='font-size:400%;'>CS{$pglnext['id']}</h1>
	</center>
	";
} else {
	echo "
	<center><h1> --- </h1></center>
	";
}