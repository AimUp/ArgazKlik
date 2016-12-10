<?php

	include "CONNECT.php";

	$query = "SELECT * FROM argazkiak WHERE ID=". $_GET['ID'];
	$erantzuna = $conn->query($query);

	$lerroa = $erantzuna->fetch_assoc();
	echo "<center>
			<p><b>".$lerroa['Egilea']."</b>-ek igota ".$lerroa['IgoeraData']." datan.</p><br/>
			<img src='data:Argazkia/jpeg;base64,".base64_encode( $lerroa['Argazkia'] )."' /><br/>";
	if($lerroa['Deskribapena']!=""){
		echo "<p>". $lerroa['Deskribapena'] ."</p>";
	}
			
	echo "</center>";
?>