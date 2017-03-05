<!DOCTYPE html>
<html>
<head>


	<title></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="ckeditor/ckeditor.js"></script>

</head>
<body>


<h1>Add questions</h1>

<div class="form-container contain">
<form method="POST" action="echo.php">

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
		<input type="submit" class="btn btn-success" name="submit" id="submit">
	</div>

	
	
</form>
</div>



</body>
</html>