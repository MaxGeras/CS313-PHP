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
$posts = $_POST["post"];

 try{

      foreach ($posts as $post)
      {

      $stmt = $db->prepare('SELECT * FROM post WHERE post_subject=:post_subject');
      $stmt->bindValue(':post_subject', $post, PDO::PARAM_STR);
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
          foreach ($rows as $row)
          { 
              $id = $row['id'];
            
              $stmtReply = $db->prepare("
              DELETE FROM  reply  WHERE post_id ='".$id."'");
              $stmtReply->execute();

              $stmtPost = $db->prepare("
              DELETE FROM  post  WHERE id ='".$id."'");
              $stmtPost->execute();
          }
      }        

  }
  catch(PDOException $ex)
  {
    echo "Error connecting to DB. Details: $ex";
  }
 
header('location: contribution.php'); 
die();
?>