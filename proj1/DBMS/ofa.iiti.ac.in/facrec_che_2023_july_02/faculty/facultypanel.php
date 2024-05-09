<?php
include("connect.php");
session_start();
$sno = $_SESSION['sno'];
$doa = date("Y-m-d");
$cast=$_SESSION['cast'];
$email=$_SESSION['email'];







if(isset($_POST['submit']))
{

$file_name=$_FILES["file"]["name"];
$tmp_name=$_FILES["file"]["tmp_name"];
$folder="C:/xampp/htdocs/DBMS/files_upload/".$file_name;
move_uploaded_file($tmp_name,$folder);
$file_name2=$_FILES["photo"]["name"];
$tmp_name2=$_FILES["photo"]["tmp_name"];
$folder2="C:/xampp/htdocs/DBMS/files_upload/".$file_name2;
move_uploaded_file($tmp_name2,$folder2);

    $sno = $_SESSION['sno'];
    $doa = date("Y-m-d");
  $cast=$_SESSION['cast'];
   $email=$_SESSION['email'];
    $query="DELETE from app_det where app_no=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $sno);
    mysqli_stmt_execute($stmt);
   // Assuming 'post' and 'dept' are obtained from a dropdown list and a default value respectively
   $post = $_POST['post'];
   $dept = 'chemical_engineering'; 
   // Insert data into the app_det table
   $sql = "INSERT INTO app_det ( app_no, doa, post, dept) VALUES ( '$sno', '$doa', '$post', '$dept')";

   // Execute the SQL query
  mysqli_query($conn, $sql);

  $delete_query1 = "DELETE FROM per_det WHERE app_no=?";
  $delete_stmt1 = mysqli_prepare($conn, $delete_query1);
  mysqli_stmt_bind_param($delete_stmt1, "i", $sno);
  mysqli_stmt_execute($delete_stmt1);


  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $nation=$_POST['nation'];
  $dob=$_POST['Date'];
  $gender=$_POST['gender'];
  $marital=$_POST['marital'];
  $category=$_POST['category'];
  $id=$_POST['id_proof'];
  $id_file=$folder;
  $father=$_POST['father_name'];
  $photo=$folder2;
  $insert= "INSERT INTO per_det (app_no, fname, mname, lname, nation, dob,gender,marital,category,idproof,id_file,father,photo) VALUES ('$sno', '$fname' ,'$mname' ,'$lname' , '$nation' ,'$dob','$gender','$marital' ,'$category','$id','$id_file' ,'$father','$photo')";
  mysqli_query($conn, $insert);

  
//-----------------------------------------------------------------------------------------------------------
 // Delete existing address information for the current application number
$delete_query1 = "DELETE FROM dbms.address WHERE app_no=?";
$delete_stmt1 = mysqli_prepare($conn, $delete_query1);
mysqli_stmt_bind_param($delete_stmt1, "i", $sno);
mysqli_stmt_execute($delete_stmt1);

// Insert new address information into the address table

$p_street = $_POST['padd'];
$p_city = $_POST['padd1'];
$p_state = $_POST['padd2'];
$p_country = $_POST['padd3'];
$p_code = $_POST['padd4'];
$c_street = $_POST['cadd'];
$c_city = $_POST['cadd1'];
$c_state = $_POST['cadd2'];
$c_country = $_POST['cadd3'];
$c_code = $_POST['cadd4'];


$insert_query1 = "INSERT INTO dbms.address (app_no, p_street, p_city, p_state, p_country, p_code, c_street, c_city, c_state, c_country, c_code) VALUES ('$sno', '$p_street', '$p_city', '$p_state', '$p_country', '$p_code', '$c_street', '$c_city', '$c_state', '$c_country', '$c_code')";
mysqli_query($conn, $insert_query1);

   // Delete existing contact information for the current application number
    $delete_query = "DELETE FROM contact WHERE app_no=?";
    $delete_stmt = mysqli_prepare($conn, $delete_query);
    mysqli_stmt_bind_param($delete_stmt, "i", $sno);
    mysqli_stmt_execute($delete_stmt);
  // Insert new contact information into the contact table
  
    $mob = $_POST['mobile'];
    $alt_mob = $_POST['mobile_2'];
    $landline = $_POST['landline'];
    $alt_email = $_POST['email_2'];

    $insert_query = "INSERT INTO contact (app_no, mob, alt_mob, landline, email, alt_email) VALUES ('$sno', '$mob' ,'$alt_mob' ,'$landline' , '$email' ,'$alt_email')";
    mysqli_query($conn, $insert_query);


//--------------------------------------------------------------------------------------------------------------
}
?>
<html>

