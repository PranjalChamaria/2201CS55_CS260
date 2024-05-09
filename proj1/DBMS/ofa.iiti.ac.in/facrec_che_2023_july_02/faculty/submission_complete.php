<?php
include("connect.php");
session_start();
$sno = $_SESSION['sno'];
if(isset($_POST['submit']))
{
$file_name1=$_FILES["userfile7"]["name"];
$tmp_name1=$_FILES["userfile7"]["tmp_name"];
$folder1="C:/xampp/htdocs/DBMS/pdf_upload/".$file_name1;

move_uploaded_file($tmp_name1,$folder1);
$file_name2=$_FILES["userfile"]["name"];
$tmp_name2=$_FILES["userfile"]["tmp_name"];
$folder2="C:/xampp/htdocs/DBMS/pdf_upload/".$file_name2;
move_uploaded_file($tmp_name2,$folder2);

$file_name3=$_FILES["userfile1"]["name"];
$tmp_name3=$_FILES["userfile1"]["tmp_name"];
$folder3="C:/xampp/htdocs/DBMS/pdf_upload/".$file_name3;
move_uploaded_file($tmp_name3,$folder3);

$file_name4=$_FILES["userfile2"]["name"];
$tmp_name4=$_FILES["userfile2"]["tmp_name"];
$folder4="C:/xampp/htdocs/DBMS/pdf_upload/".$file_name4;
move_uploaded_file($tmp_name4,$folder4);

$file_name5=$_FILES["userfile3"]["name"];
$tmp_name5=$_FILES["userfile3"]["tmp_name"];
$folder5="C:/xampp/htdocs/DBMS/pdf_upload/".$file_name5;
move_uploaded_file($tmp_name5,$folder5);

$file_name6=$_FILES["userfile4"]["name"];
$tmp_name6=$_FILES["userfile4"]["tmp_name"];
$folder6="C:/xampp/htdocs/DBMS/pdf_upload/".$file_name6;
move_uploaded_file($tmp_name6,$folder6);

$file_name7=$_FILES["userfile9"]["name"];
$tmp_name7=$_FILES["userfile9"]["tmp_name"];
$folder7="C:/xampp/htdocs/DBMS/pdf_upload/".$file_name7;
move_uploaded_file($tmp_name7,$folder7);

$file_name8=$_FILES["userfile10"]["name"];
$tmp_name8=$_FILES["userfile10"]["tmp_name"];
$folder8="C:/xampp/htdocs/DBMS/pdf_upload/".$file_name8;
move_uploaded_file($tmp_name8,$folder8);

$file_name9=$_FILES["userfile8"]["name"];
$tmp_name9=$_FILES["userfile8"]["tmp_name"];
$folder9="C:/xampp/htdocs/DBMS/pdf_upload/".$file_name9;
move_uploaded_file($tmp_name9,$folder9);

$file_name10=$_FILES["userfile6"]["name"];
$tmp_name10=$_FILES["userfile6"]["tmp_name"];
$folder10="C:/xampp/htdocs/DBMS/pdf_upload/".$file_name10;
move_uploaded_file($tmp_name10,$folder10);

$file_name11=$_FILES["userfile5"]["name"];
$tmp_name11=$_FILES["userfile5"]["tmp_name"];
$folder11="C:/xampp/htdocs/DBMS/files_upload/".$file_name11;
move_uploaded_file($tmp_name11,$folder11);

$delete_query1 = "DELETE FROM pdf_upload WHERE app_no=?";
$delete_stmt1 = mysqli_prepare($conn, $delete_query1);
mysqli_stmt_bind_param($delete_stmt1, "i", $sno);
mysqli_stmt_execute($delete_stmt1);

$insert= "INSERT INTO pdf_upload (app_no, pap, phd,pg, ug, c12, c10,pay,noc,certi,misc,sig) VALUES ('$sno', '$folder1' ,'$folder2' ,'$folder3' , '$folder4' ,'$folder5','$folder6','$folder7' ,'$folder8','$folder9','$folder10' ,'$folder11')";
mysqli_query($conn, $insert);

$delete_query = "DELETE FROM referal WHERE app_no=?";
$delete_stmt = mysqli_prepare($conn, $delete_query);
mysqli_stmt_bind_param($delete_stmt, "i", $sno);
mysqli_stmt_execute($delete_stmt);

$a1= $_POST['ref_name'];
$a2= $_POST['position'];
$a3= $_POST['association_referee'];
$a4= $_POST['org'];
$a5= $_POST['email'];
$a6= $_POST['phone'];
for($i=0;$i<count($a1);$i++)
{
  $a11=$a1[$i];
  $a12=$a2[$i];
  $a13=$a3[$i];
  $a14=$a4[$i];
  $a15=$a5[$i];
  $a16=$a6[$i];
  $i++;
  $insert= "INSERT INTO referal (app_no, sno, name_ref,pos, ass_ref, ins, email,contact) VALUES ('$sno', '$i','$a11' ,'$a12' ,'$a13' , '$a14' ,'$a15','$a16')";
  $i--;
  mysqli_query($conn, $insert);
}
//header("Location:payment_complete.php");

}

