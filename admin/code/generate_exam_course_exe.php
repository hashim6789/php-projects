<?php

require_once("../../connectionclass.php");
$obj = new Connectionclass();

$excid =$_REQUEST['excid'];

$sql ="select * from exam_course where ex_cid=$excid";

 $exam_subject = $obj->GetSingleRow($sql);

 if($exam_subject!=null){

    $cid= $exam_subject['fk_cid'];
    $exam_id= $exam_subject['fk_exid'];
    
 

echo $query = "SELECT part,mark,total_qns,mp.fk_cid FROM examcourse_patternsetting ep JOIN mark_pattern mp ON (ep.fk_mpat_id=mp.mpat_id) JOIN exam_course ec ON (ec.fk_cid = mp.fk_cid ) where ec.fk_exid=$exam_id and mp.fk_cid=$cid ";
$data = $obj->GetTable($query);
var_dump($data);


 }



die;
$obj = new Connectionclass();
$excid = $_GET["excid"];

$query = "SELECT * FROM exam_course WHERE ex_cid = $excid";
//echo $query;
$data1 = $obj->GetSingleRow($query);
//var_dump($data1);
$cid = $data1["fk_cid"];
$exid = $data1["fk_exid"];
// echo $cid;
// echo $exid;

$query = "SELECT * FROM mark_pattern WHERE fk_cid = $cid ORDER BY part";
//echo $query;
$data2 = $obj->GetTable($query);
//var_dump($data2);

foreach ($data2 as $row) {
    $id = $row["mpat_id"];
    $query = "SELECT * FROM examcourse_patternsetting  WHERE fk_mpat_id = $id";
    //echo $query;
    $data3 = $obj->GetSingleRow($query);
    $excpatid[] = $data3["exc_pat_id"];
    $totalqn[] = $data3["total_qns"];
}
//  var_dump($excpatid);
//  var_dump($totalqn);

$query = "SELECT * FROM course_module WHERE fk_cid = $cid";
//echo $query;
$data4 = $obj->GetTable($query);
//var_dump($data4);
foreach ($data4 as $row) {
    $modid[] = $row["mod_id"];
}
//var_dump($modid);


foreach ($modid as $row) {
    $query = "SELECT * FROM questions WHERE fk_modid = $row";
    //echo $query;
    $data5 = $obj->GetTable($query);
    //var_dump($data5);
    foreach ($data5 as $row) {
        $qnid[] = $row["qn_id"];
        $qn[] = $row["qn"];
    }
}
//var_dump($qnid);





?>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>QUESTION </th>
    </tr>
    <?php
    $x = 1;
    foreach ($qn as $row) {
        ?>

        <tr>
            <td>
                <?php echo $x++ ?>
            </td>
            <td>
                <?php echo $row ?>
            </td>
        </tr>
    <?php } ?>
</table>