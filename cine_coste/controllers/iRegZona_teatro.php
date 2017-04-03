<?php
	ini_set('display_errors', 'on');
	session_start();
	include_once("../models/class.registro.zona_teatro.php");
	$obj = new registro_actividad();
	if (isset($_POST['fec']) && isset($_POST['act'])){
		$obj->fecha=$_POST['fec'];
		$obj->id_zona_teatro=$_POST['act'];
		echo $obj->insert();
	}
	else{
		echo "-1";
	}
?>