?>
<html>
<head>
	<title>Referees & Upload</title>
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/bootstrap-datepicker.css">
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/jquery.js"></script>
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/bootstrap.js"></script>
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/bootstrap-datepicker.js"></script>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
	
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet"> 
	<link rel="preconnect" href="https://fonts.gstatic.com">
	

	
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
  /*padding: 10 !important;*/
  text-align: left!important;
  margin-top: -5px;
  font-family: 'Noto Serif', serif;
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

.panel-info .panel-heading{
  font-size: 1.1em;
  font-family: 'Oswald', sans-serif!important;
  padding-top: 5px;
  padding-bottom: 5px;
}

.panel-danger .panel-heading{
  font-size: 1.1em;
  font-family: 'Oswald', sans-serif!important;
  padding-top: 5px;
  padding-bottom: 5px;
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


.upload_crerti
{
  font-size: 1.1em;
  font-weight: bold;
  color: rgb(14, 119, 60);
  text-align: center;
}

.update_crerti
{
  font-size: 1.1em;
  font-weight: bold;
  color: green;
  text-align: center;
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
       </fieldset>



<!-- publication file upload           -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">


   <!-- Reprints of 5 Best Research Papers  -->

  <h4 style="text-align:center; font-weight: bold; color: #4eb3aa;">20. Reprints of 5 Best Research Papers *</h4>
   <div class="row">

                        <div class="col-md-12">
          <div class="panel panel-info">
            <div class="panel-heading">Upload 5 Best Research Papers in a single PDF < 6MB 
             <a href="http://localhost/DBMS/pdf_upload/<?php echo $file_name1;?>" class="btn-sm btn-info " target="_blank">View Uploaded File </a>
              <br />
              <br />
             
           </div>
              <div class="panel-body">
                <div class="col-md-5">
                <p class="update_crerti">Update 5 best papers</p>
                </div>
                <div class="col-md-7">
                 <input id="full_5_paper" name="userfile7" type="file" class="form-control input-md">
               </div>
            </div>
          </div>
        </div>

                
  </div>

 
 
<!-- certificate file code start -->
<h4 style="text-align:center; font-weight: bold; color: #4eb3aa;">21. Check List of the documents attached with the online application *</h4>

<div class="row">
  <div class="col-md-12">
  <div class="panel panel-success">
  <div class="panel-heading">Check List of the documents attached with the online application (Documents should be uploaded in PDF format only):
    <br />
    <small style="color: rgb(14, 119, 60);">Uploaded PDF files will not be displayed as part of the printed form.</small>
  </div>
    <div class="panel-body">
      <div class="row">
  
        <!-- <form action="https://ofa.iiti.ac.in/facrec_che_2023_july_02/submission_complete/upload" method="post" enctype="multipart/form-data"> -->
        <input type="hidden" name="ci_csrf_token" value="" />
     
     <!-- phd certificate  -->
      <div class="col-md-4">
    <div class="panel panel-info">
      <div class="panel-heading">PHD Certificate <a href="http://localhost/DBMS/pdf_upload/<?php echo $file_name2;?>" class="btn-sm btn-info " target="_blank">View Uploaded File </a></div>
        <div class="panel-body">
          <p class="update_crerti">Update PHD Certificate</p>
           <input id="phd" name="userfile" type="file" class="form-control input-md">
      </div>
    </div>
  </div>

        
         

     <!-- Master certificate  -->


                  <div class="col-md-4">
        <div class="panel panel-info">
          <div class="panel-heading">PG Documents <a href="http://localhost/DBMS/pdf_upload/<?php echo $file_name3;?>" class="btn-sm btn-info " target="_blank">View Uploaded File </a></div>
            <div class="panel-body">
              <p class="update_crerti">Update All semester/year-Marksheets and degree certificate</p>
               <input id="post_gr" name="userfile1" type="file" class="form-control input-md">
          </div>
        </div>
      </div>

            
              

 
 <!-- Bachelor certificate  -->


      <div class="col-md-4">
    <div class="panel panel-info">
      <div class="panel-heading">UG Documents <a href="http://localhost/DBMS/pdf_upload/<?php echo $file_name4;?>" class="btn-sm btn-info " target="_blank">View Uploaded File </a></div>
        <div class="panel-body">
          <p class="update_crerti">Update All semester/year-Marksheets and degree certificate  </p>
           <input id="under_gr" name="userfile2" type="file" class="form-control input-md">
      </div>
    </div>
  </div>

             


      <!-- 12th certificate  -->


                     <div class="col-md-4">
         <div class="panel panel-info">
           <div class="panel-heading">12th/HSC/Diploma Documents <a href="http://localhost/DBMS/pdf_upload/<?php echo $file_name5;?>" class="btn-sm btn-info " target="_blank">View Uploaded File </a></div>
             <div class="panel-body">
               <p class="update_crerti">Update 12th/HSC/Diploma/Marksheet(s) and passing certificate</p>
                <input id="higher_sec" name="userfile3" type="file" class="form-control input-md">
           </div>
         </div>
       </div>

                  



   <!-- 10th certificate  -->


            <div class="col-md-4">
      <div class="panel panel-info">
        <div class="panel-heading">10th/SSC Documents <a href="http://localhost/DBMS/pdf_upload/<?php echo $file_name6;?>" class="btn-sm btn-info " target="_blank">View Uploaded File </a></div>
          <div class="panel-body">
            <p class="update_crerti">Update 12th/HSC/Diploma/Marksheet(s) and passing certificate</p>
             <input id="high_school" name="userfile4" type="file" class="form-control input-md">
        </div>
      </div>
    </div>

            


    <!-- Pay Slip -->

            <div class="col-md-4">
      <div class="panel panel-info">
        <div class="panel-heading">Pay Slip <a href="http://localhost/DBMS/pdf_upload/<?php echo $file_name7;?>" class="btn-sm btn-info " target="_blank">View Uploaded File </a></div>
          <div class="panel-body">
            <p class="update_crerti">Update Pay Slip</p>
             <input id="pay_slip" name="userfile9" type="file" class="form-control input-md">
        </div>
      </div>
    </div>

            

<!-- Under Taking NOC -->

<!-- Pay Slip -->

<div class="col-md-6">
  <div class="panel panel-info">
    <div class="panel-heading">NOC or Undertaking <a href="http://localhost/DBMS/pdf_upload/<?php echo $file_name8;?>" class="btn-sm btn-info " target="_blank">View Uploaded File </a></div>
      <div class="panel-body">
        <p class="update_crerti">Undertaking-in case, NOC is not available at the time of application but will be provided at the time of interview</p>
         <input id="noc_under" name="userfile10" type="file" class="form-control input-md">
    </div>
  </div>
</div>

       
        <!-- 10 years post phd exp certificate  -->

                           <div class="col-md-5">
           <div class="panel panel-info">
             <div class="panel-heading">Post phd Experience Certificate/All Experience Certificates/ Last Pay slip/ 
              <a href="http://localhost/DBMS/pdf_upload/<?php echo $file_name9;?>" class="btn-sm btn-info " target="_blank">View Uploaded File </a>
              <br />

             </div>
               <div class="panel-body">
                 <p class="update_crerti">Update Certificate</p>
                  <input id="post_phd_10" name="userfile8" type="file" class="form-control input-md">
             </div>
           </div>
         </div>

                 


       

     <!-- Misc certificate  -->


            
          <div class="col-md-12">
            <div class="panel panel-info">
          <div class="panel-heading">Upload any other relevant document in a single PDF (For example award certificate, experience certificate etc) . If there are multiple documents, combine all the documents in a single PDF) <1MB. </div>
              <div class="panel-body">
                <div class="col-md-5">
                  <p class="upload_crerti">Upload any other document</p>
                </div>
                <div class="col-md-7">
                <input id="misc_certi" name="userfile6" type="file" class="form-control input-md">
                </div>
            </div>
          </div>
        </div>
              





        <div class="col-md-2"> 
        <!-- <input type="submit" value="Upload" name="upload_submit" class="btn btn-danger" required="" /> -->
        <!-- <br /><br /> -->
        </div>
      <!-- </form> -->
      </div> 

      
    
   </div>
  </div>
<!-- </div> -->

</div>
</div>



<!-- Signature certificate  -->

<div class="row">
   <div class="col-md-4">
   <div class="panel panel-danger">
     <div class="panel-heading" style="color: #3c763d;
     background-color: #dff0d8;">Upload your Signature in JPG only 
    </div>
       <div class="panel-body">
          <input id="signature" name="userfile5" type="file" class="form-control input-md">
     </div>
     <p class="upload_crerti"></p>
   </div>
 </div>

         

   <div class="col-md-12">
  
   </div>

</div>
<?php
    $query = "SELECT name_ref,pos, ass_ref,ins,email,contact FROM referal WHERE app_no = $sno && sno='1'";
    $a1="";
    $a2= "";
    $a3="";
    $a4= "";
    $a5="";
    $a6= "";
   

    $result = mysqli_query($conn, $query);
  

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $a1 = $row['name_ref'];
    $a2 = $row['pos'];
    $a3 = $row['ass_ref'];

    $a4 = $row['ins'];
    $a5 = $row['email'];
    $a6 = $row['contact'];
   
   

    mysqli_free_result($result);
} 
?>   
<?php


