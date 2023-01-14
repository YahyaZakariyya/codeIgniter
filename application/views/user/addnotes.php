<?php include "header.php"; ?>
<!-- Add Notes Form -->
<div class="container">
<form action="http://localhost/NSSC/main/insert_notes" method="POST" enctype="multipart/form-data">
	<!-- Title Input Field -->
	<div class="mb-2">
		<label for="notes_title" class="form-label">Title</label>
		<input type="text" name="notes_title" class="form-control"/>
	</div>
	<!-- Description Input Field -->
	<div class="mb-2">
		<label for="notes_description" class="form-label">Description</label>
		<input type="text" name="notes_description" class="form-control"/>
	</div>
	<!-- File Input Field -->
    <div class="input-group mb-3">
        <input type="file" class="form-control" name="notes_file">
        <label class="input-group-text" for="notes_file">Upload</label>
    </div>
	<!-- Subject Input Field -->
    <select class="form-select" name="notes_subject">
        <option value="1" Selected>One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
    <label for="notes_subject"></label>

	<input type="submit" name="insert_notes" class="btn btn-success" value="PUBLISH"></input>
</form>
</div>
<?php include "footer.php"; ?>