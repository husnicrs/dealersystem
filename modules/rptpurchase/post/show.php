<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','notrans','datetrans','suppliername','paytypename','inventoryname','unit','unitprice','quantity','discount','amount'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				purchaseorder.idtrans AS idkey,
				purchaseorder.notrans,
				purchaseorder.datetrans,
				purchaseorder.supplierid,
				supplier.suppliername,
				purchaseorder.paytypeid,
				paytype.paytypename,
				purchaseorder.remark,
				inventory.inventoryname,
				purchaseorderdet.unit,
				FORMAT(purchaseorderdet.unitprice,0) AS unitprice,
				purchaseorderdet.discount,
				FORMAT(purchaseorderdet.amount,0) AS amount,
				purchaseorderdet.quantity
				FROM
				purchaseorder
				LEFT JOIN supplier ON purchaseorder.supplierid = supplier.idsupplier
				LEFT JOIN paytype ON purchaseorder.paytypeid = paytype.idpaytype
				LEFT JOIN purchaseorderdet ON purchaseorder.idtrans = purchaseorderdet.transid
				LEFT JOIN inventory ON purchaseorderdet.inventoryid = inventory.idinventory) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['notrans'], $aRow['datetrans'], $aRow['suppliername'], $aRow['paytypename'], $aRow['inventoryname'], $aRow['unit'], $aRow['unitprice'], 
		$aRow['quantity'], $aRow['discount'], $aRow['amount']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>