$query1 = "SELECT name_ref,pos, ass_ref,ins,email,contact FROM referal WHERE app_no = $sno && sno='2'";
$a11="";
$a21= "";
$a31="";
$a41= "";
$a51="";
$a61= "";
$result1 = mysqli_query($conn, $query1);
if ($result1 && mysqli_num_rows($result1) > 0) {
  $row = mysqli_fetch_assoc($result1);
  $a11 = $row['name_ref'];
  $a21 = $row['pos'];
  $a31= $row['ass_ref'];
  $a41 = $row['ins'];
  $a51= $row['email'];
  $a61= $row['contact'];
 
 

  mysqli_free_result($result1);
} 



?>

<?php

$query2 = "SELECT name_ref,pos, ass_ref,ins,email,contact FROM referal WHERE app_no = $sno && sno='3'";
$a12="";
$a22= "";
$a32="";
$a42= "";
$a52="";
$a62= "";

$result2 = mysqli_query($conn, $query2);

if ($result2 && mysqli_num_rows($result2) > 0) {
$row = mysqli_fetch_assoc($result2);
$a12 = $row['name_ref'];
$a22 = $row['pos'];
$a32= $row['ass_ref'];

$a42 = $row['ins'];
$a52= $row['email'];
$a62= $row['contact'];



mysqli_free_result($result2);
} 

