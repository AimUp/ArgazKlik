<?php
	//DDBBra konektatu		
	include "CONNECT.php";
	
	header('P3P: CP="CAO PSA OUR"');
	session_start();
	
	// Datuak bidali
	$izena = $_POST['izena'];
	$egilea = $_SESSION['login_user'];
	$eskurag = $_POST['eskurag'];
	if(strcmp($eskurag,"Publikoa")===0){$eskurag="publikoa";}
	else if(strcmp($eskurag,"Pribatua")===0){$eskurag="pribatua";}
	else if(strcmp($eskurag,"Atzipen mugatua")===0){$eskurag="atzipenMugatua";}
	$data = date('Y-m-d H:i:s');
	$query = "INSERT INTO albumak VALUES ('','$izena', '$egilea', '$eskurag', '$data');";

	if($conn->query($query) === TRUE) {
		echo "<h2>Datuak ondo sartu dira</h2>";
	}
	else{
		echo "<h2>Datuak ez dira sartu: </h2><br>" . $conn->error;
	}
	
	$conn->close();
?>