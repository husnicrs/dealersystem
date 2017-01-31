<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				contacttype.idcontacttype AS idkey,
				contacttype.contacttypename,
				contacttype.status
				FROM
				contacttype
				WHERE contacttype.idcontacttype='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;	
		
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO contacttype SET contacttypename='".$_POST['contacttypename']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE contacttype SET contacttypename='".$_POST['contacttypename']."', status='".$_POST['status']."' WHERE idcontacttype='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM contacttype WHERE idcontacttype='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>
