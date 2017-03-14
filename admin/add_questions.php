<!DOCTYPE html>
<html>
<head>

<?php 
	include_once("../dbconfig.php");
	session_start();
	$test_id = $_SESSION['id'];
	$tname = $_SESSION['name'];
	$count = $_SESSION['count'];
	
?>
	<title></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="ckeditor/ckeditor.js"></script>

</head>
<body>


<h1><?php echo $tname;?> added. Add questions</h1>

<div class="form-container contain">
<form method="POST">

	<div class="row">

		<div class="form-group">
		<input type="text" class="form-control" name="qn" id="qn" placeholder="Q.No">
		</div>

		<div class="form-group">
		<textarea class="form-control" name="question" id="question"></textarea>
		<script>
		CKEDITOR.replace('question', {

			filebrowserUploadUrl: 'upload.php'

		});	
		</script> 
		</div>

	</div>

	<div class="row">
		<h2>Options</h2>
		<div class="col-sm-4 qcol">
		<h3>A:</h3>
		<textarea class="form-control" name="opt1" id="opt1"></textarea>
		<script>
		CKEDITOR.replace('opt1', {

			filebrowserUploadUrl: 'upload.php'

		});	
		</script> 
		</div>

		<div class="col-sm-4 qcol">
		<h3>B:</h3>
		<textarea class="form-control" name="opt2" id="opt2"></textarea>
		<script>
		CKEDITOR.replace('opt2', {

			filebrowserUploadUrl: 'upload.php'

		});	
		</script> 
		</div>

		<div class="col-sm-4 qcol">
		<h3>C:</h3>
		<textarea class="form-control" name="opt3" id="opt3"></textarea>
		<script>
		CKEDITOR.replace('opt3', {

			filebrowserUploadUrl: 'upload.php'

		});	
		</script> 
		</div>

		<div class="col-sm-4 qcol">
		<h3>D:</h3>
		<textarea class="form-control" name="opt4" id="opt4"></textarea>
		<script>
		CKEDITOR.replace('opt4', {

			filebrowserUploadUrl: 'upload.php'

		});	
		</script> 
		</div>
		
	</div>

	<div class="row">
		<div class="form-group col-md-6">
		<h4>Choose Answer</h4>
		<select class="form-control" name="answer" id="answer">
			<option value="option_1">A</option>
			<option value="option_2">B</option>
			<option value="option_3">C</option>
			<option value="option_4">D</option>
		</select>
		</div>
	</div>

	<div class="row">
		<div class="form-group col-sm-4">
		<input type="text" name="score1" id="score1" class="form-control" placeholder="score 1">
		</div>

		<div class="form-group col-sm-4">
		<input type="text" name="score2" id="score2" class="form-control" placeholder="score 2">
		</div>

		<div class="form-group col-sm-4">
		<input type="text" name="score3" id="score3" class="form-control" placeholder="score 3">
		</div>

		<div class="form-group col-sm-4">
		<input type="text" name="netscore" id="netscore" class="form-control" placeholder="net score">
		</div>
	</div>

	<div class="form-group">
	<input type="submit" class="btn btn-success" name="submit" id="submit">
	</div>
	
</form>
</div>

<?php 

	if(isset($_POST['submit'])){

		$qno = $_POST['qn'];
		$question = $_POST['question'];
		$option_1 = $_POST['opt1'];
		$option_2 = $_POST['opt2'];
		$option_3 = $_POST['opt3'];
		$option_4 = $_POST['opt4'];
		$answer = $_POST['answer'];
		$score_1 = $_POST['score1'];
		$score_2 = $_POST['score2'];
		$score_3 = $_POST['score3'];
		$net_score = $_POST['netscore'];

		if($answer == 'option_1'){

			$ans = $option_1;

		}

		elseif($answer == 'option_2'){

			$ans = $option_2;
		}

		elseif($answer == 'option_3'){

			$ans = $option_3;
		}
		else {

			$ans = $option_4;
		}

		if(mysqli_query($conn, "INSERT INTO questions (test_id,qno,question,option_1,option_2,option_3,option_4,answer,score_1,score_2,score_3,net_score)VALUES('$test_id','$qno','$question','$option_1','$option_2','$option_3','$option_4','$ans','$score_1','$score_2','$score_3','$net_score')")){

			?>

			<script>
				alert("Success");
			</script>
		
		<?php 

		}
		else {

			echo "<br>".mysqli_error($conn);
		}



	}


?>



</body>
</html>