<?php
	
	
	function fnCrearTablaHtmlDeTablaPermisos($tabla, $conEncabezados1Sin0){
		
		$tabla_roles = fnGetRoles();
		$tabla_webpages = fnGetWebpages();
		
		$colNameId[0] = "lbl_role_code";
		$colNameId[1] = "";
		$colNameId[2] = "txt_Web_Page_Code";
		$colNameId[3] = "";
		$colNameId[4] = "txt_state";
		
		$value = '
			<div class="tab-pane active text-style" id="tab1">
				<div class="inbox-right">
					<div class="mailbox-content">
						<table class="table">
							<tbody>
								<tr class="table-row">
									';
								/*$value = $value . '<td class="table-text"><h6>' . $tabla[1][0] . '</h6></td>';*/
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][1] . '</h6></td>';
								/*$value = $value . '<td class="table-text"><h6>' . $tabla[1][2] . '</h6></td>';*/
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][3] . '</h6></td>';
								$value = $value . '<td class="table-text"><h6>' . $tabla[1][4] . '</h6></td>';
								$value = $value . '<td class="march"></td>';
								$value = $value . '
								</tr>
							</tbody>
						</table>';
						for($filas = 2; $filas <= $tabla[0][0] ; $filas++)
						{
							$value = $value . '
								<form action="index.php" method="post" id="frm_edit_permission_' . $filas . '">
									<table class="table">
										<tbody>
											<tr class="table-row">';
									
									
										
												$value = $value . '
													<td class="table-text">
														<input type="hidden" 
															class="form-control" 
															id="exampleInputEmail1" 
															name="' . $colNameId[0] . '" 
															placeholder="" 
															value="' . $tabla[$filas][0] . '" 
															form="frm_edit_permission_' . $filas . '" 
															readonly
														>
																' . $tabla[$filas][1] . '
														</input>
													</td>';
													
													$value = $value . '
													<td class="table-text">
														<input type="hidden" 
															class="form-control" 
															id="exampleInputEmail1" 
															name="' . $colNameId[2] . '" 
															placeholder="" 
															value="' . $tabla[$filas][2] . '" 
															form="frm_edit_permission_' . $filas . '" 
															readonly
														>
																' . $tabla[$filas][3] . '
														</input>
													</td>';
									
									
									$value = $value . '
										<td class="table-text">
											<select 
												name="' . $colNameId[4] . '" 
												form="frm_edit_permission_' . $filas . '">';
													 if ($tabla[$filas][4]==1){
													 	$value = $value . '
															<option value="1" selected>Activo</option>
															<option value="0">Inactivo</option>';
													 } else {
													 	$value = $value . '
															<option value="1">Activo</option>
															<option value="0" selected>Inactivo</option>';
													 }
									$value = $value . '
											</select>
										</td>';
									$value = $value . '<td class="table-text"><button type="submit" class="btn btn-default" name="btn_edit_permission" form="frm_edit_permission_' . $filas . '">Editar permiso</button></td>';
							
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







	if (isset($_POST['btn_edit_permission'])){
		$query = "CALL `sp_permission_update`(";
		 
		if (isset($_POST['lbl_role_code']) && !empty($_POST['lbl_role_code'])){
			$query = $query . "" . $_POST['lbl_role_code'] . ", ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_Web_Page_Code']) && !empty($_POST['txt_Web_Page_Code'])){
			$query = $query . "" . $_POST['txt_Web_Page_Code'] . ", ";
		} else {
			$query = $query . "'', ";
		}

		
		if (isset($_POST['txt_state']) && !empty($_POST['txt_state'])){
			$query = $query . "" . $_POST['txt_state'] . "";
		} else {
			$query = $query . "0";
		}
		$query = $query . ");";
		$_SESSION['msg'] = $_SESSION['msg'];
		
		fn_InsertQuery(Conexion(), $query);
		
		$_SESSION['msg'] = $_SESSION['msg'] . "El permiso ha sido modificado. ";
	}
	
	
	
	
	
	
	
	function fnDeplegarPermissions(){
		$query = "CALL `sp_permission_get_all`();";
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 5);
		
		$tabla[1][0] = "Numero de Rol";
		$tabla[1][1] = "Nombre del Rol";
		$tabla[1][2] = "Numero de Pagina";
		$tabla[1][3] = "Nombre de Pagina";
		$tabla[1][4] = "Permiso";
		
		$_SESSION['html'] =  fnCrearTablaHtmlDeTablaPermisos($tabla, 1);
		
		
		$_SESSION['msg'] = $_SESSION['msg'] . "";
	}

	
	function fnGetWebpages(){
		$query = "CALL `sp_webpage_get_all`();";
		
		$tabla_webpages = fnSelectAnyQuery(Conexion(), $query, 5);
		
		$tabla_webpages[1][0] = "Code";
		$tabla_webpages[1][1] = "Name";
		$tabla_webpages[1][2] = "URL";
		$tabla_webpages[1][3] = "Description";
		$tabla_webpages[1][4] = "State";
		
		return $tabla_webpages;
	}
	
	function fnGetRoles(){
		$query = "CALL `sp_role_show`();";
		
		
		$tabla_roles = fnSelectAnyQuery(Conexion(), $query, 4);
		
		$tabla_roles[1][0] = "Role code";
		$tabla_roles[1][1] = "Role name";
		$tabla_roles[1][2] = "Role description";
		$tabla_roles[1][3] = "Role state";
		
		return $tabla_roles;
	}

?>