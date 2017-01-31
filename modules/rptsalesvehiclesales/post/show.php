<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','nik','identityno','employeename','address','countvehicle','salesmanid'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				Count(salesvehicle.idtrans) AS countvehicle,
				Count(salesvehicle.idtrans) AS idkey,
				salesvehicle.salesmanid,
				employee.nik,
				employee.identityno,
				employee.employeename,
				employee.nickname,
				employee.address
				FROM
				salesvehicle
				INNER JOIN employee ON salesvehicle.salesmanid = employee.idemployee, users
				WHERE users.username="'.$user.'" AND salesvehicle.datetrans BETWEEN users.begindate AND users.enddate
				GROUP BY
				salesvehicle.channelid,
				salesvehicle.salesmanid,
				employee.nik,
				employee.identityno,
				employee.employeename,
				employee.nickname,
				employee.address) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$detail = '<a onclick="PopupCenterDual(\'winopen.php?mod=rptsalesvehicledetailsales&key='.$aRow['salesmanid'].'\',\'NIGRAPHIC\',\'1350\',\'500\'); " href="javascript:void(0);"><button class="btn btn-default btn-xs"><i class="fa fa-folder-open"></i> Detail</button></a>';
		$row = array( $detail, $aRow['nik'], $aRow['identityno'], $aRow['employeename'], $aRow['address'], $aRow['countvehicle']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>
