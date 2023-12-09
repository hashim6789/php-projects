<?php
require_once("../../connectionclass.php");


$exid = $_POST["exid"];
$title = $_POST["title"];
$year = $_POST["year"];
$pid = $_POST["pid"];
$sem = $_POST["sem"];
$query = "UPDATE examination SET ex_title = '$title',
                                     fk_pid=$pid,
                                     ex_year='$year',
                                     semester = $sem
                                      WHERE ex_id = $exid";
//echo $query;

$obj = new Connectionclass();
$obj->Manipulation($query);

header("location: ../show_examination.php");
?>