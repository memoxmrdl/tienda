<?php require "controller/utilities.php" ?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>:: Crowd Interactive :: Login</title>
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
<div class="span4">
  <h3 align="left">Iniciar sesion</h3>
   <?php 
      notice();
   ?>
  <form action="controller/login.php" method="post">
    <input class="input-medium" name="usuario" id="usuario" type="text" placeholder="Usuario" required>
    <input type="password" name="password" id="password" placeholder="Contraseña" class="input-medium" required>
    <div align="left">
      <button type="submit" id="submit_registro" class="btn btn-primary">Iniciar</button>
    </div>
  </form>

  <h3 align="left">Regístrate para comprar</h3>
   <?php 
      notice();
   ?>
  <form action="controller/registrar_usuario.php" method="post">
    <div class="input-prepend">
      <div align="left"><span class="add-on">@</span>
        <input class="3" name="usuario" id="usuario" type="text" placeholder="Usuario" required>
      </div>
    </div>
    <input type="password" name="password" id="password" placeholder="Contraseña" class="input-xlarge" required>
    <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="input-xlarge" required>
    <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" class="input-xlarge" required>
    <div align="left">
      <input type="text" name="email" id="email" placeholder="Correo electronico" class="input-xlarge" required>
      <button type="submit" id="submit_registro" class="btn btn-primary">Registrarme</button>
    </div>
  </form>
</div>

<div class="span7">
  <img src="abarrotes.jpg"width="567" height="509" align="right">
</div>

</div>

<script src="bootstrap/js/jquery-1.9.1.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
<script src="bootstrap/js/boot.js" type="text/javascript"></script>

</body>
</html>
