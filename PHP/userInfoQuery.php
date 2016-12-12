<?php
	include "CONNECT.php";

	$query = "SELECT Nickname, Eposta, IzenAbizenak, Argazkia FROM erabiltzaileak WHERE Nickname='".$_GET['user']."'";

	$erantzuna = $conn->query($query);

	if ($erantzuna->num_rows > 0) {
		$lerroa = $erantzuna->fetch_assoc();

		$Nick = $lerroa['Nickname'];
		$Eposta = $lerroa['Eposta'];
		$IzenAbizen = $lerroa['IzenAbizenak'];
		$Argazkia = $lerroa['Argazkia'];
	}
?>