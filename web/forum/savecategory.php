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
  $categoryName = $_POST['category'];
  $description = $_POST['describe'];



 try{

        
      $stmt = $db->prepare("INSERT INTO category(category_name, category_description) 
        VALUES (:category_name, :category_description)");
        
        // pass values to the statement
        $stmt->bindValue(':category_name', $categoryName);
        $stmt->bindValue(':category_description', $description);
      
        
        // execute the insert statement
        $stmt->execute();
        
        // return generated id
        $id = $db->lastInsertId('category_id_seq');

        $_SESSION["id_category"] = $id;
  
  
   // echo 'The user has been inserted with the id ' . $id . '<br>';
  }
  catch(PDOException $ex)
  {
    echo "Error connecting to DB. Details: $ex";
  }
 
header('location: main.php'); 
die();
?>