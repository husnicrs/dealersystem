<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
					salesvehicle.idtrans AS idkey,
					salesvehicle.notrans,
					salesvehicle.datetrans,
					salesvehicle.cusname,
					salesvehicle.address,
					CONCAT(
						salesvehicle.vehicletype,
						' - ',
						salesvehicle.vehiclemodel,
						' - ',
						salesvehicle.mechineno,
						' - ',
						salesvehicle.rangkano
					) AS unit
				FROM
					salesvehicle
				WHERE salesvehicle.idtrans='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	
} 
?>
