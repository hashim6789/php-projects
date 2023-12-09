<?php
require_once("../../connectionclass.php");
$stname = $_POST["stname"];
$stphone = $_POST["stphone"];
$stmail = $_POST["stmail"];
$stgender = $_POST["stgender"];
$pid = $_POST["pid"];
$query = "INSERT INTO staff (st_name,st_phone,st_email,gender,fk_pid) VALUES ('$stname','$stphone','$stmail','$stgender',$pid)";

//echo $query;

$obj = new Connectionclass();
$obj->Manipulation($query);

header("location: ../show_staff.php");
?>