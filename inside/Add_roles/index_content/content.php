<?php $pageid = "../Add_roles/index.html"; ?>

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
		
		if (!isset($_SESSION['PageCode2']) && empty($_SESSION['PageCode2'])) {
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
			<a href="<?php echo $pageid; ?>">New roles</a>
		</h2>
	</div>
	
	<!--//banner-->
	
	<!--content-->
	<div class="grid-form">
 		<div class="grid-form1">
	 		<h3 id="forms-example" class="">Roles</h3>
	 		
			<form action="index.php" method="post" id="frm_add_new_rol">
				<div class="form-group">
					<label for="exampleInputEmail1">New rol:</label>
					<input type="text" class="form-control" id="exampleInputEmail1" name="txt_new_rol" placeholder="New rol">
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">Description:</label>
					<input type="text" class="form-control" id="exampleInputEmail1" name="txt_new_rol_Description" placeholder="New rol">
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">State:</label>
					<select name="txt_state">
						<option value="1">Active</option>
						<option value="0">Inactive</option>
					</select>
				</div>
				
				<button type="submit" class="btn btn-default" name="btn_new_rol_Description" form="frm_add_new_rol">Add new rol</button>
			</form>
			
			</br>
			
			<?php 
				fnDeplegarRoles(); 
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