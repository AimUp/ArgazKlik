<!DOCTYPE html>
<html>
	<head>
   		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Log In</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
		<script>
			/*function eskuragarritasunaBesteak() {
				if(document.getElementById("eskuragarritasuna").value=="Kustomizatua"){
					document.getElementById("customEskur").style.display = "inline";
				}
				else {
					document.getElementById("customEskur").style.display = "none";
				}
			}*/
			function albumBerriaSortu(){
				var izena = document.getElementById("izena").value;
				var eskurag = document.getElementById("eskuragarritasuna").value;
				/*if(eskurag == "Kustomizatua"){
					eskurag = document.getElementById("customEskur").value
				}*/
				xhttp = new XMLHttpRequest();
				var param=""; 
				param += "izena="+izena+"&";
				param += "eskurag="+eskurag;
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
			<form id="albumBerria" name="albumBerria" method="POST" action="" enctype="multipart/form-data">
				Albumaren izena:
				<input type="text" id="izena" name="izena" required /><font color="red">*</font> <br/>
				Eskuragarritasuna:
				<select id="eskuragarritasuna" name="eskuragarritasuna" onChange="eskuragarritasunaBesteak()">
					<option>Pribatua</option>
					<option>Atzipen mugauta</option>
					<option>Publikoa</option>
					<!--<option>Kustomizatua</option>-->
				</select><font color="red">*</font>
				<!--<div id="divBesteak" style="display:none">
					<br/><input type="text" id="customEskur" name="customEskur" placeholder="Eskuragarritasuna eukiku duten erabiltzaileak zehaztu" size="50">
				</div><br/>-->
				<input type="button" value="Sartu" onclick="albumBerriaSortu()">
			</form>
			<div id="erantzuna"></div>
		</div>
	</body>
</html>