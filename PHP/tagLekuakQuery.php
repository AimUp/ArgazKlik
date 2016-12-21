<?PHP
	include "CONNECT.php";

	$query = "SELECT * "
			."FROM taglekua "
			."WHERE argazkiID=". $_GET['ID'];
	$erantzuna = $conn->query($query);
	
	echo "<div id='tagLekuak'>";
	echo "<center>";
	echo "<h3>Koordenatuak</h3>";
	if ($erantzuna->num_rows > 0) {
		while($lerroa = $erantzuna->fetch_assoc()){
			echo "<label>Latitudea: ".$lerroa['LekuaLat']."<br> Longitudea: ".$lerroa['LekuaLong']."</label>"; 			
		}		
	}
	echo "<br>";	
	echo "<br>";
	if(isset($_SESSION['login_user'])){
		$query = "SELECT Egilea "
				."FROM argazkiak "
				."WHERE ID=". $_GET['ID'];
		$erantzuna = $conn->query($query);
		$egilea = $erantzuna->fetch_assoc()['Egilea'];
		if(strcmp($egilea,$_SESSION['login_user'])==0){
			include "tagLekuaSartu.php";
		}
	}
	echo "</center>";
	echo "</div>";
?>