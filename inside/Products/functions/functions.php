<?php
	$data_relation = "products";
	
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
	
	$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
	
	
	
	if (isset($_POST['btn_edit_data_of_table'])){
		$query = "CALL `sp_Product_edit`(";
		
		if (isset($_POST['lbl_code']) && !empty($_POST['lbl_code'])){
			$query = $query . "" . $_POST['lbl_code'] . ", ";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_new_name']) && !empty($_POST['txt_new_name'])){
			$query = $query . "'" . $_POST['txt_new_name'] . "', ";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_new_Description']) && !empty($_POST['txt_new_Description'])){
			$query = $query . "'" . $_POST['txt_new_Description'] . "',";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_new_Presentation']) && !empty($_POST['txt_new_Presentation'])){
			$query = $query . "" . $_POST['txt_new_Presentation'] . ",";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_new_Barcode']) && !empty($_POST['txt_new_Barcode'])){
			$query = $query . "" . $_POST['txt_new_Barcode'] . ",";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_new_Cost_Price']) && !empty($_POST['txt_new_Cost_Price'])){
			$query = $query . "" . $_POST['txt_new_Cost_Price'] . ",";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_new_State']) && !empty($_POST['txt_new_State'])){
			$query = $query . "" . $_POST['txt_new_State'] . ",";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_new_Sale_Price']) && !empty($_POST['txt_new_Sale_Price'])){
			$query = $query . "" . $_POST['txt_new_Sale_Price'] . ",";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_new_type']) && !empty($_POST['txt_new_type'])){
			$query = $query . "" . $_POST['txt_new_type'] . ",";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_new_BrandName']) && !empty($_POST['txt_new_BrandName'])){
			$query = $query . "" . $_POST['txt_new_BrandName'] . "";
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
	
	
	
	function fnTraerDatos(){
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
		$_SESSION["page_table"] = $tabla;
		//$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct();
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
	}
	
	function fnTraerDatosWhere($where){
		$query = "CALL `sp_product_show_where`('%" . $where . "%');";
		
		
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
		$colNameId[1] = "txt_new_name";
		$colNameId[2] = "txt_new_Description";
		$colNameId[3] = "txt_new_Presentation";
		//$colNameId[4] = "txt_new_Barcode";
		//$colNameId[5] = "txt_new_Cost_Price";
		$colNameId[6] = "txt_new_State";
		$colNameId[7] = "txt_new_Sale_Price";
		$colNameId[8] = "txt_new_type";
		$colNameId[9] = "txt_new_BrandName";
		
		$value = $value . '
					<div class="mailbox-content">
						<table class="table">
							<tbody>
								<tr class="table-row">
									';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][0] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][1] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][2] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][3] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][4] . '</h6></td>';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][5] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][6] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][7] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][8] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][9] . '</h6></td>';
								
								
								$value = $value . '<td class="march"></td>';
								$value = $value . '
								</tr>
							';
						
						for($filas = $initial_row; $filas <= $final_row ; $filas++)
						{
							$value = $value . '
									<tr class="table-row">';
									
									//$value = $value . '<td class="march"><input type="hidden" class="form-control" id="exampleInputEmail1" name="' . $filas . '" placeholder="' . $filas . '" value="' . $filas . '" form="frm_edit_type_' . $filas . '" readonly></td>';
									
									/*$value = $value . '<td class="march"><input type="hidden" class="form-control" id="exampleInputEmail1" name="' . $colNameId[0] . '" placeholder="' . $tabla[$filas][0] . '" value="' . $tabla[$filas][0] . '" form="frm_edit_type_' . $filas . '" readonly></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[1] . '" placeholder="' . $tabla[$filas][1] . '" value="' . $tabla[$filas][1] . '" form="frm_edit_type_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[2] . '" placeholder="' . $tabla[$filas][2] . '" value="' . $tabla[$filas][2] . '" form="frm_edit_type_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[3] . '" placeholder="' . $tabla[$filas][3] . '" value="' . $tabla[$filas][3] . '" form="frm_edit_type_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[4] . '" placeholder="' . $tabla[$filas][4] . '" value="' . $tabla[$filas][4] . '" form="frm_edit_type_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[5] . '" placeholder="' . $tabla[$filas][5] . '" value="' . $tabla[$filas][5] . '" form="frm_edit_type_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[6] . '" placeholder="' . $tabla[$filas][6] . '" value="' . $tabla[$filas][6] . '" form="frm_edit_type_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[7] . '" placeholder="' . $tabla[$filas][7] . '" value="' . $tabla[$filas][7] . '" form="frm_edit_type_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[8] . '" placeholder="' . $tabla[$filas][8] . '" value="' . $tabla[$filas][8] . '" form="frm_edit_type_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[9] . '" placeholder="' . $tabla[$filas][9] . '" value="' . $tabla[$filas][9] . '" form="frm_edit_type_' . $filas . '"></td>';*/
									
									//$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][0] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][1] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][2] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][3] . '</h6></td>';
									//$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][4] . '</h6></td>';
									//$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][5] . '</h6></td>';
									//$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][6] . '</h6></td>';
									if ($tabla[$filas][6] == 0)
									{
										$value = $value . '<td class="table-text"><h6>Inactivo</h6></td>';
									}else{
										$value = $value . '<td class="table-text"><h6>Activo</h6></td>';
									}
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][7] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][8] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][9] . '</h6></td>';
									
									
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
		$colNameId[1] = "txt_new_name";
		$colNameId[2] = "txt_new_Description";
		$colNameId[3] = "txt_new_Presentation";
		$colNameId[4] = "txt_new_Barcode";
		$colNameId[5] = "txt_new_Cost_Price";
		$colNameId[6] = "txt_new_State";
		$colNameId[7] = "txt_new_Sale_Price";
		$colNameId[8] = "txt_new_type";
		$colNameId[9] = "txt_new_BrandName";
		
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
											<input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[1] . '" placeholder="' . $tabla[$fila][1] . '" value="' . $tabla[$fila][1] . '" form="frm_edit_data_row_' . $fila . '">
										</td>
									</tr>';
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][2] . ':</h6>
										</td>
										<td class="march">
											<input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[2] . '" placeholder="' . $tabla[$fila][2] . '" value="' . $tabla[$fila][2] . '" form="frm_edit_data_row_' . $fila . '">
										</td>
									</tr>';
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][3] . ':</h6>
										</td>
										<td class="march">
											<input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[3] . '" placeholder="' . $tabla[$fila][3] . '" value="' . $tabla[$fila][3] . '" form="frm_edit_data_row_' . $fila . '">
										</td>
									</tr>';
								
								/*$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][4] . ':</h6>
										</td>
										<td class="march">
											<input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[4] . '" placeholder="' . $tabla[$fila][4] . '" value="' . $tabla[$fila][4] . '" form="frm_edit_data_row_' . $fila . '">
										</td>
									</tr>';*/
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][5] . ':</h6>
										</td>
										<td class="march">
											<input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[5] . '" placeholder="' . $tabla[$fila][5] . '" value="' . $tabla[$fila][5] . '" form="frm_edit_data_row_' . $fila . '">
										</td>
									</tr>';
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][6] . ':</h6>
										</td>
										<td class="march">
											<input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[6] . '" placeholder="' . $tabla[$fila][6] . '" value="' . $tabla[$fila][6] . '" form="frm_edit_data_row_' . $fila . '">
										</td>
									</tr>';
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][7] . ':</h6>
										</td>
										<td class="march">
											<input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[7] . '" placeholder="' . $tabla[$fila][7] . '" value="' . $tabla[$fila][7] . '" form="frm_edit_data_row_' . $fila . '">
										</td>
									</tr>';
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][8] . ':</h6>
										</td>
										<td class="march">
											<input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[8] . '" placeholder="' . $tabla[$fila][8] . '" value="' . $tabla[$fila][8] . '" form="frm_edit_data_row_' . $fila . '">
										</td>
									</tr>';
								
								$value = $value . '
									<tr>
										<td class="table-text">
											<h6>' . $tabla[1][9] . ':</h6>
										</td>
										<td class="march">
											<input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[9] . '" placeholder="' . $tabla[$fila][9] . '" value="' . $tabla[$fila][9] . '" form="frm_edit_data_row_' . $fila . '">
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







	if (isset($_POST['btn_add_new_type'])){
		$query = "CALL `sp_ProducType_add`(";
		 
		if (isset($_POST['txt_new_type']) && !empty($_POST['txt_new_type'])){
			$query = $query . "'" . $_POST['txt_new_type'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_new_type_Description']) && !empty($_POST['txt_new_type_Description'])){
			$query = $query . "'" . $_POST['txt_new_type_Description'] . "'";
		} else {
			$query = $query . "''";
		}
		
		$query = $query . ");";
		//$_SESSION['msg'] = $_SESSION['msg'] . $query;
		
		fn_InsertQuery(Conexion(), $query);
		
		$_SESSION['msg'] = $_SESSION['msg'] . "Presentacion de producto agregada exitosamente. ";
	}
	
	
	
	
	
	
	/*function fnDeplegarTiposDeProducto(){
		$query = "CALL `sp_ProducType_show`();";
		
		
		$tabla_tipos = fnSelectAnyQuery(Conexion(), $query, 10);
		
		$tabla_tipos[1][0] = "Codigo";
		$tabla_tipos[1][1] = "Nombre";
		$tabla_tipos[1][2] = "Descripción";
		$tabla_tipos[1][3] = "Presentación";
		$tabla_tipos[1][4] = "Código de barras";
		$tabla_tipos[1][5] = "Precio de costo";
		$tabla_tipos[1][6] = "Estado";
		$tabla_tipos[1][7] = "Precio de venta";
		$tabla_tipos[1][8] = "Tipo";
		$tabla_tipos[1][9] = "Marca";
		
		$html_tipos = '<select class="form-contbrand" name="txt_new_type" form="frm_add_new_product">';
		for($filas = 2; $filas <= $tabla_tipos[0][0] ; $filas++){
			$html_tipos = $html_tipos . '<option value="' . $tabla_tipos[$filas][0] . '">' . $tabla_tipos[$filas][1] . '</option>';
		}
		$html_tipos = $html_tipos . '</select>';
		
		return $html_tipos;
	}*/
	

?>