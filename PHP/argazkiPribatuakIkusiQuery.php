<?php
	include "CONNECT.php";
			
	$query = "SELECT Egilea, Argazkia, IgoeraData, Deskribapena "
			."FROM argazkiak "
			."WHERE Eskuragarritasuna='pribatua' "
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
					<label class='cursorPointer' style='margin-top:50px; text-align: left;' onclick='albumaIkusi(".$lerroa['albumID'].",\"".$lerroa['Izena']."\")'><b>". $lerroa['Izena'] ."</b></label>";
			echo "</td>";
		}
		echo "</tr></table></center>";
	}
?>