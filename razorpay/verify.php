<?php

require('config.php');
include('../dbconfig.php');

session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

$user_id = $_SESSION['user_id'];
$tpack_id = $_SESSION['tpack_id'];

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $payment_id = $_POST['razorpay_payment_id'];
    if(mysqli_query($conn,'INSERT into orders (payment_id,tpack_id,user_id) VALUES ("'.$payment_id.'","'.$tpack_id.'","'.$user_id.'")')){
        header('Location: pages/dashboard.php');
    }
    else{
        echo mysqli_error($conn);
    }
}
else
{
    echo "<p>Your payment failed</p>
             <p>{$error}</p>";
}


