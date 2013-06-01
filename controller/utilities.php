<?php
session_start();

require "mysql.php";

function notice() {
	$message = @$_SESSION["notice"];
	$type = @$_SESSION["type_notice"];

	switch ($type) {

		case 1:
			echo "<div class=\"alert alert-block\">
		  		<h4>Warning!</h4>
		  			".$message."
				</div>";
			break;

		case 2:
			echo "<div class=\"alert alert-error\">
		  			".$message."
				</div>";
			break;

	    case 3:
			echo "<div class=\"alert alert-success\">
		  			".$message."
				</div>";
			
			break;
	}


	$_SESSION["notice"] = "";
	$_SESSION["type_notice"] = 0;
}

function set_notice($message, $type) {
	$_SESSION["notice"] = $message; 
	$_SESSION["type_notice"] = $type;
}

function gen($num)  
{  
   $letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
   return substr(str_shuffle($letters), 0, $num);
} 

function is_sesion($str) {
  if(!isset($_SESSION["usuario_id"])) {
    set_notice("Porfavor inicie sesion para comprar",2);
    redirecto($str);
  }
}

function redirecto($str) {
  echo "<script>window.location.href='".$str."'</script>";
  die();
}

class cart { 

/** 
* The expiry time for the cart cookie 
*/ 
var $expire = 3600; 


var $del_cookie = -1; 

/** 
* Class constructor 
* 
* Start the session, if the cart doesn't exist as a session variable, check for a cookie, 
* if the cookie isn't there, make a new cart. 
*/ 
function cart() { 
// Start the session. 
//session_start(); 

$time = time(); 
$this->expire = $time + $this->expire; 

// If the session variables haven't been registered yet, do that now. 
if(!isset($_SESSION['cart'])) 
    { 
    
    if(isset($_COOKIE['cart'])) 
        { 
        $_SESSION['cart'] = array(); 
        $_SESSION['cart'] = unserialize(stripslashes($_COOKIE['cart'])); 
        $_SESSION['total_items'] = $this->cart_calculate_items($_SESSION['cart']); 
        $_SESSION['total_price'] = $this->cart_calculate_price($_SESSION['cart']); 
        } 
    else 
        { 
        $_SESSION['cart'] = array(); 
        $_SESSION['total_items'] = 0; 
        $_SESSION['total_price'] = 0.00; 
        
        $s_cart = serialize($_SESSION['cart']); 
        @setcookie('cart', $s_cart, $this->expire); 
        } 
    } 


} 



/** 
* Displays the cart 
* 
* @param array $cart The cart you want to display. 
* @param boolean $pictures Show pictures in cart? (default=false) 
* @param boolean $editable Is cart editable? (default=true) 
*/ 
function cart_show($cart, $edit = false, $total = false) 
{ 
 
  $ms = new mysql();
	
  echo "<table class=\"table table-hover\"><tr><td>Producto</td><td>Cantidad</td><td>Precio</td>"; 
	if($edit) { echo "<td>Importe</td><td></td>"; }
  echo "</tr>";

foreach($cart as $productID => $qty) 
    { 
    $product = $this->get_product($productID); 
    echo "<tr>\n"; 
    echo "<td>".$product[0]['nombre']."</td><td>".$qty."</td><td>$".$product[0]['precio']."</td>\n";
    if($edit) {
      echo "<td>$".($product[0]['precio']*$qty)."</td>";
      echo "<td><a href=\"controller/deleteitemcart.php?id=".$productID."\" onclick=\"return confirm('¿Desea elminar este producto?')\" class=\"btn btn-alert\">Eliminar</a></td>";
    } 
    echo "</tr>\n"; 
    } 

    if($total) {
      echo "<tr>
        <td></td>
        <td></td>
        <td><h4>TOTAL:</h4></td>
        <td><h3>$".$this->cart_calculate_price($cart)."</h3></td>
        <td></td>
      </tr>";
    }
echo '</table>'; 
} 



/** 
* Adds an item to the cart. 
* 
* If the item is already in the cart, it increments the quantity by one. 
* Otherwise, it adds one of the selected item to the cart. It then recalculates 
* the number of items in the cart and the total cost. 
* 
* @param string $item The productID to be added. 
*/ 
function add_item($item) 
{ 
// If cart item exists, increment it by one... 
if(isset($_SESSION['cart'][$item])) 
    { 
    $_SESSION['cart'][$item]++; 
    
    } 
    
// ...otherwise add it as a new item. 
else 
    { 
    $_SESSION['cart'][$item] = 1; 
    } 

// Recalculate totals 
$_SESSION['total_items'] = $this->cart_calculate_items($_SESSION['cart']); 
$_SESSION['total_price'] = $this->cart_calculate_price($_SESSION['cart']); 
$s_cart = serialize($_SESSION['cart']); 
setcookie('cart', $s_cart, $this->expire); 
}

