<?php
require_once("../../connectionclass.php");
    
    $patid = $_POST["patid"];
    $tqns = $_POST["tqns"];
    $exid = $_POST["exid"];
    $pid = $_POST["pid"];
    $cid = $_POST["cid"];


    $query = "INSERT INTO examcourse_patternsetting(fk_mpat_id,total_qns,fk_exid) VALUES ($patid,$tqns,$exid)";
    //echo $query;

    $obj = new Connectionclass();
    $obj->Manipulation($query);

    header("location: ../show_exam_sub_pat_setting.php?pid=$pid&cid=$cid");
?>