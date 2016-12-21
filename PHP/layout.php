<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Argazklik</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
		<script>
			function argazkiPublikoakIkusi(){
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200 )){
						document.getElementById("argazkiak").innerHTML = xhttp.responseText;
					}
				};
				xhttp.open("GET","../PHP/argazkiPublikoakIkusiQuery.php", true);
				xhttp.send();
			}
			
			function albumaIkusi(albumID,albumIzena){
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200 )){
						document.getElementById("argazkiak").innerHTML = xhttp.responseText;
					}
				};
				xhttp.open("GET","../PHP/albumPublikoaIkusiQuery.php?albumID="+albumID+"&albumIzena="+albumIzena, true);
				xhttp.send();
			}
		</script>
		<script type="text/javascript" src="../JS/argazkiak.js"></script>
	</head>
	<body>
		<div id='page-wrap'>
			<div id="logeatzeko">
				<?php 
					include "sesioaKonprobatu.php";
					eremuArrunta();
				?>
			</div></br>
			<header>
				<center><h1><a class="titulua" href="./layout.php"> ArgazKlik</a></h1></center>
			</header>
			<section>
				<div id="edukia">
					<div id="argazkiak">
						<?php	
							include "argazkiPublikoakIkusiQuery.php";
						?>
					</div>
				</div>
				<div id="argazkiHandiaPantailaOsoa" style="visibility:hidden">
					<div id="argazkiHandia">
					</div>
				</div>
			</section>
		</div>
	</body>
</html>