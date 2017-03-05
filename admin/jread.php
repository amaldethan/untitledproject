<!DOCTYPE html>
<html>
<head>
	<title></title>

<?php 
//session_start();
$jfile = "test.json";

$data = file_get_contents($jfile);
	$myarr = json_decode($data, true);

	//echo $myarr[3]['qn'];

	/*$arrval = array_values($myarr);
	$min = min($arrval);
	$key = $min['netscore'];
	$max = max($arrval);
	$key_max = $max['netscore'];
	$pos = array_search($key, array_column($arrval, 'netscore'));
	$pos_max = array_search($key_max, array_column($arrval, 'netscore'));
	$mean = ceil(($pos+$pos_max)/2);
	$arr_ans = $arrval[$mean]['ans'];
	$arr_score = $arrval[$mean]['netscore'];
	//echo $pos."<br>";
	$_SESSION['meanval'] = $mean;
	*/

	foreach ($myarr as $key) {
		
	

?>	

</head>
<body>

<p><?php $key['qn']; ?></p>
<?php echo '<br>'; } ?>


</body>
</html>

