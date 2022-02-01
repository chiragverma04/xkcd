<?php
	include "database.php";

	//	$user_email = $_GET['email'];
        if(isset($_GET['email'])){
            $user_email = $_GET['email'];
            echo "<h5> Success! </h5> ";
             }
            else{
                echo "error";
            }

		$subscribe = 0;

		$qry = "UPDATE `reg_members` SET subscribed = '$subscribe' WHERE emailid='$user_email' ";

        $res= mysqli_query($conn,$qry);

		
            if($res){
                
                echo "You've been unsubscribed..! " . " <br> ";
                echo "Didn't mean to unsubscribe? " . "  " . 
                 "<a href='http://xkcd-image.herokuapp.com/subs_again.php?email=".$user_email."'><h1>Click to subscribe again!</h1></a>";
                 
                
        }
		else{
		    echo "Unable to unsubscribe,,Error";
		}
?>