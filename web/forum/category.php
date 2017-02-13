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
  <title>My Category</title>
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
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="main.php">Home</a></li>
        <li><a href="myPost.php">Create Post</a></li>
        <li><a href="forum.php">Main Forum</a></li>
        <li class="active"><a href="category.php">Create Category</a></li>
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

    <h1>Enjoy your time with us. <br>Create your own category. Involve more people....</h1>
    <form action="savecategory.php" method="post">
    New Category Name: <input type="text" name="category" required><br>
    Describe your category: <br>
    <textarea rows="12" cols="50" name="describe" placeholder="Enter text here..." required></textarea>
    <br>
    <input type="submit" class="button button3" value="Save">
    </form>
                

    </div>
    
    <div class="col-sm-2 sidenav" style=" background: url(http://www.mormonhaven.com/mormon_missionary.jpg) no-repeat; background-size: cover; ">
    
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