  function cart_calculate_items($cart) 
    { 
    // Initialise variable to default value 
    $items = 0; 
    
    // Make sure the cart is actully an array! 
    if(is_array($cart)) 
        { 
        // Loop through the cart and add the quanity of each item the the total 
        foreach($_SESSION['cart'] as $productID => $qty) 
            { 
            $items += $qty; 
            } 
        } 
    // Return the total number of items 
    return $items; 
    }  



/** 
* Removes a product from the cart. 
* 
* Removes a product totally from the cart by unsetting it's key and value 
* from the session array. 
*/ 
function cart_delete_item($productID) 
{ 
// Unset product variable 
unset($_SESSION['cart'][$productID]); 

// Recalculate totals 
$_SESSION['total_items'] = $this->cart_calculate_items($_SESSION['cart']); 
$_SESSION['total_price'] = $this->cart_calculate_price($_SESSION['cart']); 
$s_cart = serialize($_SESSION['cart']); 
setcookie('cart', $s_cart, $this->expire); 
} 


/** 
* Edits the number of each item in the cart 
* 
* If the number is set to zero, remove the item by unsetting the session variable. If 
* the number is anything else, set it the that number. 
* 
* @todo I'm not sure if this function needs any parameters passed to it to work 
* so if it doesn't, this could be why. 
*/ 
function cart_edit_item() 
{ 
// Make sure the variables are being POSTed 
if(isset($_POST['update'])) 
    { 
    foreach($_SESSION['cart'] as $productID => $qty) 
        { 
        if($_POST['$productID'] ==  0) 
            { 
            unset($_SESSION['cart'][$productID]); 
            } 
        else 
            { 
            $_SESSION['cart'][$productID] = $_POST['productID']; 
            } 
        } 
    } 
// Recalculate totals 
$_SESSION['total_items'] = $this->cart_calculate_items($_SESSION['cart']); 
$_SESSION['total_price'] = $this->cart_calculate_price($_SESSION['cart']); 
$s_cart = serialize($_SESSION['cart']); 
setcookie('cart', $s_cart, $this->expire); 
} 



/** 
* Calculates the number of items in the cart. 
* 
* Calculates the number of items in the cart by looping through the cart incrementing 
* the number of items for each product. 
* 
* @param array $cart The cart to count items in. 
* @return integer The number of items in the cart. 
*/ 
function size($cart) 
{ 
// Initialise variable to default value 
$items = 0; 

// Make sure the cart is actully an array! 
if(is_array($cart)) 
    { 
    // Loop through the cart and add the quanity of each item the the total 
    foreach($_SESSION['cart'] as $productID => $qty) 
        { 
        $items += $qty; 
        } 
    } 
// Return the total number of items 
return $items; 
} 



/** 
* Calculates the total price of the cart contents. 
* 
* This function is one of the slowest in this application 
* as it has a long database query to carry out and total up. 
* 
* @param array $cart The cart to total the price in. 
* @return float The total price of cart contents. 
*/ 
function cart_calculate_price($cart) 
{ 
// Initialise variable to default value 
$price = 0.00; 

// Make sure the cart is actully an array! 
if(is_array($cart)) 
    { 
    
    /** 
    * Require the database connection for finding prices. 
    */ 
    //require($_SERVER['DOCUMENT_ROOT'].'/path/to/database/connection_code.php'); 
    //mysql_select_db($database_connAT, $connAT); 
    $ms = new mysql();
    
    // Loop through the cart array matching prices to products 
    foreach($cart as $productID => $qty) 
        { 
        $query = "SELECT precio FROM productos WHERE 	producto_id = ".$productID; 
        //$result = mysql_query($query); 
        $result = $ms->query($query);
        
        // Then adding the (item price * quantity) to the total price 
        //  and starting the loop again 
        if($result) { 
            //$row_result = mysql_fetch_assoc($result); 
            $item_price = $result[0]['precio']; 
            $price += $item_price*$qty; 
        } 
        } 
    } 
// Return the total price 
return $price; 
} 


function get_product($productID) 
{ 
    $query = "SELECT * FROM productos WHERE producto_id = ".$productID; 
    $ms = new mysql();
    return $r[0] = $ms->query($query);
    //$result = mysql_query($query); 
    //$row_result = mysql_fetch_assoc($result); 
} 

}