<?php

	//LOCALHOST
	$servername = "localhost:3306";
	$username = "root";
	$password = "";
	$ddbb = "argazklik";
	
	//HOSTINGER
	$serverH = "mysql.hostinger.es";
	$userH= "u267394054_admin";
	$passH = "adminroot";
	$ddbbH = "u267394054_klik";
	
	//$conn = new mysqli($serverH, $userH, $passH, $ddbbH); 		//HOSTINGER
	$conn = new mysqli($servername, $username, $password, $ddbb); 	//LOCALHOST
	
	//Konexioa konprobatu
	if ($conn->connect_error) {
		//$conn = new mysqli($servername, $username, $password, $ddbb); //LOCALHOST
		//if (!$conn) {
			die("Ezin izan da konexioa ezarri: " . $conn->connect_error);
		//}
	}
?>
