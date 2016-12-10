<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Argazklik</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
		<script>
			function albumaSortu(){
				var albumSortzeFrame = document.getElementById("albumaSortuIframe");
				if(albumSortzeFrame.style.display == "" || albumSortzeFrame.style.display == "none"){
					albumSortzeFrame.style = "display: inline-block;";
				}
				else {
					albumSortzeFrame.style = "display: none";
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
					include "userInfoQuery.php"; 
					include "userAlbumQuery.php";
				?>
				<div id="erabNav">
					<table>
						<tr>
							<td rowspan="4" style="padding-right: 100px"><?php echo "<img src='data:Argazkia/jpeg;base64,".base64_encode($Argazkia)."' width='200px' />"; ?></td>
						    <td><label class="parametroa">Nick: </label> <label class="balioa"><?php echo $Nick; ?></label></td>
						</tr>
						<tr>
						    <td><label class="parametroa">Eposta: </label> <label class="balioa"><?php echo $Eposta; ?></label></td>
						</tr>
						<tr>
							<td><label class="parametroa">Izen Abizenak: </label> <label class="balioa"><?php echo $IzenAbizen; ?></label></td>
						</tr>
					</table>
				</div>
				<div id="edukia">
					<input type="button" onclick="albumaSortu()" value="Album berria sortu"><br>
					<iframe id="albumaSortuIframe" src="albumaSortu.php" style="display:none"></iframe>
					<p> 
					<?php
						if ($erantzuna->num_rows > 0) {
							echo "<table class='albumTable'><tr>";
							while($lerroa = $erantzuna->fetch_assoc()) {			
								echo "<td>";
								echo "<div>";
								echo "<img class='folder' src='../IMG/Folder.png' onclick='window.location=\"userAlbumEdukiaIkusi.php?albumID=".$lerroa['ID']."&albumIzena=".$lerroa['Izena']."\"' width='50px'/><br/>";
								echo $lerroa['Izena']."<br/>";
								echo $lerroa['Egilea']."<br/>";
								echo $lerroa['SorreraData']."<br/><br/>";
								echo "</div>";
								echo "<td>";
							}
							echo "</tr></table>";
						}
				 	?>
					</p>
				</div>
			</section>			
	</body>
</html>