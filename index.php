<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1,user-scalable=no">
    <title>RTCAMP XKCD Challenge</title>


    <style>
        body{
            background-color: blue;
        }
        input[type="email"]{
          padding: 5px;
          width: 400px;
          margin: 10px;
          font-weight: bold;
          font-size: 20px;

        }
              input[type="Submit"] {
            background: #31c4fc;
            color: black;
            font-size: 15px;
            margin-top: 10px;
            width: 10%;
            align-items: center;
            letter-spacing: 1px;
            cursor: pointer;
            padding: 10px 15px;
            font-family: 'Roboto', sans-serif;
            transition: .5s ease-in;
            border-radius: 5px;
            font-weight: bold;

        }

        input[type="Submit"]:hover,
        input[type="Submit"]:focus{
               color: red;
               cursor: pointer;
        }
        p{
            color: white;
            font-size: 25px;
            font-weight: bold;
            margin-left: 550px;


        }
        h1{
            color: white;
        }

    



    </style>


</head>

<body>


    <center><h1> Enter Your Email to enjoy XKCD Comics.. </h1></center>
    <br>
    <br>

    <div class="login-box">

    
        <form action="sign_account2.php" name="LogForm" method="POST" onsubmit="return validateForm()">
            <div class="textbox">
                <p> Email-Id: </p>
                <br>

             <center>   <input type="email" name="email" placeholder="Usermail" required=""></center>
            </div>


            <br>
          <center>  <div class="btn">
                <input type="Submit" class="btn" name="submit" value="Submit">

            </div></center>

        </form>
        <?php
           if (isset($_GET['email']))
           {
	        $id=$_GET['email'];

            echo "<script type='text/javascript'>alert('$id');</script>";
   
           }
             ?>
    



</div>


</body>

</html>