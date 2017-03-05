<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php
	session_start();

	$mean = $_SESSION['meanval'];
	if(isset($_POST['submit'])){
	
		$ans = $_POST['ans'];
		
		}

	//echo $mean."<br>";
	//echo $ans;

	$jfile = "test.json";

	$data = file_get_contents($jfile);
	$myarr = json_decode($data, true);


	//echo $myarr[3]['qn'];

	$arrval = array_values($myarr);
	$arr_ans = $arrval[$mean]['ans'];
	
	echo $arr_ans;
		
	if($ans == $arr_ans){
		$mean2 = $mean + 1;
	}
	elseif($ans !== $arr_ans){
		$mean2 = $mean - 1;
	}
	
	

?>
</head>
<body>
<p><?php echo $arrval[$mean2]['qn']; ?></p>


</body>
</html>
