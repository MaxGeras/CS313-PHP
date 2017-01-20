<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <link rel="stylesheet" type="text/css" href="style.css" />

       <title>My page</title>
   </head>
 
   <body>

  <form align="right" name="form1" method="post" action="log_out.php">
  <label>
  <input name="submit2" type="submit" id="submit2" value="log out">
  </label>
  </form>
      <h1>Welcome  <?php echo $_SESSION["login_user"];?> !!!</h1>

    <form align="center" action="validate.php" method="post">
      <table id="cart">
        <thead>
          <tr>
            <th class="first">Photo</th>
            <th class="second">Qty</th>
            <th class="third">Desciption</th>
            <th class="fourth">Price </th>
            <th>Add to card</th>
          </tr>
        </thead>
  <!-- shopping cart contents -->
  <tbody>

 <tr class="productitm">
    <!-- http://www.inkydeals.com/deal/ginormous-bundle/ -->
    <td><img src="https://cdn.shopify.com/s/files/1/0353/8325/products/black-gmiller-classico-watch.jpg?v=1472072928" 
    alt="watch" height="150" width="190" class="thumb"></td>
    <td><input type="number" value="1" min="0" max="99" class="qtyinput"></td>
    <td> <p id="item1">40mm 18K yellow gold case,<br>
     screw-down back, screw-down<br> 
     crown and push buttons with<br>
      Triplock triple waterproofness<br>
      </p>
      </td>
    <td> <p id="price1">$79.00</p></td>
    <td><input type="checkbox" value="Add to cart" name="item1">Add </input></td>
  </tr>
<tr class="productitm">
    <!-- http://www.inkydeals.com/deal/ginormous-bundle/ -->
    <td><img src="http://cdn2.jomashop.com/media/catalog/product/o/m/omega-speedmaster-professional-moonwatch-men_s-watch-311.30.42.30.01.005_1.jpg" 
    alt="watch" height="150" width="190" class="thumb"></td>
    <td><input type="number" value="1" min="0" max="99" class="qtyinput"></td>
    <td id="item2">
    Rolex calibre 4130 self-winding movement with<br>
    chronograph central second hand,<br>
     30-minute counter at 3 o'clock, <br>
     and 12-hour counter at 9 o'clock, <br>
     approximately 72 hours of power reserve<br>
    </td>
    <td id="price2">$201.00</td>
    <td><input type="checkbox" value="Add to cart" name="item2"></td>
  </tr>

   <tr class="productitm">
    <!-- http://www.inkydeals.com/deal/ginormous-bundle/ -->
    <td><img src="http://cdn2.jomashop.com/media/catalog/product/o/m/omega-seamaster-planet-ocean-black-dial-men_s-watch-232.30.42.21.01.001_1.jpg" 
    alt="watch" height="150" width="190" class="thumb"></td>
    <td><input type="number" value="1" min="0" max="99" class="qtyinput"></td>
    <td id="item3">  18K yellow gold Oyster bracelet<br>
    with flat three-piece links, folding<br>
     Oysterlock buckle with Easylink 5mm<br>
      comfort extension link. Waterproof <br>
      to 100 meters.<br>
    </td>
    <td id="price3">$189.00</td>
    <td><input type="checkbox" value="Add to cart" name="item3"></td>
  </tr>

   <tr class="productitm">
    <!-- http://www.inkydeals.com/deal/ginormous-bundle/ -->
    <td><img src="http://www.watchtime.com/cms/wp-content/uploads/2013/12/Excalibur-Quatuor-Silicium.jpg" 
    alt="watch" height="150" width="190" class="thumb"></td>
    <td><input type="number" value="1" min="0" max="99" class="qtyinput"></td>
    <td id="item4">Rolex Sky-Dweller Champagne <br>
    Arabic Dial Diamond Watch<br>
    This watch is in like new<br>
    condition. It's been polished,<br>
    serviced and has no visible blemishes.<br>   
    </td>
    <td id="price4">$129.00</td>
    <td><input type="checkbox" value="Add to cart" name="item4"></td>
  </tr>
  
   <!-- Review -->
  <tr class="checkoutrow">
    <td colspan="5"> 
      <button type="submit" name ="review" id="submit">Review My Order</button>
    </td>
  </tr>
  <!-- checkout btn -->
  <tr class="checkoutrow">
    <td colspan="5" class="checkout"><button type="submit" name="checkout" id="submitbtn">Checkout Now!</button></td>
  </tr>


  </tbody>
  </table>
  </form>              
</body>
</html>
