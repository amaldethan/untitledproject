<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="js/jquery.min.js"></script>
</head>
<body>

<?php

	session_start();
	include('config.php');
	include('dbconfig.php');
	include('hybridauth-api/hybridauth/Hybrid/Auth.php');
	include('hybridauth-api/vendor/autoload.php');

	if(isset($_SESSION['provider'])){
	//$provider = $_SESSION['provider'];
	
	$provider = $_SESSION['provider'];
	$hybridauth = new Hybrid_Auth($config);
	//$authProvider = $hybridauth->authenticate($provider);
	$adapter = $hybridauth->getAdapter($provider);
	$adapter->logout();
	$hybridauth->logoutAllProviders();
	
	
	}
	session_unset();
    session_destroy();
    foreach($_COOKIE AS $key => $value) {
     setcookie($key,$value,time()-10000,"/",".localhost.com");
	}

    header('Location: home.php');
       		
		
?>

</body>
</html>

