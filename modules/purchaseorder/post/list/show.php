<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../../lib/';
	$table="purchaseorder";
	$descstatus = "CASE WHEN ".$table.".status = 0 THEN 'Open' ELSE CASE WHEN ".$table.".status = 1 THEN 'Validate' ELSE CASE WHEN ".$table.".status = 9 THEN 'Cancel' END END END";
	$colorstatus = "CASE WHEN ".$table.".status = 0 THEN 'orange' ELSE CASE WHEN ".$table.".status = 1 THEN 'green' ELSE CASE WHEN ".$table.".status = 9 THEN 'red' END END END";
	$aColumns = array( 'idtrans','notrans','datetrans','suppliername','currency','remark','colorstatus','descstatus'); 
	$sIndexColumn = 'idtrans';
	$sTable = '(SELECT
				purchaseorder.idtrans,
				purchaseorder.codetrans,
				purchaseorder.notrans,
				purchaseorder.datetrans,
				purchaseorder.supplierid,
				supplier.suppliername,
				purchaseorder.paydue,
				purchaseorder.currency,
				purchaseorder.remark,
				'.$colorstatus.' AS colorstatus,
				'.$descstatus.' AS descstatus
				FROM
				purchaseorder
				LEFT JOIN supplier ON purchaseorder.supplierid = supplier.idsupplier) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a onclick="PopupCenterDual(\'winopen.php?mod=purchaseorder_ldetail&key='.$aRow['idtrans'].'\',\'NIGRAPHIC\',\'1320\',\'600\'); " href="javascript:void(0);">'.$aRow['notrans'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['datetrans'], $aRow['suppliername'], $aRow['currency'], $aRow['remark'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

