<?php
session_start(); // Starting Session

if(isset($_POST["review"]))
{
   header('location: review.php'); // Redirecting To Other Page
}
else
{
	header('location: checkout.php'); // Redirecting To Other Page
}
?>
