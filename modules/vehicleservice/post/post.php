<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				vehicleservice.idvehicleservice AS idkey,
				vehicleservice.unitprice AS unitprice,
				vehicleservice.vehiclegroupmodel,
				vehicleservice.status,
				vehicleservice.vehliceservicetype,
				vehicleservice.vehicleservicename
				FROM
				vehicleservice
				WHERE vehicleservice.idvehicleservice='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO vehicleservice SET vehicleservicename='".$_POST['vehicleservicename']."', vehliceservicetype='".$_POST['vehliceservicetype']."', vehiclegroupmodel='".$_POST['vehiclegroupmodel']."', unitprice='".$_POST['unitprice']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE vehicleservice SET vehicleservicename='".$_POST['vehicleservicename']."',  vehliceservicetype='".$_POST['vehliceservicetype']."', vehiclegroupmodel='".$_POST['vehiclegroupmodel']."', unitprice='".$_POST['unitprice']."', status='".$_POST['status']."' WHERE idvehicleservice='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;		
		
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM vehicleservice WHERE idvehicleservice='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>
