<?php
	
	include "CONNECT.php";
			
	$query = "SELECT ID, Egilea, Argazkia, IgoeraData, Deskribapena "
			."FROM argazkiak "
			."WHERE albumID = ".$_GET['albumID']." "
			."ORDER BY IgoeraData DESC";
		
	$erantzuna = $conn->query($query);	
	
	echo "<input type='button' class='btnAtzera' onclick=\"history.go(-1)\" value='Atzera bueltatu' />";
	
	echo "<iframe id='argazkiaIgoIframe' src='argazkiaIgo.php?albumID=".$_GET['albumID']."' style='display:none'></iframe><br>";

	echo "<input type='button' class='btnArgIgo' onclick='argazkiaIgo(".$_GET['albumID'].")' value='Argazkia igo' /><br>";
	
	if ($erantzuna->num_rows > 0) {
		echo "<label class='albumIzena'><h2>".$_GET['albumIzena']."</h2></label>";
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
			echo "	<img src='data:image/png;base64,".base64_encode( $lerroa['Argazkia'] )."' onclick='argazkiaIkusi(".$lerroa['ID'].")' style='width: 200px;' /><br/>
					<label style='margin-top:50px; text-align: left;'><b>". $lerroa['Egilea'] ."</b>, </label>
					<label style='margin-top:50px; text-align: left;'>". $lerroa['IgoeraData'] ."</label><br/>";
			if($lerroa['Deskribapena']!=""){
				echo "<p style='display: inline-block; padding: 3px; width: 200px; min-height:20px; border: solid 1px black; text-align:left'>". $lerroa['Deskribapena'] ."</p>";
			}
			echo "</td>";
		}
		echo "</tr></table></center>";
	}
	else{
		echo "Ez dago argazkirik";
	}
?>