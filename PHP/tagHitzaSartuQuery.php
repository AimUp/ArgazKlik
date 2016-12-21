<?PHP
	include "CONNECT.php";
	
	$argazkiID = $_GET['ID'];
	$hitza = $_GET['hitza'];
	
	$query = "INSERT INTO taghitza VALUES ('','$argazkiID','$hitza')";
	
	if($conn->query($query) === TRUE) {
		echo "ondo";
	}
	else{
		echo "Datuak ez dira sartu: ".$conn->error;
	}
?>