<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Argazklik</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
		<link rel='stylesheet' type='text/css' href='../CSS/irudiakEzabatu.css' />
		<script type="text/javascript" src="../JS/argazkiak.js"></script>
		<script>
			function argazkiaIgo(){
				var argazkiaIgoFrame = document.getElementById("argazkiaIgoIframe");
				if(argazkiaIgoFrame.style.display == "" || argazkiaIgoFrame.style.display == "none"){
					argazkiaIgoFrame.style = "display: inline-block;";
				}
				else {
					argazkiaIgoFrame.style = "display: none";
				}
			}

			function ezabatzeModua(){
				var x = document.getElementsByClassName("show");
				var y = document.getElementsByClassName("ezabatuBotoia");
				if(x.length==0){
					var x = document.getElementsByClassName("show-image");
					for(i=x.length-1; i>=0; i--){
						x[i].className = "show";
						y[i].style = "display: none";
					}
				}
				else{
					for(i=x.length-1; i>=0; i--){
						x[i].className = "show-image";
						y[i].style = ":hover {display: block}";
					}
				}
			}

			function ezabatuArgazkia(ID){
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200)){
						location.reload(); 
					}
				};
				xhttp.open("GET","ezabatuArgazkiaQuery.php?ID="+ID, true);
				xhttp.send();
				return false;
			}
		</script>
		<script type="text/javascript" src="../JS/argazkiak.js"></script>
	</head>
	<body>
		<div id='page-wrap'>
			<div id="logeatzeko">
				<?php 
					include "sesioaKonprobatu.php";
					bazkideEremua();
				?>
			</div></br>
			<header>
				<center><h1><a class="titulua" href="./layout.php">ArgazKlik</a></h1></center>
			</header>
			<section>
				<?php
					include "albumPribatuaIkusiQuery.php";
				?>
			</section>
			<div id="argazkiHandiaPantailaOsoa" style="visibility:hidden">
				<div id="argazkiHandia">
				</div>
			</div>
	</body>
</html>

