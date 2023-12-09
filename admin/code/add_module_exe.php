<?php
require_once("../../connectionclass.php");
$obj = new Connectionclass();

$mname = $_POST["mname"];
$mno = $_POST["mno"];
$cid = $_POST["cid"];
$query = "INSERT INTO course_module (fk_cid,mod_name,mod_no) VALUES ($cid,'$mname',$mno)";
//echo $query;

$obj->Manipulation($query);

header("location: ../show_module.php");
?>