<?php include "header.php"; ?>

<!-- Add Form -->
<div class="container">
<?php if(!empty($form)){ ?>
<form name="add" class="modal-body" action="http://localhost/NSSC/index.php/admin/<?php echo $type; ?>" method="POST">
    <?php foreach($form as $data){
    ?>
    <div class="mb-2">
        <label for="<?php echo $data; ?>" class="form-label"><?php echo $data; ?></label>
        <input type="text" name="<?php echo $data ?>" id="<?php $data ?>" class="form-control"/>
    </div>
    <?php } ?>
    <button class="btn btn-dark" type="submit">Add</button>
</form>
<?php } ?>
</div>
<?php include "footer.php"; ?>