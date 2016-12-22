<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	function eremuBabestua(){
		if(isset($_SESSION['login_user'])){
			echo "<a href='profile.php?user=".strtolower($_SESSION['login_user'])."'>" . strtolower($_SESSION['login_user']) . "</a><br/>";
			echo "<a href='logOut.php'>LogOut</a>";
		}
		else{
			header("Location: ./layout.php");
			exit();
		}
	}

	function eremuArrunta(){
		if(isset($_SESSION['login_user'])){
			if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'bazkidea') {
				echo "<a href='profile.php?user=".strtolower($_SESSION['login_user'])."'>" . strtolower($_SESSION['login_user']) . "</a><br/>";
				echo "<a href='logOut.php'>LogOut</a>";
			}
			else{
				echo "<a href='administraria.php'>" . strtolower($_SESSION['login_user']) . "</a><br/>";
				echo "<a href='logOut.php'>LogOut</a>";
			}
		}
		else{
			echo "<a href='./logIn.php'>Log In</a><br/>";
			echo "<a href='./signUp.php'>Sign Up</a>";
		}
	}

	function logEremua(){
		if(isset($_SESSION['login_user'])){
			header("Location: ./profile.php?user=". strtolower($_SESSION['login_user']));
			exit();
		}
		else{
			echo "<a href='./logIn.php'>Log In</a><br/>";
			echo "<a href='./signUp.php'>Sign Up</a>";
		}
	}

	function adminEremua(){
		if(!isset($_SESSION['login_user'])){
			header("Location: ./layout.php");
		}
		elseif (!(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'administraria')) {
			header("Location: ./layout.php");
		}
	}

	function bazkideEremua(){
		if(isset($_SESSION['login_user'])){
			if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'bazkidea') {
				echo "<a href='profile.php?user=".strtolower($_SESSION['login_user'])."'>" . strtolower($_SESSION['login_user']) . "</a><br/>";
				echo "<a href='logOut.php'>LogOut</a>";
			}
			else{
				header("Location: ./administraria.php");
				exit();
			}
		}
		else{
			header("Location: ./layout.php");
			exit();
		}
	}

?>