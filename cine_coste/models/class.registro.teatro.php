<?php
ini_set('display_errors', 'off');
include_once("resources/class.database.php");

class registro_teatro{
	var $fecha;
  	var $id_teatro;

function registro_teatro(){
}

function insert(){
	$sql = "INSERT INTO administrador.tbl_registro_teatro( fecha, id_teatro) VALUES ( '$this->fecha', '$this->id_teatro')";
	try {
		pg::query("begin");
		$row = pg::query($sql);
		pg::query("commit");
		echo "1";
	}
	catch (DependencyException $e) {
		echo "Error: " . $e;
		pg::query("rollback");
		echo "-1";
	}
}

function getLista(){

	$sql="SELECT * FROM administrador.tbl_registro_teatro";
	try {
		echo "<SELECT id_teatro='id_teatro'>";
		$result = pg::query($sql);
		while ($row= pg_fetch_array($result)){
			echo "<OPTION value='".$row['id_teatro']."'> ".$row['nombre_teatro'].",".$row['id_zona_teatro']." </OPTION>";
		}
		echo "</SELECT>";
	}
	catch (DependencyException $e) {
		pg::query("rollback");
	}
}

function getAutocomplete(){
	$res="";
	$sql="SELECT * FROM administrador.tbl_registro_teatro";
	try {
		$result = pg::query($sql);
		while ($row= pg_fetch_array($result)){
			$res .= '"' . $row['id_teatro'] . ', ' . $row['nombre_teatro'] . ', ' . $row['id_zona_teatro'] . '"';
			$res .= ',';
		}
		$res = substr ($res, 0, -2);
		$res = substr ($res, 1);
	}
	catch (DependencyException $e) {
	}
	return $res;
}
}
?>
