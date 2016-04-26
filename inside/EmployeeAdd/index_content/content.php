<?php $pageid = "../EmployeeAdd/index.php"; ?>

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
		
		if (!isset($_SESSION['PageCode13']) && empty($_SESSION['PageCode13'])) {
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
			<a href="<?php echo $pageid; ?>">Empleado nuevo</a>
		</h2>
	</div>
	
	<!--//banner-->
	
	<!--content-->
	<div class="grid-form">
 		<div class="grid-form1">
	 		<h3 id="forms-example" class="">Empleado nuevo</h3>
	 		
			<?php 
				$value = '<form action="index.php" method="post" id="frm_add_new_item">
					
					<div class="form-group">
						<label for="exampleInputEmail1">Usuario:</label>
						<select name="slct_user_code">
						' . fnTraerDatosUsuario() . '
						</select>
					</div>
					
					<div class="form-group">
						<label for="exampleInputEmail1">Tienda:</label>
						<select name="slct_cellar_code">
						' . fnTraerDatosBodega() . '
						</select>
					</div>
					
					<div class="form-group">
						<label for="exampleInputEmail1">Fecha de inicio:</label>
						<input type="date" class="form-contbrand" id="exampleInputEmail1" name="txt_new_initial_date" placeholder="Fecha de inicio" form="frm_add_new_item">
					</div>
					
					<div class="form-group">
						<label for="exampleInputEmail1">Hora inicio de almuerzo:</label>
						<input type="time" class="form-contbrand" id="exampleInputEmail1" name="txt_new_initial_lunchtime" placeholder="Fecha de inicio" form="frm_add_new_item">
					</div>
					
					<div class="form-group">
						<label for="exampleInputEmail1">Hora fin de almuerzo:</label>
						<input type="time" class="form-contbrand" id="exampleInputEmail1" name="txt_new_final_lunchtime" placeholder="Fecha de inicio" form="frm_add_new_item">
					</div>
					
					<button type="submit" class="btn btn-default" name="btn_add_new_item" form="frm_add_new_item">Agregar nuevo empleado</button>
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