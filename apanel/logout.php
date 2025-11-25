<?php session_start(); 
	unset($_SESSION['login']);
	header('Location:signin.php');
?>