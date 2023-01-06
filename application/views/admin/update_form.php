<!-- Update Form -->
<?php include "header.php"; ?>
<div class="container">
<form name="update" class="modal-body" action="" method="POST">
    <div class="mb-2">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo 'first_name'; ?>"/>
    </div>
    <div class="mb-2">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo 'last_name'; ?>"/>
    </div>
    <div class="mb-2">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="user_email" id="email" class="form-control" value="<?php echo 'user_email'; ?>"/>
    </div>
    <div class="mb-2">
        <label for="user_name" class="form-label">User Name</label>
        <input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo 'user_name'; ?>"/>
    </div>
    <div class="mb-2">
        <label for="user_type" class="form-label">User Type</label>
        <input type="text" name="user_type" id="user_type" class="form-control" value="<?php echo 'user_type' ?>"/>
    </div>
    <button type="submit" name="update_button" class="btn btn-success">Update</button>
</form>
</div>
<?php include "footer.php"; ?>