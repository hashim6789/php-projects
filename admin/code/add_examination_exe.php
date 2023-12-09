<?php
require_once("../../connectionclass.php");
$title = $_POST["title"];
$pid = $_POST["pid"];
$year = $_POST["year"];
$sem = $_POST["sem"];

$query = "INSERT INTO examination (ex_title,fk_pid,ex_year,semester) VALUES ('$title',$pid,'$year',$sem)";
//echo $query;

$obj = new Connectionclass();
$obj->Manipulation($query);

header("location: ../show_examination.php");
?>