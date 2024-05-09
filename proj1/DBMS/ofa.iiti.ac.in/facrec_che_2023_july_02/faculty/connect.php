<?php
$servername="localhost";
$username="root";
$password="";
$dbname="dbms";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
    echo "Connection Failed: ".mysqli_connect_error();
    exit();
}
else
?>