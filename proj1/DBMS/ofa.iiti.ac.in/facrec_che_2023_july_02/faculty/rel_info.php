<?php
include("connect.php");
session_start();
$sno = $_SESSION['sno'];

if(isset($_POST['submit']))
 {
  $delete_q = "DELETE FROM large_paras WHERE  app_no=?";
  $delete_stmt11 = mysqli_prepare($conn, $delete_q);
  mysqli_stmt_bind_param($delete_stmt11, "i", $sno);
  mysqli_stmt_execute($delete_stmt11);

  $a1= $_POST['research_statement'];
  $a2= $_POST['teaching_statement'];
  $a3= $_POST['rel_in'];
  $a4= $_POST['prof_serv'];
  $a5= $_POST['jour_details'];
  $a6= $_POST['conf_details'];
  $sql1 = "INSERT INTO large_paras(app_no,research_contri,teach_contri,other,prof_service,journal_pub,conference_pub) VALUES ('$sno', '$a1', '$a2', '$a3', '$a4', '$a5','$a6')";
   mysqli_query($conn, $sql1);


   header("Location:submission_complete.php");    
}
?>
<html>
<head>
	<title>Rel Info</title>
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/bootstrap-datepicker.css">
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/jquery.js"></script>
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/bootstrap.js"></script>
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/bootstrap-datepicker.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Sintony" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet"> 
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


	
</head>
<style type="text/css">
body {
        background-color: rgb(217, 232, 235);
        padding-top: 0px !important;
    }
</style>
<body class="vsc-initialized">
  <div class="container-fluid" style="background-color:  #64ccccff; margin-bottom: 10px;">
    <div class="container">
        <div class="row" style="margin-bottom:10px; ">
            <div class="col-md-8 col-md-offset-2">

                <!--  <img src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/IITPatnalogo.png" alt="logo1" class="img-responsive" style="padding-top: 5px; height: 120px; float: left;"> -->

                <h3 style="text-align:center;color:#4e529b!important;font-weight: bold;font-size: 2.3em; margin-top: 3px; font-family: 'Noto Sans', sans-serif;">भारतीय प्रौद्योगिकी संस्थान पटना</h3>
                <h3 style="text-align:center;color: #516181!important;font-weight: bold;font-family: 'Oswald', sans-serif!important;font-size: 2.2em; margin-top: 0px;">Indian Institute of Technology Patna</h3>

            </div>



        </div>
        <!-- <h3 style="text-align:center; color: #414002; font-weight: bold;  font-family: 'Fjalla One', sans-serif!important; font-size: 2em;">Application for Academic Appointment</h3> -->
    </div>
</div>
<h3 style="color: #2f7e45; margin-bottom: 20px; font-weight: bold; text-align: center;font-family: 'Noto Serif', serif;" class="blink_me">Application for Faculty Position</h3>

<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/ckeditor/ckeditor.js"></script>

<style type="text/css">
body { padding-top:30px; }
.form-control { margin-bottom: 10px; }
.floating-box {
    display: inline-block;
    width: 150px;
    height: 75px;
    margin: 10px;
    border: 3px solid #73AD21;  
}
</style>
<style type="text/css">
body { padding-top:30px; }
.form-control { margin-bottom: 10px; }
label{
  padding: 0 !important;
}
hr{
  border-top: 1px solid #025198 !important;
  border-style: dashed!important;
  border-width: 1.2px;
}

.panel-heading{
  font-size: 1.3em;
  font-family: 'Oswald', sans-serif!important;
  letter-spacing: .5px;
}
.btn-primary {
  padding: 9px;
}

.Acae_data
{
  font-size: 1.1em;
  font-weight: bold;
  color: #414002;
}
p
{
  padding-top: 10px;
}
</style>

<!-- all bootstrap buttons classes -->
<!-- 
  class="btn btn-sm, btn-lg, "
  color - btn-success, btn-primary, btn-default, btn-danger, btn-info, btn-warning
-->



<a href='https://ofa.iiti.ac.in/facrec_che_2023_july_02/layout'></a>

<div class="container">
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 well">
            
              
            <fieldset>
             
                 <legend>
                  <div class="row">
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-2">
                      <a href="login.php" class="btn btn-sm btn-success  pull-right">Logout</a>
                    </div>
                  </div>
                
                
        </legend>
  
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="ci_csrf_token" value="" />


