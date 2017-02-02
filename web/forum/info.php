  <?php
   session_start(); // Starting Session

   require "connect.php";
   $db = get_db();


    $query = "INSERT INTO user(user_name,user_password,user_email,user_address,user_firstName,user_lastName)
    VALUES ('$_POST[uname]','$_POST[psw]','$_POST[email]','$_POST[address]', '$_POST[fname]', '$_POST[lname]')";
    $result = pg_query($query);


    $username = htmlspecialchars($_POST['uname']);
    $password = htmlspecialchars($_POST['psw']);
    $_SESSION["login_user"] = $username; // Initializing Session
    $_SESSION["pass_user"] = $username;

   header('location: main.php'); 
  ?>