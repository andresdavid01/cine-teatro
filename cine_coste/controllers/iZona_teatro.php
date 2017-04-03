<?php
	ini_set('display_errors', 'on');
	session_start();
	include_once("../models/class.zona_teatro.php");
	$obj = new zona_teatro();
	if (isset($_POST['id_zona_teatro']) && isset($_POST['nombre_zona_teatro']) && isset($_POST['descripcion_zona_teatro'])){
		$obj->id_zona_teatro=$_POST['id_zona_teatro'];
		$obj->nombre_zona_teatro=$_POST['nombre_zona_teatro'];
		$obj->descripcion_zona_teatro=$_POST['descripcion_zona_teatro'];
		echo $obj->insert();
	}
	else{
		echo "-1";
	}
?>
