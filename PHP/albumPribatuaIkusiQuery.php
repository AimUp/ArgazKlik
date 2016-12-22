<?php
	
	include "CONNECT.php";
			
	$query = "SELECT * FROM albumak WHERE ID = ".$_GET['albumID'];

	$erantzuna = $conn->query($query);	
	
	echo "<table style='width: 100%;'><tr><th><input type='buton' class='btnAtzera' onclick=\"history.go(-1)\" value='' /></th>";

	if ($erantzuna->num_rows > 0) {
		$lerroa = $erantzuna->fetch_assoc();
		echo "<th style='width: 100%''><label class='albumIzena'><h2>".$lerroa['Izena']."</h2></label></th></tr></table>";
		if($_SESSION['login_user']==$lerroa['Egilea']){
			echo "<input type='button' class='btnGehitu' onclick='argazkiaIgo()' value='' /> &emsp;";
			echo "<input type='button' class='btnEzabatu' onclick='ezabatzeModua()' value='' />";
			echo "<iframe id='argazkiaIgoIframe' src='argazkiaIgo.php?albumID=".$_GET['albumID']."' style='display:none'></iframe><br>";
		}
		else{
			echo "</tr></table>";
		}
	}
	else{
		header("Location: ./layout.php");
	}

	$query = "SELECT ID, Egilea, Argazkia, IgoeraData, Deskribapena "
		."FROM argazkiak "
		."WHERE albumID = ".$_GET['albumID']." "
		."ORDER BY IgoeraData DESC";
		
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
			echo "<div class='show'><img class='argazkia' src='data:image/png;base64,".base64_encode( $lerroa['Argazkia'] )."' onclick='argazkiaIkusi(".$lerroa['ID'].")' style='width: 200px;' />";
			if($_SESSION['login_user']==$lerroa['Egilea']){
				echo "<input class='ezabatuBotoia' type='button' value='EZABATU' onclick='ezabatuArgazkia(".$lerroa['ID'].")' style='display: none'></input>";
			}
			echo "</div>";
			echo"<br/><label style='margin-top:50px; text-align: left;'><b>". $lerroa['Egilea'] ."</b>, </label>
					<label style='margin-top:50px; text-align: left;'>". $lerroa['IgoeraData'] ."</label><br/>";
			if($lerroa['Deskribapena']!=""){
				echo "<p style='display: inline-block; padding: 3px; width: 200px; min-height:20px; border: solid 1px black; text-align:left'>". $lerroa['Deskribapena'] ."</p>";
			}
			echo "</td>";
		}
		echo "</tr></table></center>";
	}
	else{
		echo "<br/><center><label class='errorea'>Ez dago argazkirik</label></center>";
	}
?>