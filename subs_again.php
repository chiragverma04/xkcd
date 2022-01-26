<?php

include "database.php";

$user_email = $_GET['email'];
$subscribe = 1;

		$qry = "UPDATE `reg_members` SET subscribed = '".$subscribe."' WHERE emailid='".$user_email."' ";

        $res= mysqli_query($conn,$qry);


        if($res){
            
             echo "<html>"; echo "<body>";
        	echo "<h1> You have been Resubscribe! </h1> ";
        	 echo "</body>"; echo "</html>";
                

        }
        else{
        	echo "Error..!";

        }

?>

</body>
</html>