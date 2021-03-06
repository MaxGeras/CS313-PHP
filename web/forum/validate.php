<?php
session_start(); // Starting Session

if (!isset($_POST['login']) || strlen(trim($_POST['login'])) == 0 || !isset($_POST['password'])) 
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

	$stmt = $db->prepare('SELECT * FROM myuser WHERE user_name=:user_name');
	$stmt->bindValue(':user_name', $username, PDO::PARAM_STR);
	$stmt->execute();
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

	foreach ($rows as $row){ 
	       $_SESSION["id_user"] = $row['id'];
	       $hash = $row['user_password'];
	}
	
    
    if(empty($rows))
    {
     ?>
    	  <script type=\"text/javascript\">	
		  document.getElementById("message").innerHTML = "Credentials were not found"; 
		  </script>
    <?php
           header('location: login.php'); // Redirecting To Other Page
		   die();
   	}	
    else if (password_verify($password, $hash)) 
	{
         

		$_SESSION["login_user"] = $username; // Initializing Session
		$_SESSION["pass_user"] = $password;

		header('location: main.php'); // Redirecting To Other Page
	
		die();
	}

	header('location: login.php'); // Redirecting To Other Page
    die();
}
?> 