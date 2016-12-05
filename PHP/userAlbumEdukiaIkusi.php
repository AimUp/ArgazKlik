<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Argazklik</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
		<script>
			function argazkiaIgo(albumID){
				var argazkiaIgoFrame = document.getElementById("argazkiaIgoIframe");
				if(argazkiaIgoFrame.style.display == "" || argazkiaIgoFrame.style.display == "none"){
					argazkiaIgoFrame.style = "display: inline-block;";
				}
				else {
					argazkiaIgoFrame.style = "display: none";
				}
			}
		</script>
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
				<center><h1><a class="titulua" href="./layout.php"> ArgazKlik</a></h1></center>
			</header>
			<section>
				<?php
					echo "<center><b>Albuma: </b>".$_GET['izena']."</center>";

					include "CONNECT.php";

					$albumID = $_GET['ID'];
					$query = "SELECT * FROM Argazkiak WHERE AlbumID='".$albumID."' ORDER BY IgoeraData DESC";
					$erantzuna = $conn->query($query);

					echo "<input type='button' value='Argazkia igo' onclick='argazkiaIgo(".$albumID.")'>";
					echo "<iframe id='argazkiaIgoIframe' src='argazkiaIgo.php?albumID=".$albumID."' style='display:block;'></iframe>";
					
					if ($erantzuna->num_rows > 0) {
						echo "<center><table><tr>";
						$kont = 0;
						while($lerroa = $erantzuna->fetch_assoc()) {
							if($kont==4){
								echo "</tr><tr>";
								$kont = 1;	
							}
							else{
								$kont ++;	
							}
							echo "<td>";
							echo "<div onclick='argazkiaIkusi(".$lerroa['ID'].")'><br/>";
							echo "<img src='data:Argazkia/jpeg;base64,".base64_encode( $lerroa['Argazkia'] )."' width='250px' onclick='window.location=\"argazkiaIkusi.php?ID=".$lerroa['ID']."\"'/><br/>";
							echo $lerroa['Deskribapena']."<br/>";
							echo $lerroa['Egilea']."<br/>";
							echo $lerroa['IgoeraData']."<br/><br/>";
							echo "</div><td>";
						}
						echo "</table></center>";
					}
					else{
						echo "<br><br><center class='errorea'>Ez daukazu argazkirik</center><br>";
					}

				?>
			</section>			
	</body>
</html>

