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
		
		if (!isset($_SESSION['PageCode3']) && empty($_SESSION['PageCode3'])) {
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
	 		<h3 id="forms-example" class="">Brand</h3>
	 		
			<form action="index.php" method="post" id="frm_add_new_brand">
				<div class="form-group">
					<label for="exampleInputEmail1">New brand:</label>
					<input type="text" class="form-contbrand" id="exampleInputEmail1" name="txt_new_brand" placeholder="New brand" form="frm_add_new_brand">
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">Description:</label>
					<input type="text" class="form-contbrand" id="exampleInputEmail1" name="txt_new_brand_Description" placeholder="New brand" form="frm_add_new_brand">
				</div>
				
				<button type="submit" class="btn btn-default" name="btn_add_new_brand" form="frm_add_new_brand">Add new brand</button>
			</form>
			
			</br>
			
			<?php 
				fnDeplegarBrand(); 
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