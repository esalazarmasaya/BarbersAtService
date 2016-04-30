<?php $pageid = "../Users/index.html"; ?>

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
		if (!isset($_SESSION['PageCode1']) && empty($_SESSION['PageCode1'])) {
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
			<a href="<?php echo $pageid; ?>">Users</a>
		</h2>
	</div>
	
	<!--//banner-->
	
	<!--content-->
	<div class="grid-form">
 		<div class="grid-form1">
	 		<h3 id="forms-example" class="">NEW USER</h3>
	 		
			<form action="index.php" method="post" id="frm_add_new_user">
				<div class="form-group">
					<label for="exampleInputEmail1">First name:</label>
					<input type="text" class="form-control" id="txt_firstname" name="txt_firstname" placeholder="First name" required>
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">Second name:</label>
					<input type="text" class="form-control" id="txt_secondname" name="txt_secondname" placeholder="Second name">
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">First last name:</label>
					<input type="text" class="form-control" id="txt_first_last_name" name="txt_first_last_name" placeholder="First last name" required>
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">Second last name:</label>
					<input type="text" class="form-control" id="txt_second_last_name" name="txt_second_last_name" placeholder="Second last name">
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">Born date:</label>
					<input type="date" class="form-control" id="txt_born_date" name="txt_born_date" placeholder="Born date">
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">Phone:</label>
					<input type="text" class="form-control" id="txt_phone" name="txt_phone" placeholder="Phone">
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">Email:</label>
					<input type="email" class="form-control" id="txt_email" name="txt_email" placeholder="Email" required>
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">Password:</label>
					<input type="password" class="form-control" id="txt_password" name="txt_password" placeholder="Password" required>
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">Re-type password:</label>
					<input type="password" class="form-control" id="txt_retype_password" name="txt_retype_password" placeholder="Password" required>
				</div>
				
				<button type="submit" class="btn btn-default" name="sbmt_add_new_user" form="frm_add_new_user">Insert</button>
			</form>
			
			</br>
			
			<?php 
				fnDeplegarUsuarios(); 
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