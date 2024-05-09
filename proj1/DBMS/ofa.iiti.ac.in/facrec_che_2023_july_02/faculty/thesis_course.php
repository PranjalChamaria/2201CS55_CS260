<?php
include("connect.php");
session_start();
$sno = $_SESSION['sno'];

if(isset($_POST['submit']))
 {
    
  $a1= $_POST['phd_scholar'];
  $a2= $_POST['phd_thesis'];
  $a3= $_POST['phd_role'];
  $a4= $_POST['phd_ths_status'];
  $a5= $_POST['phd_ths_year'];
  if(count($a1))
  {
    $delete_q = "DELETE FROM research_supervision WHERE lev='phd' AND app_no=?";
    $delete_stmt11 = mysqli_prepare($conn, $delete_q);
    mysqli_stmt_bind_param($delete_stmt11, "i", $sno);
    mysqli_stmt_execute($delete_stmt11);
    for ($i = 0; $i < count($a1); $i++)
  {
        
    $a11= $a1[$i];
    $a21= $a2[$i];
    $a31= $a3[$i];
    $a41= $a4[$i];
    $a51= $a5[$i];
    $i++;
    $sql1 = "INSERT INTO research_supervision(app_no,sno,lev,name_stud,title_thesis, thesis_role, thesis_status,yr) VALUES ('$sno','$i', 'phd', '$a11', '$a21', '$a31', '$a41', '$a51')";
    $i--;
    mysqli_query($conn, $sql1);
  }
}
$b1= $_POST['pg_scholar'];
$b2= $_POST['pg_thesis'];
$b3= $_POST['pg_role'];
$b4= $_POST['pg_status'];
$b5= $_POST['pg_ths_year'];
if(count($b1))
{
  $delete_q1 = "DELETE FROM research_supervision WHERE lev='mtech' AND app_no=?";
  $delete_stmt1 = mysqli_prepare($conn, $delete_q1);
  mysqli_stmt_bind_param($delete_stmt1, "i", $sno);
  mysqli_stmt_execute($delete_stmt1);
  for ($i = 0; $i < count($b1); $i++)
{
      
  $b11= $b1[$i];
  $b21= $b2[$i];
  $b31= $b3[$i];
  $b41= $b4[$i];
  $b51= $b5[$i];
  $i++;
  $sql2 = "INSERT INTO research_supervision(app_no,sno,lev,name_stud,title_thesis, thesis_role, thesis_status,yr) VALUES ('$sno','$i', 'mtech', '$b11', '$b21', '$b31', '$b41', '$b51')";
  $i--;
  mysqli_query($conn, $sql2);
}
}
$c1= $_POST['ug_scholar'];
$c2= $_POST['ug_thesis'];
$c3= $_POST['ug_role'];
$c4= $_POST['ug_status'];
$c5= $_POST['ug_ths_year'];
if(count($c1))
{
  $delete_q2 = "DELETE FROM research_supervision WHERE lev='btech' AND app_no=?";
  $delete_stmt2 = mysqli_prepare($conn, $delete_q2);
  mysqli_stmt_bind_param($delete_stmt2, "i", $sno);
  mysqli_stmt_execute($delete_stmt2);
  for ($i = 0; $i < count($c1); $i++)
{
      
  $c11= $c1[$i];
  $c21= $c2[$i];
  $c31= $c3[$i];
  $c41= $c4[$i];
  $c51= $c5[$i];
  $i++;
$sql3 = "INSERT INTO research_supervision(app_no,sno,lev,name_stud,title_thesis, thesis_role, thesis_status,yr) VALUES ('$sno','$i', 'btech', '$c11', '$c21', '$c31', '$c41', '$c51')";
  $i--;
  mysqli_query($conn, $sql3);
}
}
   header("Location:rel_info.php");    
}
?>



<html>
<head>
	<title>Academic Experience </title>
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

