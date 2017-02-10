<?php

session_start();


if (!isset($_SESSION["login_user"]) || strlen(trim($_SESSION["login_user"])) == 0 || !isset($_SESSION["pass_user"])) 
{
  header('location: login.php'); // Redirecting To Other Page
  exit();
}
require "connect.php";
$db = get_db();


$replySubject = $_GET['reply'];
$_SESSION["subject"] = $replySubject;
$_SESSION["check"] = "found";

   // Find If the post has some comments otherwise create one
 
  $stmt = $db->prepare('SELECT * FROM post WHERE post_subject=:post_subject');
  $stmt->bindValue(':post_subject', $_SESSION["subject"], PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
  foreach ($rows as $row)
  { 
       $id = $row['id'];
       $_SESSION["user_post"] = $id;
  }
  echo $id."<br>";

       $stmtReply = $db->prepare('SELECT * FROM reply WHERE post_id=:post_id');
       $stmtReply->bindValue(':post_id', $id, PDO::PARAM_STR);
       $stmtReply->execute();
       $i = 0;
       while($reply = $stmtReply->fetchAll(PDO::FETCH_ASSOC))
       {
          if(isset($reply['post_id']));
          {
           $isId = $reply[$i]['id'];
           $i++;
          }
       }

 

  if(isset($isId))
  {

    header('location: replypage.php?id='.$isId.''); 
    die();
  }


 unset($_SESSION["check"]);
 header('location: validatePost.php'); 
 die();
 
?>

