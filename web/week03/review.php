<?php
session_start();


if (!isset($_SESSION["login_user"]) || strlen(trim($_SESSION["login_user"])) == 0) 
{
	header('location: user.php'); // Redirecting To Other Page
	exit();
}

?>

<!DOCTYPE html>
<html>
  <header>
   <link rel="stylesheet" type="text/css" href="style.css" />
   <script>
   function goBack() {
      window.history.back();
    }
  </script>
 </header>
 <body class="review">
 <h1 style="text-align: center;">Please ,<?php echo $_SESSION["login_user"];?>, review your purchase!</h1>
         <h1 style="text-align:center; font-size:50px">Order Review</h1>
  <?php
 
		$dom = new DOMDocument("1.0", "utf-8");
		$dom->loadHTMLFile('profile.html');
   
    $myArray=array();
   
  if(isset($_REQUEST['item1']))
  {

    $price1 = $dom->getElementById('price1');
    $item1 = $dom->getElementById('item1');

    $_SESSION["price1"] = $price1->textContent;
    $_SESSION["item1"] = $item1->textContent;
   
    array_push($myArray, "Desciption : ".$_SESSION["item1"]."<br>"."Price : $".$_SESSION["price1"]);

    $totalPrice += $price1->textContent;
    
  }
   
   if(isset($_REQUEST['item2']))	
   {
    $price2 = $dom->getElementById('price2');
    $item2 = $dom->getElementById('item2');

    $_SESSION["price2"] = $price2->textContent;
    $_SESSION["item2"] = $item2->textContent;
   
    array_push($myArray, "Desciption : ".$_SESSION["item2"]."<br>"."Price : $".$_SESSION["price2"]); 
   
    $totalPrice += $price2->textContent;
    }

if(isset($_REQUEST['item3']))
 {
    $price3 = $dom->getElementById('price3');
    $item3 = $dom->getElementById('item3');

    $_SESSION["price3"] = $price3->textContent;
    $_SESSION["item3"] = $item3->textContent;

    array_push($myArray, "Desciption : ".$_SESSION["item3"]."<br>"."Price : $".$_SESSION["price3"]); 
    $totalPrice += $price3->textContent;
}

if(isset($_POST['item4']))
{
    $price4 = $dom->getElementById('price4');
    $item4 = $dom->getElementById('item4');

    $_SESSION["price4"] = $price4->textContent;
    $_SESSION["item4"] = $item4->textContent;

    array_push($myArray, "Desciption : ".$_SESSION["item4"]."<br>"."Price : $".$_SESSION["price4"]);

    $totalPrice += $price4->textContent;
}

   
    //echo "<font color='red'>Total Price: </font>$".number_format($totalPrice,2);
   
   	$_SESSION["item5"] = "Total Price : ";
   	$totalPrice = number_format($totalPrice,2);
    $_SESSION["price5"] = $totalPrice;

    array_push($myArray, "Total price : $".$_SESSION["price5"]);

    $_SESSION["myArray"] = $myArray;


  ?>

   </div>
    <h3>Your purchase includes the following items:</h3>
   
    <form align="center" action="remove.php" name="formRemove" method="post">
    <table id="cart1">
        <thead>
            <tr>
            <th>Overview</th>
            </tr>
            </thead>
            <tbody>
        <?php 
       
        foreach($_SESSION["myArray"] as $x => $x_value){
            echo'<tr>'; 
            echo'<td>'.$x_value."</td>";
         if($x != ( sizeof($_SESSION["myArray"]) - 1 ) )
         {
           echo '<td>';
           echo '<input type="checkbox" value="'.$x_value.'" name="'.$x.'" >Remove Item</input>';
           $hidden = $x + 5;
           echo '<input type="hidden" value="'.$x_value.'" name="'.$hidden.'" ></input>';
           echo '</td>';
          }
           echo'</tr>'; 
            	if($x == ( sizeof($_SESSION["myArray"]) - 1 ) )
            	{
        ?>
         	 <tr>
    			   <td colspan="sizeof($_SESSION["myArray"])">  
      			   	<button class="b" type="submit" name ="submit" id="submit">Remove Item</button>
    			 </td>
  			</tr>
         <?php
          	 	}
         	} 
         ?>
     </tbody>
    </table>
     </form> 
     <div class="pos1">
      <button style="text-align: center;" class="b" onclick="goBack()">Go Back</button>
	    <h3 class="b" style="text-align: center;"><a href="checkout.php"/>CHECKOUT</h3>
     </div>
</body>
</html>