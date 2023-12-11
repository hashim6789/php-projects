<?php
require_once("../../connectionclass.php");
$obj = new Connectionclass();
$pname = $_POST["pname"];

$q = "SELECT COUNT(p_name)  FROM programme WHERE p_name = '$pname'";
$count =$obj->GetSingleData($q);
//echo $count;

if($count == 0){

    $query = "INSERT INTO programme (p_name) VALUES ('$pname')";
    $obj->Manipulation($query);
    header("location: ../show_programme.php");
}else{
    echo $obj->alert("programme already exist in there","../add_programme.php");

}





?>