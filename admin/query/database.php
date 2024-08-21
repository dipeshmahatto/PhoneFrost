<?php
// This is database connection query
$host="localhost";
$unamee="root";
$passwordd="";
$db_name="phonefrost";
$conn=mysqli_connect($host,$unamee,$passwordd,$db_name);
if(!$conn){
    echo "Connection Failed";
}
?>