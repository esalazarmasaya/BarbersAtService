
<?php 
	session_start();
	
	if (!isset($_SESSION['msg']) || empty($_SESSION['msg'])){
		$_SESSION['msg'] = "";
	}
	
	include("config/connection.php");
	include("functions/Fn_InsertsUpdatesDeletes.php");
	include("functions/fnCrearTablaHtmlDeTabla.php");
	include("functions/functions.php");
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
	
	<title>MINT BARBER & CREW</title>
	<link href="images/mint_icon.ico" type="image/x-icon" rel="shortcut icon" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<script src="js/jquery.min.js"> </script>
	<!-- Mainly scripts -->
	<script src="js/jquery.metisMenu.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>
	<!-- Custom and plugin javascript -->
	<link href="css/custom.css" rel="stylesheet">
	<script src="js/custom.js"></script>
	  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="js/screenfull.js"></script>
			<script>
			$(function () {
				$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);
	
				if (!screenfull.enabled) {
					return false;
				}
				
				$('#toggle').click(function () {
					screenfull.toggle($('#container')[0]);
				});
				
			});
			</script>
			
	<!--skycons-icons-->
	<script src="js/skycons.js"></script>
	<!--//skycons-icons-->
	
	</head>
	<body>
		<div id="wrapper">
		
				<?php
					include('index_content/header.php');
				?>
				 
				<div class=" border-bottom">
		        	<div class="full-left">
			        	<section class="full-top">
						</section>
						
						<div class="clearfix">
						</div>
		           </div>
		           	<nav class="navbar-default navbar-static-top" role="navigation">

		           <!-- Brand and toggle get grouped for better mobile display -->
		           
		           <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="drop-men" >
				    	<?php 
				    		if (isset($_POST['btn_logout'])){
				    			session_destroy();
								$_SESSION = array();
								session_start();
								$_SESSION['msg'] = "Sesión cerrada exitosamente";
				    		}
					    	if (isset($_SESSION['usermail']) && !empty($_SESSION['usermail'])){
								echo '
										<span class=" name-caret">'.$_SESSION['usermail'].'</span>
										<form action="index.php" method="post" id="frm_logout">
											<input type="submit" class="btn btn-default" name="btn_logout" value="Logout" form="frm_logout">
										</form>
										
									';
							} else {
								echo '
									<form action="index.php" method="post" id="frm_login">
										<input type="submit" class="btn btn-primary btn-lg" name="btn_login" data-target="#login-modal" value="Login" form="frm_login">
									</form>';
							}
						?>
				    </div><!-- /.navbar-collapse -->
				    
				    <div class="clearfix">
				    </div>
		  
				    <?php
				    	if (isset($_SESSION['usermail']) && !empty($_SESSION['usermail'])){
				    		include('index_content/left-nav.php');
						}
					?>
				</div>
	        </nav>
	        
	        <div id="page-wrapper" class="gray-bg dashbard-1">
	        	
	        		<?php
	        			if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) {
							echo '
								<div class="banner">
									<h2>
										' . $_SESSION['msg'] . '
									</h2>
								</div>
								';
							//$_SESSION['msg'] = "";
						}
						//$_SESSION['msg'] = "";
						if (isset($_SESSION['usermail']) && !empty($_SESSION['usermail'])){
							include('index_content/body.php');
						} else {
							if (isset($_POST['sbmt_new_user'])){
								include('index_content/newUser.php');
							}

							if (isset($_POST['btn_login'])){
								include('index_content/login.php');
							}
							
						}
	        			
	        		?>
	        	
	        	
	        	<div class="clearfix">
	        	</div>
	        	
	       </div>
	     </div>
	     
	     <?php
	     	include('index_content/footer.php');
	     ?>
	     
		<!---->
		<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
		<script src="js/bootstrap.min.js"> </script>
	</body>
</html>