<head>
    <title>Update your personal details</title>
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

<body>
    <div class="container-fluid" style="background-color: #64cccc; margin-bottom: 6px;">
        <div class="container">
            <div class="row" style="margin-bottom:10px; ">
                <div class="col-md-8 col-md-offset-2">


                    <h3 style="text-align:center;color:#4e529b!important;font-weight: bold;font-size: 2.3em; margin-top: 3px; font-family: 'Noto Sans', sans-serif;">भारतीय प्रौद्योगिकी संस्थान पटना</h3>
                    <h3 style="text-align:center;color: #516181!important;font-weight: bold;font-family: 'Oswald', sans-serif!important;font-size: 2.2em; margin-top: 0px;">Indian Institute of Technology Patna</h3>


                </div>



            </div>
        </div>
    </div>
    <h3 style="color: #2f7e45; margin-bottom: 20px; font-weight: bold; text-align: center;font-family: 'Noto Serif', serif;" class="blink_me">Application for Faculty Position</h3>

    

    <style type="text/css">
        body {
            padding-top: 30px;
        }

      
    </style>
    <style type="text/css">
        body {
            padding-top: 30px;
        }

        .form-control {
            margin-bottom: 20px;
        }

        label {
            padding: 0 !important;
            text-align: left !important;
            font-family: 'Noto Serif', serif;
        }

        span {
            font-size: 1.2em;
            font-family: 'Oswald', sans-serif !important;
            text-align: left !important;
            padding: 0px 10px 0px 0px !important;
            font-weight: bold;
            color: #4eb3aa;
        }

        hr {
            border-top: 1px solid #025198 !important;
        
            border-width: 3.2px;
        }

        .panel-heading {
            font-size: 1.3em;
            font-family: 'Oswald', sans-serif !important;
            letter-spacing: 1px;
        }

        .btn-primary {
            padding: 9px;
        }
    </style>


    <body>

        <script type="text/javascript">
        
            function ageCalculator() {
            

                debugger;
                var birthdate = document.getElementById('dob').value; // in "dd/MM/yyyy" format  
                var senddate = document.getElementById('Date').value; // in "dd/MM/yyyy" format  
                var x = birthdate.split("/");
                var y = senddate.split("/");
                var bdays = x[0];
                var bmonths = x[1];
                var byear = x[2];
                var sdays = y[0];
                var smonths = y[1];
                var syear = y[2];
               
                if (sdays < bdays) {
                    sdays = parseInt(sdays) + 30;
                    smonths = parseInt(smonths) - 1;
                    var fdays = sdays - bdays;
                } else {
                    var fdays = sdays - bdays;
                }
                if (smonths < bmonths) {
                    smonths = parseInt(smonths) + 12;
                    syear = syear - 1;
                    var fmonths = smonths - bmonths;
                } else {
                    var fmonths = smonths - bmonths;
                }
                var fyear = syear - byear;
                var year_to_days = fyear * 365;
                var month_to_days = fmonths * 30;
                var newage = (fyear + ' years ' + fmonths + ' months ' + fdays + ' days');


                var newage_year = (year_to_days + month_to_days + fdays);

                document.getElementById("age").value = newage;
                document.getElementById("age_days").value = newage_year;
                  }
        </script>

        <script type="text/javascript">
            function updateAb() {

                alert('hi');
            }
        </script>
        <script type="text/javascript">
            $(function() {
               
            });
        </script>
       



        

        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 well">
                    <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="ci_csrf_token" value="" />
                        <fieldset>

                            <legend>

                                <div class="row">
                                    <div class="col-md-8">
                    
                                    </div>

                                    <div class="col-md-3">

                                        <a href='#' class='btn btn-sm btn-info pull-right' onclick="get_username('Ma&nbsp;Agarwal', 711)" data-target='#passModal' data-toggle='modal'>Change Password</a>


                                    </div>
                                    <div class="col-md-1">
                                        <a href="login.php" class="btn btn-sm btn-success  pull-right">Logout</a>
                                    </div>
                                </div>


                            </legend>





                            <div id="project_show">

                                <div class="row">
                                    <div class="col-md-12">

                                        <label class="col-md-2 control-label" for="adv_num" style="color: #4eb3aa">Advertisement Number *</label>
                                        <div class="col-md-4">

                                            <select id="adv_num" name="adv_num" class="form-control input-md" required>
        <option>Select</option>
          <option selected='selected'>IITP/FACREC-CHE/2023/JULY/02</option>
      </select>

                                        </div>

                                        <label class="col-md-2 control-label" for="doa" style="color: #4eb3aa">Application Date</label>
                                        <div class="col-md-4">

