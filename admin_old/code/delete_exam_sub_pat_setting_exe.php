<?php
require_once("../../connectionclass.php");
$epid = $_GET['epid'];
$query = "DELETE FROM examcourse_patternsetting WHERE exc_pat_id =$epid";
//echo$query; 

$obj = new Connectionclass();
$obj->Manipulation($query);

header("location: ../show_exam_sub_pat_setting.php");
?>