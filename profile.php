<?php 
session_start();
include('dbconfig.php');
if(!isset($_SESSION['started']) || (isset($_SESSION['started']) && $_SESSION['started'] !== true))
{
   die('You cannot directly access this page!'); 
}
$id = $_SESSION['id'];

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-social.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<?php 
	
	$query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
	while($res = mysqli_fetch_array($query)){

		$fname = $res['fname'];
		$lname = $res['lname'];
		$email = $res['uname'];
	}



?>

<div class="form-container signform">

<form method="POST" class="w3-container">
	<div class="form-group">
		<label>First Name</label>
		<input class="w3-input w3-border" type="text" name="fname" value="<?php echo $fname; ?>">
	</div>
	<div class="form-group">
		<label>Last Name</label>
		<input class="w3-input w3-border" type="text" name="fname" value="<?php echo $lname; ?>" disabled>
	</div>
	<div class="form-group">
		<label>Email</label>
		<input class="w3-input w3-border" type="text" name="fname" value="<?php echo $email; ?>" disabled>
	</div>
	<div class="form-group">
		<label>Syllabus</label>
		<input class="w3-input w3-border" type="text" name="syllabus" id="syllabus" required="" disabled>
	</div>
	<div class="form-group">
		<label>Date of Birth</label>
		<input class="w3-input w3-border" type="date" name="dob" id="dob" required="">
	</div>
	<div class="form-group">
		<label>Grade</label>
		<input class="w3-input w3-border" type="text" name="grade" id="grade" required="">
	</div>
	<div class="form-group">
		<label>City</label>
		<input class="w3-input w3-border" type="text" name="city" id="city" required="">
	</div>
	<div class="form-group">
		<label></label>
		<input type="submit" name="submit" id="submit" value="submit">
	</div>
</form>
	
</div>

	<?php 

	if(isset($_POST['submit'])){

		$dob = date('Y-m-d', strtotime($_POST['dob']));
		$syllabus = $_POST['syllabus'];
		$grade = $_POST['grade'];
		$city = $_POST['city'];

		if(mysqli_query($conn, 'INSERT into profile (userid,dob,syllabus,grade,city) VALUES ("'.$id.'", "'.$dob.'","'.$syllabus.'","'.$grade.'","'.$city.'")')){

			header('Location: pages/index.php');
		}

		else {

			echo mysqli_error($conn);
		}

	}

	?>

<body>

</body>
</html>