<?php
session_start();
if (!isset($_SESSION["login_user"]) || strlen(trim($_SESSION["login_user"])) == 0) 
{
	$message = "Enter your login please....";
	header('location: user.php'); // Redirecting To Other Page
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Purchase Review</title>
</head>
<body>

<h1>The following items have been removed from your list : </h1>

<ul class="sqr">
<?php

$remItem = array();

if(isset($_POST['0']))
{
	$item1 = $_POST['0'];
?>	

<li>    <?php echo $item1."<br>"; ?> </li>

<?php
}
else
   array_push($remItem, $_POST['5']);

if(isset($_POST['1']))
{
	$item2 = $_POST['1'];
?>	
     <li> <?php echo $item2."<br>"; ?> </li>
<?php
}
else
    array_push($remItem, $_POST['6']);


if(isset($_POST['2']))
{
	$item3 = $_POST['2'];
?>	
    <li>    <?php echo $item3."<br>"; ?> </li>
<?php
}
else
	array_push($remItem, $_POST['7']);


if(isset($_POST['3']))
{
	$item4 = $_POST['3'];
?>

 <li>    <?php echo $item4."<br>"; ?> </li>

<?php
}
else
   array_push($remItem, $_POST['8']);



$_SESSION["myArray"] = $remItem;

?>

</ul>
<h3 class="b" style="text-align: center;"><a href="checkout.php">CHECKOUT</a></h3>

</body>
</html>