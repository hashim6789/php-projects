<?php
require_once("../../connectionclass.php");
$stid = $_GET['stid'];
$query = "DELETE FROM staff WHERE st_id=$stid";

//echo $query;

$obj = new Connectionclass();
$obj->Manipulation($query);

header("location: ../show_staff.php");
?>