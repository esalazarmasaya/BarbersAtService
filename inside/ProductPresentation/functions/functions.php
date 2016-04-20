<?php
	
	function fnCrearTablaHtmlDeTablaBrand($tabla, $conEncabezados1Sin0){
		
		$colNameId[0] = "lbl_code";
		$colNameId[1] = "txt_new_presentation";
		$colNameId[2] = "txt_new_presentation_Description";
		$colNameId[3] = "txt_new_presentation_units";
		
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
								$value = $value . '<td class="march"></td>';
								$value = $value . '
								</tr>
							</tbody>
						</table>';
						for($filas = 2; $filas <= $tabla[0][0] ; $filas++)
						{
							$value = $value . '
								<form action="index.php" method="post" id="frm_edit_presentation_' . $filas . '">
									<table class="table">
										<tbody>
											<tr class="table-row">';
									
									$value = $value . '<td class="march"><input type="hidden" class="form-control" id="exampleInputEmail1" name="' . $colNameId[0] . '" placeholder="' . $tabla[$filas][0] . '" value="' . $tabla[$filas][0] . '" form="frm_edit_presentation_' . $filas . '" readonly></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[1] . '" placeholder="' . $tabla[$filas][1] . '" value="' . $tabla[$filas][1] . '" form="frm_edit_presentation_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[2] . '" placeholder="' . $tabla[$filas][2] . '" value="' . $tabla[$filas][2] . '" form="frm_edit_presentation_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="number" class="form-control" id="exampleInputEmail1" name="' . $colNameId[3] . '" placeholder="' . $tabla[$filas][3] . '" value="' . $tabla[$filas][3] . '" form="frm_edit_presentation_' . $filas . '"></td>';
									$value = $value . '<td class="march"><button type="submit" class="btn btn-default" name="btn_edit_presentation" form="frm_edit_presentation_' . $filas . '">Editar</button></td>';
							
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







	if (isset($_POST['btn_add_new_product_presentation'])){
		$query = "CALL `sp_productpresentation_add`(";
		 
		if (isset($_POST['txt_new_presentation']) && !empty($_POST['txt_new_presentation'])){
			$query = $query . "'" . $_POST['txt_new_presentation'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_new_presentation_Description']) && !empty($_POST['txt_new_presentation_Description'])){
			$query = $query . "'" . $_POST['txt_new_presentation_Description'] . "',";
		} else {
			$query = $query . "'',";
		}
		
		if (isset($_POST['txt_new_presentation_units']) && !empty($_POST['txt_new_presentation_units'])){
			$query = $query . "" . $_POST['txt_new_presentation_units'] . "";
		} else {
			$query = $query . "0";
		}
		
		$query = $query . ");";
		//$_SESSION['msg'] = $_SESSION['msg'] . $query;
		
		fn_InsertQuery(Conexion(), $query);
		
		$_SESSION['msg'] = $_SESSION['msg'] . "Presentacion de producto agregada exitosamente. ";
	}
	
	
	
	if (isset($_POST['btn_edit_presentation'])){
		$query = "CALL `sp_productpresentation_edit`(";
		
		if (isset($_POST['lbl_code']) && !empty($_POST['lbl_code'])){
			$query = $query . "" . $_POST['lbl_code'] . ", ";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_new_presentation']) && !empty($_POST['txt_new_presentation'])){
			$query = $query . "'" . $_POST['txt_new_presentation'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_new_presentation_Description']) && !empty($_POST['txt_new_presentation_Description'])){
			$query = $query . "'" . $_POST['txt_new_presentation_Description'] . "',";
		} else {
			$query = $query . "'',";
		}
		
		if (isset($_POST['txt_new_presentation_units']) && !empty($_POST['txt_new_presentation_units'])){
			$query = $query . "" . $_POST['txt_new_presentation_units'] . "";
		} else {
			$query = $query . "0";
		}
		
		$query = $query . ");";
		
		//$_SESSION['msg'] = $_SESSION['msg'] . $query;
		
		fn_InsertQuery(Conexion(), $query);
		
		$_SESSION['msg'] = $_SESSION['msg'] . "Presentación de producto editada. ";
	}
	
	
	
	function fnDeplegarPresentacionesDeProducto(){
		$query = "CALL `sp_productpresentation_show`();";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 4);
		
		$tabla[1][0] = "Codigo de presentación";
		$tabla[1][1] = "Presentación";
		$tabla[1][2] = "Descripción";
		$tabla[1][3] = "Unidades";
		
		$_SESSION['html'] =  fnCrearTablaHtmlDeTablaBrand($tabla, 1);
		
		
		$_SESSION['msg'] = $_SESSION['msg'] . "";
	}





?>