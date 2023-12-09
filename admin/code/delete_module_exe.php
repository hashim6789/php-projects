<?php
require_once("../../connectionclass.php");
$smid = $_GET['smid'];
$query = "DELETE FROM course_module WHERE mod_id=$smid";

$obj = new Connectionclass();
$obj->Manipulation($query);

header("location: ../show_module.php");
?>