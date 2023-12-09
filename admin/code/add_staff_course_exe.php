<?php
require_once("../../connectionclass.php");

$obj = new Connectionclass();

$stid = $_POST['stid'];
$cid = $_POST['cid'];
//var_dump($cid);

foreach ($cid as $i) {
   $query = "INSERT INTO staff_course (fk_stid,fk_cid) VALUES ($stid,$i)";
   $obj->Manipulation($query);
   // echo $query;

}

header("location: ../show_staff_course.php");
?>