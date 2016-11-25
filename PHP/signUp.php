<!DOCTYPE html>
<html>
	<head>
   		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Sign Up</title>
		<script type="text/javascript" src="../JS/signUp_baliostapenak.js"></script>
	</head>
	<body>
		<div>
			<form id="erregistroa" name="erregistroa" method="POST" onsubmit="return checkAll()" action="./signUpQuery.php" enctype="multipart/form-data">
				Nickname:
				<input type="text" id="nick" name="nick" pattern="([A-Z]|[a-z]|[0-9])*" required/ onblur="checkNickname(nick.value)"><font color="red">*</font> <br/>
				Izen abizenak: 
				<input type="text" id="izena" name="izena" pattern="([A-Z][a-z]+\s[A-Z][a-z]+\s[A-Z][a-z]+)(\s[A-Z][a-z]+)*" required/><font color="red">*</font> <br/>
				Eposta elektronikoa: 
				<input type="text" id="eposta" name="eposta" size="25" onblur="checkEposta()" required/><font color="red">*</font><br/>
				Pasahitza: 
				<input type="password" id="pasahitza" name="pasahitza" size="25" pattern=".{6,16}" onblur="checkPasahitza()"/><font color="red">*</font> <br/>
				Pasahitza errepikatu: 
				<input type="password" id="pasahitzaErrepikatu" name="pasahitzaErrepikatu" size="25" required onblur="pasahitzaBaieztatu()" /><font color="red">*</font> <br/>
				Argazkia: <input type="file" id="argazkia" name="argazkia" onchange="irudiAurrekarga(this.files[0])"> <br/>
				<img id="argazkiAurrekarga" alt="Argazkia" style="display: none; height: 150px; width:auto" /><br/>
				<input type="submit" value="Ados" />
			</form>
		</div>
	</body>
</html>