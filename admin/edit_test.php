<?php 
ob_start();
session_start();
if(!isset($_SESSION['admin']) || (isset($_SESSION['admin']) && $_SESSION['admin'] !== true))
{
   die('You cannot directly access this page!'); 
}
include("../dbconfig.php");
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
		      <li><a href="list_test.php">List Tests</a></li>
			  <li><a href="../logout.php">Logout</a></li>
		</ul>
		</div>
</nav>
<div class="container-fluid" style="margin-top:20px;">

	<table class="w3-table-all w3-hoverable">
		<thead>
			<th>Question</th>
			<th></th>
			<th></th>
		</thead>
	

	<?php 
		$test_id = $_GET['id'];
		$results_per_page = 5;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
		$start_from = ($page-1) * $results_per_page;
		$query = mysqli_query($conn, "SELECT * FROM questions WHERE test_id = $test_id ORDER BY id ASC LIMIT $start_from, $results_per_page ");
		echo mysqli_error($conn);
		


	
	//$query = mysqli_query($conn,'SELECT * FROM questions WHERE test_id = "'.$test_id.'" ');
		while($res = mysqli_fetch_array($query)){
		
		$qn = $res['question'];
		$id = $res['id'];

		echo "<tr>";
		echo "<td>".$qn."</td>";
		echo "<td><a href=\"edit_qn.php?id=$id\">Edit</a> </td>";
		echo "<td><a href=\"del_qn.php?id=$id\">Delete</a> </td>";
		echo "</tr>";
	}
	
	?>

	</table>





<?php 
   $sql = "SELECT COUNT(id) AS total FROM questions WHERE test_id = $test_id";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   $total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
   echo '<ul class="pagination">';
   for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
   echo "<li><a href='edit_test.php?id=".$test_id."&page=".$i."'";
   if ($i==$page)  echo " class='curPage'";
   echo ">".$i."</a></li> "; 
   }; 
   echo "</ul>"
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
