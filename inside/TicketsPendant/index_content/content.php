<?php $pageid = "../TicketsPendant/index.php"; ?>

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
		
		if (!isset($_SESSION['PageCode20']) && empty($_SESSION['PageCode20'])) {
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
			<a href="<?php echo $pageid; ?>">Turnos pendientes</a>
		</h2>
	</div>
	
	<!--//banner-->
	
	<!--content-->
	<div class="grid-form">
 		<div class="grid-form1">
	 		<h3 id="forms-example" class="">Turnos pendientes</h3>
	 		
			<?php 
				/*$value = '<form action="index.php" method="post" id="frm_add_new_product">
					<div class="form-group">
						<label for="exampleInputEmail1">Nuevo producto:</label>
						<input type="text" class="form-contbrand" id="exampleInputEmail1" name="txt_new_name" placeholder="Nuevo producto" form="frm_add_new_product">
					</div>
					
					<div class="form-group">
						<label for="exampleInputEmail1">Descripcion:</label>
						<input type="text" class="form-contbrand" id="exampleInputEmail1" name="txt_new_sale_description" placeholder="Descripcion" form="frm_add_new_product">
					</div>
					
					<div class="form-group">
						<label for="exampleInputEmail1">Presentacion:</label>
						<input type="text" class="form-contbrand" id="exampleInputEmail1" name="txt_new_presentation" placeholder="Presentacion" form="frm_add_new_product">
					</div>
					
					<!--div class="form-group">
						<label for="exampleInputEmail1">Codigo de barras:</label>
						<input type="text" class="form-contbrand" id="exampleInputEmail1" name="txt_new_barcode" placeholder="Codigo de barras" form="frm_add_new_product">
					</div-->
					
					<div class="form-group">
						<label for="exampleInputEmail1">Precio de costo:</label>
						<input type="text" class="form-contbrand" id="exampleInputEmail1" name="txt_new_cost_price" placeholder="Precio de costo" form="frm_add_new_product">
					</div>
					
					<div class="form-group">
						<label for="exampleInputEmail1">Precio de venta:</label>
						<input type="text" class="form-contbrand" id="exampleInputEmail1" name="txt_new_sales_price" placeholder="Precio de venta" form="frm_add_new_product">
					</div>
					
					<div class="form-group">
						<label for="exampleInputEmail1">Tipo:</label>*/
						' . /*fnDeplegarTiposDeProducto()*/ " " . '
					/*</div>
					
					<div class="form-group">
						<label for="exampleInputEmail1">Marca:</label>
						<input type="text" class="form-contbrand" id="exampleInputEmail1" name="txt_new_brand" placeholder="Marca" form="frm_add_new_product">
					</div>
					
					<button type="submit" class="btn btn-default" name="btn_add_new_product" form="frm_add_new_product">Agregar nuevo producto</button>
				</form>';
				
				//echo $value;*/
			?>
			
			</br>
			
			<?php 
				//fnDeplegarProductos();
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