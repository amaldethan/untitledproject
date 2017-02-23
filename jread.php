<?php 
$jfile = "test.json";

$data = file_get_contents($jfile);
	$myarr = json_decode($data, true);

	//echo $myarr[3]['qn'];

	$arrval = array_values($myarr);
	$max = max($arrval);
	$key = $max['score1'];
	$pos = array_search($key, array_column($arrval, 'score1'));
	echo $pos;

	
?>	