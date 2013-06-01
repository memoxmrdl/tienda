<?php
session_start();
require_once "utilities.php";

$rq = @$_POST;
$ms = new mysql();

$SQL = "UPDATE productos SET ";
$SQL .= "tipo_cantidades_id = ".$rq['tipo_cantidades_id'].",";
$SQL .= "nombre = '".$rq['nombre']."',";
$SQL .= "descripcion = '".$rq['descripcion']."',";
$SQL .= "precio = ".$rq['precio'].",";
$SQL .= "url = '".$rq['url']."',";
$SQL .= "almacen = ".$rq['almacen']." ";
$SQL .= "WHERE producto_id = ".$rq['id'];

$ms->Begin();
$ms->query($SQL);

if(!$ms->error) {
    set_notice("Surgio problemas al actualizar", 2);
    $ms->Rollback();
} else {
    set_notice("Producto actualizado", 3);
    $ms->Commit();
}

header("location: ../admin/index.php");