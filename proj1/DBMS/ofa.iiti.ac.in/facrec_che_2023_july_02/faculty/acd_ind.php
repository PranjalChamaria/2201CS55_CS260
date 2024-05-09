<?php
include("connect.php");
session_start();
$sno = $_SESSION['sno'];

if(isset($_POST['submit']))
 {
      $a1 = $_POST['mname'];
      $a2 = $_POST['mstatus'];

  if(count($a1)) 
  {
      $delete_query = "DELETE FROM pro_soc WHERE app_no=?";
      $delete_stmt = mysqli_prepare($conn, $delete_query);
      mysqli_stmt_bind_param($delete_stmt, "i", $sno);
      mysqli_stmt_execute($delete_stmt);
      
      for ($i = 0; $i < count($a1); $i++) 
     {
      // Retrieve data for the current row
      $a11 = $a1[$i];
      $a22 = $a2[$i];
      $i++;
      $sql = "INSERT INTO pro_soc (app_no, sno,name_soc,mem) VALUES ('$sno', '$i' ,'$a11' ,'$a22')";
      $i--;
      mysqli_query($conn, $sql);
     }
  }

  $b1 = $_POST['trg'];
  $b2 = $_POST['porg'];
  $b3= $_POST['pyear'];
  $b4= $_POST['pduration'];

if(count($b1)) 
{
  $delete_query1 = "DELETE FROM pro_train WHERE app_no=?";
  $delete_stmt1 = mysqli_prepare($conn, $delete_query1);
  mysqli_stmt_bind_param($delete_stmt1, "i", $sno);
  mysqli_stmt_execute($delete_stmt1);
  
  for ($i = 0; $i < count($b1); $i++) 
 {
  // Retrieve data for the current row
  $b11 = $b1[$i];
  $b22 = $b2[$i];
  $b33 = $b3[$i];
  $b44 = $b4[$i];
  $i++;
  $sql1 = "INSERT INTO pro_train (app_no, sno,type_of,org,yr,dur) VALUES ('$sno', '$i' ,'$b11' ,'$b22','$b33','$b44')";
  $i--;
  mysqli_query($conn, $sql1);
 }
}

$c1 = $_POST['award_nature'];
$c2 = $_POST['award_org'];
$c3= $_POST['award_year'];

if(count($c1)) 
{
$delete_query2 = "DELETE FROM award WHERE app_no=?";
$delete_stmt2 = mysqli_prepare($conn, $delete_query2);
mysqli_stmt_bind_param($delete_stmt2, "i", $sno);
mysqli_stmt_execute($delete_stmt2);

for ($i = 0; $i < count($c1); $i++) 
{
// Retrieve data for the current row
$c11 = $c1[$i];
$c22 = $c2[$i];
$c33 = $c3[$i];
$i++;
$sql2 = "INSERT INTO award (app_no, sno,name_aw,awd_by,yr) VALUES ('$sno', '$i' ,'$c11' ,'$c22','$c33')";
$i--;
mysqli_query($conn, $sql2);
}
}

$d1 = $_POST['agency'];
$d2 = $_POST['stitle'];
$d3= $_POST['samount'];
$d4= $_POST['speriod'];
$d5= $_POST['s_role'];
$d6= $_POST['s_status'];

if(count($d1)) 
{
$delete_query3 = "DELETE FROM proj_spon WHERE app_no=?";
$delete_stmt3 = mysqli_prepare($conn, $delete_query3);
mysqli_stmt_bind_param($delete_stmt3, "i", $sno);
mysqli_stmt_execute($delete_stmt3);

for ($i = 0; $i < count($d1); $i++) 
{
// Retrieve data for the current row
$d11 = $d1[$i];
$d22 = $d2[$i];
$d33 = $d3[$i];
$d44 = $d4[$i];
$d55 = $d5[$i];
$d66 = $d6[$i];
$i++;
$sql3 = "INSERT INTO proj_spon (app_no, sno,agency,title,amt,dur,proj_role,proj_status) VALUES ('$sno', '$i' ,'$d11' ,'$d22','$d33','$d44','$d55','$d66')";
$i--;
mysqli_query($conn, $sql3);
}
}
$e1 = $_POST['c_org'];
$e2 = $_POST['ctitle'];
$e3= $_POST['camount'];
$e4= $_POST['cperiod'];
$e5= $_POST['c_role'];
$e6= $_POST['c_status'];

if(count($e1)) 
{
$delete_query4 = "DELETE FROM proj_cons WHERE app_no=?";
$delete_stmt4 = mysqli_prepare($conn, $delete_query4);
mysqli_stmt_bind_param($delete_stmt4, "i", $sno);
mysqli_stmt_execute($delete_stmt4);

for ($i = 0; $i < count($e1); $i++) 
{
// Retrieve data for the current row
$e11 = $e1[$i];
$e22 = $e2[$i];
$e33 = $e3[$i];
$e44 = $e4[$i];
$e55 = $e5[$i];
$e66 = $e6[$i];
$i++;
$sql4 = "INSERT INTO proj_cons (app_no, sno,org,title,amt,dur,proj_role,proj_status) VALUES ('$sno', '$i' ,'$e11' ,'$e22','$e33','$e44','$e55','$e66')";
$i--;
mysqli_query($conn, $sql4);
}
}
header("Location:thesis_course.php");
    }

