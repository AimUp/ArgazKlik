<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Argazklik</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
	</head>
	<body>
		<div id='edukia'>
			<div id="logeatzeko">
				<?php 
					include "sesioaKonprobatu.php";
					eremuBabestua();
				?>
			</div></br>
			<header>
				<center><h1><a class="titulua" href="./layout.php"> ArgazKlik</a></h1></center>
			</header>
			<section>
				<label class="parametroa">Nick: </label> <label class="balioa"><?php echo $_SESSION['login_user']; ?></label>
			</section>
	</body>
</html>