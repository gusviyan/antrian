<!DOCTYPE html>

<?php
include "koneksi.php";
?>

<html>
<title>COUNTER 4</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="index_files/w3.css">
<link rel="stylesheet" href="index_files/css.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-third img{margin-bottom: -6px; opacity: 0.8; cursor: pointer}
.w3-third img:hover{opacity: 1}
</style>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

$(document).ready( function(){
	$('#auto').load('load4.php');
	refresh();
	});
	 
	function refresh()
	{
		setTimeout( function() {
		  $('#auto').fadeIn("slow").load('load4.php').fadeOut("slow");
		  refresh();
		}, 2000);
	}

</script>




<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:300px;font-weight:bold" id="mySidebar"><br>
  <h3 class="w3-padding-10 w3-center"><b>ANTRIAN HOLD</b></h3>
  
	<?php
		$act = $_GET['act'];
		$hld = mysql_query ("SELECT * FROM tbl_bpjs_rajal WHERE status = 2 and panggil = 0");
		echo" <table style='table-layout:fixed; padding-left:5px'>
				<col width='50%' />
				<col width='25%' />
				<col width='25%' />
		";
		while ($hldlist = mysql_fetch_array($hld)) {
			echo"
			<tr>
			<td align='left' colspan=2><font size=40> $hldlist[0] </font></td>
			<td > 
			<form method=POST action='aksi_panggil.php?act=clearer&id=$hldlist[0]&loket=4'>
			<button onclick='document.getElementById('clear').style.display=block;playAudio($hldlist[0],2)' class='w3-button w3-black'>Clear</button> 
			</form>
			</td>";
			if ( $act != "call"){
			echo"
			<td > 
			<a href='counterumumloket4.php?act=callback&no=$hldlist[0]'><button class='w3-button w3-black' onclick='playAudio($hldlist[0],2)'>Callback</button> </a>
			
			</td>
			</tr>
			";
			}
		}
		echo" </table>";
	?>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
  <span class="w3-left w3-padding">SOME NAME</span>
  <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Push down content on small screens --> 
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Photo grid -->
  <div class="w3-row" style="margin-top:0">
    <div class="w3-half" style="border: 5px solid black; width: 50%; height:750px">
		<div class="w3-top w3-large" style="padding-left: 5px;">
			<p style="font-size:200%"><a href='counterumumloket4.php?act=call'><button onclick="document.getElementById('rajal').style.display='block'" class="w3-button w3-black">Call</button></a>
			</p>
		</div>
		
		<div class="w3-display-topmiddle w3-large" style="width:250px; height:200px;border:2px solid black;">
			<h2 style="text-align:center;">Next</h2>
				<div id="auto" style="padding:0;">
			
				</div>
		</div>
		
		<?php
		
		if ( $act == "call") {
			$cek = mysql_query ("SELECT * FROM tbl_bpjs_rajal WHERE status = 2 AND panggil = 2 AND loket = 4 LIMIT 1");
			$pgl = mysql_num_rows ($cek);
			if ($pgl == 0){
				$cek = mysql_query ("SELECT * FROM tbl_bpjs_rajal WHERE status = 0 AND panggil = 0 LIMIT 1");
				$pgl = mysql_fetch_array ($cek);
				mysql_query("UPDATE tbl_bpjs_rajal SET  panggil = 1, loket = 4 WHERE id = $pgl[0]");
				mysql_query("UPDATE tbl_bpjs_rajal SET  panggil = 0, loket = 0 WHERE status = 2 AND loket = 4");
				if ($pgl != ''){
					echo"
					<div id='rajal' style='display: block;'>	
					<center>
					<h1 style='font-size:1200%; padding-top: 100px'>B$pgl[0]</h1>
					</center>
					
					<div class='w3-display-bottomleft w3-large' style='padding-left: 100px; padding-bottom: 200px;'>
					
					<form method=POST action='aksi_panggil.php?act=clear&id=$pgl[0]&loket=4'>
					<p style='font-size:200%;padding-left: 20px;'>
					<button onclick='document.getElementById('clear').style.display=block' class='w3-button w3-black'>Clear</button></p>
					</form>
					
					</div>
					
					<div class='w3-display-bottomleft w3-large' style='padding-bottom: 200px;'>
					<form method=POST action='aksi_panggil.php?act=hold&id=$pgl[0]&loket=4'>
					<p style='font-size:200%; '>
					<button onclick='document.getElementById('hold').style.display=block' class='w3-button w3-black'>Hold</button></p>
					</form>
					
					</div>
					<div class='w3-top w3-large' style='position:absolute; left:310px; top:0px; '>
					<p style='font-size:200%;'>
					<button onclick='playAudio($pgl[0],1)' class='w3-button w3-black' type='button'>Play Audio</button>
					</p>
					</div>
					</div>";
			
				}else{
					echo "
					<h1 style='font-size:300%; padding-top: 200px'>Belum ada antrian</h1>
					<div class='w3-display-bottomleft w3-large' style='padding-bottom: 200px;'>
					<p style='font-size:200%;'><a href='counterumumloket4.php?act=default'><button onclick='document.getElementById('rajal').style.display=block' class='w3-button w3-black'>Back</button></a></p>
					</div>
					";
				}
			} else {
				$cek = mysql_query ("SELECT * FROM tbl_bpjs_rajal WHERE status = 0 AND panggil = 1 AND loket = 4 LIMIT 1");
				$pgl = mysql_fetch_array ($cek);
				//mysql_query("UPDATE tbl_bpjs_rajal SET  panggil = 1, loket = 4 WHERE id = $pgl[0]");
				// mysql_query("UPDATE tbl_bpjs_rajal SET  panggil = 0, loket = 0 WHERE status = 2 AND loket = 4");
				if ($pgl != ''){
					echo"
					<div id='rajal' style='display: block;'>	
					<center>
					<h1 style='font-size:1200%; padding-top: 100px'>B$pgl[0]</h1>
					</center>
					
					<div class='w3-display-bottomleft w3-large' style='padding-left: 100px; padding-bottom: 200px;'>
					
					<form method=POST action='aksi_panggil.php?act=clear&id=$pgl[0]&loket=4'>
					<p style='font-size:200%;padding-left: 20px;'>
					<button onclick='document.getElementById('clear').style.display=block' class='w3-button w3-black'>Clear</button></p>
					</form>
					
					</div>
					
					<div class='w3-display-bottomleft w3-large' style='padding-bottom: 200px;'>
					<form method=POST action='aksi_panggil.php?act=hold&id=$pgl[0]&loket=4'>
					<p style='font-size:200%; '>
					<button onclick='document.getElementById('hold').style.display=block' class='w3-button w3-black'>Hold</button></p>
					</form>
					
					</div>
					<div class='w3-top w3-large' style='position:absolute; left:310px; top:0px; '>
					<p style='font-size:200%;'>
					<button onclick='playAudio($pgl[0],1)' class='w3-button w3-black' type='button'>Play Audio</button>
					</p>
					</div>
					</div>";
			
				}
			}
		
		}else if ( $act == "callback") {
		$cek = mysql_query ("SELECT * FROM tbl_bpjs_rajal WHERE status = 2 and id=$_GET[no]");
		$pgl = mysql_fetch_array ($cek);
			mysql_query("UPDATE tbl_bpjs_rajal SET  panggil = 0, loket = 0 WHERE status = 2 AND loket = 4");
			mysql_query("UPDATE tbl_bpjs_rajal SET  panggil = 0, loket = 0 WHERE status = 0 AND loket = 4");
			mysql_query("UPDATE tbl_bpjs_rajal SET  panggil = 2, loket = 4 WHERE id = $pgl[0]");
			
			if ($pgl != ''){
			echo"
			<div id='rajal' style='display: block;'>	
			<center>
			<h1 style='font-size:1200%; padding-top: 100px'>B$pgl[0]</h1>
			</center>
			<div class='w3-display-bottomleft w3-large' style='padding-left: 100px; padding-bottom: 200px;'>
			<form method=POST action='aksi_panggil.php?act=clear&id=$pgl[0]&loket=4'>
			<p style='font-size:200%;padding-left: 20px;'>
			<button onclick='document.getElementById('clear').style.display=block' class='w3-button w3-black'>Clear</button></p>
			</form>
			</div>
			
			<div class='w3-display-bottomleft w3-large' style='padding-bottom: 200px;'>
			<form method=POST action='aksi_panggil.php?act=hold&id=$pgl[0]&loket=4'>
			<p style='font-size:200%;'>
			<button onclick='document.getElementById('hold').style.display=block' class='w3-button w3-black'>Hold</button></p>
			</form>
			</div>
			
			<div class='w3-top w3-large' style='position:absolute; left:310px; top:0px; '>
			<p style='font-size:200%;'>
			<button onclick='playAudio($pgl[0],1)' class='w3-button w3-black' type='button'>Play Audio</button>
			</p>
			</div>
			
			</div>";
		
			}
		}
		
		?>
		
			
		<center>
		<h1 class='w3-display-bottomleft' style='font-size:300%;padding-bottom: 7%;'> BPJS
		<audio id="container" autoplay=""></audio>
		
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
  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
    <span class="w3-button w3-black w3-xlarge w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption"></p>
    </div>
  </div>

 


 
