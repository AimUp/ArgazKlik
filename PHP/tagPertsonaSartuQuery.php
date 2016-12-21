<?PHP
	include "CONNECT.php";
	
	$argazkiID = $_GET['ID'];
	$nick = $_GET['nick'];
	
	$query = "SELECT Nickname FROM erabiltzaileak WHERE Nickname = '$nick'";
	
	if($conn->query($query)->num_rows > 0){
		$query = "INSERT INTO tagpertsona VALUES ('','$argazkiID','$nick')";
		
		if($conn->query($query) === TRUE) {
			echo "ondo";
		}
		else{
			echo "Datuak ez dira sartu: ".$conn->error;
		}
	}
	else{
		echo "Erabiltzaile hori ez dago gure datubasean.";
	}
?>