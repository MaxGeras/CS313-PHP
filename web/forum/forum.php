<?php
session_start(); // Starting Session

$selectOption = $_POST['forum'];

if(strcmp($selectOption,"Testimony") == 0)
{
	header('location: testimony.php'); 
}

if(strcmp($selectOption,"Question") == 0)
{
	header('location: questions.php'); 
}

if(strcmp($selectOption,"Story") == 0)
{
	header('location: stories.php'); 
}

if(strcmp($selectOption,"Tips") == 0)
{
	header('location: tips.php'); 
}

?> 