<?php


if(isset($_POST['submit'])){

$curl = curl_init();

if(empty($_POST['email']) || empty($_POST['amount']) || empty($_POST['full_name']) || empty($_POST['phone_no'])){
  header("location: payform.php");
}else{


$full_name = strip_tags($_POST['full_name']);
$phone_no = strip_tags($_POST['phone_no']);
$email = strip_tags($_POST['email']);
$amount = strip_tags($_POST['amount']);  //the amount in kobo. This value is actually NGN 300

// url to go to after payment
$callback_url = 'myapp.com/pay/callback.php';  
 
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'email'=>$email,
    'callback_url' => $callback_url
  ]),
  CURLOPT_HTTPHEADER => [
    "authorization: Bearer sk_test_a883ff044ddf3a7305955006822b349b299361cb", //replace this with your own test key
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response, true);

if(!$tranx['status']){
  // there was an error from the API
  print_r('API returned error: ' . $tranx['message']);
}

// comment out this line if you want to redirect the user to the payment page
print_r($tranx);
// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $tranx['data']['authorization_url']);

}

}