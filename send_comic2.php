<?php
include "database.php";
include "send1.php"; 
include "username.php";
$rand_num = rand(1,1000);
$url_xkcd = "https://xkcd.com/".$rand_num."/info.0.json";


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
echo "<h1>Mail Sent to Your Email Address</h1>";
echo "<h1>Go and Enjoy Your XKCD Comics</h1>";
}


$url = 'https://api.sendgrid.com/';
$user = "$user1";
$pass = "$Api";


$filename = "RTCAMP.png";
$filePath = dirname(__FILE__);

$file_name_with_full_path = realpath('./'.$filename);
$filetype = "image/png"; 

$query = "SELECT * FROM `reg_members` WHERE subscribed= '1' ";

$res = $conn->query($query); 


  
  while($rows=$res->fetch_assoc()){
    $to = $rows['emailid'];

    $params = array(
      'api_user' => $user,
      'api_key'  => $pass,
      'to'        => "$to",
      'toname'    => "XKCD Comic Lover",
      'from'      => "vermachirag4678@gmail.com",
      'fromname'  => "Chirag Verma",
    'subject'   => " XKCD Comics ",
    'text'      => "I'm text!",
    'html'      =>  "<img src=" .$image_url." alt=Random image />"." <a href='http://xkcd-image.herokuapp.com/unsubscribe.php?email=$to'>"." <h4>Unsubscribe XKCD!</h4></a>",

    'files['.$filename.']' => new CurlFile($file_name_with_full_path, $filetype, $filename)
  );
  

$request =  $url.'api/mail.send.json';


$session = curl_init($request);
curl_setopt ($session, CURLOPT_POST, true);
curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $pass));

curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);


$response = curl_exec($session);
curl_close($session);
print_r($response);

}
?>
