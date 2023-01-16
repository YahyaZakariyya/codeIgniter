<?php include "header.php"; ?>
<!-- Search Section -->
<section class="container-xl text-center">
    <h1>NSSC</h1>
    <form action="<?php echo base_url('main/search'); ?>" method="GET">
        <div class="mb-3">
            <!-- <label for="formGroupExampleInput" class="form-label"></label> -->
            <input type="text" class="form-control" placeholder="Search" name="search">
        </div>
        <input class="btn btn-primary" type="submit"></input>
    </form>
</section>
<?php include "footer.php"; ?>