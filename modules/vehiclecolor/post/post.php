<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				vehiclecolor.idvehiclecolor AS idkey,
				vehiclecolor.vehiclecolorcode,
				vehiclecolor.vehiclecolorname,
				vehiclecolor.status
				FROM
				vehiclecolor
				WHERE vehiclecolor.idvehiclecolor='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO vehiclecolor SET vehiclecolorcode='".$_POST['vehiclecolorcode']."', vehiclecolorname='".$_POST['vehiclecolorname']."', status='".$_POST['status']."'");
		if($SQL){
			echo json_encode("OK");
		}
		break;
	case "edit":
		$SQL = mysqli_query($con, 
		"UPDATE vehiclecolor SET vehiclecolorcode='".$_POST['vehiclecolorcode']."', vehiclecolorname='".$_POST['vehiclecolorname']."', status='".$_POST['status']."' WHERE idvehiclecolor='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;		
		
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM vehiclecolor WHERE idvehiclecolor='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>
