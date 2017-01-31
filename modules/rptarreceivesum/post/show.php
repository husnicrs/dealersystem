<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','leasing','pencairansw','counttrans','leadsales'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				1 AS idkey,
				COUNT(salesvehicle.idtrans) AS counttrans,
				salesvehicle.leasing,
				FORMAT(SUM(salesvehicle.pencairan),0) AS pencairansw,
				FORMAT(SUM(DATEDIFF(salesvehicle.datetrans, salesvehicle.tglambil))/COUNT(salesvehicle.idtrans),0) AS leadsales
				FROM
				salesvehicle,
				users
				WHERE users.username="'.$user.'" AND salesvehicle.datetrans BETWEEN users.begindate AND users.enddate AND salesvehicle.clearstatus=1
				GROUP BY salesvehicle.leasing) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['leasing'], $aRow['pencairansw'], $aRow['counttrans'], $aRow['leadsales']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>
