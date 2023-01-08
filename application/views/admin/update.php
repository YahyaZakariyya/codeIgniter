<?php include "header.php"; ?>

<!-- Update Form -->
<div class="container">
<?php if(!empty($form)){ ?>
<form name="update" class="modal-body" action="http://localhost/NSSC/index.php/admin/<?php echo $type.'/'.$id ?>" method="POST">
    <?php foreach($form as $data){
        foreach($data as $key => $value){
    ?>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="<?php echo $key; ?>" name="<?php echo $key; ?>" value="<?php echo $value; ?>">
        <label for="<?php echo $key; ?>"><?php echo $key; ?></label>
    </div>
    <?php }} ?>
    <button class="btn btn-dark" type="submit">Update</button>
</form>
<?php }else{ ?>
    <h1>No Record to update</h1>
<?php } ?>
</div>
<?php include "footer.php"; ?>