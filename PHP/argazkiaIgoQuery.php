<?php
	//DDBBra konektatu		
	include "CONNECT.php";
	
	header('P3P: CP="CAO PSA OUR"');
	session_start();

	$argazkia = addslashes(file_get_contents($_FILES['argazkia']['tmp_name']));	
	$egilea = $_SESSION['login_user'];
	$albumID = $_POST['albumID'];
	$eskurag = $_POST['eskuragarritasuna'];
	if(strcmp($eskurag,"Publikoa")===0){$eskurag="publikoa";}
	else if(strcmp($eskurag,"Pribatua")===0){$eskurag="pribatua";}
	else if(strcmp($eskurag,"Atzipen mugatua")===0){$eskurag="atzipenMugatua";}
	$data = date('Y-m-d H:i:s');
	$deskribapena = $_POST['deskribapena'];
	
	$query = "INSERT INTO argazkiak VALUES ('','$argazkia', '$egilea', '$albumID', '$eskurag', '$data', '$deskribapena');";

	if($conn->query($query) === TRUE) {
		echo "<h2>Datuak ondo sartu dira</h2>";
	}
	else{
		echo "<h2>Datuak ez dira sartu: </h2><br>" . $conn->error;
	}
	
	$conn->close();
?>