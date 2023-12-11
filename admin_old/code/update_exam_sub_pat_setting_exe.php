<?php
require_once("../../connectionclass.php");
$obj = new Connectionclass();

$epid = $_POST["epid"];
$exid = $_POST["exid"];
$patid = $_POST["patid"];
$tqns = $_POST["tqns"];

$query = "UPDATE examcourse_patternsetting SET total_qns = $tqns,
                                                    fk_mpat_id = $patid,
                                                    fk_exid = $exid
                                                    WHERE exc_pat_id = $epid ";
//echo $query;

$obj->Manipulation($query);

header("location: ../show_exam_sub_pat_setting.php");
?>