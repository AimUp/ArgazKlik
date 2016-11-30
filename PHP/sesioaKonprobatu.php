<?php

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	function eremuBabestua(){
		if(isset($_SESSION['login_user'])){
			echo "<a href='profile.php'>" . explode('@', $_SESSION['login_user'])[0] . "</a>";
			echo "<a href='logOut.php'>LogOut</a>";
		}
		else{
			header("Location: ./layout.php");
			exit();
		}
	}

	function eremuArrunta(){
		if(isset($_SESSION['login_user'])){
			echo "<a href='handlingQuizes.php'>" . explode('@', $_SESSION['login_user'])[0] . "</a><br/>";
			echo "<a href='logOut.php'>LogOut</a>";
		}
		else{
			echo "<a href='./signIn.php'>Log In</a><br/>";
			echo "<a href='./signUp.php'>Sign Up</a>";
		}
	}

?>