?>
<html><head>
	<title>Academic Industrial Experience</title>
	<link rel="icon" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/bootstrap-datepicker.css">
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/jquery.js"></script>
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/bootstrap.js"></script>
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/bootstrap-datepicker.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;display=swap" rel="stylesheet"> 
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif&amp;display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


	
<style type="text/css">
body {
        background-color: rgb(217, 232, 235);
        padding-top: 0px !important;
    }
    
</style></head>
<body class="vsc-initialized">
  <div class="container-fluid" style="background-color:  #64ccccff; margin-bottom: 10px;">
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

span{
  font-size: 1.2em;
  font-family: 'Oswald', sans-serif!important;
  text-align: left!important;
  padding: 0px 10px 0px 0px!important;
  /*margin-bottom: 20px!important;*/

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
</style>
<script type="text/javascript">
             
            $(function () {
                $('.datepicker').datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true
                });
            });
</script>

<script type="text/javascript">
var tr="";
var counter_s_proj=1;
var counter_award=1;
var counter_prof_trg=1;
var counter_membership=1;
var counter_consultancy=1;

  $(document).ready(function(){
  

$("#add_more_s_proj").click(function(){
        create_tr();
        create_serial('s_proj');
        create_input('agency[]', 'Sponsoring Agency','agency'+counter_s_proj, 's_proj',counter_s_proj, 's_proj');
        create_input('stitle[]', 'Title of Project', 'stitle'+counter_s_proj,'s_proj',counter_s_proj, 's_proj');
        create_input('samount[]', 'Amount of grant', 'samount'+counter_s_proj,'s_proj',counter_s_proj, 's_proj');
        create_input('speriod[]', 'Period', 'speriod'+counter_s_proj,'s_proj',counter_s_proj, 's_proj');
        create_input('s_role[]', 'Role', 's_role'+counter_s_proj,'s_proj',counter_s_proj, 's_proj',false,true);
        create_input('s_status[]', 'Status', 's_status'+counter_s_proj,'s_proj',counter_s_proj, 's_proj',true);
        counter_s_proj++;
        return false;
  });
  
  $("#add_more_award").click(function(){
          create_tr();
          create_serial('award');
          create_input('award_nature[]', 'Name of Award','award_nature'+counter_award, 'award',counter_award, 'award');
          create_input('award_org[]', 'Granting body/Organization', 'award_org'+counter_award,'award',counter_award, 'award');
          create_input('award_year[]', 'Year', 'award_year'+counter_award,'award',counter_award, 'award',true);
          counter_award++;
          return false;
    });

  $("#add_more_prog_trg").click(function(){
          create_tr();
          create_serial('prof_trg');
          create_input('trg[]', 'Taining Received','trg'+counter_prof_trg, 'prof_trg',counter_prof_trg, 'prof_trg');
          create_input('porg[]', 'Organization', 'porg'+counter_prof_trg,'prof_trg',counter_prof_trg, 'prof_trg');
          create_input('pyear[]', 'Year', 'pyear'+counter_prof_trg,'prof_trg',counter_prof_trg, 'prof_trg');
          create_input('pduration[]', 'Duration', 'pduration'+counter_prof_trg,'prof_trg',counter_prof_trg, 'prof_trg',true);
          counter_prof_trg++;
          return false;
    });

  $("#add_membership").click(function(){
          create_tr();
          create_serial('membership');
          create_input('mname[]', 'Name of the Professional Society','mname'+counter_membership, 'membership',counter_membership, 'membership');
          create_input('mstatus[]', 'Membership Status (Lifetime/Annual)', 'mstatus'+counter_membership,'membership',counter_membership, 'membership',true);
          counter_membership++;
          return false;
    });

  $("#add_consultancy").click(function(){
          create_tr();
          create_serial('consultancy');
          create_input('c_org[]', 'Organization','c_org'+counter_consultancy, 'consultancy',counter_consultancy, 'consultancy');
          create_input('ctitle[]', 'Title of Project','ctitle'+counter_consultancy, 'consultancy',counter_consultancy, 'consultancy');
          create_input('camount[]', 'Amount of grant','camount'+counter_consultancy, 'consultancy',counter_consultancy, 'consultancy');
          create_input('cperiod[]', 'Period','cperiod'+counter_consultancy, 'consultancy',counter_consultancy, 'consultancy');

          create_input('c_role[]', 'Role', 'c_role'+counter_consultancy,'consultancy',counter_consultancy, 'consultancy',false,true);
          create_input('c_status[]', 'Status', 'c_status'+counter_consultancy,'consultancy',counter_consultancy, 'consultancy',true);
          counter_consultancy++;
          return false;
    });


});
  function create_select()
  {
    
  }
  function create_tr()
  {
    tr=document.createElement("tr");
  }
  function create_serial(tbody_id)
  {
    var td=document.createElement("td");
     var x = document.getElementById(tbody_id).rows.length;
    
    td.innerHTML=x;
     tr.appendChild(td);
  }
   function for_date_picker(obj)
  {
    obj.setAttribute("data-provide", "datepicker");
    obj.className += " datepicker";
    return obj;

  }
  function deleterow(e){
    var rowid=$(e).attr("data-id");
    var textbox=$("#id"+rowid).val();
    $.ajax({
            type: "POST",
            url  : "https://ofa.iiti.ac.in/facrec_che_2023_july_02/Acd_ind/deleterow/",
            data: {id: textbox},
                success: function(result) { 
                if(result.status=="OK"){
                $('.row_'+rowid).remove();
                }
                   
                }});

   
    }
  function create_input(t_name, place_value, id, tbody_id, counter, remove_name, btn=false, select=false, datepicker_set=false)
  {
    //console.log(counter);
    if(select==false)
    {

      var input=document.createElement("input");
      input.setAttribute("type", "text");
      input.setAttribute("name", t_name);
      input.setAttribute("id", id);
      input.setAttribute("placeholder", place_value);
      input.setAttribute("class", "form-control input-md");
      input.setAttribute("required", "");
      var td=document.createElement("td");
      td.appendChild(input);
    }
    if(select==true)
    {

      var sel=document.createElement("select");
      sel.setAttribute("name", t_name);
      sel.setAttribute("id", id);
      sel.setAttribute("class", "form-control input-md");
      sel.innerHTML+="<option>Select</option>";
      sel.innerHTML+="<option value='Principal Investigator'>Principal Investigator</option>";
      sel.innerHTML+="<option value='Co-investigator'>Co-investigator</option>";
      // sel.innerHTML+="<option value='in_preparation'>In-Preparation</option>";
      var td=document.createElement("td");
      td.appendChild(sel);
    }
    if(datepicker_set==true)
    {
      input=for_date_picker(input);
    }
    if(btn==true)
    {
      // alert();
      var but=document.createElement("button");
      but.setAttribute("class", "close");
      but.setAttribute("onclick", "remove_row('"+remove_name+"','"+counter+"', '"+tbody_id+"')");
      but.innerHTML="x";
      td.appendChild(but);
    }
    tr.setAttribute("id", "row"+counter);
    tr.appendChild(td);
    document.getElementById(tbody_id).appendChild(tr);
     $('.datepicker').datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true
                });
    
  }
  function remove_row(remove_name, n, tbody_id)
  {
    var tab=document.getElementById(remove_name);
    var tr=document.getElementById("row"+n);
    tab.removeChild(tr);
    var x = document.getElementById(tbody_id).rows.length;
    for(var i=0; i<=x; i++)
    {
      $("#"+tbody_id).find("tr:eq("+i+") td:first").text(i);
      
    }
    
  }
