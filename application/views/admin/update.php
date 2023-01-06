<?php include "header.php"; ?>

<!-- Update Form -->
<div class="container">
<?php if(!empty($form)){ ?>
<form name="update" class="modal-body" action="http://localhost/NSSC/index.php/admin/<?php echo $type.'/'.$id?>" method="POST">
    <?php foreach($form as $data){
        foreach($data as $key => $value){
    ?>
    <div class="mb-2">
        <label for="<?php echo $key; ?>" class="form-label"><?php echo $key; ?></label>
        <input type="text" name="<?php echo $key ?>" id="first_name" class="form-control" value="<?php echo $value; ?>"/>
    </div>
    <?php }} ?>
    <button class="btn btn-dark" type="submit">Update</button>
</form>
<?php }else{ ?>
    <h1>No Record to update</h1>
<?php } ?>
</div>
<?php include "footer.php"; ?>