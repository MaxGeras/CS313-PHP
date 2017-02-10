<?php
  session_start(); // Starting Session


if (!isset($_SESSION["login_user"]) || strlen(trim($_SESSION["login_user"])) == 0 ||
 !isset($_SESSION["pass_user"]) || !isset($_SESSION["subject"]) ) 
{
  header('location: login.php'); // Redirecting To Other Page
  exit();
}
 
require "connect.php";
$db = get_db();


// Using methd POST get the value from the user
  $reply = $_POST['reply'];

// Find a user of the post 
  
$stmt = $db->prepare('SELECT * FROM post WHERE post_subject=:post_subject');
  $stmt->bindValue(':post_subject', $_SESSION["subject"], PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
   foreach ($rows as $row){ 
    $id = $row['id'];
  }
  
   $_SESSION["user_post"] = $id;
    $time = date('Y-m-d H:i:s');

 try{

      $sql = "INSERT INTO reply(post_id, user_id, reply_date, reply_text) 
        VALUES (:post_id, :user_id,:reply_date, :reply_text)";
      
      $stmt = $db->prepare($sql);
        
        // pass values to the statement
        $stmt->bindValue(':post_id', $id);
        $stmt->bindValue(':user_id', $_SESSION["id_user"]);
        $stmt->bindValue(':reply_date', $time);
        $stmt->bindValue(':reply_text', $reply);
      
        
        // execute the insert statement
        $stmt->execute();
        
        // return generated id
        $id = $db->lastInsertId('reply_id_seq');

        $_SESSION["reply_id"] = $id;
  }
  catch(PDOException $ex)
  {
    echo "Error connecting to DB. Details: $ex";
  }
 
header('location: replypage.php?id='.$id.''); 
die();
?>