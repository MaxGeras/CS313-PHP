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
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title> Contribution </title>
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
        <li><a href="contribution.php">Manage my Contribution</a></li>
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

     <h1 style="text-align: center; font-size: 40px; 
     font-weight: 900;text-decoration: underline;">Manage your posts/replies</h1>

                
    <?php 
  
      $stmt = $db->prepare
            (' 
              SELECT * FROM myuser muser 
              INNER JOIN post mpost ON muser.id = mpost.user_id 
              INNER JOIN category mcat ON mcat.id = mpost.category_id 
              WHERE muser.id =:id;
            '); 
      $stmt->bindValue(':id',$_SESSION["id_user"], PDO::PARAM_INT);
      $stmt->execute();


         echo '<form action="deletePost.php" name="deletePost" method="post">';
         echo '<table>';
          echo '<thead>';
            echo '<tr>';
            echo '<th> Category </th>';
            echo '<th style="color:#1E90FF"> Subject </th>';
            echo '<th style="text-decoration: underline; color:#ADFF2F"> Content</th>';
            echo '<th> Date </th>';
            echo '<th> Delete Post<th>';
            echo '</tr>';
          echo '</thead>'; 

          $emptyPost = ""; // Check if post is empty...

         while( $rows = $stmt->fetch(PDO::FETCH_ASSOC))   
        {
            $emptyPost = $rows['category_name'];
        // Dsiplay a Post as table       
            echo '<tbody>';
                    echo '<tr>';
                      echo  '<td style="text-align:center;">'.$rows['category_name'].'</td>';
                      echo  '<td style="text-align:center;">'.$rows['post_subject'].'</td>';
                      echo  '<td style="text-align:center;">'.$rows['post_text'].'</td>'; 
                      echo  '<td style="text-align:center;">'.$rows['post_date'].'</td>'; 
                      echo '<th> <input type="checkbox" name="post[]" value="'.$rows['post_subject'].'">';
                    echo '<tr>';
            echo '</tbody>';        
       
        }
      
      echo '</table>';

      // Check if is empty
      if(empty($emptyPost))
      {
         echo '<p style="color:white; text-align: center; font-size:25px;"> 
         NO POSTS HAVE BEEN MADE</p>';
      }
      else
      {
      echo '<button class="button button4" name="delPost" type="submit" 
                  value="DeletePost"> Delete post </button>';
      }

      

      echo '</form>';
      echo '<br>';
      echo '<br>';
      
   // Dispaly All replies of the current user   
   $stmtReply = $db->prepare
            (' 
              SELECT * FROM myuser muser 
              INNER JOIN reply mreply ON mreply.user_id = muser.id 
              WHERE muser.id =:id;
            '); 
    $stmtReply->bindValue(':id',$_SESSION["id_user"], PDO::PARAM_INT);
    $stmtReply->execute();

        echo '<form action="deleteReply.php" name="formReply" method="post">';
        echo '<table>';
          echo '<thead>';
            echo '<tr>';
            echo '<th style="color:#1E90FF"> Content </th>';
            echo '<th style="text-decoration: underline; color:#ADFF2F"> Date</th>';
            echo '<th> Delete Reply<th>';
            echo '</tr>';
          echo '</thead>';

        $emptyReply = ""; // Check if Reply is empty... 

        while ($rowReply = $stmtReply->fetch(PDO::FETCH_ASSOC))          
        {
        
        $emptyReply = $rowReply['reply_text'];
        // Dsiplay a Post as table       
            echo '<tbody>';
                    echo '<tr>';
                      echo  '<td style="text-align:center;">'.$rowReply['reply_text'].'</td>';
                      echo  '<td style="text-align:center;">'.$rowReply['reply_date'].'</td>';
                      echo '<th> <input type="checkbox" name="reply[]" value="'.$rowReply['id'].'">';
                    echo '<tr>';
            echo '</tbody>';        
        }
      echo '</table>';

      if(empty($emptyReply))
      {
         echo '<p style="color:white; text-align: center; font-size:25px;"> 
         NO REPLIES HAVE BEEN MADE</p>';
      }
      else
      {
      echo '<button class="button button4" name="delReply" type="submit" 
                        value="Delete">Delete Reply</button>';  
      } 
      // Form is closed
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
  
      </ul>
    </div>
</footer>
</body>