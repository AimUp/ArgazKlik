<?php
	//DDBBra konektatu		
	include "CONNECT.php";
	$nick = $_POST['nick'];
	$pass = $_POST['pass'];
	$encpas = sha1($pass);
	
	$query = "SELECT * FROM erabiltzaileak WHERE Nickname='$nick'";
	
	$erantzuna = $conn->query($query);
	
	if ($erantzuna->num_rows > 0) {
		$lerroa = $erantzuna->fetch_assoc();
		$encpass2 = $lerroa["Pasahitza"];
		
		if($lerroa["Pasahitza"]===$encpas){
			if(session_status() == PHP_SESSION_NONE) session_start();
			
			$_SESSION['login_user'] = $nick;
			
			echo "<br/><br/><font color='green'>Log In ondo</font>";
			//header("Location: reviewingQuizzes.php");
		}
		else{
			echo "<br/><br/><font color='red'>Erabiltzaile edota pasahitza okerra</font>";
		}
	}
	else{
		echo "<br/><br/><font color='red'>Erabiltzaile edota pasahitza okerra</font>";
	}
	$conn->close();
?>