var counter_thesis=1;
var counter_course=1;
var counter_pg_thesis=1;
var counter_ug_thesis=1;

  $(document).ready(function(){
  
  $("#add_thesis").click(function(){
          create_tr();
          create_serial('thesis_sup');
          create_input('phd_scholar[]', 'Scholar','phd_scholar'+counter_thesis, 'thesis_sup',counter_thesis, 'thesis_sup');
          create_input('phd_thesis[]', 'Title of Thesis','phd_thesis'+counter_thesis, 'thesis_sup',counter_thesis, 'thesis_sup');
          create_input('phd_role[]', 'Role','phd_role'+counter_thesis, 'thesis_sup',counter_thesis, 'thesis_sup', false,true);
          create_input('phd_ths_status[]', 'Ongoing/Completed', 'phd_ths_status'+counter_thesis,'thesis_sup',counter_thesis, 'thesis_sup');
          create_input('phd_ths_year[]', 'Ongoing Since/ Year of Completion', 'phd_ths_year'+counter_thesis,'thesis_sup',counter_thesis, 'thesis_sup',true);
          counter_thesis++;
          return false;
    });


 
  $("#add_pg_thesis").click(function(){
          create_tr();
          create_serial('pg_thesis_sup');
          create_input('pg_scholar[]', 'Scholar','pg_scholar'+counter_pg_thesis, 'pg_thesis_sup',counter_pg_thesis, 'pg_thesis_sup');
          create_input('pg_thesis[]', 'Title of Thesis','pg_thesis'+counter_pg_thesis, 'pg_thesis_sup',counter_pg_thesis, 'pg_thesis_sup');
          create_input('pg_role[]', 'Role','pg_role'+counter_pg_thesis, 'pg_thesis_sup',counter_pg_thesis, 'pg_thesis_sup', false,true);
          create_input('pg_status[]', 'Ongoing/Completed', 'pg_status'+counter_pg_thesis,'pg_thesis_sup',counter_pg_thesis, 'pg_thesis_sup');
          create_input('pg_ths_year[]', 'Ongoing Since/ Year of Completion', 'pg_ths_year'+counter_pg_thesis,'pg_thesis_sup',counter_pg_thesis, 'pg_thesis_sup',true);
          counter_pg_thesis++;
          return false;
    });

  $("#add_ug_thesis").click(function(){
          create_tr();
          create_serial('ug_thesis_sup');
          create_input('ug_scholar[]', 'Scholar','ug_scholar'+counter_ug_thesis, 'ug_thesis_sup',counter_ug_thesis, 'ug_thesis_sup');
          create_input('ug_thesis[]', 'Title of Thesis','ug_thesis'+counter_ug_thesis, 'ug_thesis_sup',counter_ug_thesis, 'ug_thesis_sup');
          create_input('ug_role[]', 'Role','ug_role'+counter_ug_thesis, 'ug_thesis_sup',counter_ug_thesis, 'ug_thesis_sup', false,true);
          create_input('ug_status[]', 'Ongoing/Completed', 'ug_status'+counter_ug_thesis,'ug_thesis_sup',counter_ug_thesis, 'ug_thesis_sup');
          create_input('ug_ths_year[]', 'Ongoing Since/ Year of Completion', 'ug_ths_year'+counter_ug_thesis,'ug_thesis_sup',counter_ug_thesis, 'ug_thesis_sup',true);
          counter_ug_thesis++;
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
                            //remove_row('award',rowid, 'award');
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
      sel.innerHTML+="<option value='Supervisor with no Co-supervisor'>Supervisor with no Co-supervisor</option>";
      sel.innerHTML+="<option value='Supervisor with Co-supervisor'>Supervisor with Co-supervisor</option>";
      sel.innerHTML+="<option value='Co-Supervisor'>Co-Supervisor</option>";
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




<a href='https://ofa.iiti.ac.in/facrec_che_2023_july_02/layout'></a>

<div class="container">
  
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-8 well">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <fieldset>
              <input type="hidden" name="ci_csrf_token" value="" />
             
                 <legend>
                  <div class="row">
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-2">
                      <a href="login.php" class="btn btn-sm btn-success  pull-right">Logout</a>
                    </div>
                  </div>
                
                
        </legend>

  
<!-- PHD Theses supervision -->


<h4 style="text-align:center; font-weight: bold; color: #4eb3aa;">13. Research Supervision:</h4>
<div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
      <div class="panel-heading">(A) PhD Thesis Supervision  &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success" id="add_thesis">Add Details</button></div>
        <div class="panel-body">

              <table class="table table-bordered">
                  <tbody id="thesis_sup">
                  
                  <tr height="30px">
                    <th class="col-md-1"> S. No.</th>
                    <th class="col-md-3"> Name of Student/Research Scholar </th>
                    <th class="col-md-2"> Title of Thesis</th>
                    <th class="col-md-2"> Role</th>
                    <th class="col-md-2"> Ongoing/Completed</th>
                    <th class="col-md-2"> Ongoing Since/ Year of Completion</th>
                    <!-- <th class="col-md-2"> </th> -->
                    
                  </tr>


                                    
                  <tr height="60px" class="row_1">
                   
                    <td class="col-md-1"> 
                      1                      </td>
                    <td class="col-md-2"> 
                      <input id="id1" name="id[]" type="hidden"  class="form-control input-md" > 

                        <input id="phd_scholar1" name="phd_scholar[]" type="text"  placeholder="Sponsoring Agency" class="form-control input-md" > 
                      </td>
                    <td class="col-md-2"> 
                      <input id="phd_thesis1" name="phd_thesis[]" type="text" placeholder="Title of Project" class="form-control input-md" > 
                    </td>
                   <!--  <td class="col-md-2"> 
                      <input id="phd_role1" name="phd_role[]" type="text" value="Co-Supervisor"  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td> -->

                    <td class="col-md-2"> 
                      <select id="phd_role" name="phd_role[]" class="form-control input-md" >
                          <option selected='selected' value="">Select</option>
                          <option  value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                          <option  value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                          <option selected='selected' value="Co-Supervisor">Co-Supervisor</option>
                      </select>
                    </td>

                    <td class="col-md-2"> 
                      <input id="phd_ths_status1" name="phd_ths_status[]" type="text"   placeholder="Ongoing/Completed" class="form-control input-md" > 
                    </td>

                    <td class="col-md-2"> 
                      <input id="phd_ths_year1" name="phd_ths_year[]" type="text"  placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" > 
                    </td>
                    <!-- <td class="col-md-2"> 
                      <input id="co_guide1" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td> -->
                    
                   
                  </tr>
                                    
             
                                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


<!-- Master Theses supervision -->

      <div class="row">
          <div class="col-md-12">
            <div class="panel panel-success">
            <div class="panel-heading">(B). M.Tech/M.E./Master's Degree  &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success" id="add_pg_thesis">Add Details</button></div>
              <div class="panel-body">

                    <table class="table table-bordered">
                        <tbody id="pg_thesis_sup">
                        
                        <tr height="30px">
                          <th class="col-md-1"> S. No.</th>
                          <th class="col-md-3"> Name of Student/Research Scholar </th>
                          <th class="col-md-2"> Title of Thesis</th>
                          <th class="col-md-2"> Role</th>
                          <th class="col-md-2"> Ongoing/Completed</th>
                          <th class="col-md-2"> Ongoing Since/ Year of Completion</th>
                          
                        </tr>


                                                
                        <tr height="60px" class="row_1">
                         
                          <td class="col-md-1"> 
                            1                            </td>
                          <td class="col-md-2"> 
                            <input id="id1" name="id[]" type="hidden"   class="form-control input-md" > 

                              <input id="pg_scholar1" name="pg_scholar[]" type="text"   placeholder="Research Scholar" class="form-control input-md" > 
                            </td>
                          <td class="col-md-2"> 
                            <input id="pg_thesis1" name="pg_thesis[]" type="text"  placeholder="Title of Thesis" class="form-control input-md" > 
                          </td>
                         <!--  <td class="col-md-2"> 
                            <input id="pg_role1" name="pg_role[]" type="text" value="Supervisor with no Co-supervisor"  placeholder="Role" class="form-control input-md" required=""> 
                          </td> -->

                          <td class="col-md-2"> 
                            <select id="pg_role" name="pg_role[]" class="form-control input-md" >
                                <option selected='selected' value="">Select</option>
                                <option  value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                                <option  value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                                <option  value="Co-Supervisor">Co-Supervisor</option>
                            </select>
                          </td>

                          <td class="col-md-2"> 
                            <input id="pg_status1" name="pg_status[]" type="text" placeholder="Ongoing/Completed" class="form-control input-md" > 
                          </td>

                          <td class="col-md-2"> 
                            <input id="pg_ths_year1" name="pg_ths_year[]" type="text"   placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" > 
                          </td>
                          <!-- <td class="col-md-2"> 
                            <input id="co_guide1" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                          </td> -->
                          
                         
                        </tr>
                        
                                              </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>




<!-- Bachelor Theses supervision -->

      <div class="row">
          <div class="col-md-12">
            <div class="panel panel-success">
            <div class="panel-heading">(C) B.Tech/B.E./Bachelor's Degree &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success" id="add_ug_thesis">Add Details</button></div>
              <div class="panel-body">

                    <table class="table table-bordered">
                        <tbody id="ug_thesis_sup">
                        
                        <tr height="30px">
                          <th class="col-md-1"> S. No.</th>
                          <th class="col-md-3"> Name of Student </th>
                          <th class="col-md-2"> Title of Project</th>
                          <th class="col-md-2"> Role</th>
                          <th class="col-md-2"> Ongoing/Completed</th>
                          <th class="col-md-2"> Ongoing Since/ Year of Completion</th>
                          
                        </tr>


                                                
                        <tr height="60px" class="row_1">
                         
                          <td class="col-md-1"> 
                            1                            </td>
                          <td class="col-md-2"> 
                            <input id="id1" name="id[]" type="hidden"  class="form-control input-md" > 

                              <input id="ug_scholar1" name="ug_scholar[]" type="text"  placeholder="Research Scholar" class="form-control input-md" > 
                            </td>
                          <td class="col-md-2"> 
                            <input id="ug_thesis1" name="ug_thesis[]" type="text" placeholder="Title of Thesis" class="form-control input-md" > 
                          </td>
                         <!--  <td class="col-md-2"> 
                            <input id="pg_role1" name="pg_role[]" type="text" value="Supervisor with no Co-supervisor"  placeholder="Role" class="form-control input-md" required=""> 
                          </td> -->

                          <td class="col-md-2"> 
                            <select id="ug_role" name="ug_role[]" class="form-control input-md" >
                                <option selected='selected' value="">Select</option>
                                <option  value="Supervisor with no Co-supervisor">Supervisor with no Co-supervisor</option>
                                <option value="Supervisor with Co-supervisor">Supervisor with Co-supervisor</option>
                                <option  value="Co-Supervisor">Co-Supervisor</option>
                            </select>
                          </td>

                          <td class="col-md-2"> 
                            <input id="ug_status1" name="ug_status[]" type="text"  placeholder="Ongoing/Completed" class="form-control input-md" > 
                          </td>

                          <td class="col-md-2"> 
                            <input id="ug_ths_year1" name="ug_ths_year[]" type="text" placeholder="Ongoing Since/ Year of Completion" class="form-control input-md" > 
                          </td>
                          <!-- <td class="col-md-2"> 
                            <input id="co_guide1" name="co_guide[]" type="text" value=""  placeholder="Title of Project" class="form-control input-md" required=""> 
                          </td> -->
                          
                         
                        </tr>
                                                
                        
                                              </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
      <!-- Courses Taken -->

            <!-- Button -->

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
            
            

        </div>
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