<?php
	ob_start();
	session_start();
	include('dbconfig.php');
	require_once __DIR__ . '/facebook-sdk/src/Facebook/autoload.php';
	include_once('config.php');
	//include('dbconfig.php');
	
	$fb = new Facebook\Facebook([
		'app_id' => '249016282225554',
		'app_secret' => 'f0291ada3c20c3489b22cb959b47e695'
		]);

	$helper = $fb->getRedirectLoginHelper();

	$permissions = ['email'];
	$loginUrl = $helper->getLoginUrl('http://localhost.com/test/callback.php', $permissions);
	
?>
