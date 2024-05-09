<?php
include("connect.php");
session_start();
$sno = $_SESSION['sno'];
$query = "SELECT * FROM per_det WHERE app_no = $sno";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows(($result))) 
{
$row = mysqli_fetch_assoc($result);
$fname = $row['fname'];
$mname = $row['mname'];
$lname = $row['lname'];
$nation=$row['nation'];
$dob=$row['dob'];
$gender=$row['gender'];
$marital=$row['marital'];
$category=$row['category'];
$idproof=$row['idproof'];
$id_file=$row['id_file'];
$photo=$row['photo'];
$father=$row['father'];
mysqli_free_result($result);
} 

$query1 = "SELECT * FROM address WHERE app_no = $sno";
$result1 = mysqli_query($conn, $query1);
if (mysqli_num_rows(($result1))) 
{
$row = mysqli_fetch_assoc($result1);
$ps = $row['p_street'];
$pc = $row['p_city'];
$pst = $row['p_state'];
$pn=$row['p_country'];
$pco=$row['p_code'];
$cs=$row['c_street'];
$cc=$row['c_city'];
$cst=$row['c_state'];
$cn=$row['c_country'];
$cco=$row['c_code'];
mysqli_free_result($result1);
} 

$query2 = "SELECT * FROM contact WHERE app_no = $sno";
$result2 = mysqli_query($conn, $query2);
if (mysqli_num_rows(($result2))) 
{
$row = mysqli_fetch_assoc($result2);
$mob1 = $row['mob'];
$mob2= $row['alt_mob'];
$mob3 = $row['landline'];
$em1=$row['email'];
$em2=$row['alt_email'];
mysqli_free_result($result2);
} 

$query3 = "SELECT * FROM phd_det WHERE app_no = $sno";
$result3 = mysqli_query($conn, $query3);
if (mysqli_num_rows(($result3)))  
{
$row = mysqli_fetch_assoc($result3);
$univ=$row['univ'];
$sup=$row['supervisor'];
$dod=$row['dod'];
$tt=$row['thesis_title'];
$dept=$row['dept'];
$jyear=$row['jyear'];
$doa=$row['doa'];
mysqli_free_result($result3);
} 

$query4 = "SELECT * FROM pg_det WHERE app_no = $sno";
$result4 = mysqli_query($conn, $query4);
if (mysqli_num_rows(($result4))) {
$row = mysqli_fetch_assoc($result4);
$up=$row['university'];
$dp=$row['deg'];
$bp=$row['branch'];
$yojp=$row['yoj'];
$yocp=$row['yoc'];
$durp=$row['dur'];
$perp=$row['cgpa'];
$divp=$row['division'];
mysqli_free_result($result4);
} 

$query5 = "SELECT * FROM ug_det WHERE app_no = $sno";
$result5 = mysqli_query($conn, $query5);
if (mysqli_num_rows(($result5))) 
{
$row = mysqli_fetch_assoc($result5);
$uu=$row['university'];
$du=$row['deg'];
$bu=$row['branch'];
$yoju=$row['yoj'];
$yocu=$row['yoc'];
$duru=$row['dur'];
$peru=$row['cgpa'];
$divu=$row['division'];
mysqli_free_result($result5);
} 

$query6 = "SELECT * FROM school_det WHERE app_no = $sno";
$result6 = mysqli_query($conn, $query6);
if (mysqli_num_rows(($result6))) 
{
$row = mysqli_fetch_assoc($result6);
$shcool_det1=$row['schoola'];
$shcool_det2=$row['yopa'];
$shcool_det3=$row['percenta'];
$shcool_det4=$row['diva'];
$shcool_det5=$row['schoolb'];
$shcool_det6=$row['yopb'];
$shcool_det7=$row['percentb'];
$shcool_det8=$row['divb'];
mysqli_free_result($result6);
} 

$query7 = "SELECT * FROM acde_qual WHERE app_no = $sno";
$result7 = mysqli_query($conn, $query7);
$acde_qual1="";
$acde_qual2="";
$acde_qual3="";
$acde_qual4="";
$acde_qual5="";
$acde_qual6="";
$acde_qual7="";
$acde_qual8="";
$acde_qual9="";
$acde_qual10="";
$acde_qual11="";
$acde_qual12="";
$acde_qual13="";
$acde_qual14="";
$acde_qual15="";
$acde_qual16="";

if (mysqli_num_rows(($result7))==1) 
{
$row = mysqli_fetch_assoc($result7);
$acde_qual1=$row['degree'];
$acde_qual2=$row['university'];
$acde_qual3=$row['branch'];
$acde_qual4=$row['year_of_joining'];
$acde_qual5=$row['year_of_completion'];
$acde_qual6=$row['duration'];
$acde_qual7=$row['percent'];
$acde_qual8=$row['divi'];
mysqli_free_result($result7);
} 
else if(mysqli_num_rows(($result7))>1)
{
    $i=2;
    while($i!=0 &&$row = mysqli_fetch_assoc($result7) )
    {
        if($i==2)
        {
    $acde_qual1=$row['degree'];
    $acde_qual2=$row['university'];
    $acde_qual3=$row['branch'];
    $acde_qual4=$row['year_of_joining'];
    $acde_qual5=$row['year_of_completion'];
    $acde_qual6=$row['duration'];
    $acde_qual7=$row['percent'];
    $acde_qual8=$row['divi'];
        }
        else
        {
    $acde_qual9=$row['degree'];
    $acde_qual10=$row['university'];
    $acde_qual11=$row['branch'];
    $acde_qual12=$row['year_of_joining'];
    $acde_qual13=$row['year_of_completion'];
    $acde_qual14=$row['duration'];
    $acde_qual15=$row['percent'];
    $acde_qual16=$row['divi'];
        }
        $i--;
    }
    mysqli_free_result($result7);
}

$query8 = "SELECT * FROM present_emp WHERE app_no = $sno";
$result8 = mysqli_query($conn, $query8);
$present_emp1="";
$present_emp2="";
$present_emp3="";
$present_emp4="";
$present_emp5="";
$present_emp6="";
if (mysqli_num_rows(($result8))==1) 
{
    $row = mysqli_fetch_assoc($result8);
    $present_emp1=$row['pos'];
    $present_emp2=$row['ins'];
    $present_emp3=$row['p_status'];
    $present_emp4=$row['doj'];
    $present_emp5=$row['dol'];
    $present_emp6=$row['dur'];
    mysqli_free_result($result8);
}

$query9 = "SELECT * FROM emp_his WHERE app_no = $sno";
$result9 = mysqli_query($conn, $query9);
$emp_his1="";
$emp_his2="";
$emp_his3="";
$emp_his4="";
$emp_his5="";
$emp_his6="";
$emp_his7="";
$emp_his8="";
$emp_his9="";
$emp_his10="";
$emp_hiss="";
if (mysqli_num_rows(($result9))==1) 
{
$row = mysqli_fetch_assoc($result9);
$emp_his1=$row['pos'];
$emp_his2=$row['ins'];
$emp_his3=$row['doj'];
$emp_his4=$row['dol'];
$emp_his5=$row['dur'];
$emp_hiss=$row['teach_exp'];
mysqli_free_result($result9);
} 
else if(mysqli_num_rows(($result9))>1)
{
    $i=2;
    while($i!=0 &&$row = mysqli_fetch_assoc($result9) )
    {
        if($i==2)
        {
            $emp_his1=$row['pos'];
            $emp_his2=$row['ins'];
            $emp_his3=$row['doj'];
            $emp_his4=$row['dol'];
            $emp_his5=$row['dur'];
            $emp_hiss=$row['teach_exp'];
        }
        else
        {
            $emp_his6=$row['pos'];
            $emp_his7=$row['ins'];
            $emp_his8=$row['doj'];
            $emp_his9=$row['dol'];
            $emp_his10=$row['dur'];
        }
        $i--;
    }
    mysqli_free_result($result9);
}

$query10 = "SELECT * FROM teach_exp WHERE app_no = $sno";
$result10 = mysqli_query($conn, $query10);
$teach_exp1="";
$teach_exp2="";
$teach_exp3="";
$teach_exp4="";
$teach_exp5="";
$teach_exp6="";
$teach_exp7="";
$teach_exp8="";
$teach_exp9="";
$teach_exp10="";
$teach_exp11="";
$teach_exp12="";
$teach_exp13="";
$teach_exp14="";
$teach_exp15="";
$teach_exp16="";

if (mysqli_num_rows(($result10))==1) 
{
$row = mysqli_fetch_assoc($result10);
$teach_exp1=$row['pos'];
$teach_exp2=$row['emp'];
$teach_exp3=$row['course'];
$teach_exp4=$row['ug_pg'];
$teach_exp5=$row['nos'];
$teach_exp6=$row['doj'];
$teach_exp7=$row['dol'];
$teach_exp8=$row['dur'];
mysqli_free_result($result10);
} 
else if(mysqli_num_rows(($result10))>1)
{
    $i=2;
    while($i!=0 &&$row = mysqli_fetch_assoc($result10) )
    {
        if($i==2)
        {
            $teach_exp1=$row['pos'];
            $teach_exp2=$row['emp'];
            $teach_exp3=$row['course'];
            $teach_exp4=$row['ug_pg'];
            $teach_exp5=$row['nos'];
            $teach_exp6=$row['doj'];
            $teach_exp7=$row['dol'];
            $teach_exp8=$row['dur'];
        }
        else
        {
            $teach_exp9=$row['pos'];
            $teach_exp10=$row['emp'];
            $teach_exp11=$row['course'];
            $teach_exp12=$row['ug_pg'];
            $teach_exp13=$row['nos'];
            $teach_exp14=$row['doj'];
            $teach_exp15=$row['dol'];
            $teach_exp16=$row['dur'];
        }
        $i--;
    }
    mysqli_free_result($result10);
}
$query11 = "SELECT * FROM research_exp WHERE app_no = $sno";
$result11 = mysqli_query($conn, $query11);
$r_exp1="";
$r_exp2="";
$r_exp3="";
$r_exp4="";
$r_exp5="";
$r_exp6="";
$r_exp7="";
$r_exp8="";
$r_exp9="";
$r_exp10="";
$r_exp11="";
$r_exp12="";

