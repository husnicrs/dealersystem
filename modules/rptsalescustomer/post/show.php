<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','policeno','customername','vehiclemodel','vahicletype','vahiclejenis'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				salesservice.policeno AS idkey,
				salesservice.policeno,
				salesservice.customername,
				salesservice.vehiclemodel,
				salesservice.vahicletype,
				salesservice.vahiclejenis
				FROM
				salesservice
				GROUP BY
				salesservice.policeno,
				salesservice.customername,
				salesservice.vehiclemodel,
				salesservice.vahicletype,
				salesservice.vahiclejenis) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$detail = '<a onclick="PopupCenterDual(\'winopen.php?mod=rptsalescustomer_detail&key='.$aRow['policeno'].'\',\'NIGRAPHIC\',\'1000\',\'475\'); " href="javascript:void(0);"><button class="btn btn-default btn-xs"><i class="fa fa-folder-open"></i> Detail</button></a>';
		$row = array( $detail, $aRow['policeno'], $aRow['customername'], $aRow['vehiclemodel'], $aRow['vahicletype'], $aRow['vahiclejenis']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>