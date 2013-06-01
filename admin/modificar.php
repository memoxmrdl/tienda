<?php 
require "../controller/utilities.php"; 
require "../controller/status_session.php";
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
  <h3 align="left">Editar producto</h3>
   <?php 
      notice();

      $ms = new mysql();
      $id = $_GET["id"];

      $SQL = "SELECT A.producto_id, A.nombre, A.precio, A.almacen, A.url, A.tipo_cantidades_id, B.nombre AS tipo ";
      $SQL .= "FROM productos A ";
      $SQL .= "INNER JOIN productos_tipos_cantidades B ";
      $SQL .= "ON A.tipo_cantidades_id = B.tipo_cantidades_id ";
      $SQL .= "WHERE A.producto_id = ".$id."";

      $row = $ms->query($SQL);
   ?>
  <form action="../controller/actualizar_producto.php" method="post">
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="text" name="nombre" placeholder="Nombre" class="input-xlarge" value="<? echo $row[0]['nombre'] ?>" required>
    <textarea rows="7" style="width:270px" name="descripcion" placeholder="Descripcion"><? echo $row[0]['nombre'] ?></textarea>
    <input type="text" name="almacen" placeholder="No de articulos" class="span3" value="<? echo $row[0]['almacen'] ?>" required>
    <select name="tipo_cantidades_id">
    <?
      $ms = new mysql();
      $row1 = $ms->query("SELECT * FROM productos_tipos_cantidades");

      foreach($row1 as $i => $v) {
        $required = $row1[$i]['tipo_cantidades_id'] == $row[0]['tipo_cantidades_id'] ? "selected" : "";
        echo "<option value=\"".$row[$i]['tipo_cantidades_id']."\" ".$required.">".$row1[$i]['nombre']."</option>";
      }
    ?>
    </select>
    <div class="input-prepend input-append">
      <span class="add-on">$</span>
      <input class="span2" id="precio" name="precio" type="text" value="<? echo $row[0]['precio'] ?>">
    </div>
    <div class="input-append">
      <input class="span3" id="url" name="url" type="text" value="<? echo $row[0]['url'] ?>">
      <button class="btn" type="button">image</button>
    </div>
    <button type="submit" id="submit_registro" class="btn btn-primary">Modificar</button>
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
            <td><a href=\"eliminar.php?id=".$row[$key]['producto_id']."\" class=\"btn btn-danger\">Editar</a></td></tr>";
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
