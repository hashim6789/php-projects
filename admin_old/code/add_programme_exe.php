<?php
require_once("../../connectionclass.php");
$pname = $_POST["pname"];

$query = "INSERT INTO programme (p_name) VALUES ('$pname')";

$obj = new Connectionclass();

$obj->Manipulation($query);

header("location: ../show_programme.php");
?>