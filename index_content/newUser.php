<div class="content-top">
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
					<input type="text" class="form-control" id="txt_born_date" name="txt_born_date" placeholder="Born date">
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
		</div>
	</div>
</div>