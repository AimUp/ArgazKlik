<?PHP
	include "CONNECT.php";

	$query = "SELECT * "
			."FROM taglekua "
			."WHERE argazkiID=". $_GET['ID'];
	$erantzuna = $conn->query($query);
	
	if ($erantzuna->num_rows > 0) {
		echo "<div id='tagLekuak'>";
		echo "<h3>Koordenatuak</h3>";
		echo "<center>";
			while($lerroa = $erantzuna->fetch_assoc()){
				echo "<label>Latitudea: ".$lerroa['LekuaLat']."<br> Longitudea: ".$lerroa['LekuaLong']."</label>"; 			
			}
		echo "</center>";
		echo "</div>";
	}
?>