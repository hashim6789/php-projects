<?php
require_once("../../connectionclass.php");
$stcid = $_GET['stcid'];
$query = "DELETE FROM staff_course WHERE stc_id=$stcid";

//echo $query;

$obj = new Connectionclass();
$obj->Manipulation($query);

header("location: ../show_staff_course.php");
?>