if (mysqli_num_rows(($result11))==1) 
{
$row = mysqli_fetch_assoc($result11);
$r_exp1=$row['pos'];
$r_exp2=$row['ins'];
$r_exp3=$row['sup'];
$r_exp4=$row['doj'];
$r_exp5=$row['dol'];
$r_exp6=$row['dur'];
mysqli_free_result($result11);
} 
else if(mysqli_num_rows(($result11))>1)
{
    $i=2;
    while($i!=0 &&$row = mysqli_fetch_assoc($result11) )
    {
        if($i==2)
        {
            $r_exp1=$row['pos'];
$r_exp2=$row['ins'];
$r_exp3=$row['sup'];
$r_exp4=$row['doj'];
$r_exp5=$row['dol'];
$r_exp6=$row['dur'];
        }
        else
        {
            $r_exp7=$row['pos'];
            $r_exp8=$row['ins'];
            $r_exp9=$row['sup'];
            $r_exp10=$row['doj'];
            $r_exp11=$row['dol'];
            $r_exp12=$row['dur'];
        }
        $i--;
    }
    mysqli_free_result($result11);
}

$query12 = "SELECT * FROM ind_exp WHERE app_no = $sno";
$result12 = mysqli_query($conn, $query12);
$i_exp1="";
$i_exp2="";
$i_exp3="";
$i_exp4="";
$i_exp5="";
$i_exp6="";
$i_exp7="";
$i_exp8="";
$i_exp9="";
$i_exp10="";

if (mysqli_num_rows(($result12))==1) 
{
$row = mysqli_fetch_assoc($result12);
$i_exp1=$row['org'];
$i_exp2=$row['work'];
$i_exp3=$row['doj'];
$i_exp4=$row['dol'];
$i_exp5=$row['dur'];
mysqli_free_result($result12);
} 
else if(mysqli_num_rows(($result12))>1)
{
    $i=2;
    while($i!=0 &&$row = mysqli_fetch_assoc($result12) )
    {
        if($i==2)
        {
            $i_exp1=$row['org'];
            $i_exp2=$row['work'];
            $i_exp3=$row['doj'];
            $i_exp4=$row['dol'];
            $i_exp5=$row['dur'];
        }
        else
        {
            $i_exp6=$row['org'];
            $i_exp7=$row['work'];
            $i_exp8=$row['doj'];
            $i_exp9=$row['dol'];
            $i_exp10=$row['dur'];
        }
        $i--;
    }
    mysqli_free_result($result12);
}
$query13 = "SELECT * FROM areas WHERE app_no = $sno";
$result13 = mysqli_query($conn, $query13);
if (mysqli_num_rows(($result13))) 
{
$row = mysqli_fetch_assoc($result13);
$area1=$row['aos'];
$area2=$row['aor'];
mysqli_free_result($result13);
}

$query14 = "SELECT * FROM pub_summary WHERE app_no = $sno";
$result14 = mysqli_query($conn, $query14);
if (mysqli_num_rows(($result14))) 
{
$row = mysqli_fetch_assoc($result14);
$ps1=$row['int_journals'];
$ps2=$row['nat_journals'];
$ps3=$row['int_conferences'];
$ps4=$row['nat_conferences'];
$ps5=$row['patents'];
$ps6=$row['books'];
$ps7=$row['book_chapters'];
mysqli_free_result($result14);
}

$query15 = "SELECT * FROM best_publi WHERE app_no = $sno";
$result15 = mysqli_query($conn, $query15);
$bp1="";
$bp2="";
$bp3="";
$bp4="";
$bp5="";
$bp6="";
$bp7="";
$bp8="";
$bp9="";
$bp10="";
$bp11="";
$bp12="";
$bp13="";
$bp14="";

if (mysqli_num_rows(($result15))==1) 
{
$row = mysqli_fetch_assoc($result15);
$bp1=$row['author'];
$bp2=$row['title'];
$bp3=$row['journal'];
$bp4=$row['yearvp'];
$bp5=$row['imp_fctr'];
$bp6=$row['doi'];
$bp7=$row['stat'];
mysqli_free_result($result15);
} 
else if(mysqli_num_rows(($result15))>1)
{
    $i=2;
    while($i!=0 &&$row = mysqli_fetch_assoc($result15) )
    {
        if($i==2)
        {
            $bp1=$row['author'];
            $bp2=$row['title'];
            $bp3=$row['journal'];
            $bp4=$row['yearvp'];
            $bp5=$row['imp_fctr'];
            $bp6=$row['doi'];
            $bp7=$row['stat'];
        }
        else
        {
            $bp8=$row['author'];
            $bp9=$row['title'];
            $bp10=$row['journal'];
            $bp11=$row['yearvp'];
            $bp12=$row['imp_fctr'];
            $bp13=$row['doi'];
            $bp14=$row['stat'];
        }
        $i--;
    }
    mysqli_free_result($result15);
}

$query16 = "SELECT * FROM patent WHERE app_no = $sno";
$result16 = mysqli_query($conn, $query16);
$p1="";
$p2="";
$p3="";
$p4="";
$p5="";
$p6="";
$p7="";
$p8="";
$p9="";
$p10="";
$p11="";
$p12="";
$p13="";
$p14="";
if (mysqli_num_rows(($result16))==1) 
{
$row = mysqli_fetch_assoc($result16);
$p1=$row['inventor'];
$p2=$row['title'];
$p3=$row['country'];
$p4=$row['pno'];
$p5=$row['fdate'];
$p6=$row['pdate'];
$p7=$row['idate'];
mysqli_free_result($result16);
} 
else if(mysqli_num_rows(($result16))>1)
{
    $i=2;
    while($i!=0 &&$row = mysqli_fetch_assoc($result16) )
    {
        if($i==2)
        {
            $p1=$row['inventor'];
            $p2=$row['title'];
            $p3=$row['country'];
            $p4=$row['pno'];
            $p5=$row['fdate'];
            $p6=$row['pdate'];
            $p7=$row['idate'];
        }
        else
        {
            $p8=$row['inventor'];
            $p9=$row['title'];
            $p10=$row['country'];
            $p11=$row['pno'];
            $p12=$row['fdate'];
            $p13=$row['pdate'];
            $p14=$row['idate'];
        }
        $i--;
    }
    mysqli_free_result($result16);
}

$query17 = "SELECT * FROM book WHERE app_no = $sno";
$result17 = mysqli_query($conn, $query17);
$b1="";
$b2="";
$b3="";
$b4="";
$b5="";
$b6="";
$b7="";
$b8="";

if (mysqli_num_rows(($result17))==1) 
{
$row = mysqli_fetch_assoc($result17);
$b1=$row['author'];
$b2=$row['title'];
$b3=$row['yop'];
$b4=$row['isbn'];
mysqli_free_result($result17);
} 
else if(mysqli_num_rows(($result17))>1)
{
    $i=2;
    while($i!=0 &&$row = mysqli_fetch_assoc($result17) )
    {
        if($i==2)
        {
            $b1=$row['author'];
            $b2=$row['title'];
            $b3=$row['yop'];
            $b4=$row['isbn'];
        }
        else
        {
            $b5=$row['author'];
            $b6=$row['title'];
            $b7=$row['yop'];
            $b8=$row['isbn'];
        }
        $i--;
    }
    mysqli_free_result($result17);
}
$query18 = "SELECT * FROM book_chapter WHERE app_no = $sno";
$result18 = mysqli_query($conn, $query18);
$bc1="";
$bc2="";
$bc3="";
$bc4="";
$bc5="";
$bc6="";
$bc7="";
$bc8="";

