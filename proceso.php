<?php
require "controller/utilities.php";
#require 'controller/status_session.php';

  if(!isset($_SESSION['usuario_id'])) header("Location: ./logout.php");


?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>:: Crowd Interactive ::</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ChatWorld">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        }
    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
</head>

<body>
<div class="container">
  <div class="span1">
  </div>
  <?php $cart = new cart(); ?>
  <div class="span9">
    <?php if($cart->size($_SESSION['cart']) != 0) { ?>
    <?php notice(); ?>
    <p><h2 style="margin:0; padding:0;">Tienda Interactive</h2>
      Av. Insurgentes #1000<br>
      RFC: TINT9023902MHJK3<br>
      Tel: 313999000
    </p>
    <hr>
    <h3 style="float: right; color:red">No. <?php echo strtoupper(gen(5)); ?></h3>
    <h2 style='font-size: 1.3em;'>Nombre: <?php echo $_SESSION["nombre"]; ?></h2>
    <br>
    <?php $cart->cart_show($_SESSION['cart'], false, true); ?>
    <a href="#" onclick="window.print()" class="btn btn-success" style="float: right">Imprimir</a>
    <a href="index.php" style="font-size: 1.5em">Regresar</a>
    <?php } else { ?>
     <h2>No tiene productos en su canasta</h2>
     <a href="index.php" style="font-size: 1.5em">Regresar</a>
    <?php } ?>
  </div>
</div>

<script src="bootstrap/js/jquery-1.9.1.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
<script src="bootstrap/js/boot.js" type="text/javascript"></script>

</body>
</html>
