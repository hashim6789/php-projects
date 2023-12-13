
<?php
session_start();
require_once("ConnectionClass.php");
$obj = new ConnectionClass();
$u = $_POST['username'];
$p = $_POST['password'];
$query = "SELECT* FROM login WHERE username='$u'AND password='$p'";
$exe = $obj->GetSingleRow($query);

if ($exe != null) {
	$_SESSION['username'] = $exe['username'];
	$_SESSION['usertype'] = $exe['usertype'];

	if ($exe['usertype'] == 'ADMIN') {

		header("location:admin/dashboard.php");
	} elseif ($exe['usertype'] == 'STAFF') {
		header("location:admin/dashboard_staff.php");
	}
} else {
	echo $obj->alert("invalid username or password","index1.html");
}

?>