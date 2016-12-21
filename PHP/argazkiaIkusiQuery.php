<?php
	echo "<link rel='stylesheet' type='text/css' href='../CSS/argazkiakIkusi.css' />";
	
	echo "<span class='argazkiHandiaItxi' onclick='argazkiHandiaPantailaOsoaItxi()'>X</span>";

	include "CONNECT.php";
	include "sesioaKonprobatu.php";

	$query = "SELECT argazkiak.Egilea, argazkiak.albumID, albumak.Izena AS albumIzena, argazkiak.IgoeraData, argazkiak.Deskribapena, argazkiak.Argazkia "
			."FROM argazkiak, albumak "
			."WHERE argazkiak.ID=". $_GET['ID']." "
			."AND argazkiak.albumID = albumak.ID";
	$erantzuna = $conn->query($query);

	$lerroa = $erantzuna->fetch_assoc();
	echo "<center>
			<p class='argazkiIzenburua'><b><label class='cursorPointer' onclick=\"window.location='profile.php?user=". $lerroa['Egilea'] ."'\">".$lerroa['Egilea']."</label></b> &nbsp;&nbsp; | &nbsp;&nbsp; ".$lerroa['IgoeraData']." &nbsp;&nbsp;|&nbsp;&nbsp; <label class='cursorPointer' onclick='window.location=\"userAlbumEdukiaIkusi.php?albumID=".$lerroa['albumID']."&albumIzena=".$lerroa['albumIzena']."\"'>".$lerroa['albumIzena']."</label> </p> 
			<img class='argazkia' src='data:Argazkia/jpeg;base64,".base64_encode( $lerroa['Argazkia'] )."' /><br/>";
	if($lerroa['Deskribapena']!=""){
		echo "<p class='argazkiDeskribapena'>". $lerroa['Deskribapena'] ."</p>";
	}			
	echo "</center>";
	
	include "tagHitzakQuery.php";	
	include "tagLekuakQuery.php";	
	include "tagPertsonakQuery.php";	
?>