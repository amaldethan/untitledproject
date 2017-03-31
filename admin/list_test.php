<?php 
ob_start();
session_start();
if(!isset($_SESSION['admin']) || (isset($_SESSION['admin']) && $_SESSION['admin'] !== true))
{
   die('You cannot directly access this page!'); 
}

?>
<!DOCTYPE html>
<html>
<head>

<?php 
	include_once("../dbconfig.php");
	//session_start();
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
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">

	<script type="text/javascript">
    function deleteConfirm(){
        var result = confirm("Are you sure to delete selected tests ?");
        if(result){
            return true;
        }else{
            return false;
        }
    }

    $(document).ready(function(){
        $('#select_all').on('click',function(){
            if(this.checked){
                $('.checkbox').each(function(){
                    this.checked = true;
                });
            }else{
                 $('.checkbox').each(function(){
                    this.checked = false;
                });
            }
        });
        
        $('.checkbox').on('click',function(){
            if($('.checkbox:checked').length == $('.checkbox').length){
                $('#select_all').prop('checked',true);
            }else{
                $('#select_all').prop('checked',false);
            }
        });
    });
    </script>

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

<div class="form-container contain" style="margin-top:20px;">
	<form name="bulk_action_form" action="del_test.php" method="post" onsubmit="return deleteConfirm();"/>
	<table class="w3-table-all w3-hoverable">

		<thead>
			<tr>
				<th>Name</th>
				
				<th>Chapter</th>
				
				
				<th></th>
				<th></th>
				<th>Select All<input type="checkbox" name="select_all" id="select_all" value=""/></th>
			</tr>
		</thead>
			<?php
				$results_per_page = 10;
				if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
				$start_from = ($page-1) * $results_per_page;
				$quer = mysqli_query($conn, "SELECT * FROM tests ORDER BY id DESC LIMIT $start_from, $results_per_page");
				echo mysqli_error($conn);
				while($res = mysqli_fetch_array($quer)){

					if($res['samp_flag']==0){
						$type = 'Paid';
					}
					else{
						$type = 'Trial';
					}

					echo "<tr>";
					echo "<td>".$res['name']."</td>";
					echo "<td>".$res['chapter']."</td>";
					echo "<td><a href=\"edit_test.php?id=$res[id]\">Edit</a> </td>";
					echo "<td><a href=\"add_qn.php?id=$res[id]\">Add</a> </td>";

					?>
					<td><input type="checkbox" name="checked_id[]" class="checkbox" value=<?php echo $res['id']; ?>></td>
				<?php	
					echo "</tr>";
				}

			 ?>
		
		
	</table>
	<br>
	<input type="submit" class="w3-btn w3-red" name="delete" value="DELETE">
	</form>


<?php 
   $sql = "SELECT COUNT(id) AS total FROM tests";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   $total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
   echo '<ul class="pagination">';
   for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
   echo "<li><a href='list_test.php?page=".$i."'";
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