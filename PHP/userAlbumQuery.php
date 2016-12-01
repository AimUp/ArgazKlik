<?php

	include "CONNECT.php";

	$query = "SELECT Izena, Egilea, SorreraData FROM Albumak WHERE Egilea='".$_SESSION['login_user']."' ORDER BY SorreraData DESC";

	$erantzuna = $conn->query($query);
?>