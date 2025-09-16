<!DOCTYPE html>
<?php
include "koneksi.php";
?>
<!-- <meta http-equiv="refresh" content="1" /> -->


<html>

<head>
<title>Antrian RS Permata Pamulang</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="index_files/w3.css">
<link rel="stylesheet" href="index_files/css.css">
<script src="index_files/jquery.min.js"></script>
<script>
	$(document).ready( function(){
	$('#auto').load('load.php');
	$('#auto2').load('load2.php');
	$('#auto3').load('load3.php');
	$('#auto4').load('load4.php');
  $('#auto5').load('load5.php');
	refresh();
	});
	 
	function refresh()
	{
		setTimeout( function() {
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
	
</style>
</head>
<body class="w3-light-grey w3-content" style="max-width:1600px" onload="onload();">
 

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
  <span class="w3-left w3-padding">SOME NAME</span>
  <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="background-image: url(index_files/LogoRS.png); background-repeat: no-repeat, repeat;background-position: center; background-size: 700px 700px; opacity:0,25;">



  <!-- Push down content on small screens --> 
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Photo grid -->
  <div class="w3-row" style="margin-top:0; width: 33%; float: left;">
    <div class="refrh" style="border: 5px solid black; border-right:none; border-bottom:none; width: 100%; height:240px;">
		<center><h1 style='font-size:600%; letter-spacing: 8px; color: white;font-weight: 500;'>LOKET 1</h1></center>
		<div id="auto" style="color: white;">
			
		</div>
	
	</div>

    <div style="border: 5px solid black; border-right:none; border-bottom :none; width: 100%; height:243px;">
		<center><h1 style='font-size:600%; letter-spacing: 8px; color: white;font-weight: 500;'>LOKET 2</h1></center>
		<div id="auto2" style="color: white;">
			
		</div>
    </div>

    <div style="border: 5px solid black; border-right:none; width: 100%; height:245px;">
		<center><h1 style='font-size:600%; letter-spacing: 8px; color: white;font-weight: 500;'>Customer Care</h1></center>
		<div id="auto" style="color: white;">
			
		</div>
    </div>
	
	<!-- <div>
		<img alt="" src="index_files/LogoRS1.png" width="240" style="margin-left:100px;">
	</div> -->
	
  </div>  
  
  
  <div class="w3-col" style="width: 67%;height:480px;float: left;">
	<div style="border: 5px solid black; height:100%;">
		<!-- <video id="idle_video" width="100%" onended="onVideoEnded();" autoplay></video> -->
		<video src="video/video1.mp4" type="video/mp4" width="100%" autoplay loop></video>
	</div>
    
  
    <div class="w3-half" style="border: 5px solid black; width: 50%; height:248px">
		<center><h1 style='font-size:600%; letter-spacing: 8px; color: white;font-weight: 500;'>LOKET 3</h1></center>
		<div id="auto3" style="color: white;">
		
		</div>
	</div>
    <div class= "w3-half" style="border: 5px solid black;border-left:none; width: 50%; height:248px">
      <center><h1 style='font-size:600%; letter-spacing: 8px; color: white;font-weight: 500;'>LOKET 4</h1></center>
		<div id="auto4" style="color: white;">
		
		</div>
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

<script type='text/javascript'>
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

		var video_list      = ["video1.mp4", "video2.mp4"];
        var video_index     = 0;
        var video_player    = null;

        function onload(){
            console.log("body loaded");
            video_player= document.getElementById("idle_video");
            video_player.setAttribute("src", video_list[video_index]);
            video_player.play();
        }

        function onVideoEnded(){
            console.log("video ended");
            if(video_index < video_list.length - 1){
                video_index++;
            }
            else{
                video_index = 0;
            }
            video_player.setAttribute("src", video_list[video_index]);
            video_player.play();
        }
 
</script>


</body>
</html>
