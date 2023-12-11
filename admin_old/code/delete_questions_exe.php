<?php
require_once("../../connectionclass.php");
$qnid = $_GET['qnid'];
$cmid = $_GET['cmid'];
$cid = $_GET['cid'];
$query = "DELETE FROM questions WHERE qn_id=$qnid";
echo $query;

$obj = new Connectionclass();
$obj->Manipulation($query);

header("location: ../show_questions.php?cmid=$cmid&cid=$cid");
?>