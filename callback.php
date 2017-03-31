<?php
session_start();
require_once __DIR__ . '/facebook-sdk/src/Facebook/autoload.php';
include('dbconfig.php');
$fb = new Facebook\Facebook([
		'app_id' => '249016282225554',
		'app_secret' => 'f0291ada3c20c3489b22cb959b47e695'
		]);

$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
 
if (! isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=first_name,last_name,email', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
 
if($user = $response->getGraphUser()){

 
$fname = $user['first_name']; // Retrieve user Id
$lname = $user['last_name']; // Retrieve user name
$emailid = $user['email'];

//mysqli_query($conn, 'INSERT into users(fname,lname,uname) VALUES("'.$fname.'","'.$lname.'","'.$emailid.'")');
echo $fname;
echo $lname;
echo $emailid;
$logoutUrl = $helper->getLogoutUrl('{access-token}', 'http://localhost.com');
echo '<a href="' . $logoutUrl . '">Logout of Facebook!</a>';
}
?>