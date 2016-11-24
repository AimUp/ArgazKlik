<!DOCTYPE html>
<html>
	<head>
   		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Sign Up</title>
		<link rel="icon" type="image/png" href="../Irudiak/favicon.png">
		<script type="text/javascript"> 
			function irudiAurrekarga(irudia){
				document.getElementById('argazkiAurrekarga').style.display = 'inline';
				document.getElementById('argazkiAurrekarga').src = window.URL.createObjectURL(irudia);
			}
		</script>
	</head>
	<body>
		<div>
			<form id="erregistroa" name="erregistroa" method="POST" action="" enctype="multipart/form-data">
				Izen abizenak: 
				<input type="text" id="izena" name="izena" pattern="([A-Z][a-z]+\s[A-Z][a-z]+\s[A-Z][a-z]+)(\s[A-Z][a-z]+)*" required/><font color="red">*</font> <br/>
				Eposta elektronikoa: 
				<input type="email" id="eposta" name="eposta" size="25" required/><font color="red">*</font><br/>
				Pasahitza: 
				<input type="password" id="pasahitza" name="pasahitza" size="25"  pattern=".{6,16}"/><font color="red">*</font> <br/>
				Pasahitza errepikatu: 
				<input type="password" id="pasahitzaErrepikatu" name="pasahitzaErrepikatu" size="25" required onblur="pasahitzaBaieztatu()" /><font color="red">*</font> <br/>
				Argazkia: <input type="file" id="argazkia" name="argazkia" onchange="irudiAurrekarga(this.files[0])"> <br/>
				<img id="argazkiAurrekarga" alt="Argazkia" style="display: none; height: 150px; width:auto" /><br/>
				<input type="submit" value="Ados" />
			</form>
		</div>
	</body>
</html>