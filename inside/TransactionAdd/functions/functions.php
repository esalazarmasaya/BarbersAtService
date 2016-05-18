<?php
	$data_relation = "transactionadd";
	
	$_SESSION['data_relation'] = $data_relation;
	
	
	
	
	if (isset($_POST['btn_add_new_item'])){
		
		$query = "CALL `sp_transactionheader_add`(";
		
		if (isset($_POST['slct_user']) && !empty($_POST['slct_user'])){
			$query = $query . "" . $_POST['slct_user'] . ", ";
		} else {
			$query = $query . ", ";
		}
		
		$tablaEmpleado = fnTraerCodigoUsusario();
		$query = $query . "" . $tablaEmpleado[2][0] . ", ";
		
		$query = $query . "NULL , ";
		
		$tablaCellar = fnTraerCodigoDeBodega($tablaEmpleado[2][0]);
		$query = $query . "" . $tablaCellar[2][0] . " ";
		
				
		$query = $query . ");";
		
		
		//$_SESSION['msg'] = $_SESSION['msg'] . $query;
		//echo $query;
		
		//$tabla = fn_InsertQuery(Conexion(), $query);
		fn_InsertQuery(Conexion(), $query);
		
		$_SESSION['msg'] = $_SESSION['msg'] . "Ingresada Correctamente. ";
		
		
		
		
		$query = "CALL `sp_transactionheader_get_tranId_where_idUser_and_idEmployee`(";
		$query = $query . "" . $tablaEmpleado[2][0] . ", ";
		$query = $query . "" . $_POST['slct_user'] . " ";
		$query = $query . ");";
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 1);
		
		$_SESSION['trans_header_to_edit'] = $tabla[2][0];
		header("Location: ../TransactionEdit/index.php ",TRUE,301);
	
	}
	
	function fnTraerDatosUsuarios(){
		$query = "CALL `sp_user_show_all`();";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 11);
		
		
		$tabla[1][0] = "Codigo";
		$tabla[1][1] = "Primer nombre";
		$tabla[1][2] = "Segundo Nombre";
		$tabla[1][3] = "Primer Apellido";
		$tabla[1][4] = "Segundo Apellido";
		$tabla[1][5] = "Fecha de nacimiento";
		$tabla[1][6] = "Telefono";
		$tabla[1][7] = "Mmail";
		$tabla[1][8] = "Fecha de creacion";
		$tabla[1][9] = "Estado";
		$tabla[1][10] = "Rol";
		
		//$_SESSION['html'] =  fnCrearTablaHtmlDeTablaBrand($tabla, 1);
		//$data_relation = $_SESSION['data_relation'];
		//$_SESSION["page_table"] = $tabla;
		//$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
		return $tabla;
	}
	
	function fnTraerDatosEmpleados(){
		$query = "CALL `sp_employee_get_info_from_user_by_id`();";
		
		
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
	
	function fnTraerCodigoDeBodega($idUsuario){
		$query = "CALL `sp_employee_get_cellar_from_id`(" . $idUsuario . ");";
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 1);
		
		$tabla[1][0] = "Codigo";
		
		//echo $tabla[2][0];
		
		//$_SESSION['html'] =  fnCrearTablaHtmlDeTablaBrand($tabla, 1);
		//$data_relation = $_SESSION['data_relation'];
		//$_SESSION["page_table"] = $tabla;
		//$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
		return $tabla;
	}
	
	
	
	
	
	
?>