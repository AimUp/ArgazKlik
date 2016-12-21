<?PHP
	include "CONNECT.php";

	$query = "SELECT * "
			."FROM tagpertsona "
			."WHERE argazkiID=". $_GET['ID'];
	$erantzuna = $conn->query($query);
	
	echo "<div id='tagPertsonak'>";
	echo "<center>";
	echo "<h3>Jendea</h3>";
	if ($erantzuna->num_rows > 0) {
		while($lerroa = $erantzuna->fetch_assoc()){
			echo "<label class='cursorPointer' onclick=\"window.location='profile.php?user=". $lerroa['Nickname'] ."'\">".$lerroa['Nickname']."</label> ";	
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
			include "tagPertsonaSartu.php";
		}
	}
	echo "</center>";
	echo "</div>";
?>