?>

<h4 style="text-align:center; font-weight: bold; color: #4eb3aa;">22. Referees *</h4>

       <div class="row">
       <div class="col-md-12">
         <div class="panel panel-success">
         <div class="panel-heading">Fill the Details</div>
           <div class="panel-body">
             <table class="table table-bordered">
                 <tbody id="acde">
                 
                 <tr height="30px">
                   <th class="col-md-2"> Name </th>
                   <th class="col-md-3"> Position </th>
                   <th class="col-md-3"> Association with Referee</th>
                   <th class="col-md-3"> Institution/Organization</th>
                   <th class="col-md-2"> E-mail </th>
                   <th class="col-md-2"> Contact No.</th>
                 </tr>
                 
                 
               

                 <tr height="60px">
                   <td class="col-md-2">  
                       <input id="ref_name1" name="ref_name[]" type="text"  placeholder="Name" class="form-control input-md" required autofocus="" value="<?php echo "$a1"; ?>"> 
                   </td>

                   <td class="col-md-2"> 
                       <input id="position1" name="position[]" type="text"  placeholder="Position" class="form-control input-md" required value="<?php echo "$a2"; ?>"> 
                     </td>

                   <td class="col-md-2"> 
                     <select id="association_referee1" name="association_referee[]" class="form-control input-md" requiredvalue="<?php echo "$a3"; ?>">

                       <option selected='selected' value="">Select</option>
                       <option  value="Thesis Supervisor">Thesis Supervisor</option>
                       <option  value="Postdoc Supervisor">Postdoc Supervisor</option>
                       <option value="Research Collaborator">Research Collaborator</option>
                       <option  value="Other">Other</option>
                     </select>
                     </td>

                 
                    <td class="col-md-2"> 
                     <input id="org1" name="org[]" type="text"   placeholder="Institution/Organization" class="form-control input-md" required value="<?php echo "$a4"; ?>"> 
                   </td>
                   <td class="col-md-2"> 
                     <input id="email1" name="email[]" type="email"   placeholder="E-mail" class="form-control input-md" required value="<?php echo "$a5"; ?>"> 
                   </td>
                   <td class="col-md-2"> 
                     <input id="phone1" name="phone[]" type="text"  placeholder="Contact No." class="form-control input-md" maxlength="20" required value="<?php echo "$a6"; ?>"> 
                   </td>

                   
                 </tr>
                 

                 <tr height="60px">
                   <td class="col-md-2">  
                       <input id="ref_name1" name="ref_name[]" type="text"  placeholder="Name" class="form-control input-md" required autofocus=""value="<?php echo "$a11"; ?>"> 
                   </td>

                   <td class="col-md-2"> 
                       <input id="position1" name="position[]" type="text"  placeholder="Position" class="form-control input-md" required value="<?php echo "$a21"; ?>"> 
                     </td>

                   <td class="col-md-2"> 
                     <select id="association_referee1" name="association_referee[]" class="form-control input-md" required value="<?php echo "$a31"; ?>">

                       <option selected='selected' value="">Select</option>
                       <option  value="Thesis Supervisor">Thesis Supervisor</option>
                       <option  value="Postdoc Supervisor">Postdoc Supervisor</option>
                       <option value="Research Collaborator">Research Collaborator</option>
                       <option  value="Other">Other</option>
                     </select>
                     </td>

                 
                    <td class="col-md-2"> 
                     <input id="org1" name="org[]" type="text"   placeholder="Institution/Organization" class="form-control input-md" required value="<?php echo "$a41"; ?>"> 
                   </td>
                   <td class="col-md-2"> 
                     <input id="email1" name="email[]" type="email"   placeholder="E-mail" class="form-control input-md" required value="<?php echo "$a51"; ?>"> 
                   </td>
                   <td class="col-md-2"> 
                     <input id="phone1" name="phone[]" type="text"  placeholder="Contact No." class="form-control input-md" maxlength="20" required value="<?php echo "$a61"; ?>"> 
                   </td>

                   
                 </tr>
                 

                 <tr height="60px">
                   <td class="col-md-2">  
                       <input id="ref_name1" name="ref_name[]" type="text"  placeholder="Name" class="form-control input-md" required autofocus=""value="<?php echo "$a12"; ?>"> 
                   </td>

                   <td class="col-md-2"> 
                       <input id="position1" name="position[]" type="text"  placeholder="Position" class="form-control input-md" required value="<?php echo "$a22"; ?>"> 
                     </td>

                   <td class="col-md-2"> 
                     <select id="association_referee1" name="association_referee[]" class="form-control input-md" required value="<?php echo "$a32"; ?>">

                       <option selected='selected' value="">Select</option>
                       <option  value="Thesis Supervisor">Thesis Supervisor</option>
                       <option  value="Postdoc Supervisor">Postdoc Supervisor</option>
                       <option value="Research Collaborator">Research Collaborator</option>
                       <option  value="Other">Other</option>
                     </select>
                     </td>

                 
                    <td class="col-md-2"> 
                     <input id="org1" name="org[]" type="text"   placeholder="Institution/Organization" class="form-control input-md" required value="<?php echo "$a42"; ?>"> 
                   </td>
                   <td class="col-md-2"> 
                     <input id="email1" name="email[]" type="email"   placeholder="E-mail" class="form-control input-md" required value="<?php echo "$a52"; ?>"> 
                   </td>
                   <td class="col-md-2"> 
                     <input id="phone1" name="phone[]" type="text"  placeholder="Contact No." class="form-control input-md" maxlength="20" required value="<?php echo "$a62"; ?>"> 
                   </td>

                   
                 </tr>
                
              
               </tbody>
             </table>

         </div>
       </div>
       </div>
       </div>

