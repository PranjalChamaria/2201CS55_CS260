<?php
include("connect.php");
session_start();
$sno = $_SESSION['sno'];

if(isset($_POST['submit']))
 {
  if($_POST['pres_emp_position']) 
  {
      $delete_query = "DELETE FROM present_emp WHERE app_no=?";
      $delete_stmt = mysqli_prepare($conn, $delete_query);
      mysqli_stmt_bind_param($delete_stmt, "i", $sno);
      mysqli_stmt_execute($delete_stmt);
      $p1 = $_POST['pres_emp_position'];
      $e1 = $_POST['pres_emp_employer'];
      $s1 = $_POST['pres_status'];
      $doj1 = $_POST['pres_emp_doj'];
      $dol1 = $_POST['pres_emp_dol'];
      $dur1 = $_POST['pres_emp_duration'];    
      $insert = "INSERT INTO present_emp (app_no, pos, ins, p_status ,doj, dol,dur) VALUES ('$sno', '$p1' ,'$e1' ,'$s1' , '$doj1' ,'$dol1','$dur1' )";
      mysqli_query($conn, $insert);
  }
    
    $delete_query1 = "DELETE FROM emp_his WHERE app_no=?";
    $delete_stmt1 = mysqli_prepare($conn, $delete_query1);
    mysqli_stmt_bind_param($delete_stmt1, "i", $sno);
    mysqli_stmt_execute($delete_stmt1);

    $p2 = $_POST['position'];
    $e2 = $_POST['employer'];
    $doj2 = $_POST['doj'];
    $dol2 = $_POST['dol'];
    $dur2 = $_POST['exp_duration'];
    $t=$_POST['teach_exp'];
    for ($i = 0; $i < count($p2); $i++) 
    {
      // Retrieve data for the current row
      $p2_1 = $p2[$i];
      $e2_1 = $e2[$i];
      $doj2_1 = $doj2[$i];
      $dol2_1 = $dol2[$i];
      $dur2_1 = $dur2[$i];
      $i++;
      $sql = "INSERT INTO emp_his (app_no, sno, pos, ins, doj, dol, dur,teach_exp) VALUES ('$sno', '$i' ,'$p2_1' ,'$e2_1' , '$doj2_1' ,'$dol2_1','$dur2_1','$t' )";
      $i--;
      mysqli_query($conn, $sql);
     }

     $p3 = $_POST['te_position'];
     $e3 = $_POST['te_employer'];
     $course = $_POST['te_course'];
     $ug_pg = $_POST['te_ug_pg'];
     $nos = $_POST['te_no_stu'];
     $doj3 = $_POST['te_doj'];
     $dol3 = $_POST['te_dol'];
     $dur3 = $_POST['te_duration'];

     if(count($p3))
     {
      $delete_query2 = "DELETE FROM teach_exp WHERE app_no=?";
      $delete_stmt2 = mysqli_prepare($conn, $delete_query2);
      mysqli_stmt_bind_param($delete_stmt2, "i", $sno);
      mysqli_stmt_execute($delete_stmt2);
      
      for ($i = 0; $i < count($p3); $i++) 
      {
      // Retrieve data for the current row
      $p3_1 = $p3[$i];
      $e3_1 = $e3[$i];
      $cos=$course[$i];
      $up=$ug_pg[$i];
      $nos1=$nos[$i];
      $doj3_1 = $doj3[$i];
      $dol3_1 = $dol3[$i];
      $dur3_1 = $dur3[$i];
      $i++;
      $sql2 = "INSERT INTO teach_exp (app_no, sno, pos, emp,course,ug_pg,nos, doj, dol, dur) VALUES ('$sno', '$i' ,'$p3_1' ,'$e3_1' ,'$cos','$up','$nos1', '$doj3_1' ,'$dol3_1','$dur3_1' )";
      $i--;
      mysqli_query($conn, $sql2);
      }
     }

     $p4 = $_POST['r_exp_position'];
     $e4 = $_POST['r_exp_institute'];
     $sup = $_POST['r_exp_supervisor'];
     $doj4 = $_POST['r_exp_doj'];
     $dol4 = $_POST['r_exp_dol'];
     $dur4 = $_POST['r_exp_duration'];

     if(count($p4))
     {
      $delete_query3 = "DELETE FROM research_exp WHERE app_no=?";
      $delete_stmt3= mysqli_prepare($conn, $delete_query3);
      mysqli_stmt_bind_param($delete_stmt3, "i", $sno);
      mysqli_stmt_execute($delete_stmt3);
      
      for ($i = 0; $i < count($p4); $i++) 
      {
      // Retrieve data for the current row
      $p4_1 = $p4[$i];
      $e4_1 = $e4[$i];
      $sup1=$sup[$i];
      $doj4_1 = $doj4[$i];
      $dol4_1 = $dol4[$i];
      $dur4_1 = $dur4[$i];
      $i++;
      $sql3 = "INSERT INTO research_exp (app_no, sno, pos, ins,sup, doj, dol, dur) VALUES ('$sno', '$i' ,'$p4_1' ,'$e4_1' ,'$sup1', '$doj4_1' ,'$dol4_1','$dur4_1' )";
      $i--;
      mysqli_query($conn, $sql3);
      }
     }

     $e5 = $_POST['org'];
     $p5 = $_POST['work'];
     $doj5 = $_POST['ind_doj'];
     $dol5 = $_POST['ind_dol'];
     $dur5 = $_POST['period'];

     if(count($e5))
     {
      $delete_query4 = "DELETE FROM ind_exp WHERE app_no=?";
      $delete_stmt4= mysqli_prepare($conn, $delete_query4);
      mysqli_stmt_bind_param($delete_stmt4, "i", $sno);
      mysqli_stmt_execute($delete_stmt4);
      
      for ($i = 0; $i < count($e5); $i++) 
      {
      // Retrieve data for the current row
      $p5_1 = $p5[$i];
      $e5_1 = $e5[$i];
      $doj5_1 = $doj5[$i];
      $dol5_1 = $dol5[$i];
      $dur5_1 = $dur5[$i];
      $i++;
      $sql4 = "INSERT INTO ind_exp (app_no, sno, org, work,doj, dol, dur) VALUES ('$sno', '$i' ,'$e5_1' ,'$p5_1' , '$doj5_1' ,'$dol5_1','$dur5_1' )";
      $i--;
      mysqli_query($conn, $sql4);
      }
     }
     
      $delete_query5 = "DELETE FROM areas WHERE app_no=?";
      $delete_stmt5= mysqli_prepare($conn, $delete_query5);
      mysqli_stmt_bind_param($delete_stmt5, "i", $sno);
      mysqli_stmt_execute($delete_stmt5);

     $aos = $_POST['area_spl'];
     $aor = $_POST['area_rese'];
     $sql5 = "INSERT INTO areas (app_no, aos, aor) VALUES ('$sno', '$aos' ,'$aor' )";
     mysqli_query($conn, $sql5);
header("Location:publish.php");
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

                <!--  <img src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/IITIndorelogo.png" alt="logo1" class="img-responsive" style="padding-top: 5px; height: 120px; float: left;"> -->

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
  padding: 0 !important;
}
hr{
  border-top: 1px solid #025198 !important;
}
span{
  font-size: 1.2em;
  font-family: 'Oswald', sans-serif!important;
  text-align: left!important;
  padding: 0px 10px 0px 0px!important;
  color: #4eb3aa;

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
var counter_exp=1;
var counter_t_exp=1;
var counter_r_exp=1;
var counter_ind_exp=1;


  $(document).ready(function(){
    
    $("#add_more_exp").click(function(){
        create_tr();
        create_serial('exp');
        create_input('position[]', 'Position','position'+counter_exp, 'exp',counter_exp, 'exp');
        create_input('employer[]', 'Organization/Institution', 'employer'+counter_exp,'exp',counter_exp, 'exp');
        create_input('doj[]', 'DD/MM/YYYY', 'doj'+counter_exp,'exp',counter_exp, 'exp');
        create_input('dol[]', 'DD/MM/YYYY', 'dol'+counter_exp,'exp',counter_exp, 'exp');
        create_input('exp_duration[]', 'Duration','exp_duration'+counter_exp, 'exp',counter_exp,'exp', true);
        counter_exp++;
        return false;
    });

    $("#add_more_t_exp").click(function(){
        create_tr();
        create_serial('t_exp');
        create_input('te_position[]', 'Position','te_position'+counter_t_exp, 't_exp',counter_t_exp, 't_exp');
        create_input('te_employer[]', 'Employer', 'te_employer'+counter_t_exp,'t_exp',counter_t_exp, 't_exp');
        create_input('te_course[]', 'Courses', 'te_course'+counter_t_exp,'t_exp',counter_t_exp, 't_exp');
        create_input('te_ug_pg[]', 'UG/PG', 'te_ug_pg'+counter_t_exp,'t_exp',counter_t_exp, 't_exp');
        create_input('te_no_stu[]', 'No. of Students', 'te_no_stu'+counter_t_exp,'t_exp',counter_t_exp, 't_exp');
        create_input('te_doj[]', 'DD/MM/YYYY', 'te_doj'+counter_t_exp,'t_exp',counter_t_exp, 't_exp');
        create_input('te_dol[]', 'DD/MM/YYYY', 'te_dol'+counter_t_exp,'t_exp',counter_t_exp, 't_exp');
        create_input('te_duration[]', 'Duration', 'te_duration'+counter_t_exp,'t_exp',counter_t_exp, 't_exp', true);
        counter_t_exp++;
        return false;
    });

    
    $("#add_more_r_exp").click(function(){
        create_tr();
        create_serial('r_exp');
        create_input('r_exp_position[]', 'Position','r_exp_position'+counter_r_exp, 'r_exp',counter_r_exp, 'r_exp');
        create_input('r_exp_institute[]', 'Institute', 'r_exp_institute'+counter_r_exp,'r_exp',counter_r_exp, 'r_exp');
        create_input('r_exp_supervisor[]', 'Supervisor', 'r_exp_supervisor'+counter_r_exp,'r_exp',counter_r_exp, 'r_exp');
        create_input('r_exp_doj[]', 'DD/MM/YYYY', 'r_exp_doj'+counter_r_exp,'r_exp',counter_r_exp, 'r_exp');
        create_input('r_exp_dol[]', 'DD/MM/YYYY', 'r_exp_dol'+counter_r_exp,'r_exp',counter_r_exp, 'r_exp');
        create_input('r_exp_duration[]', 'Duration', 'r_exp_duration'+counter_r_exp,'r_exp',counter_r_exp, 'r_exp', true);
        counter_r_exp++;
        return false;
    });



$("#add_more_ind_exp").click(function(){
    create_tr();
    create_serial('ind_exp');
    create_input('org[]', 'Organization','org'+counter_ind_exp, 'ind_exp',counter_ind_exp, 'ind_exp');
    create_input('work[]', 'Work Profile', 'work'+counter_ind_exp,'ind_exp',counter_ind_exp, 'ind_exp');
    create_input('ind_doj[]', 'DD/MM/YYYY', 'ind_doj'+counter_ind_exp,'ind_exp',counter_ind_exp, 'ind_exp');
    create_input('ind_dol[]', 'DD/MM/YYYY', 'ind_dol'+counter_ind_exp,'ind_exp',counter_ind_exp, 'ind_exp');
    create_input('period[]', 'Duration', 'period'+counter_ind_exp,'ind_exp',counter_ind_exp, 'ind_exp',true);
    counter_ind_exp++;
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
    //console.log(tbody_id);
    var td=document.createElement("td");
    // var x=0;
     var x = document.getElementById(tbody_id).rows.length;
    // if(document.getElementById(tbody_id).rows)
    // {
    // }
    td.innerHTML=x;
    tr.appendChild(td);
  }
   function for_date_picker(obj)
  {
    obj.setAttribute("data-provide", "datepicker");
    obj.className += " datepicker";
    return obj;

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
<!-- all bootstrap buttons classes -->
<!-- 
  class="btn btn-sm, btn-lg, "
  color - btn-success, btn-primary, btn-default, btn-success, btn-info, btn-warning
-->



<a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/layout"></a>

<div class="container">




    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 well">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="ci_csrf_token" value="">
            <fieldset>
             
              <legend>
                <div class="row">
                  <div class="col-md-10">
                      
                  </div>
                  <div class="col-md-2">
                    <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/facultypanel/logout" class="btn btn-sm btn-success  pull-right">Logout</a>
                  </div>
                </div>
              
              
      </legend>

           

<h4 style="text-align:center; font-weight: bold; color: #4eb3aa;">3. Employment Details</h4>


            <!-- Form Name -->
            <?php
    $query = "SELECT pos, ins, p_status,doj, dol,dur FROM present_emp WHERE app_no = $sno";
    $a1="";
    $a2= "";
    $a3= "";
    $a4= "";
    $a5="";
    $a6= "";
   


    $result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $a1 = $row['pos'];
    $a2 = $row['ins'];
    $a3 = $row['p_status'];
    $a4 = $row['doj'];
    $a5 = $row['dol'];
    $a6 = $row['dur'];
   

    mysqli_free_result($result);
} ?>   

<div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
      <div class="panel-heading">(A) Present Employment</div>
        <div class="panel-body">
          
          <span class="col-md-2 control-label" for="pres_emp_position">Position</span>  
          <div class="col-md-4">
          <input id="pres_emp_position"  name="pres_emp_position" type="text" placeholder="Position" class="form-control input-md" autofocus="" fdprocessedid="f2tnh" value="<?php echo "$a1"; ?>">
          </div>

          <span class="col-md-2 control-label" for="pres_emp_employer">Organization/Institution</span>  
          <div class="col-md-4">
          <input id="pres_emp_employer"  name="pres_emp_employer" type="text" placeholder="Organization/Institution" class="form-control input-md" autofocus="" fdprocessedid="qgo7yq" value="<?php echo "$a2"; ?>">
          </div> 
          
          <span class="col-md-2 control-label" for="pres_status">Status</span>  
          <div class="col-md-4">
          <select id="pres_status" name="pres_status" class="form-control input-md"  fdprocessedid="wu7we3" value="<?php echo "$a3"; ?>">
              <option selected="selected" value="">Select</option>
              <option  value="Central Govt.">Central Govt.</option>
              <option value="State Government">State Government</option>
              <option value="Private">Private</option>
              <option value="Quasi Govt.">Quasi Govt.</option>
              <option value="Other">Other</option>
          </select>
          </div>

          <span class="col-md-2 control-label" for="pres_emp_doj">Date of Joining</span>  
          <div class="col-md-4">
          <input id="pres_emp_doj" name="pres_emp_doj" type="text" placeholder="Date of Joining" class="form-control input-md"  fdprocessedid="raduxp" value="<?php echo "$a4"; ?>">
          </div>

          <span class="col-md-2 control-label" for="pres_emp_dol">Date of Leaving <br>(Mention Continue if working)</span>  
          <div class="col-md-4">
          <input id="pres_emp_dol"  name="pres_emp_dol" type="text" placeholder="Date of Leaving" class="form-control input-md"  fdprocessedid="jhmiwo" value="<?php echo "$a5"; ?>">
          </div>
          
          <span class="col-md-2 control-label" for="pres_emp_duration">Duration (in years &amp; months)</span>  
          <div class="col-md-4">
          <input id="pres_emp_duration" name="pres_emp_duration" type="text" placeholder="Duration"  class="form-control input-md"  fdprocessedid="wxefk9" value="<?php echo "$a6"; ?>">
          </div>


         

  </div>
</div>
<?php
    $query = "SELECT pos, ins,doj, dol,dur FROM emp_his WHERE app_no = $sno";
    $a1="";
    $a2= "";
    $a4= "";
    $a5="";
    $a6= "";
   


    $result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $a1 = $row['pos'];
    $a2 = $row['ins'];
    $a4 = $row['doj'];
    $a5 = $row['dol'];
    $a6 = $row['dur'];
   

    mysqli_free_result($result);
} ?>   

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading">(B) Employment History (After PhD, Starting with Latest)  &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-sm btn-success" id="add_more_exp" fdprocessedid="66tej">Add Details</button></div>
      <div class="panel-body">
        
           <table class="table table-bordered">
              <tbody id="exp">
              
                <tr height="30px">
                <th class="col-md-1"> S. No.</th>
                <th class="col-md-3"> Position </th>
                <th class="col-md-4"> Organization/Institution </th>
                <th class="col-md-1"> Date of Joining</th>
                <th class="col-md-1"> Date of Leaving </th>
                <th class="col-md-2"> Duration (in years &amp; months)</th>
              </tr>
            
                              <tr height="60px">

                    <td class="col-md-1"> 
                      1                    </td>
                  <td class="col-md-2">  
                      <input id="position1" name="position[]" type="text" placeholder="Position" class="form-control input-md" required fdprocessedid="ri2mmd"  value="<?php echo "$a1"; ?>"> 
                  </td>
                  <td class="col-md-2"> 
                      <input id="employer" name="employer[]" type="text" placeholder="Employer" class="form-control input-md" required fdprocessedid="ig4raa"  value="<?php echo "$a2"; ?>"> 
                    </td>
                  <td class="col-md-2"> 
                    <input id="doj" name="doj[]" type="text" placeholder="DD/MM/YYYY" class="form-control input-md" required fdprocessedid="nvye3" value="<?php echo "$a4"; ?>"> 
                  </td>
                  <td class="col-md-2"> 
                    <input id="dol" name="dol[]" type="text" placeholder="DD/MM/YYYY" class="form-control input-md" required fdprocessedid="gtb4fh"  value="<?php echo "$a5"; ?>"> 
                  </td>
                  <td class="col-md-2"> 
                    <input name="exp_duration[]" type="text" placeholder="Duration" class="form-control input-md" required fdprocessedid="h5cjmh" value="<?php echo "$a6"; ?>"> 
                  </td>
                 
                </tr>
                               </tbody>
              </table>

                            <h4 style="color:rgb(68, 143, 70);">
              <div>

                <textarea style="height:50px; font-weight: bold; color: rgb(36, 89, 38);" class="form-control input-md" name="teach_exp_declaration" readonly="" required="">Experience : Minimum 10 years’ experience of which at least 4 years should be at the level of Associate Professor in IITs, IISc Bangalore, IIMs, NITIE Mumbai and IISERs.</textarea>
                <input type="radio" name="teach_exp" checked="checked" value="Yes" required="">Yes
                
                <input type="radio" name="teach_exp" value="No" required="">No
              </div>
              </h4>
              
              
                        </div>
        </div>
      </div>
    </div>

<!-- Teaching Experience  -->
<?php
    $query = "SELECT pos, emp,course, ug_pg,nos,doj,dol,dur FROM teach_exp WHERE app_no = $sno";
    $a1="";
    $a2= "";
    $a3="";
    $a4= "";
    $a5="";
    $a6= "";
    $a7="";
    $a8="";
   


    $result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $a1 = $row['pos'];
    $a2 = $row['emp'];
    $a3 = $row['course'];

    $a4 = $row['ug_pg'];
    $a5 = $row['nos'];
    $a6 = $row['doj'];
    $a7 = $row['dol'];
    $a8 = $row['dur'];

   

    mysqli_free_result($result);
} ?>   

          
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading">(C) Teaching Experience (After PhD)&nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success" id="add_more_t_exp" fdprocessedid="z08tr">Add Details</button></div>
      <div class="panel-body">
        <table class="table table-bordered">
          <tbody id="t_exp">
            <tr height="30px">
              <th class="col-md-1"> S. No.</th>
              <th class="col-md-2"> Position</th>
              <th class="col-md-1"> Employer </th>
              <th class="col-md-1"> Course Taught </th>
              <th class="col-md-1"> UG/PG </th>
              <th class="col-md-1"> No. of Students </th>
              <th class="col-md-1"> Date of Joining the Institute</th>
              <th class="col-md-1"> Date of Leaving the Institute</th>
              <th class="col-md-1"> Duration (in years &amp; months) </th>
            </tr>
            <tr height="60px">
              <td class="col-md-1"> 
                1                
              </td>
              <td class="col-md-2"> 
                <input id="te_position1" name="te_position[]" type="text" placeholder="Position" class="form-control input-md"  fdprocessedid="60isth" value="<?php echo "$a1"; ?>"> 
              </td>
              <td class="col-md-2"> 
                <input id="te_employer1" name="te_employer[]" type="text" placeholder="Employer" class="form-control input-md"  fdprocessedid="zph8mf" value="<?php echo "$a2"; ?>"> 
              </td>
              <td class="col-md-2"> 
                <input id="te_course1" name="te_course[]" type="text" placeholder="Course Taught" class="form-control input-md"  fdprocessedid="r7fs3e" value="<?php echo "$a3"; ?>"> 
              </td>
              <td class="col-md-2"> 
                <input id="te_ug_pg1" name="te_ug_pg[]" type="text" placeholder="UG/PG" class="form-control input-md"  fdprocessedid="mft27" value="<?php echo "$a4"; ?>"> 
              </td>
              <td class="col-md-2"> 
                <input id="te_no_stu1" name="te_no_stu[]" type="text" placeholder="No. of Students" class="form-control input-md"  fdprocessedid="3dg30g" value="<?php echo "$a5"; ?>"> 
              </td>
              <td class="col-md-1"> 
                <input id="te_doj1" name="te_doj[]" type="text" placeholder="Joining" class="form-control input-md"  fdprocessedid="ohn4bf" value="<?php echo "$a6"; ?>"> 
              </td>
              <td class="col-md-1"> 
                <input id="te_dol1" name="te_dol[]" type="text" placeholder="Leaving" class="form-control input-md"  fdprocessedid="v0yrqr" value="<?php echo "$a7"; ?>"> 
              </td>
              <td class="col-md-1"> 
                <input id="te_duration1" name="te_duration[]" type="text" placeholder="Duration" class="form-control input-md"  fdprocessedid="ext4cn" value="<?php echo "$a8"; ?>"> 
              </td>
            </tr>
            <!-- Additional rows for teaching experience can be added here -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

  <!-- c) Research Experience: (including Postdoctoral) input-->
                 
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading">(D) Research Experience (Post PhD, including Post Doctoral)&nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success" id="add_more_r_exp" fdprocessedid="2ywcqq">Add Details</button></div>
        <div class="panel-body">
          <table class="table table-bordered">
            <tbody id="r_exp">
              <tr height="30px">
                <th class="col-md-1"> S. No.</th>
                <th class="col-md-1"> Position </th>
                <th class="col-md-2"> Institute</th>
                <th class="col-md-2"> Supervisor</th>
                <!-- <th class="col-md-2"> Topic </th> -->
                <th class="col-md-1"> Date of Joining</th>
                <th class="col-md-1"> Date of Leaving</th>
                <th class="col-md-1"> Duration (in years &amp; months) </th>
              </tr>
              <tr height="60px">
                <td class="col-md-1"> 
                  1              
                </td>
                <td class="col-md-2"> 
                  <input id="r_exp_position1" name="r_exp_position[]" type="text" placeholder="Position" class="form-control input-md"  fdprocessedid="m0at9k"> 
                </td>
                <td class="col-md-2"> 
                  <input id="r_exp_institute1" name="r_exp_institute[]" type="text" placeholder="Institute" class="form-control input-md"  fdprocessedid="jwwk2m"> 
                </td>
                <td class="col-md-2"> 
                  <input id="r_exp_supervisor1" name="r_exp_supervisor[]" type="text" placeholder="Supervisor" class="form-control input-md"  fdprocessedid="mtq5l8"> 
                </td>
                <!-- <td class="col-md-2"> 
                  <input id="r_exp_topic1" name="r_exp_topic[]" type="text" placeholder="Topic" class="form-control input-md" required=""> 
                </td> -->
                <td class="col-md-1"> 
                  <input id="r_exp_doj1" name="r_exp_doj[]" type="text" placeholder="Joining" class="form-control input-md"  fdprocessedid="iyqq2l"> 
                </td>
                <td class="col-md-1"> 
                  <input id="r_exp_dol1" name="r_exp_dol[]" type="text" placeholder="Leaving" class="form-control input-md"  fdprocessedid="tr9rbl"> 
                </td>
                <td class="col-md-1"> 
                  <input id="r_exp_duration1" name="r_exp_duration[]" type="text" placeholder="Duration" class="form-control input-md"  fdprocessedid="6xuwo"> 
                </td>
              </tr>
              <!-- Additional rows for research experience can be added here -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  

<!-- g)  Industrial Experience Interaction -->
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-success">
      <div class="panel-heading">(E) Industrial Experience &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success" id="add_more_ind_exp" fdprocessedid="mj2rxa">Add Details</button></div>
      <div class="panel-body">
        <table class="table table-bordered">
          <tbody id="ind_exp">
            <tr height="30px">
              <th class="col-md-1"> S. No.</th>
              <th class="col-md-2"> Organization </th>
              <th class="col-md-3"> Work Profile</th>
              <th class="col-md-2"> Date of Joining</th>
              <th class="col-md-2"> Date of Leaving</th>
              <th class="col-md-2"> Duration (in years &amp; months)</th>
            </tr>
            <tr height="60px">
              <td class="col-md-1"> 
                1                    
              </td>
              <td class="col-md-2"> 
                <input id="org1" name="org[]" type="text" placeholder="Organization" class="form-control input-md"  fdprocessedid="cmjwzm"> 
              </td>
              <td class="col-md-2"> 
                <input id="work1" name="work[]" type="text" placeholder="Nature of Work" class="form-control input-md" fdprocessedid="zhea85"> 
              </td>
              <td class="col-md-1"> 
                <input id="ind_doj1" name="ind_doj[]" type="text" placeholder="Joining" class="form-control input-md"  fdprocessedid="siz38w"> 
              </td>
              <td class="col-md-1"> 
                <input id="ind_dol1" name="ind_dol[]" type="text" placeholder="Leaving" class="form-control input-md"  fdprocessedid="os024r"> 
              </td>
              <td class="col-md-2"> 
                <input id="period1" name="period[]" type="text" placeholder="Period" class="form-control input-md"  fdprocessedid="oaird"> 
              </td>
            </tr>
            <!-- Additional rows for industrial experience can be added here -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<h4 style="text-align:center; font-weight: bold;  color: #4eb3aa;
