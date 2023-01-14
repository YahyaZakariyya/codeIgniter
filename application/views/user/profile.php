<?php include "header.php"; ?>
<section class="container col-lg-8">
<!-- Profile Info -->
<div class="text-center bg-secondary text-light rounded p-5">
    <!-- <img class="rounded-circle col-lg-4 col-md-3 col-5 mt-5 border p-1 border-5 border-light" src="../images/ProfilePicture.jpg" alt="profile picture"> -->
    
    <h2><?php echo $_SESSION['user_name']; ?></h2><br><br>
    <div class="row">
        <div class="col-4">
            <h5 class="m-0 p-0">Followers</h5>
            <p>300</p>
        </div>
        <div class="col-4">
            <h5 class="m-0 p-0">Following</h5>
            <p>30</p>
        </div>
        <div class="col-4">
            <h5 class="m-0 p-0">Notes</h5>
            <p>17</p>
        </div>
    </div>
    <!-- <button class="btn btn-light rounded-pill col-5">Follow</button> -->
    <button class="btn btn-outline-light rounded-pill col-5">Following</button>
    <a class="btn btn-outline-light rounded-pill col-5" href="http://localhost/NSSC/main/add_notes">Add Notes</a>

</div>

<!-- Card Sample-1 -->
<table class="table">
    <div class="shadow-sm row mx-1 my-3 border rounded border-3 border-secondary ">
        <div class="p-4 bg-light" >
            <h5></h5>
            <!-- <sup>Uploaded: 12-11-2022</sup> -->
            <div class="row">
                <p class="text-nowrap col-md-11 col-10 m-0" style="overflow: hidden; text-overflow: ellipsis;"></p>
                <a class="col-1 link-secondary" href="">view</a>
            </div>
        </div>
    </div>
</table>
</section>
<?php include "footer.php"; ?>