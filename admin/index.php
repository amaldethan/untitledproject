<?php 
ob_start();
session_start();

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
	
<form class="w3-container" method="POST">
<div class="form-group">
	<input class="w3-input w3-border" type="text" name="username" id="username" placeholder="Username">
</div>
<div class="form-group">
	<input class="w3-input w3-border" type="password" name="password" id="password" placeholder="Password">
</div>	
	<input type="submit" class="w3-btn w3-blue" name="login" id="login" value="LOGIN">
</form>

</div>

	<?php 

		if(isset($_POST['login'])){

			$uname = $_POST['username'];
			$pass = $_POST['password'];

			if($uname == "admin" && $pass == "admin"){

				$_SESSION['admin'] = true;

				header('Location: dashboard.php');
			}
		}

	?>

</body>
</html>