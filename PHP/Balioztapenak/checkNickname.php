<?php

	$nick = $_GET('nick');
	
	//DDBBra konektatu		
	include "CONNECT.php";

	// Datuak jaso
	$query = "SELECT * FROM erabiltzaileak WHERE nickname = ".$nick;
		
	$erantzuna = $conn->query($query);

	if ($erantzuna->num_rows > 0) {
		echo "txarra";
	} else {
		echo "ona";
	}

	$conn->close();
?>