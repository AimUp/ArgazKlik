<?php
	include "sesioaKonprobatu.php";
	adminEremua();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Argazklik</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
		<link rel='stylesheet' type='text/css' href='../CSS/bilatzeBarra.css' />
		<link rel='stylesheet' type='text/css' href='../CSS/botoiak.css' />
		<link rel='stylesheet' type='text/css' href='../CSS/irudiakEzabatu.css' />
		<script>
			function erabiltzaileakErakutzi(){
				document.getElementById("ErabBilatuText").style = "display: block";
				document.getElementById("AlbumBilatuText").style = "display: none";
				document.getElementById("ArgazkiAlbumBilatuText").style = "display: none";

				document.getElementById("ErabBilatuText").placeholder = "Ezabatzeko erabiltzailea bilatu";
				document.getElementById("informazioDiv").innerHTML = "<center><font class='errorea'>Kargatzen...</font></center>";

				erabiltzailea = document.getElementById("ErabBilatuText").value;
				document.getElementById("ezabatzeDiv").style = "display: block;";
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200)){
						document.getElementById("informazioDiv").innerHTML = xhttp.responseText;
					}
				};
				xhttp.open("GET","erabiltzaileakEzabatu.php?erabiltzailea="+erabiltzailea, true);
				xhttp.send();
			}

			function albumakErakutzi(){
				document.getElementById("AlbumBilatuText").style = "display: block";
				document.getElementById("ErabBilatuText").style = "display: none";
				document.getElementById("ArgazkiAlbumBilatuText").style = "display: none";

				document.getElementById("AlbumBilatuText").placeholder = "Ezabatzeko albuma bilatu";
				document.getElementById("informazioDiv").innerHTML = "<center><font class='errorea'>Kargatzen...</font></center>";

				album = document.getElementById("AlbumBilatuText").value;
				document.getElementById("ezabatzeDiv").style = "display: block;";
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200)){
						document.getElementById("informazioDiv").innerHTML = xhttp.responseText;
					}
				};
				xhttp.open("GET","albumakEzabatu.php?album="+album, true);
				xhttp.send();
			}

			function argazkiakErakutzi(){ 
				document.getElementById("ErabBilatuText").style = "display: none";
				document.getElementById("AlbumBilatuText").style = "display: none";
				document.getElementById("ArgazkiAlbumBilatuText").style = "display: block";

				document.getElementById("ArgazkiAlbumBilatuText").placeholder = "argazkia albumez bilatu";
				document.getElementById("informazioDiv").innerHTML = "<center><font class='errorea'>Kargatzen...</font></center>";

				ArgazkiAlbum = document.getElementById("ArgazkiAlbumBilatuText").value;		
				document.getElementById("ezabatzeDiv").style = "display: block;";
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200)){
						document.getElementById("informazioDiv").innerHTML = xhttp.responseText;
					}
				};
				xhttp.open("GET","argazkiakEzabatu.php?album="+ArgazkiAlbum, true);
				xhttp.send();
			}

			function ezabatuErabiltzaile(nick){
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200)){
						erabiltzaileakErakutzi();
					}
				};
				xhttp.open("GET","ezabatuErabiltzaileQuery.php?nick="+nick, true);
				xhttp.send();
				return false;
			}

			function ezabatuAlbum(ID){
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200)){
						albumakErakutzi();
					}
				};
				xhttp.open("GET","ezabatuAlbumQuery.php?ID="+ID, true);
				xhttp.send();
				return false;
			}

			function ezabatuArgazkia(ID){
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200)){
						argazkiakErakutzi();
					}
				};
				xhttp.open("GET","ezabatuArgazkiaQuery.php?ID="+ID, true);
				xhttp.send();
				return false;
			}
		</script>
	</head>
	<body>
		<div id='page-wrap'>
			<div id="logeatzeko">
				<?php 
					echo "<a href='profile.php?user=".strtolower($_SESSION['login_user'])."'>" . strtolower($_SESSION['login_user']) . "</a><br/>";
					echo "<a href='logOut.php'>LogOut</a>";
				?>
			</div></br>
			<header>
				<center><h1><a class="titulua" href="./layout.php"> ArgazKlik</a></h1></center>
			</header>
			<section>
				<div id="" style="text-align: center;">
					<button class="botoia botoiBerdea" style="opacity: 0.6; cursor: not-allowed;" onclick="">Administraria Sortu</button>

					<button class="botoia botoiGorria" onclick="document.getElementById('ErabBilatuText').value = '';erabiltzaileakErakutzi()">Erabiltzailea Ezabatu</button>

					<button class="botoia botoiGorria" onclick="document.getElementById('AlbumBilatuText').value = ''; albumakErakutzi()">Albuma Ezabatu</button>

					<button class="botoia botoiGorria" onclick="document.getElementById('ArgazkiAlbumBilatuText').value = ''; argazkiakErakutzi()">Argazkia Ezabatu</button>
				</div>
				<div id="ezabatzeDiv">
					<div class="bilatuDiv" id="bilatuDiv">
  						<input type='text' class="bilatuText" id='ErabBilatuText' onkeyup="erabiltzaileakErakutzi()" />
  						<input type='text' class="bilatuText" id='AlbumBilatuText' onkeyup="albumakErakutzi()" />
  						<input type='text' class="bilatuText" id='ArgazkiAlbumBilatuText' onkeyup="argazkiakErakutzi()" />
					</div>

					<div id="informazioDiv"> </div>	
				</div>
			</section>
		</div>		
	</body>
</html>