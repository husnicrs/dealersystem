<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				vehiclestock.idvehicle AS idkey,
				vehiclestock.dono,
				vehiclestock.seqno,
				vehiclestock.mechineno,
				vehiclestock.`year`,
				vehiclestock.vehicledate,
				vehiclestock.rangkano,
				vehicle.cc,
				vehicle.otr,
				FORMAT(vehicle.otr,0) AS otrsw,
				vehicle.vehlicetype AS vehicletype,
				vehicle.vehlicemodel AS vehiclemodel,
				vehicle.vehlicejenis,
				vehiclestock.vehiclecolor
				FROM
				vehiclestock
				LEFT JOIN channel ON vehiclestock.channelid = channel.idchannel
				LEFT JOIN vehicle ON vehiclestock.vehicletype = vehicle.vehlicetype
				WHERE vehiclestock.idvehicle='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	
} 
?>
