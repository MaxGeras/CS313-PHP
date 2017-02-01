
<?php

require "connect.php";
$db = get_db();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Welcome</h1>
      <p>These guidelines apply to all places where users can post content. This includes, but is not limited to, discussions, comments, guides, product reviews, screenshots, artwork, videos, tags, Steam Workshop, and Steam Greenlight. 
      <br>
      <br>

      When providing feedback, posting information, or discussing a product in Steam, whether it’s negative or positive, please make sure you are being relevant, constructive and polite. Developers take feedback from all kinds of sources into account, even though they may not have the time to respond to every post or question. 
      <br>
      <br>

      Please note that Administrators/Moderators reserve the right to change/edit/delete/move/merge any content at any time if they feel it is inappropriate, abusive, or incorrectly categorized.</p>
      <hr>
      <h3>Forums</h3>
      
      <?php>

     
      $statement = $db->prepare("SELECT category_name, category_description FROM category");
      $statement->execute();
      ?>


    <table >
        <thead>
            <tr>
            <th>Forums</th>
            <th>Users</th>
            </tr>
            </thead>
        <?php 
            $myPhp = 0;
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $myPhp++; 
                echo"<tbody>";
                    echo "<tr>"; 
                        echo "<td>";
                        echo "<a href =\"$myPhp.php\">".$row['category_name']."</a>";
                        echo "<br>";
                        echo "(".$row['category_description'].")";
                        echo "</td>";
                        echo "<td>"." 0 "."</td>";
                    echo "<tr>";
                echo "</tbody>";
            }
        ?>
    </table>

    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
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