<?php
	
	function fnCrearTablaHtmlDeTablaRole($tabla, $conEncabezados1Sin0){
		
		$colNameId[0] = "lbl_code";
		$colNameId[1] = "txt_new_rol";
		$colNameId[2] = "txt_new_rol_Description";
		$colNameId[3] = "txt_state";
		
		$value = '
			<div class="tab-pane active text-style" id="tab1">
				<div class="inbox-right">
					<div class="mailbox-content">
						<table class="table">
							<tbody>
								<tr class="table-row">
									';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][0] . '</h6></td>';
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
								<form action="index.php" method="post" id="frm_edit_rol_' . $filas . '">
									<table class="table">
										<tbody>
											<tr class="table-row">';
									
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[0] . '" placeholder="' . $tabla[$filas][0] . '" value="' . $tabla[$filas][0] . '" form="frm_edit_rol_' . $filas . '" readonly></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[1] . '" placeholder="' . $tabla[$filas][1] . '" value="' . $tabla[$filas][1] . '" form="frm_edit_rol_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[2] . '" placeholder="' . $tabla[$filas][2] . '" value="' . $tabla[$filas][2] . '" form="frm_edit_rol_' . $filas . '"></td>';
									$value = $value . '<td class="march"><select name="' . $colNameId[3] . '" form="frm_edit_rol_' . $filas . '">';
									 if ($tabla[$filas][3]==1){
									 	$value = $value . '
											<option value="1" selected>Active</option>
											<option value="0">Inactive</option>';
									 } else {
									 	$value = $value . '
											<option value="1">Active</option>
											<option value="0" selected>Inactive</option>';
									 }
									$value = $value . '</select></td>';
									$value = $value . '<td class="march"><button type="submit" class="btn btn-default" name="btn_edit_rol" form="frm_edit_rol_' . $filas . '">Edit rol</button></td>';
							
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







	if (isset($_POST['btn_new_rol_Description'])){
		$query = "CALL `sp_rol_add`(";
		 
		if (isset($_POST['txt_new_rol']) && !empty($_POST['txt_new_rol'])){
			$query = $query . "'" . $_POST['txt_new_rol'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_new_rol_Description']) && !empty($_POST['txt_new_rol_Description'])){
			$query = $query . "'" . $_POST['txt_new_rol_Description'] . "'";
		} else {
			$query = $query . "''";
		}
		
		$query = $query . ");";
		$_SESSION['msg'] = $_SESSION['msg'];
		
		fn_InsertQuery(Conexion(), $query);
		
		$_SESSION['msg'] = $_SESSION['msg'] . "Rol succesfully added. ";
	}
	
	
	
	if (isset($_POST['btn_edit_rol'])){
		$query = "CALL `sp_rol_edit`(";
		
		if (isset($_POST['lbl_code']) && !empty($_POST['lbl_code'])){
			$query = $query . "" . $_POST['lbl_code'] . ", ";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_new_rol']) && !empty($_POST['txt_new_rol'])){
			$query = $query . "'" . $_POST['txt_new_rol'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_new_rol_Description']) && !empty($_POST['txt_new_rol_Description'])){
			$query = $query . "'" . $_POST['txt_new_rol_Description'] . "',";
		} else {
			$query = $query . "'',";
		}
		
		if (isset($_POST['txt_state']) && !empty($_POST['txt_state'])){
			$query = $query . "" . $_POST['txt_state'] . "";
		} else {
			$query = $query . "0";
		}
		
		$query = $query . ");";
		
		$_SESSION['msg'] = $_SESSION['msg'] . $query;
		
		fn_InsertQuery(Conexion(), $query);
		
		$_SESSION['msg'] = $_SESSION['msg'] . "Rol succesfully added. ";
	}
	
	
	
	function fnDeplegarRoles(){
		$query = "CALL `sp_role_show`();";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 4);
		
		$tabla[1][0] = "Role code";
		$tabla[1][1] = "Role name";
		$tabla[1][2] = "Role description";
		$tabla[1][3] = "Role state";
		
		$_SESSION['html'] =  fnCrearTablaHtmlDeTablaRole($tabla, 1);
		
		
		$_SESSION['msg'] = $_SESSION['msg'] . "";
	}





?>