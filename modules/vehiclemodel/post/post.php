<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				vehiclemodel.idvehiclemodel AS idkey,
				vehiclemodel.vehiclemodelname,
				vehiclemodel.status,
				vehiclegroup.vehiclegroupname,
				vehiclemodel.vehiclegroupid,
				vehiclemodel.vehicletypeid,
				vehicletype.vehicletypename
				FROM
				vehiclemodel
				LEFT JOIN vehiclegroup ON vehiclemodel.vehiclegroupid = vehiclegroup.idvehiclegroup
				LEFT JOIN vehicletype ON vehiclemodel.vehicletypeid = vehicletype.idvehicletype
				WHERE vehiclemodel.idvehiclemodel='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO vehiclemodel SET vehiclemodelname='".$_POST['vehiclemodelname']."', vehiclegroupid='".$_POST['vehiclegroupid']."', 
		vehicletypeid='".$_POST['vehicletypeid']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE vehiclemodel SET vehiclemodelname='".$_POST['vehiclemodelname']."', vehiclegroupid='".$_POST['vehiclegroupid']."', 
		vehicletypeid='".$_POST['vehicletypeid']."', status='".$_POST['status']."' WHERE idvehiclemodel='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;		
		
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM vehiclemodel WHERE idvehiclemodel='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>
