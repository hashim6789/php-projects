<?php
require_once("../../connectionclass.php");


$cid = $_POST["cid"];
$stcid = $_POST["stcid"];
$query = "UPDATE staff_course SET fk_cid = $cid WHERE stc_id = $stcid";
//echo $query;

$obj = new Connectionclass();
$obj->Manipulation($query);

header("location: ../show_staff_course.php");
?>