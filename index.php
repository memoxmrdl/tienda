<?php
require "controller/utilities.php";
require "controller/mysql.php";
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
  <div class="span2">
    sdfsd
  </div>
  <div class="span9">
    <ul class="thumbnails media-grid">
        <?php
        $ms = new mysql();
        $row = $ms->query("SELECT * FROM productos ff");

        foreach ($row as $key => $value) {
          $img = empty($row[$key]['url']) ? "assets/no_product_img.jpg" : $row[$key]['url'];
        ?>
        <li class="span3">
        <div class="thumbnail">
          <img src="<? echo $img ?>" width="128" height="128" class="thumbnail">
            <div class="caption">
            <h3><? echo $row[$key]['nombre'] ?></h3>
            <p><? echo $row[$key]['descripcion'] ?></p>
            <p><h4 style="color: red">$<?= $row[$key]['precio'] ?> MXN</h4><p>
            <p><a href="#" class="btn btn-primary">Agregar</a></p>
            </div>
        </div>
        </li>
        <?php } ?>
    </ul>
  </div>
</div>

<script src="bootstrap/js/jquery-1.9.1.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
<script src="bootstrap/js/boot.js" type="text/javascript"></script>

</body>
</html>
