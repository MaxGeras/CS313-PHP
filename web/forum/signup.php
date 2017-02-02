<?php
session_start(); // Starting Session

  require "connect.php";
  $db = get_db();
?>

<!DOCTYPE html>

<html>
<head>
<title>Sign Up</title>
<link href="style.css" rel="stylesheet">
</head>
<body>

<form class="myForm" action="main.php">
  <div class="imgcontainer">
  <p>Login Form</p>
    <img src="https://s-media-cache-ak0.pinimg.com/originals/35/30/e8/3530e8ae72248e1f7845abe09367defe.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label><b>First Name</b></label>
    <input type="text" placeholder="Enter Name" name="fname" required>
    
    <label><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lname" required>
    
    <label><b>E-mail</b></label>
    <input type="text" placeholder="Enter E-mail" name="email" required> 

    <label><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" required>

    
    <?php

    $query = "INSERT INTO user(user_name,user_password,user_email,user_address,user_firstName,user_lastName)
    VALUES ('$_POST[uname]','$_POST[psw]','$_POST[email]','$_POST[address]', '$_POST[fname]', '$_POST[lname]')";
    $result = pg_query($query);


    $username = htmlspecialchars($_POST['uname']);
    $password = htmlspecialchars($_POST['psw']);
    $_SESSION["login_user"] = $username; // Initializing Session
    $_SESSION["pass_user"] = $username;

    ?>

        
    <button class="button1" type="submit">Sign Up</button>
  </div>
</form>



</body>
</html>