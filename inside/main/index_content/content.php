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
	 		
	 		
			<!--<div class="">
				<div class="mailbox-content">
					<table class="table">
						<tbody>
							<tr class="table-row">
								<td class="table-text"><h6>Queue Code</h6></td>
								<td class="table-text"><h6>Generated Token</h6></td>
								<td class="table-text"><h6>Time</h6></td>
								<td class="table-text"><h6>Waitin Que State</h6></td>
								<td class="table-text"><h6>Initial Hour</h6></td>
								<td class="table-text"><h6>Final Hour</h6></td>
								<td class="table-text"><h6>Combo</h6></td>
								<td class="table-text"><h6>User</h6></td>
								<td class="table-text"><h6>Employee Code</h6></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>-->
			
			
		</div>
	</div>
	
	<!--//content-->
	<!---->
	<div class="copy">
		<?php include "../global/footer.php"; ?>
	</div>
</div>