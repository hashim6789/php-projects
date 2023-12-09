<?php
require_once("../../connectionclass.php");
$cid = $_GET['cid'];
$query = "DELETE FROM course WHERE c_id=$cid";

$obj = new Connectionclass();
$obj->Manipulation($query);

header("location: ../show_course.php");
?>