<?php
	$data_relation = "ticketsPendientes";
	
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
		$query = "CALL `sp_waitingqueuebybarber_update_from_finalize_proved`(";
		
		if (isset($_POST['lbl_code']) && !empty($_POST['lbl_code'])){
			$query = $query . "" . $_POST['lbl_code'] . "";
		} else {
			$query = $query . "NULL ";
		}
		
		
		
		
		
		$query = $query . ");";
		
		
		//$_SESSION['msg'] = $_SESSION['msg'] . $query;
		//echo $query;
		
		fn_InsertQuery(Conexion(), $query);
		
		$_SESSION['msg'] = $_SESSION['msg'] . "Información editada. ";
		
		fnTraerDatos(); 
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
	
	
	function fnTraerDatos(){
		
		$tabla = fnTraerCodigoUsusario();
		$query = "CALL `sp_waitingqueuebybarber_admin_show_employee_user_where_state`(3);";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 22);
		
		
		$tabla[1][0] = "Código de ticket";
		$tabla[1][1] = "Fecha";
		$tabla[1][2] = "Código de estado";
		$tabla[1][3] = "Estado";
		$tabla[1][4] = "Hora inicial";
		$tabla[1][5] = "Hora Final";
		$tabla[1][6] = "Código de servicio";
		$tabla[1][7] = "Servicio";
		$tabla[1][8] = "Código de usuario";
		$tabla[1][9] = "Primer nombre de usuario";
		$tabla[1][10] = "Segundo nombre de usuario";
		$tabla[1][11] = "Primer apellido de usuario";
		$tabla[1][12] = "Segundo apellido de usuario";
		$tabla[1][13] = "Email de usuario";
		$tabla[1][14] = "Código de rol de usuario";
		$tabla[1][15] = "Código de empleado";
		$tabla[1][16] = "Primer nombre de empleado";
		$tabla[1][17] = "Segundo nombre de empleado";
		$tabla[1][18] = "Primer apellido de empleado";
		$tabla[1][19] = "Segundo apellido de empleado";
		$tabla[1][20] = "Email de empleado";
		$tabla[1][21] = "Código de rol de empleado";
		
		
		
		//$_SESSION['html'] =  fnCrearTablaHtmlDeTablaBrand($tabla, 1);
		//$data_relation = $_SESSION['data_relation'];
		$_SESSION["page_table"] = $tabla;
		//$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
	}
	
	function fnTraerDatosWhere($where){
		$tabla = fnTraerCodigoUsusario();
		$query = "CALL `sp_waitingqueuebybarber_admin_show_emp_user_where_state_another`('%" . $where . "%', 3);";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 4);
		
		$tabla[1][0] = "Código de ticket";
		$tabla[1][1] = "Fecha";
		$tabla[1][2] = "Código de estado";
		$tabla[1][3] = "Estado";
		$tabla[1][4] = "Hora inicial";
		$tabla[1][5] = "Hora Final";
		$tabla[1][6] = "Código de servicio";
		$tabla[1][7] = "Servicio";
		$tabla[1][8] = "Código de usuario";
		$tabla[1][9] = "Primer nombre de usuario";
		$tabla[1][10] = "Segundo nombre de usuario";
		$tabla[1][11] = "Primer apellido de usuario";
		$tabla[1][12] = "Segundo apellido de usuario";
		$tabla[1][13] = "Email de usuario";
		$tabla[1][14] = "Código de rol de usuario";
		$tabla[1][15] = "Código de empleado";
		$tabla[1][16] = "Primer nombre de empleado";
		$tabla[1][17] = "Segundo nombre de empleado";
		$tabla[1][18] = "Primer apellido de empleado";
		$tabla[1][19] = "Segundo apellido de empleado";
		$tabla[1][20] = "Email de empleado";
		$tabla[1][21] = "Código de rol de empleado";
		
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
		
		
		$colNameId[0] = "lbl_code";
		$colNameId[1] = "txt_date";
		$colNameId[2] = "txt_state_code";
		$colNameId[3] = "txt_state_name";
		$colNameId[4] = "txt_initial_hour";
		$colNameId[5] = "txt_final_hour";
		$colNameId[6] = "txt_service_code";
		$colNameId[7] = "txt_service_name";
		$colNameId[8] = "txt_user_code";
		$colNameId[9] = "txt_user_first_name";
		$colNameId[10] = "txt_user_second_name";
		$colNameId[11] = "txt_user_first_lastname";
		$colNameId[12] = "txt_user_second_lastname";
		$colNameId[13] = "txt_user_email";
		$colNameId[14] = "txt_user_role_code";
		$colNameId[15] = "txt_employee_code";
		$colNameId[16] = "txt_employee_first_name";
		$colNameId[17] = "txt_employee_second_name";
		$colNameId[18] = "txt_employee_first_lastname";
		$colNameId[19] = "txt_employee_second_lastname";
		$colNameId[20] = "txt_employee_email";
		$colNameId[21] = "txt_employee_role_code";
		
		
		
		$value = $value . '
					<div class="mailbox-content">
						<table class="table">
							<tbody>
								<tr class="table-row">
									';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][0] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][1] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][2] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][3] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>Tiempo</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][4] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][5] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][6] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][7] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][8] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>Nombre de usuario</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][9] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][10] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][11] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][12] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][13] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][14] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][15] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>Nombre de empleado</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][16] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][17] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][18] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][19] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][20] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][21] . '</h6></td>';
								
								
								$value = $value . '<td class="march"></td>';
								$value = $value . '
								</tr>
							';
						
						for($filas = $initial_row; $filas <= $final_row ; $filas++)
						{
							$value = $value . '
									<tr class="table-row">';
									
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][1] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][3] . '</h6></td>';
									
									/*if ($tabla[$filas][3] == 0)
									{
										$value = $value . '<td class="table-text"><h6>Inactivo</h6></td>';
									}else{
										$value = $value . '<td class="table-text"><h6>Activo</h6></td>';
									}*/
									
									//$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][4] . '</h6></td>';
									//$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][5] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][4] . ' ' . $tabla[$filas][5] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][7] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][9] . ' ' . $tabla[$filas][11] . ' (' . $tabla[$filas][13] . ')' .  '</h6></td>';
									//$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][13] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][16] . ' ' . $tabla[$filas][18] . ' (' . $tabla[$filas][20] . ')' .  '</h6></td>';
									//$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][20] . '</h6></td>';
									
									
									
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
		
		$estados = fnTraerEstados();
		$servicios = fnTraerServicios();
		$tabla_empleados = fnTraerDatosEmpleados();
		
		$colNameId[0] = "lbl_code";
		$colNameId[1] = "txt_date";
		$colNameId[2] = "txt_state_code";
		$colNameId[3] = "txt_state_name";
		$colNameId[4] = "txt_initial_hour";
		$colNameId[5] = "txt_final_hour";
		$colNameId[6] = "txt_service_code";
		$colNameId[7] = "txt_service_name";
		$colNameId[8] = "txt_user_code";
		$colNameId[9] = "txt_user_first_name";
		$colNameId[10] = "txt_user_second_name";
		$colNameId[11] = "txt_user_first_lastname";
		$colNameId[12] = "txt_user_second_lastname";
		$colNameId[13] = "txt_user_email";
		$colNameId[14] = "txt_user_role_code";
		$colNameId[15] = "txt_employee_code";
		$colNameId[16] = "txt_employee_first_name";
		$colNameId[17] = "txt_employee_second_name";
		$colNameId[18] = "txt_employee_first_lastname";
		$colNameId[19] = "txt_employee_second_lastname";
		$colNameId[20] = "txt_employee_email";
		$colNameId[21] = "txt_employee_role_code";
		
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
											<input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[3] . '" placeholder="' . $tabla[$fila][3] . '" value="' . $tabla[$fila][3] . '" form="frm_edit_data_row_' . $fila . '" readonly>
										</td>
									</tr>';
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][4] . ':</h6>
										</td>
										<td class="march">
											<input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[4] . '" placeholder="' . $tabla[$fila][4] . '" value="' . $tabla[$fila][4] . '" form="frm_edit_data_row_' . $fila . '" readonly>
										</td>
									</tr>';
									
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][5] . ':</h6>
										</td>
										<td class="march">
											<input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[5] . '" placeholder="' . $tabla[$fila][5] . '" value="' . $tabla[$fila][5] . '" form="frm_edit_data_row_' . $fila . '" readonly>
										</td>
									</tr>';
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][7] . ':</h6>
										</td>
										<td class="march">
											<input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[7] . '" placeholder="' . $tabla[$fila][7] . '" value="' . $tabla[$fila][7] . '" form="frm_edit_data_row_' . $fila . '" readonly>
										</td>
									</tr>';
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>Cliente: </h6>
										</td>
										<td class="march">
											<input type="text" class="form-control" id="exampleInputEmail1" name="" placeholder="Nombre" value="' . $tabla[$fila][9] . ' ' . $tabla[$fila][11] . ' (' . $tabla[$fila][13] . ')' .  '" form="frm_edit_data_row_' . $fila . '" readonly>
										</td>
									</tr>';
									
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>Empleado: </h6>
										</td>
										<td class="march">
											<input type="text" class="form-control" id="exampleInputEmail1" name="" placeholder="Nombre" value="' . $tabla[$fila][16] . ' ' . $tabla[$fila][18] . ' (' . $tabla[$fila][20] . ')' .  '" form="frm_edit_data_row_' . $fila . '" readonly>
										</td>
									</tr>';
								
								
								
								
								
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