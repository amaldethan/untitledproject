<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="../js/bootstrap.min.js"></script>
	<script src="ckeditor/ckeditor.js"></script>

	
	
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
	<input type="text" class="form-control" name="ans" id="ans" placeholder="answer">
	</div>

	<div class="form-group">
	<input type="text" name="score1" id="score1" class="form-control" placeholder="score 1">
	</div>

	<div class="form-group">
	<input type="text" name="score2" id="score2" class="form-control" placeholder="score 2">
	</div>

	<div class="form-group">
	<input type="text" name="score3" id="score3" class="form-control" placeholder="score 3">
	</div>

	<div class="form-group">
	<input type="text" name="netscore" id="netscore" class="form-control" placeholder="net score">
	</div>

	<div class="form-group">
	<input type="submit" class="btn btn-default" name="submit" id="submit">
	</div>

</form>
</div>

<?php

	
	$jfile = "test.json";
	$arr_data = array();
	$farray = array();

	if(isset($_POST['submit'])){

		$id = $_POST['qn'];
		$qn = $_POST['name'];
		$sol = $_POST['ans'];
		$score1 = $_POST['score1'];
		$score2 = $_POST['score2'];
		$score3 = $_POST['score3'];
		$netscore = $_POST['netscore'];

		//$JObj = array();

		$JObj = array('id' => $id, 
			'qn' => $qn, 
			'ans' => $sol,
			'score1' => $score1,
			'score2' => $score2,
			'score3' => $score3,
			'netscore' => $netscore

			);
		

		$JSon = json_encode($JObj, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
	
		if(!file_exists($jfile)){

		fopen($jfile, "a+");
		$FJobj = array($JObj);
		$Fen = json_encode($FJobj, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
		file_put_contents($jfile, $Fen);
	/*	$jsondata = file_get_contents($jfile);
		$farray = json_decode($jsondata, true);
		array_push($farray, $JObj);
		$exJson = json_encode($farray, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
		file_put_contents($jfile, $exJson);
	*/

		}
		else {

			$jsondata = file_get_contents($jfile);
			$arr_data = json_decode($jsondata, true);
			array_push($arr_data, $JObj);
			$exJson = json_encode($arr_data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
			file_put_contents($jfile, $exJson);
		}

	

	}

?>


</body>
</html>