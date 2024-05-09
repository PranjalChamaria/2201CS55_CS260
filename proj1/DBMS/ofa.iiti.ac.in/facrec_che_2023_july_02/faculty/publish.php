<?php
include("connect.php");
session_start();
$sno = $_SESSION['sno'];

if(isset($_POST['submit']))
 {

    // Parse form data
    $delete_q = "DELETE FROM pub_summary WHERE app_no=?";
    $delete_stmt11 = mysqli_prepare($conn, $delete_q);
    mysqli_stmt_bind_param($delete_stmt11, "i", $sno);
    mysqli_stmt_execute($delete_stmt11);

    $int_journal_papers = $_POST['summary_journal_inter'];
    $nat_journal_papers = $_POST['summary_journal'];
    $int_conf_papers = $_POST['summary_conf_inter'];
    $nat_conf_papers = $_POST['summary_conf_national'];
    $patents = $_POST['patent_publish'];
    $books = $_POST['summary_book'];
    $book_chapters = $_POST['summary_book_chapter'];

    // Prepare and execute SQL statements to insert data into the respective tables
    $sql_query = "INSERT INTO pub_summary (app_no, int_journals, nat_journals, int_conferences, nat_conferences, patents, books, book_chapters) VALUES ('$sno', '$int_journal_papers', '$nat_journal_papers', '$int_conf_papers', '$nat_conf_papers', '$patents', '$books', '$book_chapters')";
    mysqli_query($conn, $sql_query);

//---------------------------
    $a1= $_POST['author'];
    $a2= $_POST['title'];
    $a3= $_POST['journal'];
    $a4= $_POST['year'];
    $a5= $_POST['impact'];
    $a6= $_POST['doi'];
    $a7= $_POST['status'];

     if(count($a1))
     {
      $delete_query2 = "DELETE FROM best_publi WHERE app_no=?";
      $delete_stmt2 = mysqli_prepare($conn, $delete_query2);
      mysqli_stmt_bind_param($delete_stmt2, "i", $sno);
      mysqli_stmt_execute($delete_stmt2);
      for ($i = 0; $i < count($a1); $i++)
      {
        
    $a11= $a1[$i];
    $a21= $a2[$i];
    $a31= $a3[$i];
    $a41= $a4[$i];
    $a51= $a5[$i];
    $a61= $a6[$i];
    $a71= $a7[$i];

    $sql123 = "INSERT INTO best_publi(app_no, author,title, journal, yearvp, imp_fctr, doi, stat) VALUES ('$sno','$a11', '$a21', '$a31', '$a41', '$a51', '$a61', '$a71')";
    mysqli_query($conn, $sql123);
      }
    }
//----------------------------
    $b1= $_POST['pauthor'];
    $b2= $_POST['ptitle'];
    $b3= $_POST['p_country'];
    $b4= $_POST['p_number'];
    $b5= $_POST['pyear_filed'];
    $b6= $_POST['pyear_published'];
    $b7= $_POST['pyear_issued'];


    
    if(count($b1))
    {
    $delete_query3 = "DELETE FROM patent WHERE app_no=?";
    $delete_stmt3 = mysqli_prepare($conn, $delete_query3);
    mysqli_stmt_bind_param($delete_stmt3, "i", $sno);
    mysqli_stmt_execute($delete_stmt3);
    for ($i = 0; $i < count($b1); $i++){
      
  $b11= $b1[$i];
  $b21= $b2[$i];
  $b31= $b3[$i];
  $b41= $b4[$i];
  $b51= $b5[$i];
  $b61= $b6[$i];
  $b71= $b7[$i];

  $sql12 = "INSERT INTO patent(app_no, inventor,title, country, pno, fdate, pdate, idate) VALUES ('$sno','$b11', '$b21', '$b31', '$b41', '$b51', '$b61', '$b71')";
  mysqli_query($conn, $sql12);
}}

  //---------------------------
  $c1= $_POST['bauthor'];
  $c2= $_POST['btitle'];
  $c3= $_POST['byear'];
  $c4= $_POST['bisbn'];

  
    if(count($c1))
    {
  $delete_query4 = "DELETE FROM book WHERE app_no=?";
  $delete_stmt4 = mysqli_prepare($conn, $delete_query4);
  mysqli_stmt_bind_param($delete_stmt4, "i", $sno);
  mysqli_stmt_execute($delete_stmt4);
  for ($i = 0; $i < count($c1); $i++){
    
$c11= $c1[$i];
$c21= $c2[$i];
$c31= $c3[$i];
$c41= $c4[$i];


$sql12 = "INSERT INTO book(app_no, author,title, yop, isbn) VALUES ('$sno','$c11', '$c21', '$c31', '$c41')";
mysqli_query($conn, $sql12);}}

//---------------------------
$d1= $_POST['bc_author'];
$d2= $_POST['bc_title'];
$d3= $_POST['bc_year'];
$d4= $_POST['bc_isbn'];

if(count($d1))
{
   
$delete_query5 = "DELETE FROM book_chapter WHERE app_no=?";
$delete_stmt5= mysqli_prepare($conn, $delete_query5);
mysqli_stmt_bind_param($delete_stmt5, "i", $sno);
mysqli_stmt_execute($delete_stmt5);
for ($i = 0; $i < count($d1); $i++){
  
$d11= $d1[$i];
$d21= $d2[$i];
$d31= $d3[$i];
$d41= $d4[$i];


$sql1234 = "INSERT INTO book_chapter(app_no, author,title, yop, isbn) VALUES ('$sno','$d11', '$d21', '$d31', '$d41')";
mysqli_query($conn, $sql1234);}}
//---------------------------
$delete_query6 = "DELETE FROM gscholar WHERE app_no=?";
$delete_stmt6= mysqli_prepare($conn, $delete_query6);
mysqli_stmt_bind_param($delete_stmt6, "i", $sno);
mysqli_stmt_execute($delete_stmt6);
$g1= $_POST['google_link'];
$sql34 = "INSERT INTO gscholar(app_no, link) VALUES ('$sno','$g1')";
mysqli_query($conn, $sql34);
header("Location:acd_ind.php");    
}
?>


