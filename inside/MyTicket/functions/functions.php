<?php
	$data_relation = "ticketadd";
	
	$_SESSION['data_relation'] = $data_relation;
	
	
	
	
	if (isset($_POST['btn_add_new_item'])){
		$query = "CALL `sp_testColas_insert`(";
		
		if (isset($_POST['slct_service']) && !empty($_POST['slct_service'])){
			$query = $query . "" . $_POST['slct_service'] . ", ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_SESSION['usermail']) && !empty($_SESSION['usermail'])){
			$idusuario = fnTraerCodigoUsusario();
			$query = $query . "" . $idusuario[2][0] . ", ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['slct_employee']) && !empty($_POST['slct_employee'])){
			$query = $query . "" . $_POST['slct_employee'] . "";
		} else {
			$query = $query . "NULL ";
		}
				
		$query = $query . ");";
		
		
		//$_SESSION['msg'] = $_SESSION['msg'] . $query;
		//echo $query;
		
		fn_InsertQuery(Conexion(), $query);
		
		$_SESSION['msg'] = $_SESSION['msg'] . "Información agregada. ";
		
		
	}
	
	function fnTraerDatosServicios(){
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
	
	function fnTraerDatosInicioTicket(){
		$usercode = fnTraerCodigoUsusario();
		$query = "CALL `sp_ServiceTimeByBarber_get_my_ticket`(" . $usercode[2][0] . ");";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 11);
		
		$tabla[1][0] = "Codigo";
		$tabla[1][1] = "Fecha";
		$tabla[1][2] = "Estado";
		$tabla[1][3] = "Hora inicial";
		$tabla[1][4] = "Hora final";
		$tabla[1][5] = "Servicio";
		$tabla[1][6] = "Usuario";
		$tabla[1][7] = "Empleado";
		$tabla[1][8] = "Hora inicio";
		$tabla[1][9] = "Minuto inicio";
		$tabla[1][10] = "Segundo inicio";
		
		//$_SESSION['html'] =  fnCrearTablaHtmlDeTablaBrand($tabla, 1);
		//$data_relation = $_SESSION['data_relation'];
		//$_SESSION["page_table"] = $tabla;
		//$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
		return $tabla;
	}
	
	function fnTraerCodigoUsusario(){
		$query = "CALL `sp_user_get_id_where_email`('" . $_SESSION['usermail'] . "');";
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 6);
		
		$tabla[1][0] = "Codigo";
		$tabla[1][1] = "Email";
		$tabla[1][2] = "Primer Nombre";
		$tabla[1][3] = "Segundo Nombre";
		$tabla[1][4] = "Primer Apellido";
		$tabla[1][5] = "Segundo Apellido";
		
		//$_SESSION['html'] =  fnCrearTablaHtmlDeTablaBrand($tabla, 1);
		//$data_relation = $_SESSION['data_relation'];
		//$_SESSION["page_table"] = $tabla;
		//$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
		return $tabla;
	}
	
	
	
	
?>