<?php
	$_SESSION['data_relation'] = "products";
	function fnCrearTablaHtmlDeTablaProduct($conEncabezados1Sin0){
		$_SESSION['data_relation'] = 'products';
		if (!isset($_SESSION[$_SESSION['data_relation'] . '_page_display']) || empty($_SESSION[$_SESSION['data_relation'] . '_page_display'])){
			$_SESSION[$_SESSION['data_relation'] . '_page_display'] = 1;
		}
		
		if (!isset($_SESSION[$_SESSION['data_relation'] . '_rows_display']) || empty($_SESSION[$_SESSION['data_relation'] . '_rows_display'])){
			$_SESSION[$_SESSION['data_relation'] . '_rows_display'] = 10;
		}
		
		$tabla = $_SESSION[$_SESSION['data_relation']];
		
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
						<table class="table">
							<tbody>
								<tr class="table-row">
									';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][0] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][1] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][2] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][3] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][4] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][5] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][6] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][7] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][8] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][9] . '</h6></td>';
								
								
								$value = $value . '<td class="march"></td>';
								$value = $value . '
								</tr>
							</tbody>
						</table>';
						
						for($filas = 2; $filas <= $tabla[0][0] ; $filas++)
						{
							$value = $value . '
									<table class="table">
										<tbody>
											<tr class="table-row">';
									
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $filas . '" placeholder="' . $filas . '" value="' . $filas . '" form="frm_edit_type_' . $filas . '" readonly></td>';
									
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
									
									$value = $value . '<td class="table-text"><h6>' . $tabla[1][0] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][1] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][2] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][3] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][4] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][5] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][6] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][7] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][8] . '</h6></td>';
									$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][9] . '</h6></td>';
									
									
									$value = $value . '
										<td class="march">
											<form action="index.php" method="post" id="frm_edit_row_' . $filas . '">
												<input type="text" class="form-control" id="exampleInputEmail1" name="txt_edit_row" value="' . $filas . '" form="frm_edit_row_' . $filas . '" readonly>
												<button type="submit" class="btn btn-default" name="btn_edit_display_row" form="frm_edit_row_' . $filas . '">Editar</button>
											</form>
										</td>';
							
							$value = $value . '
											</tr>
										</tbody>
									</table>';
						}
					$value = $value . '
							</div>
						</div>
					</div>
				';
				
				if (isset($_POST['btn_edit_display_row']) && !empty($_POST['btn_edit_display_row'])){
					
				}
			
		return $value;
	}
	
	function fnCrearTablaHtmlDeTablaProducta($tabla, $conEncabezados1Sin0){
		
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
						<table class="table">
							<tbody>
								<tr class="table-row">
									';
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][0] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][1] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][2] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][3] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][4] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][5] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][6] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][7] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][8] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][9] . '</h6></td>';
								
								
								$value = $value . '<td class="march"></td>';
								$value = $value . '
								</tr>
							</tbody>
						</table>';
						for($filas = 2; $filas <= $tabla[0][0] ; $filas++)
						{
							$value = $value . '
								<form action="index.php" method="post" id="frm_edit_type_' . $filas . '">
									<table class="table">
										<tbody>
											<tr class="table-row">';
									
									$value = $value . '<td class="march"><input type="hidden" class="form-control" id="exampleInputEmail1" name="' . $colNameId[0] . '" placeholder="' . $tabla[$filas][0] . '" value="' . $tabla[$filas][0] . '" form="frm_edit_type_' . $filas . '" readonly></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[1] . '" placeholder="' . $tabla[$filas][1] . '" value="' . $tabla[$filas][1] . '" form="frm_edit_type_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[2] . '" placeholder="' . $tabla[$filas][2] . '" value="' . $tabla[$filas][2] . '" form="frm_edit_type_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[3] . '" placeholder="' . $tabla[$filas][3] . '" value="' . $tabla[$filas][3] . '" form="frm_edit_type_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[4] . '" placeholder="' . $tabla[$filas][4] . '" value="' . $tabla[$filas][4] . '" form="frm_edit_type_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[5] . '" placeholder="' . $tabla[$filas][5] . '" value="' . $tabla[$filas][5] . '" form="frm_edit_type_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[6] . '" placeholder="' . $tabla[$filas][6] . '" value="' . $tabla[$filas][6] . '" form="frm_edit_type_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[7] . '" placeholder="' . $tabla[$filas][7] . '" value="' . $tabla[$filas][7] . '" form="frm_edit_type_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[8] . '" placeholder="' . $tabla[$filas][8] . '" value="' . $tabla[$filas][8] . '" form="frm_edit_type_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[9] . '" placeholder="' . $tabla[$filas][9] . '" value="' . $tabla[$filas][9] . '" form="frm_edit_type_' . $filas . '"></td>';
									
									
									$value = $value . '<td class="march"><button type="submit" class="btn btn-default" name="btn_edit_Product" form="frm_edit_type_' . $filas . '">Editar</button></td>';
							
							$value = $value . '
											</tr>
										</tbody>
									</table>
								</form>';
						}
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
	
	
	
	if (isset($_POST['btn_edit_type'])){
		$query = "CALL `sp_ProducType_edit`(";
		
		if (isset($_POST['lbl_code']) && !empty($_POST['lbl_code'])){
			$query = $query . "" . $_POST['lbl_code'] . ", ";
		} else {
			$query = $query . "NULL , ";
		}
		
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
		
		$_SESSION['msg'] = $_SESSION['msg'] . "Presentación de producto editada. ";
	}
	
	
	
	function fnDeplegarProductos(){
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
		$_SESSION[$_SESSION['data_relation']] = $tabla;
		$_SESSION['html'] = fnCrearTablaHtmlDeTablaProduct(1);
		
		//$_SESSION['msg'] = $_SESSION['msg'] . "";
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