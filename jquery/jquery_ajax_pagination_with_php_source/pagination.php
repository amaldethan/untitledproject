<?php
include('db.php');

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM employee ORDER BY id ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($conn, $sql); 
?>

<?php  
while ($row = mysqli_fetch_assoc($rs_result)) {
?>  
            <tr>  
            <td><?php echo $row["employee_name"]; ?></td>  
            <td><?php echo $row["employee_salary"]; ?></td>  
			<td><?php echo $row["employee_age"]; ?></td>  
            </tr>  
<?php  
};  
?>
