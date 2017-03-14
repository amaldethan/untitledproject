<?php 
	session_start();
	include('../dbconfig.php');
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
	<script src="ckeditor/ckeditor.js"></script>
</head>
<body>

<div class="container-fluid">

	<table class="w3-table-all w3-hoverable">
		<thead>
			<th>Question</th>
			<th></th>
		</thead>
	

	<?php 
		$test_id = $_GET['id'];
		$results_per_page = 2;
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
		echo "</tr>";
	}
	
	?>

	</table>





<?php 
   $sql = "SELECT COUNT(id) AS total FROM questions WHERE test_id = 5";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   $total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
   echo '<ul class="pagination">';
   for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
   echo "<li><a href='edit_qn.php?id=".$test_id."&page=".$i."'";
   if ($i==$page)  echo " class='curPage'";
   echo ">".$i."</a></li> "; 
   }; 
   echo "</ul>"
   ?>

</div>

</body>
</html>
