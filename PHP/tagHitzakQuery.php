<?PHP
	include "CONNECT.php";

	$query = "SELECT * "
			."FROM taghitza "
			."WHERE argazkiID=". $_GET['ID'];
	$erantzuna = $conn->query($query);
	
	if ($erantzuna->num_rows > 0) {
		echo "<h3>Hitzak</h3>";
		echo "<center>";
			while($lerroa = $erantzuna->fetch_assoc()){
				echo "#".$lerroa['Hitza']." | "; 			
			}
		echo "</center>";
	}
?>