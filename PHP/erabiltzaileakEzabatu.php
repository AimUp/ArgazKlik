<?php

	include "CONNECT.php";

	if($_GET['erabiltzailea']!="undefined" && $_GET['erabiltzailea']!=""){
		$query = "SELECT * FROM erabiltzaileak WHERE nickname LIKE '".$_GET['erabiltzailea']."%'";
	}
	else{
		$query = "SELECT * FROM erabiltzaileak";
	}

	$erantzuna = $conn->query($query);
		
	if ($erantzuna->num_rows > 0) {
		while ($lerroa = $erantzuna->fetch_assoc()) {
			echo "<form id='form' name='form' method='post'>";
			echo "<img src='data:Argazkia/jpeg;base64,".base64_encode($lerroa['Argazkia'])."' width='100px' />  ";
			echo "<b>".$lerroa['Nickname']."</b>  ";
			echo $lerroa['Eposta']."  ";
			echo $lerroa['IzenAbizenak']."  ";
			if($lerroa['Mota']=="administraria"){
				echo "<button class='ezabatuBotoia' style='opacity: 0.6; cursor: not-allowed;' onclick='return false'>EZABATU</button>";
			}
			else{
				echo "<button class='ezabatuBotoia' onclick='return ezabatuErabiltzaile(nick.value)'>EZABATU</button>";
			}
			echo "<input type='text' id='nick' value='".$lerroa['Nickname']."' style='display:none'>";
			echo "</form>";

			echo "<br/><hr><br/>";
		}
	}
	else{
		echo "<center><font class='errorea'>Erabiltzailerik ez</font></center>";
	}
	
?>