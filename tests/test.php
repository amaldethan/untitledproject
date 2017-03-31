<?php
session_start();
if(!isset($_SESSION['test']) || (isset($_SESSION['test']) && $_SESSION['test'] !== true))
{
   die('You cannot directly access this page!'); 
}
include_once("../dbconfig.php");

?>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	
	<link rel="stylesheet" type="text/css" href="../css/w3.css">
	<link rel="stylesheet" type="text/css" href="../css/TimeCircles.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	
	<script src="../js/TimeCircles.js"></script>

	

	<style type="text/css">
		input,label{
       vertical-align: top;
		}

		#result {

			margin-top:30px;
			padding-left: 50%;
			padding-right: 50%;
		}
		
		.example {
			height: 25%;
			float:right;
		}

		.w3-container {

			margin: auto;
			width: 75%;
			margin-top: 20px;
		}

		@media (min-width: 360px) {

			.example {
				margin-bottom: 70px;
			}
		}

	</style>
</head>
<body onunload="resett()">
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

	

	<?php 
		$test_id = $_GET['id'];
		$results_per_page = 1;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
		$start_from = ($page-1) * $results_per_page;
		$query = mysqli_query($conn, "SELECT * FROM questions WHERE test_id = $test_id ORDER BY id ASC LIMIT $start_from, $results_per_page ");
		echo mysqli_error($conn);
		$_SESSION['test_id'] = $test_id;
		


	
	//$query = mysqli_query($conn,'SELECT * FROM questions WHERE test_id = "'.$test_id.'" ');
		while($res = mysqli_fetch_array($query)){
		$qid = $res['id'];
		$qn = $res['question'];
		//$id = $res['id'];
		$opt1 = $res['option_1'];
		$opt2 = $res['option_2'];
		$opt3 = $res['option_3'];
		$opt4 = $res['option_4'];
		$answer = $res['answer'];
		
	
	?>
	

	<div class="w3-container w3-border">
	<div class="example"></div>
	<form method="POST">
			
	<div class="form-group" style="margin-bottom:30px;">
		<h3><?php echo $qn; ?></h3>
	</div>

	<div class="form-group">
	<input  type="radio" name="ans" onchange="this.form.submit()" value="<?php echo $opt1; ?>" <?php if(isset($_POST['ans']) && $_POST['ans'] == $opt1) echo 'checked = "checked"';?>/>
	<label for="ans"><?php echo $opt1; ?></label>
	</div>

	<div class="form-group">
	<input  type="radio" name="ans" onchange="this.form.submit()" value="<?php echo $opt2; ?>" <?php if(isset($_POST['ans']) && $_POST['ans'] == $opt2) echo 'checked = "checked"';?>/>
	<label for="ans"><?php echo $opt2; ?></label>
	</div>

	<div class="form-group">
	<input  type="radio" name="ans" onchange="this.form.submit()" value="<?php echo $opt3; ?>" <?php if(isset($_POST['ans']) && $_POST['ans'] == $opt3) echo 'checked = "checked"';?>/>
	<label for="ans"><?php echo $opt3; ?></label>
	</div>

	<div class="form-group">
	<input  type="radio" name="ans" onchange="this.form.submit()" value="<?php echo $opt4; ?>" <?php if(isset($_POST['ans']) && $_POST['ans'] == $opt4) echo 'checked = "checked"';?>/>
	<label for="ans"><?php echo $opt4; ?></label>
	</div>

	

	

	
<?php } 
		
		if(isset($_POST['ans'])){
			if(array_key_exists($qid, $_SESSION['answers'])){
				?> <script type="text/javascript">
					alert("Already Submitted");
				</script>
				<?php
			}
			else {
		$_SESSION['answers'][$qid] = $_POST['ans'];
			}
		}
		if(isset($_POST['reset'])){

			unset($_SESSION['answers'][$qid]);
		
		}

?>
<?php

$sql = "SELECT COUNT(id) AS total FROM questions WHERE test_id = $test_id";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   $total_pages = ceil($row["total"] / $results_per_page);

if($page>1)
{
//echo "<a href='?id=".$test_id."&page=".($page-1)."' class='w3-button w3-blue' onclick='resett()' style='margin-right:10px; width:100px;'>PREVIOUS</a>";
}
if($page!=$total_pages)
{
echo "<a href='?id=".$test_id."&page=".($page+1)."' class='w3-button w3-blue' onclick='resett()' style='width:100px; float:right;'>NEXT</a>";
}

$_SESSION['result'] = true;
?>
</form>
</div>
<div class="row" id="result">
	<a href="result.php" role="button" class="w3-btn w3-red">FINISH TEST</a>
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


</div>
</body>

	<script type="text/javascript">
		var time = localStorage.getItem("time");
		$(".example").attr('data-timer',time);
	</script>

<script type="text/javascript">
		$(".example").TimeCircles({
			"time": {
				"Days":{
					"show":false
				},
				"Hours":{
					"show":false
				}
			},
			"count_past_zero":false
			
		})
		.addListener(
				function(unit,value,total){
				if(total<=0){
					alert("TIme up");
				}
			});
		function resett(){
		localStorage.removeItem("time");
		var time = $(".example").TimeCircles().getTime();
		localStorage.setItem("time", time); 
	}
	</script>
</html>

