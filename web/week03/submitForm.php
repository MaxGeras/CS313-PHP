<?php
session_start();

if (!isset($_SESSION["login_user"])) {

    $message = "Enter your login please....";
    header('location: user.html'); // Redirecting To Other Page
    exit();
}

?>
<!DOCTYPE>
<html>
   <header>
        <link rel="stylesheet" type="text/css" href="style.css" />
   </header>
 <body>
   <form id="prof" name="form1" method="post" action="log_out.php">
            <label id="id" >
                <input class="b" name="submit2" type="submit" id="submit2" value="Log out">
            </label>
</form>
        <h1>Thank you , <?php echo $_SESSION["login_user"];?> , for your purchase!</h1>
        
 <div id="submt">
       <?php
            echo "<font color='#4CAF50'>First and last name: </font>".$_POST["first"]." ";
            echo $_POST["last"]."<br>";
            echo "<font color='#4CAF50'>Address: </font>".$_POST["adress"]."<br>";
            echo "<font color='#4CAF50'>Phone number: </font>".$_POST["phone"]."<br>";
       ?>
</div>
    <h3>Your purchase includes following items: </h3>
    <table id="cart1">
        <thead>
            <tr>
            <th>Items</th>
            </tr>
            </thead>
        <?php 
         if(sizeof($_SESSION["updtItem"]) != 0)
         {
            foreach( $_SESSION["updtItem"] as $x_value){
                echo'<tbody>';
                    echo'<tr>'; 
                        echo'<td>' .$x_value. '</td>';
                    echo'<tr>';
                echo'</tbody>';
            }
        }
        ?>
    </table>

   <?php
   
        if(sizeof($_SESSION["updtItem"]) == 0)
            echo '<p style="color: red; font-size:27px;"> All items has been removed from the list! </p>';
   ?>
 </body>
</html>