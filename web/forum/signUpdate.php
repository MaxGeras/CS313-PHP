<?php
session_start(); // Starting Session

if(!isset($_SESSION["login_user"]) || !isset($_SESSION["id_user"]) )
{
    $_SESSION["login_user"] = "";
    $_SESSION["id_user"] = "";
}

try
  {
      require "connect.php";
      $db = get_db();

      $stmt = $db->prepare('SELECT * FROM myuser WHERE id=:id');
      $stmt->bindValue(':id', $_SESSION["id_user"], PDO::PARAM_INT);
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  }
catch(PDOException $ex)
  {
      echo "Error connecting to DB. Details: $ex";
  }

?>

<!DOCTYPE html>

<html>
<head>
<title>User Account</title>
<link href="style.css" rel="stylesheet">
</head>
<body>

<form class="myForm" method="post" action="info.php" >
  <div class="imgcontainer">
  <p style="color:#ADFF2F; font-size: 20px;" >User Account</p>
    <img src="https://s-media-cache-ak0.pinimg.com/originals/35/30/e8/3530e8ae72248e1f7845abe09367defe.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <?php

      foreach ($rows as $row){
        $user_name = $row['user_name'];
        $user_password = $row['user_password'];
        $user_address = $row['user_address']; 
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
      }


      if(!isset($user_email) && !isset($user_password) && !isset($user_lastname))
      {
        $user_name = "";
        $user_password = "";
        $user_address = ""; 
        $user_firstname = "";
        $user_lastname = "";
        $user_email = "";
      }

    ?>

    <label style="color:#ADFF2F;"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" value= "<?php
    echo $user_name; ?>" 
    required>

    <label style="color:#ADFF2F;"><b>Password</b></label>
    <input type="text" placeholder="Enter Password" name="psw" value="<?php
    echo $user_password; ?>"
    required>

    <label style="color:#ADFF2F;"><b>First Name</b></label>
    <input type="text" placeholder="Enter Name" name="fname" value="<?php
    echo $user_firstname; ?>"
    required>
    
    <label style="color:#ADFF2F;"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lname" value="<?php 
    echo $user_lastname; ?>" 
    required>
    
    <label style="color:#ADFF2F;"><b>E-mail</b></label>
    <input type="text" placeholder="Enter E-mail" name="email" value="<?php
     echo $user_email; ?>" required> 

    <label style="color:#ADFF2F;"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" value="<?php 
    echo $user_address; ?>"
    required>

    <?php 
          if( $_SESSION["login_user"] == "" && $_SESSION["id_user"] == "" ) 
              echo '<button class="button button4" type="submit">Create Account</button>';
          else
          {
              echo '<button class="button button4" type="submit">Save Change</button>';

          }
    ?>
  
  </div>
</form>

  <?php
   if( $_SESSION["login_user"] != "" && $_SESSION["id_user"] != "" ) 
   {
  ?>
    <form action="profile.php"> 
      <button class="button button4" type="submit">Cancel</button>
    </form>
  <?php     
   }
  ?>

</body>
</html>