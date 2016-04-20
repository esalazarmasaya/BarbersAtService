<?php $pageid = "../Brand/index.html"; ?>

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
		
		if (!isset($_SESSION['PageCode9']) && empty($_SESSION['PageCode9'])) {
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
			<a href="<?php echo $pageid; ?>">New brandes</a>
		</h2>
	</div>
	
	<!--//banner-->
	
	<!--content-->
	<div class="grid-form">
 		<div class="grid-form1">
	 		<h3 id="forms-example" class="">Tipo de producto</h3>
	 		
			<form action="index.php" method="post" id="frm_add_new_product_type">
				<div class="form-group">
					<label for="exampleInputEmail1">Nuevo tipo de producto:</label>
					<input type="text" class="form-contbrand" id="exampleInputEmail1" name="txt_new_type" placeholder="Nuevo tipo de producto" form="frm_add_new_product_type">
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">Descripción:</label>
					<input type="text" class="form-contbrand" id="exampleInputEmail1" name="txt_new_type_Description" placeholder="Descripcion" form="frm_add_new_product_type">
				</div>

				<button type="submit" class="btn btn-default" name="btn_add_new_type" form="frm_add_new_product_type">Agregar nuevo tipo</button>
			</form>
			
			</br>
			
			<?php 
				fnDeplegarTiposDeProducto(); 
				echo $_SESSION['html'];
			?>
			
		</div>
		

	</div>
	

	<!--//content-->
	
	
	
	<!---->
	<div class="copy">
		<?php include "../global/footer.php"; ?>
	</div>
</div>