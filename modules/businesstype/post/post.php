<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				businesstype.idbusinesstype AS idkey,
				businesstype.businesstypename
				FROM
				businesstype
				WHERE businesstype.idbusinesstype='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO businesstype SET businesstypename='".$_POST['businesstypename']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE businesstype SET businesstypename='".$_POST['businesstypename']."', status='".$_POST['status']."' WHERE idbusinesstype='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM businesstype WHERE idbusinesstype='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>