</script>




<a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/layout"></a>

<div class="container">
  
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-8 well">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <fieldset>
              <input type="hidden" name="ci_csrf_token" value="">
             
                 <legend>
                  <div class="row">
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-2">
                      <a href="login.php" class="btn btn-sm btn-success  pull-right">Logout</a>
                    </div>
                  </div>
                
                
        </legend>



<!-- Membership of Professional Societies -->

<h4 style="text-align:center; font-weight: bold; color: #4EB3AA;">9. Membership of Professional Societies </h4>

<div class="row">
<div class="col-md-12">
<div class="panel panel-success">
<div class="panel-heading">Fill the Details  &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success" id="add_membership" fdprocessedid="g6djd">Add Details</button></div>
  <div class="panel-body">

        <table class="table table-bordered">
            <tbody id="membership">
            
            <tr height="30px">
              <th class="col-md-1"> S. No.</th>
              <th class="col-md-3"> Name of the Professional Society </th>
              <th class="col-md-3"> Membership Status (Lifetime/Annual)</th>
              
            </tr>


                        
            <tr height="60px" class="row_1">
             
              <td class="col-md-1"> 
                1                </td>
              <td class="col-md-2"> 
                <input id="id1" name="id[]" type="hidden" class="form-control input-md" > 
                  <input id="mname1" name="mname[]" type="text"  placeholder="Name of the Professional Society" class="form-control input-md"  fdprocessedid="08njk"> 
                </td>
              <td class="col-md-2"> 
                <input id="mstatus1" name="mstatus[]" type="text" placeholder="Membership Status (Lifetime/Annual)" class="form-control input-md"  fdprocessedid="095mym"> 
              </td>
              
             
            </tr>
                        
           
                      </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Professional Training -->

