<?php
require_once("../../connectionclass.php");
$exid = $_GET['exid'];
$query = "DELETE FROM examination WHERE ex_id =$exid";
//echo$query; 

$obj = new Connectionclass();
$obj->Manipulation($query);
header("location: ../show_examination.php");
?>