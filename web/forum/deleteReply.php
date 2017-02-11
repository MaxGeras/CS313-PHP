 <?php
  session_start(); // Starting Session


if (!isset($_SESSION["login_user"]) || strlen(trim($_SESSION["login_user"])) == 0 || !isset($_SESSION["pass_user"])) 
{
  header('location: login.php'); // Redirecting To Other Page
  exit();
}
 
require "connect.php";
$db = get_db();

 // Using methd POST get the value from the user
$replies = $_POST["reply"];


 try{

      foreach ($replies as $reply)
      {
        $reply_clean = htmlspecialchars($reply);
        echo $reply_clean; 
        $stmt = $db->prepare("DELETE FROM reply where id ='".$reply_clean."'");
        //$stmt->bindValue(':post_id', $reply_clean);      
            
        // execute the insert statement
        $stmt->execute();
      }        

  
  
   // echo 'The user has been inserted with the id ' . $id . '<br>';
  }
  catch(PDOException $ex)
  {
    echo "Error connecting to DB. Details: $ex";
  }
 
header('location: contribution.php'); 
die();
?>