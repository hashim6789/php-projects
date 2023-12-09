<?php
require_once("../../connectionclass.php");
$qnid = $_POST["qnid"];
$qn = $_POST["qn"];
$patid = $_POST["patid"];
$cid = $_POST["cid"];
$cmid = $_POST["cmid"];


$query = "UPDATE questions SET qn = '$qn',fk_modid = $cmid,fk_patid = $patid WHERE qn_id = $qnid ";
//echo $query;

$obj = new Connectionclass();
$obj->Manipulation($query);
header("location: ../show_questions.php?cmid=$cmid&cid=$cid");
?>