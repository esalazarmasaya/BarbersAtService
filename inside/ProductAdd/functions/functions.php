<?php
	$data_relation = "productsadd";
	
	$_SESSION['data_relation'] = $data_relation;
	
	
	
	
	if (isset($_POST['btn_add_new_item'])){
		$query = "CALL `sp_product_add`(";
		
		if (isset($_POST['txt_new_name']) && !empty($_POST['txt_new_name'])){
			$query = $query . "'" . $_POST['txt_new_name'] . "', ";
		} else {
			$query = $query . "'', ";
		}
		
		if (isset($_POST['txt_new_description']) && !empty($_POST['txt_new_description'])){
			$query = $query . "'" . $_POST['txt_new_description'] . "',";
		} else {
			$query = $query . "'' , ";
		}
		
		if (isset($_POST['txt_new_presentation']) && !empty($_POST['txt_new_presentation'])){
			$query = $query . "" . $_POST['txt_new_presentation'] . ",";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_new_barcode']) && !empty($_POST['txt_new_barcode'])){
			$query = $query . "" . $_POST['txt_new_barcode'] . ",";
		} else {
			$query = $query . "0 , ";
		}
		
		if (isset($_POST['txt_new_cost_price']) && !empty($_POST['txt_new_cost_price'])){
			$query = $query . "" . $_POST['txt_new_cost_price'] . ",";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_new_State']) && !empty($_POST['txt_new_State'])){
			$query = $query . "" . $_POST['txt_new_State'] . ",";
		} else {
			$query = $query . "1 , ";
		}
		
		if (isset($_POST['txt_new_sales_price']) && !empty($_POST['txt_new_sales_price'])){
			$query = $query . "" . $_POST['txt_new_sales_price'] . ",";
		} else {
			$query = $query . "0 , ";
		}
		
		if (isset($_POST['txt_new_type']) && !empty($_POST['txt_new_type'])){
			$query = $query . "" . $_POST['txt_new_type'] . ",";
		} else {
			$query = $query . "NULL , ";
		}
		
		if (isset($_POST['txt_new_brand']) && !empty($_POST['txt_new_brand'])){
			$query = $query . "" . $_POST['txt_new_brand'] . "";
		} else {
			$query = $query . "NULL ";
		}
		
		$query = $query . ");";
		
		
		//$_SESSION['msg'] = $_SESSION['msg'] . $query;
		//echo $query;
		
		fn_InsertQuery(Conexion(), $query);
		
		$_SESSION['msg'] = $_SESSION['msg'] . "Información agregada. ";
		
		header("Location: ../Products/index.php ",TRUE,301);
	}
	
?>