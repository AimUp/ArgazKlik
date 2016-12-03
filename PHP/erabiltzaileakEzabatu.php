<?php

	include "CONNECT.php";

	if($_GET['erabiltzailea']!="undefined" && $_GET['erabiltzailea']!=""){
		$query = "SELECT * FROM erabiltzaileak WHERE mota='bazkidea' AND nickname LIKE '".$_GET['erabiltzailea']."%'";
	}
	else{
		$query = "SELECT * FROM erabiltzaileak WHERE mota='bazkidea'";
	}

	$erantzuna = $conn->query($query);
		
	if ($erantzuna->num_rows > 0) {
		while ($lerroa = $erantzuna->fetch_assoc()) {
			echo "<form id='form' name='form' method='post'>";
			echo "<img src='data:Argazkia/jpeg;base64,".base64_encode($lerroa['Argazkia'])."' width='100px' />  ";
			echo "<b>".$lerroa['Nickname']."</b>  ";
			echo $lerroa['Eposta']."  ";
			echo $lerroa['IzenAbizenak']."  ";
			echo "<button class='ezabatuBotoia ezabatuBotoiEfektua' onclick='return ezabatuErabiltzaile(nick.value)'>EZABATU</button>";
			echo "<input type='text' id='nick' value='".$lerroa['Nickname']."' style='display:none'>";
			echo "</form>";

			echo "<br/><hr><br/>";
		}
	}
	else{
		echo "<center><font class='errorea'>Erabiltzailerik ez</font></center>";
	}
	
?>