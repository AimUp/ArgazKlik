<?php
	$nick = $_GET['nick'];
	
	//DDBBra konektatu		
	include "../CONNECT.php";

	// Datuak jaso
	$query = "SELECT * FROM erabiltzaileak WHERE nickname = '".$nick."'";
		
	if(($erantzuna = $conn->query($query))===FALSE){
		echo "Errorea konektatzean: ".$conn->error;
	}
		
	if ($erantzuna->num_rows > 0) {
		echo "txarra";
	} else {
		echo "ona";
	}

	$conn->close();
?>