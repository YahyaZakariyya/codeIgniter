<?php include "header.php"; ?>
<section class="container col-lg-8">
<!-- Profile Info -->
<div class="text-center bg-secondary text-light rounded p-5">
    <!-- <img class="rounded-circle col-lg-4 col-md-3 col-5 mt-5 border p-1 border-5 border-light" src="../images/ProfilePicture.jpg" alt="profile picture"> -->
    
    <h2><?php if(isset($_GET['profile'])){echo $_GET['profile'];}else{echo $_SESSION['user_name'];}; ?></h2><br><br>
    <div class="row">
        <div class="col-4">
            <h5 class="m-0 p-0">Followers</h5>
            <p><?php echo $count[0]; ?></p>
        </div>
        <div class="col-4">
            <h5 class="m-0 p-0">Following</h5>
            <p><?php echo $count[1]; ?></p>
        </div>
        <div class="col-4">
            <h5 class="m-0 p-0">Notes</h5>
            <p><?php echo $count[2]; ?></p>
        </div>
    </div>
    <button class="btn btn-light rounded-pill col-5">Follow</button>
    <!-- <button class="btn btn-outline-light rounded-pill col-5">Following</button> -->
    <a class="btn btn-outline-light rounded-pill col-5" href="http://localhost/NSSC/main/add_notes">Add Notes</a>

</div>

<!-- Card Sample-1 -->
<table class="table">
    <?php foreach($notes as $note){ ?>
    <div class="shadow-sm row mx-1 my-3 border rounded border-3 border-secondary ">
        <div class="p-4 bg-light" >
            <h5><?php echo $note['notes_title'] ?></h5>
            <p>Uploaded: <?php echo $note['upload_date'] ?></p>
            <div class="row">
                <p class="text-nowrap col-md-11 col-10 m-0" style="overflow: hidden; text-overflow: ellipsis;"></p>
                <a class="col-1 link-secondary" href="http://localhost/NSSC/main/update_notes?notes_id=<?php echo $note['notes_id']; ?>">EDIT</a>
                <a class="col-1 link-secondary" href="<?php echo base_url(); ?>assets/your_pdf_file.pdf" target="_blank">VIEW</a>
            </div>
        </div>
    </div>
    <?php } ?>
</table>
</section>
<?php include "footer.php"; ?>