<h4 style="text-align:center; font-weight: bold; color: #4EB3AA;">10. Professional Training </h4>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-success">
    <div class="panel-heading">Fill the Details  &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success" id="add_more_prog_trg" fdprocessedid="ncmpuu">Add Details</button></div>
      <div class="panel-body">

            <table class="table table-bordered">
                <tbody id="prof_trg">
                
                <tr height="30px">
                  <th class="col-md-1"> S. No.</th>
                  <th class="col-md-3"> Type of Training Received </th>
                  <th class="col-md-3"> Organisation</th>
                  <th class="col-md-2"> Year</th>
                  <th class="col-md-3"> Duration (in years &amp; months)</th>
                  
                </tr>


                                
                <tr height="60px" class="row_1">
                 
                  <td class="col-md-1"> 
                    1                    </td>
                  <td class="col-md-2"> 
                    <input id="id1" name="id[]" type="hidden"  class="form-control input-md" > 
                      <input id="trg1" name="trg[]" type="text" placeholder="Type of Training" class="form-control input-md"  fdprocessedid="7gy1nn"> 
                    </td>
                  <td class="col-md-2"> 
                    <input id="porg1" name="porg[]" type="text" placeholder="Organisation" class="form-control input-md"  fdprocessedid="1yxadx"> 
                  </td>
                  <td class="col-md-2"> 
                    <input id="pyear1" name="pyear[]" type="text"  placeholder="Year Received" class="form-control input-md" fdprocessedid="30aj5"> 
                  </td>
                  <td class="col-md-3"> 
                    <input id="pduration1" name="pduration[]" type="text" placeholder="Duration" class="form-control input-md"  fdprocessedid="iw52o"> 
                  </td>
                 
                </tr>
               
                              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

