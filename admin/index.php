<?php 
require "../controller/utilities.php"; 
include "../controller/status_session.php";

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>:: Crowd Interactive ::</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ChatWorld">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        }
    </style>
    <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
</head>

<body>
<?php require "../navbar.php"; ?>

<div class="container">
  <div class="span4">
  <h3 align="left">Nuevo producto</h3>
   <?php 
      notice();
   ?>
  <form action="../controller/registrar_producto.php" method="post">
    <input type="text" name="nombre" id="password" placeholder="Nombre" class="input-xlarge" required>
    <textarea rows="7" style="width:270px" name="descripcion" placeholder="Descripcion"></textarea>
    <input type="text" name="almacen" id="almacen" placeholder="No de articulos" class="span3" required>
    <select name="tipo_cantidades_id">
    <?
      $ms = new mysql();
      $row = $ms->query("SELECT * FROM productos_tipos_cantidades");

      foreach($row as $i => $v) {
        echo "<option value=\"".$row[$i]['tipo_cantidades_id']."\">".$row[$i]['nombre']."</option>";
      }
    ?>
    </select>
    <div class="input-prepend input-append">
      <span class="add-on">$</span>
      <input class="span2" id="precio" name="precio" type="text">
    </div>
    <div class="input-append">
      <input class="span3" id="url" name="url" type="text">
      <button class="btn" type="button">image</button>
    </div>
    <button type="submit" id="submit_registro" class="btn btn-primary">Registrar</button>
  </form>
  </div>
  <div class="span7">
    <h3>Listado de productos</h3>
    <table class="table table-hover">
    <thead>
      <tr>
        <th></th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Almacen</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $ms = new mysql();
      
      $SQL = "SELECT A.producto_id, A.nombre, A.precio, A.almacen, A.url, B.nombre AS tipo ";
      $SQL .= "FROM productos A ";
      $SQL .= "INNER JOIN productos_tipos_cantidades B ";
      $SQL .= "ON A.tipo_cantidades_id = B.tipo_cantidades_id";

      $row = $ms->query($SQL);
    
      foreach ($row as $key => $value) {
        $img = empty($row[$key]['url']) ? "assets/no_product_img.jpg" : $row[$key]['url'];
        echo "<tr>
            <td><img src=\"".$img."\" width=\"128\" height=\"128\"></td>
            <td>".$row[$key]['nombre']."</td>
            <td>$".$row[$key]['precio']."</td>
            <td>".$row[$key]['almacen']." ".$row[$key]['tipo']."</td>
            <td><a href=\"modificar.php?id=".$row[$key]['producto_id']."\" class=\"btn btn-info\">Editar</a></td>
            <td><a href=\"eliminar.php?id=".$row[$key]['producto_id']."\" onclick=\"return confirm('¿Desea elminar este producto?')\" class=\"btn btn-danger\">Editar</a></td></tr>";
      }
    ?>
    </tbody>
    </table>
  </div>
</div>

<script src="../bootstrap/js/jquery-1.9.1.js" type="text/javascript"></script>
<script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
<script src="../bootstrap/js/boot.js" type="text/javascript"></script>

</body>
</html>
