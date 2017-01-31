<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$descstatus = "CASE WHEN salesvehicle.arstatus = 1 THEN 'Y' ELSE 'N' END";
	$colorstatus = "CASE WHEN salesvehicle.arstatus = 1 THEN 'green' ELSE 'red' END";
	$aColumns = array( 'idkey','cusname','leasing','vehiclemodel','datetrans','arbillingdate','colorstatus','descstatus'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				salesvehicle.idtrans AS idkey,
				salesvehicle.codetrans,
				salesvehicle.notrans,
				DATE_FORMAT(salesvehicle.datetrans,"%d/%m/%Y") AS datetrans,
				DATE_FORMAT(salesvehicle.arbillingdate,"%d/%m/%Y") AS arbillingdate,
				paytype.paytypename,
				'.$colorstatus.' AS colorstatus,
				'.$descstatus.' AS descstatus,
				salesvehicle.cusname,
				salesvehicle.policeno,
				salesvehicle.vehiclemodel,
				salesvehicle.vehicletype,
				salesvehicle.noktp,
				salesvehicle.dono,
				salesvehicle.spkno,
				salesvehicle.leasing
				FROM
				salesvehicle
				LEFT JOIN paytype ON salesvehicle.paytypeid = paytype.idpaytype
				INNER JOIN users ON salesvehicle.leasing = CASE
				WHEN salesvehicle.dpjurnal=1 AND users.leasingfilter = "" THEN
					salesvehicle.leasing
				ELSE
					users.leasingfilter
				END 
				AND
				salesvehicle.arstatus = CASE
				WHEN users.billfilter="" THEN
					salesvehicle.arstatus
				ELSE
					users.billfilter
				END
				AND
				DATE_FORMAT(salesvehicle.arbillingdate,"%d/%m/%Y") = CASE
				WHEN users.billdatefilter = "1970-01-01" OR users.billdatefilter IS NULL THEN
					DATE_FORMAT(salesvehicle.arbillingdate,"%d/%m/%Y")
				ELSE
					DATE_FORMAT(users.billdatefilter,"%d/%m/%Y")
				END
				WHERE paytype.paytypename="Credit" AND users.username = "'.$user.'"
				ORDER BY salesvehicle.status ASC) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="#" onClick="getDataModals(\''.$aRow['idkey'].'\')">Pilih</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['cusname'], $aRow['leasing'], $aRow['vehiclemodel'], $aRow['datetrans'], $aRow['arbillingdate'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

