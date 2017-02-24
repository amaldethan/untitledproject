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
	
	/*$data = file_get_contents($jfile);
	$myarr = json_decode($data, true);

	echo $myarr[0]['qn'];
	


	
 ?>