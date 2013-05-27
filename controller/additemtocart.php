<?php
 require "utilities.php";

 is_sesion("../index.php");

 $cart = new cart();

 $item_id = $_GET['producto_id'];

 if(count($cart->get_product($item_id)) >= 1) {
 	$cart->add_item($item_id);
 	set_notice("Agregado a la canasta", 3);
 	header('Location: ../index.php?add');
 } else {
 	set_notice("No existe producto", 2);
 	header('Location: ../index.php?error');
 }

?>