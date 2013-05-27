<?php
require "controller/utilities.php";
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
<?php require "navbar.php"; ?>

<div class="container">
  <div class="span3">
    <?php notice(); ?>
    <!-- <img src="assets/cart.png" width="128" height="128"> -->
    <?php $cart = new cart(); ?>
    <h3><a href="estatus.php">Mi canasta(<?= $cart->size($_SESSION['cart']); ?>)</a></h3>
    <p></p>
    <?php $cart->cart_show($_SESSION['cart']); ?>
  </div>
  <div class="span8">
    <table class="table table-hover">
    <thead>
      <tr>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $ms = new mysql();
      
      $SQL = "SELECT A.producto_id, A.nombre, A.precio, A.descripcion, A.url, B.nombre AS tipo ";
      $SQL .= "FROM productos A ";
      $SQL .= "INNER JOIN productos_tipos_cantidades B ";
      $SQL .= "ON A.tipo_cantidades_id = B.tipo_cantidades_id";

      $row = $ms->query($SQL);
    
      foreach ($row as $key => $value) {
        $img = empty($row[$key]['url']) ? "assets/no_product_img.jpg" : $row[$key]['url'];
      ?>  
      <tr>
        <td style="width:120px">
          <img src="<? echo $img ?>" width="128px" height="128px">
        </td>
        <td>
          <div class="row-fluid">
            <div class="span10"> 
              <h4><? echo $row[$key]['nombre'] ?></h4>
              <p><? echo $row[$key]['descripcion'] ?>
            </div>
            <div class="span2">
              <h4>$<? echo $row[$key]['precio'] ?> MXN</h4>
              <a href="controller/additemtocart.php?producto_id=<?php echo $row[$key]['producto_id']; ?>" class="btn btn-info">Agregar</a>
            </div>
          </div>
        </td>
      </tr>
    <?php } ?>
    </tbody>
    </table>
  </div>
</div>

<script src="bootstrap/js/jquery-1.9.1.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
<script src="bootstrap/js/boot.js" type="text/javascript"></script>

</body>
</html>
