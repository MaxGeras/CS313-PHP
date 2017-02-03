<?php
session_start(); // Starting Session

require "connect.php";
$db = get_db();

// Using methd POST get the value from the user
$userName = $_POST['uname'];
$pass = $_POST['psw'];
$email = $_POST['email'];
$address = $_POST['address'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];

// prepare statement for insert
try{
      $sql = "INSERT INTO myuser (user_name, user_password, user_email, user_address, user_firstName, user_lastName) 
      VALUES (:user_name, :user_password, :user_email, :user_address, :user_firstName, :user_lastName)";
        
      $stmt = $db->prepare($sql);
        
      // pass values to the statement
      $stmt->bindValue(':user_name', $userName);
      $stmt->bindValue(':user_password', $pass);
      $stmt->bindValue(':user_email', $email);
      $stmt->bindValue(':user_address', $address);
      $stmt->bindValue(':user_firstName', $fname);
      $stmt->bindValue(':user_lastName', $lname);
        
      // execute the insert statement
      $stmt->execute();
        
      // return generated id
      $id = $db->lastInsertId('user_id_seq');
  
  
     echo 'The user has been inserted with the id ' . $id . '<br>';
}
catch(PDOException $ex)
{
     echo "Error connecting to DB. Details: $ex";
}
 

  
$_SESSION["login_user"] = $userName; // Initializing Session
$_SESSION["pass_user"] = $pass;

//header('location: main.php'); 
//die();
?>