<?php include "header.php"; ?>
<section class="container-xl text-center">
    <form action="http://localhost/NSSC/main/login_button" method="POST">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="user_name">
            <label for="user_name">Username or Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="user_password">
            <label for="user_password">Password</label>
        </div>
        <input type="submit" name="login_button" class="btn btn-primary" value="Submit"></input>
    </form>
    <?php print_r($_SESSION); ?>

</section>
<?php include "footer.php"; ?>