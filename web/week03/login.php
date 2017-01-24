<?php
session_start(); // Starting Session

if (!isset($_REQUEST['userName']) || strlen(trim($_REQUEST['userName'])) == 0) 
{
	header('location: user.php'); // Redirecting To Other Page
	//exit();
}
else
{
	// Define $username and $password
	$username = htmlspecialchars($_REQUEST['userName']);
             
	$_SESSION["login_user"] = $username; // Initializing Session
	header('location: profile.html'); // Redirecting To Other Page
	
	//exit();
  }

?>  

