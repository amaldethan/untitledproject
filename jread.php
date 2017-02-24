<!DOCTYPE html>
<html>
<head>
	<title></title>

<?php 
session_start();
$jfile = "test.json";

$data = file_get_contents($jfile);
	$myarr = json_decode($data, true);

	//echo $myarr[3]['qn'];

	$arrval = array_values($myarr);
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
	

?>	

</head>
<body>

<p><?php echo $arrval[$mean]['qn']; ?></p>
<form method="post" action="next.php">
	<div class="form-group">
		<input type="text" name="ans" id="ans" placeholder="Answer">
	</div>

	<div>
		<input type="submit" class="btn btn-default" name="submit" id="submit">
	</div>
		
</form>

</body>
</html>

