<?php $pageid = "../Cellar/index.html"; ?>

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
		if (!isset($_SESSION['PageCode4']) && empty($_SESSION['PageCode4'])) {
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
			<a href="<?php echo $pageid; ?>">New cellars</a>
		</h2>
	</div>
	
	<!--//banner-->
	
	<!--content-->
	<div class="grid-form">
 		<div class="grid-form1">
	 		<h3 id="forms-example" class="">cellars</h3>
	 		
			<form action="index.php" method="post" id="frm_add_new_cellar">
				<div class="form-group">
					<label for="exampleInputEmail1">New cellar:</label>
					<input type="text" class="form-contcellar" id="exampleInputEmail1" name="txt_new_cellar" placeholder="New cellar">
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">Description:</label>
					<input type="text" class="form-contcellar" id="exampleInputEmail1" name="txt_new_cellar_Description" placeholder="New cellar">
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">Length:</label>
					<input type="text" class="form-contcellar" id="exampleInputEmail1" name="txt_new_cellar_Length" placeholder="New cellar">
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">Latitude:</label>
					<input type="text" class="form-contcellar" id="exampleInputEmail1" name="txt_new_cellar_Latitude" placeholder="New cellar">
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">Shopping:</label>
					<input type="number" class="form-contcellar" id="exampleInputEmail1" name="txt_new_cellar_Shopping" placeholder="New cellar">
				</div>
				
				<button type="submit" class="btn btn-default" name="btn_new_cellar_Description" form="frm_add_new_cellar">Add new cellar</button>
			</form>
			
			
			
		</div>
		
</br>
			
			<?php 
				fnDeplegarCellars(); 
				echo $_SESSION['html'];
			?>

	</div>
	

	<!--//content-->
	
	
	
	<!---->
	<div class="copy">
		<?php include "../global/footer.php"; ?>
	</div>
</div>