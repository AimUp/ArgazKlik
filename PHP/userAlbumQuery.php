<?php

	include "CONNECT.php";

	if(strcmp($_GET['user'], $_SESSION['login_user'])!==0){
		$query = "SELECT albumak.ID, albumak.Izena, albumak.SorreraData, albumak.Egilea "
			."FROM albumak, albumatzipenzerrenda "
			."WHERE Egilea='".$_GET['user']."'  "
			."AND "
			."("
				."Eskuragarritasuna = 'publikoa' "
				."OR Eskuragarritasuna = 'atzipenMugatua' "
				."OR (Eskuragarritasuna = 'custom' "
					."AND albumatzipenzerrenda.AlbumID = albumak.ID "
					."AND albumatzipenzerrenda.Nickname = '".$_SESSION['login_user']."') "
			.") ";
			
		$query .= "GROUP BY albumak.ID ORDER BY SorreraData DESC";
	}
	else{
		$query = "SELECT albumak.ID, albumak.Izena, albumak.SorreraData, albumak.Egilea "
			."FROM albumak "
			."WHERE Egilea='".$_GET['user']."'  ";
		$query .= "GROUP BY albumak.ID ORDER BY SorreraData DESC";

	}
	
	$erantzuna = $conn->query($query);
?>