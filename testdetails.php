<?php
session_start();
include('dbconfig.php');

require('razorpay/config.php');
require('razorpay/razorpay-php/Razorpay.php');

// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => 3456,
    'amount'          => 500 * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "Be A Whiz",
    "description"       => "Exam Portal",
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    
    
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid wrapper">
<nav class="nav navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>				
			</button>
			<a class="navbar-brand" href="#"><b>B' a whiz</b></a>
		</div>
		<div class="collapse navbar-collapse" id="mynav">		
		<ul class="nav navbar-nav navbar-right">
			  <li class="active"><a href="#">Home</a></li>
		      <li><a href="#">Its For You</a></li>
		      <li><a href="#">Test Portfolio</a></li>
		      <li><a href="#">Pricing</a></li>
		     
		    <?php 
		    
		    if(!isset($_SESSION['uname'])){ ?>  

		      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
								Login via
								<div class="social-buttons">
									<a href="social.php?provider=Facebook" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
									<a href="social.php?provider=Google" class="btn btn-tw"><i class="fa fa-google-plus"></i> Google+</a>
								</div>
                                or
								 <form class="form" role="form" method="POST" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="email">Email address</label>
											 <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="password">Password</label>
											 <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                             <div class="help-block text-right"><a href="">Forget the password ?</a></div>
										</div>
										<div class="form-group">
											 <input type="submit" class="btn btn-primary btn-block" id="signin" name="signin">Sign in</input>
										</div>
										
								 </form>
								 <?php
								 	if(isset($_POST['signin'])){

								 		$email = $_POST['email'];
								 		$pass = md5($_POST['password']);

								 		$query = mysqli_query($conn, 'SELECT * FROM users WHERE uname = "'.$email.'" AND password = "'.$pass.'"');
								 		$result = mysqli_fetch_row($query);
								 		if($result>0){
								 			$get = mysqli_query($conn, 'SELECT * FROM users WHERE uname = "'.$email.'"');
								 			$row = mysqli_fetch_array($get);
								 			$_SESSION['started'] = true;
								 			$_SESSION['uname'] = $row['uname'];
								 			$_SESSION['id'] = $row['id'];
								 			header('Location:'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
											
								 		}
								 		else{
								 			 echo mysqli_error($conn);
								 		}

								 	} 
								 ?>
							</div>
							<div class="bottom text-center">
								New here ? <a href="register.php"><b>Sign Up</b></a>
							</div>
					 </div>
				</li>
			</ul>
        </li>
        <?php } else {

        	$name = $_SESSION['uname'];
        	$check = mysqli_query($conn, 'SELECT * FROM users WHERE uname = "'.$name.'"');
        	$arr = mysqli_fetch_array($check);
        	$uid = $arr['id']; 
        	$_SESSION['user_id'] = $uid;

         ?>
        	<li class=dropdown>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account<span class="caret"></span></a>
          <ul id="login-dp-logged" class="dropdown-menu">
          	<li>
          	<a href="pages/index.php">Dashboard</a>
          	</li>
          	<li><a href="logout.php">Logout</a></li>
          </ul>
          </li>
        	<?php
        }
        ?>
			</ul>
        
		</div>

	</div>

</nav>

<div class="w3-row">

	<?php

	$id = $_GET['id'];
	$_SESSION['tpack_id'] = $id; 

		$query = mysqli_query($conn, 'SELECT * from tpack WHERE id = "'.$id.'"');
		while($res = mysqli_fetch_array($query)){
			$name  = $res['pack_name'];
			$subject = $res['subject'];
			$syllabus = $res['syllabus'];
			$grade = $res['grade'];
		
		}
	?>

	<div class="w3-col-s6" style="width:50%;">
	<div class="w3-container">
  	<h3><?php echo $name; ?></h3>
  	<hr>
  	<h5>Syllabus : <?php echo $syllabus; ?></h5>
  	<hr>
  	<h5>Class : <?php echo $grade; ?></h5>
  	<hr>
  	<p>Description about the test</p>
  	<?php if(isset($_SESSION['uname'])){ ?> 
  	<a id="rzp-button1" role="button" href="razorpay/pay.php" class="w3-button w3-blue w3-hover-green" style="width:100%;">BUY</a>
  	<?php } else { ?>
  	<button type="button" class="w3-button w3-grey" disabled style="width:100%;">Sign in to buy</button>
  	<?php
  	}
  	?>	
	</div>
	
	</div>
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
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="razorpay/verify.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
</form>
<script>
// Checkout details as a json
var options = <?php echo $json?>;

/**
 * The entire list of Checkout fields is available at
 * https://docs.razorpay.com/docs/checkout-form#checkout-fields
 */
options.handler = function (response){
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.razorpayform.submit();
};

// Boolean whether to show image inside a white frame. (default: true)
options.theme.image_padding = false;

options.modal = {
    ondismiss: function() {
        console.log("This code runs when the popup is closed");
    },
    // Boolean indicating whether pressing escape key 
    // should close the checkout form. (default: true)
    escape: true,
    // Boolean indicating whether clicking translucent blank
    // space outside checkout form should close the form. (default: false)
    backdropclose: false
};

var rzp = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){
    rzp.open();
    e.preventDefault();
}
</script>
</html>