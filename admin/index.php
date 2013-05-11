<?php require "../controller/utilities.php" ?>
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
  <div class="span3">
        <h3 align="left">Nuevo producto</h3>
         <?php 
            notice();
         ?>
        <form action="../controller/registrar_producto.php" method="post">
          <input type="text" name="nombre" id="password" placeholder="Nombre" class="input-xlarge" required>
          <textarea rows="7" style="width:270px" name="description" placeholder="Descripcion"></textarea>
          <div class="input-append">
            <input class="span2" id="url" name="url" type="text">
            <button class="btn" type="button">image</button>
          </div>
          <div class="input-prepend input-append">
            <span class="add-on">$</span>
            <input class="span2" id="precio" name="precio" type="text">
          </div>
          <input type="text" name="almacen" id="almacen" placeholder="No de articulos" class="input-medium" required>
          <button type="submit" id="submit_registro" class="btn btn-primary">Registrar</button>
        </form>
  </div>
  <div class="span8">
    <h3>Productos</h3>
    <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Almacen</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php 
        $ms = new mysql();
        $row = $ms->query("SELECT * FROM productos");

        foreach ($row as $i => $v) {
          echo "<td>1</td>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td><a href=\"#\" class=\"btn btn-info\">Editar</a></td>
              <td><a href=\"#\" class=\"btn btn-danger\">Editar</a></td>";
        }


        ?>
      </tr>
    </tbody>
    </table>
  </div>
</div>

<script src="../bootstrap/js/jquery-1.9.1.js" type="text/javascript"></script>
<script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
<script src="../bootstrap/js/boot.js" type="text/javascript"></script>

</body>
</html>
