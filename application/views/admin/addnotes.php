<?php
if(isset($_POST['add_notes_button'])){
    include "config.php";
    $Title = mysqli_real_escape_string($conn, $_POST['Title']);
    $Description = mysqli_real_escape_string($conn, $_POST['Description']);
    $sql_insert = "INSERT into tempnotes (Title, Description) VALUES ('{$Title}','{$Description}')";
    if(mysqli_query($conn, $sql_insert)){
        header('Location:http://localhost/project/profile.php');
        // header("Location: {$host_name}");
    }
}
?>
<?php include "header.php"; ?>
<!-- Sign Up Form -->
<div class="container">
<form name="a_notes" class="modal-body" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
	<!-- Title Name Input Field -->
	<div class="mb-2">
		<label for="Title" class="form-label">Title</label>
		<input type="text" name="Title" id="Title" class="form-control"/>
	</div>
    <!-- Description Name Input Field -->
	<div class="mb-2">
		<label for="Title" class="form-label">Description</label>
		<input type="text" name="Description" id="Description" class="form-control"/>
	</div>
	<button type="submit" name="add_notes_button" class="btn btn-success">Add Notes</button>
</form>
</div>
<?php include "footer.php"; ?>