<?php
	
	function fnCrearTablaHtmlDeTablaUser($tabla, $conEncabezados1Sin0){
		
		$tabla_roles = fnDeplegarRoles();
		
		$colNameId[0] = "lbl_code";
		$colNameId[1] = "txt_firstname";
		$colNameId[2] = "txt_secondname";
		$colNameId[3] = "txt_first_last_name";
		$colNameId[4] = "txt_second_last_name";
		$colNameId[5] = "txt_born_date";
		$colNameId[6] = "txt_phone";
		$colNameId[7] = "txt_email";
		$colNameId[8] = "txt_creation_date";
		$colNameId[9] = "txt_user_state";
		$colNameId[10] = "txt_role";
		
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
								//$value = $value . '<td class="table-text"><h6>' . $tabla[1][2] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][3] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][4] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][5] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][6] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][7] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][8] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][9] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][10] . '</h6></td>';
								$value = $value . '<td class="march"></td>';
								$value = $value . '
								</tr>
							</tbody>
						</table>';
						for($filas = 2; $filas <= $tabla[0][0] ; $filas++)
						{
							$value = $value . '
								<form action="index.php" method="post" id="frm_edit_user_' . $filas . '">
									<table class="table">
										<tbody>
											<tr class="table-row">';
									
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[0] . '" placeholder="' . $tabla[$filas][0] . '" value="' . $tabla[$filas][0] . '" form="frm_edit_user_' . $filas . '" readonly></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[1] . '" placeholder="' . $tabla[$filas][1] . '" value="' . $tabla[$filas][1] . '" form="frm_edit_user_' . $filas . '"></td>';
									//$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[2] . '" placeholder="' . $tabla[$filas][2] . '" value="' . $tabla[$filas][2] . '" form="frm_edit_user_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[3] . '" placeholder="' . $tabla[$filas][3] . '" value="' . $tabla[$filas][3] . '" form="frm_edit_user_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[4] . '" placeholder="' . $tabla[$filas][4] . '" value="' . $tabla[$filas][4] . '" form="frm_edit_user_' . $filas . '"></td></tr><tr>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[5] . '" placeholder="' . $tabla[$filas][5] . '" value="' . $tabla[$filas][5] . '" form="frm_edit_user_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[6] . '" placeholder="' . $tabla[$filas][6] . '" value="' . $tabla[$filas][6] . '" form="frm_edit_user_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[7] . '" placeholder="' . $tabla[$filas][7] . '" value="' . $tabla[$filas][7] . '" form="frm_edit_user_' . $filas . '"></td>';
									$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[8] . '" placeholder="' . $tabla[$filas][8] . '" value="' . $tabla[$filas][8] . '" form="frm_edit_user_' . $filas . '" readonly></td></tr><tr>';
									
									$value = $value . '<td class="march"><select name="' . $colNameId[9] . '">';
									if ($tabla[$filas][9]==0){
										$value = $value . '<option value="0" selected>Inactive</option>';
										$value = $value . '<option value="1">Active</option>';
									}else{
										$value = $value . '<option value="0">Inactive</option>';
										$value = $value . '<option value="1" selected>Active</option>';
									}
									$value = $value . '</select>';
									
									
									/*$value = $value . '<td class="march"><input type="text" class="form-control" id="exampleInputEmail1" name="' . $colNameId[10] . '" placeholder="' . $tabla[$filas][10] . '" value="' . $tabla[$filas][10] . '" form="frm_edit_user_' . $filas . '"></td>';*/
									
									
									$roles_html ='<td class="march"><select name="txt_role" form="frm_edit_user_' . $filas . '">';
									for($filas_roles = 2; $filas_roles <= $tabla_roles[0][0] ; $filas_roles++){
										if($tabla[$filas][10] == $tabla_roles[$filas_roles][0]){
											$roles_html = $roles_html . '<option value="' .$tabla_roles[$filas_roles][0] . '" selected>' .$tabla_roles[$filas_roles][2] . '</option>';
										}else{
											$roles_html = $roles_html . '<option value="' .$tabla_roles[$filas_roles][0] . '">' .$tabla_roles[$filas_roles][2] . '</option>';
										}
									}
									
									$roles_html = $roles_html . '</select></td>';
									
									$value = $value . $roles_html;
									/*$value = $value . '<td class="march"><select name="' . $colNameId[3] . '" form="frm_edit_user_' . $filas . '">';
									if ($tabla[$filas][3]==1){
									 	$value = $value . '
											<option value="1" selected>Active</option>
											<option value="0">Inactive</option>';
									 } else {
									 	$value = $value . '
											<option value="1">Active</option>
											<option value="0" selected>Inactive</option>';
									 }
									$value = $value . '</select></td>';*/
									$value = $value . '<td class="march"><button type="submit" class="btn btn-default" name="sbmt_edit_user" form="frm_edit_user_' . $filas . '">Edit user</button></td>';
							
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



	
	function fnDeplegarUsuarios(){
		$query = "CALL `sp_user_show_all`();";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 11);
		
		$tabla[1][0] = "User Code";
		$tabla[1][1] = "First Name";
		$tabla[1][2] = "Second Name";
		$tabla[1][3] = "First Last Name";
		$tabla[1][4] = "Second Last Name";
		$tabla[1][5] = "Born Date";
		$tabla[1][6] = "Phone";
		$tabla[1][7] = "Email";
		$tabla[1][8] = "Creation date";
		$tabla[1][9] = "User state";
		$tabla[1][10] = "Role";
		
		$_SESSION['html'] =  fnCrearTablaHtmlDeTablaUser($tabla, 1);
		
		
		$_SESSION['msg'] = $_SESSION['msg'] . "";
	}
	
	
	function fnDeplegarRoles(){
		$query = "CALL `sp_role_show`();";
		
		
		$tabla_roles = fnSelectAnyQuery(Conexion(), $query, 4);
		
		$tabla_roles[1][0] = "Role code";
		$tabla_roles[1][1] = "Role name";
		$tabla_roles[1][2] = "Role description";
		$tabla_roles[1][3] = "Role state";
		
		return $tabla_roles;
		
	}
	
	
	
	
	if (isset($_POST['sbmt_add_new_user'])){
		$query = "CALL `sp_user_add`(";
		 
		if (isset($_POST['txt_firstname']) && !empty($_POST['txt_firstname'])){
			$query = $query . "'" . $_POST['txt_firstname'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_secondname']) && !empty($_POST['txt_secondname'])){
			$query = $query . "'" . $_POST['txt_secondname'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_first_last_name']) && !empty($_POST['txt_first_last_name'])){
			$query = $query . "'" . $_POST['txt_first_last_name'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_second_last_name']) && !empty($_POST['txt_second_last_name'])){
			$query = $query . "'" . $_POST['txt_second_last_name'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_born_date']) && !empty($_POST['txt_born_date'])){
			$query = $query . "'" . $_POST['txt_born_date'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_phone']) && !empty($_POST['txt_phone'])){
			$query = $query . "'" . $_POST['txt_phone'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_email']) && !empty($_POST['txt_email'])){
			$query = $query . "'" . $_POST['txt_email'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_password']) && !empty($_POST['txt_password']) && isset($_POST['txt_retype_password']) && !empty($_POST['txt_retype_password'])){
			if ($_POST['txt_password'] == $_POST['txt_retype_password']){
				$query = $query . "'" . $_POST['txt_password'] . "');";
				$msg = $msg . fn_InsertQuery(Conexion(), $query);
			} else {
				$query = $query . "'');";
			}
		} else {
			$query = $query . "'');";
		}
	}
	
	
	
	
	
	
	
	
	if (isset($_POST['sbmt_edit_user'])){
		$query = "CALL `sp_user_edit`(";
		 
		 if (isset($_POST['lbl_code']) && !empty($_POST['lbl_code'])){
			$query = $query . "" . $_POST['lbl_code'] . ", ";
		} else {
			$query = $query . ", ";
		}
		
		if (isset($_POST['txt_firstname']) && !empty($_POST['txt_firstname'])){
			$query = $query . "'" . $_POST['txt_firstname'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_secondname']) && !empty($_POST['txt_secondname'])){
			$query = $query . "'" . $_POST['txt_secondname'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_first_last_name']) && !empty($_POST['txt_first_last_name'])){
			$query = $query . "'" . $_POST['txt_first_last_name'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_second_last_name']) && !empty($_POST['txt_second_last_name'])){
			$query = $query . "'" . $_POST['txt_second_last_name'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_born_date']) && !empty($_POST['txt_born_date'])){
			$query = $query . "'" . $_POST['txt_born_date'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_phone']) && !empty($_POST['txt_phone'])){
			$query = $query . "'" . $_POST['txt_phone'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_email']) && !empty($_POST['txt_email'])){
			$query = $query . "'" . $_POST['txt_email'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_user_state']) && !empty($_POST['txt_user_state'])){
			$query = $query . "" . $_POST['txt_user_state'] . ", ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_role']) && !empty($_POST['txt_role'])){
			$query = $query . "" . $_POST['txt_role'] . " ";
		} else {
			$query = $query . "'' ";
		}
		
		
		$query = $query . ");";
		
		$_SESSION['msg'] = $_SESSION['msg'] . fn_InsertQuery(Conexion(), $query);
		
		
	}

?>