<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
	<script src="ckeditor/ckeditor.js"></script>

	<style type="text/css">
		
		.form-container{

			width: 50%;
			height:75%;
			padding-left: 20px;
			padding-right: 20px;

		}

	</style>
	
</head>
<body>

<div class="form-container">
<form method="POST">
	
	<div class="form-group">
	<input type="text" class="form-control" name="qn" id="qn" placeholder="Q.No">
	</div>

	<div class="form-group">
	<textarea class="form-control" name="name" id="name" placeholder="Question"></textarea>
	<script>
	CKEDITOR.replace('name', {

		filebrowserUploadUrl: 'upload.php'

	});	
	</script> 
	</div>

	<div class="form-group">
	<input type="text" class="form-control" name="ans" id="ans">
	</div>

	<div class="form-group">
	<input type="submit" class="btn btn-default" name="submit" id="submit">
	</div>

</form>
</div>


</body>
</html>