<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([

 ['Test','Score'],
 <?php
 include("../dbconfig.php"); 
 $query = "SELECT *  FROM stats WHERE tpack_id = 1";

 $exec = mysqli_query($conn,$query);
 while($row = mysqli_fetch_array($exec)){

 	if($row['test1_score'] == NULL){
 		$row['test1_score'] = 0;
 	}

 	if($row['test2_score'] == NULL){
 		$row['test2_score'] = 0;
 	}
 	if($row['test3_score'] == NULL){
 		$row['test3_score'] = 0;
 	}
 	if($row['test4_score'] == NULL){
 		$row['test4_score'] = 0;
 	}
 	if($row['test5_score'] == NULL){
 		$row['test5_score'] = 0;
 	}
 	if($row['test6_score'] == NULL){
 		$row['test6_score'] = 0;
 	}
 	if($row['test7_score'] == NULL){
 		$row['test7_score'] = 0;
 	}
 	if($row['test8_score'] == NULL){
 		$row['test8_score'] = 0;
 	}
 	if($row['test9_score'] == NULL){
 		$row['test9_score'] = 0;
 	}
 	if($row['test10_score'] == NULL){
 		$row['test10_score'] = 0;
 	}

 echo '["Test 1",'.$row['test1_score'].'],';
 echo '["Test 2",'.$row['test2_score'].'],';
 echo '["Test 3",'.$row['test3_score'].'],';
 echo '["Test 4",'.$row['test4_score'].'],';
 echo '["Test 5",'.$row['test5_score'].'],';
 echo '["Test 6",'.$row['test6_score'].'],';
 echo '["Test 7",'.$row['test7_score'].'],';
 echo '["Test 8",'.$row['test8_score'].'],';
 echo '["Test 9",'.$row['test9_score'].'],';
 echo '["Test 10",'.$row['test10_score'].'],';
 
 }
 ?>
 
 ]);

 var options = {
 title: 'Performance',
 vAxis: { gridlines: { count: 4 } }
 };
 var chart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
 chart.draw(data, options);
 }
 </script>
</head>
<body>
<h3>Column Chart</h3>
 <div id="columnchart"></div>

</body>
</html>