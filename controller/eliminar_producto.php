<?php
session_start();
require_once "utilities.php";

$rq = @$_GET;
$ms = new mysql();

$SQL = "DELETE FROM productos WHERE producto_id = ".$rq['id'];

$ms->Begin();
$ms->query($SQL);

if(!$ms->error) {
    set_notice("Surgio problemas al eliminar", 2);
    $ms->Rollback();
} else {
    set_notice("Producto eliminado", 3);
    $ms->Commit();
}

header("location: ../admin/index.php");