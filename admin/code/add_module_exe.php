<?php
require_once("../../connectionclass.php");
$obj = new Connectionclass();

$mname = $_POST["mname"];
$mno = $_POST["mno"];
$cid = $_POST["cid"];

$q = "SELECT COUNT(mod_name)  FROM course_module WHERE mod_name = '$mname'";
$count =$obj->GetSingleData($q);
//echo $count;

if($count == 0){

    $query = "INSERT INTO course_module (fk_cid,mod_name,mod_no) VALUES ($cid,'$mname',$mno)";
    //echo $query;
    $obj->Manipulation($query);
    header("location: ../show_module.php");
}else{
    echo $obj->alert("module already exist in there","../add_module.php");

}





$obj->Manipulation($query);

?>