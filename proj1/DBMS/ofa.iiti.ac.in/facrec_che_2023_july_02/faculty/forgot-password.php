<html>

<head>
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

    <link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/pages.css">

    <div class="container" style="border-radius:10px; height:500px; margin-top:50px;">
        <div class="col-md-10 col-md-offset-1">

            <div class="row" style="border-width: 2px; border-style: solid; border-radius: 10px; box-shadow: 0px 1px 30px 1px #284d7a; background-color:#F7FFFF;">


                <div class="col-md-6" style=" height:403px; border-radius: 10px 0px 0px 10px;"><img src="iitp.svg" style="margin-top: 5%; margin-left: 20%;">
                </div>

                <div class="col-md-6" style="border-radius: 0px 10px 10px 0px; height: 403px;">
                    <br />
                    <div class="col-md-10 col-md-offset-1">
                        <h3 style="text-align: center; color:red;"><strong>FORGOT PASSWORD</strong></h3><br />

                        <form action="" method="post" class="form" role="form">
                            <input type="hidden" name="ci_csrf_token" value="" />

                            <div class="inner-addon left-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                                <input type="text" name="email" placeholder="Please Enter Your Registered Email" require type="email" />
                            </div>

                            <br />

                            <div class="row">
                                <div class="col-md-3">
                                    <button type="submit" name="submit" value="Submit" class="cancelbtn">Submit</button>
                                </div>
                                <div class="col-md-9">
                                    <a href="login.php"><button type="button" class="loginbtn pull-right">Login Area</button></a>
                                </div>
                            </div>



                        </form>


                    </div>


                </div>
            </div>
        </div>
        <br />

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

<?php

include('connect.php');

if(isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Query the database to get the password associated with the entered email
    $query = "SELECT password FROM signup WHERE email=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $password = $row['password'];

        // Send the email with the password
        $to = $email;
        $subject = "Your Password Recovery";
        $message = "Your password is: " . $password; // Note: Sending passwords via email is insecure
        $headers = "From: divyamgoeldg@gmail.com"; // Change this to your email address
        

        // Send the email
        $mail_sent = mail($to, $subject, $message, $headers);

        if($mail_sent) {
            echo "An email with your password has been sent to your email address.";
        } else {
            echo "Failed to send email. Please try again later.";
        }
    } else {
        echo "No user found with this email.";
    }
}
?>
