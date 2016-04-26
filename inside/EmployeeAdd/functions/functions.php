<?php
	$data_relation = "employeeadd";
	
	$_SESSION['data_relation'] = $data_relation;
	
	
	
	
	if (isset($_POST['btn_add_new_item'])){
		$query = "CALL `sp_employees_add`(";
		
		if (isset($_POST['slct_user_code']) && !empty($_POST['slct_user_code'])){
			$query = $query . "" . $_POST['slct_user_code'] . ", ";
		} else {
			$query = $query . "NULL, ";
		}
		
		if (isset($_POST['txt_new_initial_lunchtime']) && !empty($_POST['txt_new_initial_lunchtime'])){
			$query = $query . "'" . $_POST['txt_new_initial_lunchtime'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_new_final_lunchtime']) && !empty($_POST['txt_new_final_lunchtime'])){
			$query = $query . "'" . $_POST['txt_new_final_lunchtime'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_new_initial_date']) && !empty($_POST['txt_new_initial_date'])){
			$query = $query . "'" . $_POST['txt_new_initial_date'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['slct_cellar_code']) && !empty($_POST['slct_cellar_code'])){
			$query = $query . "" . $_POST['slct_cellar_code'] . " ";
		} else {
			$query = $query . "NULL ";
		}
		
				
		$query = $query . ");";
		
		
		//$_SESSION['msg'] = $_SESSION['msg'] . $query;
		//echo $query;
		
		fn_InsertQuery(Conexion(), $query);
		
		$_SESSION['msg'] = $_SESSION['msg'] . "Información agregada. ";
		
		
	}
	
	function fnTraerDatosUsuario(){
		$query = "CALL `sp_user_get_id`();";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 6);
		
		$tabla[1][0] = "Codigo";
		$tabla[1][1] = "Email";
		$tabla[1][2] = "Primer Nombre";
		$tabla[1][3] = "Segundo Nombre";
		$tabla[1][4] = "Primer Apellido";
		$tabla[1][5] = "Segundo Apellido";
		
		//$_SESSION['html'] =  fnCrearTablaHtmlDeTablaBrand($tabla, 1);
		//$data_relation = $_SESSION['data_relation'];
		$_SESSION["page_table"] = $tabla;
		//$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
		return fnCrearOpcionesHtmlDeDatosUsuario();
	}
	
	function fnCrearOpcionesHtmlDeDatosUsuario(){
		
		$tabla = $_SESSION["page_table"];
		
		$opciones = "";
		for($fila = 2; $fila <= $tabla[0][0] ; $fila++){
			$opciones = $opciones . '<option value="' . $tabla[$fila][0] . '">' . $tabla[$fila][1] . " - " . $tabla[$fila][2] . " " . $tabla[$fila][3] . " " . $tabla[$fila][4] . " " . $tabla[$fila][5] . '</option>';
		}
		
		return $opciones;
	}
	
	
	function fnTraerDatosBodega(){
		$query = "CALL `sp_cellar_show`();";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 6);
		
		$tabla[1][0] = "Codigo";
		$tabla[1][1] = "Nombre";
		$tabla[1][2] = "Descripcion";
		$tabla[1][3] = "Largo";
		$tabla[1][4] = "Ancho";
		$tabla[1][5] = "Shopping";
		
		//$_SESSION['html'] =  fnCrearTablaHtmlDeTablaBrand($tabla, 1);
		//$data_relation = $_SESSION['data_relation'];
		$_SESSION["page_table"] = $tabla;
		//$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
		return fnCrearOpcionesHtmlDeDatosBodega();
	}
	
	function fnCrearOpcionesHtmlDeDatosBodega(){
		
		$tabla = $_SESSION["page_table"];
		
		$opciones = "";
		for($fila = 2; $fila <= $tabla[0][0] ; $fila++){
			$opciones = $opciones . '<option value="' . $tabla[$fila][0] . '">' . $tabla[$fila][1] . '</option>';
		}
		
		return $opciones;
	}
?>