<!-- Award(s) and Recognition(s) -->

<h4 style="text-align:center; font-weight: bold; color: #4EB3AA;">11. Award(s) and Recognition(s)</h4>
<div class="row">
<div class="col-md-12">
<div class="panel panel-success">
<div class="panel-heading">Fill the Details  &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success" id="add_more_award" fdprocessedid="xpux8">Add Details</button></div>
  <div class="panel-body">

        <table class="table table-bordered">
            <tbody id="award">
            
            <tr height="30px">
              <th class="col-md-1"> S. No.</th>
              <th class="col-md-3"> Name of Award </th>
              <th class="col-md-3"> Awarded By</th>
              <th class="col-md-2"> Year</th>
              
            </tr>


                        
            <tr height="60px" class="row_1">
             
              <td class="col-md-1"> 
                1                </td>
              <td class="col-md-2"> 
                <input id="id1" name="id[]" type="hidden" class="form-control input-md" > 
                  <input id="award_nature1" name="award_nature[]" type="text"  placeholder="Type of Award" class="form-control input-md"  fdprocessedid="6319dw"> 
                </td>
              <td class="col-md-2"> 
                <input id="award_org1" name="award_org[]" type="text"  placeholder="Award Given by " class="form-control input-md" fdprocessedid="15r2s5"> 
              </td>
              <td class="col-md-2"> 
                <input id="award_year1" name="award_year[]" type="text"  placeholder="Year of award" class="form-control input-md"  fdprocessedid="43wgf"> 
                <a href="#" onclick="deleterow(this)" data-id="1" class="pull-right">X</a>
              </td>
             
            </tr>
           
                      </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<h4 style="text-align:center; font-weight: bold; color: #4EB3AA;">12. Sponsored Projects/ Consultancy Details</h4>
