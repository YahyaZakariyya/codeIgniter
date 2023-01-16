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
    <title>Login</title>
    <?php echo link_tag(base_url('assets/css/style.css')); ?>
</head>
<body>
    <section>
    <div class="colour"></div>
    <div class="colour"></div>
    <div class="colour"></div>
    <div class="box">
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="container">
        <div class="form">
            <h2>Login Form</h2>
            <form action="<?php echo base_url('main/login_button'); ?>" method="POST">
            <div class="input__box">
                <input type="text" name="user_name" placeholder="Username" required />
            </div>
            <div class="input__box">
                <input type="password" name="user_password" placeholder="Password" required />
            </div>
            <div class="input__box">
                <input type="submit" name="login_button" value="Login" />
            </div>
            <p class="forget">Forgot Password? <a href="#">Click Here</a></p>
            <p class="forget">
                Don't have an account? <a href="<?php echo base_url('main/signup'); ?>">Sign-Up</a>
            </p>
            </form>
        </div>
        </div>
    </div>
    </section>
</body>
</html>