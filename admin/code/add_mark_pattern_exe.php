<?php
require_once("../../connectionclass.php");
$obj = new Connectionclass();

$cid = $_POST['cid'];
$part = $_POST['part'];
$mark = $_POST["mark"];
$order = $_POST["order"];

$query = "SELECT fk_pid FROM course WHERE c_id=$cid";
$pid = $obj->GetSingleData($query);
//echo $pid;

$query = "INSERT INTO mark_pattern (part,mark,m_order,fk_cid,fk_pid) VALUES ('$part',$mark,$order,$cid,$pid)";
$obj->Manipulation($query);
//echo $query;

header("location: ../show_mark_pattern.php");
?>