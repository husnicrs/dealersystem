<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','vehicletype','countvehicle'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				vehiclestock.vehicletype AS idkey,
				vehiclestock.vehicletype,
				COUNT(vehiclestock.idvehicle) AS countvehicle
				FROM
				vehiclestock,
				users
				WHERE users.username="'.$user.'" AND vehiclestock.dodate BETWEEN users.begindate AND users.enddate
				GROUP BY
				vehiclestock.vehicletype) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$detail = '<a onclick="PopupCenterDual(\'winopen.php?mod=rptpurchasevehicletype&key='.$aRow['vehicletype'].'\',\'NIGRAPHIC\',\'1350\',\'500\'); " href="javascript:void(0);"><button class="btn btn-default btn-xs"><i class="fa fa-folder-open"></i> Detail</button></a>';

		$row = array( $detail, $aRow['vehicletype'], $aRow['countvehicle']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>
