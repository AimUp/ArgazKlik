<?php

	include "CONNECT.php";

	$query = "";
	
	if(strcmp($_GET['user'], $_SESSION['login_user'])!==0){
		$query .= "SELECT albumak.ID, albumak.Izena, albumak.SorreraData, albumak.Egilea "
			."FROM albumak "
			."WHERE Egilea='".$_GET['user']."'  "
			."AND (Eskuragarritasuna = 'publikoa' ";
			if(isset($_SESSION['login_user'])){
				$query.="OR Eskuragarritasuna = 'atzipenMugatua'";
			}
			$query.=") ";
			
		$query .= "GROUP BY albumak.ID ORDER BY SorreraData DESC";
	}
	else{
		$query .= "SELECT albumak.ID, albumak.Izena, albumak.SorreraData, albumak.Egilea "
			."FROM albumak "
			."WHERE Egilea='".$_GET['user']."'  ";
		$query .= "GROUP BY albumak.ID ORDER BY SorreraData DESC;";
	}
	
	$erantzuna = $conn->query($query);
	
?>