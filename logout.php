<?php
	
	session_start();
	session_unset();
	//session_destroy();
	//unset($_SESSION['usuario_id']);
	header("Location: index.php");

?>