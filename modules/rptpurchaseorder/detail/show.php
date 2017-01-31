<?php
	$key = $_GET['key'];
	mb_internal_encoding('UTF-8');
	$lib='../../../lib/';
	$aColumns = array( 'idkey', 'inventorycode', 'inventoryname', 'unit', 'rackno', 'quantity', 'unitprice', 'discount', 'amount'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				purchaseorderdet.idtransdet AS idkey,
				purchaseorderdet.transid,
				purchaseorderdet.inventoryid,
				purchaseorderdet.unit,
				FORMAT(purchaseorderdet.unitprice,0) AS unitprice,
				purchaseorderdet.discount,
				FORMAT(purchaseorderdet.amount,0) AS amount,
				purchaseorderdet.quantity,
				purchaseorderdet.rackno,
				inventory.inventoryname,
				inventory.inventorycode
				FROM
				purchaseorderdet
				LEFT JOIN inventory ON purchaseorderdet.inventoryid = inventory.idinventory
				WHERE purchaseorderdet.transid="'.$key.'") DERIVEDTBL '; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		
		$row = array($aRow['inventorycode'], $aRow['inventoryname'], $aRow['unit'],  $aRow['rackno'], $aRow['quantity'], $aRow['unitprice'], $aRow['discount'], $aRow['amount']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );
	
?>