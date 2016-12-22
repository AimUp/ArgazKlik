<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Argazklik</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
		<script type="text/javascript" src="../JS/argazkiak.js"></script>
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
							include "CONNECT.php";
							if(isset($_GET['hitza']) && $_GET['hitza']!=""){
								$query = "SELECT argazkiak.ID, argazkiak.Egilea, argazkiak.Argazkia, argazkiak.IgoeraData, argazkiak.Deskribapena "
									."FROM argazkiak INNER JOIN taghitza ON argazkiak.ID=taghitza.ArgazkiID "
									."WHERE hitza='".$_GET['hitza']."' "
									."AND (argazkiak.Eskuragarritasuna='publikoa' ";
								if(isset($SESSION['login_user'])){
									$query .= "OR argazkiak.Eskuragarritasuna='atzipenMugatua' ";
								}
								$query .=")ORDER BY IgoeraData DESC";

								$erantzuna = $conn->query($query);
								echo "<label style='margin-top:50px; text-align: center;'><h2>#". $_GET['hitza'] ."</h2></label>";
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
										echo "	<img class='argazkia' src='data:image/png;base64,".base64_encode( $lerroa['Argazkia'] )."' onclick='argazkiaIkusi(".$lerroa['ID'].")' style='width: 200px;' /><br/>
												<label style='margin-top:50px; text-align: left;'><b>". $lerroa['Egilea'] ."</b>, </label>
												<label style='margin-top:50px; text-align: left;'>". $lerroa['IgoeraData'] ."</label><br/>";
										if($lerroa['Deskribapena']!=""){
											echo "<p style='display: inline-block; padding: 3px; width: 200px; min-height:20px; border: solid 1px black; text-align:left'>". $lerroa['Deskribapena'] ."</p>";
										}
										echo "</td>";
									}
									echo "</tr></table></center>";
								}
								else{
									echo "<br/><center><label class='errorea'>Ez dago argazkirik</label></center>";
								}
							}	
							else{
								echo "<br/><center><label class='errorea'>Ez dago argazkirik</label></center>";
							}
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