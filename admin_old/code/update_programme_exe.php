<?php
require_once("../../connectionclass.php");

$pid = $_POST["pid"];
$pname = $_POST["pname"];

$query = "UPDATE programme SET p_name = '$pname' WHERE p_id = $pid ";

$obj = new Connectionclass();
$obj->Manipulation($query);

header("location: ../show_programme.php");
?>