<!-- Payment file upload           -->



<!-- Referees Details -->


<div class="row">
    <div class="col-md-9"> <!-- Reduce the width of this column -->
        <!-- Content for the first column -->
    </div>
    <div class="col-md-1"> 
    <button class="btn btn-sm btn-primary" type="submit" name="submit" id="save" value="submit">SAVE </button>
<!-- Keep the width of this column -->
    </div>

    <div class="col-md-1"> 
    <a href="payment_complete.php" class="btn btn-sm btn-primary" id="next">NEXT</a>
    <!-- Keep the width of this column -->
</div>
    
    <div class="col-md-1"> <!-- Keep the width of this column -->
    </div>
</div>   
</form>
</div> 
</div>
<script type="text/javascript">
function confirm_box()
{
  if(confirm("Dear Candidate, \n\nAre you sure that you are ready to submit the application? Press OK to submit the application. Press CANCEL to edit. \nOnce you press OK you cannot make any changes.\n\nThank you."))
  {
    return true;
  }
  else
  {
    return false;
  }
}
function submit_frm()
{
  alert();
  document.getElementById("upload_frm").submit();
}
</script>



<script type="text/javascript">
  $(document).ready(function () 
  {
   
    var list1 = document.getElementById('applicant_cate');
     
    list1.options[0] = new Option('Select/Category', '');
    list1.options[1] = new Option('Other Applicants', 'Other Applicants');
    list1.options[2] = new Option('OBC-NC, PwD, EWS and Female Applicants', 'OBC-NC, PwD, EWS and Female Applicants');
    list1.options[3] = new Option('SC, ST and Faculty Applicants from IIT Indore', 'SC, ST and Faculty Applicants from IIT Indore');
   

    $("#applicant_cate option").each(function()
    {

           if($(this).val()==selectoption){
        $(this).attr('selected', 'selected');
      }
      // Add $(this).val() to your list
    });

    getFoodItem();
      $("#payment_amount option").each(function()
    {

           if($(this).val()==selectsubthemeoption){
        $(this).attr('selected', 'selected');
      }
      // Add $(this).val() to your list
    });
  });

  
  function getFoodItem()
  {
 
    var list1 = document.getElementById('applicant_cate');
    var list2 = document.getElementById("payment_amount");
    var list1SelectedValue = list1.options[list1.selectedIndex].value;


    if (list1SelectedValue=='Other Applicants')
    {
         
        // list2.options.length=0;
        // list2.options[0] = new Option('Select Amount', '');
        list2.options[0] = new Option('INR 1000', 'INR 1000');
        
         
    }
    else if (list1SelectedValue=='OBC-NC, PwD, EWS and Female Applicants')
    {
         
        // list2.options.length=0;
        // list2.options[0] = new Option('Select Amount', '');
        list2.options[0] = new Option('INR 500', 'INR 500');
       
         
    }

    else if (list1SelectedValue=='SC, ST and Faculty Applicants from IIT Indore')
    {
         
        // list2.options.length=0;
        // list2.options[0] = new Option('Select Amount', '');
        list2.options[0] = new Option('NIL', 'NIL');
       
         
    }


    
}
</script>

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