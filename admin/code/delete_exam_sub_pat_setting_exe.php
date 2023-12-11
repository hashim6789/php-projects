<?php
require_once("../../connectionclass.php");
$epid = $_GET['epid'];
$pid = $_GET["pid"];
$cid = $_GET["cid"];
$exam_id = $_GET["exam_id"];

$query = "DELETE FROM examcourse_patternsetting WHERE exc_pat_id =$epid";
//echo$query; 

$obj = new Connectionclass();
$obj->Manipulation($query);

header("location: ../show_exam_sub_pat_setting.php?exam_id=$exam_id&pid=$pid&cid=$cid");
?>