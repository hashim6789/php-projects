<?php
require_once("../../connectionclass.php");
$pid = $_GET['pid'];
$query = "DELETE FROM programme WHERE p_id=$pid";

$obj = new Connectionclass();
$obj->Manipulation($query);

header("location: ../show_programme.php");
?>