<!DOCTYPE html>
<html>
	<head>
   		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Sign Up</title>
		<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
		<script type="text/javascript" src="../JS/signUp_baliostapenak.js"></script>
	</head>
	<body>
		<div id="edukia">
			<?php
				//DDBBra konektatu		
				include "CONNECT.php";
				
				// Datuak bidali
				$nick = $_POST['nick'];
				$izena = $_POST['izena'];
				$eposta = $_POST['eposta'];
				$pasahitza = sha1($_POST['pasahitza']);
				if(!empty($_FILES['argazkia']['tmp_name'])){
					$argazkia = addslashes(file_get_contents($_FILES['argazkia']['tmp_name']));
				}
				else {
					$argazkia = addslashes(file_get_contents("../IMG/UserIcon.png"));
				}
				$mota = 'bazkidea';
				$query = "INSERT INTO erabiltzaileak VALUES ('$nick', '$eposta', '$izena', '$pasahitza', '$argazkia', '$mota');";

				if($conn->query($query) === TRUE) {
					echo "<h2>Datuak ondo sartu dira</h2> <br><a href='layout.php'> Orrialde nagusira bueltatu </a>";
				}
				else{
					echo "<h2>Datuak ez dira sartu: </h2><br>" . $conn->error;
				}
				
				$conn->close();
			?>
		</div>
	</body>
</html>