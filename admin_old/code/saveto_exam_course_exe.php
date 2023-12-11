<?php
require_once("../../connectionclass.php");
$obj = new Connectionclass();

$cid = $_POST["cid"];
$exid = $_POST["exid"];
$status = "NOT PUBLISHED";
$sem = $_POST["sem"];

foreach ($cid as $sub) {

    $sql = "SELECT COUNT(*) FROM exam_course WHERE fk_exid = $exid AND fk_cid = $sub";
    //echo $sql;
    $count = $obj->GetSingleData($sql);

    if ($count == 0) {
        $query = "INSERT INTO exam_course(fk_exid,exc_status,fk_cid) VALUES ($exid,'$status',$sub)";
        //echo $query;


        $obj->Manipulation($query);
    }

}
$query = "UPDATE examination SET ex_status = 'PUBLISHED' WHERE ex_id = $exid";
//echo $query;
$obj->Manipulation($query);
header("location:../saveto_exam_course.php?exid=$exid");

?>