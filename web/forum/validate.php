<?php
session_start(); // Starting Session

if (!isset($_POST['login']) || strlen(trim($_POST['login'])) == 0) 
{
	header('location: login.php'); // Redirecting To Other Page
	exit();
}
else
{
	// Define $username and $password
	$username = htmlspecialchars($_POST['login']);
             
	$_SESSION["login_user"] = $username; // Initializing Session
	header('location: main.php'); // Redirecting To Other Page
	
	exit();
  }

?> 