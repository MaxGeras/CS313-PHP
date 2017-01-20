<?php
session_start();
if (!isset($_SESSION["login_user"])) {
	$message = "Enter your login please....";
	header('location: user.html'); // Redirecting To Other Page
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

<h1>Following items have been removed from your list : </h1>
<?php

$remItem = array();

if(isset($_POST['0']))
{
	$item1 = $_POST['0'];
    echo $item1."<br>";
}
else
{
	$item1 = $_POST['5'];
   array_push($remItem, $item1);
}

if(isset($_POST['1']))
{
	$item2 = $_POST['1'];
     echo $item2."<br>";
}
else
{
	$item2 = $_POST['6'];
    array_push($remItem, $item2);
}

if(isset($_POST['2']))
{
	$item3 = $_POST['2'];
    echo $item3."<br>";
}
else
{
	//$item3 = $_POST['7'];
	array_push($remItem, $_POST['8']);
}

if(isset($_POST['3']))
{
	$item4 = $_POST['3'];
    echo $item4."<br>";
}
else
{
	//$item4 = $_POST['8'];
   array_push($remItem, $_POST['8']);
}


$_SESSION["updtItem"] = $remItem;

?>

<h3 class="b" style="text-align: center;"><a href="checkout.php">CHECKOUT</a></h3>

</body>
</html>