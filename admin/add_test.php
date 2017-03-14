<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/w3.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="ckeditor/ckeditor.js"></script>

</head>

<?php

	include_once('../dbconfig.php');

 ?>

<body>



<div class="test-form-container">
<h2>Add New Test</h2>
<form class="w3-container" method="POST" id="test-form">
	
	<div class="form-group">
		<input class="w3-input" type="text" name="testname" id="testname" placeholder="Test Name" required="">
	</div>
	<div class="form-group">
		<input class="w3-input" type="text" name="subject" id="subject" placeholder="Subject" required="">
	</div>
	<div class="form-group">
		<input class="w3-input" type="text" name="chapter" id="chapter" placeholder="Chapter" required="">
	</div>	
	<div class="form-group">
		<select class="w3-select" name="syllabus" required="">
			<option value="" disabled selected>Choose Syllabus</option>
			<option value="CBSE">CBSE</option>
			<option value="ICSE">ICSE</option>
			<option value="STATE">STATE</option>
		</select>
	</div>
	<div class="form-group">
		<input class="w3-btn w3-blue w3-round" type="submit" name="submit" id="submit" value="SUBMIT">
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

		if(mysqli_query($conn, 'INSERT into tests (name,subject,chapter,syllabus) VALUES ("'.$tname.'","'.$sub.'","'.$chap.'","'.$syll.'")')){

			$query = mysqli_query($conn, 'SELECT * FROM tests ORDER BY id DESC LIMIT 1');
			while($res = mysqli_fetch_array($query)){

				 
				$_SESSION['name'] = $res['name'];
				$_SESSION['id'] = $res['id'];
				$_SESSION['count'] = $_POST['count'];
				header("location: add_questions.php");
			}

			

		}
		else {

			echo mysqli_error($conn);
		}

	}

?>
</body>
</html>