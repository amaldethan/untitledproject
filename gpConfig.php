<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '953576727947-edmpeueufia81o9sk29ev7kc0p7busi7.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'eN6HNtzDeorO6UnfA9v1kBrr'; //Google client secret
$redirectURL = 'http://localhost/test/'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>