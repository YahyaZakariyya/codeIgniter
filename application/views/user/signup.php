<?php include "header.php"; ?>

<section class="container-xl">
<form action="http://localhost/NSSC/main/signup_button" method="POST">
    <div class="mb-3">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" class="form-control" name="first_name">
    </div>
    <div class="mb-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" class="form-control" name="last_name">
    </div>
    <div class="mb-3">
        <label for="user_name" class="form-label">User Name</label>
        <input type="text" class="form-control" name="user_name">
    </div>
    <div class="mb-3">
        <label for="user_email" class="form-label">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <div class="mb-3">
        <label for="user_password" class="form-label">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" checked value="m">
        <label class="form-check-label" for="gender">
            Male
        </label>
        </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" value="f">
        <label class="form-check-label" for="gender">
            Female
        </label>
    </div>
    <!-- <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Agree Terms & Conditions</label>
    </div> -->
    <input type="submit" name="signup_button" class="btn btn-primary" value="submit"></input>
</form>

</section>


<?php include "footer.php"; ?>