<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','leasing','countvehicle'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				Count(salesvehicle.idtrans) AS idkey,
				Count(salesvehicle.idtrans) AS countvehicle,
				CASE WHEN salesvehicle.leasing = "" OR salesvehicle.leasing IS NULL THEN "TUNAI" ELSE salesvehicle.leasing END AS leasing,
				leasing.leasingname
				FROM
				salesvehicle
				LEFT JOIN leasing ON salesvehicle.leasing = leasing.idleasing, users
				WHERE users.username="'.$user.'" AND salesvehicle.datetrans BETWEEN users.begindate AND users.enddate
				GROUP BY
				salesvehicle.leasing,
				leasing.leasingname) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$detail = '<a onclick="PopupCenterDual(\'winopen.php?mod=rptsalesvehicledetailleasing&key='.$aRow['leasing'].'\',\'NIGRAPHIC\',\'1350\',\'500\'); " href="javascript:void(0);"><button class="btn btn-default btn-xs"><i class="fa fa-folder-open"></i> Detail</button></a>';

		$row = array( $detail, $aRow['leasing'], $aRow['countvehicle']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>
