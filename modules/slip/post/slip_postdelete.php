<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['typedelete']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				userauthorized.iduserautorized,
				userauthorized.menuid,
				userauthorized.userid
				FROM
				userauthorized
				WHERE userauthorized.iduserautorized='".$_POST['iduserautorized']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM userauthorized WHERE iduserautorized='".$_POST['iduserautorizeddelete']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>
