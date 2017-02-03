<?php

// Starting Session
session_start(); 

if (!isset($_POST['login']) || strlen(trim($_POST['login'])) == 0 || !isset($_POST['password'])) 
{
	header('location: login.php'); // Redirecting To Other Page
	die();
}
else
{
	// Connect to postgres DATABASE
	require "connect.php";
	$db = get_db();


	// Find an existing password and login
	$stmt = $db->prepare('SELECT * FROM myuser WHERE user_name=:user_name AND user_password =:user_password');
	$stmt->bindValue(':user_name', $username, PDO::PARAM_STR);
	$stmt->bindValue(':user_password', $password, PDO::PARAM_STR);
	$stmt->execute();
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?> 

<!DOCTYPE html>

<html>
<head>
<title>My Profile</title>
<link href="style.css" rel="stylesheet">
</head>
<body>

  <div class="imgcontainer">
  <p>Login Form</p>
    <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRu8HUjKT2EqaLUEcKs7KWvkWThtFNlGGmvZ3_FpL8akJWcpXg9OQ" 
    alt="Avatar" class="avatar">
  </div>

  <div class="container">

<?php

    foreach ($rows as $row)
	{
  		echo "<p>";
  		echo "<strong>"; 
        echo "First name :"
  		echo "</strong>";
  		echo  $row['user_firstName'];
  		echo "</p>";
  		echo "<br>";

  		echo "<p>";
  		echo "<strong>"; 
        echo "Last name :"
  		echo "</strong>";
  		echo  $row['user_lastName'];
  		echo "</p>";
  		echo "<br>";

  		echo "<p>";
  		echo "<strong>"; 
        echo "Address :"
  		echo "</strong>";
  		echo  $row['user_address'];
  		echo "</p>";
  		echo "<br>";

  		echo "<p>";
  		echo "<strong>"; 
        echo "E-mail :"
  		echo "</strong>";
  		echo  $row['user_email'];
  		echo "</p>";
  		echo "<br>";

	}
?>
  </div>

</body>
</html>