<?php
include "database.php";
  include "send1.php"; 

$rand_num = rand(1,1000);
$url_xkcd = "https://xkcd.com/".$rand_num."/info.0.json";

//call api
$json_data = file_get_contents($url_xkcd);
$json_decoded = json_decode($json_data, true);
                                                                 
$image_url= $json_decoded['img']; 


$file_path = 'RTCAMP.png'; 

$success=file_put_contents($file_path, file_get_contents($image_url));

 echo $image_url; 

 echo "<br>";
 echo "<br>";

   if($success)
{
echo "Image File is saved now! ";
}

require 'vendor/autoload.php';

$sendgrid_apikey = ("$Api");
$sendgrid = new SendGrid($sendgrid_apikey);
$url = 'https://api.sendgrid.com/';

$pass = $sendgrid_apikey;
$filename = "RTCAMP.png";
$filePath = dirname(__FILE__);

$file_name_with_full_path = realpath('./'.$filename);
$filetype = "image/png"; 

$query = "SELECT * FROM `reg_members` WHERE subscribed= '1' ";

$res = $conn->query($query); 

//if(mysqli_num_rows($res) > 0){
  
  while($rows=$res->fetch_assoc()){
    $to = $rows['emailid'];

    $params = array(
      'to'        => "$to",
      'toname'    => "XKCD Comic Lover",
      'from'      => "vermachirag4678@gmail.com",
      'fromname'  => "Chirag Verma",
    'subject'   => " XKCD Comics ",
    'text'      => "I'm text!",
    'html'      =>  "<img src=" .$image_url." alt=Random image />"." <a href='http://127.0.0.1/rtcamp/unsubscribe.php?email=$to'>"." <h4>Unsubscribe XKCD!</h4></a>",
    'files['.$filename.']' => new CurlFile($file_name_with_full_path, $filetype, $filename)
  );
  
print_r($params);
$request =  $url.'api/mail.send.json';

// Generate curl request
$session = curl_init($request);
// Tell PHP not to use SSLv3 (instead opting for TLS)
curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $sendgrid_apikey));

//curl_setopt($session, CURLOPT_HTTPHEADER, array("Content-Type: image/png")); 
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
?>
