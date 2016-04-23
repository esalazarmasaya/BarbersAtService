<?php
	if (isset($_POST['sbmt_add_new_user'])){
		$query = "CALL `sp_user_add`(";
		 
		if (isset($_POST['txt_firstname']) && !empty($_POST['txt_firstname'])){
			$query = $query . "'" . addslashes(htmlspecialchars(htmlentities($_POST['txt_firstname']))) . "', ";
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
		$newpass = md5($_POST['txt_password']);
		if (isset($_POST['txt_password']) && !empty($_POST['txt_password']) && isset($_POST['txt_retype_password']) && !empty($_POST['txt_retype_password'])){
			if ($_POST['txt_password'] == $_POST['txt_retype_password']){
				$query = $query . "'" . $newpass . "');";
				$_SESSION['msg'] = $_SESSION['msg'] . fn_InsertQuery(Conexion(), $query);
			} else {
				$query = $query . "'');";
			}
		} else {
			$query = $query . "'');";
		}
	}
	
	if (isset($_POST['btn_login_page'])){
		
		$tabla = fnSelectAnyQuery(Conexion(), "CALL `sp_user_login`('".$_POST['txt_email']."', '".md5($_POST['txt_password'])."');", 10);
		/*fnCrearTablaHtmlDeTabla($tabla, 0);*/
		if (isset($tabla[2][7]) && !empty($tabla[2][7])){
			$_SESSION['usermail'] = $tabla[2][7];
			$_SESSION['userrol'] = $tabla[2][11];
			
			$tabla = fnSelectAnyQuery(Conexion(), "CALL `sp_permission_get_all_by_role`(". $_SESSION['userrol'] .");", 1);
			for($filas = 2; $filas <= $tabla[0][0] ; $filas++)
			{
				$_SESSION['PageCode'.$tabla[$filas][0]] = 1;
				//$_SESSION['msg'] = $_SESSION['msg'] . 'PageCode'.$tabla[$filas][0];
			}
			echo '<meta http-equiv="refresh" content="0; url=inside/main/index.php" /><script type="text/javascript"> window.location="inside/main/index.php"; </script>';
			$_SESSION['msg'] = $_SESSION['msg'] . "Bienvenido a Mint Barbers & Crew";
		}else{
			echo '<meta http-equiv="refresh" content="0; url=index.php" /><script type="text/javascript"> window.location="index.php"; </script>';
			$_SESSION['msg'] = $_SESSION['msg'] . "ERROR: El usuario o la contraseña ingresados no son correctos, o el usuario no existe.";
		}
		
	}
	
	

	
?>