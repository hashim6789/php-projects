<?php
require_once("../../connectionclass.php");

$cid = $_POST["cid"];
$pid = $_POST["pid"];
$cname = $_POST["cname"];
$ccode = $_POST["ccode"];
$sem = $_POST["sem"];

$query = "UPDATE course SET fk_pid = $pid,
              c_name = '$cname',
              c_code = '$ccode',
              sem_no = $sem 
              WHERE c_id = $cid ";

// echo $query;

$obj = new Connectionclass();
$obj->Manipulation($query);

header("location: ../show_course.php");
?>