<!DOCTYPE html>
<html>
<head>

<?php 
	include_once("../dbconfig.php");
	session_start();
	$id = $_GET['id'];
	//$tname = $_SESSION['name'];
	//$count = $_SESSION['count'];
	$query = mysqli_query($conn, "SELECT * FROM questions WHERE id = $id");
	while($res = mysqli_fetch_array($query)){
		$test_id = $res['test_id'];
		$qn = $res['question'];
		$opt1 = $res['option_1'];
		$opt2 = $res['option_2'];
		$opt3 = $res['option_3'];
		$opt4 = $res['option_4'];
		$ans = $res['answer'];
		$score1 = $res['score_1'];
		$score2 = $res['score_2'];
		$score3 = $res['score_3'];
		$net_score = $res['net_score'];
	}
	
?>
	<title></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/w3.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="ckeditor/ckeditor.js"></script>

</head>
<body>


<div class="w3-container" style="margin-top:20px; margin-bottom:20px;">
<form method="POST">

	<div class="row">
	<h2>Question</h2>
		<div class="form-group">
		<textarea class="w3-input w3-border" name="question" id="question"><?php echo $qn; ?></textarea>
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
		<textarea class="w3-input w3-border" name="opt_1" id="opt_1"><?php echo $opt1; ?></textarea>
		<script>
		CKEDITOR.replace('opt_1', {

			filebrowserUploadUrl: 'upload.php'

		});	
		</script> 
		</div>

		<div class="col-sm-4 qcol">
		<h3>B:</h3>
		<textarea class="w3-input w3-border" name="opt_2" id="opt_2"><?php echo $opt2; ?></textarea>
		<script>
		CKEDITOR.replace('opt_2', {

			filebrowserUploadUrl: 'upload.php'

		});	
		</script> 
		</div>

		<div class="col-sm-4 qcol">
		<h3>C:</h3>
		<textarea class="w3-input w3-border" name="opt_3" id="opt_3"><?php echo $opt3; ?></textarea>
		<script>
		CKEDITOR.replace('opt_3', {

			filebrowserUploadUrl: 'upload.php'

		});	
		</script> 
		</div>

		<div class="col-sm-4 qcol">
		<h3>D:</h3>
		<textarea class="w3-input w3-border" name="opt_4" id="opt_4"><?php echo $opt4; ?></textarea>
		<script>
		CKEDITOR.replace('opt_4', {

			filebrowserUploadUrl: 'upload.php'

		});	
		</script> 
		</div>
		
	</div>

	<div class="row">
		<div class="form-group col-md-6">
		<select class="w3-select w3-border" name="answer" id="answer" required="">
			<option value="" disabled selected>Choose Answer</option>
			<option value="option_1">A</option>
			<option value="option_2">B</option>
			<option value="option_3">C</option>
			<option value="option_4">D</option>
		</select>
		</div>
	</div>

	<div class="row">
		<div class="form-group col-sm-4">
		<input type="text" name="score_1" id="score_1" class="w3-input w3-border" value="<?php echo $score1; ?>">
		</div>

		<div class="form-group col-sm-4">
		<input type="text" name="score_2" id="score_2" class="w3-input w3-border" value="<?php echo $score2; ?>">
		</div>

		<div class="form-group col-sm-4">
		<input type="text" name="score_3" id="score_3" class="w3-input w3-border" value="<?php echo $score3; ?>">
		</div>

		<div class="form-group col-sm-4">
		<input type="text" name="net_score" id="net_score" class="w3-input w3-border" value="<?php echo $net_score; ?>">
		</div>
	</div>

	<div class="form-group">
	<input type="submit" class="btn btn-success" name="submit" id="submit" value="UPDATE">
	</div>
	
</form>
</div>

<?php 

	if(isset($_POST['submit'])){

		$qno = $_POST['qn'];
		$question = $_POST['question'];
		$option_1 = $_POST['opt_1'];
		$option_2 = $_POST['opt_2'];
		$option_3 = $_POST['opt_3'];
		$option_4 = $_POST['opt_4'];
		$answer = $_POST['answer'];
		$score_1 = $_POST['score_1'];
		$score_2 = $_POST['score_2'];
		$score_3 = $_POST['score_3'];
		$net_score = $_POST['net_score'];

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

		if(mysqli_query($conn, 'UPDATE questions SET question = "'.$question.'", option_1 = "'.$option_1.'",option_2 = "'.$option_2.'",option_3 ="'.$option_3.'",option_4 = "'.$option_4.'",answer = "'.$ans.'",score_1 = "'.$score_1.'",score_2 = "'.$score_2.'",score_3  = "'.$score_3.'",net_score = "'.$net_score.'" WHERE id = "'.$id.'"')){

			?>

			<script>
				alert("Success");
			</script>
		
		<?php 
		header('Location: edit_test.php?id='.$test_id.'');
		}
		else {

			echo "<br>".mysqli_error($conn);
		}



	}


?>



</body>
</html>