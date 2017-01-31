<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','countvehicle','vehicletype','vehiclemodel'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				COUNT(salesvehicle.idtrans) idkey,
				COUNT(salesvehicle.idtrans) countvehicle,
				salesvehicle.vehicletype,
				salesvehicle.vehiclemodel
				FROM
				salesvehicle,
				users
				WHERE users.username="'.$user.'" AND salesvehicle.datetrans BETWEEN users.begindate AND users.enddate
				GROUP BY
				salesvehicle.vehicletype,
				salesvehicle.vehiclemodel) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$detail = '<a onclick="PopupCenterDual(\'winopen.php?mod=rptsalesvehicledetailtype&key='.$aRow['vehicletype'].'\',\'NIGRAPHIC\',\'1350\',\'500\'); " href="javascript:void(0);"><button class="btn btn-default btn-xs"><i class="fa fa-folder-open"></i> Detail</button></a>';
		$row = array( $detail, $aRow['vehicletype'], $aRow['vehiclemodel'], $aRow['countvehicle']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>
