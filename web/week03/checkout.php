<?php
session_start();
if (!isset($_SESSION["login_user"]) || strlen(trim($_SESSION["login_user"])) == 0) 
 {
    $message = "Enter your login please....";
    header('location: user.php'); // Redirecting To Other Page
    exit();
}
?>
<!DOCTYPE>
<html>
  <header>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <h1>Welcome , <?php echo $_SESSION["login_user"];?>!</h1>
 </header>
 <body>
         <h1 style="text-align:center; font-size:30px">Please, fill out your payment information. Thank you!</h1>
          <form action="submitForm.php" 
                name="form" 
                id="myForm"  
                method="post">
        <table>
            <tr class="tableheader">
                <td align="center" colspan="2">Enter Your Personal Information</td>
            </tr>
            <tr class="tablerow">
                <td align="right">First Name</td>
            <td><input type="text" name="first"></td>
            </tr> 

             <tr class="tablerow">
                <td align="right">Last Name</td>
            <td><input type="text" name="last"></td>
            </tr> 
             <tr class="tablerow">
                <td align="right">Adress</td>
            <td><input type="text" name="adress"></td>
            </tr> 
             <tr class="tablerow">
                <td align="right">Phone Number</td>
            <td><input type="text" name="phone"></td>
            </tr> 
            <tr class="tableheader">
            <td align="center" colspan="2"><input type="submit" name="submit" class ="b" value="Submit"></td>
            </tr>
        </table> 
    </form>
 </body>
</html>