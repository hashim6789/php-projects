<?php
require_once("../../connectionclass.php");
$obj = new Connectionclass();

$mpid = $_POST["mpid"];
$part = $_POST["part"];
$mark = $_POST["mark"];
$order = $_POST["order"];
$cid = $_POST["cid"];

$query = "SELECT fk_pid FROM course WHERE c_id=$cid";
$pid = $obj->GetSingleData($query);
//echo $pid;

$query = "UPDATE mark_pattern SET part = '$part',
              mark = $mark,
              m_order = $order,
              fk_cid = $cid ,
              fk_pid = $pid
              WHERE mpat_id = $mpid ";

//  echo $query;


$obj->Manipulation($query);

header("location: ../show_mark_pattern.php");
?>