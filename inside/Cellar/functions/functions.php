<?php
	
	function fnCrearTablaHtmlDeTablacellar($tabla, $conEncabezados1Sin0){
		
		$colNameId[0] = "lbl_code";
		$colNameId[1] = "txt_new_cellar";
		$colNameId[2] = "txt_new_cellar_Description";
		$colNameId[3] = "txt_new_cellar_Length";
		$colNameId[4] = "txt_new_cellar_Latitude";
		$colNameId[5] = "txt_new_cellar_Shopping";
		
		$value = '
			<div class="col-md-14 tab-content tab-content-in">
					<div class="tab-pane active text-style" id="tab1">
						<div class="inbox-right">
							<div class="mailbox-content">
		';
										for($filas = 1; $filas <= $tabla[0][0] ; $filas++)
										{
											if($filas > 1)
											{
												$value = $value . '<form action="index.php" method="post" id="frm_edit_cellar">';
											}
												$value = $value . '
												
													<table class="table">
														<tbody>
															<tr class="table-row">
												';
											
											
											/*if($conEncabezados1Sin0 == 1 && $filas == 1){
												$value = $value . '<tr class="tr-hdr">';
											}else{
												if($filas == 1){
													
												}
												else {
													$value = $value . '<tr class="tr">';
												}
											}*/
											
											for($col = 0; $col <= $tabla[0][1]-1; $col++){
												if($conEncabezados1Sin0 == 1 && $filas == 1){
													/*if ($col == 0){
														$value = $value . '<td class="table-text"></td>';
													}else{*/
														$value = $value . '<td class="table-text"><h6>' . $tabla[$filas][$col] . '</h6></td>';
													/*}*/ 
												}else{
													if($filas == 1){
														if ($col == $tabla[0][1]-1){
															$value = $value . '<td class="march"></td>';
														}
													}
													else {
														if ($col == 0){
															$value = $value . '<td class="march"><input type="text" class="form-contcellar" id="exampleInputEmail1" name="' . $colNameId[$col] . '" placeholder="' . $tabla[$filas][$col] . '" value="' . $tabla[$filas][$col] . '" readonly></td>';
														}else{
															$value = $value . '<td class="march"><input type="text" class="" id="exampleInputEmail1" name="' . $colNameId[$col] . '" placeholder="' . $tabla[$filas][$col] . '" value="' . $tabla[$filas][$col] . '"></td>';
														}
														
														if ($col == $tabla[0][1]-1){
															$value = $value . '<td class="march"><button type="submit" class="btn btn-default" name="btn_edit_cellar" form="frm_edit_cellar">Edit cellar</button></td>';
														}
													}
												}
												
											}
											$value = $value . '
														</tr>
													</tbody>
												</table>
											
											';
											
											if($filas > 1)
											{
												$value = $value . '</form>';
											}
										}
		$value = $value . '
					</div>
				</div>
			</div>
		<div>
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







	if (isset($_POST['btn_new_cellar_Description'])){
		$query = "CALL `sp_cellar_add`(";
		 
		if (isset($_POST['txt_new_cellar']) && !empty($_POST['txt_new_cellar'])){
			$query = $query . "'" . $_POST['txt_new_cellar'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_new_cellar_Description']) && !empty($_POST['txt_new_cellar_Description'])){
			$query = $query . "'" . $_POST['txt_new_cellar_Description'] . "',";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_new_cellar_Length']) && !empty($_POST['txt_new_cellar_Length'])){
			$query = $query . "'" . $_POST['txt_new_cellar_Length'] . "',";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_new_cellar_Latitude']) && !empty($_POST['txt_new_cellar_Latitude'])){
			$query = $query . "'" . $_POST['txt_new_cellar_Latitude'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_new_cellar_Shopping']) && !empty($_POST['txt_new_cellar_Shopping'])){
			$query = $query . "'" . $_POST['txt_new_cellar_Shopping'] . "'";
		} else {
			$query = $query . "''";
		}
		
		$query = $query . ");";
		$_SESSION['msg'] = $_SESSION['msg'];
		
		fn_InsertQuery(Conexion(), $query);
		
		$_SESSION['msg'] = $_SESSION['msg'] . "Cellar succesfully added. ";
	}
	
	
	
	if (isset($_POST['btn_edit_cellar'])){
		$query = "CALL `sp_cellar_edit`(";
		
		if (isset($_POST['lbl_code']) && !empty($_POST['lbl_code'])){
			$query = $query . "" . $_POST['lbl_code'] . ", ";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_new_cellar']) && !empty($_POST['txt_new_cellar'])){
			$query = $query . "'" . $_POST['txt_new_cellar'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_new_cellar_Description']) && !empty($_POST['txt_new_cellar_Description'])){
			$query = $query . "'" . $_POST['txt_new_cellar_Description'] . "',";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_new_cellar_Length']) && !empty($_POST['txt_new_cellar_Length'])){
			$query = $query . "'" . $_POST['txt_new_cellar_Length'] . "',";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_new_cellar_Latitude']) && !empty($_POST['txt_new_cellar_Latitude'])){
			$query = $query . "'" . $_POST['txt_new_cellar_Latitude'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_new_cellar_Shopping']) && !empty($_POST['txt_new_cellar_Shopping'])){
			$query = $query . "'" . $_POST['txt_new_cellar_Shopping'] . "'";
		} else {
			$query = $query . "''";
		}
		
		$query = $query . ");";
		
		$_SESSION['msg'] = $_SESSION['msg'] . $query;
		
		fn_InsertQuery(Conexion(), $query);
		
		$_SESSION['msg'] = $_SESSION['msg'] . "Cellar succesfully added. ";
	}
	
	
	
	function fnDeplegarcellars(){
		$query = "CALL `sp_cellar_show`();";
		
		
		$tabla = fnSelectAnyQuery(Conexion(), $query, 6);
		
		$tabla[1][0] = "Code";
		$tabla[1][1] = "Name";
		$tabla[1][2] = "Description";
		$tabla[1][3] = "Length";
		$tabla[1][4] = "Latitude";
		$tabla[1][5] = "Shopping";
		
		$_SESSION['html'] =  fnCrearTablaHtmlDeTablacellar($tabla, 1);
		
		
		$_SESSION['msg'] = $_SESSION['msg'] . "";
	}





?>