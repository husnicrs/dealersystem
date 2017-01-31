<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','channelname','countvehicle','channelid'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				Count(salesvehicle.idtrans) AS idkey,
				Count(salesvehicle.idtrans) AS countvehicle,
				salesvehicle.channelid,
				channel.channelname
				FROM
				salesvehicle
				LEFT JOIN channel ON salesvehicle.channelid = channel.idchannel, users
				WHERE users.username="'.$user.'" AND salesvehicle.datetrans BETWEEN users.begindate AND users.enddate
				GROUP BY
				salesvehicle.channelid,
				channel.channelname) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
				$detail = '<a onclick="PopupCenterDual(\'winopen.php?mod=rptsalesvehicledetailpos&key='.$aRow['channelid'].'\',\'NIGRAPHIC\',\'1350\',\'500\'); " href="javascript:void(0);"><button class="btn btn-default btn-xs"><i class="fa fa-folder-open"></i> Detail</button></a>';

		$row = array( $detail, $aRow['channelname'], $aRow['countvehicle']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>
