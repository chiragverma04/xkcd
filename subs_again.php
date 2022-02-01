<?php

include "database.php";

//$user_email = $_GET['email'];
if(isset($_GET['email'])){
     $user_email = $_GET['email'];
     echo "<h5> Success! </h5> ";
      }
     else{
          echo "error";
     }
$subscribe = 1;

		$qry = "UPDATE `reg_members` SET subscribed = '".$subscribe."' WHERE emailid='".$user_email."' ";

        $res= mysqli_query($conn,$qry);


        if($res){
            
          
        	echo "<h1> You have been Resubscribe! </h1> ";
         }
         
        else{
        	echo "Error..!";

        }

?>

</body>
</html>