<?php include "header.php"; ?>

<!-- Main Section -->
<div class="row">
    <!-- Results Area -->
    <div class="bg-light col-md-9 col-12">
        
        <!-- Filters -->
        <div class="border-bottom">
            <h2 class="my-2">Result: <?php echo $_GET['search']; ?></h2>
        </div>

        <!-- Card -->
        <?php if(!empty($search)){
            foreach($search as $result){
         ?>
        <div class="shadow-sm rounded-0 m-2">
            <!-- Card/Notes Heading -->
            <h6 class="p-2 bg-primary text-light m-0">
                <?php echo $result['notes_title']; ?>
            </h6>
            <!-- Card/Notes Body -->
            <div class="p-2 pt-0">
                <!-- Notes Info -->
                <div>
                    <span class="col"><i class="fa-sharp fa-solid fa-note-sticky"></i><?php echo $result['notes_subject']; ?></span>
                    <span class="col"><i class="fa-solid fa-user"></i><a href="<?php echo base_url('main/profile?profile='.$result['user_id']); ?>"><?php echo $result['author']; ?></a></span>
                    <span class="col"><i class="fa-solid fa-calendar-days"></i><?php echo $result['upload_date']; ?></span>
                </div>
                <!-- Notes Description -->
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum veritatis rerum nihil ratione alias ex laboriosam.</p>
                <!-- Notes View Button -->
                <div class="text-end">
                    <a href="#" class="btn btn-sm btn-outline-primary rounded-0">VIEW</a>
                </div>
            </div>
        </div>
        <?php }}else{ ?>
            <div>No Result Found</div>
        <?php } ?>
        <!-- Card Sample 2 -->
        <!-- <div class="shadow-sm card rounded-0 clr-1 my-2 border-clr-5">
            <div class="card-header clr-5 rounded-0 text-center text-light h6">
                Entity relationship Diagram
            </div>
            <div class="card-body">
                <div class="row justify-content-center clr-1">
                    <div class="col"><i class="fa-sharp fa-solid fa-note-sticky"></i> DSA</div>
                    <div class="col"><i class="fa-solid fa-user"></i> Yahya</div>
                    <div class="col"><i class="fa-solid fa-calendar-days"></i> 27-Dec-22</div>
                </div>
                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum veritatis rerum nihil ratione alias ex laboriosam.</p>
                <div class="text-end">
                    <a href="#" class="btn clr-5 rounded-0 text-light">VIEW</a>
                </div>
            </div>
        </div> -->
    </div>
    <?php include "sidebar.php"; ?>
</div>
<?php include "footer.php"; ?>