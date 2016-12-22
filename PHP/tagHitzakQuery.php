<?PHP
	include "CONNECT.php";
	
	$query = "SELECT * "
			."FROM taghitza "
			."WHERE argazkiID=". $_GET['ID'];
	$erantzuna = $conn->query($query);
	
	echo "<div id='tagHitzak'>";
		echo "<center>";
		echo "<h3>Hitzak</h3>";
		if ($erantzuna->num_rows > 0) {
			while($lerroa = $erantzuna->fetch_assoc()){
				echo "<label class='cursorPointer' onclick=\"window.location='argazkiaktagikusi.php?hitza=".$lerroa['Hitza']."'\">#".$lerroa['Hitza']."</label><br/> ";				
			}
		}
		echo "<br>";
		if(isset($_SESSION['login_user'])){
			$query = "SELECT Egilea "
					."FROM argazkiak "
					."WHERE ID=". $_GET['ID'];
			$erantzuna = $conn->query($query);
			$egilea = $erantzuna->fetch_assoc()['Egilea'];
			if(strcmp($egilea,$_SESSION['login_user'])==0){
				include "tagHitzaSartu.php";
			}
		}
		echo "</center>";
	echo "</div>";
?>