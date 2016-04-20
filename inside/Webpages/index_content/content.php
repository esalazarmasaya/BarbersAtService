<?php $pageid = "../Webpages/index.html"; ?>

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
			<a href="<?php echo $pageid; ?>">New Web Page</a>
		</h2>
	</div>
	
	<!--//banner-->
	
	<!--content-->
	<div class="grid-form">
 		<div class="grid-form1">
	 		<h3 id="forms-example" class="">Webpage</h3>
	 		
			<form action="index.php" method="post" id="frm_add_new_webpage">
				<div class="form-group">
					<label for="exampleInputEmail1">Webpage:</label>
					<input type="text" class="form-control" id="exampleInputEmail1" name="txt_new_Web_Page_Name" placeholder="Name">
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">URL:</label>
					<input type="text" class="form-control" id="exampleInputEmail1" name="txt_Url_Web_Page" placeholder="URL">
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">Description:</label>
					<input type="text" class="form-control" id="exampleInputEmail1" name="txt_Web_Page_Description" placeholder="Description">
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">State:</label>
					<select name="txt_state">
						<option value="1">Active</option>
						<option value="0">Inactive</option>
					</select>
				</div>
				
				<button type="submit" class="btn btn-default" name="btn_new_webpage" form="frm_add_new_webpage">Add new webpage</button>
			</form>
			
			</br>
			
			<?php 
				fnDeplegarWebpages(); 
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