<!-- End page content -->
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
								index = 17;	
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
								index = 17;	
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
							index = 16;
						} else if (index > 3) {
							if (num == 100){
								num == -1
							} else if (num > 100){
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
											index = 5;
										} else if (res[1] == 5){
											index = 5;
										} else if (res[1] == 6){
											index = 5;
										} else if (res[1] == 7){
											index = 5;
										} else if (res[1] == 8){
											index = 5;
										} else if (res[1] == 9){
											index = 5;
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
							} else if (num == -1){
								index = 17;	// langsung ke loket
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
				'suara/nomor-urut.wav',	// 1
				'suara/b.mp3',			// 2
				'suara/satu.wav',		// 3
				'suara/dua.wav',		// 4
				'suara/tiga.wav',		// 5
				'suara/empat.wav',		// 6
				'suara/lima.wav',		// 7
				'suara/enam.wav',		// 8
				'suara/tujuh.wav',		// 9
				'suara/delapan.wav',	// 10
				'suara/sembilan.wav',	// 11
				'suara/sepuluh.wav',	// 12
				'suara/sebelas.wav',	// 13
				'suara/belas.wav',		// 14
				'suara/puluh.wav',		// 15
				'suara/seratus.wav',	// 16
				'suara/loket.wav',		// 17
				'suara/empat.wav'		// 18
				
			]);
	})();
}

</script>


</body>
</html>
