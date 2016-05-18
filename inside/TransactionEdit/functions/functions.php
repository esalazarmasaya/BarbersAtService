<?php
	$data_relation = "transactionedit";
	
	
	
	$_SESSION['data_relation'] = $data_relation;
	
	fnTraerServicios();
	fnTraerProductos();
	
	if (isset($_SESSION['trans_header_to_edit']) && !empty($_SESSION['trans_header_to_edit'])){
		if (isset($_POST['sbmt_add_new_product'])){
			$query = "CALL `sp_TransactionDetail_Insert`(";
			
			$query = $query . $_SESSION['trans_header_to_edit'] . ", ";
			
			if (isset($_POST['txt_units']) && !empty($_POST['txt_units'])){
				$query = $query . "" . $_POST['txt_units'] . ", ";
			} else {
				$query = $query . "0, ";
			}
			
			if (isset($_POST['chkbx_courtesy']) && $_POST['chkbx_courtesy'] == 1){
				$query = $query . "1, ";
			} else {
				$query = $query . "0, ";
			}
			
			if (isset($_POST['slct_product']) && !empty($_POST['slct_product'])){
				$query = $query . "" . $_POST['slct_product'] . ", ";
			} else {
				$query = $query . "1, ";
			}
			
			$query = $query . "1";
			
			$query = $query . ");";
			//$_SESSION['msg'] = $_SESSION['msg'] . $query;
			
			fn_InsertQuery(Conexion(), $query);
			
			$_SESSION['msg'] = $_SESSION['msg'] . "Producto agregado exitosamente. ";
		
		}
		
		if (isset($_POST['sbmt_add_new_service'])){
			$query = "CALL `sp_TransactionDetail_Insert`(";
			
			$query = $query . $_SESSION['trans_header_to_edit'] . ", ";
			
			if (isset($_POST['txt_units']) && !empty($_POST['txt_units'])){
				$query = $query . "" . $_POST['txt_units'] . ", ";
			} else {
				$query = $query . "0, ";
			}
			
			if (isset($_POST['chkbx_courtesy']) && $_POST['chkbx_courtesy'] == 1){
				$query = $query . "1, ";
			} else {
				$query = $query . "0, ";
			}
			
			
			$query = $query . "1,";
			
			if (isset($_POST['slct_services']) && !empty($_POST['slct_services'])){
				$query = $query . "" . $_POST['slct_services'] . " ";
			} else {
				$query = $query . "1 ";
			}
			
			
			$query = $query . ");";
			//$_SESSION['msg'] = $_SESSION['msg'] . $query;
			//echo $query;
			
			fn_InsertQuery(Conexion(), $query);
			
			$_SESSION['msg'] = $_SESSION['msg'] . "Servicio agregado exitosamente. ";
		
		}
		
	}
	
	fnTraerTransactionDetail();
	
	if (isset($_SESSION['trans_header_to_edit']) && !empty($_SESSION['trans_header_to_edit'])){
		$_SESSION['msg'] = $_SESSION['msg'] . "La transacción a editar es la numero: " . $_SESSION['trans_header_to_edit'] . ".";
			
		$query = "CALL `sp_transactionheader_admin_show_where_only_tranId`(" . $_SESSION['trans_header_to_edit'] . ");";
			
			
		$tabla = fnSelectAnyQuery(Conexion(), $query, 24);
		
		
		$tabla[1][0] = "Codigo de transaccion";
		$tabla[1][1] = "Fecha";
		$tabla[1][2] = "Codigo usuario";
		$tabla[1][3] = "Primer nombre";
		$tabla[1][4] = "Segundo nombre";
		$tabla[1][5] = "Primer apellido";
		$tabla[1][6] = "Segundo apellido";
		$tabla[1][7] = "Email";
		$tabla[1][8] = "Rol";
		$tabla[1][9] = "Codigo empleado";
		$tabla[1][10] = "Primer nombre";
		$tabla[1][11] = "Segundo nombre";
		$tabla[1][12] = "Primer apellido";
		$tabla[1][13] = "Segundo apellido";
		$tabla[1][14] = "Email";
		$tabla[1][15] = "Rol";
		$tabla[1][16] = "Ticket";
		$tabla[1][17] = "Codigo estado";
		$tabla[1][18] = "Estado";
		$tabla[1][19] = "Codigo de tienda";
		$tabla[1][20] = "Tienda";
		$tabla[1][21] = "Efectivo";
		$tabla[1][22] = "Tarjeta";
		$tabla[1][23] = "Total";
		
		$_SESSION["trans_header_table"] = $tabla;
		//echo $_SESSION['trans_header_to_edit'];
	} else {
		$_SESSION["msg"] = $_SESSION["msg"] . "No hay ningún numero de transacción seleccionado. ";
	};
	
	
	function fnDrawTransactionHeader(){
		$value = "";
		if (isset($_SESSION["trans_header_table"]) && !empty($_SESSION["trans_header_table"])){
			$tabla = $_SESSION["trans_header_table"];
			$value = '
				<form action="index.php" method="post" id="frm_edit_header">
					<input type="hidden" class="form-control" id="txt_tran_code" name="txt_tran_code" placeholder="TransactionCode" value="' . $_SESSION["trans_header_to_edit"] . '" readonly>
			';
					
			$value = $value . '
					<div class="form-group">
						<label for="exampleInputEmail1">Fecha:</label>
						<input type="text" class="form-control" id="txt_tran_date" name="txt_tran_date" placeholder="Fecha" value="' . $tabla[2][1] . '" readonly>
					</div>
			';
			
			$value = $value . '
					<div class="form-group">
						<label for="exampleInputEmail1">Cliente:</label>
						<input type="hidden" class="form-control" id="txt_id_user" name="txt_id_user" placeholder="Cliente" value="' . $tabla[2][2] . '" readonly>
						<input type="text" class="form-control" value="' . $tabla[2][3] . ' '  . $tabla[2][4] . ' '  . $tabla[2][5] . ' '  . $tabla[2][6] . ' ('  . $tabla[2][7] . ') ' .  '" readonly>
					</div>
			';
					
			$value = $value . '
					<div class="form-group">
						<label for="exampleInputEmail1">Usuario:</label>
						<input type="hidden" class="form-control" id="txt_id_employee" name="txt_id_employee" placeholder="Usuario" value="' . $tabla[2][9] . '" readonly>
						<input type="text" class="form-control" value="' . $tabla[2][10] . ' '  . $tabla[2][11] . ' '  . $tabla[2][12] . ' '  . $tabla[2][13] . ' ('  . $tabla[2][14] . ') ' .  '" readonly>
					</div>
			';
					
			$value = $value . '
					<div class="form-group">
						<label for="exampleInputEmail1">Ticket (si la transaccion proviene de uno):</label>
						<input type="text" class="form-control" id="txt_ticket" name="txt_ticket" placeholder="Ticket" value="' . $tabla[2][16] . '" readonly>
					</div>
			';
					
			$value = $value . '
					<div class="form-group">
						<label for="exampleInputEmail1">Estado:</label>
						<input type="hidden" class="form-control" id="txt_id_state" name="txt_id_state" placeholder="Estado" value="' . $tabla[2][17] . '" readonly>
						<input type="text" class="form-control" value="' . $tabla[2][18] .'" readonly>
					</div>
			';
					
			$value = $value . '
						<input type="hidden" class="form-control" id="txt_id_cellar" name="txt_id_cellar" placeholder="Tienda" value="' . $tabla[2][19] . '" readonly>
			';
			
			$value = $value . '
					<div class="form-group">
						<label for="exampleInputEmail1">Efectivo:</label>
						<input type="text" class="form-control" value="' . $tabla[2][21] .'" readonly>
					</div>
			';
			
			$value = $value . '
					<div class="form-group">
						<label for="exampleInputEmail1">Tarjeta:</label>
						<input type="text" class="form-control" value="' . $tabla[2][22] .'" readonly>
					</div>
			';
			
			$value = $value . '
					<div class="form-group">
						<label for="exampleInputEmail1">Total:</label>
						<input type="text" class="form-control" value="' . $tabla[2][23] .'" readonly>
					</div>
			';
			
			$value = $value . '
				</form>
			';
		}
		
		return $value;
	}
	
	
	
	
	if (isset($_POST['btn_add_new_item'])){
		
		$query = "CALL `sp_transactionheader_admin_show_where_only_tranId`(";
		
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
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function fnDrawServices(){
		$value = "";
		$tabla = $_SESSION['tbl_services'];
		
		$value = '
			<h5>Agregar servicio</h5>
			<form action="index.php" method="post" id="frm_add_service">
			<input type="hidden" class="form-control" id="txt_tran_code" name="txt_tran_code" placeholder="TransactionCode" value="' . $_SESSION["trans_header_to_edit"] . '" readonly>
		';
		
		$value = $value . '<select name="slct_services">';
		
		for ($fila = 3; $fila <= $tabla[0][0]; $fila++){
			$value = $value . '<option value="' . $tabla[$fila][0] . '">' . $tabla[$fila][1] . '</option>';
		}
		
		$value = $value . '</select> 
			<input type="number" class="form-control" id="txt_units" name="txt_units" placeholder="Unidades" value="0">
			Cortesia: <input type="checkbox" name="chkbx_courtesy" value="1">
			<button type="submit" class="btn btn-default" name="sbmt_add_new_service" form="frm_add_service">Insert</button>
		';
		
		$value = $value . '</form>';
		
		echo $value;
	}
	
	
	function fnTraerServicios(){
		$query = "CALL `sp_service_show`();";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 4);
		
		$tabla[1][0] = "Codigo";
		$tabla[1][1] = "Nombre";
		$tabla[1][2] = "Precio";
		$tabla[1][3] = "Estado";
		
		//$_SESSION['html'] =  fnCrearTablaHtmlDeTablaBrand($tabla, 1);
		//$data_relation = $_SESSION['data_relation'];
		$_SESSION['tbl_services'] = $tabla;
		//$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function fnDrawProducts(){
		$value = "";
		$tabla = $_SESSION['tbl_products'];
		
		$value = '
			<h5>Agregar producto</h5>
			<form action="index.php" method="post" id="frm_add_product">
			<input type="hidden" class="form-control" id="txt_tran_code" name="txt_tran_code" placeholder="TransactionCode" value="' . $_SESSION["trans_header_to_edit"] . '" readonly>
		';
		
		$value = $value . '<select name="slct_product">';
		
		for ($fila = 3; $fila <= $tabla[0][0]; $fila++){
			$value = $value . '<option value="' . $tabla[$fila][0] . '">' . $tabla[$fila][1] . ' - Q' . $tabla[$fila][7] . '</option>';
		}
		
		$value = $value . '</select> 
			<input type="number" class="form-control" id="txt_units" name="txt_units" placeholder="Unidades" value="0">
			Cortesia: <input type="checkbox" name="chkbx_courtesy" value="1">
			<button type="submit" class="btn btn-default" name="sbmt_add_new_product" form="frm_add_product">Insert</button>
		';
		
		$value = $value . '</form>';
		
		echo $value;
	}
	
	
	function fnTraerProductos(){
		$query = "CALL `sp_product_show`();";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 10);
		
		$tabla[1][0] = "Codigo";
		$tabla[1][1] = "Nombre";
		$tabla[1][2] = "Descripción";
		$tabla[1][3] = "Presentación";
		$tabla[1][4] = "Código de barras";
		$tabla[1][5] = "Precio de costo";
		$tabla[1][6] = "Estado";
		$tabla[1][7] = "Precio de venta";
		$tabla[1][8] = "Tipo";
		$tabla[1][9] = "Marca";
		
		//$_SESSION['html'] =  fnCrearTablaHtmlDeTablaBrand($tabla, 1);
		//$data_relation = $_SESSION['data_relation'];
		$_SESSION["tbl_products"] = $tabla;
		//$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
	}
	
	
	
	
	
	
	function fnDrawTranDetail(){
		$value = "";
		$tabla = $_SESSION['tbl_tranDet'];
		
		$value = '
			<h5>Detalle de Transacción</h5>
			<table>
		';
		
		for ($fila = 1; $fila <= $tabla[0][0]; $fila++){
			$value = $value . '<tr>
				<input type="hidden" class="form-control" id="txt_tran_code" name="txt_tran_code" placeholder="TransactionCode" value="' . $_SESSION["trans_header_to_edit"] . '" readonly>
				<input type="hidden" class="form-control" id="txt_tran_detail_line" name="txt_tran_detail_line" placeholder="Linea de Transaccion" value="' . $tabla[$fila][0] . '" readonly>';
			$value = $value . '<td><input type="text" class="form-control" id="txt_tran_detail_line" name="txt_tran_detail_line" placeholder="Linea de Transaccion" value="' . $tabla[$fila][6] . '" readonly></td>';
			$value = $value . '<td><input type="text" class="form-control" id="txt_tran_detail_line" name="txt_tran_detail_line" placeholder="Linea de Transaccion" value="' . $tabla[$fila][4] . '" readonly></td>';
			
			if ($tabla[$fila][2] == 0){
				$value = $value . '<td><input type="text" class="form-control" id="txt_tran_detail_line" name="txt_tran_detail_line" placeholder="Linea de Transaccion" value="No" readonly></td>';	
			}else{
				$value = $value . '<td><input type="text" class="form-control" id="txt_tran_detail_line" name="txt_tran_detail_line" placeholder="Linea de Transaccion" value="Si" readonly></td>';
			}
			$value = $value . '<td><input type="text" class="form-control" id="txt_tran_detail_line" name="txt_tran_detail_line" placeholder="Linea de Transaccion" value="' . $tabla[$fila][1] . '" readonly></td>';
			$value = $value . '<td><input type="text" class="form-control" id="txt_tran_detail_line" name="txt_tran_detail_line" placeholder="Linea de Transaccion" value="' . $tabla[$fila][7] . '" readonly></td>';
			$value = $value . '<td><input type="text" class="form-control" id="txt_tran_detail_line" name="txt_tran_detail_line" placeholder="Linea de Transaccion" value="' . $tabla[$fila][8] . '" readonly></td>';
			$value = $value . '</tr>';
		}
		
		$value = $value . '</table>';
		
		echo $value;
	}
	
	
	
	function fnTraerTransactionDetail(){
		$query = "CALL `sp_TransactionDetail_show`(" . $_SESSION["trans_header_to_edit"]  . ");";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 9);
		
		$tabla[1][0] = "Codigo";
		$tabla[1][1] = "Unidades";
		$tabla[1][2] = "Cortesia";
		$tabla[1][3] = "Codigo de Producto";
		$tabla[1][4] = "Producto";
		$tabla[1][5] = "Codigo de Servicio";
		$tabla[1][6] = "Servicio";
		$tabla[1][7] = "Precio de venta";
		$tabla[1][8] = "Total";
		
		//$_SESSION['html'] =  fnCrearTablaHtmlDeTablaBrand($tabla, 1);
		//$data_relation = $_SESSION['data_relation'];
		$_SESSION["tbl_tranDet"] = $tabla;
		//$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
	}
	
	
?>