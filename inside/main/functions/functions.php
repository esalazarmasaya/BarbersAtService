<?php
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
	
	if (isset($_POST['btn_login_page'])){
		$tabla = fnSelectAnyQuery(Conexion(), "CALL `sp_user_login`('".$_POST['txt_email']."', '".$_POST['txt_password']."');", 10);
		fnCrearTablaHtmlDeTabla($tabla, 0);
		$_SESSION['usermail'] = $tabla[2][7];
		echo "<script type='text/javascript'> window.location='www.google.com'; </script>";
	}
	
	

	
?>