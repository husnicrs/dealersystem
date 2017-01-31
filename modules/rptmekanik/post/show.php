<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','employeename','nik','positionname','qtyunit','qtykpb','qtyc2','qtycs','qtyls','qtyorplus','qtyhr','qtylr','qtyservice'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				1 AS idkey,
				employee.employeename,
				employee.nik,
				position.positionname,
				servicekpb.qtykpb, 
				servicec2.qtyc2,
				servicecs.qtycs,
				servicels.qtyls,
				serviceorplus.qtyorplus, 
				IFNULL(servicekpb.qtykpb,0)+IFNULL(servicec2.qtyc2,0)+IFNULL(servicecs.qtycs,0)+IFNULL(servicels.qtyls,0)+IFNULL(serviceorplus.qtyorplus,0) AS qtyunit,
				servicehr.qtyhr,
				servicelr.qtylr,
				totalservice.qtyservice
				FROM
				employee
				INNER JOIN position ON employee.positionid = position.idposition
				
				LEFT JOIN 
				
				(SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtykpb
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice,
				users
				WHERE vehicleservice.vehliceservicetype="KPB" AND users.username="'.$user.'" AND salesservice.datetrans BETWEEN users.begindate AND users.enddate
				GROUP BY 
				salesservice.mekanikid) AS servicekpb ON employee.idemployee=servicekpb.mekanikid
				
				LEFT JOIN 
				
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtyc2
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice,
				users
				WHERE vehicleservice.vehliceservicetype="Claim"  AND users.username="'.$user.'" AND salesservice.datetrans BETWEEN users.begindate AND users.enddate
				GROUP BY 
				salesservice.mekanikid
				
				) AS servicec2 ON employee.idemployee=servicec2.mekanikid
				
				
				LEFT JOIN 
				
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtycs
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice,
				users
				WHERE vehicleservice.vehliceservicetype="QS" AND users.username="'.$user.'" AND salesservice.datetrans BETWEEN users.begindate AND users.enddate
				GROUP BY 
				salesservice.mekanikid
				
				) AS servicecs ON employee.idemployee=servicecs.mekanikid
				
				LEFT JOIN 
				
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtyls
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice,
				users
				WHERE vehicleservice.vehliceservicetype="LS" AND users.username="'.$user.'" AND salesservice.datetrans BETWEEN users.begindate AND users.enddate
				GROUP BY 
				salesservice.mekanikid
				
				) AS servicels ON employee.idemployee=servicels.mekanikid
				
				
				
				LEFT JOIN 
				
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtyorplus
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice,
				users
				WHERE vehicleservice.vehliceservicetype="OR+" AND users.username="'.$user.'" AND salesservice.datetrans BETWEEN users.begindate AND users.enddate
				GROUP BY 
				salesservice.mekanikid
				
				) AS serviceorplus ON employee.idemployee=serviceorplus.mekanikid
				
				
				
				LEFT JOIN 
				
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtylr
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice,
				users
				WHERE vehicleservice.vehliceservicetype="LR" AND users.username="'.$user.'" AND salesservice.datetrans BETWEEN users.begindate AND users.enddate
				GROUP BY 
				salesservice.mekanikid
				
				) AS servicelr ON employee.idemployee=servicelr.mekanikid
				
				
				LEFT JOIN 
				
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtyhr
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice,
				users
				WHERE vehicleservice.vehliceservicetype="HR" AND users.username="'.$user.'" AND salesservice.datetrans BETWEEN users.begindate AND users.enddate
				GROUP BY 
				salesservice.mekanikid
				
				) AS servicehr ON employee.idemployee=servicehr.mekanikid
				
				
				LEFT JOIN
				(
				SELECT
				salesservice.mekanikid,
				Count(salesservicedet2.idtransdet) AS qtyservice
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice,
				users
				WHERE users.username="'.$user.'" AND salesservice.datetrans BETWEEN users.begindate AND users.enddate
				GROUP BY 
				salesservice.mekanikid
				) AS totalservice ON employee.idemployee=totalservice.mekanikid 
				
				WHERE position.positionname="Mekanik" ) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['employeename'], $aRow['nik'], $aRow['positionname'], $aRow['qtyunit'], $aRow['qtykpb'], $aRow['qtyc2'], $aRow['qtycs'], 
		$aRow['qtyls'], $aRow['qtyorplus'], $aRow['qtylr'], $aRow['qtyhr'], $aRow['qtyservice']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>