<?php
require_once("../../connectionclass.php");

$cmid = $_POST["cmid"];
$cid = $_POST["cid"];
$mno = $_POST["mno"];
$mname = $_POST["mname"];


$query = "UPDATE course_module SET fk_cid = $cid,mod_name = '$mname', mod_no = $mno WHERE mod_id = $cmid ";
//echo $query;

$obj = new Connectionclass();
$obj->Manipulation($query);

header("location: ../show_module.php");
?>