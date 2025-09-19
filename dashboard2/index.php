<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Antrian RS Permata Pamulang</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>

  <!-- HEADER -->
  <header>
    <img src="./images/logo.png" alt="Logo RS" style="height:40px;">
    </header>

  <!-- MAIN CONTENT -->
  <div class="main">

    <!-- KIRI (Loket 1 - 4 dari bawah ke atas) -->
    <div class="left">
      <div class="box"><h1>Customer Care</h1><div id="auto5">0</div></div>
      <div class="box"><h1>Loket 4</h1><div id="auto4">0</div></div>
      <div class="box"><h1>Loket 3</h1><div id="auto3">0</div></div>
      <div class="box"><h1>Loket 2</h1><div id="auto2">0</div></div>
      <div class="box"><h1>Loket 1</h1><div id="auto">0</div></div>
    </div>

    <!-- KANAN (Iframe penuh ke bawah, scale 90%) -->
    <div class="right">
      <div class="box iframe-box">
        <div class="iframe-wrapper">
          <iframe src="http://192.168.0.11/LIVE/Module/kiosk/BedMonitoringDisplayGeneral.aspx" frameborder="0"></iframe>
        </div>
      </div>
    </div>

  </div>

  <!-- RUNNING TEXT -->
  <div class="marquee">
    <span>Selamat datang di RS Permata Pamulang - Layanan Antrian Digital</span>
  </div>

  <!-- JS (Auto Reload Loket) -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script>
    $(document).ready(function(){
      setInterval(function(){
        $('#auto').load('load.php');
        $('#auto2').load('load2.php');
        $('#auto3').load('load3.php');
        $('#auto4').load('load4.php');
        $('#auto5').load('load5.php');
      }, 2000);
    });
  </script>

</body>
</html>
