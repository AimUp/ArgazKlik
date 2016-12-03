<?php

	include "CONNECT.php";
	$id = $_GET['ID'];
	

	$query = "DELETE FROM albumak WHERE ID='$id'";

	if($conn->query($query) === FALSE){
		echo "Datuak ez dira ezabatu: " . $conn->error;
	}
	
?>