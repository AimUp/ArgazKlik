<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Argazklik</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
		<script>
			function argazkiaIgo(albumID){
				var argazkiaIgoFrame = document.getElementById("argazkiaIgoIframe");
				argazkiaIgoFrame.src = "argazkiaIgo.php?albumID="+albumID;
				if(argazkiaIgoFrame.style.display == "" || argazkiaIgoFrame.style.display == "none"){
					argazkiaIgoFrame.style = "display: inline-block;";
				}
				else {
					argazkiaIgoFrame.style = "display: none";
				}
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
			<div id="argazkiHandiaPantailaOsoa" style="visibility:hidden" onclick="argazkiHandiaPantailaOsoaItxi()">
				<div id="argazkiHandia" onclick="argazkiaEtiketatu()">
				</div>
			</div>
	</body>
</html>

