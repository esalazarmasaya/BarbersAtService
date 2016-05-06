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
		
		if (!isset($_SESSION['PageCode25']) && empty($_SESSION['PageCode25'])) {
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
			<a href="<?php echo $pageid; ?>">Transaccion Nueva</a>
		</h2>
	</div>
	
	<!--//banner-->
	
	<!--content-->
	<div class="grid-form">
 		<div class="grid-form1">
	 		<h3 id="forms-example" class="">Transaccion Nueva</h3>
	 		
			<?php 
				$value = '<form action="index.php" method="post" id="frm_add_new_item">
					<div class="form-group">
						<label for="exampleInputEmail1">Cliente:</label>
						<select name="slct_user" id="slct_user">';
						$tabla_Usuarios = fnTraerDatosUsuarios();
						for ($filas = 2; $filas <= $tabla_Usuarios[0][0]; $filas++){
							$value = $value . '<option value="' . $tabla_Usuarios[$filas][0] . '">' . $tabla_Usuarios[$filas][1] . ' ' . $tabla_Usuarios[$filas][3] . ' (' . $tabla_Usuarios[$filas][7] . ')' . '</option>';
						}
					
						$value = $value . '
						</select>
					</div>
					
					
					<button type="submit" class="btn btn-default" name="btn_add_new_item" form="frm_add_new_item">Agregar nueva transaccion</button>
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