<div class="content-main">
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
		
		<div class="banner">		   
		<h2>
		<a href="index.html">Home</a>
		<i class="fa fa-angle-right"></i>
		<span>Dashboard</span>
		</h2>
	</div>
	
	
	
	
	 	</div>
		
		<div class="clearfix"> </div>
	</div>
</div>