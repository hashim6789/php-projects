<?php
require_once("../../connectionclass.php");
$obj = new Connectionclass();
$pid = $_POST["pid"];
$pname = $_POST["pname"];
$sql ="select * from programme where p_name='$pname' and p_id != $pid";
$pgm= $obj->GetSingleRow($sql);
if($pgm ==null){
    $query = "UPDATE programme SET p_name = '$pname' WHERE p_id = $pid ";


    $obj->Manipulation($query);
    header("location: ../show_programme.php");
}
else{
    echo $obj->alert("Program name already exist","../edit_programme.php?pid=$pid");
}



?>