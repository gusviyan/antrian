<!DOCTYPE html>
<?php
include "koneksi.php"; // koneksi mysqli

function query($sql) {
    global $conn;
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    return $result;
}

$act = $_GET['act'] ?? '';
?>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Counter Loket 2</title>
<script src="index_files/jquery.min.js"></script>
<style>
<?php include "style-glass.css"; ?>
</style>
<script>
$(document).ready(function(){
    $('#auto').load('load2.php');
    refresh();
});
function refresh() {
    setTimeout(function() {
        $('#auto').fadeIn("slow").load('load2.php').fadeOut("slow");
        refresh();
    }, 2000);
}
function ensureAudioPlay(audio) {
    var playPromise = audio.play();
    if (playPromise !== undefined) {
        playPromise.catch(function() {
            audio.muted = false;
            audio.play();
        });
    }
}
</script>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar glass">
	<img src="logo.png" alt="Logo" class="logo">
	<h3>Loket 2</h3>
  <h3>ANTRIAN HOLD</h3>
  <?php
  $hld = query("SELECT * FROM tbl_umum WHERE status = 2 and panggil = 0");
  echo "<table>";
  while ($hldlist = mysqli_fetch_array($hld)) {
      echo "
      <tr>
        <td colspan=2>{$hldlist[0]}</td>
        <td>
          <form method=POST action='aksi_panggil.php?act=clearer&id={$hldlist[0]}&loket=2'>
            <button>Clear</button>
          </form>
        </td>";
      if ($act != "call") {
          echo "
        <td>
          <a href='counterumumloket2.php?act=callback&no={$hldlist[0]}'>
            <button>Callback</button>
          </a>
        </td>";
      }
      echo "</tr>";
  }
  echo "</table>";
  ?>
</div>

<!-- MAIN -->
<div class="main">

  <!-- TOMBOL CALL -->
  <?php
  $cekQueue = mysqli_query($conn, "SELECT id FROM tbl_umum WHERE status = 0 AND panggil = 0 LIMIT 1");
  $hasQueue = mysqli_num_rows($cekQueue) > 0;
  $callLink = $hasQueue ? "counterumumloket2.php?act=call" : "counterumumloket2.php?act=default";
  ?>
  <div class="top-bar">
    <a href="<?= $callLink ?>"><button>Call</button></a>
  </div>

  <!-- NEXT -->
  <div class="next-box glass">
    <h2>Next</h2>
    <div id="auto"></div>
  </div>

  <!-- DISPLAY -->
  <div class="display-antrian glass">
    <?php
    switch ($act) {
      case "call":
          // ambil antrian baru
          $cek = mysqli_query($conn, "SELECT id FROM tbl_umum WHERE status = 0 AND panggil = 0 ORDER BY id ASC LIMIT 1");
          $pgl = mysqli_fetch_assoc($cek);

          if ($pgl) {
              $id = intval($pgl['id']);
              // tandai dipanggil
              mysqli_query($conn, "UPDATE tbl_umum SET panggil = 1, loket = 2 WHERE id = {$id}");

              echo "<h1>A{$id}</h1>
              <div class='actions'>
                <form method='POST' action='aksi_panggil.php?act=clear&id={$id}&loket=2'>
                  <button>Clear</button>
                </form>
                <form method='POST' action='aksi_panggil.php?act=hold&id={$id}&loket=2'>
                  <button>Hold</button>
                </form>
                <button onclick='playAudio({$id},2)' type='button'>Play Audio</button>
              </div>";
          } else {
              echo "<h1>Belum ada antrian</h1>";
          }
          break;

      case "callback":
          $no = intval($_GET['no'] ?? 0);
          if ($no > 0) {
              $cek = mysqli_query($conn, "SELECT id FROM tbl_umum WHERE status = 2 AND id = {$no} AND panggil = 0 LIMIT 1");
              $pgl = mysqli_fetch_assoc($cek);
              if ($pgl) {
                  $id = intval($pgl['id']);
                  mysqli_query($conn, "UPDATE tbl_umum SET panggil = 2, loket = 2 WHERE id = {$id}");

                  echo "<h1>A{$id}</h1>
                  <div class='actions'>
                    <form method='POST' action='aksi_panggil.php?act=clear&id={$id}&loket=2'>
                      <button>Clear</button>
                    </form>
                    <form method='POST' action='aksi_panggil.php?act=hold&id={$id}&loket=2'>
                      <button>Hold</button>
                    </form>
                    <button onclick='playAudio({$id},2)' type='button'>Play Audio</button>
                  </div>";
              }
          }
          break;

      default:
          echo "<h1>Belum ada antrian</h1>";
    }
    ?>
  </div>

  <!-- CATATAN -->
  <div class="notes glass">
    <h2>Catatan</h2>
    <ul>
      <?php
      if($act != "call"){
          echo "<li>Klik <b>Call</b> untuk memanggil nomor selanjutnya</li>
                <li>Klik <b>Callback</b> untuk memanggil nomor yang di-hold</li>";
      } else {
          echo "<li>Klik <b>Play Audio</b> untuk memanggil dengan suara</li>
                <li>Klik <b>Hold</b> untuk menunda panggilan</li>
                <li>Klik <b>Clear</b> untuk menyelesaikan antrian</li>";
      }
      ?>
    </ul>
  </div>

  <!-- Audio -->
  <audio id="container" autoplay=""></audio>
  <script src="audioloket2.js"></script>
</div>
</body>
</html>
