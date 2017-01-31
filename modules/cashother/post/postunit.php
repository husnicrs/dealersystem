<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "generate":
		$SQL = mysqli_query($con, "SELECT
				salesvehicle.idtrans AS idkey,
				salesvehicle.notrans,
				salesvehicle.datetrans,
				salesvehicle.cusname,
				salesvehicle.address,
				village.villagename,
				districts.districtsname,
				city.cityname,
				salesvehicle.vehiclemodel,
				salesvehicle.vehicletype,
				salesvehicle.vehiclejenis,
				salesvehicle.vehiclecolor,
				salesvehicle.mechineno,
				salesvehicle.rangkano,
				salesvehicle.`year`,
				salesvehicle.beanotice,
				salesvehicle.beaadm,
				salesvehicle.bbntotal,
				salesvehicle.samsatid,
				FORMAT(salesvehicle.beanotice,0) AS beanoticesw,
				FORMAT(salesvehicle.beaadm,0) AS beaadmsw,
				FORMAT(salesvehicle.bbntotal,0)  AS bbntotalsw
				FROM
				salesvehicle
				LEFT JOIN village ON salesvehicle.villageid = village.idvillage
				LEFT JOIN districts ON salesvehicle.districtsid = districts.iddistricts
				LEFT JOIN city ON city.idcity = salesvehicle.cityid
				WHERE salesvehicle.idtrans='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	
} 
?>
