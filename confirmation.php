<?php

include "database.php";

//$passkey=$_GET['passkey'];
if(isset($_GET['passkey'])){
	$passkey = $_GET['passkey'];
	 }
	else{
		 echo "error";
	}


$qry="SELECT * from temp_table where confirm_code='$passkey'";

$res=mysqli_query($conn,$qry);

$count=mysqli_num_rows($res);

if ($count==1)
{
	$qry1="INSERT into reg_members (emailid,subscribed) SELECT emailid, subscribed from temp_table where confirm_code='$passkey'";

	$res1=mysqli_query($conn,$qry1);

	if ($res1)
	{
		echo "Your Email Id Is Verified! Now you will be getting XKCD Images in every 5 Minutes";
		$qry2="DELETE from temp_table where confirm_code='$passkey'";
		$res2=mysqli_query($conn,$qry2);		
	}
}
else
{
	echo "Error!";
}

?>