<?php
require_once("../../connectionclass.php");
$obj = new Connectionclass();
$stid = $_GET['stid'];

$query = "select st_email from staff where st_id = $stid";
//echo $query;
$email =$obj->GetSingleData($query);

$query = "DELETE FROM login WHERE username='$email'";
//echo $query;
$obj->Manipulation($query);

$query = "DELETE FROM staff WHERE st_id=$stid";
//echo $query;
$obj->Manipulation($query);



 header("location: ../show_staff.php");
?>