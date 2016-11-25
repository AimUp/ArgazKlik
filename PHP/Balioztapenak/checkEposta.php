<?php
	$eposta = $_GET('eposta');
	
	//DDBBra konektatu		
	include "CONNECT.php";

	// Datuak jaso
	$query = "SELECT * FROM erabiltzaileak WHERE eposta = ".$eposta;
		
	$erantzuna = $conn->query($query);

	if ($erantzuna->num_rows > 0) {
		echo "txarra";
	} else {
		echo "ona";
	}

	$conn->close();
?>