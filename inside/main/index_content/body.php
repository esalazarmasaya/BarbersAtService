<body>
	<div id="wrapper">
		<!----->
		<nav class="navbar-default navbar-static-top" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
				<h1> <a class="navbar-brand" href="index.php">Barbers at service</a></h1>
				
			</div>
			
			<div class=" border-bottom">
				<div class="full-left">
					<div class="clearfix"> 
					</div>
				</div>
				
				<!-- Brand and toggle get grouped for better mobile display -->
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="drop-men" >
					<?php 
						echo '
								<!--<span class=" name-caret">'.$_SESSION['usermail'].'</span>-->
								<form action="index.php" method="post" id="frm_logout">
									<input type="submit" class="btn btn-danger btn-lg" name="btn_logout" value="Logout" form="frm_logout">
								</form>
								
							';
					?>
				</div><!-- /.navbar-collapse -->
				
				<div class="clearfix">
				</div>
				
				<?php
					include('../global/left-nav.php');
				?>
		</nav>
		
		<div id="page-wrapper" class="gray-bg dashbard-1">
			<?php
				include('content.php');
			?>
			<div class="clearfix"> </div>
			</div>
		</div>


	<!---->
	<!--scrolling js-->
	<script src="../../js/jquery.nicescroll.js"></script>
	<script src="../../js/scripts.js"></script>
	<!--//scrolling js-->
	<script src="../../js/bootstrap.min.js"> </script>
</body>
