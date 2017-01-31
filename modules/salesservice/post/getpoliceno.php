<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT DERIVEDTBL.bpkbname,
									DERIVEDTBL.address,
									DERIVEDTBL.vehiclemodel,
									DERIVEDTBL.vehicletype,
									DERIVEDTBL.datetrans,
									DERIVEDTBL.mechineno,
									DERIVEDTBL.rangkano,
									DERIVEDTBL.policeno,
									DERIVEDTBL.vehiclejenis AS vahiclejenis,
									DERIVEDTBL.telpno
									FROM
									(SELECT
									salesservice.customername AS bpkbname,
									salesservice.address,
									salesservice.vehiclemodel,
									salesservice.vahicletype AS vehicletype,
									salesservice.datetrans,
									salesservice.mechineno,
									salesservice.rangka AS rangkano,
									salesservice.policeno,
									salesservice.vahiclejenis AS vehiclejenis,
									salesservice.telpno
									FROM
									salesservice

									UNION ALL
									SELECT
									salesvehicle.bpkbname,
									salesvehicle.address,
									salesvehicle.vehiclemodel,
									salesvehicle.vehicletype,
									salesvehicle.datetrans,
									salesvehicle.mechineno,
									salesvehicle.rangkano,
									salesvehicle.policeno,
									salesvehicle.vehiclejenis,
									'' AS telpno
									FROM
									salesvehicle) AS DERIVEDTBL
									WHERE DERIVEDTBL.policeno='".$_POST['policeno']."'
									GROUP BY
									DERIVEDTBL.bpkbname,
									DERIVEDTBL.address,
									DERIVEDTBL.vehiclemodel,
									DERIVEDTBL.vehicletype,
									DERIVEDTBL.datetrans,
									DERIVEDTBL.mechineno,
									DERIVEDTBL.rangkano,
									DERIVEDTBL.policeno,
									DERIVEDTBL.vehiclejenis,
									DERIVEDTBL.telpno");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;	
} 
?>
