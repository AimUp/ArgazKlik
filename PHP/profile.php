<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Argazklik</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
		<script>
			function albumaSortu(){
				sortzeFrame = document.getElementById("albumaSortuIframe");
				if(sortzeFrame.style.display == "" || sortzeFrame.style.display == "none"){
					sortzeFrame.style = "display: inline-block;";
				}
				else {
					sortzeFrame.style = "display: none";
				}
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
				<?php
					include "userInfoQuery.php"; 
					include "userAlbumQuery.php"; 
				?>
				<div id="erabNav">
					<p><label class="balioa"><?php echo "<img src='data:Argazkia/jpeg;base64,".base64_encode($Argazkia)."' width='100px' />"; ?></label></p>
					<p><label class="parametroa">Nick: </label> <label class="balioa"><?php echo $Nick; ?></label></p>
					<p><label class="parametroa">Eposta: </label> <label class="balioa"><?php echo $Eposta; ?></label></p>
					<p><label class="parametroa">Izen Abizenak: </label> <label class="balioa"><?php echo $IzenAbizen; ?></label></p>
				</div>
				<div id="edukia">
					<input type="button" onclick="albumaSortu()" value="Album berria sortu"><br>
					<iframe id="albumaSortuIframe" src="albumaSortu.php" style="display:none"></iframe>

					<p> 
					<?php
						if ($erantzuna->num_rows > 0) {
							while($lerroa = $erantzuna->fetch_assoc()) {
								echo "<img src='../IMG/Folder.png' width='50px'/><br/>";
								echo $lerroa['Izena']."<br/>";
								echo $lerroa['Egilea']."<br/>";
								echo $lerroa['SorreraData']."<br/><br/>";
							}
						}
				 	?>
					</p>
				</div>
			</section>			
	</body>
</html>