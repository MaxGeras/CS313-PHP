<?php

session_start();


if (!isset($_SESSION["login_user"]) || strlen(trim($_SESSION["login_user"])) == 0 || !isset($_SESSION["pass_user"])) 
{
  header('location: login.php'); // Redirecting To Other Page
  exit();
}
require "connect.php";
$db = get_db();


$replyTime = $_GET['reply'];
$_SESSION["check"] = "found";

   // Find If the post has some comments otherwise create one
 
  $stmt = $db->prepare('SELECT * FROM post WHERE post_date=:post_date');
  $stmt->bindValue(':post_date', $replyTime, PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
  foreach ($rows as $row)
  { 
       $id = $row['id'];
       $_SESSION["user_post"] = $id;
       $_SESSION["subject"]  = $row['post_subject'];
       $id_user_post = $row['user_id'];
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


    header('location: replypage.php?id='.$isId.''); 
    die();

?>

