<?php
	ini_set('display_errors', 'on');
	session_start();
	include_once("../models/class.teatro.php");
	$obj = new teatro();
	if (isset($_POST['id_teatro'])){
		echo $obj->delete($_POST['id_teatro']);
	}
	else{
		echo "-2";
	}
?>
