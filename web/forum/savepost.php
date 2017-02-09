  <?php
  session_start(); // Starting Session


if (!isset($_SESSION["login_user"]) || strlen(trim($_SESSION["login_user"])) == 0 || !isset($_SESSION["pass_user"])   ) 
{
  header('location: login.php'); // Redirecting To Other Page
  die();
}
else if(!isset($_POST['forum']))
{
  header('location: myPost.php'); // Redirecting To Other Page
  die();
}
 
require "connect.php";
$db = get_db();

 // Using methd POST get the value from the user
  $subject = $_POST['subject'];
  $text = $_POST['comment'];
  $id_cat = $_POST['forum'];
  $time = '2017-02-03';


echo "TIME : ".$_SESSION['id_user']."<br>";
echo $id_cat."<br>";
 try{

      $sql = "INSERT INTO post(user_id, category_id, post_text, post_date, post_subject) 
        VALUES (:user_id, :category_id, :post_text, :post_date, :post_subject)";
      
      $stmt = $db->prepare($sql);
        
        // pass values to the statement
        $stmt->bindValue(':user_id', $_SESSION['id_user']);
        $stmt->bindValue(':category_id', intval($id_cat));
        $stmt->bindValue(':post_text', $text);
        $stmt->bindValue(':post_date', $time);
        $stmt->bindValue(':post_subject', $subject);
      
        
        // execute the insert statement
        $stmt->execute();
        
        // return generated id
        $id = $db->lastInsertId('post_id_seq');

        $_SESSION["id_post"] = $id;
  }
  catch(PDOException $ex)
  {
    echo "Error connecting to DB. Details: $ex";
  }
 
header('location: forum.php'); 
die();
?>