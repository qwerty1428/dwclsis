<div class="page-header">
	<h3>Upload</h3>
</div>
<form class="form-horizontal" action="upload.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<div class="col-sm-10">
			<input type="file" name="file[]" multiple class="form-control" required />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10">
			<input type="text" name="title" class="form-control" required placeholder="Title"/>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-10">
			<input type="text" name="tags" class="form-control" required placeholder="Tags"/>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10">
			<textarea class="form-control" name="desc" required placeholder="Description"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10">
			<input type="submit" class="btn btn-primary"  value="Upload" name="save"/>
		</div>
	</div>
</form>
<?php


?>