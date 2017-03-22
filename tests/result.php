<?php 

session_start();
if(!isset($_SESSION['result']) || (isset($_SESSION['result']) && $_SESSION['result'] !== true))
{
   die('You cannot directly access this page!'); 
}

include("../dbconfig.php");

$marks = 0;
$pen = 0;
$done = 0;
$undone = 0;

$test_id = $_SESSION['test_id'];
$solutions = array();
$query = mysqli_query($conn, "SELECT * FROM questions WHERE test_id = $test_id");
while($res = mysqli_fetch_array($query)){

	$id = $res['id'];
	$answer = $res['answer'];
	$solutions[$id] = $answer;

	if(array_key_exists($id, $_SESSION['answers'])){

		if($solutions[$id] !== $_SESSION['answers'][$id]){

		$pen = $pen + 0.25;
		$done = $done + 1;
		
		}

		if($solutions[$id] == $_SESSION['answers'][$id]){

		$marks = $marks + 1;
		$done = $done + 1;
		}
	}
	else {
		$marks = $marks + 0;
		$undone = $undone + 1;
	}
	

	
	

	

	$total = $marks - $pen;
	$max = count($solutions);

	
}

$answered = ''.$done.'/'.$max.'';
$correct = $marks;
$wrong = $pen;
$unanswered = ''.$undone.'/'.$max.'';
$score = ''.$total.'/'.$max.' ';

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/w3.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

	<script type="text/javascript">
		localStorage.setItem("time","3600");
	</script>
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
								 			header('Location: pages/index.php');
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
        	<li class>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account<span class="caret"></span></a>
          <ul id="login-dp" class="dropdown-menu">
          	<li><a href="../pages/index.php">Dashboard</a></li>
          	<li><a href="../logout.php">Logout</a></li>
          </ul>
          </li>
        	<?php
        }
        ?>
			</ul>
        
		</div>

	</div>

</nav>

<div class="container-fluid">
		
	<table class="w3-table-all">
		
		<th>Score Card</th>
		<th></th>

		
		<tr>
			<td>Marks Obtained</td>
			<td><?php echo $correct; ?></td>
		</tr>
		<tr>
			<td>Penalty Deducted</td>
			<td>-<?php echo $wrong; ?></td>
		</tr>
		<tr>
			<td>Attempted Questions</td>
			<td><?php echo $answered; ?></td>
		</tr>
		<tr>
			<td>Skipped Questions</td>
			<td><?php echo $unanswered; ?></td>
		</tr>
		<tr>
			<td>Total Score</td>
			<td><?php echo $score; ?></td>
		</tr>
	</table>

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

<?php

unset($_SESSION['test']);

?>

</div>
</body>
</html>