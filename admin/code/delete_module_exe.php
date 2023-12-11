<?php
require_once("../../connectionclass.php");
$obj = new Connectionclass();
$smid = $_GET['cmid'];
$sql = "SELECT * FROM questions WHERE fk_modid = $smid";
$qns = $obj->GetTable($sql);

if(count($qns) == 0){
    $query = "DELETE FROM course_module WHERE mod_id=$smid";
    $obj->Manipulation($query);
    header("location: ../show_module.php");
}else{
	echo $obj->alert("Could not delete module, questions already exist in there","../show_module.php");

}



?>