<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','notrans','datetrans','customername','paytypename','inventoryname','unit','unitprice','quantity','discount','amount'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				salesorder.idtrans AS idkey,
				salesorder.notrans,
				salesorder.datetrans,
				salesorder.customerid,
				customer.customername,
				salesorder.paytypeid,
				paytype.paytypename,
				salesorder.remark,
				inventory.inventoryname,
				salesorderdet.unit,
				FORMAT(salesorderdet.unitprice,0) AS unitprice,
				salesorderdet.discount,
				FORMAT(salesorderdet.amount,0) AS amount,
				salesorderdet.quantity
				FROM
				salesorder
				LEFT JOIN customer ON salesorder.customerid = customer.idcustomer
				LEFT JOIN paytype ON salesorder.paytypeid = paytype.idpaytype
				LEFT JOIN salesorderdet ON salesorder.idtrans = salesorderdet.transid
				LEFT JOIN inventory ON salesorderdet.inventoryid = inventory.idinventory) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['notrans'], $aRow['datetrans'], $aRow['customername'], $aRow['paytypename'], $aRow['inventoryname'], $aRow['unit'], $aRow['unitprice'], 
		$aRow['quantity'], $aRow['discount'], $aRow['amount']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>