<input id="doa" name="doa" type="text" readonly="readonly" value="<?php echo date("Y-m-d"); ?>" placeholder="" class="form-control input-md" required>
</div>
                                       
                                        <label class="col-md-2 control-label" for="app_no" style="color: #4eb3aa">Application Number</label>
                                        <div class="col-md-4">

<input id="app_no" name="app_no" type="text" readonly="readonly" value="<?php echo $sno; ?>" placeholder="" class="form-control input-md" required>
</div>
                                       
                                        <label class="col-md-2 control-label" for="post" style="color: #4eb3aa">Post Applied for *</label>
                                        <div class="col-md-4">
                                            <select id="post" name="post" class="form-control input-md" required>
          <option   value="">Select</option>
          <option  value="Professor">Professor</option>
          <option selected='selected'  value="Associate Professor">Associate Professor</option>
          <option   value="Assistant Professor Grade I">Assistant Professor Grade I</option>
          <option   value="Assistant Professor Grade II">Assistant Professor Grade II</option>
      </select>
                                        </div>

                                        <label class="col-md-2 control-label" for="dept" style="color: #4eb3aa">Department/School *</label>
                                        <div class="col-md-4">
                                            <select id="dept" name="dept" class="form-control input-md" required>
          <option  value="">Select</option>
          <option selected='selected' value="Chemical Engineering">Chemical Engineering</option>
      </select>

                                        </div>
                                    </div>
                                </div>
                                <hr>

<?php
    $query = "SELECT fname, mname, lname, dob, father,nation,gender, marital FROM per_det WHERE app_no = $sno";
    $fname="";
    $mname= "";
    $lname= "";
    $dob= "";
    $father="";
    $n= "";
    $g="";
    $m= "";

    $result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $fname = $row['fname'];
    $mname = $row['mname'];
    $lname = $row['lname'];
    $dob = $row['dob'];
    $father= $row['father'];
    $n=$row['nation'];
    $g= $row['gender'];
    $m= $row['marital'];

    mysqli_free_result($result);
} ?>            

<?php
    $query = "SELECT p_street, p_city, p_state, p_country, p_code, c_street, c_city, c_state, c_country, c_code FROM dbms.address WHERE app_no = $sno";
    $p_street= "";
    $p_city = "";
    $p_state="";
    $p_country="";
    $p_code="";
    $c_street= "";
    $c_city = "";
    $c_state="";
    $c_country="";
    $c_code="";
    $result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $p_street = $row['p_street'];
    $p_city = $row['p_city'];
    $p_state = $row['p_state'];
    $p_country = $row['p_country'];
    $p_code = $row['p_code'];
    $c_street = $row['c_street'];
    $c_city = $row['c_city'];
    $c_state = $row['c_state'];
    $c_country = $row['c_country'];
    $c_code = $row['c_code'];



    mysqli_free_result($result);
} ?>  

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-success">
                                            <div class="panel-heading">1. Personal Details <small class="pull-right">Upload/Update Photo *</small></div>
                                            <div class="panel-body" style="height: 390px">
                                                <div class="col-md-10">
                                                    <div class="row">

                                                        <span class="col-md-2 control-label" for="fname">First Name *</span>
                                                        <div class="col-md-4">
                                                        <input id="fname" name="fname" type="text" placeholder="First name" class="form-control input-md" maxlength="15" required value="<?php echo "$fname"; ?>">
                                                        </div>


                                                        <span class="col-md-2 control-label" for="mname">Middle Name</span>
                                                        <div class="col-md-4">
                                                            <input id="mname" name="mname" type="text" placeholder="Middle name" class="form-control input-md" maxlength="12" value="<?php echo "$mname"; ?>" >
                                                        </div>

                                                        <span class="col-md-2 control-label" for="lname">Last Name *</span>
                                                        <div class="col-md-4">
                                                            <input id="lname" name="lname" type="text" placeholder="Last name" class="form-control input-md" maxlength="15" required value="<?php echo "$lname"; ?>">
                                                        </div>


                                                        <span class="col-md-2 control-label" for="nationality" >Nationality *</span>
                                                        <div class="col-md-4">
                                                        <input id="nation"  name="nation" type="text" placeholder="nationality" class="form-control input-md" maxlength="15" required value="<?php echo "$n"; ?>">

                    
                                                        </div>


                                                        <span class="col-md-2 control-label" for="dob">Date of Birth DD/MM/YYYY *</span>
                                                        <div class="col-md-4">
                                                            <input id="dob" name="dob"  type="text" placeholder="DD/MM/YYYY" class="form-control input-md" required onfocusout="ageCalculator()" value="<?php echo "$dob"; ?>">

                                                            <input type="hidden" name="Date" id="Date" value="31/08/2023" />
                                                           
                                                        </div>


                                                        <span class="col-md-2 control-label" for="gender">Gender *</span>
                                                        <div class="col-md-4">
                                                        <input id="gender"  name="gender" type="text" placeholder="gender" class="form-control input-md" maxlength="15" required value="<?php echo "$g"; ?>">
  </div>


                                                        <span class="col-md-2 control-label" for="mstatus">Marital Status *</span>
                                                        <div class="col-md-4">
                                                        <input id="marital"  name="marital" type="text" placeholder="marital" class="form-control input-md" maxlength="15" required value="<?php echo "$m"; ?>">
                                               
                                                        </div>

                                                        <span class="col-md-2 control-label" for="cast">Category</span>
                                                        <div class="col-md-4">

