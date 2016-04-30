<?php
	$data_relation = "services";
	
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
		$query = "CALL `sp_AverageTimeByBarber_Update`(";
		
		if (isset($_POST['txt_min_time']) && !empty($_POST['txt_min_time'])){
			$query = $query . "'" . $_POST['txt_min_time'] . "', ";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_max_time']) && !empty($_POST['txt_max_time'])){
			$query = $query . "'" . $_POST['txt_max_time'] . "', ";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_best_time']) && !empty($_POST['txt_best_time'])){
			$query = $query . "'" . $_POST['txt_best_time'] . "', ";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['lbl_code']) && !empty($_POST['lbl_code'])){
			$query = $query . "" . $_POST['lbl_code'] . ", ";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_state']) && !empty($_POST['txt_state'])){
			$query = $query . "" . $_POST['txt_state'] . "";
		} else {
			$query = $query . "NULL";
		}
		
		$query = $query . ");";
		
		
		//$_SESSION['msg'] = $_SESSION['msg'] . $query;
		//echo $query;
		
		fn_InsertQuery(Conexion(), $query);
		
		$_SESSION['msg'] = $_SESSION['msg'] . "Información editada. ";
		
		fnTraerDatos(); 
	}
	
	
	$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
	
	
	
	
	
	function fnTraerDatos(){
		$query = "CALL `sp_ServiceTimeByBarber_show`();";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 4);
		
		
		$tabla[1][0] = "Codigo";
		$tabla[1][1] = "Tiempo minimo";
		$tabla[1][2] = "Tiempo maximo";
		$tabla[1][3] = "Mejor tiempo";
		$tabla[1][4] = "Tiempo promedio";
		$tabla[1][5] = "Estado";
		$tabla[1][6] = "Código de servicio";
		$tabla[1][7] = "Nombre del servicio";
		$tabla[1][8] = "Código de empleado";
		$tabla[1][9] = "Primer nombre";
		$tabla[1][10] = "Segundo nombre";
		$tabla[1][11] = "Primer apellido";
		$tabla[1][12] = "Segundo Apellido";
		
		//$_SESSION['html'] =  fnCrearTablaHtmlDeTablaBrand($tabla, 1);
		//$data_relation = $_SESSION['data_relation'];
		$_SESSION["page_table"] = $tabla;
		//$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
	}
	
	function fnTraerDatosWhere($where){
		$query = "CALL `sp_ServiceTimeByBarber_show_where`('%" . $where . "%');";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 13);
		
		$tabla[1][0] = "Codigo";
		$tabla[1][1] = "Tiempo minimo";
		$tabla[1][2] = "Tiempo maximo";
		$tabla[1][3] = "Mejor tiempo";
		$tabla[1][4] = "Tiempo promedio";
		$tabla[1][5] = "Estado";
		$tabla[1][6] = "Código de servicio";
		$tabla[1][7] = "Nombre del servicio";
		$tabla[1][8] = "Código de empleado";
		$tabla[1][9] = "Primer nombre";
		$tabla[1][10] = "Segundo nombre";
		$tabla[1][11] = "Primer apellido";
		$tabla[1][12] = "Segundo Apellido";
		
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
		$colNameId[1] = "txt_min_time";
		$colNameId[2] = "txt_max_time";
		$colNameId[3] = "txt_best_time";
		$colNameId[4] = "txt_average_time";
		$colNameId[5] = "txt_state";
		$colNameId[6] = "txt_service_code";
		$colNameId[7] = "txt_service_name";
		$colNameId[8] = "txt_employee_code";
		$colNameId[9] = "txt_first_name";
		$colNameId[10] = "txt_second_name";
		$colNameId[11] = "txt_first_last_name";
		$colNameId[12] = "txt_second_last_name";
		
		
		$value = $value . '
					<div class="mailbox-content">
						<table class="table">
							<tbody>
								<tr class="table-row">
									';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][0] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>Nombre</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][7] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][4] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][5] . '</h6></td>';
								
								
								$value = $value . '<td class="march"></td>';
								$value = $value . '
								</tr>
							';
						
						for($filas = $initial_row; $filas <= $final_row ; $filas++)
						{
							$value = $value . '
									<tr class="table-row">';
									
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][9] . " " . $tabla[$filas][11] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][7] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][4] . '</h6></td>';
									if ($tabla[$filas][5] == 0)
									{
										$value = $value . '<td class="table-text"><h6>Inactivo</h6></td>';
									}else{
										$value = $value . '<td class="table-text"><h6>Activo</h6></td>';
									}
									
									
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
		
		$colNameId[0] = "lbl_code";
		$colNameId[1] = "txt_min_time";
		$colNameId[2] = "txt_max_time";
		$colNameId[3] = "txt_best_time";
		$colNameId[4] = "txt_average_time";
		$colNameId[5] = "txt_state";
		$colNameId[6] = "txt_service_code";
		$colNameId[7] = "txt_service_name";
		$colNameId[8] = "txt_employee_code";
		$colNameId[9] = "txt_first_name";
		$colNameId[10] = "txt_second_name";
		$colNameId[11] = "txt_first_last_name";
		$colNameId[12] = "txt_second_last_name";
		
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
											<h6>Nombre:</h6>
										</td>
										<td class="march">
											<input type="hidden" class="form-control" id="exampleInputEmail1" name="' . $colNameId[8] . '" placeholder="' . $tabla[$fila][8] . '" value="' . $tabla[$fila][8] . '" form="frm_edit_data_row_' . $fila . '" readonly>
											<input type="text" class="form-control" id="exampleInputEmail1" name="" placeholder="" value="' . $tabla[$fila][9] ." " . $tabla[$fila][10] ." " . $tabla[$fila][11] ." " . $tabla[$fila][12] ." " . '" form="frm_edit_data_row_' . $fila . '" readonly>
										</td>
									</tr>';
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][7] . ':</h6>
										</td>
										<td class="march">
											<input type="hidden" class="form-control" id="exampleInputEmail1" name="' . $colNameId[6] . '" placeholder="' . $tabla[$fila][6] . '" value="' . $tabla[$fila][6] . '" form="frm_edit_data_row_' . $fila . '" readonly>
											<input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[7] . '" placeholder="' . $tabla[$fila][7] . '" value="' . $tabla[$fila][7] . '" form="frm_edit_data_row_' . $fila . '" readonly>
										</td>
									</tr>';
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][1] . ':</h6>
										</td>
										<td class="march">
											<input type="time" class="form-control" id="exampleInputEmail1" name="' . $colNameId[1] . '" placeholder="' . $tabla[$fila][1] . '" value="' . $tabla[$fila][1] . '" form="frm_edit_data_row_' . $fila . '">
										</td>
									</tr>';
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][2] . ':</h6>
										</td>
										<td class="march">
											<input type="time" class="form-control" id="exampleInputEmail1" name="' . $colNameId[2] . '" placeholder="' . $tabla[$fila][2] . '" value="' . $tabla[$fila][2] . '" form="frm_edit_data_row_' . $fila . '">
										</td>
									</tr>';
									
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][3] . ':</h6>
										</td>
										<td class="march">
											<input type="time" class="form-control" id="exampleInputEmail1" name="' . $colNameId[3] . '" placeholder="' . $tabla[$fila][3] . '" value="' . $tabla[$fila][3] . '" form="frm_edit_data_row_' . $fila . '">
										</td>
									</tr>';
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][5] . ':</h6>
										</td>
										<td class="march">';
											$value = $value . '<select name="' . $colNameId[5] . '">';
												if ($tabla[$fila][5]==0){
													$value = $value . '<option value="0" selected>Inactive</option>';
													$value = $value . '<option value="1">Active</option>';
												}else{
													$value = $value . '<option value="0">Inactive</option>';
													$value = $value . '<option value="1" selected>Active</option>';
												}
												$value = $value . '</select>';
										
										$value = $value . '
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