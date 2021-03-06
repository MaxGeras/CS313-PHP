<?php
session_start();

if (!isset($_SESSION["login_user"]) || strlen(trim($_SESSION["login_user"])) == 0 ||
 !isset($_SESSION["pass_user"])) 
{
  header('location: login.php'); // Redirecting To Other Page
  exit();
}

require "connect.php";
$db = get_db();

$id = $_GET['id'];

$statement = $db->prepare("
        SELECT * FROM myuser muser 
        INNER JOIN post mpost ON muser.id = mpost.user_id 
        INNER JOIN category mcat ON mcat.id = mpost.category_id
        WHERE mcat.id = :cat_id");
$statement->bindValue(":cat_id", $id, PDO::PARAM_INT);
$statement->execute();
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row)
{
  $id = $row['id'];
  $category = $row['category_name'];
}

 if(empty($rows))
 {
    header('location: myPost.php'); // Redirecting To Other Page
    die();
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title> LDS Forum </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="style1.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="myPost.php">Post</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="main.php">Home</a></li>
        <li><a href="forum.php">Main Forum</a></li>
        <li><a href="category.php">Create Category</a></li>
        <li><a href="contribution.php">Manage My Contributions</a></li>
            <!-- DROP DWON OPTIONS--> 
        <li>
          <div class="dropdown1">
          <button class="dropbtn1">Categories</button>
          <div class="dropdown-content1">
          <?php
           foreach ($db->query('SELECT * FROM category ORDER  BY category_name asc') as $rowCategory)
            {
              $categoryDrop= $rowCategory['category_name'];
              $idDrop = $rowCategory['id'];
              echo "<a href='association.php?id=$idDrop'>$categoryDrop</a>"; 
            }
          ?>
            </div>
          </div>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav " style=" background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJ_DXkNq-Y29ql3Iun0s63Ro9z1veJZcqHuVDNrWnvhzQHq28y) no-repeat; background-size: cover; ">
    </div>
    <div class="col-sm-8 text-left"> 

     <h1 style="text-align: center; font-size: 35px; 
     font-weight: 900; text-decoration: underline;" ><?php echo $category ?></h1>

    
                
    <?php
  
    echo '<form action="myPost.php" method="Post">';
    echo '<button class="button button6" name="post" type="submit" 
                  value="New Post">Create New Post</button>';
    echo '</form>';              
    echo "<br>";

      foreach ($rows as $row)
      {
        
        // Dsiplay a Post as table 
      echo '<form action="reply.php" method="get">';
        echo '<table>';
          echo '<thead>';
            echo '<tr>';
            echo '<th>'.$row['user_firstname']." ".$row['user_lastname'].'</th>';
            echo '<th style="color:#1E90FF">'.$row['category_name'].'</th>';
            echo '<th style="color:#ADFF2F">'.$row['post_subject'].'</th>';
            echo '<th>'.$row['post_date'].'</th>';
            echo '</tr>';
          echo '</thead>';       
            echo '<tbody>';
                    echo '<tr>'; 
                    echo  '<td colspan="4">'.$row['post_text'].'</td>';
                    echo '<tr>';
            echo '</tbody>';        
        echo '</table>';
  
        echo '<button class="button button4" name="reply" type="submit" 
                  value="'.$row['post_date'].'">Join Conversation</button>';
    echo '</form>';
    echo '<br>';
    echo '<br>';
        }
    ?>
    </div>
    
    <div class="col-sm-2 sidenav" style=" 
    background: url(http://www.mormonhaven.com/mormon_missionary.jpg) 
    no-repeat; background-size: cover; ">
    
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Posted by: Max Gerasymenko</a></li>
        <li><a href="#">Contact information: ger14009@byui.edu</a></li>
        <li><a href="#">Copyright © 2017. All rights reserved.</a></li>
  
      </ul>
    </div>
</footer>
</body>