<?php

	include "CONNECT.php";

	$albumID = $_POST['ID'];
	
	$query = "SELECT * FROM Argazkiak WHERE AlbumID='".$albumID."' ORDER BY IgoeraData DESC";

	$erantzuna = $conn->query($query);
	
	echo "<input type='button' value='Argazkia igo' onclick='argazkiaIgo(".$albumID.")'>";
	
	if ($erantzuna->num_rows > 0) {
		while($lerroa = $erantzuna->fetch_assoc()) {
			echo "<div onclick='argazkiaIkusi(".$lerroa['ID'].")'><br/>";
			echo "<img src='data:Argazkia/jpeg;base64,".base64_encode( $lerroa['Argazkia'] )."' width='250px' /><br/>";
			echo $lerroa['Deskribapena']."<br/>";
			echo $lerroa['Izena']."<br/>";
			echo $lerroa['Egilea']."<br/>";
			echo $lerroa['IgoeraData']."<br/><br/>";
			echo "</div>";
		}
	}
	else{
		echo "<br>Ez daukazu argazkirik<br>";
	}
?>