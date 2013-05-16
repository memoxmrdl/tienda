<?php
session_start();
require_once "mysql.php";
require_once "utilities.php";

$rq = @$_POST;


$usuario = $_POST["usuario"];
$r = "";

$ms = new mysql();

$SQL = "INSERT INTO usuarios (usuario_id, usuario, password, nombre, apellidos, email, privilegio) VALUES ";
$SQL .= "(null, '".$rq["usuario"]."', '".$rq["password"]."', ";
$SQL .= "'".$rq["nombre"]."', '".$rq["apellidos"]."', '".$rq["email"]."', 'U')";

$ms->Begin();
$ms->query($SQL);

if($ms->error) {
    set_notice("Ya existe usuario o hubo problemas al registrar", 2);
    $ms->Rollback();
} else {
    set_notice("Ahora puede loggearse!!! :)", 3);
    $ms->Commit();
}

header("location: ../login.php");