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
		
		if (!isset($_SESSION['PageCode11']) && empty($_SESSION['PageCode11'])) {
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
			<a href="<?php echo $pageid; ?>">Nuevo producto</a>
		</h2>
	</div>
	
	<!--//banner-->
	
	<!--content-->
	<div class="grid-form">
 		<div class="grid-form1">
	 		<h3 id="forms-example" class="">Servicio</h3>
	 		
			<?php 
				$value = '<form action="index.php" method="post" id="frm_add_new_item">
					<div class="form-group">
						<label for="exampleInputEmail1">Nuevo servicio:</label>
						<input type="text" class="form-contbrand" id="exampleInputEmail1" name="txt_new_name" placeholder="Nuevo producto" form="frm_add_new_item">
					</div>
					
					<div class="form-group">
						<label for="exampleInputEmail1">Precio:</label>
						<input type="number" class="form-contbrand" id="exampleInputEmail1" name="txt_new_price" placeholder="Precio" form="frm_add_new_item">
					</div>
					
					<button type="submit" class="btn btn-default" name="btn_add_new_item" form="frm_add_new_item">Agregar nuevo producto</button>
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