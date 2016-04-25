<?php
	$data_relation = "serviceadd";
	
	$_SESSION['data_relation'] = $data_relation;
	
	
	
	
	if (isset($_POST['btn_add_new_item'])){
		$query = "CALL `sp_service_add`(";
		
		if (isset($_POST['txt_new_name']) && !empty($_POST['txt_new_name'])){
			$query = $query . "'" . $_POST['txt_new_name'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_new_price']) && !empty($_POST['txt_new_price'])){
			$query = $query . "" . $_POST['txt_new_price'] . "";
		} else {
			$query = $query . "NULL ";
		}
				
		$query = $query . ");";
		
		
		//$_SESSION['msg'] = $_SESSION['msg'] . $query;
		//echo $query;
		
		fn_InsertQuery(Conexion(), $query);
		
		$_SESSION['msg'] = $_SESSION['msg'] . "Información agregada. ";
		
		
	}
	
?>