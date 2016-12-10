<?php
	include "CONNECT.php";
			
	$query = "SELECT argazkiak.ID, argazkiak.Egilea, argazkiak.Argazkia, argazkiak.IgoeraData, argazkiak.Deskribapena "
			."FROM argazkiak, albumak "
			."WHERE albumak.Eskuragarritasuna='publikoa' "
			."AND argazkiak.Eskuragarritasuna='publikoa' "
			."AND albumak.ID = '".$_GET['albumID']."' "
			."AND argazkiak.albumID = albumak.ID "
			."ORDER BY IgoeraData DESC";
		
	$erantzuna = $conn->query($query);

	if ($erantzuna->num_rows > 0) {
		echo "<label style='margin-top:50px; text-align: center;'><h2>". $_GET['albumIzena'] ."</h2></label>";
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
			echo "	<img src='data:image/png;base64,".base64_encode( $lerroa['Argazkia'] )."' style='width: 200px;' /><br/>
					<label style='margin-top:50px; text-align: left;'><b>". $lerroa['Egilea'] ."</b>, </label>
					<label style='margin-top:50px; text-align: left;'>". $lerroa['IgoeraData'] ."</label><br/>";
			if($lerroa['Deskribapena']!=""){
				echo "<p style='display: inline-block; padding: 3px; width: 200px; min-height:20px; border: solid 1px black; text-align:left'>". $lerroa['Deskribapena'] ."</p>";
			}
			echo "</td>";
		}
		echo "</tr></table></center>";
	}
?>