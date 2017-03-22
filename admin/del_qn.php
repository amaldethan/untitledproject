<?php 
ob_start();
session_start();
include("../dbconfig.php");
if(!isset($_SESSION['admin']) || (isset($_SESSION['admin']) && $_SESSION['admin'] !== true))
{
   die('You cannot directly access this page!'); 
}

$id = $_GET['id'];

	$query = mysqli_query($conn, "SELECT * FROM questions WHERE id = $id");
	while($res = mysqli_fetch_array($query)){
		$test_id = $res['test_id'];
		$qn = $res['question'];
		$opt1 = $res['option_1'];
		$opt2 = $res['option_2'];
		$opt3 = $res['option_3'];
		$opt4 = $res['option_4'];
		$ans = $res['answer'];
		$score1 = $res['score_1'];
		$score2 = $res['score_2'];
		$score3 = $res['score_3'];
		$net_score = $res['net_score'];

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
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">

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
		      <li><a href="add_test.php">Add Test</a></li>
		      <li class="active"><a href="list_test.php">List Tests</a></li>
			  <li><a href="../logout.php">Logout</a></li>
		</ul>
		</div>
</nav>

<div class="container-fluid">
	
<table class="w3-table w3-striped">
	
	<tr>
		<td>Question</td>
		<td><?php echo $qn; ?></td>
	</tr>
	<tr>
		<td>Answer</td>
		<td><?php echo $ans; ?></td>
	</tr>
	<tr>
		<td>Score 1</td>
		<td><?php echo $score1; ?></td>
	</tr>
	<tr>
		<td>Score 2</td>
		<td><?php echo $score2; ?></td>
	</tr>
	<tr>
		<td>Score 3</td>
		<td><?php echo $score3; ?></td>
	</tr>
	<tr>
		<td>Net Score</td>
		<td><?php echo $net_score; ?></td>
	</tr>
</table>

<form method="POST">
	<input type="submit" class="w3-btn w3-red" name="delete" id="delete" value="DELETE">
</form>

</div>

<?php 

	if(isset($_POST['delete'])){

		if(mysqli_query($conn, 'DELETE FROM questions WHERE id = "'.$id.'"')){
			mysqli_query($conn, 'ALTER TABLE questions drop `id` ');
			mysqli_query($conn, 'ALTER TABLE questions ADD `id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;');
			?>
		<script>
			alert("DELETED SUCCESSFULLY");
			window.location = 'list_test.php';
		</script>
		<?php
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