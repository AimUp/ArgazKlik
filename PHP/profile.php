<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Argazklik</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
		<script>
			function albumaSortu(){
				document.getElementById("albumaSortuIframe").style = "display:inside-block;";
			}
		</script>
	</head>
	<body>
		<div id='page-wrap'>
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
			<div id="erabNav">
			
			</div>
			<div id="edukia">
				<input type="button" onclick="albumaSortu()" value="Album berria sortu"><br>
				<iframe id="albumaSortuIframe" src="albumaSortu.php" style="display:none"></iframe>
			</div>
	</body>
</html>