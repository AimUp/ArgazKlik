<?php
	include "CONNECT.php";
			
	$query = "SELECT argazkiak.ID AS argazkiID, argazkiak.Egilea, argazkiak.Argazkia, argazkiak.IgoeraData, argazkiak.Deskribapena, albumak.ID AS albumID, albumak.Izena "
			."FROM argazkiak, albumak "
			."WHERE (albumak.Eskuragarritasuna='publikoa' "
			."AND argazkiak.Eskuragarritasuna='publikoa') ";
	
	if(isset($SESSION['login_user'])){
		$query .="OR (albumak.Eskuragarritasuna='atzipenMugatua' "
		."AND argazkiak.Eskuragarritasuna='atzipenMugatua') ";
	}
	
	$query .="AND albumak.ID = argazkiak.albumID "
			."ORDER BY IgoeraData DESC";
		
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
			echo "	<img class='cursorPointer' src='data:image/png;base64,".base64_encode( $lerroa['Argazkia'] )."' style='width: 200px;' onclick='argazkiaIkusi(".$lerroa['argazkiID'].")' /><br/>
					<label class='cursorPointer' onclick=\"window.location='profile.php?user=". $lerroa['Egilea'] ."'\" style='margin-top:50px; text-align: left;'><b>". $lerroa['Egilea'] ."</b></label> - <label class='cursorPointer' style='margin-top:50px; text-align: left;' onclick='albumaIkusi(".$lerroa['albumID'].",\"".$lerroa['Izena']."\")'><b>". $lerroa['Izena'] ."</b></label>";
			echo "</td>";
		}
		echo "</tr></table></center>";
	}
?>