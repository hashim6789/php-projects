<?php
require_once("../../connectionclass.php");

$stid = $_POST["stid"];
$pid = $_POST["pid"];
$stname = $_POST["stname"];
$stphone = $_POST["stphone"];
$stmail = $_POST["stmail"];
$stgender = $_POST["stgender"];

$query = "UPDATE staff SET fk_pid = $pid,
              st_name = '$stname',
              st_phone = '$stphone',
              st_email = '$stmail',
              gender = '$stgender'
              WHERE st_id = $stid ";

//echo $query;

$obj = new Connectionclass();
$obj->Manipulation($query);

header("location: ../show_staff.php");
?>