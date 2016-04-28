<?php $pageid = "../Product/index.php"; ?>

<div class="content-main">
	
	<!--msgbanner-->
	<?php 
		if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) {
			echo '
				<div class="banner">
					<h2>
						' . $_SESSION['msg'] . '
					</h2>
				</div>
				';
		}
		
		$_SESSION['msg'] = "";
		
		if (!isset($_SESSION['PageCode17']) && empty($_SESSION['PageCode17'])) {
			$_SESSION['msg'] = "No tiene permiso para ingresar a esta pagina. ";
			echo '
			<meta http-equiv="refresh" content="0; url=../../index.php" />
			<script type="text/javascript">window.location.href = "../main/index.php";</script>';
			
		}
	?>
	
	<!--banner-->
	<div class="banner">
		<h2>
			<a href="../main/index.html">Home</a>
			<i class="fa fa-angle-right"></i>
			<a href="<?php echo $pageid; ?>">Agregar tiempo promedio</a>
		</h2>
	</div>
	
	<!--//banner-->
	
	<!--content-->
	<div class="grid-form">
 		<div class="grid-form1">
	 		<h3 id="forms-example" class="">Tiempo promedio por servicio</h3>
	 		
			<?php 
				$value = '<form action="index.php" method="post" id="frm_add_new_item">
					
					<div class="form-group">
						<label for="exampleInputEmail1">Empleado:</label>
						<select name="slct_employee" id="slct_employee">';
						$tabla_empleados = fnTraerDatosEmpleados();
						for ($filas = 2; $filas <= $tabla_empleados[0][0]; $filas++){
							$value = $value . '<option value="' . $tabla_empleados[$filas][0] . '">' . $tabla_empleados[$filas][3] . ' ' . $tabla_empleados[$filas][5] .  '</option>';
						}
					
						$value = $value . '
						</select>
					</div>
					
					<div class="form-group">
						<label for="exampleInputEmail1">Servicio:</label>
						<select name="slct_service">
						';
						$tabla = fnTraerDatosServicios();
						 for ($fila = 2; $fila <= $tabla[0][0]; $fila++){
						 	$value = $value . '<option value="' . $tabla[$fila][0] . '">' . $tabla[$fila][1] . '</option>';
						 }
						
						$value = $value . '
						</select>
					</div>
					
					<div class="form-group">
						<label for="exampleInputEmail1">Tiempo maximo:</label>
						<input type="time" class="form-contbrand" id="exampleInputEmail1" name="txt_new_time_max" placeholder="Tiempo maximo para el servicio seleccionado" form="frm_add_new_item">
					</div>
					
					<div class="form-group">
						<label for="exampleInputEmail1">Tiempo minimo:</label>
						<input type="time" class="form-contbrand" id="exampleInputEmail1" name="txt_new_time_min" placeholder="Tiempo minimo para el servicio seleccionado" form="frm_add_new_item">
					</div>
					
					<div class="form-group">
						<label for="exampleInputEmail1">Tiempo promedio:</label>
						<input type="time" class="form-contbrand" id="exampleInputEmail1" name="txt_new_time_average" placeholder="Tiempo promedio para el servicio seleccionado" form="frm_add_new_item">
					</div>
					
					<button type="submit" class="btn btn-default" name="btn_add_new_item" form="frm_add_new_item">Agregar nuevo tiempo</button>
				</form>';
				
				echo $value;
			?>
			
			</br>
			
			<?php 
				//echo $_SESSION['html'];
			?>
			
		</div>
		

	</div>
	

	<!--//content-->
	
	
	
	<!---->
	<div class="copy">
		<?php include "../global/footer.php"; ?>
	</div>
</div>