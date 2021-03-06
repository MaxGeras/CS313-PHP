<?php
session_start();

if (!isset($_SESSION["login_user"]) || strlen(trim($_SESSION["login_user"])) == 0 || !isset($_SESSION["pass_user"])) 
{
  header('location: login.php'); // Redirecting To Other Page
  exit();
}

require "connect.php";
$db = get_db();


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
      <a class="navbar-brand" href="myPost.php">Create Post</a>
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
           foreach ($db->query('SELECT * FROM category ORDER  BY category_name asc') as $rows)
            {
              $categoryDrop= $rows['category_name'];
              $idDrop = $rows['id'];
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

     <h1>LDS Forum</h1>


                
  <?php

      $stmtPost = $db->prepare('SELECT * FROM post p  
      INNER JOIN category c ON c.id = p.category_id
      INNER JOIN myuser u ON u.id = p.user_id
      WHERE p.id=:id');
      $stmtPost->bindValue(':id', $_SESSION["user_post"], PDO::PARAM_STR);
      $stmtPost->execute();

      
      echo  '<table style="text-align: left;">';
      echo  '<thead>';
      echo  '<tr>';
      echo  '<th style="text-align: center; width: 250px;">User</th>';
      echo  '<th style="color:#1E90FF;text-align: center;">Category</th>';
      echo  '<th style="color:#ADFF2F; text-align: center;">Subject</th>';
      echo  '<th style="text-align: center;">Date</th>';  
      echo  '</tr>';
      echo  '</thead>';
      echo  '</table>'; 
    
      while ($rowPost = $stmtPost->fetch(PDO::FETCH_ASSOC))
      {
        echo '<table >';
          echo '<thead >';
            echo '<tr style="background-color:#B0C4DE">';
            echo '<th>'.$rowPost['user_firstname']." ".$rowPost['user_lastname'].'</th>';
            echo '<th style="color:#1E90FF">'.$rowPost['category_name'].'</th>';
            echo '<th style="color:#ADFF2F">'.$rowPost['post_subject'].'</th>';
            $subject = $rowPost['post_subject'];
            echo '<th>'.$rowPost['post_date'].'</th>';
            echo '</tr>';
          echo '</thead>';       
            echo '<tbody>';
                    echo '<tr>'; 
                    echo  '<td colspan="4">'.$rowPost['post_text'].'</td>';
                    echo '<tr>';
            echo '</tbody>';        
        echo '</table>';
      }
      echo "<br>";
 

  $i = 0;
  $stmt = $db->prepare('SELECT * FROM reply WHERE post_id=:post_id ');
  $stmt->bindValue(':post_id', $_SESSION["user_post"], PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach ($rows as $row) {
 
     
      
      //  Display Reply User
      $stmtReply = $db->prepare('SELECT * FROM myuser WHERE id=:id ');
      $stmtReply->bindValue(':id', $row['user_id'], PDO::PARAM_STR);
      $stmtReply->execute();
      while ($rowReply = $stmtReply->fetch(PDO::FETCH_ASSOC))
      {
        
        $i++;
        if($i % 2 == 0)
        { 
          echo '<table style="background-color: #7CFC00; width:500px; margin-right: 20px;">';
        }
        else
        {
          echo '<table style="background-color: #ADFF2F; width:500px; margin-left: 200px;">';
        }
          echo '<thead>';
            echo '<tr>';
            echo '<th>'.$rowReply['user_firstname']." ".$rowReply['user_lastname'].'</th>';
            echo '<th>'.$row['reply_date'].'</th>';
            echo '</tr>';
          echo '</thead>';       
            echo '<tbody>';
                    echo '<tr>';
                    echo  '<td colspan="2">'.$row['reply_text'].'</td>';
                    echo '<tr>';
            echo '</tbody>';        
        echo '</table>';
        echo "<br>";
      }
       
  }

     echo '<form action="validatePost.php" method="get">';

     echo '<button class="button button5" name="reply" type="submit" 
              value="'.$subject.'"> Reply </button>';
     echo '</form>';
      
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
        <li><a href="#">LDS Forum</a></li>
      </ul>
    </div>
</footer>
</body>