<?PHP
	include "CONNECT.php";
	
	$argazkiID = $_GET['ID'];
	$latit = $_GET['latit'];
	$longit = $_GET['longit'];
	
	if(is_numeric($latit) && is_numeric($longit)){
		
		if($latit < -90 || $latit > 90){
			echo "Latitudea txarto dago.";
		}
		else if($longit < -180 || $longit > 180){
			echo "Longitudea txarto dago.";
		}
		else {
			$query = "DELETE FROM taglekua WHERE ArgazkiID = '$argazkiID' ";
			$conn->query($query);
			$query = "INSERT INTO taglekua VALUES ('','$argazkiID','$latit','$longit');";
	
			if($conn->query($query) === TRUE) {
				echo "ondo";
			}
			else{
				echo "Datuak ez dira sartu: ".$conn->error;
			}
		}
	}
	else{
		echo "Datuetako bat ez da zenbakia";
	}	
?>