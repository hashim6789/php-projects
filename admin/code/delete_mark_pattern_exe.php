<?php
require_once("../../connectionclass.php");
$mpid = $_GET['mpid'];
$query = "DELETE FROM mark_pattern WHERE mpat_id=$mpid";

//echo $query;

$obj = new Connectionclass();
$obj->Manipulation($query);

header("location: ../show_mark_pattern.php");
?>