<?php 

session_start();
include("../dbconfig.php");

$marks = 0;
$pen = 0;
$done = 0;
$undone = 0;

$test_id = $_SESSION['test_id'];
$solutions = array();
$query = mysqli_query($conn, "SELECT * FROM questions WHERE test_id = $test_id");
while($res = mysqli_fetch_array($query)){

	$id = $res['id'];
	$answer = $res['answer'];
	$solutions[$id] = $answer;

	if(array_key_exists($id, $_SESSION['answers'])){

		if($solutions[$id] !== $_SESSION['answers'][$id]){

		$pen = $pen + 0.25;
		$done = $done + 1;
		
		}

		if($solutions[$id] == $_SESSION['answers'][$id]){

		$marks = $marks + 1;
		$done = $done + 1;
		}
	}
	else {
		$marks = $marks + 0;
		$undone = $undone + 1;
	}
	

	
	

	

	$total = $marks - $pen;
	$max = count($solutions);

	
}

echo $total."<br>";
echo 'answered : '.$done.'/'.$max.''."<br>";
echo 'unanswered : '.$undone.'/'.$max.''."<br>";

echo 'score : '.$total.'/'.$max.' ';

?>