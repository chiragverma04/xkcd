<?php
	include "database.php";

		$user_email = $_GET['email'];
		$subscribe = 0;

		$qry = "UPDATE `reg_members` SET subscribed = '$subscribe' WHERE emailid='$user_email' ";

        $res= mysqli_query($conn,$qry);

		
            if($res){
                echo "<html>"; echo "<body>";
                echo "You've been unsubscribed..! " . " <br> ";
                echo "Didn't mean to unsubscribe? " . "  " . 
                 "<a href='http://127.0.0.1/rtcamp/subs_again.php?email=".$user_email."'><h1>Click to subscribe again!</h1></a>";
                 echo "</body>"; echo "</html>";
                
        }
		else{
		    echo "Unable to unsubscribe,,Error";
		}
?>