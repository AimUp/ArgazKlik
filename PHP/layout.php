<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Argazklik</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
		<script>
			var timer;
			timer = setInterval(argazkiPublikoakIkusi, 60000);
			
			function argazkiPublikoakIkusi(){
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200 )){
						document.getElementById("argazkiPublikoak").innerHTML = xhttp.responseText;
					}
				};
				xhttp.open("GET","../PHP/argazkiPublikoakIkusiQuery.php", true);
				xhttp.send();	
			}
		</script>
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
					<div id="argazkiPublikoak">
						<?PHP
							include "argazkiPublikoakIkusiQuery.php";
						?>
					</div>
				</div>
			</section>
		</div>
	</body>
</html>