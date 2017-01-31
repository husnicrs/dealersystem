<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				matusedtype.idmatusedtype AS idkey,
				matusedtype.matusedtypename,
				matusedtype.status
				FROM
				matusedtype
				WHERE matusedtype.idmatusedtype='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;	
		
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO matusedtype SET matusedtypename='".$_POST['matusedtypename']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE matusedtype SET matusedtypename='".$_POST['matusedtypename']."', status='".$_POST['status']."' WHERE idmatusedtype='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM matusedtype WHERE idmatusedtype='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>
