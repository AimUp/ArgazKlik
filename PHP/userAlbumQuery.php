<?php

	include "CONNECT.php";

	$query = "SELECT * FROM Albumak WHERE Egilea='".$_SESSION['login_user']."' ORDER BY SorreraData DESC";

	$erantzuna = $conn->query($query);
?>