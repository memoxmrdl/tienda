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


class Cart {
  function setitem($i, $v) {
      $_SESSION['items'][$i] = $v;
  } 

  function getitem($i) {
      return $_SESSION['items'][$i];
  }

  function all() {
      return $_SESSION['items'];
  }

  function size() {
      return count($_SESSION['items']);
  }

  function add_item($artnr, $num) {
      $this->setitem($artnr, $this->size()+1);
  }

  function remove_item($artnr, $num) {
      if ($this->getitem($artnr) > $num) {
          $this->setitem($artnr, $this->size()-1);
          return true;
      } elseif ($this->getitem($artnr) == $num) {
          unset($this->getitem($artnr));
          return true;
      } else {
          return false;
      }
  }
}