<?php
include "database.php";
include "send1.php";
include "username.php";

$confirm=md5(uniqid(rand(1,999)));
//$useremail=$_POST['email'];
if(isset($_POST['email'])){
  $useremail=$_POST['email'];
  echo "<h5>Success</h5>";
  }
  else{
   echo " Mail is not set";
  }

$subscribe = 1;

$qry= " SELECT * from reg_members WHERE emailid='$useremail'";

$res=mysqli_query($conn,$qry);


$count=mysqli_num_rows($res);
if ($count==0)
{
	$qry1="INSERT into temp_table (confirm_code,emailid,subscribed) values ('$confirm','$useremail','$subscribe')";

	$res1=mysqli_query($conn,$qry1);

	if ($res1)
	{

$url = 'https://api.sendgrid.com/';
$user = "$user1";
$pass = "$Api";


$params = array(
    'api_user' => $user,
    'api_key'  => $pass,
    'to'        => "$useremail",
    'toname'    => "Example User",
    'from'      => "$user1",
    'fromname'  => "Email Verification",
    'subject'   => "Verify Email Address",
    'text'      => "I'm text!",
    'html'      => "<strong>Click On the Confirmation Code to Verify Your Email Address https://xkcd-image.herokuapp.com/confirmation.php?passkey=$confirm</strong>",
  );

$request =  $url.'api/mail.send.json';
if($request){
echo "<h1>Thank You For Registering</h1>";
echo "<h2>Confirmation link sent to your Email Address</h2>";
echo "<h2>Click on the confirmation link to verify your email address</h2>";
}
$session = curl_init($request);
curl_setopt ($session, CURLOPT_POST, true);
curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $pass));

curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);


$response = curl_exec($session);
curl_close($session);

//print_r($response);
    }
}
?>
