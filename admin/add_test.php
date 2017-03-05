<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="ckeditor/ckeditor.js"></script>

</head>

<?php

	include_once('../config.php');

 ?>

<body>

<h2>Add New Test</h2>

<div class="form-container">
<form method="POST">
	
	<div class="form-group">
		<input type="text" name="testname" id="testname" placeholder="Test Name">
	</div>
	<div class="form-group">
		<input type="text" name="subject" id="subject" placeholder="Subject">
	</div>
	<div class="form-group">
		<input type="text" name="chapter" id="chapter" placeholder="Chapter">
	</div>	
	<div class="form-group">
		<select name="syllabus">
			<option value="CBSE">CBSE</option>
			<option value="ICSE">ICSE</option>
			<option value="CBSE">STATE</option>
		</select>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-success" name="submit" id="submit" value="SUBMIT">
	</div>

</form>
</div> 

<?php 
	
	session_start();

	if(isset($_POST['submit'])){

		$tname = $_POST['testname'];
		$sub   = $_POST['subject'];
		$chap  = $_POST['chapter'];
		$syll  = $_POST['syllabus'];

		$_SESSION['tname'] = $tname;
		$_SESSION['sub'] = $sub;
		$_SESSION['chap'] = $chap;
		$_SESSION['syll'] = $syll;

		if(mysqli_query($conn, 'INSERT into tests (name,subject,chapter,syllabus) VALUES ("'.$tname.'","'.$sub.'","'.$chap.'","'.$syll.'")')){

			header("location: add_questions.php");

		}
		else {

			echo mysqli_error($conn);
		}

	}

?>
</body>
</html>