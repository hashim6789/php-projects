<?php
require_once("../../connectionclass.php");

$pid = $_POST["pid"];
$cname = $_POST["cname"];
$ccode = $_POST["ccode"];
$sem = $_POST["sem"];

$query = "INSERT INTO course(fk_pid,c_name,c_code,sem_no) VALUES ($pid,'$cname','$ccode',$sem)";
//echo $query;

$obj = new Connectionclass();
$obj->Manipulation($query);

header("location: ../show_course.php");
?>