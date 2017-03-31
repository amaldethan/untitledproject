<?php 
ob_start();
session_start();
include("../dbconfig.php");
if(!isset($_SESSION['admin']) || (isset($_SESSION['admin']) && $_SESSION['admin'] !== true))
{
   die('You cannot directly access this page!'); 
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/w3.css">
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	

</head>
<body>

<div class="container-fluid wrapper">
<nav class="nav navbar-default">
	
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>				
			</button>
			<a class="navbar-brand" href="#"><b>B' a whiz Admin</b></a>
		</div>
		<div class="collapse navbar-collapse" id="mynav">		
		<ul class="nav navbar-nav navbar-right">
			  <li><a href="dashboard.php">Dashboard</a></li>
		      <li class="active"><a href="add_test.php">Add Test</a></li>
		      <li><a href="list_test.php">List Tests</a></li>
			  <li><a href="../logout.php">Logout</a></li>
		</ul>
		</div>
	</nav>

<div class="test-form-container">
<h2>Add New Test</h2>
<form class="w3-container" method="POST" id="test-form">
	
	<div class="form-group">
		<input class="w3-input" type="text" name="testname" id="testname" placeholder="Test Name" required="">
	</div>
	<div class="form-group">
		<input class="w3-input" type="text" name="subject" id="subject" placeholder="Subject" required="">
	</div>
	<div class="form-group">
		<input class="w3-input" type="text" name="chapter" id="chapter" placeholder="Chapter" required="">
	</div>	
	<div class="form-group">
		<select class="w3-select" name="syllabus" required="">
			<option value="" disabled selected>Choose Syllabus</option>
			<option value="CBSE">CBSE</option>
			<option value="ICSE">ICSE</option>
			<option value="STATE">STATE</option>
		</select>
	</div>
	<div class="form-group">
		<select class="w3-select" name="testtype" required="">
			<option value="" disabled selected>Test Type</option>
			<option value="0">Paid</option>
			<option value="1">Trial</option>
			
		</select>
	</div>
	<div class="form-group">
		<input class="w3-btn w3-blue w3-round" type="submit" name="submit" id="submit" value="SUBMIT">
	</div>

</form>

</div>


<?php 
	
	//session_start();

	if(isset($_POST['submit'])){

		$tname = $_POST['testname'];
		$sub   = $_POST['subject'];
		$chap  = $_POST['chapter'];
		$syll  = $_POST['syllabus'];
		$ttype = $_POST['testtype'];

		if(mysqli_query($conn, 'INSERT into tests (name,subject,chapter,syllabus,samp_flag) VALUES ("'.$tname.'","'.$sub.'","'.$chap.'","'.$syll.'","'.$ttype.'")')){

			$query = mysqli_query($conn, 'SELECT * FROM tests ORDER BY id DESC LIMIT 1');
			while($res = mysqli_fetch_array($query)){

				 
				$_SESSION['name'] = $res['name'];
				$_SESSION['id'] = $res['id'];
				$_SESSION['count'] = $_POST['count'];
				header("location: add_questions.php");
			}

			

		}
		else {

			echo mysqli_error($conn);
		}

	}

?>

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