if (mysqli_num_rows(($result18))==1) 
{
$row = mysqli_fetch_assoc($result18);
$bc1=$row['author'];
$bc2=$row['title'];
$bc3=$row['yop'];
$bc4=$row['isbn'];
mysqli_free_result($result18);
} 
else if(mysqli_num_rows(($result18))>1)
{
    $i=2;
    while($i!=0 &&$row = mysqli_fetch_assoc($result18) )
    {
        if($i==2)
        {
            $bc1=$row['author'];
            $bc2=$row['title'];
            $bc3=$row['yop'];
            $bc4=$row['isbn'];
        }
        else
        {
            $bc5=$row['author'];
            $bc6=$row['title'];
            $bc7=$row['yop'];
            $bc8=$row['isbn'];
        }
        $i--;
    }
    mysqli_free_result($result18);
}
$query19 = "SELECT * FROM gscholar WHERE app_no = $sno";
$result19 = mysqli_query($conn, $query19);
if (mysqli_num_rows(($result19))) 
{
$row = mysqli_fetch_assoc($result19);
$gs=$row['link'];
mysqli_free_result($result19);
}
$query20 = "SELECT * FROM  pro_soc WHERE app_no = $sno";
$result20 = mysqli_query($conn, $query20);
$pros1="";
$pros2="";
$pros3="";
$pros4="";
if (mysqli_num_rows(($result20))==1) 
{
$row = mysqli_fetch_assoc($result20);
$pros1=$row['name_soc'];
$pros2=$row['mem'];
mysqli_free_result($result20);
} 
else if(mysqli_num_rows(($result20))>1)
{
    $i=2;
    while($i!=0 &&$row = mysqli_fetch_assoc($result20) )
    {
        if($i==2)
        {
            $pros1=$row['name_soc'];
            $pros2=$row['mem'];
        }
        else
        {
            $pros3=$row['name_soc'];
            $pros4=$row['mem'];
        }
        $i--;
    }
    mysqli_free_result($result20);
}
$query21 = "SELECT * FROM  pro_train WHERE app_no = $sno";
$result21 = mysqli_query($conn, $query21);
$prot1="";
$prot2="";
$prot3="";
$prot4="";
$prot5="";
$prot6="";
$prot7="";
$prot8= "";
if (mysqli_num_rows(($result21))==1) 
{
$row = mysqli_fetch_assoc($result21);
$prot1=$row['type_of'];
$prot2=$row['org'];
$prot3=$row['yr'];
$prot4=$row['dur'];
mysqli_free_result($result21);
} 
else if(mysqli_num_rows(($result21))>1)
{
    $i=2;
    while($i!=0 &&$row = mysqli_fetch_assoc($result21) )
    {
        if($i==2)
        {
            $prot1=$row['type_of'];
            $prot2=$row['org'];
            $prot3=$row['yr'];
            $prot4=$row['dur'];
        }
        else
        {
            $prot5=$row['type_of'];
            $prot6=$row['org'];
            $prot7=$row['yr'];
            $prot8=$row['dur'];
        }
        $i--;
    }
    mysqli_free_result($result21);
}
$query22 = "SELECT * FROM  award WHERE app_no = $sno";
$result22 = mysqli_query($conn, $query22);
$aw1="";
$aw2="";
$aw3="";
$aw4="";
$aw5="";
$aw6="";
$aw7="";
$aw8= "";
$aw9= "";
if (mysqli_num_rows(($result22))==1) 
{
$row = mysqli_fetch_assoc($result22);
$aw1=$row['name_aw'];
$aw2=$row['awd_by'];
$aw3=$row['yr'];
mysqli_free_result($result22);
} 
else if(mysqli_num_rows(($result22))==2)
{
    $i=2;
    while($i!=0 &&$row = mysqli_fetch_assoc($result22) )
    {
        if($i==2)
        {
            $aw1=$row['name_aw'];
$aw2=$row['awd_by'];
$aw3=$row['yr'];
        }
        else
        {
            $aw4=$row['name_aw'];
$aw5=$row['awd_by'];
$aw6=$row['yr'];
        }
        $i--;
    }
    mysqli_free_result($result22);
}
else if(mysqli_num_rows(($result22))>= 3)
{
    $i=3;
    while($i!=0 &&$row = mysqli_fetch_assoc($result22) )
    {
        if($i==3)
        {
            $aw1=$row['name_aw'];
$aw2=$row['awd_by'];
$aw3=$row['yr'];
        }
        else if($i==2)
        {
            $aw4=$row['name_aw'];
$aw5=$row['awd_by'];
$aw6=$row['yr'];
        }
        else
        {
            $aw7=$row['name_aw'];
            $aw8=$row['awd_by'];
            $aw9=$row['yr'];
        }
        $i--;
    }
    mysqli_free_result($result22);
}

$query23 = "SELECT * FROM  research_supervision WHERE lev='phd' and app_no = $sno";
$result23 = mysqli_query($conn, $query23);
$rot1="";
$rot2="";
$rot3="";
$rot4="";
$rot5="";
$rot6="";
$rot7="";
$rot8= "";
$rot9="";
$rot10= "";

if (mysqli_num_rows(($result23))==1) 
{
$row = mysqli_fetch_assoc($result23);
$rot1=$row['name_stud'];
$rot2=$row['title_thesis'];
$rot3=$row['thesis_role'];
$rot4=$row['thesis_status'];
$rot5=$row['yr'];
mysqli_free_result($result23);
} 
else if(mysqli_num_rows(($result23))>1)
{
    $i=2;
    while($i!=0 &&$row = mysqli_fetch_assoc($result23) )
    {
        if($i==2)
        {
            $rot1=$row['name_stud'];
            $rot2=$row['title_thesis'];
            $rot3=$row['thesis_role'];
            $rot4=$row['thesis_status'];
            $rot5=$row['yr'];
        }
        else
        {
            $rot6=$row['name_stud'];
$rot7=$row['title_thesis'];
$rot8=$row['thesis_role'];
$rot9=$row['thesis_status'];
$rot10=$row['yr'];
        }
        $i--;
    }
    mysqli_free_result($result23);
}
$query24 = "SELECT * FROM  research_supervision WHERE lev='mtech' and app_no = $sno";
$result24 = mysqli_query($conn, $query24);
$ot1="";
$ot2="";
$ot3="";
$ot4="";
$ot5="";
$ot6="";
$ot7="";
$ot8= "";
$ot9="";
$ot10= "";

if (mysqli_num_rows(($result24))==1) 
{
$row = mysqli_fetch_assoc($result24);
$ot1=$row['name_stud'];
$ot2=$row['title_thesis'];
$ot3=$row['thesis_role'];
$ot4=$row['thesis_status'];
$ot5=$row['yr'];
mysqli_free_result($result24);
} 
else if(mysqli_num_rows(($result24))>1)
{
    $i=2;
    while($i!=0 &&$row = mysqli_fetch_assoc($result24) )
    {
        if($i==2)
        {
            $ot1=$row['name_stud'];
            $ot2=$row['title_thesis'];
            $ot3=$row['thesis_role'];
            $ot4=$row['thesis_status'];
            $ot5=$row['yr'];
        }
        else
        {
            $ot6=$row['name_stud'];
$ot7=$row['title_thesis'];
$ot8=$row['thesis_role'];
$ot9=$row['thesis_status'];
$ot10=$row['yr'];
        }
        $i--;
    }
    mysqli_free_result($result24);
}
$query25 = "SELECT * FROM  research_supervision WHERE lev='btech' and app_no = $sno";
$result25 = mysqli_query($conn, $query25);
$t1="";
$t2="";
$t3="";
$t4="";
$t5="";
$t6="";
$t7="";
$t8= "";
$t9="";
$t10= "";

if (mysqli_num_rows(($result25))==1) 
{
$row = mysqli_fetch_assoc($result25);
$t1=$row['name_stud'];
$t2=$row['title_thesis'];
$t3=$row['thesis_role'];
$t4=$row['thesis_status'];
$t5=$row['yr'];
mysqli_free_result($result25);
} 
else if(mysqli_num_rows(($result25))>1)
{
    $i=2;
    while($i!=0 &&$row = mysqli_fetch_assoc($result25) )
    {
        if($i==2)
        {
            $t1=$row['name_stud'];
            $t2=$row['title_thesis'];
            $t3=$row['thesis_role'];
            $t4=$row['thesis_status'];
            $t5=$row['yr'];
        }
        else
        {
            $t6=$row['name_stud'];
$t7=$row['title_thesis'];
$t8=$row['thesis_role'];
$t9=$row['thesis_status'];
$t10=$row['yr'];
        }
        $i--;
    }
    mysqli_free_result($result25);
}
    $query26= "SELECT * FROM  proj_spon WHERE  app_no = $sno";
$result26 = mysqli_query($conn, $query26);
$s1="";
$s2="";
$s3="";
$s4="";
$s5="";
$s6="";
$s7="";
$s8= "";
$s9="";
$s10= "";
$s11= "";
$s12= "";

if (mysqli_num_rows(($result26))==1) 
{
$row = mysqli_fetch_assoc($result26);
$s1=$row['agency'];
$s2=$row['title'];
$s3=$row['amt'];
$s4=$row['dur'];
$s5=$row['proj_role'];
$s6=$row['proj_status'];
mysqli_free_result($result26);
} 
else if(mysqli_num_rows(($result26))>1)
{
    $i=2;
    while($i!=0 &&$row = mysqli_fetch_assoc($result26) )
    {
        if($i==2)
        {
            $s1=$row['agency'];
            $s2=$row['title'];
            $s3=$row['amt'];
            $s4=$row['dur'];
            $s5=$row['proj_role'];
            $s6=$row['proj_status'];
        }
        else
        {
            $s7=$row['agency'];
            $s8=$row['title'];
            $s9=$row['amt'];
            $s10=$row['dur'];
            $s11=$row['proj_role'];
            $s12=$row['proj_status'];
        }
        $i--;
    }
    mysqli_free_result($result26);
}
$query27= "SELECT * FROM  proj_cons WHERE  app_no = $sno";
$result27 = mysqli_query($conn, $query27);
$c1="";
$c2="";
$c3="";
$c4="";
$c5="";
$c6="";
$c7="";
$c8= "";
$c9="";
$c10= "";
$c11= "";
$c12= "";

