<?php
	session_start();
	if(!isset($_SESSION['id'])){
		header("location:./login.php");
		exit("you need login");
		return false;
	}
?>
