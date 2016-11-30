<!DOCTYPE html>
<html>
	<head>
   		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Log In</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
		<script>
			function checkLogIn(){
				var nick = document.getElementById("nick").value;
				var pass = document.getElementById("pass").value;
				xhttp = new XMLHttpRequest();
				var param=""; 
				param += "nick="+nick+"&";
				param += "pass="+pass;
				xhttp.onreadystatechange = function(){
					if ((xhttp.readyState==4)&&(xhttp.status==200)){
						if(xhttp.responseText=="✔︎"){
 							window.location="profile.php";
						}
						document.getElementById("erantzuna").innerHTML = xhttp.responseText;
					}
				};
				xhttp.open("POST","logInQuery.php", true);
				xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhttp.send(param);
			}
		</script>
	</head>
	<body>
		<div id='edukia'>
			<div id="logeatzeko">
				<?php 
					include "sesioaKonprobatu.php";
					logEremua();
				?>
			</div></br>
			<header>
				<center><h1><a class="titulua" href="./layout.php"> ArgazKlik</a></h1></center>
			</header>
			<section>
				<div id="formDiv" style="width: 250px">
					<form id="erregistroa" name="erregistroa" method="POST" action="" enctype="multipart/form-data">
						Nickname:
						<input type="text" id="nick" name="nick" required /><font color="red">*</font> <br/>
						Pasahitza: 
						<input type="password" id="pass" name="pass" size="25" required /><font color="red">*</font> <br/>
						<input type="button" value="Sartu" onclick="checkLogIn()">
					</form>
					<div id="erantzuna"></div>
				</div>
			</section>
		</div>
	</body>
</html>