<?php
session_start(); // Starting Session

if (!isset($_SESSION["login_user"]) || strlen(trim($_SESSION["login_user"])) == 0 || !isset($_SESSION["pass_user"])) 
{
  header('location: login.php'); // Redirecting To Other Page
  exit();
}

$selectOption = $_POST['forum'];

if(strcmp($selectOption,"Testimony") == 0)
{
	header('location: testimony.php'); 
	exit();
}

if(strcmp($selectOption,"Question") == 0)
{
	header('location: questions.php'); 
	exit();
}

if(strcmp($selectOption,"Story") == 0)
{
	header('location: stories.php');
	exit(); 
}

if(strcmp($selectOption,"Tips") == 0)
{
	header('location: tips.php');
	exit(); 
}

?> 