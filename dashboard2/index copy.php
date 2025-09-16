<!DOCTYPE html>
<?php
include "koneksi.php";
?>
<html>
<head>
<title>Antrian RS Permata Pamulang</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="index_files/w3.css">
<link rel="stylesheet" href="index_files/css.css">
<script src="index_files/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$('#auto').load('load.php');
		$('#auto2').load('load2.php');
		$('#auto3').load('load3.php');
		$('#auto4').load('load4.php');
		$('#auto5').load('load5.php');
		refresh();
	});

	function refresh() {
		setTimeout(function() {
			$('#auto').load('load.php');
			$('#auto2').load('load2.php');
			$('#auto3').load('load3.php');
			$('#auto4').load('load4.php');
			$('#auto5').load('load5.php');
			refresh();
		}, 2000);
	}
</script>
<style>
	.header {
        background-color: #474344;
		color: black;
		padding: 15px;
		text-align: center;
		font-size: 24px;
		font-weight: bold;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.header img {
		width: 300px;
        height: 50px;
		margin-right: 1300px;
	}
</style>
</head>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<div class="header">
	<img src="index_files/LogoRS.png" alt="RS Logo">
	<span></span>
</div>

<div class="w3-main" style="background-image: url(index_files/logors.png); background-repeat: no-repeat; background-position: center; background-size: 700px 700px;">
  <div class="w3-row" style="margin-top:0; width: 33%; float: left;">
    <div class="refrh" style="border: 5px solid black; width: 100%; height:241px;">
		<center><h1 style='font-size:600%; color: white;'>LOKET 1</h1></center>
		<div id="auto" style="color: white;"></div>
	</div>
    <div style="border: 5px solid black; width: 100%; height:241px;">
		<center><h1 style='font-size:600%; color: white;'>LOKET 2</h1></center>
		<div id="auto2" style="color: white;"></div>
    </div>
    <div style="border: 5px solid black; width: 100%; height:245px;">
		<center><h1 style='font-size:600%; color: white;'>Customer Care</h1></center>
		<div id="auto5" style="color: white;"></div>
    </div>
  </div>
  <div class="w3-col" style="width: 67%; height:480px; float: left;">
	<div style="border: 5px solid black; height:100%;">
		<video src="video/video1.mp4" type="video/mp4" width="100%" height="100%" autoplay loop style="object-fit: fill;"></video>
	</div>
    <div class="w3-half" style="border: 5px solid black; width: 50%; height:248px">
		<center><h1 style='font-size:600%; color: white;'>LOKET 3</h1></center>
		<div id="auto3" style="color: white;"></div>
	</div>
    <div class="w3-half" style="border: 5px solid black; width: 50%; height:248px">
      <center><h1 style='font-size:600%; color: white;'>LOKET 4</h1></center>
		<div id="auto4" style="color: white;"></div>
    </div>
  </div>
</div>
</body>
</html>