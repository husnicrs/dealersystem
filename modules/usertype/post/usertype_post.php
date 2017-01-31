<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				usertype.idusertype AS idkey,
				usertype.usertypename,
				usertype.stlogtime,
				usertype.fnlogtime
				FROM
				usertype
				WHERE usertype.idusertype='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO usertype SET usertypename='".$_POST['usertypename']."', stlogtime='".$_POST['stlogtime']."', fnlogtime='".$_POST['fnlogtime']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE usertype SET usertypename='".$_POST['usertypename']."', stlogtime='".$_POST['stlogtime']."', fnlogtime='".$_POST['fnlogtime']."', status='".$_POST['status']."' WHERE idusertype='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM usertype WHERE idusertype='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>
