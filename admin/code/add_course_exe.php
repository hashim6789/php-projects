<?php
require_once("../../connectionclass.php");
$obj = new Connectionclass();

$pid = $_POST["pid"];
$cname = $_POST["cname"];
$ccode = $_POST["ccode"];
$sem = $_POST["sem"];


$q = "SELECT COUNT(c_name)  FROM course WHERE c_name = '$cname'";
$count =$obj->GetSingleData($q);
//echo $count;

if($count == 0){

    $query = "INSERT INTO course(fk_pid,c_name,c_code,sem_no) VALUES ($pid,'$cname','$ccode',$sem)";
    //echo $query;
    $obj->Manipulation($query);
    header("location: ../show_course.php");
}else{
    echo $obj->alert("course already exist in there","../add_course.php");

}



$query = "INSERT INTO course(fk_pid,c_name,c_code,sem_no) VALUES ($pid,'$cname','$ccode',$sem)";
//echo $query;



?>