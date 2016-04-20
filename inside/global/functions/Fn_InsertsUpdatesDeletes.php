<?php
	function fn_InsertQuery($conn, $query){
		$connection = $conn;
		if (!$connection) {
			$msg = $msg .  "No se pudo conectar a la base de datos.";
		}
		$result = mysql_query($query) or die(mysql_error());
		mysql_close($connection);
		$msg = "Ingresado exitosamente.";
		return $msg;
		//echo $msg;
	}
	
	function fn_UpdateQuery($conn, $query){
		$connection = $conn;
		if (!$connection) {
			$msg = $msg . "No se pudo conectar a la base de datos.";
		}
		$result = mysql_query($query) or die(mysql_error());
		mysql_close($connection);
		$msg = $msg . "Actualizado exitosamente.";
		return null;
	}
	
	function fn_DeleteQuery($conn, $query){
		$connection = $conn;
		if (!$connection) {
			$msg = $msg .  "No se pudo conectar a la base de datos.";
		}
		$result = mysql_query($query) or die(mysql_error());
		mysql_close($connection);
		$msg = $msg . "Eliminado exitosamente.";
		return null;
	}
	
	function fnSelectAnyQuery($conn, $query, $numDeColumnas){
		$connection = $conn;
		if (!$connection) {
			$msg = $msg .  "No se pudo conectar a la base de datos.";
		}
		
		$result = mysql_query($query) or die("Error: " . mysql_error());
		$arry = array();
		$filas = 1;
		
		while($row = mysql_fetch_array($result)) {
			array_push($arry,$row);
			$filas = $filas + 1;
			$tabla[$filas] = $row;
		}
		mysql_close($connection);
		//Cantidad de filas
		$tabla[0][0] = $filas;
		//Cantidad de columnas
		$tabla[0][1] = $numDeColumnas;
		
		//for($filas = 1; $filas <= $Empresas[0][0] ; $filas++){
		//	for($col = 1; $col <= $Empresas[0][1]; $col++){
		//		echo $tabla[$filas][$col];
		//	}
		//}
		$msg = "Realizado exitosamente.";
		return $tabla;
	}
	
	function fn_AnyQuery($conn, $query){
		$connection = $conn;
		if (!$connection) {
			$msg = $msg . "No se pudo conectar a la base de datos.";
		}
		$result = mysql_query($query) or die(mysql_error());
		mysql_close($connection);
		$msg = $msg . "Realizado exitosamente. ";
		$result = mysql_fetch_row($result);
		return null;
	}
?>