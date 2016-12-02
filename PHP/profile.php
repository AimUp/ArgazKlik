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
			function albumaIkusi(id){
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200)){
						document.getElementById("albumEdukia").innerHTML = xhttp.responseText;
					}
				};
				xhttp.open("POST","userAlbumEdukiaIkusi.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("ID="+id);
			}
			function argazkiaIgo(albumID){
				var argazkiaIgoFrame = document.getElementById("argazkiaIgoIframe");
				if(argazkiaIgoFrame.style.display == "" || argazkiaIgoFrame.style.display == "none"){
					argazkiaIgoFrame.style = "display: inline-block;";
				}
				else {
					argazkiaIgoFrame.style = "display: none";
				}
				
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200)){
						//document.getElementById("albumEdukia").innerHTML = xhttp.responseText;
					}
				};
				xhttp.open("GET","argazkiaIgo.php?albumaID="+albumID, true);
				xhttp.send();
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
								echo "<div onclick='albumaIkusi(".$lerroa['ID'].")'>";
								echo "<img src='../IMG/Folder.png' width='50px'/><br/>";
								echo $lerroa['Izena']."<br/>";
								echo $lerroa['Egilea']."<br/>";
								echo $lerroa['SorreraData']."<br/><br/>";
								echo "</div>";
							}
						}
				 	?>
					</p><br>
					<div id="albumEdukia"></div><br>
					<iframe id="argazkiaIgoIframe" src="argazkiaIgo.php" style="display:none"></iframe>
				</div>
			</section>			
	</body>
</html>