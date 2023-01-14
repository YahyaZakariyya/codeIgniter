<?php include "header.php"; ?>
<!-- Sign Up Form -->
<div class="container">
<form action="http://localhost/NSSC/main/signup_button" method="POST">
	<!-- First Name Input Field -->
	<div class="mb-2">
		<label for="first_name" class="form-label">First Name</label>
		<input type="text" name="first_name" class="form-control"/>
	</div>
	<!-- Last Name Input Field -->
	<div class="mb-2">
		<label for="last_name" class="form-label">Last Name</label>
		<input type="text" name="last_name" class="form-control"/>
	</div>
	<!-- Email Input Field -->
	<div class="mb-2">
		<label for="email" class="form-label">Email</label>
		<input type="email" name="user_email" class="form-control"/>
	</div>
	<!-- Username Input Field -->
	<div class="mb-2">
		<label for="user_name" class="form-label">Username</label>
		<input type="text" name="user_name" class="form-control"/>
	</div>
	<!-- Password Input Field -->
	<div class="mb-2">
		<label for="password" class="form-label">Password</label>
		<input type="password" name="user_password" class="form-control"/>
	</div>
	<!-- Gender Input Field -->
	<div class="mb-2">
		<div class="form-check">
			<input class="form-check-input" type="radio" name="gender" id="male" checked value="male">
			<label class="form-check-label" for="gender">Male</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="radio" name="gender" id="female" value="female">
			<label class="form-check-label" for="gender">Female</label>
		</div>
	</div>
	<input type="submit" name="signup_button" class="btn btn-success" value="Sign Up"></input>
</form>
</div>
<?php include "footer.php"; ?>