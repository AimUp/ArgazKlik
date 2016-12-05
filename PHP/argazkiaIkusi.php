<?php

	include "CONNECT.php";

	$query = "SELECT * FROM Argazkiak WHERE ID=". $_GET['ID'];
	$erantzuna = $conn->query($query);

	if ($erantzuna->num_rows > 0) {
		while($lerroa = $erantzuna->fetch_assoc()) {
			echo "
				<center>
					<label style='margin-top:50px; text-align: left;'>". $lerroa['Egilea'] ."</label>
					<label style='margin-top:50px; text-align: left;'>". $lerroa['IgoeraData'] ."</label><br/>
					<img src='data:Argazkia/jpeg;base64,".base64_encode( $lerroa['Argazkia'] )."' style='max-width:600px; ' /><br/>";
			if($lerroa['Deskribapena']!=""){
				echo "<p style='width:500px; margin-top:10px; min-height:20px; border: solid 1px black; text-align:left;'>". $lerroa['Deskribapena'] ."</p>";
			}
					
			echo "</center>";

		}
	}
?>