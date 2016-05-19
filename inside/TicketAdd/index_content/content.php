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
		
		if (!isset($_SESSION['PageCode15']) && empty($_SESSION['PageCode15'])) {
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
			<a href="<?php echo $pageid; ?>">Turno Nuevo</a>
		</h2>
	</div>
	
	<!--//banner-->
	
	<!--content-->
	<div class="grid-form">
 		<div class="grid-form1">
	 		<h3 id="forms-example" class="">Turno Nuevo</h3>

					


			<?php 
				$value = '<form action="index.php" method="post" id="frm_add_new_item">
					<div class="form-group1">
						<label for="exampleInputEmail1">Elija Servicio:</label>
						<select name="slct_service" id="slct_service">';


						$tabla_servicios = fnTraerDatosServicios();
						for ($filas = 3; $filas <= $tabla_servicios[0][0]; $filas++){
							$value = $value . '<option value="' . $tabla_servicios[$filas][0] . '">' . $tabla_servicios[$filas][1] . ' - Q' . $tabla_servicios[$filas][2] . '</option>';
						}
					
						$value = $value . '
						</select>
					</div>
					</br>
					
					<div class="form-group1">
						<label for="exampleInputEmail1">Elija Empleado:</label>
						<select name="slct_employee" id="slct_employee">';

						$tabla_empleados = fnTraerDatosEmpleados();
						for ($filas = 2; $filas <= $tabla_empleados[0][0]; $filas++){
							$value = $value . '<option value="' . $tabla_empleados[$filas][0] . '">' . $tabla_empleados[$filas][3] . ' ' . $tabla_empleados[$filas][5] .  '</option>';
						}
					
						$value = $value . '
						</select>
					</div>
					</br>	
					<button type="submit" class="btn btn-default" name="btn_add_new_item" form="frm_add_new_item">Aceptar Turno</button>
					<a href="http://www.url.com/yourpage.php">
					  <input type="button" class="btn btn-default" value="Cancelar" onclick="history.go(-1);" />
					</a>					
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