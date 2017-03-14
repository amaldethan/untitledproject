<?php
	ob_start();
	session_start();
	include('dbconfig.php')
	/*require_once __DIR__ . '/facebook-sdk/src/Facebook/autoload.php';
	include_once('config.php');
	include('dbconfig.php');
	
	$fb = new Facebook\Facebook([
		'app_id' => '249016282225554',
		'app_secret' => 'f0291ada3c20c3489b22cb959b47e695'
		]);

	$helper = $fb->getRedirectLoginHelper();

	$permissions = ['email'];
	$loginUrl = $helper->getLoginUrl('http://localhost.com/test/callback.php', $permissions);
	*/
?>
<!DOCTYPE html>
<html>
<head>
	
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-social.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid wrapper">
<nav class="nav navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>				
			</button>
			<a class="navbar-brand" href="#"><b>B' a whiz</b></a>
		</div>
		<div class="collapse navbar-collapse" id="mynav">		
		<ul class="nav navbar-nav navbar-right">
			  <li class="active"><a href="#">Home</a></li>
		      <li><a href="#">Its For You</a></li>
		      <li><a href="#">Test Portfolio</a></li>
		      <li><a href="#">Pricing</a></li>
		      <li><a href="register.html">Register</a></li>
			</ul>
		</div>

	</div>

</nav>

<div class="container-fluid" style="margin-bottom:50px;">
		

		<div class="row">
			<div class="col-md-6">
				<h4>Sign Up</h4>
				<div class="form-container signform">
				<form method="POST">
					<div class="form-group">
						<input class="form-control" type="text" name="fname" id="fname" placeholder="First Name" required="">
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="lname" id="lname" placeholder="Last Name" required="">
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="email" id="email" placeholder="Email" required="">
					</div>
					<div class="form-group">
						<input class="form-control" type="password" name="pwd" id="pwd" placeholder="Password" required="">
					</div>
					<div class="form-group">
						<input class="form-control btn btn-success" type="submit" name="create" id="create" value="Create">
					</div>
				</form>
				</div>
			</div>
			<div class="col-md-6">
				<h4>Register with the following account:</h4>
				<div class="form-container signform">
				<form>
					<a class="btn btn-block btn-social btn-facebook" href="sociallogin.php?provider=Facebook">
  					<span class="fa fa-facebook-official"></span>
  					Sign Up with Facebook
					</a>
					<a class="btn btn-block btn-social btn-google" href="sociallogin.php?provider=Google">
  					<span class="fa fa-google-plus-official"></span>
  					Sign Up with Google+
					</a>
					<a class="btn btn-block btn-social btn-twitter">
  					<span class="fa fa-twitter"></span>
  					Sign Up with Twitter
					</a>
				</form>
				</div>
			</div>
			
		</div>

	</div>

	<?php 

	if(isset($_POST['create'])){

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$pass = md5($_POST['pwd']);

		$query = mysqli_query($conn, 'SELECT * from users WHERE uname = "'.$email.'"');
		if(mysqli_fetch_row($query)>0){

			echo "User already exists";
		}


		else {

		if(mysqli_query($conn, 'INSERT into users (fname,lname,uname,password) VALUES ("'.$fname.'","'.$lname.'","'.$email.'","'.$pass.'")')){

		  $query = mysqli_query($conn, 'SELECT * FROM users WHERE uname = "'.$email.'"');
          while($res = mysqli_fetch_array($query)){
            $_SESSION['uname'] = $res['uname'];
            $_SESSION['started'] = true;
            $_SESSION['id'] = $res['id'];
            $id = $res['id'];


          }
          header('Location: profile.php');
		}
	}	
}


	?>





<footer class="mainfoot">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4">
				<ul class="foot">
					<li><a class="footlink" href="#">About Us</a></li>
					<li><a class="footlink" href="#">Terms & Conditions</a></li>
					<li><a class="footlink" href="#">Pricing</a></li>
				</ul>
			</div>
			<div class="col-sm-4">
				<ul class="foot">
					<li><a class="footlink" href="#">Privacy Policy</a></li>
					<li><a class="footlink" href="#">Refunds</a></li>
					<li><a class="footlink" href="#">FAQs</a></li>
				</ul>
			</div>
			<div class="col-sm-4">
				<ul class="foot">
					<li class="foot-li"><a class="fa fa-facebook-official" href="#" style="font-size: 30px;color: white"></a></li>
					<li class="foot-li"><a class="fa fa-google-plus-official" href="#" style="font-size: 30px;color: white"></a></li>
					<li class="foot-li"><a class="fa fa-twitter-square" href="#" style="font-size: 30px;color: white"></a></li>
				</ul>
			</div>
			
		</div>
		
	</div>

</footer>

</div>
</body>
</html>