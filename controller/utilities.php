<?php
session_start();

function notice() {
	$message = @$_SESSION["notice"];
	$type = @$_SESSION["type_notice"];

	switch ($type) {

		case 1:
			echo "<div class=\"alert alert-block\">
		  		<h4>Warning!</h4>
		  			".$message."
				</div>";
			break;

		case 2:
			echo "<div class=\"alert alert-error\">
		  			".$message."
				</div>";
			break;

	    case 3:
			echo "<div class=\"alert alert-success\">
		  			".$message."
				</div>";
			
			break;
	}


	$_SESSION["notice"] = "";
	$_SESSION["type_notice"] = 0;
}

function set_notice($message, $type) {
	$_SESSION["notice"] = $message; 
	$_SESSION["type_notice"] = $type;
}