<?php

	include "CONNECT.php";

	$query = "SELECT argazkiak.Egilea, argazkiak.albumID, albumak.Izena AS albumIzena, argazkiak.IgoeraData, argazkiak.Deskribapena, argazkiak.Argazkia "
			."FROM argazkiak, albumak "
			."WHERE argazkiak.ID=". $_GET['ID']." "
			."AND argazkiak.albumID = albumak.ID";
	$erantzuna = $conn->query($query);

	$lerroa = $erantzuna->fetch_assoc();
	echo "<center>
			<p><b>".$lerroa['Egilea']."</b> &nbsp;&nbsp; | &nbsp;&nbsp; ".$lerroa['IgoeraData']." &nbsp;&nbsp;|&nbsp;&nbsp; ".$lerroa['albumIzena']." </p> 
			<img src='data:Argazkia/jpeg;base64,".base64_encode( $lerroa['Argazkia'] )."' /><br/>";
	if($lerroa['Deskribapena']!=""){
		echo "<p>". $lerroa['Deskribapena'] ."</p>";
	}
			
	echo "</center>";
?>