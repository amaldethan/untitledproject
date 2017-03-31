<?php
session_start();
include('dbconfig.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
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
		     
		    <?php 
		    
		    if(!isset($_SESSION['uname'])){ ?>  

		      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
								Login via
								<div class="social-buttons">
									<a href="social.php?provider=Facebook" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
									<a href="social.php?provider=Google" class="btn btn-tw"><i class="fa fa-google-plus"></i> Google+</a>
								</div>
                                or
								 <form class="form" role="form" method="POST" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="email">Email address</label>
											 <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="password">Password</label>
											 <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                             <div class="help-block text-right"><a href="">Forget the password ?</a></div>
										</div>
										<div class="form-group">
											 <input type="submit" class="btn btn-primary btn-block" id="signin" name="signin">Sign in</input>
										</div>
										
								 </form>
								 <?php
								 	if(isset($_POST['signin'])){

								 		$email = $_POST['email'];
								 		$pass = md5($_POST['password']);

								 		$query = mysqli_query($conn, 'SELECT * FROM users WHERE uname = "'.$email.'" AND password = "'.$pass.'"');
								 		$result = mysqli_fetch_row($query);
								 		if($result>0){
								 			$get = mysqli_query($conn, 'SELECT * FROM users WHERE uname = "'.$email.'"');
								 			$row = mysqli_fetch_array($get);
								 			$_SESSION['started'] = true;
								 			$_SESSION['uname'] = $row['uname'];
								 			$_SESSION['id'] = $row['id'];
								 			header('Location: home.php');
								 		}
								 		else{
								 			 echo mysqli_error($conn);
								 		}

								 	} 
								 ?>
							</div>
							<div class="bottom text-center">
								New here ? <a href="register.php"><b>Sign Up</b></a>
							</div>
					 </div>
				</li>
			</ul>
        </li>
        <?php } else {

        	$name = $_SESSION['uname'];
        	$check = mysqli_query($conn, 'SELECT * FROM users WHERE uname = "'.$name.'"');
        	$arr = mysqli_fetch_array($check);
        	$uid = $arr['id']; 

         ?>
        	<li class=dropdown>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account<span class="caret"></span></a>
          <ul id="login-dp-logged" class="dropdown-menu">
          	<li>
          	<a href="pages/index.php">Dashboard</a>
          	</li>
          	<li><a href="logout.php">Logout</a></li>
          </ul>
          </li>
        	<?php
        }
        ?>
			</ul>
        
		</div>

	</div>

</nav>

<div class="container-fluid bg-1 text-center">

	 
	
</div>

<div class="row firstrow">
	<div class="col-sm-6 sm-left">
	<div class="textbox">
		<h3 align="center">Did you know ?</h3>
		<ul class="b">
			<li>Sample Content</li>
			<li>Sample Content</li>
			<li>Sample Content</li>
			<li>Sample Content</li>
			<li>Sample Content</li>
		</ul>


	</div>
	</div>

	<div class="col-sm-6 sm-right">
		<div class="textbox">
		<h3 align="center">What is adaptive assessment ?</h3>
		<ul class="b">
			<li>Sample Content</li>
			<li>Sample Content</li>
			<li>Sample Content</li>
			<li>Sample Content</li>
			<li>Sample Content</li>
		</ul>

		<form method="POST">
		<input type="submit" name="trial" id="trial" class="btn btn-default trial-button" value="Take a trial assessment">
		</form>

		<?php 

			if(isset($_POST['trial'])){
				if(!isset($_SESSION['uname'])){ ?>

				<script>
					alert("Please Login/Register");
					
				</script>
			<?php
				}
				else {
					$_SESSION['test'] = true;
					header('Location: tests/start.php');
				}
			}
		?>

	</div>
	</div>
</div>

<div class="row secondrow" style="margin-bottom:20px;">
	<h2 align="center"><b>Know more about adaptive assessment</b></h2>
	<div class="col-sm-3 mini-col">
		<div class="minibox">
			<h5><b>Change your perspective about tests</b></h5>
		</div>
	</div>
	<div class="col-sm-3 mini-col">
		<div class="minibox">
			<h5><b>Uses predictive modelling to help learn</b></h5>
		</div>
	</div>
	<div class="col-sm-3 mini-col">
		<div class="minibox">
			<h5><b>Learn as you answer</b></h5>
		</div>
	</div>
	<div class="col-sm-3 mini-col">
		<div class="minibox">
			<h5><b>Questions designed to stimulate your mind</b></h5>
		</div>
	</div>
	<br>
	<a href="#" class="btn btn-default linkbox" role="button">Learn More</a>


</div>

</div>
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


</body>
</html>