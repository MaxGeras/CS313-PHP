  <?php
   session_start(); // Starting Session

   require "connect.php";
   $db = get_db();

  $userName = $_POST['uname'];
  $pass = $_POST['psw'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];

 
    $result = pg_query($db, "INSERT INTO user(user_name, user_password, user_email, user_address, user_firstName, user_lastName)
    VALUES ('$username','pass','$email','$address', '$fname', '$lname');");
    
 
    $_SESSION["login_user"] = $username; // Initializing Session
    $_SESSION["pass_user"] = $pass;

   header('location: main.php'); 
  ?>