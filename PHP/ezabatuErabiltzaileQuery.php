<?php

	include "CONNECT.php";
	$nick = $_GET['nick'];
	

	$query = "DELETE FROM erabiltzaileak WHERE Nickname='$nick'";

	if($conn->query($query) === FALSE){
		echo "Datuak ez dira ezabatu: " . $conn->error;
	}
?>