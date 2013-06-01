<?php
require_once "utilities.php";

$usuario = $_POST["usuario"];
$password = $_POST["password"];

$r = array();
if(!empty($usuario)) {
if(!empty($password)) {
  $ms = new mysql();
  $SQL = "SELECT * FROM usuarios WHERE usuario = '".$usuario."' AND password = '".$password."'";
  $r = $ms->query($SQL);

  if(count($r) >= 1) {
  if($r[0]["usuario"] == $usuario) {
      if($r[0]["password"] == $password) {
          $_SESSION["usuario_id"] = $r[0]["usuario_id"];
          $_SESSION["nombre"] = $r[0]["nombre"]." ".$r[0]['apellidos'];
          $_SESSION["correo"] = $r[0]["correo"];
          $_SESSION["privilegio"] = $r[0]["privilegio"];
          if($r[0]['privilegio'] == 'A') {
            header("location: ../admin/index.php?");
          } else {
            header("location: ../index.php#");
          }
          $r["session"] = true;
      } else { set_notice("Sesion erronea!!!", 2); header("location: ../login.php"); }
  } else { set_notice("Sesion erronea!!!", 2); header("location: ../login.php"); }
} else { set_notice("Sesion erronea!!!", 2); header("location: ../login.php"); }
} else { set_notice("Sesion erronea!!!", 2); header("location: ../login.php"); }
} else { set_notice("Sesion erronea!!!", 2); header("location: ../login.php"); }

//else { set_notice("Sesion erronea!!!", 2); header("location: ../login.php"); }