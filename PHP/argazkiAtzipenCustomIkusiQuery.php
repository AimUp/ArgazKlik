<?php
	include "CONNECT.php";
			
	$query = "SELECT Egilea, Argazkia, IgoeraData, Deskribapena "
			."FROM argazkiak INNER JOIN albumak, argazkiatzipenzerrenda "
			."WHERE argazkiak.AlbumID = albumak.ID AND (argazkiak.Eskuragarritasuna='publikoa' ";
	if(isset($_SESSION['login_user'])){
		$query .= "OR argazkiak.Eskuragarritasuna='atzipenMugatua' ";
		$query .= "OR (argazkiak.Eskuragarritasuna='custom' AND argazkiatzipenzerrenda.ArgazkiID = argazkiak.ID AND argazkiatzipenzerrenda.Nickname = '".$_SESSION['login_user'].")' ";
	}
	$query .= ") ORDER BY IgoeraData DESC";
	
	echo $query."<br>";
	
	$erantzuna = $conn->query($query);

	if ($erantzuna->num_rows > 0) {
		echo "<center><table><tr>";
		$kont = 0;
		while($lerroa = $erantzuna->fetch_assoc()) {
			if($kont==3){
				echo "</tr><tr>";
				$kont = 1;	
			}
			else{
				$kont ++;	
			}
			echo "<td>";
			echo "	<label style='margin-top:50px; text-align: left;'><b>". $lerroa['Egilea'] ."</b>-ek igota </label>
					<label style='margin-top:50px; text-align: left;'>". $lerroa['IgoeraData'] ." datan.</label><br/>
					<img src='data:image/png;base64,".base64_encode( $lerroa['Argazkia'] )."' style='height: 200px;' /><br/>";
			if($lerroa['Deskribapena']!=""){
				echo "<p style='width:200px; margin-top:10px; min-height:20px; border: solid 1px black; text-align:left;'>". $lerroa['Deskribapena'] ."</p>";
			}
			echo "</td>";					
		}
		echo "</tr></table></center>";
	}
?>