<!DOCTYPE html>

<?php
include "koneksi.php"; // koneksi mysqli

// Fungsi helper untuk query
function query($sql) {
    global $conn;
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    return $result;
}
?>

<html>
<title>Counter Loket 2</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="index_files/w3.css">
<link rel="stylesheet" href="index_files/css.css">
<script src="index_files/jquery.min.js"></script>
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-third img{margin-bottom: -6px; opacity: 0.8; cursor: pointer}
.w3-third img:hover{opacity: 1}
body {
  zoom: 125%;           /* Chrome, Edge */
  -moz-transform: scale(1.25);  /* Firefox */
  -moz-transform-origin: 0 0;
}
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

// Fallback untuk audio autoplay
function ensureAudioPlay(audio) {
    var playPromise = audio.play();
    if (playPromise !== undefined) {
        playPromise.catch(function(error) {
            audio.muted = false;
            audio.play();
        });
    }
}
</script>

<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-text-grey w3-collapse w3-top w3-center"
     style="z-index:3;width:300px;font-weight:bold" id="mySidebar"><br>
  <h3 class="w3-padding-10 w3-center"><b>ANTRIAN HOLD</b></h3>
  
<?php
$act = $_GET['act'] ?? '';
$hld = query("SELECT * FROM tbl_umum WHERE status = 2 and panggil = 0");
echo "<table style='table-layout:fixed; padding-left:5px'>
        <col width='50%' />
        <col width='25%' />
        <col width='25%' />";
while ($hldlist = mysqli_fetch_array($hld)) {
    echo "
    <tr>
      <td align='left' colspan=2><font size=40>{$hldlist[0]}</font></td>
      <td>
        <form method=POST action='aksi_panggil.php?act=clearer&id={$hldlist[0]}&loket=2'>
          <button class='w3-button w3-black'>Clear</button>
        </form>
      </td>";
    if ($act != "call") {
        echo "
      <td>
        <a href='counterumumloket2.php?act=callback&no={$hldlist[0]}'>
          <button class='w3-button w3-black'>Callback</button>
        </a>
      </td>
    </tr>";
    }
}
echo "</table>";
?>
</nav>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">
  <div class="w3-row" style="margin-top:0">
    <div class="w3-half" style="border: 3px solid black; width: 50%; height:750px">
      
      <!-- Tombol Call dinamis -->
      <?php
      $cekQueue = mysqli_query($conn, "SELECT id FROM tbl_umum WHERE status = 0 AND panggil = 0 LIMIT 1");
      $hasQueue = mysqli_num_rows($cekQueue) > 0;
      $callLink = $hasQueue
          ? "counterumumloket2.php?act=call"
          : "counterumumloket2.php?act=default";
      ?>
      <div class="w3-top w3-large" style="padding-left: 5px;">
        <p style="font-size:200%">
          <a href="<?= $callLink ?>">
            <button class="w3-button w3-black">Call</button>
          </a>
        </p>
      </div>
      
      <!-- NEXT antrian -->
      <div class="w3-display-topmiddle w3-large" 
           style="width:250px; height:200px;border:2px solid black;">
        <h2 style="text-align:center;">Next</h2>
        <div id="auto" style="padding:0;"></div>
      </div>
      