">4. Area(s) of Specialization and Current Area(s) of Research</h4>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-success">
      <!-- <div class="panel-heading">9. Area(s) of Specialization *</div> -->
      <div class="panel-body">
        <strong>Areas of specialization</strong>
        <textarea style="height:150px" placeholder="Areas of specialization" class="form-control input-md" name="area_spl" maxlength="500"  color: #4eb3aa;
         required></textarea>
      </div>
    </div>
  </div>
</div>


  <div class="col-md-12">
    <div class="panel panel-success">
      <!-- <div class="panel-heading">10. Current Area(s) of Research *</div> -->
      <div class="panel-body">
        <strong>Current Area of research</strong>
        <textarea style="height:150px" placeholder="Current Area of research" class="form-control input-md" name="area_rese" maxlength="500" required></textarea>
      </div>
    </div>
  </div>
 </div>

<div class="form-group">
  
  <div class="col-md-1">
    <a href="acde.php" class="btn btn-primary pull-left"><i class="fas fa-arrow-left"></i></a>
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
  
</div>
          
</div></div></fieldset>
</form>

      
</div>

<script type="text/javascript">
  function yearcalc()
  { 
    var num1=document.getElementById("yoj").value;
    var num2=document.getElementById("yog").value;
    var duration_year=parseFloat(num2)-parseFloat(num1);
    document.getElementById("result_test").value = duration_year ;
   
  }

 
</script>

<div id="footer"></div>



<script type="text/javascript">
	
	function blinker() {
	    $('.blink_me').fadeOut(500);
	    $('.blink_me').fadeIn(500);
	}

	setInterval(blinker, 1000);
</script><span id="PING_IFRAME_FORM_DETECTION" style="display: none;"></span><span id="PING_CONTENT_DLS_POPUP" style="display: none;"></span><div style="background-color: transparent; border: none; bottom: 15px; display: block; margin: 0px; opacity: 1; padding: 0px; position: fixed; right: 15px; z-index: 2147483646;"></div></body></html>