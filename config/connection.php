<?php
	function Conexion(){
		#Database Connection Here...
		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpassword = '';
		$dbdatabase = 'barbers_at_service';
		
		try {
		    /*$dbc = mysqli_connect($host, $user, $password, $database, $port, $socket);*/
			$connection = @mysql_connect($dbhost, $dbuser, $dbpassword) or die(mysql_error());
		} catch (Exception $e) {
		    echo 'Error: No se pudo realizar la conexion. Motivo: ',  $e->getMessage(), ". ";
		}
		
		if (!$connection) {
			$msg = "Error: No se pudo realizar la conexion. ";
			echo $msg;
		}
		mysql_select_db($dbdatabase, $connection);
		return $connection;
	}
?>