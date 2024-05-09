<?php
include("connect.php");
session_start();
$sno = $_SESSION['sno'];

if(isset($_POST['submit'])) {
    
    // PhD details
    $delete_query1 = "DELETE FROM phd_det WHERE app_no=?";
    $delete_stmt1 = mysqli_prepare($conn, $delete_query1);
    mysqli_stmt_bind_param($delete_stmt1, "i", $sno);
    mysqli_stmt_execute($delete_stmt1);
    $uni_phd = $_POST['college_phd'];
    $dept_phd = $_POST['stream'];
    $sup_phd = $_POST['supervisor'];
    $yoj_phd = $_POST['yoj_phd'];
    $dod_phd = $_POST['dod_phd'];
    $doa_phd = $_POST['doa_phd'];
    $title_phd = $_POST['phd_title'];
    $insert_phd = "INSERT INTO phd_det (app_no, univ, supervisor, dod, thesis_title, dept, jyear, doa) VALUES ('$sno', '$uni_phd' ,'$sup_phd' ,'$dod_phd' , '$title_phd' ,'$dept_phd','$yoj_phd','$doa_phd' )";
    mysqli_query($conn, $insert_phd);

    // Postgraduate details
    if($_POST['pg_degree']) 
    {
        $delete_query2 = "DELETE FROM pg_det WHERE app_no=?";
        $delete_stmt2 = mysqli_prepare($conn, $delete_query2);
        mysqli_stmt_bind_param($delete_stmt2, "i", $sno);
        mysqli_stmt_execute($delete_stmt2);
        $deg_pg = $_POST['pg_degree'];
        $uni_pg = $_POST['pg_college'];
        $bra_pg = $_POST['pg_subjects'];
        $yoj_pg = $_POST['pg_yoj'];
        $yoc_pg = $_POST['pg_yog'];
        $dur_pg = $_POST['pg_duration'];
        $cgpa_pg = $_POST['pg_perce'];
        $div_pg = $_POST['pg_rank'];
        $insert_pg = "INSERT INTO pg_det (app_no, deg, university, branch, yoj, yoc, dur, cgpa, division) VALUES ('$sno', '$deg_pg' ,'$uni_pg' ,'$bra_pg' , '$yoj_pg' ,'$yoc_pg','$dur_pg','$cgpa_pg','$div_pg' )";
        mysqli_query($conn, $insert_pg);
    }

    $delete_query3 = "DELETE FROM ug_det WHERE app_no=?";
    $delete_stmt3 = mysqli_prepare($conn, $delete_query3);
    mysqli_stmt_bind_param($delete_stmt3, "i", $sno);
    mysqli_stmt_execute($delete_stmt3);
    // Undergraduate details
    $deg_ug = $_POST['ug_degree'];
    $uni_ug = $_POST['ug_college'];
    $bra_ug = $_POST['ug_subjects'];
    $yoj_ug = $_POST['ug_yoj'];
    $yoc_ug = $_POST['ug_yog'];
    $dur_ug = $_POST['ug_duration'];
    $cgpa_ug = $_POST['ug_perce'];
    $div_ug = $_POST['ug_rank'];
    $insert_ug = "INSERT INTO ug_det (app_no, deg, university, branch, yoj, yoc, dur, cgpa, division) VALUES ('$sno', '$deg_ug' ,'$uni_ug' ,'$bra_ug' , '$yoj_ug' ,'$yoc_ug','$dur_ug','$cgpa_ug','$div_ug' )";
    mysqli_query($conn, $insert_ug);

    
    $delete_query4 = "DELETE FROM school_det WHERE app_no=?";
    $delete_stmt4 = mysqli_prepare($conn, $delete_query4);
    mysqli_stmt_bind_param($delete_stmt4, "i", $sno);
    mysqli_stmt_execute($delete_stmt4);
    // School details
    $level = $_POST['hsc_ssc'];
    $school = $_POST['school'];
    $py = $_POST['passing_year'];
    $percent = $_POST['s_perce'];
    $cgp = $_POST['s_rank'];

    $lev1 = $level[0];
    $lev2 = $level[1];
    $s1 = $school[0];
    $s2 = $school[1];
    $y1 = $py[0];
    $y2 = $py[1];
    $p1 = $percent[0];
    $p2 = $percent[1];
    $c1 = $cgp[0];
    $c2 = $cgp[1];

    $insert_school = "INSERT INTO school_det (app_no, levela, schoola, yopa, percenta, diva, levelb, schoolb, yopb, percentb, divb) VALUES ('$sno', '$lev1' ,'$s1' ,'$y1' , '$p1' ,'$c1','$lev2','$s2','$y2','$p2','$c2' )";
    mysqli_query($conn, $insert_school);
    
    // Additional educational qualifications
    $degrees = $_POST['add_degree'];
    $colleges = $_POST['add_college'];
    $subjects = $_POST['add_subjects'];
    $yojs = $_POST['add_yoj'];
    $yogs = $_POST['add_yog'];
    $durations = $_POST['add_duration'];
    $percents = $_POST['add_perce'];
    $ranks = $_POST['add_rank'];
    if(count($degrees))
    {
       
    $delete_query5 = "DELETE FROM acde_qual WHERE app_no=?";
    $delete_stmt5 = mysqli_prepare($conn, $delete_query5);
    mysqli_stmt_bind_param($delete_stmt5, "i", $sno);
    mysqli_stmt_execute($delete_stmt5);
    for ($i = 0; $i < count($degrees); $i++) {
        // Retrieve data for the current row
        $degree = $degrees[$i];
        $college = $colleges[$i];
        $subject = $subjects[$i];
        $yoj = $yojs[$i];
        $yog = $yogs[$i];
        $duration = $durations[$i];
        $percent = $percents[$i];
        $rank = $ranks[$i];

        // Prepare and execute SQL statement to insert data into acde_qual table
        $sql = "INSERT INTO acde_qual (app_no, degree, university, branch, year_of_joining, year_of_completion, duration, percent, divi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssiiids", $sno, $degree, $college, $subject, $yoj, $yog, $duration, $percent, $rank);

        if ($stmt->execute()) {
            echo "Data inserted successfully for additional qualification " . ($i + 1) . ".";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

} 
header("Location:employment_details.php");
    }

?>
<html>

<head>
    <title>Academic Details</title>
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


    <script type="text/javascript">
        var tr = "";
        var counter_acde = 4;
        $(document).ready(function() {
            $("#add_more_acde").click(function() {
                create_tr();
                create_input('add_degree[]', 'Degree', 'add_degree' + counter_acde, 'acde', counter_acde, 'acde');
                create_input('add_college[]', 'College', 'add_college' + counter_acde, 'acde', counter_acde, 'acde');
                create_input('add_subjects[]', 'Subjects', 'add_subjects' + counter_acde, 'acde', counter_acde, 'acde');
                create_input('add_yoj[]', 'Year Of Joining', 'add_yoj' + counter_acde, 'acde', counter_acde, 'acde');
                create_input('add_yog[]', 'Year Of Graduation', 'add_yog' + counter_acde, 'acde', counter_acde, 'acde');
                create_input('add_duration[]', 'Duration', 'add_duration' + counter_acde, 'acde', counter_acde, 'acde');
                create_input('add_perce[]', 'Percentage', 'add_perce' + counter_acde, 'acde', counter_acde, 'acde');
                create_input('add_rank[]', 'Rank', 'add_rank' + counter_acde, 'acde', counter_acde, 'acde', true);
                counter_acde++;
                return false;
            });

        });

        function create_tr() {
            tr = document.createElement("tr");
        }

        function for_date_picker(obj) {
            obj.setAttribute("data-provide", "datepicker");
            obj.className += " datepicker";
            return obj;

        }

        function create_input(t_name, place_value, id, tbody_id, counter, remove_name, btn = false, datepicker_set = false, length = 80) {
            var input = document.createElement("input");
            input.setAttribute("type", "text");
            input.setAttribute("name", t_name);
            input.setAttribute("id", id);
            input.setAttribute("placeholder", place_value);
            input.setAttribute("class", "form-control input-md");
            input.setAttribute("required", "");
            if (datepicker_set == true) {
                input = for_date_picker(input);
            }
            var td = document.createElement("td");
            td.appendChild(input);
            if (btn == true) {
                // alert();
                var but = document.createElement("button");
                but.setAttribute("class", "close");
                but.setAttribute("onclick", "remove_row('" + remove_name + "','" + counter + "')");
                but.innerHTML = "<span style='color:red; font-weight:bold;'>x</span>";
                td.appendChild(but);
            }
            tr.setAttribute("id", "row" + counter);
            tr.appendChild(td);
            document.getElementById(tbody_id).appendChild(tr);
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true
            });
        }

        function remove_row(remove_name, n) {
            var tab = document.getElementById(remove_name);
            var tr = document.getElementById("row" + n);
            tab.removeChild(tr);
        }
    </script>

    <script type="text/javascript">
        $(function() {
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true
            });
        });
    </script>
    <style type="text/css">
        body {
            padding-top: 30px;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .floating-box {
            display: inline-block;
            width: 150px;
            height: 75px;
            margin: 10px;
            border: 3px solid #73AD21;
        }
    </style>
    <style type="text/css">
        body {
            padding-top: 30px;
        }

        .form-control {
            margin-bottom: 10px;
        }

        label {
            padding: 0 !important;
        }

        hr {
            border-top: 1px solid #025198 !important;
        }

        span {
            font-size: 1.2em;
            font-family: 'Oswald', sans-serif !important;
            text-align: left !important;
            padding: 0px 10px 0px 0px !important;
            color: #4eb3aa;

            /*margin-bottom: 20px!important;*/
        }

        hr {
            border-top: 1px solid #025198 !important;
            border-style: dashed !important;
            border-width: 1.2px;
        }

        .panel-heading {
            font-size: 1.3em;
            font-family: 'Oswald', sans-serif !important;
            letter-spacing: .5px;
        }

        .btn-primary {
            padding: 9px;
        }
    </style>





    <div class="container">




        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 well">
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ci_csrf_token" value="" />
                    <fieldset>

                        <legend>
                            <div class="row">
                                <div class="col-md-10">
                                  
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>


                        </legend>

                        <?php
    $query = "SELECT univ, supervisor, dod, thesis_title,dept, jyear,doa FROM phd_det WHERE app_no = $sno";
    $univ="";
    $sup= "";
    $dod= "";
    $thesis= "";
    $dept="";
    $jyear= "";
    $doa= "";

    $result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $univ = $row['univ'];
    $sup = $row['supervisor'];
    $dod = $row['dod'];
    $thesis = $row['thesis_title'];
    $dept = $row['dept'];
    $jyear = $row['jyear'];
    $doa = $row['doa'];

    mysqli_free_result($result);
} ?>   


                        <h4 style="text-align:center; font-weight: bold;color: #4eb3aa;  ">2. Educational Qualifications</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">(A) Details of PhD *</div>
                                    <div class="panel-body">

                                        <span class="col-md-2 control-label" for="college_phd">University/Institute</span>
                                        <div class="col-md-4">
                                            <input id="college_phd"  name="college_phd" type="text" placeholder="University/Institute" class="form-control input-md" autofocus="" required value="<?php echo "$univ"; ?>">
                                        </div>

                                        <span class="col-md-2 control-label" for="stream">Department</span>
                                        <div class="col-md-4">
                                            <input id="stream"  name="stream" type="text" placeholder="Department" class="form-control input-md" autofocus="" value="<?php echo "$dept"; ?>">
                                        </div>

                                        <span class="col-md-2 control-label" for="duration_phd">Name of PhD Supervisor</span>
                                        <div class="col-md-4">
                                            <input id="supervisor" name="supervisor" type="text" placeholder="Name of Ph. D. Supervisor"  class="form-control input-md" required value="<?php echo "$sup"; ?>">
                                        </div>

                                        <span class="col-md-2 control-label" for="yoj_phd">Year of Joining</span>
                                        <div class="col-md-4">
                                            <input id="yoj_phd" name="yoj_phd" type="text" placeholder="Year of Joining" class="form-control input-md" requiredvalue="<?php echo "$jyear"; ?>">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <span class="col-md-2 control-label" for="dod_phd">Date of Successful Thesis Defence</span>
                                                <div class="col-md-4">
                                                    <input id="dod_phd" name="dod_phd" type="text" data-provide="datepicker" placeholder="Date of Defence"  class="form-control input-md datepicker" required value="<?php echo "$dod"; ?>">
                                                </div>

                                                <span class="col-md-2 control-label" for="doa_phd">Date of Award</span>
                                                <div class="col-md-4">
                                                    <input id="doa_phd" name="doa_phd" type="text" data-provide="datepicker" placeholder="Date of Award"  class="form-control input-md datepicker" required value="<?php echo "$doa"; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                        <span class="col-md-2 control-label" for="phd_title">Title of PhD Thesis</span>
                                        <div class="col-md-10">
                                            <input id="phd_title"  name="phd_title" type="text" placeholder="Title of PhD Thesis" class="form-control input-md" required value="<?php echo "$thesis"; ?>">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php
    $query = "SELECT university, deg, branch,yoj, yoc,dur,cgpa,division FROM pg_det WHERE app_no = $sno";
    $univ="";
    $deg= "";
    $branch= "";
    $yoj= "";
    $yoc="";
    $dur= "";
    $cgpa= "";
    $div= "";


    $result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $univ = $row['university'];
    $deg = $row['deg'];
    $branch = $row['branch'];
    $yoj = $row['yoj'];
    $yoc = $row['yoc'];
    $dur = $row['dur'];
    $cgpa = $row['cgpa'];
    $div = $row['division'];

    mysqli_free_result($result);
} ?>   

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">(B) Academic Details - M. Tech./ M.E./ PG Details</div>
                                    <div class="panel-body">

                                        <span class="col-md-2 control-label" for="pg_degree">Degree/Certificate</span>
                                        <div class="col-md-4">
                                            <input id="pg_degree" name="pg_degree" type="text" placeholder="Degree/Certificate" class="form-control input-md" autofocus="" value="<?php echo "$deg"; ?>">
                                        </div>

                                        <span class="col-md-2 control-label" for="pg_college">University/Institute</span>
                                        <div class="col-md-4">
                                            <input id="pg_college"  name="pg_college" type="text" placeholder="University/Institute" class="form-control input-md" autofocus=""value="<?php echo "$univ"; ?>">
                                        </div>

                                        <span class="col-md-2 control-label" for="pg_subjects">Branch/Stream</span>
                                        <div class="col-md-4">
                                            <input id="pg_subjects" name="pg_subjects" type="text" placeholder="Branch/Stream"  class="form-control input-md" value="<?php echo "$branch"; ?>">
                                        </div>

                                        <span class="col-md-2 control-label" for="pg_yoj">Year of Joining</span>
                                        <div class="col-md-4">
                                            <input id="pg_yoj"  name="pg_yoj" type="text" placeholder="Year of Joining" class="form-control input-md" value="<?php echo "$yoj"; ?>">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <span class="col-md-2 control-label" for="pg_yog">Year of Completion</span>
                                                <div class="col-md-4">
                                                    <input id="pg_yog" name="pg_yog" type="text" placeholder="Year of Completion"  class="form-control input-md" value="<?php echo "$yoc"; ?>">
                                                </div>

                                                <span class="col-md-2 control-label" for="pg_duration">Duration (in years)</span>
                                                <div class="col-md-4">
                                                    <input id="pg_duration" name="pg_duration" type="text" placeholder="Duration"  class="form-control input-md" value="<?php echo "$dur"; ?>">
                                                </div>

                                                <span class="col-md-2 control-label" for="pg_perce">Percentage/ CGPA</span>
                                                <div class="col-md-4">
                                                    <input id="pg_perce" name="pg_perce" type="text" placeholder="Percentage/ CGPA"  class="form-control input-md" value="<?php echo "$cgpa"; ?>">
                                                </div>

                                                <span class="col-md-2 control-label" for="pg_rank">Division/Class</span>
                                                <div class="col-md-4">
                                                    <input id="pg_rank" name="pg_rank" type="text" placeholder="Division/Class"  class="form-control input-md" value="<?php echo "$div"; ?>">
                                                </div>

                                            </div>
                                        </div>
                                        <br />


                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
    $query = "SELECT university, deg, branch,yoj, yoc,dur,cgpa,division FROM ug_det WHERE app_no = $sno";
    $univ="";
    $deg= "";
    $branch= "";
    $yoj= "";
    $yoc="";
    $dur= "";
    $cgpa= "";
    $div= "";


    $result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $univ = $row['university'];
    $deg = $row['deg'];
    $branch = $row['branch'];
    $yoj = $row['yoj'];
    $yoc = $row['yoc'];
    $dur = $row['dur'];
    $cgpa = $row['cgpa'];
    $div = $row['division'];

    mysqli_free_result($result);
} ?>   


                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">(C) Academic Details - B. Tech /B.E. / UG Details *</div>
                                    <div class="panel-body">

                                        <span class="col-md-2 control-label" for="ug_degree">Degree/Certificate</span>
                                        <div class="col-md-4">
                                            <input id="ug_degree"  name="ug_degree" type="text" placeholder="Degree/Certificate" class="form-control input-md" autofocus="" required value="<?php echo "$deg"; ?>">
                                        </div>

                                        <span class="col-md-2 control-label" for="ug_college">University/Institute</span>
                                        <div class="col-md-4">
                                            <input id="ug_college"  name="ug_college" type="text" placeholder="University/Institute" class="form-control input-md" autofocus="" required value="<?php echo "$univ"; ?>">
                                        </div>

                                        <span class="col-md-2 control-label" for="ug_subjects">Branch/Stream</span>
                                        <div class="col-md-4">
                                            <input id="ug_subjects" name="ug_subjects" type="text" placeholder="Branch/Stream"  class="form-control input-md" required value="<?php echo "$branch"; ?>">
                                        </div>

                                        <span class="col-md-2 control-label" for="ug_yoj">Year of Joining</span>
                                        <div class="col-md-4">
                                            <input id="ug_yoj"  name="ug_yoj" type="text" placeholder="Year of Joining" class="form-control input-md" required value="<?php echo "$yoj"; ?>">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <span class="col-md-2 control-label" for="ug_yog">Year of Completion</span>
                                                <div class="col-md-4">
                                                    <input id="ug_yog" name="ug_yog" type="text" placeholder="Year of Completion"  class="form-control input-md" required value="<?php echo "$yoc"; ?>">
                                                </div>

                                                <span class="col-md-2 control-label" for="ug_duration">Duration (in years)</span>
                                                <div class="col-md-4">
                                                    <input id="ug_duration" name="ug_duration" type="text" placeholder="Duration"  class="form-control input-md" required value="<?php echo "$dur"; ?>">
                                                </div>

                                                <span class="col-md-2 control-label" for="ug_perce">Percentage/ CGPA</span>
                                                <div class="col-md-4">
                                                    <input id="ug_perce" name="ug_perce" type="text" placeholder="Percentage/ CGPA"  class="form-control input-md" required value="<?php echo "$cgpa"; ?>">
                                                </div>

                                                <span class="col-md-2 control-label" for="ug_rank">Division/Class</span>
                                                <div class="col-md-4">
                                                    <input id="ug_rank" name="ug_rank" type="text" placeholder="Division/Class"  class="form-control input-md" requiredvalue="<?php echo "$div"; ?>">
                                                </div>



                                            </div>
                                        </div>
                                        <br />


                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php
    $query = "SELECT levela, schoola, yopa,percenta, diva,levelb, schoolb, yopb,percentb, divb FROM school_det WHERE app_no = $sno";
    $levela="";
    $schoola= "";
    $yopa= "";
    $percenta= "";
    $diva="";
    $levelb= "";
    $schoolb= "";
    $yopb= "";
    $percentb= "";
    $divb="";


    $result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $levela = $row['levela'];
    $schoola = $row['schoola'];
    $yopa = $row['yopa'];
    $percenta = $row['percenta'];
    $diva = $row['diva'];
    $levelb = $row['levelb'];
    $schoolb = $row['schoolb'];
    $yopb = $row['yopb'];
    $percentb = $row['percentb'];
    $divb = $row['divb'];

    mysqli_free_result($result);
} ?>   

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">(D) Academic Details - School *

                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered">

                                            <tr height="30px">
                                                <th class="col-md-3"> 10th/12th/HSC/Diploma </th>
                                                <th class="col-md-3"> School </th>
                                                <th class="col-md-1"> Year of Passing</th>
                                                <th class="col-md-2"> Percentage/ Grade </th>
                                                <th class="col-md-2"> Division/Class </th>
                                            </tr>


                                            <tr height="60px">
                                                <td class="col-md-2">
                                                    <input id="hsc_ssc1" name="hsc_ssc[]" type="text" placeholder="" class="form-control input-md"  required value="<?php echo "$levela"; ?>">
                                                </td>

                                                <td class="col-md-2">
                                                    <input id="school1" name="school[]" type="text"  placeholder="School" class="form-control input-md" maxlength="80" required value="<?php echo "$schoola"; ?>">
                                                </td>
                                                <td class="col-md-2">
                                                    <input id="passing_year1" name="passing_year[]" type="text"  placeholder="Passing Year" class="form-control input-md" maxlength="5" required value="<?php echo "$yopa"; ?>">
                                                </td>



                                                <td class="col-md-2">
                                                    <input id="s_perce1" name="s_perce[]" type="text"  placeholder="Percentage/Grade" class="form-control input-md" maxlength="5" required value="<?php echo "$percenta"; ?>">
                                                </td>


                                                <td class="col-md-2">
                                                    <input id="s_rank1" name="s_rank[]" type="text"  placeholder="Division/Class" class="form-control input-md" maxlength="15" required value="<?php echo "$diva"; ?>">
                                                </td>


                                            </tr>

                                            <tr height="60px">
                                                <td class="col-md-2">
                                                    <input id="hsc_ssc2" name="hsc_ssc[]" type="text"  placeholder="" class="form-control input-md"  required value="<?php echo "$levelb"; ?>">
                                                </td>

                                                <td class="col-md-2">
                                                    <input id="school2" name="school[]" type="text" placeholder="School" class="form-control input-md" maxlength="80" required value="<?php echo "$schoolb"; ?>">
                                                </td>
                                                <td class="col-md-2">
                                                    <input id="passing_year2" name="passing_year[]" type="text"  placeholder="Passing Year" class="form-control input-md" maxlength="5" requiredvalue="<?php echo "$yopb"; ?>">
                                                </td>



                                                <td class="col-md-2">
                                                    <input id="s_perce2" name="s_perce[]" type="text"  placeholder="Percentage/Grade" class="form-control input-md" maxlength="5" required value="<?php echo "$percentb"; ?>">
                                                </td>


                                                <td class="col-md-2">
                                                    <input id="s_rank2" name="s_rank[]" type="text"  placeholder="Division/Class" class="form-control input-md" maxlength="15" required value="<?php echo "$divb"; ?>">
                                                </td>


                                            </tr>


                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">(E) Additional Educational Qualification (If any)
                                        <button class="btn btn-sm btn-success" id="add_more_acde">Add More</button>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered">
                                            <tbody id="acde">

                                                <tr height="30px">
                                                    <th class="col-md-2"> Degree/Certificate </th>
                                                    <th class="col-md-2"> University/Institute </th>
                                                    <th class="col-md-2"> Branch/Stream </th>
                                                    <th class="col-md-1"> Year of Joining</th>
                                                    <th class="col-md-1"> Year of Completion </th>
                                                    <th class="col-md-1"> Duration (in years)</th>
                                                    <th class="col-md-3"> Percentage/ CGPA </th>
                                                    <th class="col-md-3"> Division/Class</th>
                                                </tr>




                                                <tr height="60px">
                                                    <td class="col-md-2">
                                                        <input id="add_degree1" name="add_degree[]" type="text"  placeholder="Degree" class="form-control input-md" maxlength="10" >
                                                    </td>

                                                    <td class="col-md-2">
                                                        <input id="add_college1" name="add_college[]" type="text"  placeholder="College" class="form-control input-md" maxlength="80" >
                                                    </td>

                                                    <td class="col-md-2">
                                                        <input id="add_subjects1" name="add_subjects[]" type="text"  placeholder="Subjects" class="form-control input-md" maxlength="80" >
                                                    </td>

                                                    <td class="col-md-2">
                                                        <input id="add_yoj1" name="add_yoj[]" type="text" placeholder="Year of Joining" class="form-control input-md" maxlength="5" >
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input id="add_yog1" name="add_yog[]" type="text"  placeholder="Year of Graduation" class="form-control input-md" maxlength="5" >
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input id="add_duration1" name="add_duration[]" type="text"  placeholder="Duration" class="form-control input-md" maxlength="4">
                                                    </td>

                                                    <td class="col-md-2">
                                                        <input id="add_perce1" name="add_perce[]" type="text"placeholder="Percentage" class="form-control input-md" maxlength="5" >
                                                    </td>

                                                    <td class="col-md-2">
                                                        <input id="add_rank1" name="add_rank[]" type="text" placeholder="Division" class="form-control input-md" maxlength="15" >
                                                    </td>

                                                </tr>



                                                



                                               


                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Form Name -->



                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-1">
                                <a href="facultypanel.php" class="btn btn-primary pull-left"><i class="fas fa-arrow-left"></i></a>
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

    <script type="text/javascript">
        function yearcalc() {
            // alert('hi');
            var num1 = document.getElementById("yoj").value;
            var num2 = document.getElementById("yog").value;

            var duration_year = parseFloat(num2) - parseFloat(num1);
            // alert(duration_year);
            document.getElementById("result_test").value = duration_year;

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