<div class="row">
      <div class="col-md-12">
        <div class="panel panel-success ">
        <div class="panel-heading">14. Significant research contribution and future plans *<small class="pull-right"></small> <br /><small>(Please provide a Research Statement describing your research plans to be conducted at IIT Patna in 2-3 years time frame in not more than 500 words)</small></div>
          <div class="panel-body">
            <textarea style="height:150px" placeholder="Significant research contribution and future plans" class="form-control input-md" name="research_statement" maxlength="3500" required><p><small></small></p>
</textarea>

          <script>
              // CKEDITOR.replace($_POST['conf_details']);
              CKEDITOR.replace('research_statement');

           

              
          </script>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="panel panel-success ">
      <div class="panel-heading">15. Significant teaching contribution and future plans * <small>(Please list UG/PG courses that you would like to develop and/or teach at IIT Patna)</small> <small class="pull-right"> (not more than 500 words)</small></div>
        <div class="panel-body">
          <textarea style="height:150px" placeholder="Significant teaching contribution and future plans" class="form-control input-md" name="teaching_statement" maxlength="3500" required><p><small></small></p>

</textarea>

         <script>
             // CKEDITOR.replace($_POST['conf_details']);
             CKEDITOR.replace('teaching_statement');

          

             
         </script>
      </div>
    </div>
    </div>



<div class="col-md-12">
      <div class="panel panel-success ">
      <div class="panel-heading">16. Any other relevant information. <small class="pull-right">(not more than 500 words)</small></div>
        <div class="panel-body">
          <textarea style="height:150px" placeholder="Any other relevant information you may like to furnish" class="form-control input-md" name="rel_in" maxlength="3500" required><p><small></small></p>

</textarea>

         <script>
             // CKEDITOR.replace($_POST['conf_details']);
             CKEDITOR.replace('rel_in');

          

             
         </script>
      </div>
    </div>
    </div>

    <div class="col-md-12">
          <div class="panel panel-success ">
          <div class="panel-heading">17. Professional Service : Editorship/Reviewership <small class="pull-right">(not more than 500 words)</small></div>
            <div class="panel-body">
              <textarea style="height:150px" placeholder="Professional Service as Reviewer/Editor etc" class="form-control input-md" name="prof_serv" maxlength="3500" required><p><small></small></p>

</textarea>

              <script>
                  // CKEDITOR.replace($_POST['conf_details']);
                  CKEDITOR.replace('prof_serv');

               

                  
              </script>
            
          </div>
        </div>
        </div>

<div class="col-md-12">
  <div class="panel panel-success ">
  <div class="panel-heading">18. Detailed List of Journal Publications <br />(Including Sr. No., Author's Names, Paper Title, Volume, Issue, Year, Page Nos., Impact Factor (if any), DOI, Status[Published/Accepted] )</div>
    <div class="panel-body">


      <textarea style="height:15px!important" placeholder="Detailed List of Journal Publications" id="jour_details" class="form-control input-md" name="jour_details" required><p><small></small></p>

</textarea>

      <script>
          // CKEDITOR.replace($_POST['conf_details']);
          CKEDITOR.replace('jour_details');

       

          
      </script>
  </div>
</div>
</div>


<div class="col-md-12">
  <div class="panel panel-success ">
  <div class="panel-heading">19. Detailed List of Conference Publications<br />(Including Sr. No.,  Author's Names, Paper Title, Name of the conference, Year, Page Nos., DOI [If any] )</div>
    <div class="panel-body">
      <textarea style="height:150px" placeholder="Detailed List of Conference Publications" id="conf_details" class="form-control input-md" name="conf_details" required><p><small></small></p>

</textarea>

      <script>
          CKEDITOR.replace('conf_details');
          
      </script>

  </div>
</div>
</div>



 </div>      
 

 <div class="col-md-9"> <!-- Reduce the width of this column -->
        <!-- Content for the first column -->
    </div>

    <div class="col-md-1"> 
    <button class="btn btn-sm btn-primary" type="submit" name="submit" id="save" value="submit">SAVE & NEXT</button>
<!-- Keep the width of this column -->
    </div>
    
    <div class="col-md-1"> <!-- Keep the width of this column -->
    </div>    
            </div>
           

            




</fieldset>
</form>



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