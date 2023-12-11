<?php
require_once("../../connectionclass.php");
$obj = new Connectionclass();
$stname = $_POST["stname"];
$stphone = $_POST["stphone"];
$stmail = $_POST["stmail"];
$stgender = $_POST["stgender"];
$pid = $_POST["pid"];
$password = $_POST["password"];
$checkusername="select count(*) from login where username='$stmail'";
$resultcount=$obj->GetSingleData($checkusername);
if($resultcount>0)
{
 
   echo $obj->alert("Email ID Already exists","../add_staff.php");  
}
else{
$qry="insert into login(username,password,usertype)values('$stmail','$password','STAFF')"; 
$data=$obj->Manipulation($qry); 
$query = "INSERT INTO staff (st_name,st_phone,st_email,gender,fk_pid) VALUES ('$stname','$stphone','$stmail','$stgender',$pid)";

//echo $query;


$obj->Manipulation($query);

header("location: ../show_staff.php");
}
?>