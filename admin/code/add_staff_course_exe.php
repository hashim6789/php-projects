<?php
require_once("../../connectionclass.php");

$obj = new Connectionclass();

$stid = $_POST['stid'];
$cid = $_POST['cid'];
//var_dump($cid);

foreach($cid as $i){
   $q = "SELECT COUNT(fk_stid)  FROM staff_course WHERE fk_stid = $stid AND fk_cid = $i";
   $count =$obj->GetSingleData($q);
   //echo $count;

   if($count == 0){

      $query = "INSERT INTO staff_course (fk_stid,fk_cid) VALUES ($stid,$i)";
      $obj->Manipulation($query);
      header("location: ../show_staff_course.php");
  }else{
      echo $obj->alert("staff course already exist in there","../add_staff_course.php");
  }
}
?>