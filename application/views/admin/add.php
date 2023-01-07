<?php include "header.php"; ?>

<!-- Add Form -->
<div class="container">
    <?php if($this->input->get('error')!==NULL){ ?>
    <div class="alert alert-danger" role="alert">
        Already Exists
    </div>
    <?php } ?>
<?php if(!empty($form)){ ?>
<form name="add" class="modal-body" action="http://localhost/NSSC/index.php/admin/<?php echo $type; ?>" method="POST">
    <?php foreach($form as $data){
    ?>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="<?php echo $data ?>" placeholder="abc">
        <label for="<?php echo $data ?>"><?php echo $data ?></label>
    </div>
    <?php } ?>
    <button class="btn btn-dark" type="submit">Add</button>
</form>
<?php } ?>
</div>
<?php include "footer.php"; ?>