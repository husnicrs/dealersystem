<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
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
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO userauthorized SET menuid='".$_POST['menuid']."', userid='".$_POST['userid']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE userauthorized SET menuid='".$_POST['menuid']."', userid='".$_POST['userid']."' WHERE iduserautorized='".$_POST['iduserautorized']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM userauthorized WHERE iduserautorized='".$_POST['iduserautorized']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>
