<?php

 $rq = @$_GET;
 header("Location: ../controller/eliminar_producto.php?id=".$rq['id']);

?>