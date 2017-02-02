 <?php
  session_start(); // Starting Session

  function insertUserInfo($name, $pass, $email, $address, $firstname, $lastname) {
        // prepare statement for insert
        $sql = 'INSERT INTO user (user_name, user_password, user_email, user_address, user_firstname, user_lastname)
         VALUES (:user_name, :user_password, :user_email, :user_address, :user_firstname, :user_lastname)';
        $stmt = $this->pdo->prepare($sql);
        
        // pass values to the statement
        $stmt->bindValue(':user_name', $name);
        $stmt->bindValue(':user_password', $pass);
        $stmt->bindValue(':user_email', $email);
        $stmt->bindValue(':user_address', $address);
        $stmt->bindValue(':user_firstname', $firstname;
        $stmt->bindValue(':user_name', $lastname);
        
        // execute the insert statement
        $stmt->execute();
        
        // return generated id
        return $this->pdo->lastInsertId('user_id_seq');
    }



  $userName = pg_escape_string($_POST['uname']);
  $pass = pg_escape_string($_POST['psw']);
  $email = pg_escape_string($_POST['email']);
  $address = pg_escape_string($_POST['address']);
  $fname = pg_escape_string($_POST['fname']);
  $lname = pg_escape_string($_POST['lname']);



try {
    // connect to the PostgreSQL database
   require "connect.php";
   $db = get_db();
 
    // insert a stock into the stocks table
    $id = insertUserInfo( $userName, $pass, $email, $address, $fname, $lname);
    echo 'The stock has been inserted with the id ' . $id . '<br>';
 
} 
catch (\PDOException $e) {
    echo $e->getMessage();
}
  
 
  $_SESSION["login_user"] = $userName; // Initializing Session
  $_SESSION["pass_user"] = $pass;

  //header('location: main.php'); 
  //die();
  
?>