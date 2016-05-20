<?php
	$data_relation = "PaymentAdd";
	
	$_SESSION['data_relation'] = $data_relation;
	
	
	
	
	if (isset($_POST['btn_add_new_item'])){
		
		
			$query = "CALL `sp_Payment_add`(";
		
			if (isset($_POST['txt_payment']) && !empty($_POST['txt_payment'])){
				$query = $query . "" . $_POST['txt_payment'] . ", ";
			} else {
				$query = $query . ", ";
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
			
			
			$_SESSION['msg'] = $_SESSION['msg'] . "Pago ingresado exitosamente. ";
		
		
		
		
		
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
	
	function fnTraerDatosEmpleados(){
		$query = "CALL `sp_employee_active_get_info_from_user_by_id`();";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 7);
		
		$tabla[1][0] = "Codigo";
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
	
	function fnTraerCodigoUsusario(){
		$query = "CALL `sp_user_get_id_where_email`('" . $_SESSION['usermail'] . "');";
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 6);
		
		$tabla[1][0] = "Codigo";
		$tabla[1][1] = "Email";
		$tabla[1][2] = "Primer Nombre";
		$tabla[1][3] = "Segundo Nombre";
		$tabla[1][4] = "Primer Apellido";
		$tabla[1][5] = "Segundo Apellido";
		
		//echo $tabla[2][0];
		
		//$_SESSION['html'] =  fnCrearTablaHtmlDeTablaBrand($tabla, 1);
		//$data_relation = $_SESSION['data_relation'];
		//$_SESSION["page_table"] = $tabla;
		//$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
		return $tabla;
	}
	
	function fnVerificarCuantosTicketsPendientesHayParaElCliente(){
		$tabla = fnTraerCodigoUsusario();
		$query = "CALL `sp_waitingqueuebybarber_my_actual_tickets`('" . $tabla[2][0] . "');";
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 1);
		
		$tabla[1][0] = "Cantidad de tickets pendientes";
		
		//echo $tabla[2][0];
		
		//$_SESSION['html'] =  fnCrearTablaHtmlDeTablaBrand($tabla, 1);
		//$data_relation = $_SESSION['data_relation'];
		//$_SESSION["page_table"] = $tabla;
		//$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
		return $tabla;
	}
	
	
	
	
	
	
?>