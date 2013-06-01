<?php
	#require 'utilities.php';

	if(!isset($_SESSION['usuario_id'])) header("Location: ./logout.php");
	if($_SESSION['privilegio'] == 'U') header("Location: ./logout.php");	
?>