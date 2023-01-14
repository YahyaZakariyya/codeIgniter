<?php include "header.php"; ?>
<!-- Login Form -->
<div class="container">
<form action="http://localhost/NSSC/main/login_button" method="POST">
    <div class="mb-2">
        <label for="user_name" class="form-label">Username or Email</label>
        <input type="text" name="user_name" class="form-control"/>
    </div>
    <div class="mb-2">
        <label for="user_password" class="form-label">Password</label>
        <input type="password" name="user_password" class="form-control"/>
    </div>
    <input class="btn btn-dark" type="submit" name="login_button" value="LOGIN"></input>
</form>
</div>
<?php include "footer.php"; ?>