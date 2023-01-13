<?php include "header.php"; ?>

<!-- Update Form -->
<div class="container">
<?php if(!empty($forms)){ ?>
<form name="update" class="modal-body" action="<?php echo base_url().$type.'/'.$id ?>" method="POST">
<?php foreach($forms['form'] as $type=>$labels){
        if(in_array($type,['text','email','password'])){
            foreach($labels as $label=>$value){
    ?>
    <div class="form-floating mb-3">
        <input type="<?php echo $type; ?>" class="form-control" id="<?php echo $label; ?>" name="<?php echo $label; ?>" value="<?php echo $value ?>">
        <label for="<?php echo $label; ?>"><?php echo $label; ?></label>
    </div>
    <?php }}elseif($type=='form-select'){
        foreach($labels as $key=>$options){ ?>
    <div class="form-floating">
        <select class="form-select" name="<?php echo $key; ?>" id="floatingSelect" aria-label="Floating label select example">
            <?php
            foreach($options as $values){
                if(array_values($values)[0]==$forms['gender'] or array_values($values)[0]==$forms['user_type'])
                {
                    $selected = 'selected';
                }
                else{
                    $selected = '';
                }
                echo "<option ".$selected." value='".array_values($values)[0]."'>".array_values($values)[1]."</option>";
            }
            ?>
        </select>
        <label for="floatingSelect"><?php echo $key ?></label>
    </div>
    <?php }}} ?>
    <button class="btn btn-dark" type="submit">Update</button>
</form>
<?php }else{ ?>
    <h1>No Record to update</h1>
<?php } ?>
</div>
<?php include "footer.php"; ?>