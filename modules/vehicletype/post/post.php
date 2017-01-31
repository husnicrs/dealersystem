<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				vehicletype.idvehicletype AS idkey,
				vehicletype.vehicletypename,
				vehicletype.status
				FROM
				vehicletype
				WHERE vehicletype.idvehicletype='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO vehicletype SET vehicletypename='".$_POST['vehicletypename']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE vehicletype SET vehicletypename='".$_POST['vehicletypename']."', status='".$_POST['status']."' WHERE idvehicletype='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;		
		
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM vehicletype WHERE idvehicletype='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>
