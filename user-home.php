<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#content").load("profile.php?id=12");
		})
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
		      <li><a href="register.php">Register</a></li>
			</ul>
		</div>

	</div>

</nav>


<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3">
			<ul class="w3-ul w3-border">
			  <li id=""><a href="#">Dashboard</a></li>
		      <li><a href="#">My Account</a></li>
		      <li><a href="#">View Profile</a></li>
		      <li><a href="#">Edit Profile</a></li>
			</ul>
		</div>

		<div class="col-sm-9">
			

			<?php 
	session_start();
	include('dbconfig.php');
	$id = $_GET['id'];
	$query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
	while($res = mysqli_fetch_array($query)){

		$fname = $res['fname'];
		$lname = $res['lname'];
		$email = $res['uname'];
	}



?>

<div class="form-container signform">

<form method="POST">
	<div class="form-group">
		<label>First Name</label>
		<input class="form-control" type="text" name="fname" value="<?php echo $fname; ?>">
	</div>
	<div class="form-group">
		<label>Last Name</label>
		<input class="form-control" type="text" name="fname" value="<?php echo $lname; ?>">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input class="form-control" type="text" name="fname" value="<?php echo $email; ?>">
	</div>
	<div class="form-group">
		<label>Syllabus</label>
		<input class="form-control" type="text" name="syllabus" id="syllabus">
	</div>
	<div class="form-group">
		<label>Date of Birth</label>
		<input class="form-control" type="date" name="dob" id="dob">
	</div>
	<div class="form-group">
		<label>Grade</label>
		<input class="form-control" type="text" name="grade" id="grade">
	</div>
	<div class="form-group">
		<label>City</label>
		<input class="form-control" type="text" name="city" id="city">
	</div>
	<div class="form-group">
		<label></label>
		<input type="submit" name="submit" id="submit" value="submit">
	</div>
</form>
	
</div>

	<?php 

	if(isset($_POST['submit'])){

		$dob = date('Y-m-d', strtotime($_POST['dob']));
		$syllabus = $_POST['syllabus'];
		$grade = $_POST['grade'];
		$city = $_POST['city'];

		if(mysqli_query($conn, 'INSERT into profile (userid,dob,syllabus,grade,city) VALUES ("'.$id.'", "'.$dob.'","'.$syllabus.'","'.$grade.'","'.$city.'")')){

			
		}

		else {

			echo mysqli_error($conn);
		}

	}

	?>


		</div>
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

</div>
</body>
</html>