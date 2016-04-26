<?php
	$data_relation = "serviceadd";
	
	$_SESSION['data_relation'] = $data_relation;
	
	
	
	
	if (isset($_POST['btn_add_new_item'])){
		$query = "CALL `sp_service_add`(";
		
		if (isset($_POST['txt_new_name']) && !empty($_POST['txt_new_name'])){
			$query = $query . "'" . $_POST['txt_new_name'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_new_price']) && !empty($_POST['txt_new_price'])){
			$query = $query . "" . $_POST['txt_new_price'] . "";
		} else {
			$query = $query . "NULL ";
		}
				
		$query = $query . ");";
		
		
		//$_SESSION['msg'] = $_SESSION['msg'] . $query;
		//echo $query;
		
		fn_InsertQuery(Conexion(), $query);
		
		$_SESSION['msg'] = $_SESSION['msg'] . "Información agregada. ";
		
		
	}
	
	function fnTraerDatosEmpleado(){
		$query = "CALL `sp_employee_get_info_from_user_by_id`();";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 4);
		
		$tabla[1][0] = "Code";
		$tabla[1][1] = "Tienda";
		$tabla[1][2] = "Email";
		$tabla[1][3] = "Primer Nombre";
		$tabla[1][4] = "Segundo Nombre";
		$tabla[1][5] = "Primer Apellido";
		$tabla[1][6] = "Segundo Apellido";
		
		//$_SESSION['html'] =  fnCrearTablaHtmlDeTablaBrand($tabla, 1);
		//$data_relation = $_SESSION['data_relation'];
		//$_SESSION["page_table"] = $tabla;
		//$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
		return $tabla;
	}
	
	function fnTraerDatos(){
		$query = "CALL `sp_service_show`();";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 4);
		
		$tabla[1][0] = "Codigo";
		$tabla[1][1] = "Nombre";
		$tabla[1][2] = "Precio";
		$tabla[1][3] = "Estado";
		
		//$_SESSION['html'] =  fnCrearTablaHtmlDeTablaBrand($tabla, 1);
		//$data_relation = $_SESSION['data_relation'];
		//$_SESSION["page_table"] = $tabla;
		//$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
		return $tabla;
	}
	
?>