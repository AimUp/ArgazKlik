<?php

	include "CONNECT.php";

	if($_GET['album']!="undefined" && $_GET['album']!=""){
		$query = "SELECT Argazkia, argazkiak.Egilea, argazkiak.ID, Izena FROM argazkiak INNER JOIN albumak ALB ON AlbumID = ALB.ID WHERE izena LIKE'". $_GET['album'] ."%'";
	}
	else{
		$query = "SELECT Argazkia, argazkiak.Egilea, argazkiak.ID, Izena FROM argazkiak INNER JOIN albumak ALB ON AlbumID = ALB.ID";
	}

	$erantzuna = $conn->query($query);
	
	if ($erantzuna->num_rows > 0) {
		echo "<center><table><tr>";
		$kont = 0;
		while($lerroa = $erantzuna->fetch_assoc()) {
			if($kont==4){
				echo "</tr><tr>";
				$kont = 1;	
			}
			else{
				$kont ++;	
			}
			echo "<td>";
			echo "	<div class='show-image'>
						<img src='data:image/png;base64,".base64_encode( $lerroa['Argazkia'] )."' style='width: 200px;'/><br/>
						<input type='button' value='EZABATU' onclick='ezabatuArgazkia(".$lerroa['ID'].")'></input>
					</div>";
			echo	"</br><label><b>". $lerroa['Egilea'] ."</b>, ". $lerroa['Izena'] ."</label>";
			echo "</td>";
		}
		echo "</tr></table></center>";
	}
	else{
		echo "<center><font class='errorea'>Argazkirik ez</font></center>";
	}