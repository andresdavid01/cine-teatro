<?php
ini_set('display_errors', 'off');
include_once("resources/class.database.php");

class teatro{
	var $id_teatro;
	var $nombre_teatro;
	var $id_zona_teatro;

function teatro(){
}

function select($id_teatro){
	$sql =  "SELECT * FROM administrador.tbl_teatro WHERE id_teatro = '$id_teatro'";
	try {
		$row = pg::query($sql);
		$row=pg_fetch_array($row);
		$this->id_teatro = $row['id_teatro'];
		$this->nombre_teatro = $row['nombre_teatro'];
		$this->id_zona_teatro = $row['id_zona_teatro'];
		return true;
	}
	catch (DependencyException $e) {
	}
}

function delete($id_teatro){
	$sql = "DELETE FROM administrador.tbl_teatro WHERE id_teatro = '$id_teatro'";
	try {
		pg::query("begin");
		$row = pg::query($sql);
		pg::query("commit");
		return "1";
	}
	catch (DependencyException $e) {
		pg::query("rollback");
		return "-1";
	}
}

function insert(){
	//echo "me llamo";
	if ($this->validaP($this->id_teatro) == false){
		$sql = "INSERT INTO administrador.tbl_teatro( id_teatro, nombre_teatro, id_zona_teatro) VALUES ( '$this->id_teatro', '$this->nombre_teatro','$this->id_zona_teatro')";
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
	else{
		$sql="UPDATE administrador.tbl_teatro set nombre_teatro='" . $this->nombre_teatro . "',id_zona_teatro='" . $this->id_zona_teatro . "' WHERE id_teatro='" . $this->id_teatro . "'";
		pg::query("begin");
		$row = pg::query($sql);
		pg::query("commit");		
		echo "2";
	}
}

function validaP ($id_teatro){
      $sql =  "SELECT * FROM administrador.tbl_teatro WHERE id_teatro = '$id_teatro'";
      try {
		$row = pg::query($sql);
		if(pg_num_rows($row) == 0){
		        return false;
	        }
		else{
			return true;
		 }
		}
		catch (DependencyException $e) {
			//pg::query("rollback");
			return false;
		}
}

function getTabla(){
	
	$sql="SELECT * FROM administrador.tbl_teatro";
	try {
		echo "<div class='container' style='margin-top: 10px'>";
		echo "<table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered' id='example'>";
		echo "<thead>";
		echo "<tr>";
		echo "	<th>Codigo</th>";
		echo "	<th>Nombre_teatro</th>";
		echo "	<th>zona_teatro</th>";
		echo "	<th>.</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		$result = pg::query($sql);
		while ($row= pg_fetch_array($result)){
			echo "<tr class='gradeA'>";
			echo "	<th>" . $row['id_teatro'] . "</th>";
			echo "	<th>" . $row['nombre_teatro'] . "</th>";
			echo "	<th>" . $row['id_zona_teatro'] . "</th>";
			echo "	<th><a href='#' class='btn btn-danger' onclick='elimina(\"" . $row['id_teatro'] . "\")'>X<i class='icon-white icon-trash'></i></a>.<a href='#' class='btn btn-primary' onclick='edit(\"" . $row['id_teatro'] . "\", \"" . $row['nombre_teatro'] ."\", \"" . $row['id_zona_teatro'] . "\")'>E<i class='icon-white icon-refresh'></i></a></th>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
	}
	catch (DependencyException $e) {
		echo "Procedimiento sql invalido en el servidor";
	}
}

function getTablaInicianPorA(){
	
	$sql="select * from administrador.tbl_teatro where id_teatro like 'A%'";
	try {
		echo "<div class='container' style='margin-top: 10px'>";
		echo "<table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered' id='example'>";
		echo "<thead>";
		echo "<tr>";
		echo "	<th>Codigo</th>";
		echo "	<th>Nombre_teatro</th>";
		echo "	<th>Zona_teatro</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		$result = pg::query($sql);
		while ($row= pg_fetch_array($result)){
			echo "<tr class='gradeA'>";
			echo "	<th>" . $row['id_teatro'] . "</th>";
			echo "	<th>" . $row['nombre_teatro'] . "</th>";
			echo "	<th>" . $row['id_zona_teatro'] . "</th>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
	}
	catch (DependencyException $e) {
		echo "Procedimiento sql invalido en el servidor";
	}
}
/*
function getTablaPDF(){
	
	$sql="select * from administrador.tbl_teatro";	
	$tabla="";
	try {
		$tabla="<table>";
		$tabla=$tabla . "<tr>";
		$tabla=$tabla . "	<td>Codigo</td>";
		$tabla=$tabla . "	<td>Nombre</td>";
		$tabla=$tabla . "	<td>Zona_teatro</td>";

		$tabla=$tabla . "</tr>";

		$result = pg::query($sql);
		while ($row= pg_fetch_array($result)){
			$tabla=$tabla . "<tr>";
			$tabla=$tabla . "	<td>" . $row['id_teatro'] . "</td>";
			$tabla=$tabla . "	<td>" . $row['nombre_teatro'] . "</td>";
			$tabla=$tabla . "	<td>" . $row['id_zona_teatro'] . "</td>";
			$tabla=$tabla . "</tr>";
		}
		$tabla=$tabla . "</table>";
	}
	catch (DependencyException $e) {
		echo "Procedimiento sql invalido en el servidor";
	}
	return $tabla;
}*/
/*function lista_zona_teatro(){ 
    $sql="SELECT * FROM administrador.tbl_zona_teatro "; 
    echo"<select id_zona_teatro='id_zona_teatro'>"; 
    try{ 
        $result = pg::query($sql); 
        while ($row= pg_fetch_array($result)){ 
            echo"<option value=".$row['id_zona_teatro'].">".$row['id_zona_teatro']."</option>\n"; 
        } 
        echo"</select>";             
    } 
 
    catch (DependencyException $e) { 
        echo "Error al cargar el combobox"; 
    } 
} */
function getLista(){
	
	$sql="SELECT * FROM administrador.tbl_teatro";
	try {
		echo "<SELECT id_teatro='id_teatro'>";
		$result = pg::query($sql);
		while ($row= pg_fetch_array($result)){
			echo "<OPTION value='".$row['id_teatro']."'> ".$row['nombre_teatro']." ".$row['id_zona_teatro']."</OPTION>";
		}
		echo "</SELECT>";
	}
	catch (DependencyException $e) {
		pg::query("rollback");
	}
}

function getAutocomplete(){
	$res="";
	$sql="SELECT * FROM administrador.tbl_teatro";
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

function lista_zona_teatro(){
	$sql="SELECT * FROM administrador.tbl_zona_teatro";
	
	$result = pg::query($sql); 
            if (!$result) { 
                echo "Problema con la consulta " . $query . "<br/>"; 
                echo pg_last_error(); 
                exit(); 
            } 
           $lista_zona_teatro = null;

            while($myrow = pg_fetch_assoc($result)) { 
                $lista_zona_teatro .= "<option value=\"".$myrow['id_zona_teatro']."\">".$myrow['nombre_zona_teatro']."</option>"; 
            }	
            echo $lista_zona_teatro;			
}
}
?>
