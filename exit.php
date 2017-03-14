<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="POST">
	
	<input type="submit" name="logout" id="logout" value="logout">

</form>

<?php
	session_start(); 
	require_once __DIR__ . '/facebook-sdk/src/Facebook/autoload.php';
	require_once __DIR__ . '/facebook-sdk/src/Facebook/Facebook.php';
	$fb = new Facebook\Facebook([
		'app_id' => '249016282225554',
		'app_secret' => 'f0291ada3c20c3489b22cb959b47e695'
		]);


	if(isset($_POST['logout'])){

		
		header('Location: index.html');

	}

?>

</body>
</html>
