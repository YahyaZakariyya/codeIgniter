<?php 
if(isset($_SESSION['user_name'])){
    redirect('main');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign-Up Page</title>
    <?php echo link_tag(base_url('assets/css/style.css')); ?>
</head>
<body>
	<section>
		<div class="colour"></div>
		<div class="colour"></div>
		<div class="colour"></div>
		<div class="container">
			<div class="form">
			<h2>Sign-Up Form</h2>
			<form>
				<!-- First Name Input Field -->
				<div class="input__box">
					<input type="text" name="first_name" placeholder="First Name"/>
				</div>
				<!-- Last Name Input Field -->
				<div class="input__box">
					<input type="text" name="last_name" placeholder="Last Name"/>
				</div>
				<!-- Email Input Field -->
				<div class="input__box">
					<input type="email" name="user_email" placeholder="Email"/>
				</div>
				<!-- Username Input Field -->
				<div class="input__box">
					<input type="text" name="user_name" placeholder="Username"/>
				</div>
				<!-- Password Input Field -->
				<div class="input__box">
					<input type="password" name="user_password" placeholder="Password"/>
				</div>
				<br>
				<!-- Gender Input Field -->
				<!-- <div class="input__box"> -->
				<input type="radio" name="gender" id="male" checked value="male">
				<label for="gender">Male</label>
				<input type="radio" name="gender" id="female" value="female">
				<label for="gender">Female</label>
				<!-- </div> -->
				<div class="input__box">
				<input type="submit" name="signup_button" value="SignUp">
				</div>
				<p class="forget">
				Already have an account? <a href="<?php echo base_url('main/login') ?>">Login here</a>
				</p>
			</form>
			</div>
		</div>
    </section>
</body>
</html>