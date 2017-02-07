<?php

// Starting Session
session_start(); 

if (!isset($_SESSION["login_user"]) || strlen(trim($_SESSION["login_user"])) == 0 || !isset($_SESSION["pass_user"])) 
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
	$stmt = $db->prepare('SELECT * FROM myuser WHERE user_name=:user_name 
  AND user_password =:user_password');
	$stmt->bindValue(':user_name', $_SESSION["login_user"], PDO::PARAM_STR);
	$stmt->bindValue(':user_password', $_SESSION["pass_user"], PDO::PARAM_STR);
	$stmt->execute();
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link href="style1.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="myPost.php">Post</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="main.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="category.php">Create Category</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav " style=" background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJ_DXkNq-Y29ql3Iun0s63Ro9z1veJZcqHuVDNrWnvhzQHq28y) no-repeat; background-size: cover; ">
    </div>
    <div class="col-sm-8 text-left"> 

      <table>
        <thead>
            <tr>
            <th></th>
            <th>Information</th> 
            </tr>
        </thead>

   <?php

    foreach ($rows as $row)
  {
      echo '<tbody>';

      echo '<tr><th><strong> First name   </strong></th>';
      echo '<th>'.$row['user_firstname'].'</th>';
      echo '</tr>';
    
      echo '<tr><th><strong> Last name    </strong></th>';
      echo '<th>'.$row['user_lastname'].'</th>';
      echo '</tr>';

      echo '<tr><th><strong> Address  </strong></th>';
      echo '<th>'.$row['user_address'].'</th>';
      echo '</tr>';

      echo '<tr><th><strong> E-mail  </strong></th>';
      echo '<th>'.$row['user_email'].'</th>';
      echo '</tr>';

      echo '</tbody>';

  }

   ?>
                
</table>
    </div>
    
    <div class="col-sm-2 sidenav" style=" background: url(http://www.mormonhaven.com/mormon_missionary.jpg) no-repeat; background-size: cover; ">
    
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Posted by: Max Gerasymenko</a></li>
        <li><a href="#">Contact information: ger14009@byui.edu</a></li>
        <li><a href="#">Copyright © 2017. All rights reserved.</a></li>
        <li><a href="#">LDS Forum</a></li>
      </ul>
    </div>
</footer>

</body>