<input id="category" name="category" type="text" readonly="readonly" value="<?php echo $cast; ?>" placeholder="" class="form-control input-md" required>
</div>

                                                    </div>

                                                    <div class="row">
                                                        <span class="col-md-2 control-label" for="mstatus">ID Proof *</span>
                                                        <div class="col-md-4">

                                                            <select id="id_proof" name="id_proof" class="form-control input-md" required>
                      <option selected='selected' value="">Select</option>
                      <option  value="AADHAR">AADHAR</option>
                      <option  value="PAN-CARD">PAN-CARD</option>
                      <option  value="DRIVING-LICENSE">
                      DRIVING-LICENSE</option>
                      <option  value="VOTER ID">VOTER ID</option>
                      <option  value="PASSPORT">PASSPORT</option>
                      <option  value="RATION CARD">RATION CARD</option>
                      
                      <option  value="OTHERS">OTHERS</option>
                    </select>
                                                        </div>


                                                        <span class="col-md-2 control-label" for="cast">Update ID Proof</span>
                                                        <div class="col-md-2">
                                                            <a href="http://localhost/DBMS/files_upload/<?php echo $file_name;?>" class="btn btn-sm btn-success" target="_blank">View Uploaded File </a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input  type="file" name="file">
                                                            <!-- <input type="submit" name="sub" value="Upload"> -->
                                                            </div>
                                                            </div>
                                                         <div class="row">  
                                                        <span class="col-md-2 control-label" for="father_name">Father's Name *</span>
                                                        <div class="col-md-4">                                                        
                                                        <input id="father_name"  name="father_name" name="father_name" type="text" placeholder="Father's Name" class="form-control input-md" maxlength="30" required  value="<?php echo "$father"; ?>">
                                                        </div>
                                                </div></div> 

                                                <div class="col-md-2 pull-right">
    <img src=" " id="previewImage" class="thumbnail pull-right" height="150" width="130" />
    <input id="fileInput" type="file" name="photo" onchange="previewFile()">
</div>

                                            </div>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-success">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="control-label" for="cadd">Correspondence Address </span>
                                                        <br />
                                                        <br />
                                                        <input id="cstreet" name="cadd" type="text" placeholder="street" class="form-control input-md" maxlength="200" required value="<?php echo "$c_street"; ?>">
                                                        <input id="ccity" name="cadd1" type="text" placeholder="city" class="form-control input-md" maxlength="200" required value="<?php echo "$c_city"; ?>">
                                                        <input id="cstate" name="cadd2" type="text" placeholder="state" class="form-control input-md" maxlength="200" required value="<?php echo "$c_state"; ?>">
                                                        <input id="ccountry" name="cadd3" type="text" placeholder="country" class="form-control input-md" maxlength="200" required value="<?php echo "$c_country"; ?>">
                                                        <input id="ccode" name="cadd4" type="text" placeholder="code" class="form-control input-md" maxlength="200" required value="<?php echo "$c_code"; ?>">


                                                    </div>


                                                    <div class="col-md-6">
                                                        <span class="control-label" for="padd">Permanent Address </span>
                                                        <br />
                                                        <br />
                                                        <input id="pstreet" name="padd" type="text" placeholder="street" class="form-control input-md" maxlength="200" required value="<?php echo "$p_street"; ?>">
                                                        <input id="pcity" name="padd1" type="text" placeholder="city" class="form-control input-md" maxlength="200" required value="<?php echo "$p_city"; ?>">
                                                        <input id="pstate" name="padd2" type="text" placeholder="state" class="form-control input-md" maxlength="200" required value="<?php echo "$p_state"; ?>">
                                                        <input id="pcountry" name="padd3" type="text" placeholder="country" class="form-control input-md" maxlength="200" required value="<?php echo "$p_country"; ?>">
                                                        <input id="pcode" name="padd4" type="text" placeholder="code" class="form-control input-md" maxlength="200" required value="<?php echo "$p_code"; ?>">




                                                    </div>

                                                </div>


                                            </div>
                                            </>
                                        </div>
                                    </div>
                                </div>

                                