<?php
switch ($act) {
    case "call":
        // cek callback aktif di loket 2
        $cek = mysqli_query($conn, "SELECT id FROM tbl_umum 
                                    WHERE status = 2 AND panggil = 2 AND loket = 2 
                                    LIMIT 1");
        $jml = mysqli_num_rows($cek);

        if ($jml === 0) {
            // ambil antrian baru
            $cek = mysqli_query($conn, "SELECT id FROM tbl_umum 
                                        WHERE status = 0 AND panggil = 0 
                                        ORDER BY id ASC LIMIT 1");
            $pgl = mysqli_fetch_assoc($cek);

            if ($pgl) {
                $id = intval($pgl['id']);
                mysqli_query($conn, "UPDATE tbl_umum SET panggil = 1, loket = 2 WHERE id = {$id}");
                mysqli_query($conn, "UPDATE tbl_umum SET panggil = 0, loket = 0 
                                     WHERE status = 2 AND loket = 2");

                echo "
                <div id='rajal' style='display: block;'>    
                  <center>
                    <h1 style='font-size:1200%; padding-top: 100px'>A{$id}</h1>
                  </center>
                  <div class='w3-display-bottomleft w3-large' style='padding-left:100px; padding-bottom:200px;'>
                    <form method='POST' action='aksi_panggil.php?act=clear&id={$id}&loket=2'>
                      <p style='font-size:200%;padding-left:20px;'>
                        <button class='w3-button w3-black'>Clear</button>
                      </p>
                    </form>
                  </div>
                  <div class='w3-display-bottomleft w3-large' style='padding-bottom:200px;'>
                    <form method='POST' action='aksi_panggil.php?act=hold&id={$id}&loket=2'>
                      <p style='font-size:200%;'>
                        <button class='w3-button w3-black'>Hold</button>
                      </p>
                    </form>
                  </div>
                  <div class='w3-top w3-large' style='position:absolute; left:310px; top:0px;'>
                    <p style='font-size:200%;'>
                      <button onclick='playAudio({$id},2)' class='w3-button w3-black' type='button'>Play Audio</button>
                    </p>
                  </div>
                </div>";
            } else {
                echo "<h1 style='font-size:500%; padding-top:200px'>Belum ada antrian</h1>";
            }
        }
        break;

    case "callback":
        $no = intval($_GET['no'] ?? 0);
        if ($no > 0) {
            $cek = mysqli_query($conn, "SELECT id FROM tbl_umum 
                                        WHERE status = 2 AND id = {$no} AND panggil = 0 
                                        LIMIT 1");
            $pgl = mysqli_fetch_assoc($cek);

            if ($pgl) {
                $id = intval($pgl['id']);
                mysqli_query($conn, "UPDATE tbl_umum SET panggil = 0, loket = 0 
                                     WHERE status = 2 AND loket = 2");
                mysqli_query($conn, "UPDATE tbl_umum SET panggil = 2, loket = 2 WHERE id = {$id}");

                echo "
                <div id='rajal' style='display: block;'>    
                  <center>
                    <h1 style='font-size:1200%; padding-top: 100px'>A{$id}</h1>
                  </center>
                  <div class='w3-display-bottomleft w3-large' style='padding-left:100px; padding-bottom:200px;'>
                    <form method='POST' action='aksi_panggil.php?act=clear&id={$id}&loket=2'>
                      <p style='font-size:200%;padding-left:20px;'>
                        <button class='w3-button w3-black'>Clear</button>
                      </p>
                    </form>
                  </div>
                  <div class='w3-display-bottomleft w3-large' style='padding-bottom:200px;'>
                    <form method='POST' action='aksi_panggil.php?act=hold&id={$id}&loket=2'>
                      <p style='font-size:200%;'>
                        <button class='w3-button w3-black'>Hold</button>
                      </p>
                    </form>
                  </div>
                  <div class='w3-top w3-large' style='position:absolute; left:310px; top:0px;'>
                    <p style='font-size:200%;'>
                      <button onclick='playAudio({$id},2)' class='w3-button w3-black' type='button'>Play Audio</button>
                    </p>
                  </div>
                </div>";
            }
        }
        break;

    default:
        echo "<h1 style='font-size:500%; padding-top:200px'>Belum ada antrian</h1>";
}
?>


		
			
		<center>
		<h1 class='w3-display-bottomleft' style='font-size:300%;padding-bottom: 7%;'> UMUM
		<audio id="container" autoplay=""></audio>
		<script>
		// Pastikan audio bisa play (fallback)
		document.addEventListener('DOMContentLoaded', function() {
			var audio = document.getElementById('container');
			ensureAudioPlay(audio);
		});
		</script>
		<center>
	</div>

	<div class= "w3-half" style="border: 5px solid black; width: 50%; height:750px">
	  <h1 style="padding-left:20px;text-decoration:underline;">Catatan</h1>
	  <ul style="padding-right:5px;">
		<?php
			if($act != "call"){
				echo "
				<li><h3>Klik <span style='font-weight:bolder;font-size:50px;text-decoration:underline;'>Call</span> untuk memanggil nomor selanjutnya (suara memanggil antrian tidak otomatis keluar)</h3>
				<li><h3>Klik <span style='font-weight:bolder;font-size:50px;text-decoration:underline;'>Callback</span> untuk memanggil nomor antrian yang di hold atau tertunda</h3>
				";
			} else {
				echo "
				<li><h3>Klik <span style='font-weight:bolder;font-size:50px;text-decoration:underline;'>Play Audio</span> untuk memanggil dengan suara</h3>
				<li><h3>Klik <span style='font-weight:bolder;font-size:50px;text-decoration:underline;'>Hold</span> untuk menunda panggilan pasien yang tidak menjawab</h3>
				<li><h3>Klik <span style='font-weight:bolder;font-size:50px;text-decoration:underline;'>Clear</span> untuk selesaikan antrian pasien yang sudah menjawab / sudah selesai mendaftar</h3>
				";
			}
		?>
	  </ul>
	</div>
  </div>  
  <!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'"></div>
	<span class="w3-button w3-black w3-xlarge w3-display-topright">×</span>
	<div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
	  <img id="img01" class="w3-image">
	  <p id="caption"></p>
	</div>
  </div>
</div>
<script>
var num;
var loket;

function playAudio(num,loket) { 
var num1 = num;
	(function() {
		var numstring = num.toString();
		var res = numstring.split("");
		var numlenght = numstring.length;
		var Mp3Queue = function(container, files) {
			var index = 1;
			var nextindex;
			if(!container || !container.tagName || container.tagName !== 'AUDIO')throw 'Invalid container';
			if(!files || !files.length)throw 'Invalid files array';        
			var playNext = function() {
				// panggil nomor urut 1 sampai 9
				if (numlenght == 1) {
					if(index < files.length) {
						container.src = files[index];
						index += 1;
						if (index == 3) {
							if (num == 1){
								index = 3;
							} else if (num == 2){
								index = 4;
							} else if (num == 3){
								index = 5;
							} else if (num == 4){
								index = 6;
							} else if (num == 5){
								index = 7;
							} else if (num == 6){
								index = 8;
							} else if (num == 7){
								index = 9;
							} else if (num == 8){
								index = 10;
							} else if (num == 9){
								index = 11;
							}
						} else if (index > 3) {
							if (num > 0){
								index = 18;	
							}
							num = 0;
						}
					} else {
						container.removeEventListener('ended', playNext, false);
					}
				// panggil nomor urut 10 sampai 99
				} else if (numlenght == 2) {
					if(index < files.length) {
						container.src = files[index];
						index += 1;
						if (index == 3) {
							if (num == 10){
								index = 12;
								num = -1;
							} else if (num == 11){
								index = 13;
								num = -1;
							} else if (num >= 12 && num <=19){
								if (res[1] == 2) {
									index = 4;
								} else if (res[1] == 3) {
									index = 5;
								} else if (res[1] == 4) {
									index = 6;
								} else if (res[1] == 5) {
									index = 7;
								} else if (res[1] == 6) {
									index = 8;
								} else if (res[1] == 7) {
									index = 9;
								} else if (res[1] == 8) {
									index = 10;
								} else if (res[1] == 9) {
									index = 11;
								}
							} else if (num >= 20 ){
								if (res[1] == 0) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									} 
								} else if (res[1] == 1) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									}
								} else if (res[1] == 2) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									}
								} else if (res[1] == 3) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									}
								} else if (res[1] == 4) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									}
								} else if (res[1] == 5) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									}
								} else if (res[1] == 6) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									}
								} else if (res[1] == 7) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									}
								} else if (res[1] == 8) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									}
								} else if (res[1] == 9) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									}
								}
							}
						} else if (index > 3) {
							if (num >= 12 && num <= 19){
								index = 14;
								num = -1;
							} else if (num >= 20){
								if (res[1] == 0){
									index = 15;
									num = -1;
								} else {
									index = 15;
									num = -2;
								}
							} else if (num == -2){
								if (res[1] == 1){
									index = 3;	
								} else if (res[1] == 2){
									index = 4;
								} else if (res[1] == 3){
									index = 5;
								} else if (res[1] == 4){
									index = 6;
								} else if (res[1] == 5){
									index = 7;
								} else if (res[1] == 6){
									index = 8;
								} else if (res[1] == 7){
									index = 9;
								} else if (res[1] == 8){
									index = 10;
								} else if (res[1] == 9){
									index = 11;
								} 
								num = -1;
							} else if (num == -1){
								index = 18;	
								num = 0;
							}
						}
					} else {
						container.removeEventListener('ended', playNext, false);
					}
				// panggil nomor urut 100 sampai 999
				} else if (numlenght == 3) {
					if(index < files.length) {
						container.src = files[index];
						index += 1;
						if (index == 3) {
							if (res[0] == 1){
								index = 17;
							}else if (num >= 200){
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									} 
							}
						}else if (index > 3) {
							if (num == 100){
								num == -1;
							} else if (num > 100 && num < 200){
								if (res[1] == 0){
									if (res[2] == 1){
										index = 3;
									} else if (res[2] == 2){
										index = 4;
									} else if (res[2] == 3){
										index = 5;
									} else if (res[2] == 4){
										index = 6;
									} else if (res[2] == 5){
										index = 7;
									} else if (res[2] == 6){
										index = 8;
									} else if (res[2] == 7){
										index = 9;
									} else if (res[2] == 8){
										index = 10;
									} else if (res[2] == 9){
										index = 11;
									} 
									num = -1;
								} else if (res[1] == 1){
									if (res[2] == 0){
										index = 12;
										num = -1;
									} else if (res[2] == 1){
										index = 13;
										num = -1;
									} else if (res[2] >= 2){
										if (res[2] == 2){
											index = 4;
										} else if (res[2] == 3){
											index = 5;
										} else if (res[2] == 4){
											index = 6;
										} else if (res[2] == 5){
											index = 7;
										} else if (res[2] == 6){
											index = 8;
										} else if (res[2] == 7){
											index = 9;
										} else if (res[2] == 8){
											index = 10;
										} else if (res[2] == 9){
											index = 11;
										}
										num = -2;
									}
								} else if (res[1] >= 2){
									if (res[2] == 0){
										if (res[1] == 2){
											index = 4;
										} else if (res[1] == 3){
											index = 5;
										} else if (res[1] == 4){
											index = 6;
										} else if (res[1] == 5){
											index = 7;
										} else if (res[1] == 6){
											index = 8;
										} else if (res[1] == 7){
											index = 9;
										} else if (res[1] == 8){
											index = 10;
										} else if (res[1] == 9){
											index = 11;
										}
										num = -3;
									} else if (res[2] >= 1){
										if (res[1] == 2){
											index = 4;
										} else if (res[1] == 3){
											index = 5;
										} else if (res[1] == 4){
											index = 6;
										} else if (res[1] == 5){
											index = 7;
										} else if (res[1] == 6){
											index = 8;
										} else if (res[1] == 7){
											index = 9;
										} else if (res[1] == 8){
											index = 10;
										} else if (res[1] == 9){
											index = 11;
										}
										num = -4;
									}
									
								}
							} else if (num >= 200){
								if ((res[1] == 0) && (res[2] == 0)) {
									index = 16;
									num = -1;
								}else {
									index = 16;
									num = -6;
								}
							} else if (num == -6){
								if (res[1] == 0){
									if (res[2] == 1){
										index = 3;
									} else if (res[2] == 2){
										index = 4;
									} else if (res[2] == 3){
										index = 5;
									} else if (res[2] == 4){
										index = 6;
									} else if (res[2] == 5){
										index = 7;
									} else if (res[2] == 6){
										index = 8;
									} else if (res[2] == 7){
										index = 9;
									} else if (res[2] == 8){
										index = 10;
									} else if (res[2] == 9){
										index = 11;
									}
									num = -1;
								} else if (res[1] == 1){
									if (res[2] == 0){
										index = 12;
										num = -1;
									} else if (res[2] == 1){
										index = 13;
										num = -1;
									} else if (res[2] >= 2){
										if (res[2] == 2){
											index = 4;
										} else if (res[2] == 3){
											index = 5;
										} else if (res[2] == 4){
											index = 6;
										} else if (res[2] == 5){
											index = 7;
										} else if (res[2] == 6){
											index = 8;
										} else if (res[2] == 7){
											index = 9;
										} else if (res[2] == 8){
											index = 10;
										} else if (res[2] == 9){
											index = 11;
										}
										num = -2;
									} 
								} else if (res[1] >= 2){
									if (res[2] == 0){
										if (res[1] == 2){
											index = 4;
										} else if (res[1] == 3){
											index = 5;
										} else if (res[1] == 4){
											index = 6;
										} else if (res[1] == 5){
											index = 7;
										} else if (res[1] == 6){
											index = 8;
										} else if (res[1] == 7){
											index = 9;
										} else if (res[1] == 8){
											index = 10;
										} else if (res[1] == 9){
											index = 11;
										}
										num = -3;
									} else if (res[2] >= 1){
										if (res[1] == 2){
											index = 4;
										} else if (res[1] == 3){
											index = 5;
										} else if (res[1] == 4){
											index = 6;
										} else if (res[1] == 5){
											index = 7;
										} else if (res[1] == 6){
											index = 8;
										} else if (res[1] == 7){
											index = 9;
										} else if (res[1] == 8){
											index = 10;
										} else if (res[1] == 9){
											index = 11;
										}
										num = -4;
									}
									
								}
							} else if (num == -5){
								if (res[2] == 1){
									index = 3;	// untuk puluhan
								} else if (res[2] == 2){
									index = 4;
								} else if (res[2] == 3){
									index = 5;
								} else if (res[2] == 4){
									index = 6;
								} else if (res[2] == 5){
									index = 7;
								} else if (res[2] == 6){
									index = 8;
								} else if (res[2] == 7){
									index = 9;
								} else if (res[2] == 8){
									index = 10;
								} else if (res[2] == 9){
									index = 11;
								}
								num = -1;
							}  else if (num == -7){
								index = 16;	// untuk ratus
								
							} else if (num == -1){
								index = 18;	// langsung ke loket
								num = 0;
							} else if (num == -2){
								index = 14;	// untuk belasan
								num = -1;
							} else if (num == -3){
								index = 15;	// untuk puluhan
								num = -1;
							} else if (num == -4){
								index = 15;	// untuk puluhan
								num = -5;
							} 
						} 
					} else {
						container.removeEventListener('ended', playNext, false);
					}
				}
			};
			container.addEventListener('ended', playNext);
			container.src = files[0];
		};
		var container = document.getElementById('container');			
			new Mp3Queue(container, [
				'suara/ding.mp3',		// 0
				'suara/nomor-urut.mp3',	// 1
				'suara/a.mp3',			// 2
				'suara/satu.mp3',		// 3
				'suara/dua.mp3',		// 4
				'suara/tiga.mp3',		// 5
				'suara/empat.mp3',		// 6
				'suara/lima.mp3',		// 7
				'suara/enam.mp3',		// 8
				'suara/tujuh.mp3',		// 9
				'suara/delapan.mp3',	// 10
				'suara/sembilan.mp3',	// 11
				'suara/sepuluh.mp3',	// 12
				'suara/sebelas.mp3',	// 13
				'suara/belas.mp3',		// 14
				'suara/puluh.mp3',		// 15
				'suara/ratus.mp3',		// 16
				'suara/seratus.mp3',	// 17
				'suara/loket.mp3',		// 18
				'suara/dua.mp3'		// 19
				
			]);
	})();
}


</script>
</body>
</html>
