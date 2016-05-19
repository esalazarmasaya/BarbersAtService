<?php
	$data_relation = "transacciones";
	
	if (!isset($_SESSION['data_relation']) || empty($_SESSION['data_relation'])){
		//echo "entro no. ";
		$_SESSION['page_display'] = 1;
		$_SESSION['rows_display_per_page'] = 10;
		fnTraerDatos(); 
	} else {
		//echo "entro. ";
		//echo $data_relation;
		//echo $_SESSION['data_relation'];
		if ($data_relation != $_SESSION['data_relation'] ){
			//echo "entro distinto. ";
			$_SESSION['page_display'] = 1;
			$_SESSION['rows_display_per_page'] = 10;
			fnTraerDatos(); 
		}
	}
	
	$_SESSION['data_relation'] = $data_relation;
	
	
	if (isset($_POST['btn_edit_data_of_table'])){
		/*$query = "CALL `sp_waitingqueuebybarber_update`(";
		
		if (isset($_POST['lbl_code']) && !empty($_POST['lbl_code'])){
			$query = $query . "" . $_POST['lbl_code'] . ", ";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_state_code']) && !empty($_POST['txt_state_code'])){
			$query = $query . "" . $_POST['txt_state_code'] . ", ";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_initial_hour']) && !empty($_POST['txt_initial_hour'])){
			$query = $query . "'" . $_POST['txt_initial_hour'] . "',";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_final_hour']) && !empty($_POST['txt_final_hour'])){
			$query = $query . "'" . $_POST['txt_final_hour'] . "',";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_service_code']) && !empty($_POST['txt_service_code'])){
			$query = $query . "" . $_POST['txt_service_code'] . ", ";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_employee_code']) && !empty($_POST['txt_employee_code'])){
			$query = $query . "" . $_POST['txt_employee_code'] . "";
		} else {
			$query = $query . "NULL";
		}
		
		
		
		$query = $query . ");";
		
		
		//$_SESSION['msg'] = $_SESSION['msg'] . $query;
		//echo $query;
		
		fn_InsertQuery(Conexion(), $query);
		
		$_SESSION['msg'] = $_SESSION['msg'] . "Información editada. ";
		
		fnTraerDatos(); */
		$_SESSION['trans_header_to_edit'] = $_POST['lbl_code_transaction'];
		header("Location: ../TransactionProve/index.php ",TRUE,301);
	}
	
	
	$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
	
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
	
	function fnTraerEstados(){
		$query = "CALL `sp_states_show`();";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 2);
		
		
		$tabla[1][0] = "Código de estado";
		$tabla[1][1] = "Nombre";
		
		//$_SESSION['html'] =  fnCrearTablaHtmlDeTablaBrand($tabla, 1);
		//$data_relation = $_SESSION['data_relation'];
		//$_SESSION["page_table"] = $tabla;
		//$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
		return $tabla;
	}
	
	function fnTraerServicios(){
		$query = "CALL `sp_service_show`();";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 4);
		
		
		$tabla[1][0] = "Código de servicio";
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
	
	
	function fnTraerDatos(){
		$query = "CALL `sp_transactionheader_admin_show_state_another_where`('%%', 2);";
		
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 24);
		
		
		$tabla[1][0] = "Código de transacción";
		$tabla[1][1] = "Fecha";
		$tabla[1][2] = "Código de cliente";
		$tabla[1][3] = "Primer nombre del cliente";
		$tabla[1][4] = "Segundo nombre del cliente";
		$tabla[1][5] = "Primer apellido del cliente";
		$tabla[1][6] = "Segundo apellido del cliente";
		$tabla[1][7] = "Email del cliente";
		$tabla[1][8] = "Rol del cliente";
		$tabla[1][9] = "Código de empleado";
		$tabla[1][10] = "Primer nombre de empleado";
		$tabla[1][11] = "Segundo nombre de empleado";
		$tabla[1][12] = "Primer apellido de empleado";
		$tabla[1][13] = "Segundo apellido de empleado";
		$tabla[1][14] = "Email de empleado";
		$tabla[1][15] = "Rol de empleado";
		$tabla[1][16] = "Codigo de ticket";
		$tabla[1][17] = "Código de estado de transaccion";
		$tabla[1][18] = "Nombre de estado";
		$tabla[1][19] = "Codigo de tienda";
		$tabla[1][20] = "Tienda";
		$tabla[1][21] = "Efectivo";
		$tabla[1][22] = "Tarjeta";
		$tabla[1][23] = "Total";
		
		
		
		//$_SESSION['html'] =  fnCrearTablaHtmlDeTablaBrand($tabla, 1);
		//$data_relation = $_SESSION['data_relation'];
		$_SESSION["page_table"] = $tabla;
		//$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
	}
	
	function fnTraerDatosWhere($where){
		$query = "CALL `sp_transactionheader_admin_show_another_where`('%" . $where . "%', 2);";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 24);
		
		$tabla[1][0] = "Código de transacción";
		$tabla[1][1] = "Fecha";
		$tabla[1][2] = "Código de cliente";
		$tabla[1][3] = "Primer nombre del cliente";
		$tabla[1][4] = "Segundo nombre del cliente";
		$tabla[1][5] = "Primer apellido del cliente";
		$tabla[1][6] = "Segundo apellido del cliente";
		$tabla[1][7] = "Email del cliente";
		$tabla[1][8] = "Rol del cliente";
		$tabla[1][9] = "Código de empleado";
		$tabla[1][10] = "Primer nombre de empleado";
		$tabla[1][11] = "Segundo nombre de empleado";
		$tabla[1][12] = "Primer apellido de empleado";
		$tabla[1][13] = "Segundo apellido de empleado";
		$tabla[1][14] = "Email de empleado";
		$tabla[1][15] = "Rol de empleado";
		$tabla[1][16] = "Codigo de ticket";
		$tabla[1][17] = "Código de estado de transaccion";
		$tabla[1][18] = "Nombre de estado";
		$tabla[1][19] = "Codigo de tienda";
		$tabla[1][20] = "Tienda";
		$tabla[1][21] = "Efectivo";
		$tabla[1][22] = "Tarjeta";
		$tabla[1][23] = "Total";
		
		//$_SESSION['html'] =  fnCrearTablaHtmlDeTablaBrand($tabla, 1);
		//$data_relation = $_SESSION['data_relation'];
		$_SESSION["page_table"] = $tabla;
		//$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
	}
	
	
	
	
	function fnCrearTablaHtmlDeTablaProduct(){
		$value ="";
		$data_relation = $_SESSION['data_relation'];
		
		
		if (isset($_POST['btn_edit_data_of_table'])){
			fnTraerDatos();
		}
		
		if (isset($_POST['btn_page_data_refresh'])){
			fnTraerDatos();
		}
		
		if (isset($_POST['btn_find_value_in_rows'])){
			if (isset($_POST['txt_find_value_in_rows']) && !empty($_POST['txt_find_value_in_rows'])){
				fnTraerDatosWhere($_POST['txt_find_value_in_rows']);
				$_SESSION['page_display'] = 1;
				$_SESSION['rows_display_per_page'] = 10;
			} else {
				$_SESSION['msg'] = $_SESSION['msg'] . "Ingrese un valor a buscar. ";
				//fnTraerDatos();
			}
		}
		
		$tabla = $_SESSION["page_table"];
		
		if (isset($_POST['btn_rows_per_page'])){
			$_SESSION['rows_display_per_page'] = $_POST['slct_rows_per_page'];
		}
		if (isset($_POST['btn_set_page_to_display'])){
			$_SESSION['page_display'] = $_POST['slct_set_page_to_display'];
		}
		if (isset($_POST['btn_page_block'])){
			$_SESSION['page_display'] = $_POST['btn_page_block'];
		}
		if (isset($_POST['btn_set_page_to_display'])){
			$_SESSION['page_display'] = $_POST['slct_set_page_to_display'];
		}
		if (isset($_POST['btn_page_block_anterior'])){
			$_SESSION['page_display'] = $_SESSION['page_display'] - 1;
		}
		if (isset($_POST['btn_page_block_siguiente'])){
			$_SESSION['page_display'] = $_SESSION['page_display'] + 1;
		}
		
		$page_display = $_SESSION['page_display'];
		$rows_display_per_page = $_SESSION['rows_display_per_page'];
		
		if ($tabla[0][0] >= 1){
			//echo "entro, ";
			if ($tabla[0][0] > $rows_display_per_page){
				//echo "entro, ";
				$amount_of_pages_to_display = round(($tabla[0][0] - 1) / $rows_display_per_page, 0, PHP_ROUND_HALF_DOWN);
				if ($amount_of_pages_to_display < ($tabla[0][0] - 1) / $rows_display_per_page){
					$amount_of_pages_to_display = $amount_of_pages_to_display + 1;
				}
			}else{
				$amount_of_pages_to_display = 1;
			}
		}else{
			$amount_of_pages_to_display = 1;
		}
		
		if ($page_display < 1){
			$_SESSION['page_display'] = 1;
			$page_display = 1;
		}
		
		if ($page_display > $amount_of_pages_to_display){
			$_SESSION['page_display'] = $amount_of_pages_to_display;
			$page_display = $amount_of_pages_to_display;
		}
		
		$final_row = $page_display * $rows_display_per_page + 1;
		$initial_row = $final_row - ($rows_display_per_page-1);
		
		if ($final_row > $tabla[0][0]){
			$final_row = $tabla[0][0];
		}
		
		
		
		//echo $initial_row . ", ";
		//echo $final_row . ", ";
		//echo $tabla[0][0] . ", ";
		//echo round($tabla[0][0] / $rows_display_per_page, 0, PHP_ROUND_HALF_DOWN) . ", ";
		//echo $tabla[0][0] / $rows_display_per_page . ", ";
		//echo $data_relation . ", ";
		//echo $page_display . ", ";
		//echo $rows_display_per_page . ", ";
		//echo $amount_of_pages_to_display . ", ";
		
		if (isset($_POST['btn_edit_display_row'])){
			$value = $value . fnCrearTablaHtmlDeTablaDeLaLineaAEditar($_POST['txt_edit_row']);
		}	
		
		
		
		
		
		
		$value = $value . '
			<div class="tab-pane active text-style" id="tab1">
				<div class="inbox-right">
		';
						
					$value = $value . '
						<div class="mailbox-content">
							<form action="index.php" method="post" id="frm_page_data_refresh">
								<table class="table">
									<tbody>
										<tr class="table-row">
											<td class="table-text">
												<button type="submit" class="btn btn-default" name="btn_page_data_refresh" form="frm_page_data_refresh" value = "Actualizar">Actualizar</button>
											</td>
											<td class="table-text">
												<input type="text" class="form-control" id="exampleInputEmail1" name="txt_find_value_in_rows" placeholder="Buscar..." form="frm_page_data_refresh">
											</td>
											<td class="table-text">
												<button type="submit" class="btn btn-default" name="btn_find_value_in_rows" form="frm_page_data_refresh">Buscar</button>
											</td>
											
										</tr>
									</tbody>
								</table>
							</form>
						</div>
									
						<div class="mailbox-content">
							<table class="table">
								<tbody>
									<tr class="table-row">
					';
							
									if ($page_display > 1){
										$value = $value . '
											<td class="table-text">
												<form action="index.php" method="post" id="frm_page_block_anterior">
													<button type="submit" class="btn btn-default" name="btn_page_block_anterior" form="frm_page_block_anterior" value = "Anterior">Anterior</button>
												</form>
											</td>
										';
									}
									
									/*for($page_block = 1; $page_block <= $amount_of_pages_to_display ; $page_block++){
										$value = $value . '
											<td class="table-text">
												<form action="index.php" method="post" id="frm_page_block_' . $page_block . '">';
													if ($_SESSION['page_display'] == $page_block){
														$value = $value . '<button type="submit" class="btn btn-default" name="btn_page_block" form="frm_page_block_' . $page_block . '" value = "' . $page_block . '"><b><u>' . $page_block . '</u></b></button>';
													}else{
														$value = $value . '<button type="submit" class="btn btn-default" name="btn_page_block" form="frm_page_block_' . $page_block . '" value = "' . $page_block . '">' . $page_block . '</button>';
													}
												$value = $value . '	
												</form>
											</td>';
									}*/
									
									for($page_block = $page_display - 2; $page_block <= $page_display + 2 ; $page_block++){
										if($page_block >= 1 && $page_block <= $amount_of_pages_to_display){
											$value = $value . '
												<td class="table-text">
													<form action="index.php" method="post" id="frm_page_block_' . $page_block . '">';
														if ($_SESSION['page_display'] == $page_block){
															$value = $value . '<button type="submit" class="btn btn-default" name="btn_page_block" form="frm_page_block_' . $page_block . '" value = "' . $page_block . '"><b><u>' . $page_block . '</u></b></button>';
														}else{
															$value = $value . '<button type="submit" class="btn btn-default" name="btn_page_block" form="frm_page_block_' . $page_block . '" value = "' . $page_block . '">' . $page_block . '</button>';
														}
											$value = $value . '	
													</form>
												</td>
											';
										}
									}
									
									
									
									if ($page_display < $amount_of_pages_to_display){
										$value = $value . '
											<td class="table-text">
												<form action="index.php" method="post" id="frm_page_block_siguiente">
													<button type="submit" class="btn btn-default" name="btn_page_block_siguiente" form="frm_page_block_siguiente" value = "Siguiente">Siguiente</button>
												</form>
											</td>
										';
									}
		
							
							
						$value = $value . '
							<td class="table-text">Lineas por página: </td>
							<td class="table-text">
								<form action="index.php" method="post" id="frm_rows_per_page">
									<select name="slct_rows_per_page">
						';
										for($page_block = 10; $page_block <= 100 ; $page_block = $page_block + 10){
											if ($_SESSION['rows_display_per_page'] == $page_block){
												$value = $value . '<option value="' . $page_block . '" selected>' . $page_block . '</option>';
											} else {
												$value = $value . '<option value="' . $page_block . '">' . $page_block . '</option>';
											}
										}
							$value = $value . '
									</select>
									<button type="submit" class="btn btn-default" name="btn_rows_per_page" form="frm_rows_per_page">Aceptar</button>
								</form>
							</td>
							
							<td class="table-text">Ir a página: </td>
							
							<td class="table-text">
								<form action="index.php" method="post" id="frm_set_page_to_display">
									<select name="slct_set_page_to_display">
							';
										for($page_block = 1; $page_block <= $amount_of_pages_to_display ; $page_block = $page_block + 1){
											if ($page_display == $page_block){
												$value = $value . '<option value="' . $page_block . '" selected>' . $page_block . '</option>';
											} else {
												$value = $value . '<option value="' . $page_block . '">' . $page_block . '</option>';
											}
										}
		$value = $value . '
									</select>
									<button type="submit" class="btn btn-default" name="btn_set_page_to_display" form="frm_set_page_to_display">Aceptar</button>
								</form>
							</td>
							
						</tr>
					</tbody>
				</table>		
			</div>
		';
		
		
		$colNameId[0] = "lbl_code_transaction";
		$colNameId[1] = "txt_date";
		$colNameId[2] = "txt_user_code";
		$colNameId[3] = "txt_user_first_name";
		$colNameId[4] = "txt_user_second_name";
		$colNameId[5] = "txt_user_first_last_name";
		$colNameId[6] = "txt_user_second_last_name";
		$colNameId[7] = "txt_user_email";
		$colNameId[8] = "txt_user_rol";
		$colNameId[9] = "txt_employee_code";
		$colNameId[10] = "txt_employee_first_name";
		$colNameId[11] = "txt_employee_second_name";
		$colNameId[12] = "txt_employee_first_last_name";
		$colNameId[13] = "txt_employee_second_last_name";
		$colNameId[14] = "txt_employee_email";
		$colNameId[15] = "txt_employee_rol";
		$colNameId[16] = "txt_Ticket";
		$colNameId[17] = "txt_state_code";
		$colNameId[18] = "txt_state_name";
		$colNameId[19] = "txt_cellar_code";
		$colNameId[20] = "txt_cellar_name";
		$colNameId[21] = "txt_cash";
		$colNameId[22] = "txt_credit_card";
		$colNameId[23] = "txt_Total";
		
		
		
		$value = $value . '
					<div class="mailbox-content">
						<table class="table">
							<tbody>
								<tr class="table-row">
									';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][0] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][1] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][2] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][3] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>Cliente</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][4] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][5] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][6] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][7] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][8] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][9] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][10] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>Empleado</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][11] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][12] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][13] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][14] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][15] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][16] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][17] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][18] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][19] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][20] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][21] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][22] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][23] . '</h6></td>';
								
								
								//$value = $value . '<td class="march"></td>';
								$value = $value . '
								</tr>
							';
						
						for($filas = $initial_row; $filas <= $final_row ; $filas++)
						{
							$value = $value . '
									<tr class="table-row">';
									
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][1] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][3] . ' ' . $tabla[$filas][5] . ' (' . $tabla[$filas][7] . ')' . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][10] . ' ' . $tabla[$filas][12] . ' (' . $tabla[$filas][14] . ')' . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][16] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][18] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][23] . '</h6></td>';
									
									
									
									$value = $value . '
										<td class="march">
											<form action="index.php" method="post" id="frm_edit_row_' . $filas . '">
												<input type="hidden" class="form-control" id="exampleInputEmail1" name="txt_edit_row" value="' . $filas . '" form="frm_edit_row_' . $filas . '" readonly>
												<button type="submit" class="btn btn-default" name="btn_edit_display_row" form="frm_edit_row_' . $filas . '">Editar</button>
											</form>
										</td>';
							
							$value = $value . '
											</tr>
										';
						}
					$value = $value . '
									</tbody>
								</table>
							</div>
						</div>
					</div>
				';
				
				
			
		return $value;
	}
	
	
	
	
	
	
	
	
	
	function fnCrearTablaHtmlDeTablaDeLaLineaAEditar($fila){
		
		$tabla = $_SESSION["page_table"];
		
		
		$colNameId[0] = "lbl_code_transaction";
		$colNameId[1] = "txt_date";
		$colNameId[2] = "txt_user_code";
		$colNameId[3] = "txt_user_first_name";
		$colNameId[4] = "txt_user_second_name";
		$colNameId[5] = "txt_user_first_last_name";
		$colNameId[6] = "txt_user_second_last_name";
		$colNameId[7] = "txt_user_email";
		$colNameId[8] = "txt_user_rol";
		$colNameId[9] = "txt_employee_code";
		$colNameId[10] = "txt_employee_first_name";
		$colNameId[11] = "txt_employee_second_name";
		$colNameId[12] = "txt_employee_first_last_name";
		$colNameId[13] = "txt_employee_second_last_name";
		$colNameId[14] = "txt_employee_email";
		$colNameId[15] = "txt_employee_rol";
		$colNameId[16] = "txt_Ticket";
		$colNameId[17] = "txt_state_code";
		$colNameId[18] = "txt_state_name";
		$colNameId[19] = "txt_cellar_code";
		$colNameId[20] = "txt_cellar_name";
		$colNameId[21] = "txt_cash";
		$colNameId[22] = "txt_credit_card";
		$colNameId[23] = "txt_Total";
		
		
		
		/*$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][1] . '</h6></td>';
		$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][3] . ' ' . $tabla[$filas][5] . ' (' . $tabla[$filas][7] . ')' . '</h6></td>';
		$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][10] . ' ' . $tabla[$filas][12] . ' (' . $tabla[$filas][14] . ')' . '</h6></td>';
		$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][16] . '</h6></td>';
		$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][18] . '</h6></td>';
		$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][23] . '</h6></td>';*/
		
		$value = '
			<div class="tab-pane active text-style" id="tab1">
				<div class="inbox-right">
					<div class="mailbox-content">
						<form action="index.php" method="post" id="frm_edit_data_row_' . $fila . '">
						<table class="table">
							<tbody>
								<tr class="table-row">
									';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][0] . '</h6></td>';
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . /*$tabla[1][0]*/ "" . '</h6>
										</td>
										<td class="march">
											<input type="hidden" class="form-control" id="exampleInputEmail1" name="' . $colNameId[0] . '" placeholder="' . $tabla[$fila][0] . '" value="' . $tabla[$fila][0] . '" form="frm_edit_data_row_' . $fila . '" readonly>
										</td>
									</tr>';
									
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][1] . ':</h6>
										</td>
										<td class="march">
											<input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[1] . '" placeholder="' . $tabla[$fila][1] . '" value="' . $tabla[$fila][1] . '" form="frm_edit_data_row_' . $fila . '" readonly>
										</td>
									</tr>';
									
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][3] . ':</h6>
										</td>
										<td class="march">
											<input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[3] . '" placeholder="' . $tabla[$fila][3] . '" value="' . $tabla[$fila][3] . ' ' . $tabla[$fila][5] . ' (' . $tabla[$fila][7] . ')' . '" form="frm_edit_data_row_' . $fila . '" readonly>
										</td>
									</tr>';
									
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][10] . ':</h6>
										</td>
										<td class="march">
											<input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[10] . '" placeholder="' . $tabla[$fila][10] . '" value="' . $tabla[$fila][10] . ' ' . $tabla[$fila][12] . ' (' . $tabla[$fila][14] . ')' . '" form="frm_edit_data_row_' . $fila . '" readonly>
										</td>
									</tr>';
									
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][16] . ':</h6>
										</td>
										<td class="march">
											<input type="number" class="form-control" id="exampleInputEmail1" name="' . $colNameId[16] . '" placeholder="' . $tabla[$fila][16] . '" value="' . $tabla[$fila][16] . '" form="frm_edit_data_row_' . $fila . '" readonly>
										</td>
									</tr>';
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][18] . ':</h6>
										</td>
										<td class="march">
											<input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[18] . '" placeholder="' . $tabla[$fila][18] . '" value="' . $tabla[$fila][18] . '" form="frm_edit_data_row_' . $fila . '" readonly>
										</td>
									</tr>';
									
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][23] . ':</h6>
										</td>
										<td class="march">
											<input type="number" class="form-control" id="exampleInputEmail1" name="' . $colNameId[23] . '" placeholder="' . $tabla[$fila][23] . '" value="' . $tabla[$fila][23] . '" form="frm_edit_data_row_' . $fila . '" readonly>
										</td>
									</tr>';
								
								/*$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][2] . ':</h6>
										</td>
										<td class="march">';
											$value = $value . '<select name="' . $colNameId[2] . '">';
												for($filaEstados = 2; $filaEstados <= $estados[0][0] ; $filaEstados++){
													if ($tabla[$fila][2]==$estados[$filaEstados][0]){
														$value = $value . '<option value="' . $estados[$filaEstados][0] . '" selected>' . $estados[$filaEstados][1] . '</option>';
													} else {
														$value = $value . '<option value="' . $estados[$filaEstados][0] . '">' . $estados[$filaEstados][1] . '</option>';
													}
												}
												$value = $value . '</select>';
										
										$value = $value . '
										</td>
									</tr>';
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][4] . ':</h6>
										</td>
										<td class="march">
											<input type="time" class="form-control" id="exampleInputEmail1" name="' . $colNameId[4] . '" placeholder="' . $tabla[$fila][4] . '" value="' . $tabla[$fila][4] . '" form="frm_edit_data_row_' . $fila . '">
										</td>
									</tr>';
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][5] . ':</h6>
										</td>
										<td class="march">
											<input type="time" class="form-control" id="exampleInputEmail1" name="' . $colNameId[5] . '" placeholder="' . $tabla[$fila][5] . '" value="' . $tabla[$fila][5] . '" form="frm_edit_data_row_' . $fila . '">
										</td>
									</tr>';
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][6] . ':</h6>
										</td>
										<td class="march">';
											$value = $value . '<select name="' . $colNameId[6] . '">';
												for($filaEstados = 2; $filaEstados <= $servicios[0][0] ; $filaEstados++){
													if ($tabla[$fila][6]==$servicios[$filaEstados][0]){
														$value = $value . '<option value="' . $servicios[$filaEstados][0] . '" selected>' . $servicios[$filaEstados][1] . '</option>';
													} else {
														$value = $value . '<option value="' . $servicios[$filaEstados][0] . '">' . $servicios[$filaEstados][1] . '</option>';
													}
												}
												$value = $value . '</select>';
										
										$value = $value . '
										</td>
									</tr>';
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>Cliente: </h6>
										</td>
										<td class="march">
											<input type="hidden" class="form-control" id="exampleInputEmail1" name="' . $colNameId[8] . '" placeholder="' . $tabla[$fila][8] . '" value="' . $tabla[$fila][8] . '" form="frm_edit_data_row_' . $fila . '" readonly>
											<input type="text" class="form-control" id="exampleInputEmail1" name="" placeholder="Nombre" value="' . $tabla[$fila][9] . ' ' . $tabla[$fila][11] . ' (' . $tabla[$fila][13] . ')' .  '" form="frm_edit_data_row_' . $fila . '" readonly>
										</td>
									</tr>';
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>Empleado:</h6>
										</td>
										<td class="march">';
											$value = $value . '<select name="' . $colNameId[15] . '">';
												for($filaEstados = 2; $filaEstados <= $tabla_empleados[0][0] ; $filaEstados++){
													if ($tabla[$fila][15]==$tabla_empleados[$filaEstados][0]){
														$value = $value . '<option value="' . $tabla_empleados[$filaEstados][0] . '" selected>' . $tabla_empleados[$filaEstados][3] . ' ' . $tabla_empleados[$filaEstados][5] . ' (' . $tabla_empleados[$filaEstados][2] .')' . '</option>';
													} else {
														$value = $value . '<option value="' . $tabla_empleados[$filaEstados][0] . '">' . $tabla_empleados[$filaEstados][3] . ' ' . $tabla_empleados[$filaEstados][5] . ' (' . $tabla_empleados[$filaEstados][2] .')' . '</option>';
													}
												}
												$value = $value . '</select>';
										
										$value = $value . '
										</td>
									</tr>';*/
								
								
								
								
								$value = $value . '
									<td class="march">
										<button type="submit" class="btn btn-default" name="btn_cancel" form="frm_edit_data_row_' . $fila . '">Cancelar</button>
									</td>
									<td class="march">
										<button type="submit" class="btn btn-default" name="btn_edit_data_of_table" form="frm_edit_data_row_' . $fila . '">Editar</button>
									</td>';
								$value = $value . '
								</tr>
							</tbody>
						</table>
						</form>
						';
						
					$value = $value . '
							</div>
						</div>
					</div>
				';
			
		return $value;
	}




	
/*echo '
<div class="col-md-8 tab-content tab-content-in">
	<div class="tab-pane active text-style" id="tab1">
		<div class="inbox-right">
			<div class="mailbox-content">
				<table class="table">
					<tbody>
						<tr class="table-row">
							<td class="table-img">
								<img src="images/in.jpg" alt="" />
							</td>
							<td class="table-text">
								<h6> Lorem ipsum</h6>
								<p>Nullam quis risus eget urna mollis ornare vel eu leo</p>
							</td>
							<td>
								<span class="fam">Family</span>
							</td>
							<td class="march">
								in 5 days
							</td>
							<td >
								<i class="fa fa-star-half-o icon-state-warning"></i>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
';*/

?>