if (mysqli_num_rows(($result27))==1) 
{
$row = mysqli_fetch_assoc($result27);
$c1=$row['org'];
$c2=$row['title'];
$c3=$row['amt'];
$c4=$row['dur'];
$c5=$row['proj_role'];
$c6=$row['proj_status'];
mysqli_free_result($result27);
} 
else if(mysqli_num_rows(($result27))>1)
{
    $i=2;
    while($i!=0 &&$row = mysqli_fetch_assoc($result27) )
    {
        if($i==2)
        {
            $c1=$row['org'];
            $c2=$row['title'];
            $c3=$row['amt'];
            $c4=$row['dur'];
            $c5=$row['proj_role'];
            $c6=$row['proj_status'];
        }
        else
        {
            $c7=$row['org'];
            $c8=$row['title'];
            $c9=$row['amt'];
            $c10=$row['dur'];
            $c11=$row['proj_role'];
            $c12=$row['proj_status'];
        }
        $i--;
    }
    mysqli_free_result($result27);
}
$query28 = "SELECT * FROM large_paras WHERE app_no = $sno";
$result28 = mysqli_query($conn, $query28);
if (mysqli_num_rows(($result28))) 
{
$row = mysqli_fetch_assoc($result28);
$lp1=$row['research_contri'];
$lp2=$row['teach_contri'];
$lp3=$row['other'];
$lp4=$row['prof_service'];
$lp5=$row['journal_pub'];
$lp6=$row['conference_pub'];
mysqli_free_result($result28);
} 
$query29 = "SELECT * FROM referal WHERE sno='1' and app_no = $sno";
$result29 = mysqli_query($conn, $query29);
if (mysqli_num_rows(($result29))) 
{
$row = mysqli_fetch_assoc($result29);
$rf1=$row['name_ref'];
$rf2=$row['pos'];
$rf3=$row['ass_ref'];
$rf4=$row['ins'];
$rf5=$row['email'];
$rf6=$row['contact'];
mysqli_free_result($result29);
} 
$query30 = "SELECT * FROM referal WHERE sno='2' and app_no = $sno";
$result30 = mysqli_query($conn, $query30);
if (mysqli_num_rows(($result30))) 
{
$row = mysqli_fetch_assoc($result30);
$rf7=$row['name_ref'];
$rf8=$row['pos'];
$rf9=$row['ass_ref'];
$rf10=$row['ins'];
$rf11=$row['email'];
$rf12=$row['contact'];
mysqli_free_result($result30);
} 
$query31 = "SELECT * FROM referal WHERE sno='3' and app_no = $sno";
$result31 = mysqli_query($conn, $query31);
if (mysqli_num_rows(($result31))) 
{
$row = mysqli_fetch_assoc($result31);
$rf13=$row['name_ref'];
$rf14=$row['pos'];
$rf15=$row['ass_ref'];
$rf16=$row['ins'];
$rf17=$row['email'];
$rf18=$row['contact'];
mysqli_free_result($result31);
} 
?>
<html>
<head>
	<title></title>
	<style type="text/css">
	@page { margin:0.5in 0.5in 0.5in 0.5in; }

	    .receipt {
	        margin:0 auto 1in auto;
	        /*font-family:"verdana",monospace;*/
	        border:solid #000;
	        padding:0 0.25in;
	        width:10in;
	        min-height:2.5in;
	        height: auto;
	        /*page-break-inside:avoid;
	        page-break-before:auto;
	        page-break-after:auto;*/
	        /*word-wrap: break-word;*/
	    }
	    .receipt div, .receipt p, .receipt span {
	        /*page-break-before:avoid;
	        page-break-after:avoid;*/
	    }

	    .receipt div {
	        margin:0;
	        margin-bottom:0.1in;
	        padding:0;
	        /*word-wrap: break-word;*/
	    	/*background-color: green;*/


	    }

	    .receipt span {
	        display:inline-block;
	        line-height:2;
	    }

	    .receipt p, .receipt span {
	        margin:0; padding:0;


	    }

	    .title {
	        font-family:Arial,sans-serif;
	        font-size:1.5em;
	        color: #a40a0b;
	        font-weight:bold;
	        width:100%;
	    }

	    .label {
	        font-weight:bold;
	        color: #a40a0b;
	        background-color: #f1f1d1;
	        margin-bottom: 10px!important;
	        padding-left: 5px!important;
	        padding-right: 5px!important;
	        border-radius: 5px;
	        font-size: 1.1em;
	    }

	    .date, .payee, .phone, .signature {
	        border-bottom:solid thin #444;
	    }

	    .payee, .signature { width:2in; }

	    .phone, .date  { width:1.25in; }

	    .amount, .payer {
	        font-style:italic;
	        text-decoration:underline;
	    }
	    .tab{
	    	border-collapse: collapse;
	    	width: 100%;
	    	/*word-break: break-all;
	    	word-wrap: break-word;*/

	    	/*background-color: green;*/
	    	/*word-wrap: break-word!important;*/

	    	/*white-space: pre-line!important;*/
	    	/*overflow:auto!important;*/
	    }
	    .tab td{
	    	border:1px solid #CCC !important;
	    	padding-left: 10px;
	    	/*background-color:#DDFFFF;*/

	    	word-wrap: break-word!important;
	    	/*white-space: pre-line!important;*/
	    	/*overflow:auto!important;*/
	    	/*background-color: red;*/

	    }
	    .receipt_left{
	    	float: left;
	    	width:5.5in;
	    	/*word-wrap: break-word;*/
	    }
	    .receipt_right{
	    	float: right;
	    	width:1.5in;
	    	/*word-wrap: break-word;*/
	    }

	    .receipt_left1{
	    	float: left;
	    	width:4.5in;
	    	/*word-wrap: break-word;*/
	    }
	    .receipt_right1{
	    	float: right;
	    	width:4.5in;
	    	/*word-wrap: break-word;*/
	    }

	    .receipt_right img
	    {
	    	height: 1in;
	    	width: 0.8in;
	    	padding: 2px;
	    	border: 1px solid #CCC;
	    }

	    .receipt_center{
	    	/*float: left;*/
	    	width:auto;
	    	height: 120px;
	    	/*word-wrap: break-word;*/
	    }

		th
		{
			text-align: left;
		}

		.tr_title
		{
			color: #0a5398;
		}
	</style>
</head>
      
