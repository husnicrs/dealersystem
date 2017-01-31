<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				vehiclegroup.idvehiclegroup AS idkey,
				vehiclegroup.vehiclegroupname,
				vehiclegroup.status
				FROM
				vehiclegroup
				WHERE vehiclegroup.idvehiclegroup='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO vehiclegroup SET vehiclegroupname='".$_POST['vehiclegroupname']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE vehiclegroup SET vehiclegroupname='".$_POST['vehiclegroupname']."', status='".$_POST['status']."' WHERE idvehiclegroup='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;		
		
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM vehiclegroup WHERE idvehiclegroup='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>
