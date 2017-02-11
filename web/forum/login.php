<?php
 // First, check if the submit button has been pressed - no processing occurs unless
 // the form has been submitted. 
 // This is necessary because your $_POST variables do not exist until the form is submitted.
    if (isset($_POST['submit'])) {
        // The button has been pressed, so now gather data and set variables
      	if ($_POST['login'] == "error")
        {
                  
        }
    }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome To LDS Forum</title>
  <link href="style.css" rel="stylesheet">
</head>
<body> 
 
 <div id="fullscreen_bg" class="fullscreen_bg"/>

<div class="container">

	<form class="form-signin" action="validate.php" method="post">
		<h1 class="form-signin-heading text-muted">Sign In</h1>
		<input type="text" class="form-control" placeholder="Login" name="login" required="" autofocus="">
		<input type="password" class="form-control" placeholder="Password" name="password" required="">
		<button  class="button" name="submit" type="submit">
			Sign In
		</button>
		<br>
		<a class="log" href="signup.php">Not Registered? Create an account</a>
	</form>
		
  <div id="message"></div>
</div>
 </body>
 </html>	