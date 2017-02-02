<?php
session_start(); // Starting Session

if (!isset($_POST['login']) || strlen(trim($_POST['login'])) == 0 || !isset($_POST['password']) 
{
	header('location: login.php'); // Redirecting To Other Page
	exit();
}
else
{

	require "connect.php";
	$db = get_db();

	
	// Define $username and $password
	$username = htmlspecialchars($_POST['login']);
	$password = htmlspecialchars($_POST['password']);

	$stmt = $db->prepare('SELECT * FROM user WHERE user_name=:user_name AND user_password=:user_password');
	$stmt->bindValue(':user_name', $username, PDO::PARAM_STR);
	$stmt->bindValue(':user_password', $password, PDO::PARAM_STR);
	$stmt->execute();
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    	if(empty($rows))
    	{
           header('location: login.php'); // Redirecting To Other Page
		   exit();
   		}	
    	else
		{
             
		$_SESSION["login_user"] = $username; // Initializing Session
		$_SESSION["pass_user"] = $username;

		header('location: main.php'); // Redirecting To Other Page
	
		exit();
	   	}
  }

?> 