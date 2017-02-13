
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
  <title>Welcome to LDS Forum</title>
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
        <li class="active"><a href="#">Home</a></li> 
        <li><a href="profile.php">Profile</a></li>
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
        <li><a>Hi, <?php echo $_SESSION["login_user"]; ?></a></li> 
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
      <h1>Welcome, <?php echo $_SESSION["login_user"]; ?> </h1>
      <p>These guidelines apply to all places where users can post content. This includes, but is not limited to, discussions, comments, guides, product reviews, screenshots, artwork, videos, tags, Steam Workshop, and Steam Greenlight. 
      <br>
      <br>
      Please note that Administrators/Moderators reserve the right to change/edit/delete/move/merge any content at any time if they feel it is inappropriate, abusive, or incorrectly categorized.</p>
      <hr>


    <table >
        <thead>
            <tr>
            <th style="text-align: center; font-size:25px">By Categories  
            <p style="font-size:14px; color: white"> (Add your category to this table)</p> </th>
            <th style="text-align: center; font-size:25px"> Available Posts</th>
            </tr>
            </thead>
        <?php 
            // Initial count
            $i = 0;
            foreach ($db->query('SELECT * FROM category ORDER  BY category_name asc') as $row)
            {
              $category = $row['category_name'];
              $id = $row['id'];

              // Find how many posts is releted to the category 
              $stmtPost = $db->prepare('SELECT * FROM post WHERE category_id=:category_id');
              $stmtPost->bindValue(':category_id', $id, PDO::PARAM_STR);
              $stmtPost->execute();
              $posts = $stmtPost->fetchAll(PDO::FETCH_ASSOC);
              
              // Calculating how many posts
              foreach ($posts as $post) {
                  if($id == $post['category_id'])
                  {
                    $i++;
                  }
              }
                // Table body
                echo '<tbody>';
                    echo '<tr>'; 
                        echo '<td>';
                        echo '<div class="dropdown">';
                        echo "<span><a href='association.php?id=$id'>$category</a></span>";
                        echo "  ".'('.$row['category_description'].')';
                        echo '<div class="dropdown-content">';
                        echo '<p>Hi, '.$_SESSION["login_user"].', have a good conversation!</p>';   
                        echo '</div>';
                        echo '</td>';
                        echo '<td style="text-align: center;color: #AFEEEE;">'.$i.'</td>';
                    echo '<tr>';
                echo '</tbody>';
                $i = 0;
            }
        ?>
    </table>

    </div>
    
    <div class="col-sm-2 sidenav" style="background:url(http://www.mormonhaven.com/mormon_missionary.jpg) no-repeat; background-size: cover; ">
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