<html><head>
	<title>Publication Details</title>
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
</style></head>

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
                $('#dob').datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true
                });
            });
</script>

<script type="text/javascript">
var tr="";
var counter_jour=1;
// var counter_confer=1;
var counter_book=1;
var counter_book_chapter=1;
var counter_patent=1;
  $(document).ready(function(){

    $("#add_more_jour").click(function(){
        create_tr();
        create_serial('jour');
        create_input('author[]', 'Author', 'author'+counter_jour,'jour', counter_jour, 'jour');
        create_input('title[]', 'Title', 'title'+counter_jour,'jour', counter_jour, 'jour');
        create_input('journal[]', 'Journal', 'journal'+counter_jour,'jour', counter_jour, 'jour');
        create_input('year[]     ', 'Year, Vo     l., Page',    'year'+counter_jour,'jour', counter_jour, 'jour');
        create_input('impact[]', 'Impact Factor','impact'+counter_jour, 'jour', counter_jour, 'jour');
        create_input('doi[]', 'DOI','doi'+counter_jour, 'jour', counter_jour, 'jour');
        create_input('status[]', 'Status', 'status'+counter_jour,'jour', counter_jour,'jour',true, true);
        counter_jour++;
        return false;
    });

    // $("#add_more_confer").click(function(){
    //     create_tr();
    //     create_serial('confer');
    //     create_input('cname[]', 'Conference','cname'+counter_confer, 'confer',counter_confer, 'confer');
    //     create_input('ctitle[]', 'Title', 'ctitle'+counter_confer,'confer',counter_confer, 'confer');
    //     create_input('cyear[]', 'Year', 'cyear'+counter_confer,'confer',counter_confer, 'confer',true);
    //     counter_confer++;
    //     return false;
    // });

    $("#add_more_book").click(function(){
        create_tr();
        create_serial('book');
        create_input('bauthor[]', 'Book','bauthor'+counter_book, 'book',counter_book, 'book');
        create_input('btitle[]', 'Title of the Book', 'btitle'+counter_book,'book',counter_book, 'book');
        create_input('byear[]', 'Year', 'byear'+counter_book,'book',counter_book, 'book');
        create_input('bisbn[]    ', 'ISBN', 'bisbn'+c ounter_book,'book',counter_book, 'book',true);
        // create_input('bstatus[]', 'Status', 'bstatus'+counter_book,'book', counter_book,'book',true, true);
        // create_input('dol[]', 'Date of Leaving', 'dol'+counter_exp,'exp',counter_exp, 'exp');
        // create_input('duration2[]', 'Duration','duration2'+counter_exp, 'exp',counter_exp,'exp', true);
        // //create_input('perce[]', 'Percentage', 'perce'+counter_exp,'exp', true);
        counter_book++;
        return false;
    });


    $("#add_more_book_chapter").click(function(){
        create_tr();
        create_serial('book_chapter');
        create_input('bc_author[]', 'Book Chapter','bc_author'+counter_book_chapter, 'book_chapter',counter_book_chapter, 'book_chapter');
        create_input('bc_title[]', 'Title', 'bc_title'+counter_book_chapter,'book_chapter',counter_book_chapter, 'book_chapter');
        create_input('bc_year[]', 'Year', 'bc_year'+counter_book_chapter,'book_chapter',counter_book_chapter, 'book_chapter');
        create_input('bc_isbn[]  ', 'ISBN', 'bc_isbn'+counter_b   ook_chapter,'book_chapter',counter_book_chapter, 'book_chapter',true);
        counter_book_chapter++;
        return false;
    });


    $("#add_more_patent").click(function(){
        create_tr();
         create_serial('patent');
        create_input('pauthor[]', 'Inventor(s)','pauthor'+counter_patent, 'patent',counter_patent, 'patent');
        // create_input('p_year[]', 'Year of the patent','p_year'+counter_patent, 'patent',counter_patent, 'patent');
        create_input('ptitle[]', 'Title of Patent', 'ptitle'+counter_patent,'patent',counter_patent, 'patent');
        create_input('p_count    ry[]', 'Country of patent',  'p_country'+counter_patent, 'patent',counter_patent, 'patent');
        create_input('p_number[]', 'Patent Number','p_number'+counter_patent, 'patent',counter_patent, 'patent');
        create_input('pyear_filed[]', 'DD/MM/YYYY','pyear_filed'+counter_patent, 'patent',counter_patent, 'patent');
        create_input('pyear_published[]', 'DD/MM/YYYY','pyear_published'+counter_patent, 'patent',counter_patent, 'patent');
        create_input('pyear_issued[]', 'DD/MM/YYYY','pyear_issued'+counter_patent, 'patent',counter_patent, 'patent',true);
        // create_input('pyear[]', 'Year', 'pyear'+counter_patent,'patent',counter_patent, 'patent',true);
        // create_input('pstatus[]', 'Status', 'pstatus'+counter_patent,'patent', patent,'patent',true, true);
        // create_input('dol[]', 'Date of Leaving', 'dol'+counter_exp,'exp',counter_exp, 'exp');
        // create_input('duration2[]', 'Duration','duration2'+counter_exp, 'exp',counter_exp,'exp', true);
        // //create_input('perce[]', 'Percentage', 'perce'+counter_exp,'exp', true);
        counter_patent++;
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
  function create_input(t_name, place_value, id, tbody_id, counter, remove_name, btn=false, select=false)
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
      sel.innerHTML+="<option value='published'>Published</option>";
      sel.innerHTML+="<option value='accepted'>Accepted</option>";
      // sel.innerHTML+="<option value='in_preparation'>In-Preparation</option>";
      var td=document.createElement("td");
      td.appendChild(sel);
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
    //var tbody=document.getElementById(tbody_id);
    //console.log(tbody[1].childNodes);
    // var row=tbody[0].getElementByTagName("tr");
    // var td=row[0].getElementByTagName("td");
    // td.innerHTML=i;
    // for(var i=1; i<=x; i++)
    // {
    //     var tbody=document.getElementById(tbody_id);
    //     var row=tbody[0].getElementByTagName("tr");
    //     var td=row[0].getElementByTagName("td");
    //     td.innerHTML=i;
    // }
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-8 well">
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

             

    
            <!-- Form Name -->
            
              
            <!-- Text input-->
           
            <h4 style="text-align:center; font-weight: bold; color: #4eb3aa;">5. Summary of Publications *</h4>
            <div class="row">
              <div class="col-md-12">
              <div class="panel panel-success">
              <div class="panel-body">

                <span class="col-md-5 control-label" for="summary_journal_inter">Number of International Journal Papers</span>  
                <div class="col-md-1">
                <input id="summary_journal_inter"  name="summary_journal_inter" type="number" placeholder="" class="form-control input-md" required maxlength="3" fdprocessedid="kjzpf">
                </div>

                <span class="col-md-5 control-label" for="summary_journal">Number of National Journal Papers</span>  
                <div class="col-md-1">
                <input id="summary_journal" name="summary_journal" type="number" placeholder="" class="form-control input-md" required maxlength="3" fdprocessedid="igrv9u">
                </div>

                <span class="col-md-5 control-label" for="summary_conf_inter">Number of International Conference Papers</span>  
                <div class="col-md-1">
                <input id="summary_conf_inter" name="summary_conf_inter" type="number" placeholder="" class="form-control input-md" required maxlength="3" fdprocessedid="zbqgh">
                </div>

                <span class="col-md-5 control-label" for="summary_conf_national">Number of National Conference Papers</span>  
                <div class="col-md-1">
                <input id="summary_conf_national"  name="summary_conf_national" type="number" placeholder="" class="form-control input-md" required maxlength="3" fdprocessedid="lugjlq">
                </div>

                <span class="col-md-5 control-label" for="patent_publish">Number of Patent(s) [Filed, Published, Granted] </span>  
                <div class="col-md-1">
                <input id="patent_publish"" name="patent_publish" type="number" placeholder="" class="form-control input-md" required maxlength="3" fdprocessedid="f4mj3y">
                </div>

                <span class="col-md-5 control-label" for="summary_book">Number of Book(s) </span>  
                <div class="col-md-1">
                <input id="summary_book"   name="summary_book" type="number" placeholder="" class="form-control input-md" required maxlength="3" fdprocessedid="8dtsxa">
                </div>

                <span class="col-md-5 control-label" for="summary_book_chapter">Number of Book Chapter(s)</span>  
                <div class="col-md-1">
                <input id="summary_book_chapter" name="summary_book_chapter" type="number" placeholder="" class="form-control input-md" required maxlength="3" fdprocessedid="a9drwm">
                </div>
              </div>
              </div>
              </div>
              </div>   

           
           <h4 style="text-align:center; font-weight: bold; color: #4eb3aa;">6. List of 10 Best Publications (Journal/Conference)</h4>

           <div class="container-fluid table-responsive">
              <div class="row">
                

               <div class="panel panel-success">
                <div class="panel-heading">List of 10 Best Publications (Journal/Conference) &nbsp;&nbsp;&nbsp;
                  <button class="btn btn-sm btn-success" id="add_more_jour" fdprocessedid="7r03uf">Add Details</button>
                </div>
                <table class="table table-bordered">
                    <tbody id="jour">
                    
                    <tr height="30px">
                      <th class="col-md-1"> S. No.</th>
                      <th class="col-md-2"> Author(s) </th>
                      <th class="col-md-1"> Title</th>
                      <th class="col-md-2"> Name of Journal/Conference </th>
                      <th class="col-md-1"> Year,    Vol., Page</th>
                      <th class="col-md-1"> Impact Factor </th>
                      <th class="col-md-1"> DOI</th>
                      <th class="col-md-2"> Status</th>
                    </tr>


                                        
                    <tr height="60px">
                     
                      <td class="col-md-1"> 
                        1                        </td>
                      <td class="col-md-2"> 
                          <input id="author1" name="author[]" type="text"  placeholder="Author" class="form-control input-md" fdprocessedid="8fbgv"> 
                        </td>
                      <td class="col-md-2"> 
                        <input id="title1"   name="title[]" type="text" placeholder="Title" class="form-control input-md" fdprocessedid="efnpiq"> 
                      </td>
                      <td class="col-md-2"> 
                        <input id="journal1" name="journal[]" type="text"  placeholder="Journal Name" class="form-control input-md" fdprocessedid="hrq6dc"> 
                      </td>
                      <td class="col-md-2"> 
                        <input id="year1" name="year[]" type="text"placeholder="Year of publication" class="form-control input-md" fdprocessedid="ieb3jg"> 
                      </td>
                      <td class="col-md-2"> 
                        <input id="impact1" name="impact[]" type="text"  placeholder="Impact Factor" class="form-control input-md" fdprocessedid="fgo9p2"> 
                      </td>
                      <td class="col-md-2"> 
                        <input id="doi1" name="doi[]" type="text"  placeholder="DOI" class="form-control input-md" fdprocessedid="5lpgac"> 
                      </td>

                      
                      <td class="col-md-2"> 
                        
                        <select id="status" name="status[]" class="form-control input-md" fdprocessedid="hvfy4b">
                            <option value="">Select</option>
                            <option value="published">Published</option>
                            <option value="accepted">Accepted</option>
                            
                        </select>

                      </td>
                    </tr>
                                        
                   
                                      </tbody>
                </table>

               </div>
              
            </div>

              
            </div> 
 
                <!-- Conference input-->
                
            <!--  <div class="container-fluid table-responsive">
              <div class="row">

                <div class="panel panel-success">
                 <div class="panel-heading">(B) Conference (List of 10 Best Publications)&nbsp;&nbsp;&nbsp;
                  <button class="btn btn-sm btn-success" id="add_more_confer">Add Details</button>
                </div>
                 <table class="table table-bordered">
                     <tbody id="confer">
                     
                     <tr height="30px">
                       <th class="col-md-2"> S. No. </th>
                       <th class="col-md-3"> Name of the Conference</th>
                       <th class="col-md-5"> Title of Paper </th>
                       <th class="col-md-2"> Year </th>
                     </tr>


                                        </tbody>
                 </table>
            </div>

              
            </div> 
          </div> -->

           <!-- Patent Text -->

             <div class="container-fluid table-responsive">

              <h4 style="text-align:center; font-weight: bold; color: #4eb3aa;">7. List of  Patent(s), Book(s), Book Chapter(s)</h4>
             <div class="row">

           <div class="panel panel-success">
            <div class="panel-heading">(A) Patent(s)&nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success" id="add_more_patent" fdprocessedid="z5av68">Add Details</button>  </div>
            <table class="table table-bordered">
                <tbody id="patent">
                
                <tr height="30px">
                  <th class="col-md-1"> S. No.</th>
                  <th class="col-md-1"> Inventor(s) </th>
                  <!-- <th class="col-md-2"> Year of Patent </th> -->
                  <th class="col-md-2"> Title of Patent </th>
                  <th class="col-md-1"> Country of Patent </th>
                  <th class="col-md-1"> Patent Number</th>
                  <th class="col-md-1"> Date of Filing</th>
                  <th class="col-md-1"> Date of Published</th>
                  <th class="col-md-1"> Date of Issue</th>
                  <!-- <th class="col-md-1"> Date of Filed/Published (If not granted, mention "Awaited")</th> -->
                </tr>


                                
                <tr height="60px">
                 
                  <td class="col-md-1"> 
                    1                    </td>
                  <td class="col-md-1"> 
                      <input id="pauthor1" name="pauthor[]" type="text"  placeholder="Author(s)" class="form-control input-md"  fdprocessedid="640i1k"> 
                    </td>
                 <!--  <td class="col-md-2"> 
                    <input id="p_year1"      name="p_year[]" type="text" value=""  placeholder="Year" class="form-control input-md" required=""> 
                  </td> -->
                  <td class="col-md-1"> 
                    <input id="ptitle1" name="ptitle[]" type="text"placeholder="Title" class="form-control input-md"  fdprocessedid="hldgtk"> 
                  </td>
                  <td class="col-md-1"> 
                    <input id="p_country1" name="p_country[]" type="text" placeholder="Country" class="form-control input-md"  fdprocessedid="t0sqq"> 
                  </td>
                  <td class="col-md-1"> 
                    <input id="p_number1" name="p_number[]" type="text"  placeholder="Patent Number" class="form-control input-md"  fdprocessedid="j9wm7"> 
                  </td>
                  <td class="col-md-1"> 
                    <input id="pyear_filed1" name="pyear_filed[]" type="text"  placeholder="DD/MM/YYYY" class="form-control input-md"  fdprocessedid="lhkk69"> 
                  </td>
                   <td class="col-md-1"> 
                    <input id="pyear_published1" name="pyear_published[]" type="text" placeholder="DD/MM/YYYY" class="form-control input-md" fdprocessedid="mx3eqd"> 
                  </td>
                   <td class="col-md-1"> 
                    <input id="pyear_issued1" name="pyear_issued[]" type="text"  placeholder="DD/MM/YYYY" class="form-control input-md"  fdprocessedid="8k7t8e"> 
                  </td>
             
                </tr>
                                
               
                              </tbody>
            </table>
          </div>
             
           </div>

            
           </div>

            <!-- Book Text -->

             <div class="container-fluid table-responsive">
              <div class="row">

             <div class="panel panel-success">
             <div class="panel-heading">(B) Book(s) &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success" id="add_more_book" fdprocessedid="r9n0eg">Add Details</button></div>

             <table class="table table-bordered">
                 <tbody id="book">
                 
                 <tr height="30px">
                   <th class="col-md-1"> S. No.</th>
                   <th class="col-md-2"> Author(s)</th>
                   <th class="col-md-2"> Title of the Book </th>
                   <th class="col-md-2"> Year of Publication </th>
                   <th class="col-md-2"> ISBN</  th>
                   <!-- <th class="col-md-2"> Status</th> -->
                 </tr>


                                  
                 <tr height="60px">
                  
                   <td class="col-md-1"> 
                     1                     </td>
                   <td class="col-md-4"> 
                       <input id="bauthor1" name="bauthor[]" type="text" placeholder="Author" class="form-control input-md"  fdprocessedid="iu6fto"> 
                     </td>
                   <td class="col-md-3"> 
                     <input id="btitle1"     name="btitle[]" type="text" placeholder="Title" class="form-control input-md"  fdprocessedid="n2ykae"> 
                   </td>
                   <td class="col-md-2"> 
                     <input id="byear1" name="byear[]" type="text"  placeholder="Year of" class="form-control input-md"  fdprocessedid="vywcbm"> 
                   </td>
                   <td class="col-md-2"> 
                     <input id="bisbn1" name="bisbn[]" type="text" placeholder="" class="form-control input-md"  fdprocessedid="s6letc"> 
                   </td>
               
                 </tr>
                                  
                 
                                </tbody>
             </table>
            </div>
              
            
            </div>

             
            </div>


            <br>
            <br>

            <!-- Book chapter Text -->

             <div class="container-fluid table-responsive">
              <div class="row">

             <div class="panel panel-success">
             <div class="panel-heading">(C) Book Chapter(s)&nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success" id="add_more_book_chapter" fdprocessedid="m6pzig">Add Details</button></div>

             <table class="table table-bordered">
                 <tbody id="book_chapter">
                 
                 <tr height="30px">
                   <th class="col-md-1"> S. No.</th>
                   <th class="col-md-2"> Author(s)</th>
                   <th class="col-md-2"> Title of the Book Chapter(s) </th>
                   <th class="col-md-2"> Year of Publication </th>
                   <th class="col-md-2"> ISBN</  th>
                   <!-- <th class="col-md-2"> Status</th> -->
                 </tr>


                                  
                 <tr height="60px">
                  
                   <td class="col-md-1"> 
                     1                     </td>
                   <td class="col-md-4"> 
                       <input id="bc_author1" name="bc_author[]" type="text"  placeholder="Author" class="form-control input-md"  fdprocessedid="5in3id"> 
                     </td>
                   <td class="col-md-3"> 
                     <input id="bc_title1"   name="bc_title[]" type="text" placeholder="Title" class="form-control input-md"  fdprocessedid="1rvcvu"> 
                   </td>
                   <td class="col-md-2"> 
                     <input id="bc_year1" name="bc_year[]" type="text"  placeholder="Year of" class="form-control input-md"  fdprocessedid="q09tys"> 
                   </td>
                   <td class="col-md-2"> 
                     <input id="bc_isbn1" name="bc_isbn[]" type="text"  placeholder="" class="form-control input-md"  fdprocessedid="mqpr0h"> 
                   </td>
               
                 </tr>
               
                                </tbody>
             </table>
            </div>
              
            
            </div>

             
            </div>


            <br>
            <br>
            

 

            <h4 style="text-align:center; font-weight: bold; color: #4eb3aa;">8. Google Scholar Link *</h4>
            <div class="row">
            <div class="col-md-12">
            <div class="panel panel-success">
            <div class="panel-heading">URL</div>
            <div class="panel-body">
              <span class="col-md-2 control-label" for="google_link">Google Scholar Link </span>  
              <div class="col-md-10">
              <input id="google_link" name="google_link" type="text" placeholder="Google Scholar Link" class="form-control input-md" required fdprocessedid="e6wt4r">
              </div>

              

            </div>
            </div>
            </div>
            </div>


            <!-- Button -->
<div class="form-group">

  <
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