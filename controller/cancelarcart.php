<?php
 require "utilities.php";

 is_sesion("../index.php");

 unset($_SESSION['cart']);
 redirecto("../estatus.php")

?>