<?php $pageid = "../main/index.html"; ?>

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
	?>
	
	<!--banner-->
	<div class="banner">
		<h2>
			<a href="../main/index.html">Home</a>
			<i class="fa fa-angle-right"></i>
			<a href="<?php echo $pageid; ?>">Home</a>
		</h2>
	</div>
	
	<!--//banner-->
	
	<!--content-->
	
	<div class="content-top">
		<div class="col-md-4 ">
			<div class="content-top-1">
				<div class="col-md-6 top-content">
					<h5>Test</h5>
					<label>Test1</label>
				</div>
				
				<div class="col-md-6 top-content1">
					<div id="demo-pie-2" class="pie-title-center" data-percent="50"> 
						<span class="pie-value"></span> 
					</div>
				</div>
				
				<div class="clearfix">	
				</div>
				
			</div>
		</div>
		
		<div class="clearfix"> 
		</div>
	</div>
	
	<!---->
	
	<div class="content-mid">
		<div class="col-md-5">
		</div>
		
		<div class="col-md-7 mid-content-top">
			<div class="middle-content">
				<h3>Middle content</h3>
			</div>
		</div>
		
		<div class="clearfix"> 
		</div>
		
	</div>
	
	<!----->
	<div class="content-bottom">
		<div class="col-md-6 post-top">
		</div>
		
		<div class="col-md-6">
		</div>
		
		<div class="clearfix"> 
		</div>
		
	</div>
	<!--//content-->
	
	<div class="grid-form">
 		<div class="grid-form1">
	 		<h3 id="forms-example" class="">LOGIN</h3>
	 		
			<form action="index.php" method="post" id="frm_login_page">
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" name="txt_email" placeholder="Email address">
				</div>
					
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="exampleInputPassword1" name="txt_password" placeholder="Password">
					</div>
				
					<div class="checkbox">
					<label>
					<input type="checkbox"> Check me out
					</label>
				</div>
				<button type="submit" class="btn btn-default" name="btn_login_page" form="frm_login_page">Login</button>
			</form>
		</div>
	</div>
	
	<!---->
	<div class="copy">
		<?php include "../global/footer.php"; ?>
	</div>
</div>