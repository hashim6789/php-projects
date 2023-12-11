<?php
require_once("../../connectionclass.php");
$mpid = $_GET['mpid'];


//echo $query;

$obj = new Connectionclass();

$sql = "SELECT * FROM questions q JOIN mark_pattern mp ON (mp.mpat_id = q.fk_patid) WHERE mpat_id=$mpid";
$qns = $obj->GetTable($sql);

if(count($qns) == 0){
    $query = "DELETE FROM mark_pattern WHERE mpat_id=$mpid";
    $obj->Manipulation($query);
    header("location: ../show_mark_pattern.php");
}else{
	echo $obj->alert("Could not delete mark pattern, questions already exist in there","../show_mark_pattern.php");

}

?>

