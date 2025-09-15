<?php
include "koneksi.php";
function query($sql){ global $conn; $res=mysqli_query($conn,$sql); if(!$res) die(mysqli_error($conn)); return $res; }
$act=$_GET['act']??'';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Counter Loket 3 - BPJS</title>
<script src="index_files/jquery.min.js"></script>
<link rel="stylesheet" href="style-glass.css">
<script>
$(function(){ $('#auto').load('load3.php'); setInterval(()=>$('#auto').load('load3.php'),2000); });
</script>
</head>
<body>
<div class="sidebar glass">
	<img src="logo.png" alt="Logo" class="logo">
	<h3>Loket 3</h3>
  <h3>ANTRIAN HOLD</h3>
  <table>
  <?php
  $hld=query("SELECT * FROM tbl_bpjs WHERE status=2 AND panggil=0");
  while($r=mysqli_fetch_array($hld)){
    echo "<tr><td>{$r[0]}</td>
      <td><form method=POST action='aksi_panggil.php?act=clearer&id={$r[0]}&loket=3'><button>Clear</button></form></td>";
    if($act!="call") echo "<td><a href='counterumumloket3.php?act=callback&no={$r[0]}'><button>Callback</button></a></td>";
    echo "</tr>";
  } ?>
  </table>
</div>
<div class="main">
  <?php
  $cek=mysqli_query($conn,"SELECT id FROM tbl_bpjs WHERE status=0 AND panggil=0 LIMIT 1");
  $callLink=mysqli_num_rows($cek)>0?"counterumumloket3.php?act=call":"counterumumloket3.php?act=default";
  ?>
  <div class="top-bar"><a href="<?=$callLink?>"><button>Call</button></a></div>
  <div class="next-box glass"><h2>Next</h2><div id="auto"></div></div>
  <div class="display-antrian glass">
  <?php
  switch($act){
    case "call":
      $p=mysqli_fetch_assoc(mysqli_query($conn,"SELECT id FROM tbl_bpjs WHERE status=0 AND panggil=0 ORDER BY id ASC LIMIT 1"));
      if($p){ $id=$p['id']; mysqli_query($conn,"UPDATE tbl_bpjs SET panggil=1,loket=3 WHERE id=$id");
        echo "<h1>B$id</h1><div class='actions'>
          <form method=POST action='aksi_panggil.php?act=clear&id=$id&loket=3'><button>Clear</button></form>
          <form method=POST action='aksi_panggil.php?act=hold&id=$id&loket=3'><button>Hold</button></form>
          <button onclick='playAudio($id,3)'>Play Audio</button></div>";
      } else echo "<h1>Belum ada antrian</h1>"; break;
    case "callback":
      $no=intval($_GET['no']??0);
      if($no>0){ $p=mysqli_fetch_assoc(mysqli_query($conn,"SELECT id FROM tbl_bpjs WHERE status=2 AND id=$no AND panggil=0"));
        if($p){ $id=$p['id']; mysqli_query($conn,"UPDATE tbl_bpjs SET panggil=2,loket=3 WHERE id=$id");
          echo "<h1>B$id</h1><div class='actions'>
            <form method=POST action='aksi_panggil.php?act=clear&id=$id&loket=3'><button>Clear</button></form>
            <form method=POST action='aksi_panggil.php?act=hold&id=$id&loket=3'><button>Hold</button></form>
            <button onclick='playAudio($id,3)'>Play Audio</button></div>";
        }} break;
    default: echo "<h1>Belum ada antrian</h1>";
  } ?>
  </div>
  <div class="notes glass"><h2>Catatan</h2><ul>
    <?php if($act!="call"){echo "<li>Klik <b>Call</b> untuk memanggil nomor selanjutnya</li><li>Klik <b>Callback</b> untuk memanggil nomor hold</li>";}
    else{echo "<li>Klik <b>Play Audio</b> untuk suara</li><li>Klik <b>Hold</b> untuk menunda</li><li>Klik <b>Clear</b> untuk selesai</li>";}?>
  </ul></div>
  <audio id="container" autoplay></audio>
  <script src="audioloket3.js"></script>
</div>
</body>
</html>
