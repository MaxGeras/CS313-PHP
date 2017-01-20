<?php
session_start(); // Starting Session
$message = ""; // Variable To Store Error Message

if (!isset($_POST["userName"])) {
	$message = "Enter your login please....";
	header('location: user.html'); // Redirecting To Other Page
	exit();
}
else{
	// Define $username and $password
	$username = htmlspecialchars($_POST["userName"]);

	$_SESSION["login_user"] = $username; // Initializing Session
?>

<!DOCTYPE html>
<html>
<head>
	<title>Validate</title>
	<script>
	    localStorage.setItem("user", <?php echo $_SESSION["userName"]; ?>); 
		//localStorage.setItem(localStorage.userName); 
	</script>
	<?php
		header('location: profile.html'); // Redirecting To Other Page
	exit();
      }
?>  
	?>
</head>
<body>
</body>
</html>
