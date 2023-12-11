<?php
require_once("../../connectionclass.php");
$qs = $_POST["qs"];
$patid = $_POST["patid"];
$cid = $_POST["cid"];
$cmid = $_POST["cmid"];


$query = "INSERT INTO questions (fk_modid,qn,fk_patid) VALUES ($cmid,'$qs',$patid)";
//echo $query;

$obj = new Connectionclass();
$obj->Manipulation($query);

header("location: ../show_questions.php?cmid=$cmid&cid=$cid");
?>