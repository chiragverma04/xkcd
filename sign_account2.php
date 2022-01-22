<?php
include "database.php";
include "send1.php";

$confirm=md5(uniqid(rand(1,999)));
$useremail=$_POST['email'];
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
require 'vendor/autoload.php';
//Dotenv::load(__DIR__);
//$dotenv = new Dotenv\Dotenv(__DIR__);
//$dotenv->load();

$sendgrid_apikey = ("$Api");
$sendgrid = new SendGrid($sendgrid_apikey);
$url = 'https://api.sendgrid.com/';
$pass = $sendgrid_apikey;
//$template_id = 'd-4f1210f7179e4d4dbe228d5cf513a4a0 ';
//$js = array(
  //'sub' => array(':name' => array('Elmer')),
  //'filters' => array('templates' => array('settings' => array('enable' => 1, 'template_id' => $template_id)))
//);

$params = array(
    'to'        => "$useremail",
    'toname'    => "Example User",
    'from'      => "vermachirag4678@gmail.com",
    'fromname'  => "Email Verification",
    'subject'   => "Verify Email Address",
    'text'      => "I'm text!",
    'html'      => "<strong>Click On the Confirmation Code to Verify Your Email Address https://sql6.freemysqlhosting.net/sql6467289/confirmation.php?passkey=$confirm</strong>",
    //'x-smtpapi' => json_encode($js),
  );

$request =  $url.'api/mail.send.json';

// Generate curl request
$session = curl_init($request);
// Tell PHP not to use SSLv3 (instead opting for TLS)
curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $sendgrid_apikey));
// Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);
// Tell curl that this is the body of the POST
curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
// Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// obtain response
$response = curl_exec($session);
curl_close($session);

// print everything out
print_r($response);
    }
}
?>
