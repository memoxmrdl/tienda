<? //echo getcwd(); die(); ?>
<div class="navbar navbar-inverse navbar-fixed-top">
<div class="navbar-inner">
<div class="container-fluid">
  <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="brand" href="index.php">Tienda interactiva</a>
  <div class="nav-collapse collapse">
    <p class="navbar-text pull-right">      
      <?php if(!isset($_SESSION['usuario_id'])) { ?>
        <a href="/tienda/login.php">Iniciar sesión</a>
      <? } else { ?>
        <? echo "Bienvenido: ".$_SESSION['nombre']; ?>
        | <a href="/tienda/logout.php">Cerrar sesión</a>
      <? } ?>
    </p>
    <ul class="nav">
      <li class="active"><a href="./index.php">Inicio</a></li>
      <li><a href="./servicios.php">Servicios</a></li>
      <li><a href="./contacto.php">Contacto</a></li>
    </ul>
  </div>
</div>
</div>
</div>