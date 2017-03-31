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


	<div class="test-form-container" style="margin-top:20px;">
	<h2>Add Test Pack</h2>
		<form class="w3-container" method="POST" style="margin-top:30px;">
			<div class="form-group">
				<input class="w3-input w3-border" type="text" name="pack_name" id="pack_name" placeholder="Test Pack Name" required="">
			</div>
			<div class="form-group">
				<input class="w3-input w3-border" type="text" name="subject" id="subject" placeholder="Subject" required="">
			</div>
			<div class="form-group">
				<input class="w3-input w3-border" type="text" name="grade" id="grade" placeholder="Class" required="">
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
				<input class="w3-btn w3-teal w3-round" type="submit" name="submit" id="submit" value="SUBMIT">
			</div>
		</form>

		<?php 

		if(isset($_POST['submit'])){

			$pack_name = $_POST['pack_name'];
			$subject = $_POST['subject'];
			$grade = $_POST['grade'];
			$syllabus = $_POST['syllabus'];

			if(mysqli_query($conn,'INSERT INTO tpack (pack_name,subject,grade,syllabus) VALUES ("'.$pack_name.'","'.$subject.'","'.$grade.'","'.$syllabus.'")')){

				$query = mysqli_query($conn, 'SELECT * FROM tpack ORDER BY id DESC LIMIT 1');
			
				while($res = mysqli_fetch_array($query)){
					$pack_id = $res['id'];
				}

				for($i=1;$i<11;$i++){

					$name = 'test'.$i;
					mysqli_query($conn, 'INSERT into tests (pack_id,name) VALUES("'.$pack_id.'","'.$name.'") ');
				} 
			}
			else {

				echo mysqli_error($conn);
			}	


		}

		?>

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