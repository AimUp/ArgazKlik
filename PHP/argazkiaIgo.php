<!DOCTYPE html>
<html>
	<head>
   		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Argazkia Igo</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
		<script>
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
			function checkArgazkia(){
				var argazkia = document.getElementById('argazkia').files[0];
				if(argazkia==null){
					document.getElementById("errorea").innerHTML = "<center class='errorea'>Argazki bat aukeratu</center><br>";
					return false;
				}
				if(argazkia.size > 1000000){
					document.getElementById("errorea").innerHTML = "<center class='errorea'>Argazkia handiegia da. 1MB baino txikiagoko argazki bat aukeratu, mesedez.</center><br>";
					return false;
				}
				return true;
			}
		</script>
	</head>
	<body>
		<div id="edukia">
			<form id="argazkiBerria" name="argazkiBerria" method="POST" onsubmit="return checkArgazkia()" action="argazkiaIgoQuery.php" enctype="multipart/form-data">
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
				Argazkia: <input type="file" id="argazkia" name="argazkia" onchange="irudiAurrekarga(this.files[0])"><br/>
				<img id="argazkiAurrekarga" alt="Argazkia" style="display: none; height: 150px; width:auto" /><br/>

				<input type="text" name="albumID" id="albumID" value=<?PHP echo "\"".$_GET['albumID']."\""; ?> style="display: none;" />

				<input type='submit' value='Sartu'/>
			</form>
			<div id="errorea"></div>
		</div>
	</body>
</html>