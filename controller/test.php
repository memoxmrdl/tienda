<?php
	require "mysql.php";


	$ms = new mysql();

	$SQL = "SELECT * FROM usuarios";
	$result = $ms->query($SQL);

	echo json_encode($result);
