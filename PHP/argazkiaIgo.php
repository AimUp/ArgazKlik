<!DOCTYPE html>
<html>
	<head>
   		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Argazkia Igo</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
		<script>
			var albumID = window.location.search.substr(1);
			function irudiAurrekarga(irudia){
				document.getElementById('argazkiAurrekarga').style.display = 'inline';
				document.getElementById('argazkiAurrekarga').src = window.URL.createObjectURL(irudia);
			}
			/*function eskuragarritasunaBesteak() {
				if(document.getElementById("eskuragarritasuna").value=="Kustomizatua"){
					document.getElementById("customEskur").style.display = "inline";
				}
				else {
					document.getElementById("customEskur").style.display = "none";
				}
			}*/
			function argazkiBerriaIgo(albumID){
				var eskurag = document.getElementById("eskuragarritasuna").value;
				var deskrib = document.getElementById("deskribapena").value;
				var argazkia = document.getElementById("argazkia").files[0];
				/*if(eskurag == "Kustomizatua"){
					eskurag = document.getElementById("customEskur").value
				}*/
				xhttp = new XMLHttpRequest();
				var param="";
				param += "eskurag="+eskurag+"&";
				param += "deskrib="+deskrib+"&";
				param += "albumID="+albumID+"&";
				param += "argazkia="+argazia;
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200)){
						document.getElementById("erantzuna").innerHTML = xhttp.responseText;
					}
				};
				xhttp.open("POST","albumaSortuQuery.php", true);
				xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhttp.send(param);
			}
		</script>
	</head>
	<body>
		<div id="edukia">
			<form id="argazkiBerria" name="argazkiBerria" method="POST" action="" enctype="multipart/form-data">
				Eskuragarritasuna:
				<select id="eskuragarritasuna" name="eskuragarritasuna" ><br>
					<option>Pribatua</option>
					<option>Atzipen mugauta</option>
					<option>Publikoa</option>
					<!--<option>Kustomizatua</option>-->
				</select><font color="red">*</font>
				Deskribapena:
				<textarea id="deskribapena" name="deskribapena" style="resize: none; width: 320px; height: 40px"></textarea><br /><br>
				<!--<div id="divBesteak" style="display:none">
					<br/><input type="text" id="customEskur" name="customEskur" placeholder="Eskuragarritasuna eukiku duten erabiltzaileak zehaztu" size="50">
				</div><br/>-->
				Argazkia: <input type="file" id="argazkia" name="argazkia" onchange="irudiAurrekarga(this.files[0])"> <br/>
				<img id="argazkiAurrekarga" alt="Argazkia" style="display: none; height: 150px; width:auto" /><br/>
				<?PHP
					echo "<input type='button' value='Sartu' onclick='argazkiBerriaIgo(".$_GET['albumaID'].")'>";
				?>
			</form>
			<div id="erantzuna"></div>
		</div>
	</body>
</html>