<?PHP
	include "CONNECT.php";

	$query = "SELECT * "
			."FROM tagpertsona "
			."WHERE argazkiID=". $_GET['ID'];
	$erantzuna = $conn->query($query);
	
	if ($erantzuna->num_rows > 0) {
		echo "<div id='tagPertsonak'>";
		echo "<h3>Jendea</h3>";
		echo "<center>";
			while($lerroa = $erantzuna->fetch_assoc()){
				echo "<label class='cursorPointer' onclick=\"window.location='profile.php?user=". $lerroa['Nickname'] ."'\">".$lerroa['Nickname']."</label> ";	
			}
		echo "</center>";
		echo "</div>";
	}
?>