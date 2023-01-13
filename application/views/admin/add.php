<?php include "header.php"; ?>

<!-- Add Form -->
<div class="container">
    <?php if($this->input->get('error')!==NULL){ ?>
    <div class="alert alert-danger" role="alert">
        Already Exists
    </div>
    <?php } ?>
<?php if(!empty($form)){ ?>
<form name="add" class="modal-body" action="<?php echo base_url($type); ?>" method="POST">
    <?php foreach($form as $type=>$labels){
        if(in_array($type,['text','email','password'])){
            foreach($labels as $label){
    ?>
    <div class="form-floating mb-3">
        <input type="<?php echo $type; ?>" class="form-control" id="<?php echo $label; ?>" name="<?php echo $label; ?>">
        <label for="<?php echo $label; ?>"><?php echo $label; ?></label>
    </div>
    <?php }}elseif($type=='form-select'){
        foreach($labels as $key=>$options){ ?>
    <div class="form-floating">
        <select class="form-select" name="<?php echo $key ?>" id="floatingSelect" aria-label="Floating label select example">
            <?php foreach($options as $values){ ?>
            <option  value="<?php echo array_values($values)[0] ?>"><?php echo array_values($values)[1] ?></option>
            <?php } ?>
        </select>
        <label for="floatingSelect"><?php echo $key ?></label>
    </div>
    <?php }}} ?>
    <button class="btn btn-dark" type="submit">Add</button>
</form>
<?php } ?>
</div>
<?php include "footer.php"; ?>