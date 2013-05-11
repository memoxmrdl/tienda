<?php
    session_start();
    require_once "../mysql.php";
    require_once "../utilities.php";

    $rq = @$_POST;

    $r = "";

        $ms = new mysql();

            $SQL = "INSERT INTO productos (producto_id,nombre,descripcion,precio,url,almacen) VALUES ";
            $SQL .= "(null, '".$rq["nombre"]."', '".$rq["descripcion"]."', ";
            $SQL .= "'".$rq["precio"]."', '".$rq["url"]."', '".$rq["almacen"]."')";

            $ms->query($SQL);

            if($ms->error()) {
                set_notice("Ya existe un producto o hubo problemas al registrar", 2);
                $ms->Rollback();
            } else {
                set_notice("Producto registrado", 3);
                $ms->Commit();
            }

    header("location: ../admin/index.php");