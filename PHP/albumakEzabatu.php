<?php

	include "CONNECT.php";
	$query = "SELECT * FROM albumak";

	$erantzuna = $conn->query($query);
	
	if ($erantzuna->num_rows > 0) {
		while ($lerroa = $erantzuna->fetch_assoc()) {
			echo "<form id='form' name='form' method='post'>";
			echo "<img src='../IMG/Folder.png' width='50px'/>";
			echo $lerroa['Izena']."  ";
			echo "<b>".$lerroa['Egilea']."</b>  ";
			echo $lerroa['Eskuragarritasuna']."  ";
			echo $lerroa['SorreraData']."  ";
			echo "<button class='ezabatuBotoia ezabatuBotoiEfektua' onclick='return ezabatuAlbum(ID.value)'>EZABATU</button>";
			echo "<input type='text' id='ID' value='".$lerroa['ID']."' style='display:none'>";
			echo "</form>";

			echo "<br/><hr><br/>";
		}
	}
?>