<body style="font-family:Arial,sans-serif;">
	
	<div class="receipt">
		<div class="receipt_center">
		<img src="iitp.svg" style="height: 85px; float: left;"/>
		<p style="text-align: center; font-size: 1.7em;">भारतीय प्रौद्योगिकी संस्थान पटना<br />Indian Institute of Technology Patna</p>
		<p style="text-align: center; margin-top: 10px; background-color: #175395; line-height: 25px; color: #FFF; font-weight: bold;">Application for the Faculty Position</p>
		</div>
		<hr>
			<div class="title" id="main_tit"></div>
	<div class="receipt_left">
		<p style="width:10in;" id="adv_num"></p>
		<p id="doa"></p>
		<p id="post"></p>
		<p id="dept"></p>
		<p id="app_num"></p>
		
	</div>
	<div class="receipt_right" style="margin-top: -10px;">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfLYYyif0Du1UnhJC6p4hGz_6RpxhEnNr8jGWk7LLSqQ-RWP9xPexcfpU&s=10">
	</div>
	<div style="clear:both"></div>
	<div>
	<span class="label">1. Personal Details</span>

	<table class="tab">
		<tr style="background-color:#f1f1f1;">
			<td><strong class="tr_title">First Name</strong></td>
			<td><strong class="tr_title">Middle Name</strong></td>
			<td><strong class="tr_title">Last Name</strong></td>
		</tr>
				<tr>
			<td id="fname"><?php echo $fname?></td>
			<td id="mname"><?php echo $mname?></td>
			<td id="lname"><?php echo $lname?></td>
		</tr>
	</table>
	<br />
	

	<table class="tab">
		<tr style="background-color:#f1f1f1;">
			<td><strong class="tr_title">Date of Birth</strong></td>
			<!-- <td><strong class="tr_title">Age</strong></td> -->
			<td><strong class="tr_title">Gender</strong></td>
			<td><strong class="tr_title">Marital Status</strong></td>
			<td><strong class="tr_title">Category</strong></td>
			<td><strong class="tr_title">Nationality</strong></td>
			<td><strong class="tr_title">ID Proof</strong></td>

		</tr>
				<tr>
			<td id="dob"><?php echo $dob?></td>
			<!-- <td></td> -->
			<td id="gender"><?php echo $gender?></td>
			<td id="mstatus"><?php echo $marital?></td>
			<td id="cast"><?php echo $_SESSION['cast']?></td>
			<td id="nationality"><?php echo $nation?></td>
			<td id="id_proof"><?php echo $idproof?></td>
		</tr>
		<tr>
			<td><strong>Father's Name</strong></td>
			<td colspan="6" id="father"><?php echo $father?></td>

		</tr>
	</table>
	<br />

	<table class="tab">
		<tr style="background-color:#f1f1f1;">
			<td width="50%"><strong class="tr_title">Current Address </strong></td>
			<td width="50%"><strong class="tr_title">Permanent Address </strong></td>
			
		</tr>
        <tr>
			<td id="c_street"><?php echo $cs?></td>
			<td id="p_street"><?php echo $ps?></td>
			
		</tr>
		<tr>
			<td id="c_city"><?php echo $cc?></td>
			<td id="p_city"><?php echo $pc?></td>
			
		</tr>
		<tr>
			<td id="c_state"><?php echo $cst?></td>
			<td id="p_state"><?php echo $pst?></td>
			
		</tr>
		<tr>
			<td id="c_country"><?php echo $cn?></td>
			<td id="p_country"><?php echo $pn?></td>
			
		</tr>
		<tr>
			<td id="c_pin"><?php echo $cco?></td>
			<td id="p_pin"><?php echo $pco?></td>
			
		</tr>
	</table>
	<br />
	
	<span class="label"></span>
	<table class="tab">
		<!-- <tr>
			<td colspan="2"><strong>Mobile & Email</strong></td>
			
		</tr> -->
				<tr>
			<td style="background-color:#f1f1f1;"><strong class="tr_title">Mobile</strong></td>
			<td id="mob"><?php echo $mob1?></td>
		</tr>

		<tr>
			<td style="background-color:#f1f1f1;"><strong class="tr_title">Alternate Mobile</strong></td>
			<td id="mob2"><?php echo $mob2?></td>
		</tr>

		<tr>
			<td style="background-color:#f1f1f1;"><strong class="tr_title">Landline Phone No.</strong></td>
			<td id="land_mob"><?php echo $mob3?></td>
		</tr>

		<tr>
			<td style="background-color:#f1f1f1;"><strong class="tr_title">E-mail</strong></td>
			<td id="email"><?php echo $em1?></td>
		</tr>

		<tr>
			<td style="background-color:#f1f1f1;"><strong class="tr_title">Alternate E-mail</strong></td>
			<td id="email2"><?php echo $em2?></td>
		</tr>

		
		
		
		
		
	</table>
	<br />

	<span class="label">2. Educational Qualifications</span>
	<table class="tab">

		<tr style="background-color:#f1f1f1;">
			<td colspan="6" class="tr_title"><strong>(A) Ph. D. Details</strong></td>
		</tr>
		
		<tr>
			<td width="30%"><strong>University/<br />Institute</strong></td>
            <td width="17%"><strong>Name of Ph. D. <br />Supervisor</strong></td>
			<td width="12%"><strong>Department</strong></td>
			<td width="10%"><strong>Year of <br />Joining</strong></td>
			<td width="15%"><strong>Date of <br />successful <br />thesis Defence</strong></td>
			<td width="15%"><strong>Date of <br />Award</strong></td>
		</tr>
		
				<tr>
			<td id="p_uni"><?php echo $univ?></td>
			<td id="p_dept"><?php echo $sup?></td>
			<td id="p_sup"><?php echo $dept?></td>
			<td id="p_year"><?php echo $jyear?></td>
			<td id="p_def"><?php echo $dod?></td>
			<td id="p_award"><?php echo $doa?></td>


		</tr>

		<tr>
			<td><strong>Title of Ph. D. Thesis</strong></td>
			<td colspan="5" id="p_title"><?php echo $tt?></td>
		</tr>
		
			</table>
	<br />

	<table class="tab">

		<tr style="background-color:#f1f1f1;">
			<td colspan="8" class="tr_title"><strong>(B) Academic Details - PG</strong></td>
		</tr>
		

		<tr>
			<td width="10%"><strong>Degree</strong></td>
			<td width="25%"><strong>University/<br />Institute</strong></td>
			<td width="20%"><strong>Subjects</strong></td>
			<td width="10%"><strong>Year of <br />Joining</strong></td>
			<td width="12%"><strong>Year of <br />Graduation</strong></td>
			<td width="10%"><strong>Duration <br />(in years)</strong></td>
			<td width="30%"><strong>Percentage/CGPA </strong></td>
			<td width="30%"><strong>Division/Class </strong></td>
			

			
		</tr>
				<tr>
			<td id="m_deg"><?php echo $dp?></td>
			<td id="m_uni"><?php echo $up?></td>
			<td id="m_dept"><?php echo $bp?></td>
			<td id="m_yoj"><?php echo $yojp?></td>
			<td id="m_yoc"><?php echo $yocp?></td>
			<td id="m_dur"><?php echo $durp?></td>
			<td id="m_cgpa"><?php echo $perp?></td>
			<td id="m_class"><?php echo $divp?></td>


		</tr>
			</table>
	<br />

	<table class="tab">

		<tr style="background-color:#f1f1f1;">
			<td colspan="8" class="tr_title"><strong>(C) Academic Details - UG</strong></td>
		</tr>

		<tr>
			<td width="10%"><strong>Degree</strong></td>
			<td width="25%"><strong>University/<br />Institute</strong></td>
			<td width="20%"><strong>Subjects</strong></td>
			<td width="10%"><strong>Year of <br />Joining</strong></td>
			<td width="12%"><strong>Year of <br />Graduation</strong></td>
			<td width="10%"><strong>Duration <br />(in years)</strong></td>
			<td width="30%"><strong>Percentage/CGPA </strong></td>
			<td width="30%"><strong>Division/Class </strong></td>
			

			
		</tr>
				<tr>
                    <td id="b_deg"><?php echo $du?></td>
                    <td id="b_uni"><?php echo $uu?></td>
                    <td id="b_dept"><?php echo $bu?></td>
                    <td id="b_yoj"><?php echo $yoju?></td>
                    <td id="b_yoc"><?php echo $yocu?></td>
                    <td id="b_dur"><?php echo $duru?></td>
                    <td id="b_cgpa"><?php echo $peru?></td>
                    <td id="b_class"><?php echo $divu?></td>


		</tr>
			</table>
	<br />

	<table class="tab">

		<tr style="background-color:#f1f1f1;">
			<td colspan="8" class="tr_title"><strong>(D) Academic Details - School</strong></td>
		</tr>

		<tr>
			<td width="20%"><strong>10th/12th/HSC/Diploma</strong></td>
			<td width="20%"><strong>School</strong></td>
			<td width="15%"><strong>Year of Passing</strong></td>
			<td width="15%"><strong>Percentage/CGPA</strong></td>
			<td width="15%"><strong>Division/Class</strong></td>
			

			
		</tr>
				<tr>
			<td>12th/HSC/Diploma</td>
			<td id="tw_school"><?php echo $shcool_det1?></td>
			<td id="tw_year"><?php echo $shcool_det2?></td>
			<!-- <td></td> -->
			<td id="tw_grade"><?php echo $shcool_det3?></td>
			<td id="tw_class"><?php echo $shcool_det4?></td>
			
		</tr>
				<tr>
			<strong><td>10th</td></strong>
			<td id="ten_school"><?php echo $shcool_det5?></td>
			<td id="ten_year"><?php echo $shcool_det6?></td>
			<!-- <td></td> -->
			<td id="ten_grade"><?php echo $shcool_det7?></td>
			<td id="ten_class"><?php echo $shcool_det8?></td>
			
		</tr>
			</table>
	<br />
	<table class="tab">
		<tr style="background-color:#f1f1f1;">
			<td colspan="8" class="tr_title"><strong>(E) Additional Educational Qualifications (If any) </strong></td>
		</tr>
		
		<tr>
			<td width="10%"><strong>Degree</strong></td>
			<td width="25%"><strong>University/<br />Institute</strong></td>
			<td width="20%"><strong>Subjects</strong></td>
			<td width="10%"><strong>Year of <br />Joining</strong></td>
			<td width="12%"><strong>Year of <br />Graduation</strong></td>
			<td width="10%"><strong>Duration <br />(in years)</strong></td>
			<td width="30%"><strong>Percentage/CGPA </strong></td>
			<td width="30%"><strong>Division/Class </strong></td>
		</tr>
				<tr>
			<td><?php echo $acde_qual1?></td>
			<td><?php echo $acde_qual2?></td>
			<td><?php echo $acde_qual3?></td>
			<td><?php echo $acde_qual4?> </td>
			<td><?php echo $acde_qual5?></td>
			<td><?php echo $acde_qual6?></td>
			<td><?php echo $acde_qual7?> </td>
			<td><?php echo $acde_qual8?></td>
		</tr>
				<tr>
            <td><?php echo $acde_qual9?></td>
			<td><?php echo $acde_qual10?></td>
			<td><?php echo $acde_qual11?></td>
			<td><?php echo $acde_qual12?> </td>
			<td><?php echo $acde_qual13?></td>
			<td><?php echo $acde_qual14?></td>
			<td><?php echo $acde_qual15?> </td>
			<td><?php echo $acde_qual16?></td>
		</tr>

			</table>
	<br />

	<span class="label">3. Employment Details </span>

	<table class="tab">

		<tr style="background-color:#f1f1f1;">
			<td colspan="5" class="tr_title"><strong>(A) Present Employment</strong></td>
		</tr>
		

		<tr>
			<td width="20"><strong>Position </strong></td>
			<td width="30"><strong>Organization/Institution</strong></td>
			<td width="15"><strong>Date of <br />Joining</strong></td>
			<td width="15"><strong>Date of <br />Leaving </strong></td>
			<td width="15"><strong>Duration <br />(in years)</strong></td>
		</tr>
				<tr>
			<td id="e_pos"><?php echo $present_emp1?></td>
			<td id="e_org"><?php echo $present_emp2?></td>
			<td id="e_doj"><?php echo $present_emp4?></td>
			<td id="e_dol"><?php echo $present_emp5?></td>
			<td id="e_dur"><?php echo $present_emp6?></td>
		</tr>
			</table>
	<br />

	<span class="label"> </span>
	<table class="tab">
		<tr style="background-color:#f1f1f1;">
			<td colspan="5" class="tr_title"><strong>(B) Employment History (After PhD )</strong></td>
		</tr>
		
		<tr>
			<td width="20"><strong>Position </strong></td>
			<td width="30"><strong>Organization/Institution</strong></td>
			<td width="15"><strong>Date of <br />Joining</strong></td>
			<td width="15"><strong>Date of <br />Leaving </strong></td>
			<td width="15"><strong>Duration <br />(in years)</strong></td>
		</tr>
				<tr>
			<td><?php echo $emp_his1?></td>
			<td><?php echo $emp_his2?></td>
			<td><?php echo $emp_his3?></td>
			<td><?php echo $emp_his4?></td>
			<!-- <td>Possimus fugit aspernatur.</td> -->
			<td><?php echo $emp_his5?></td>
		</tr>
        <tr>
			<td><?php echo $emp_his6?></td>
			<td><?php echo $emp_his7?></td>
			<td><?php echo $emp_his8?></td>
			<td><?php echo $emp_his9?></td>
			<!-- <td>Possimus fugit aspernatur.</td> -->
			<td><?php echo $emp_his10?></td>
		</tr>
		
		
		<tr>
						<tr>
				<td colspan="5">Experience : Minimum 6 years’ experience of which at least 3 years should be at the level of Assistant Professor Grade I/Senior Scientific Officer/Senior Design Engineer. <strong style="color:red;"><?php echo $emp_hiss?></strong></td>
			</tr>


					</tr>
	</table>
	<br />

	<table class="tab">
		<tr style="background-color:#f1f1f1;">
			<td colspan="8" class="tr_title"><strong>(C) Teaching Experience (After PhD)</strong></td>
		</tr>
		
		<tr>
			<!-- <td><strong>S. No.</strong></td> -->
			<td width="25%"><strong>Position</strong></td>
			<td width="30%"><strong>Employer</strong></td>
			<td width="30%"><strong>Course Taught</strong></td>
			<td width="30%"><strong>UG/PG</strong></td>
			<td width="30%"><strong>No. of Students</strong></td>
			<td width="10%"><strong>Date of <br />Joining</strong></td>
			<td width="10%"><strong>Date of <br />Leaving</strong></td>
			<td width="10%"><strong>Duration</strong></td>
		</tr>
				<tr>
			<!-- <td></td> -->
			<td><?php echo $teach_exp1?></td>
			<td><?php echo $teach_exp2?></td>
			<td><?php echo $teach_exp3?></td>
			<td><?php echo $teach_exp4?></td>
			<td><?php echo $teach_exp5?></td>
			<td><?php echo $teach_exp6?> </td>
			<td><?php echo $teach_exp7?></td>
			<td><?php echo $teach_exp8?></td>
		</tr>
        <tr>
			<!-- <td></td> -->
			<td><?php echo $teach_exp9?></td>
			<td><?php echo $teach_exp10?></td>
			<td><?php echo $teach_exp11?></td>
			<td><?php echo $teach_exp12?></td>
			<td><?php echo $teach_exp13?></td>
			<td><?php echo $teach_exp14?> </td>
			<td><?php echo $teach_exp15?></td>
			<td><?php echo $teach_exp16?></td>
		</tr>
		
	</table>
	<br />

	<table class="tab">
		<tr style="background-color:#f1f1f1">
			<td colspan="6" class="tr_title"><strong>(D) Research Experience </strong></td>
		</tr>
		
		<tr>
			<!-- <td><strong>S. No.</strong></td> -->
			<td width="20%"><strong>Position</strong></td>
			<td width="20%"><strong>Institute</strong></td>
			<td width="20%"><strong>Supervisor</strong></td>
			<td width="10%"><strong>Date of <br />Joining</strong></td>
			<td width="10%"><strong>Date of <br />Leaving</strong></td>
			<td width="10%"><strong>Duration</strong></td>
		</tr>
				<tr>
			<!-- <td></td> -->
			<td><?php echo $r_exp1?></td>
			<td><?php echo $r_exp2?></td>
			<td><?php echo $r_exp3?></td>
			<td><?php echo $r_exp4?></td>
			<td><?php echo $r_exp5?></td>
			<td><?php echo $r_exp6?></td>
		</tr>
        <tr>
			<!-- <td></td> -->
			<td><?php echo $r_exp7?></td>
			<td><?php echo $r_exp8?></td>
			<td><?php echo $r_exp9?></td>
			<td><?php echo $r_exp10?></td>
			<td><?php echo $r_exp11?></td>
			<td><?php echo $r_exp12?></td>
		</tr>
			</table>
	<br />

	<table class="tab">
		<tr style="background-color:#f1f1f1">
			<td colspan="5"><strong  class="tr_title">(E) Industrial Experience </strong></td>
		</tr>
		
		<tr>
			<!-- <td><strong>S. No.</strong></td> -->
			<td width="20%"><strong>Organization</strong></td>
			<td width="20%"><strong>Work Profile</strong></td>
			<td width="10%"><strong>Date of <br />Joining</strong></td>
			<td width="10%"><strong>Date of <br />Leaving</strong></td>
			<td width="10%"><strong>Duration</strong></td>
		</tr>
        <tr>
			<!-- <td></td> -->
			<td><?php echo $i_exp1?></td>
			<td><?php echo $i_exp2?></td>
			<td><?php echo $i_exp3?></td>
			<td><?php echo $i_exp4?></td>
			<td><?php echo $i_exp5?></td>
		</tr>
        <tr>
			<!-- <td></td> -->
			<td><?php echo $i_exp6?></td>
			<td><?php echo $i_exp7?></td>
			<td><?php echo $i_exp8?></td>
			<td><?php echo $i_exp9?></td>
			<td><?php echo $i_exp10?></td>
		</tr>
			</table>
	<br />

	<span class="label">4.  Area(s) of Specialization and Current Area(s) of Research</span>
	<table class="tab">
			<!-- <tr style="background-color:#f1f1f1"> 
				<td><strong class="tr_title">4. Area(s) of Specialization & Current Area(s) of Research</strong></td>
			</tr> -->
						<tr>
				<td width="25%" style="background-color: #f1f1f1;"><strong class="tr_title">Area(s) of Specialization</strong></td>
				<td id="area_sp"><?php echo $area1?></td>
			</tr>

			<tr>
				<td width="25%" style="background-color: #f1f1f1;"><strong class="tr_title">Current Area(s) of Research</strong></td>
				<td id="area_res"><?php echo $area2?></td>
			</tr>

			
		</table>
		<br />
		

		<span class="label">5. Summary of Publications</span>
		<table class="tab">
			

			
			<tr>
				<td width="50%"><strong>Number of International Journal Papers  </strong></td>
				<td><?php echo $ps1?></td>
			</tr>

			<tr>
				<td width="50%"><strong>Number of National Journal Papers  </strong></td>
				<td><?php echo $ps2?></td>
			</tr>

			<tr>
				<td><strong> Number of International Conference Papers </strong></td>
				<td><?php echo $ps3?></td>
			</tr>

			<tr>
				<td><strong> Number of National Conference Papers </strong></td>
				<td><?php echo $ps4?></td>
			</tr>

			<tr>
				<td><strong> Number of Patent(s) </strong></td>
				<td><?php echo $ps5?></td>
			</tr>

			<tr>
				<td><strong> Number of Book(s) </strong></td>
				<td><?php echo $ps6?></td>
			</tr>

			<tr>
				<td><strong>Number of Book Chapter(s) </strong></td>
				<td><?php echo $ps7?></td>
			</tr>
			
			
					</table>
		<br />


		<span class="label">6. List of Best Research Publications (Journal/Conference)</span>
		<table class="tab">
			<tr style="background-color:#f1f1f1;">
				<td colspan="8"><strong class="tr_title">(A) Journals(s)</strong></td>
			</tr>
			<tr>
				<td width="5%"><strong>S. No.</strong></td>
				<td width="25%"><strong>Author(s) </strong></td>
				<td width="30%"><strong>Title</strong></td>
				<td width="25%"><strong>Name of Journal</strong></td>
				<td width="10%"><strong>Year, Vol., Page</strong></td>
				<td width="5%"><strong>Impact Factor</strong></td>
				<td width="1%"><strong>DOI</strong></td>
				<td width="5%"><strong>Status</strong></td>
			</tr>
						
				<tr>
			<!-- <td></td> -->
            <td>1</td>
			<td><?php echo $bp1?></td>
			<td><?php echo $bp2?></td>
			<td><?php echo $bp3?></td>
			<td><?php echo $bp4?></td>
			<td><?php echo $bp5?></td>
			<td><?php echo $bp6?></td>
            <td><?php echo $bp7?></td>
		</tr>
        <tr>
			<!-- <td></td> -->
            <td>2</td>
			<td><?php echo $bp8?></td>
			<td><?php echo $bp9?></td>
			<td><?php echo $bp10?></td>
			<td><?php echo $bp11?></td>
			<td><?php echo $bp12?></td>
			<td><?php echo $bp13?></td>
            <td><?php echo $bp14?></td>

		</tr>	
					</table>
		<br />
		
		<!-- <table class="tab">
			<tr style="background-color:#f1f1f1;">
				<td colspan="3"><strong class="tr_title">(B) Conference(s)</strong></td>
			</tr>
			<tr>
				<td width="20%"><strong>Name of the Conference </strong></td>
				<td width="20%"><strong>Title of Paper</strong></td>
				<td width="10%"><strong>Year</strong></td>
			</tr>
					</table>
		<br />	 -->

		<span class="label">7. List of Patent(s), Book(s), Book Chapter(s)</span>
		<table class="tab">
			<tr style="background-color:#f1f1f1;">
				<td colspan="8"><strong class="tr_title">(A) Patent(s)</strong></td>
			</tr>
			<tr>
				<td width="5%"><strong>S. No.</strong></td>
				<td width="20%"><strong>Inventor(s) </strong></td>
				<td width="20%"><strong>Title of Patent</strong></td>
				<td width="15%"><strong>Country of<br /> Patent</strong></td>
				<td width="10%"><strong>Patent <br />Number</strong></td>
				<td width="10%"><strong>Date of <br />Filing</strong></td>
				<td width="10%"><strong>Date of <br />Published</strong></td>
				<td width="10%"><strong>Date of<br />Issue</strong></td>
			</tr>
						<tr>
				<td>1</td>
                <td><?php echo $p1?></td>
			<td><?php echo $p2?></td>
			<td><?php echo $p3?></td>
			<td><?php echo $p4?></td>
			<td><?php echo $p5?></td>
			<td><?php echo $p6?></td>
            <td><?php echo $p7?></td>
				</tr>
						<tr>
                        <td>2</td>
                <td><?php echo $p8?></td>
			<td><?php echo $p9?></td>
			<td><?php echo $p10?></td>
			<td><?php echo $p11?></td>
			<td><?php echo $p12?></td>
			<td><?php echo $p13?></td>
            <td><?php echo $p14?></td>
			</tr>
					
					</table>
		<br />	

	<table class="tab">
		<tr style="background-color:#f1f1f1;">
			<td colspan="5"><strong class="tr_title">(B) Book(s)</strong></td>
		</tr>
		<tr>
			<td width="5%"><strong>S. No.</strong></td>
			<td width="30%"><strong>Author(s) </strong></td>
			<td width="40%"><strong>Title of the Book</strong></td>
			<td width="20%"><strong>Year of Publication</strong></td>
			<td width="10%"><strong>ISBN</strong></td>
			
		</tr>
				<tr>
                <td>1</td>
                <td><?php echo $b1?></td>
			<td><?php echo $b2?></td>
			<td><?php echo $b3?></td>
			<td><?php echo $b4?></td>
		</tr>
				<tr>
                <td>2</td>
                <td><?php echo $b5?></td>
			<td><?php echo $b6?></td>
			<td><?php echo $b7?></td>
			<td><?php echo $b8?></td>
			
		</tr>
				
			</table>
	<br />

	<table class="tab">
		<tr style="background-color:#f1f1f1;">
			<td colspan="5"><strong class="tr_title">(C) Book Chapter(s)</strong></td>
		</tr>
		<tr>
			<td width="5%"><strong>S. No.</strong></td>
			<td width="30%"><strong>Author(s) </strong></td>
			<td width="40%"><strong>Title of the Book Chapter</strong></td>
			<td width="20%"><strong>Year of Publication</strong></td>
			<td width="10%"><strong>ISBN</strong></td>
			
		</tr>
        <tr>
                <td>1</td>
                <td><?php echo $bc1?></td>
			<td><?php echo $bc2?></td>
			<td><?php echo $bc3?></td>
			<td><?php echo $bc4?></td>
		</tr>
				<tr>
                <td>2</td>
                <td><?php echo $bc5?></td>
			<td><?php echo $bc6?></td>
			<td><?php echo $bc7?></td>
			<td><?php echo $bc8?></td>
			
		</tr>
			</table>
	<br />

	<span class="label">8. Google Scholar Link </span>
	<table class="tab">
		<tr style="background-color:#f1f1f1;">
			<td colspan="6"><strong class="tr_title">URL</strong></td>
		</tr>
		<tr>
			<td width="12%"><a href=<?php echo $bc4?>><?php echo $gs?></a></td>
		</tr>
		
	</table>
	<br />

	<span class="label">9. Membership of Professional Societies </span>
	<table class="tab">
		<tr style="background-color:#f1f1f1;">
			<td colspan="3"><strong class="tr_title">Details</strong></td>
		</tr>
		
		<tr>
			<td width="3%"><strong>S. No.</strong></td>
			<td width="20%"><strong>Name of the Professional Society</strong></td>
			<td width="20%"><strong>Membership Status (Lifetime/Annual)</strong></td>
		</tr>
				<tr>
			<td>1</td>
			<td><?php echo $pros1?></td>
			<td><?php echo $pros2?></td>
		</tr>
				<tr>
			<td>2</td>
			<td><?php echo $pros3?></td>
			<td><?php echo $pros4?></td>
		</tr>
			
			</table>
	<br />

	<span class="label">10. Professional Training </span>
	<table class="tab">
		<tr style="background-color:#f1f1f1;">
			<td colspan="5"><strong class="tr_title">Details</strong></td>
		</tr>
		
		<tr>
			<td width="5%"><strong>S. No.</strong></td>
			<td width="20%"><strong>Type of Training Received</strong></td>
			<td width="20%"><strong>Organisation</strong></td>
			<td width="10%"><strong>Year</strong></td>
			<td width="10%"><strong>Duration</strong></td>
		</tr>
        <tr>
			<td>1</td>
			<td><?php echo $prot1?></td>
			<td><?php echo $prot2?></td>
            <td><?php echo $prot3?></td>
			<td><?php echo $prot4?></td>
		</tr>
				<tr>
			<td>2</td>
			<td><?php echo $prot5?></td>
			<td><?php echo $prot6?></td>
            <td><?php echo $prot7?></td>
			<td><?php echo $prot8?></td>
		</tr>
			</table>
	<br />
	
	<span class="label">11. Award(s) and Recognition(s) </span>
	<table class="tab">
		<tr style="background-color:#f1f1f1;">
			<td colspan="4"><strong class="tr_title">Details</strong></td>
		</tr>
		
		<tr>
			<td width="5%"><strong>S. No.</strong></td>
			<td width="20%"><strong>Name of Award</strong></td>
			<td width="20%"><strong>Awarded By</strong></td>
			<td width="10%"><strong>Year</strong></td>
		</tr>
        <tr>
			<td>1</td>
			<td><?php echo $aw1?></td>
			<td><?php echo $aw2?></td>
            <td><?php echo $aw3?></td>
		</tr>
        <tr>
			<td>2</td>
			<td><?php echo $aw4?></td>
			<td><?php echo $aw5?></td>
            <td><?php echo $aw6?></td>
		</tr>
        <tr>
			<td>3</td>
			<td><?php echo $aw7?></td>
			<td><?php echo $aw8?></td>
            <td><?php echo $aw9?></td>
		</tr>
			</table>
	<br />

	<span class="label">12. Research Supervision</span>
	<table class="tab">
		<tr style="background-color:#f1f1f1;">
			<td colspan="6"><strong class="tr_title">(A) PhD Thesis Supervision</strong></td>
		</tr>
		<tr>
			<td width="5%"><strong>S. No.</strong></td>
			<td width="25%"><strong>Name of Student/Research Scholar</strong></td>
			<td width="30%"><strong>Title of Thesis</strong></td>
			<td width="10%"><strong>Role</strong></td>
			<td width="10%"><strong>Ongoing/Completed</strong></td>
			<td width="10%"><strong>Ongoing Since/ Year of Completion</strong></td>
		</tr>
        <tr>
			<td>1</td>
			<td><?php echo $rot1?></td>
			<td><?php echo $rot2?></td>
            <td><?php echo $rot3?></td>
			<td><?php echo $rot4?></td>
            <td><?php echo $rot5?></td>
		</tr>
				<tr>
			<td>2</td>
			<td><?php echo $rot6?></td>
			<td><?php echo $rot7?></td>
            <td><?php echo $rot8?></td>
			<td><?php echo $rot9?></td>
            <td><?php echo $rot10?></td>
		</tr>
			</table>
	<br />

	<table class="tab">
		<tr style="background-color:#f1f1f1;">
			<td colspan="6"><strong class="tr_title">(B) M.Tech/M.E./Master's Thesis Supervision</strong></td>
		</tr>
		
		<tr>
			<td width="5%"><strong>S. No.</strong></td>
			<td width="25%"><strong>Name of Student/Research Scholar</strong></td>
			<td width="30%"><strong>Title of Thesis</strong></td>
			<td width="10%"><strong>Role</strong></td>
			<td width="10%"><strong>Ongoing/Completed</strong></td>
			<td width="10%"><strong>Ongoing Since/ Year of Completion</strong></td>
		</tr>
        <tr>
			<td>1</td>
			<td><?php echo $ot1?></td>
			<td><?php echo $ot2?></td>
            <td><?php echo $ot3?></td>
			<td><?php echo $ot4?></td>
            <td><?php echo $ot5?></td>
		</tr>
				<tr>
			<td>2</td>
			<td><?php echo $ot6?></td>
			<td><?php echo $ot7?></td>
            <td><?php echo $ot8?></td>
			<td><?php echo $ot9?></td>
            <td><?php echo $ot10?></td>
		</tr>
		
	</table>
	<br />

	<table class="tab">
		<tr style="background-color:#f1f1f1;">
			<td colspan="6"><strong class="tr_title">(C) B.Tech/B.E./Bachelor's Project Supervision</strong></td>
		</tr>
		
		<tr>
			<td width="5%"><strong>S. No.</strong></td>
			<td width="25%"><strong>Name of Student</strong></td>
			<td width="30%"><strong>Title of Project</strong></td>
			<td width="10%"><strong>Role</strong></td>
			<td width="10%"><strong>Ongoing/Completed</strong></td>
			<td width="10%"><strong>Ongoing Since/ Year of Completion</strong></td>
		</tr>
        <tr>
			<td>1</td>
			<td><?php echo $t1?></td>
			<td><?php echo $t2?></td>
            <td><?php echo $t3?></td>
			<td><?php echo $t4?></td>
            <td><?php echo $t5?></td>
		</tr>
				<tr>
			<td>2</td>
			<td><?php echo $t6?></td>
			<td><?php echo $t7?></td>
            <td><?php echo $t8?></td>
			<td><?php echo $t9?></td>
            <td><?php echo $t10?></td>
		</tr>
	</table>
	<br />

	<span class="label">13. Sponsored Projects/ Consultancy Details </span>
	<table class="tab">
		<tr style="background-color:#f1f1f1;">
			<td colspan="7"><strong class="tr_title">(A) Sponsored Projects</strong></td>
		</tr>
		
		<tr>
			<td width="5%"><strong>S. No.</strong></td>
			<td width="20%"><strong>Sponsoring Agency</strong></td>
			<td width="20%"><strong>Title of Project</strong></td>
			<td width="10%"><strong>Sanctioned Amount</strong></td>
			<td width="10%"><strong>Period</strong></td>
			<td width="10%"><strong>Role</strong></td>
			<td width="10%"><strong>Status</strong></td>
		</tr>
        <tr>
			<td>1</td>
			<td><?php echo $s1?></td>
			<td><?php echo $s2?></td>
            <td><?php echo $s3?></td>
			<td><?php echo $s4?></td>
            <td><?php echo $s5?></td>
            <td><?php echo $s6?></td>

		</tr>
				<tr>
			<td>2</td>
			<td><?php echo $s7?></td>
			<td><?php echo $s8?></td>
            <td><?php echo $s9?></td>
			<td><?php echo $s10?></td>
            <td><?php echo $s11?></td>
            <td><?php echo $s12?></td>
		</tr>
			</table>
	<br />


	<table class="tab">
		<tr style="background-color:#f1f1f1;">
			<td colspan="7"><strong class="tr_title">(B) Consultancy Projects</strong></td>
		</tr>
		
		<tr>
			<td width="5%"><strong>S. No.</strong></td>
			<td width="20%"><strong>Organization</strong></td>
			<td width="20%"><strong>Title of Project</strong></td>
			<td width="15%"><strong>Amount of Grant</strong></td>
			<td width="15%"><strong>Period</strong></td>
			<td width="15%"><strong>Role</strong></td>
			<td width="15%"><strong>Status</strong></td>
		</tr>
        <tr>
			<td>1</td>
			<td><?php echo $c1?></td>
			<td><?php echo $c2?></td>
            <td><?php echo $c3?></td>
			<td><?php echo $c4?></td>
            <td><?php echo $c5?></td>
            <td><?php echo $c6?></td>

		</tr>
				<tr>
			<td>2</td>
			<td><?php echo $c7?></td>
			<td><?php echo $c8?></td>
            <td><?php echo $c9?></td>
			<td><?php echo $c10?></td>
            <td><?php echo $c11?></td>
            <td><?php echo $c12?></td>
		</tr>
			</table>
	<br />
	
	
		<span class="label">14. Significant research contribution and future plans</span>
	<table class="tab">
		<tr>
			<td style="text-align:justify;"><?php echo $lp1?>
