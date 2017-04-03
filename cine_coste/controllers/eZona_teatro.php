<?php
	ini_set('display_errors', 'on');
	session_start();
	include_once("../models/class.zona_teatro.php");
	$obj = new actividad();
	if (isset($_POST['id_zona_teatro'])){
		echo $obj->delete($_POST['id_zona_teatro']);
	}
	else{
		echo "-2";
	}
?>
