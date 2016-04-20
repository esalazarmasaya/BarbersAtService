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
	
	<div class="grid-form">
 		<div class="grid-form1">
	 		<h3 id="forms-example" class="">Home</h3>
	 		
		</div>
	</div>
	
	<!--//content-->
	<!---->
	<div class="copy">
		<?php include "../global/footer.php"; ?>
	</div>
</div>