<?php
	ini_set('display_errors', 'on');
	session_start();
	include_once("../models/class.teatro.php");
	$obj = new teatro();
	if (isset($_POST['id_teatro']) && isset($_POST['nombre_teatro'])&& isset($_POST['id_zona_teatro'])){
		$obj->id_teatro=$_POST['id_teatro'];
		$obj->nombre_teatro=$_POST['nombre_teatro'];
		$obj->id_zona_teatro=$_POST['id_zona_teatro'];
		echo $obj->insert();
	}
	else{
		echo "-1";
	}
?>
