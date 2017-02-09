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
        $sql = " INSERT INTO myuser (user_name, user_password, user_email,
          user_address, user_firstname, user_lastname) 
        VALUES (:user_name, :user_password, :user_email, 
          :user_address, :user_firstname, :user_lastname)";
        
        $stmt = $db->prepare($sql);
        
        // pass values to the statement
        $stmt->bindValue(':user_name', $userName);
        $stmt->bindValue(':user_password', $pass);
        $stmt->bindValue(':user_email', $email);
        $stmt->bindValue(':user_address', $address);
        $stmt->bindValue(':user_firstname', $fname);
        $stmt->bindValue(':user_lastname', $lname);
        
        // execute the insert statement
        $stmt->execute();
        
       

        $id = $db->lastInsertId('myuser_id_seq');
        $_SESSION["id_user"] = $id;
  
  
    //echo 'The user has been inserted with the id ' .$_SESSION["id_user"]. '<br>';
  }
  catch(PDOException $ex)
  {
    echo "Error connecting to DB. Details: $ex";
  }
 
$_SESSION["login_user"] = $userName; // Initializing Session
$_SESSION["pass_user"] = $pass;

header('location: main.php'); 
die();
?>