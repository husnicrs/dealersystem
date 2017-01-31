<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','mechineno','bpkbname','datebirth','address','handphone','vehiclemodel','datetrans','leasing','credittenor'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				salesvehicle.idtrans AS idkey,
				salesvehicle.cusname,
				salesvehicle.bpkbname,
				DATE_FORMAT(salesvehicle.datebirth,"%d/%m/%Y") AS datebirth,
				salesvehicle.address,
				salesvehicle.handphone,
				salesvehicle.vehiclemodel,
				DATE_FORMAT(salesvehicle.datetrans,"%d/%m/%Y") AS datetrans,
				salesvehicle.leasing,
				salesvehicle.credittenor,
				salesvehicle.mechineno
				FROM
				salesvehicle,
				users
				WHERE users.username="'.$user.'" AND salesvehicle.datetrans BETWEEN users.begindate AND users.enddate) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['mechineno'], $aRow['bpkbname'], $aRow['datebirth'], $aRow['address'], $aRow['handphone'], $aRow['vehiclemodel'], $aRow['datetrans'], $aRow['leasing']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>
