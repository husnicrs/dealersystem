<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','notrans','datetrans','suppliername','orderref'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				purchaseorder.idtrans AS idkey,
				purchaseorder.notrans,
				DATE_FORMAT(purchaseorder.datetrans,"%d/%m/%Y") AS datetrans,
				purchaseorder.orderref,
				supplier.suppliername
				FROM
				purchaseorder
				LEFT JOIN supplier ON purchaseorder.supplierid = supplier.idsupplier,
				users
				WHERE purchaseorder.datetrans BETWEEN users.begindate AND users.enddate AND users.username="'.$user.'") DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$detail = '<a onclick="PopupCenterDual(\'winopen.php?mod=rptpurchaseorder_detail&key='.$aRow['idkey'].'\',\'NIGRAPHIC\',\'1000\',\'475\'); " href="javascript:void(0);"><button class="btn btn-default btn-xs"><i class="fa fa-folder-open"></i> Detail</button></a>';
		$row = array( $detail, $aRow['notrans'], $aRow['datetrans'], $aRow['suppliername'], $aRow['orderref']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>