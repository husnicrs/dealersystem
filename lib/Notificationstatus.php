<?php
include_once 'Database.php';
switch ($_POST['notiftype']) {
	case "notifstatus":
		$SQL = mysqli_query($con, 
		"UPDATE notificationstatus SET status=1 WHERE username='".$_POST['notifusername']."' AND status=0");
		if($SQL){
			echo json_encode("OK");
		}
		break;
} 
?>
