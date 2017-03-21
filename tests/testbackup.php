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

			width:25%;
			height: 25%;
			float:right;
		}

	</style>
<body>
<div class="example"></div>
<div class="container-fluid">

	

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

	<form class="w3-container w3-border" method="POST">
		
	<div class="form-group" style="margin-bottom:30px;">
		<h3><?php echo $qn; ?></h3>
	</div>

	<div class="form-group">
	<input  type="radio" name="ans" value="<?php echo $opt1; ?>"/>
	<label for="ans"><?php echo $opt1; ?></label>
	</div>

	<div class="form-group">
	<input  type="radio" name="ans" value="<?php echo $opt2; ?>"/>
	<label for="ans"><?php echo $opt2; ?></label>
	</div>

	<div class="form-group">
	<input  type="radio" name="ans" value="<?php echo $opt3; ?>"/>
	<label for="ans"><?php echo $opt3; ?></label>
	</div>

	<div class="form-group">
	<input  type="radio" name="ans" value="<?php echo $opt4; ?>"/>
	<label for="ans"><?php echo $opt4; ?></label>
	</div>

	<div class="form-group" style="float:right;">
		<input class="w3-btn w3-green w3-round" type="submit" name="submit" id="submit" value="SUBMIT" onclick="resett()">
	</div>
	<div class="form-group" style="float:right; margin-right:5px;">
		<input class="w3-btn w3-grey w3-round" type="submit" name="reset" id="reset" value="RESET" onclick="resett()">
	</div>

	</form>

	
<?php } 
		
		if(isset($_POST['submit'])){
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
echo "<a href='?id=".$test_id."&page=".($page-1)."' class='w3-button w3-blue' onclick='resett()' style='margin-right:10px; width:100px;'>PREVIOUS</a>";
}
if($page!=$total_pages)
{
echo "<a href='?id=".$test_id."&page=".($page+1)."' class='w3-button w3-blue' onclick='resett()' style='width:100px;'>NEXT</a>";
}


?>

<div class="row" id="result">
	<a href="result.php" role="button" class="w3-btn w3-red">FINISH TEST</a>
</div>

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