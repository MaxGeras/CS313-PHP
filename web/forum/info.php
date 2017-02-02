 <?php
  session_start(); // Starting Session

  require "connect.php";
  $db = get_db();

  $userName = pg_escape_string($_POST['uname']);
  $pass = pg_escape_string($_POST['psw']);
  $email = pg_escape_string($_POST['email']);
  $address = pg_escape_string($_POST['address']);
  $fname = pg_escape_string($_POST['fname']);
  $lname = pg_escape_string($_POST['lname']);

  $query = "INSERT INTO user(user_name, user_password, user_email, user_address, user_firstname, user_lastname)
  VALUES('" .$userName. "','" .$pass. "','" .$email. "','" .$address. "', '" .$fname. "', '" .$lname. "')";
  $result = pg_query($query); 

  pg_close();
 
  $_SESSION["login_user"] = $userName; // Initializing Session
  $_SESSION["pass_user"] = $pass;

  header('location: main.php'); 
  
  ?>