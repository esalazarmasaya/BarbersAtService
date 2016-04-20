<div class="content-top">
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
	
	<div class="grid-form">
 		<div class="grid-form1">
			<form action="index.php" method="post" id="frm_new_user">
				<button type="submit" class="btn btn-default" name="sbmt_new_user" form="frm_new_user">New user</button>
			</form>
		</div>
	</div>
</div>