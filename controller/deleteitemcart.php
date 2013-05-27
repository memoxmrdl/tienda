<?php
 require "utilities.php";

 is_sesion("../index.php");

 $cart = new cart();

 $item_id = $_GET['id'];

 if(count($cart->get_product($item_id)) >= 1) {
 	$cart->cart_delete_item($item_id);
 	set_notice("Eliminado de la canasta", 3);
 	header('Location: ../estatus.php?');
 } else {
 	set_notice("No existe producto", 2);
 	header('Location: ../estatus.php?');
 }

?>