<!-- sponsored projects  -->
<div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
      <div class="panel-heading">(A) Sponsored Projects &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success" id="add_more_s_proj" fdprocessedid="14vimc">Add Details</button></div>
        <div class="panel-body">

              <table class="table table-bordered">
                  <tbody id="s_proj">
                  
                  <tr height="30px">
                    <th class="col-md-1"> S. No.</th>
                    <th class="col-md-2"> Sponsoring Agency </th>
                    <th class="col-md-2"> Title of Project</th>
                    <th class="col-md-2"> Sanctioned Amount (₹) </th>
                    <th class="col-md-1"> Period</th>
                    <th class="col-md-2"> Role </th>
                    <th class="col-md-2"> Status (Completed/On-going)</th>
                    
                  </tr>


                                    
                  <tr height="60px">
                   
                    <td class="col-md-1"> 
                      1                      </td>
                    <td class="col-md-2"> 
                      
                        <input id="agency1" name="agency[]" type="text"  placeholder="Sponsoring Agency" class="form-control input-md"  fdprocessedid="n1pyv"> 
                      </td>
                    <td class="col-md-2"> 
                      <input id="stitle1" name="stitle[]" type="text"  placeholder="Title of Project" class="form-control input-md"  fdprocessedid="su2dd"> 
                    </td>
                    <td class="col-md-2"> 
                      <input id="samount1" name="samount[]" type="text" placeholder="Amount of grant" class="form-control input-md" fdprocessedid="nay5nq"> 
                    </td>
                    <td class="col-md-1"> 
                      <input id="speriod1" name="speriod[]" type="text"  placeholder="Period" class="form-control input-md"  fdprocessedid="ifw1nt"> 
                    </td>

                    <td class="col-md-2"> 
                      <select id="s_role" name="s_role[]" class="form-control input-md"  fdprocessedid="jufo5">
                          <option value="">Select</option>
                          <option selected="selected" value="Principal Investigator">Principal Investigator</option>
                          <option value="Co-investigator">Co-investigator</option>
                      </select>
                    </td>

                    <td class="col-md-2"> 
                      <input id="s_status1" name="s_status[]" type="text"  placeholder="Status" class="form-control input-md"  fdprocessedid="sbmxw"> 
                    </td>
                    
                   
                  </tr>
                 
                                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

     <!-- Consultancy Details -->
             <div class="row">
                 <div class="col-md-12">
                   <div class="panel panel-success">
                   <div class="panel-heading">(B) Consultancy Projects  &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success" id="add_consultancy" fdprocessedid="ervdyt">Add Details</button></div>
                     <div class="panel-body">

                           <table class="table table-bordered">
                               <tbody id="consultancy">
                               
                               <tr height="30px">
                                 <th class="col-md-1"> S. No.</th>
                                 <th class="col-md-3"> Organization </th>
                                 <th class="col-md-2"> Title of Project</th>
                                 <th class="col-md-2"> Amount of Grant</th>
                                 <th class="col-md-1"> Period</th>
                                 <th class="col-md-2"> Role</th>
                                 <th class="col-md-2"> Status</th>
                                 
                               </tr>


                                                              
                               <tr height="60px" class="row_1">
                                
                                 <td class="col-md-1"> 
                                   1                                   </td>
                                 <td class="col-md-2"> 
                                   <input id="id1" name="id[]" type="hidden"  class="form-control input-md" > 

                                     <input id="c_org1" name="c_org[]" type="text"  placeholder="Sponsoring Agency" class="form-control input-md"  fdprocessedid="e9zmoa"> 
                                   </td>
                                 <td class="col-md-2"> 
                                   <input id="ctitle1" name="ctitle[]" type="text"  placeholder="Title of Project" class="form-control input-md"  fdprocessedid="s9geyh"> 
                                 </td>
                                 <td class="col-md-2"> 
                                   <input id="camount1" name="camount[]" type="text"  placeholder="Title of Project" class="form-control input-md" fdprocessedid="oug7km"> 
                                 </td>
                                 <td class="col-md-1"> 
                                   <input id="cperiod1" name="cperiod[]" type="text" placeholder="Title of Project" class="form-control input-md" fdprocessedid="wgp26"> 
                                 </td>

                                 <td class="col-md-2"> 
                                   <select id="c_role" name="c_role[]" class="form-control input-md"  fdprocessedid="h6cd5r">
                                       <option value="">Select</option>
                                       <option value="Principal Investigator">Principal Investigator</option>
                                       <option selected="selected" value="Co-investigator">Co-investigator</option>
                                   </select>
                                 </td>

                                 <td class="col-md-2"> 
                                   <input id="c_status1" name="c_status[]" type="text" placeholder="Status" class="form-control input-md"  fdprocessedid="uyepoi"> 
                                 </td>
                                 
                                
                                </tr>
                                                            </tbody>
                           </table>
                         </div>
                       </div>
                     </div>

                   </div>
 
    


      




            <!-- Button -->

            <div class="form-group">
                        <div class="row">
                            <div class="col-md-1">
                                <a href="publish.php" class="btn btn-primary pull-left"><i class="fas fa-arrow-left"></i></a>
                            </div>
                            

                           
    <div class="col-md-9"> <!-- Reduce the width of this column -->
        <!-- Content for the first column -->
    </div>

    <div class="col-md-1"> 
    <button class="btn btn-sm btn-primary" type="submit" name="submit" id="save" value="submit">SAVE & NEXT</button>
<!-- Keep the width of this column -->
    </div>
    
    <div class="col-md-1"> <!-- Keep the width of this column -->
    </div></div>


                        </div>

            </fieldset>
            </form>
            
            

        </div>
    </div>
</div>

<div id="footer"></div>



<script type="text/javascript">
	
	function blinker() {
	    $('.blink_me').fadeOut(500);
	    $('.blink_me').fadeIn(500);
	}

	setInterval(blinker, 1000);
</script><span id="PING_IFRAME_FORM_DETECTION" style="display: none;"></span></body></html>