<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="POST">
	<input type="submit" name="start" id="start" value="start">
</form>

<?php 

	error_reporting(E_ALL);
	if(isset($_POST['start'])){

		$_SESSION['answers'] = array();
		header("Location: test.php?id=8");
	}	
?>

</body>
</html>