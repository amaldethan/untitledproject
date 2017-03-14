<!DOCTYPE html>
<html>
<head>

<?php 
	include_once("../dbconfig.php");
	session_start();
	/*$test_id = $_SESSION['id'];
	$tname = $_SESSION['name'];
	$count = $_SESSION['count'];
	*/
?>
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

<div class="form-container contain">
	
	<table class="w3-table-all w3-hoverable">

		<thead>
			<tr>
				<th>Name</th>
				<th>Subject</th>
				<th>Chapter</th>
				<th>Syllabus</th>
				<th></th>
			</tr>
		</thead>
			<?php
				$quer = mysqli_query($conn, 'SELECT * FROM tests ORDER BY id DESC');
				while($res = mysqli_fetch_array($quer)){

					echo "<tr>";
					echo "<td>".$res['name']."</td>";
					echo "<td>".$res['subject']."</td>";
					echo "<td>".$res['chapter']."</td>";
					echo "<td>".$res['syllabus']."</td>";
					
					echo "<td><a href=\"edit_test.php?id=$res[id]\">Edit</a> </td>";
					echo "</tr>";
				}

			 ?>
		
		
	</table>

</div>

</body>
</html>