</td>
		</tr>

	</table>
	<br />

	<span class="label">15. Significant teaching contribution and future plans</span>

	<table class="tab">
		
		<tr>
			<td style="text-align:justify;"><?php echo $lp2?></td>
		</tr>
	</table>
	<br />

	<span class="label">16. Any other relevant information</span>
	
	<table class="tab">
		<tr>
			<td><?php echo $lp3?></td>
		</tr>
	</table>
	<br />

	<span class="label">17. Professional Service as Reviewer/Editor etc.</span>
	<table class="tab">
		<tr>
			<td><?php echo $lp4?></td>
		</tr>
	</table>
	<br />

	<span class="label">18. Detailed List of Journal Publications<br />(Including Sr. No., Author's Names, Paper Title, Volume, Issue, Year, Page Nos., Impact Factor (if any), DOI, Status [Published/Accepted])</span>
	<table class="tab">
		<tr>
			<td><?php echo $lp5?>
</td>
		</tr>
	</table>
	<br />

	<span class="label">19. Detailed List of Conference Publications<br />(Including Sr. No.,  Author's Names, Paper Title, Name of the conference, Year, Page Nos., DOI [If any])</span>
	<table class="tab">
		<tr>
			<td><?php echo $lp6?></td>
		</tr>
	</table>
	<br />

	<span class="label">20. Reprints of 5 Best Research Papers-Attached </span>
	
	<br />
	<br />

	<span class="label">21. Check List of the documents attached with the online application </span><br />

	1. PHD Certificate<br />
	2. PG Certificate<br />
	3. UG Certificate<br />
	4. 12th/HSC/Diploma<br />
	5. 10th/SSC Certificate<br />
	6. 10 Years Post phd Experience Certificate <br />
	7. Any other relevant documents ( Experience Certificate, Award Certificate, etc.)
	<br />
	<br />


	<span class="label">22. Referees</span>
	<table class="tab">
		<tr style="background-color:#f1f1f1;">
			<td colspan="6"><strong class="tr_title">Details of Referees</strong></td>
		</tr>

		<tr>
			<!-- <td><strong>S. No.</strong></td> -->
			<td width="20%"><strong>Name</strong></td>
			<td width="20%"><strong>Position</strong></td>
			<td width="15%"><strong>Association with Referee</strong></td>
			<td width="15%"><strong>Institution/<br />Organization</strong></td>
			<td width="15%"><strong>E-mail</strong></td>
			<td width="15%"><strong>Contact No.</strong></td>
		</tr>
				
        <tr>
			<td><?php echo $rf1?></td>
			<td><?php echo $rf2?></td>
            <td><?php echo $rf3?></td>
			<td><?php echo $rf4?></td>
            <td><?php echo $rf5?></td>
            <td><?php echo $rf6?></td>

		</tr>
			 <tr>
			<td><?php echo $rf7?></td>
			<td><?php echo $rf8?></td>
            <td><?php echo $rf9?></td>
			<td><?php echo $rf10?></td>
            <td><?php echo $rf11?></td>
            <td><?php echo $rf12?></td>

		</tr>
				<tr>
			<td><?php echo $rf13?></td>
			<td><?php echo $rf14?></td>
            <td><?php echo $rf15?></td>
			<td><?php echo $rf16?></td>
            <td><?php echo $rf17?></td>
            <td><?php echo $rf18?></td>
		</tr>

			</table>
	<br />

	

	
	<span class="label">23. Final Declaration</span>

	<table class="tab">
		
		<td>                I hereby declare that I have carefully read and understood the instructions and particulars mentioned in the advertisment and this application form. I further declare that all the entries along with the attachments uploaded in this form are true to the best of my knowledge and belief</td>
	</table>
	<br />
	
		<img src="https://upload.wikimedia.org/wikipedia/commons/a/af/Ryan-Signature.png" style="height:50; "/><br />
	Signature of Applicant

	</div>
	
	
	<div id="non_print_area">
		<button onclick="window.location.href='login.php'">Logout </button>
		<button onclick="window.print();">Print Application</button> <br />
	</div>
	</div>

    <script>
        function logout(){
          fetch("/api/logout")
          .then(res=>{
            if(res.status==200){
              window.location.href="/login"
            }
          })
        }
      function fetchUD(){
        fetch("/api/usd",{
          method : "GET",
          credentials : "include"
        })
        .then(res=>{
          return res.json()
        })
        .then(data=>{
        //   console.log(data.first_name)
          document.getElementById("main_tit").innerHTML = data.first_name +" "+ data.last_name
          document.getElementById("adv_num").innerHTML = "Advertisement Number : " + data.adv_num
          document.getElementById("doa").innerHTML = "Date of Application : " + data.doa
          document.getElementById("post").innerHTML = "Post applied for : " + data.post
          document.getElementById("dept").innerHTML = "Department : " + data.dept
          document.getElementById("app_num").innerHTML = "Application Number : " + data.app_num
          document.getElementById("fname").innerHTML = data.first_name
          document.getElementById("mname").innerHTML = data.mid_name
          document.getElementById("lname").innerHTML = data.last_name
          document.getElementById("dob").innerHTML = $dob;
          document.getElementById("gender").innerHTML = data.gender
          document.getElementById("mstatus").innerHTML = data.mar_status
          document.getElementById("cast").innerHTML = data.category
          document.getElementById("nationality").innerHTML = data.nationality
          document.getElementById("id_proof").innerHTML = data.id_proof
          document.getElementById("father").innerHTML = data.fat_name
          document.getElementById("c_city").innerHTML = data.c_city
          document.getElementById("c_state").innerHTML = data.c_state
          document.getElementById("c_country").innerHTML = data.c_country
          document.getElementById("c_pin").innerHTML = data.c_pin
          document.getElementById("p_city").innerHTML = data.p_city
          document.getElementById("p_state").innerHTML = data.p_state
          document.getElementById("p_country").innerHTML = data.p_country
          document.getElementById("p_pin").innerHTML = data.p_pin
          document.getElementById("mob").innerHTML = data.mob
          document.getElementById("mob2").innerHTML = data.mob2
          document.getElementById("land_mob").innerHTML = data.land_mob
          document.getElementById("email").innerHTML = data.email
          document.getElementById("email2").innerHTML = data.email2
          document.getElementById("p_uni").innerHTML = data.p_uni
          document.getElementById("p_dept").innerHTML = data.p_dept
          document.getElementById("p_sup").innerHTML = data.p_sup
          document.getElementById("p_year").innerHTML = data.p_year
          document.getElementById("p_def").innerHTML = data.p_def
          document.getElementById("p_award").innerHTML = data.p_award
          document.getElementById("p_title").innerHTML = data.p_title
          document.getElementById("m_uni").innerHTML = data.m_uni
          document.getElementById("m_dept").innerHTML = data.m_dept
          document.getElementById("m_deg").innerHTML = data.m_deg
          document.getElementById("m_yoj").innerHTML = data.m_yoj
          document.getElementById("m_yoc").innerHTML = data.m_yoc
          document.getElementById("m_dur").innerHTML = data.m_dur
          document.getElementById("m_cgpa").innerHTML = data.m_cgpa
          document.getElementById("m_class").innerHTML = data.m_class
          document.getElementById("b_uni").innerHTML = data.b_uni
          document.getElementById("b_dept").innerHTML = data.b_dept
          document.getElementById("b_deg").innerHTML = data.b_deg
          document.getElementById("b_yoj").innerHTML = data.b_yoj
          document.getElementById("b_yoc").innerHTML = data.b_yoc
          document.getElementById("b_dur").innerHTML = data.b_dur
          document.getElementById("b_cgpa").innerHTML = data.b_cgpa
          document.getElementById("b_class").innerHTML = data.b_class
          document.getElementById("tw_school").innerHTML = data.tw_school
          document.getElementById("tw_year").innerHTML = data.tw_year
          document.getElementById("tw_grade").innerHTML = data.tw_grade
          document.getElementById("tw_class").innerHTML = data.tw_class
          document.getElementById("ten_school").innerHTML = data.ten_school
          document.getElementById("ten_year").innerHTML = data.ten_year
          document.getElementById("ten_grade").innerHTML = data.ten_grade
          document.getElementById("ten_class").innerHTML = data.ten_class
          document.getElementById("e_pos").innerHTML = data.e_pos
          document.getElementById("e_org").innerHTML = data.e_org
          document.getElementById("e_doj").innerHTML = data.e_doj
          document.getElementById("e_dol").innerHTML = data.e_dol
          document.getElementById("e_dur").innerHTML = data.e_dur
          document.getElementById("area_sp").innerHTML = data.area_sp
          document.getElementById("area_res").innerHTML = data.area_res
        })
      }
      window.onload = fetchUD
      </script>

	
<style>
@media print
{    
    #non_print_area
    {
        display: none !important;
    }
}
</style>
</body>
</html>