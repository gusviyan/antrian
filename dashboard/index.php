<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Antrian RS Permata Pamulang</title>
  <link rel="stylesheet" href="./css/style.css"> <!-- gunakan css lama yang sudah dipakai -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function loadAntrian() {
      $("#loket1").load("load.php");
      $("#loket2").load("load2.php");
      $("#loket3").load("load3.php");
      $("#loket4").load("load4.php");
      $("#loket5").load("load5.php");
    }
    $(function(){
      loadAntrian();
      setInterval(loadAntrian, 3000); // refresh tiap 3 detik
    });
  </script>
</head>
<body>
  <header>
    <img src="./images/logo.png" alt="Logo RS" style="height:40px;">
	<style>
		<?php include "style.css"; ?>
	</style>
    <h1>Antrian RS Permata Pamulang</h1>
  </header>

  <div class="main">
    <!-- Kolom kiri -->
    <div class="left">
      <div class="box">
        <h1>LOKET 1</h1>
        <div id="loket1">-</div>
      </div>
      <div class="box">
        <h1>LOKET 2</h1>
        <div id="loket2">-</div>
      </div>
      <div class="box">
        <h1>CUSTOMER CARE</h1>
        <div id="loket5">-</div>
      </div>
    </div>

    <!-- Kolom kanan -->
    <div class="right">
      <div class="box image-box">
        <img src="./images/picture.jpeg" alt="Informasi RS">
      </div>
      <div class="bottom-row">
        <div class="box">
          <h1>LOKET 3</h1>
          <div id="loket3">-</div>
        </div>
        <div class="box">
          <h1>LOKET 4</h1>
          <div id="loket4">-</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Running text -->
  <div class="marquee">
    <span>Selamat datang di RS Permata Pamulang • Informasi: Loket BPJS buka pukul 08.00 - 16.00 WIB • Silahkan ambil antrian baru jika terlewat 3 nomor</span>
  </div>
</body>
</html>
