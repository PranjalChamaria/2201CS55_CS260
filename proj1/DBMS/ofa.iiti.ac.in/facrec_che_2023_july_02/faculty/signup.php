<?php
include("connect.php");
session_start();
if (!isset($_SESSION['captcha'])) {
    // If not set, generate a new random number for CAPTCHA
    $_SESSION['captcha'] = rand(1000, 9999);
}


if(isset($_POST['submit']))
{
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $cast=$_POST['cast'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['re_password'];
    $usercaptcha= $_POST['usercaptcha'];
    // $rand = isset($_SESSION['captcha']) ? $_SESSION['captcha'] : null;

    if($_SESSION['captcha'] != $usercaptcha)
    {
        echo "<script>alert('CAPTCHA validation failed! Please try again.');</script>";       
    }
    else
    {
    $query = "SELECT * FROM signup WHERE email=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
if($password!==$confirmpassword)
{
    echo "<script>alert('Password DO NOT MATCH');</script>";
}
else if(mysqli_stmt_num_rows($stmt) == 1)
{
    echo "<script>alert('Email already exists');</script>";
}
else
{
$hashedpwd=password_hash($password,PASSWORD_DEFAULT);
$sql="INSERT INTO signup (firstname,lastname,email,cast,password) VALUES ('$firstname','$lastname','$email','$cast','$hashedpwd')";

if(mysqli_query($conn,$sql))
{
    echo "<script>alert('You have been successfully registered! Now you can sign in!');</script>";
}
else
echo "Error: ".$sql."br<>".mysqli_error($conn);
}
}
}
?>
<html><head>
	<title>Employment Details</title>
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/favicon.ico">
	<link rel="icon" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/bootstrap-datepicker.css">
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/jquery.js"></script>
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/bootstrap.js"></script>
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/bootstrap-datepicker.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Sintony" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Hind&amp;display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;display=swap" rel="stylesheet"> 
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif&amp;display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


	
  <style type="text/css">
    body {
        background-color: rgb(217, 232, 235);
        padding-top: 0px !important;
    }
</style>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;family=Poppins:ital,wght@0,400;0,500;0,600;0,800;1,400;1,500;1,600;1,800&amp;display=swap"></head>

<body class="vsc-initialized">
  <div class="container-fluid" style="background-color:  #64ccccff; margin-bottom: 10px;">
    <div class="container">
        <div class="row" style="margin-bottom:10px; ">
            <div class="col-md-8 col-md-offset-2">

                <!--  <img src="iitplogo.png" alt="logo1" class="img-responsive" style="padding-top: 5px; height: 120px; float: left;"> -->

                <h3 style="text-align:center;color:#4e529b!important;font-weight: bold;font-size: 2.3em; margin-top: 3px; font-family: 'Noto Sans', sans-serif;">भारतीय प्रौद्योगिकी संस्थान पटना</h3>
                <h3 style="text-align:center;color: #516181!important;font-weight: bold;font-family: 'Oswald', sans-serif!important;font-size: 2.2em; margin-top: 0px;">Indian Institute of Technology Patna</h3>

            </div>



        </div>
        <!-- <h3 style="text-align:center; color: #414002; font-weight: bold;  font-family: 'Fjalla One', sans-serif!important; font-size: 2em;">Application for Academic Appointment</h3> -->
    </div>
</div>
<h3 style="color: #2f7e45; margin-bottom: 20px; font-weight: bold; text-align: center;font-family: 'Noto Serif', serif;" class="blink_me">Application for Faculty Position</h3>

    <style type="text/css">
        .captcha{
            width: 50%;
            background: blue;
            text-align: center;
            font-size: 24px;
            color: white;





        }
        .form-control {
            margin-bottom: 10px;
        }

        .back-imgs {
            /*background-position: center; */
            background-size: cover;
            /* Resize the background image to cover the entire container */
        }

        h3 {
            font-weight: bold;
            /*color:green;*/
            font-family: 'Sintony', sans-serif;
            text-align: center;
            color: green;
            /*text-align: center;*/
        }
    </style>

    <div class="container" style=" border-radius:10px; margin-top:20px;">
        <div class="row" style="border-width: 2px; border-style: solid; border-radius: 10px; box-shadow: 0px 1px 30px 1px #284d7a; height:500px; background-color:#F7FFFF;">

            <div class="col-md-6 col-sm-6 col-xs-6">

                <img src="iitp.svg" style="margin-left:22%; margin-top: 5%;">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <h3>CREATE YOUR PROFILE</h3><br />
                <form action="#" method="post" class="form" role="form">

                    <input type="hidden" name="ci_csrf_token" value="" />
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <input class="form-control" value='' name="firstname" placeholder="First name" type="text" required="" autofocus />
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <input class="form-control" name="lastname" value='' required="" placeholder="Last name" type="text" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <input class="form-control" name="email" placeholder="Your email" value='' required="" type="email" />
                        </div>

                        <div class="col-xs-6 col-md-6">
                            <select id="cast" name="cast" class="form-control input-md" required="">
                    <option value="">Select Category</option>
                      <option value="UR">UR</option>
                      <option value="OBC">OBC</option>
                      <option value="SC">SC</option>
                      <option value="ST">ST</option>
                      <option value="PWD">PWD</option>
                      <option value="EWS">EWS</option>
                  </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">

                            <input class="form-control" name="password" placeholder="New password" required="" type="password" />
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">

                            <input class="form-control" name="re_password" placeholder="Retype - new password" required="" type="password" />
                        </div>
                    </div>


                    <div class="row">

                        <input id="created_at" name="created_at" type="hidden">

                        <div class="col-xs-6 col-md-6">
                            <div class= "captcha">  <?php  echo $_SESSION['captcha'] ;  ?>   </div>

                        </div>

                        <div class="col-xs-6 col-md-6" style="">
                            <input class="form-control" name="usercaptcha" placeholder="Insert Captcha" required="" type="number" />
                        </div>


                        <div class="col-xs-12 col-md-12" style="">
                            <h5><strong><font color="purple">Note:</font>
                <br />  
                <br />  
                  <br />
                <font color="#124f93">
                1. Applicant should kindly check their email for activation link to access the portal. 
                <br />  
                2. Please check SPAM folder also, in case activation link is not received in INBOX.<br />
                3. Applicant applying for more than one position/ department should use <strong><font color="red">different email id</font></strong> for each application.</font>
                                </strong>
                                <br />
                                <br />
                                <br />
                            </h5>
                            <button class="btn btn-sm btn-primary" type="submit" name="submit" value="Submit">Register</button>

                            <strong class=" pull-right" style="color: green;">If registered <a href='login.php' class="btn btn-sm btn-success"> Login Here</a></strong>
                        </div>





                    </div>

                </form>

            </div>
        </div>

    </div>
    <br />
    <div class="container">
        <div class="col-md-8 col-md-offset-2" style="text-align: center!important; font-weight: bold; color: black!important;">

        </div>
    </div>

    <div id="footer"></div>
</body>

</html>

<script type="text/javascript">
    function blinker() {
        $('.blink_me').fadeOut(500);
        $('.blink_me').fadeIn(500);
    }

    setInterval(blinker, 1000);
</script>


