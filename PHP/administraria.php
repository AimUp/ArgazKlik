<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Argazklik</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
		<link rel='stylesheet' type='text/css' href='../CSS/bilatzeBarra.css' />
		<link rel='stylesheet' type='text/css' href='../CSS/botoiak.css' />
		<script>
			function erabiltzaileakErakutzi(){
				ezabatzeDiv = document.getElementById("ezabatzeDiv");
				ezabatzeDiv.style = "display: block;";
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200)){
						ezabatzeDiv.style = "display: inline-block;";
						document.getElementById("bilatuText").placeholder = "Ezabatzeko erabiltzailea bilatu";
						document.getElementById("erabiltzaileakDiv").innerHTML = xhttp.responseText;
					}
				};
				xhttp.open("GET","erabiltzaileakEzabatu.php", true);
				xhttp.send();
			}
			function albumakErakutzi(){
				ezabatzeDiv = document.getElementById("ezabatzeDiv");
				ezabatzeDiv.style = "display: block;";
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200)){
						ezabatzeDiv.style = "display: inline-block;";
						document.getElementById("bilatuText").placeholder = "Ezabatzeko albuma bilatu";
						document.getElementById("erabiltzaileakDiv").innerHTML = xhttp.responseText;
					}
				};
				xhttp.open("GET","albumakEzabatu.php", true);
				xhttp.send();
			}

			function ezabatuErabiltzaile(nick){
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200)){
						alert(xhttp.responseText);
					}
				};
				xhttp.open("GET","ezabatuErabiltzaileQuery.php?nick="+nick, true);
				xhttp.send();
				erabiltzaileakErakutzi();
				return false;
			}

			function ezabatuAlbum(ID){
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200)){
						alert(xhttp.responseText);
					}
				};
				xhttp.open("GET","ezabatuAlbumQuery.php?ID="+ID, true);
				xhttp.send();
				albumakErakutzi();
				return false;
			}
		</script>
	</head>
	<body>
		<div id='page-wrap'>
			<div id="logeatzeko">
				<?php 
					include "sesioaKonprobatu.php";
					adminEremua();
				?>
			</div></br>
			<header>
				<center><h1><a class="titulua" href="./layout.php"> ArgazKlik</a></h1></center>
			</header>
			<section>
				<div id="" style="text-align: center;">
					<button class="botoia botoiBerdea" style="opacity: 0.6; cursor: not-allowed;" onclick="">Administraria Sortu</button>

					<button class="botoia botoiGorria" onclick="erabiltzaileakErakutzi()">Erabiltzailea Ezabatu</button>

					<button class="botoia botoiGorria" onclick="albumakErakutzi()">Albuma Ezabatu</button>
				</div>
				<div id="ezabatzeDiv">
					<div class="bilatuDiv" id="bilatuDiv">
  						<input type='text' id='bilatuText' placeholder='Ezabatzeko erabiltzailea bilatu' />
  						<button type='button' id='bilatuButton'>Bilatu!</button>
					</div>

					<div id="erabiltzaileakDiv"> </div>	
				</div>
			</section>			
	</body>
</html>