<?php
    $query = "SELECT mob, alt_mob, landline, alt_email FROM contact WHERE app_no = $sno";
    $mob="";
    $mob2= "";
    $ll= "";
    $email2= "";

    $result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $mob = $row['mob'];
    $mob2 = $row['alt_mob'];
    $ll = $row['landline'];
    $email2 = $row['alt_email'];

    mysqli_free_result($result);
} ?>   

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-success">
                                            <div class="panel-body">
                                                <span class="col-md-2 control-label" for="mobile">Mobile *</span>
                                                <div class="col-md-4">
                                                    <input id="mobile"  name="mobile" type="text" placeholder="Mobile" class="form-control input-md" required maxlength="20" value="<?php echo "$mob"; ?>">
                                                </div>



                                                <span class="col-md-2 control-label" for="email">Email</span>
                                                <div class="col-md-4">
                                                <input id="em" name="em" type="text" readonly="readonly" value="<?php echo $email; ?>" placeholder="" class="form-control input-md" required>
                                                </div>

                                                <span class="col-md-2 control-label" for="mobile_2">Alternate Mobile </span>
                                                <div class="col-md-4">
                                                    <input id="mobile_2"  name="mobile_2" type="text" placeholder="Alternate Mobile " class="form-control input-md" maxlength="20"value="<?php echo "$mob2"; ?>">
                                                </div>

                                                <span class="col-md-2 control-label" for="email_2">Alternate Email </span>
                                                <div class="col-md-4">
                                                    <input id="email_2"  name="email_2" type="email" placeholder="Alternate Email" class="form-control input-md"value="<?php echo "$email2"; ?>">
                                                </div>


                                                <span class="col-md-2 control-label" for="landline">Landline Number</span>
                                                <div class="col-md-4">
                                                    <input id="landline"  name="landline" type="text" placeholder="Landline Number" class="form-control input-md" maxlength="20" value="<?php echo "$ll"; ?>">
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
    <div class="col-md-9"> <!-- Reduce the width of this column -->
        <!-- Content for the first column -->
    </div>
    <div class="col-md-1"> 
    <button class="btn btn-sm btn-primary" type="submit" name="submit" id="save" value="submit">SAVE </button>
<!-- Keep the width of this column -->
    </div>

    <div class="col-md-1"> 
    <a href="acde.php" class="btn btn-sm btn-primary" id="next">NEXT</a>
    <!-- Keep the width of this column -->
</div>
    
    <div class="col-md-1"> <!-- Keep the width of this column -->
    </div>
</div>
                               
                                                            </div>
                </div>

                </fieldset>
                </for>


            </div>
        </div>
        <div id="passModal" class="modal fade" role="dialog">
            <form action="login.html" method="post">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>Change Password</h2>

                        </div>
                        <div class="modal-body">
                            <h3>Change Password For :
                                <font color="#3377a0"><strong id="username_mod"></strong></font>
                            </h3>
                            <input type="hidden" name="fid" id="fid" value="" />
                            <div class="form-group">
                                <label>Current Password</label>
                                <input type="password" name="cr_password" placeholder="Current Password" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="n_password" placeholder="New Password" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Confirm New Password</label>
                                <input type="password" name="cn_password" placeholder="New Confirm Password" class="form-control" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="sub_pass" name="sub_pass" value="sub_pass" class="btn btn-info">Submit</button>
                            <button class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {

                var show_status = '0';
                if (show_status == 1) {
                    show1();
                }

            });

            function get_username(u, fid) {
                document.getElementById("username_mod").innerHTML = u;
                document.getElementById("fid").value = fid;
            }
           
        </script>


        <script type="text/javascript">
            function show_none() {
                document.getElementById('project_show').style.display = 'none';
            }

            function show1() {
                document.getElementById('project_show').style.display = 'block';
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
<script>
    
function previewFile() {
    const preview = document.getElementById('previewImage');
    const fileInput = document.getElementById('fileInput');
    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}

</script>

