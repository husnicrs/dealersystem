<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey', 'inventorygroupname','inventorycode','inventoryname','quantity','subtotal','discount','amount'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT 1 AS idkey, DERIVEDTBL.inventorygroupname, DERIVEDTBL.inventorycode, DERIVEDTBL.inventoryname, FORMAT(SUM(DERIVEDTBL.quantity),0) AS quantity, FORMAT(SUM(DERIVEDTBL.subtotal),0) AS subtotal, FORMAT(SUM(DERIVEDTBL.discount),0) AS discount, FORMAT(SUM(DERIVEDTBL.amount),0) AS amount
				FROM
				(
				SELECT
				inventory.inventoryname,
				salesorderdet.unitprice*salesorderdet.quantity AS subtotal,
				salesorderdet.amount AS amount,
				salesorderdet.quantity AS quantity,
				inventory.inventorycode,
				(salesorderdet.unitprice*salesorderdet.quantity)-(salesorderdet.amount) AS discount,
				inventorygroup.inventorygroupname,
				salesorder.datetrans
				FROM
				salesorder
				LEFT JOIN salesorderdet ON salesorder.idtrans = salesorderdet.transid
				LEFT JOIN inventory ON salesorderdet.inventoryid = inventory.idinventory
				LEFT JOIN inventorygroupdet ON inventory.idinventory = inventorygroupdet.inventoryid
				LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
				GROUP BY 
				inventorygroup.inventorygroupname,
				inventory.inventoryname,
				inventory.inventorycode,
				salesorder.datetrans
				
				UNION ALL
				
				SELECT
				inventory.inventoryname,
				salesservicedet.unitprice*salesservicedet.quantity AS subtotal,
				salesservicedet.amount AS amount,
				salesservicedet.quantity AS quantity,
				inventory.inventorycode,
				(salesservicedet.unitprice*salesservicedet.quantity)-(salesservicedet.amount) AS discount,
				inventorygroup.inventorygroupname,
				salesservice.datetrans
				FROM
				salesservice
				LEFT JOIN salesservicedet ON salesservice.idtrans = salesservicedet.transid
				LEFT JOIN inventory ON salesservicedet.inventoryid = inventory.idinventory
				LEFT JOIN inventorygroupdet ON inventory.idinventory = inventorygroupdet.inventoryid
				LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
				GROUP BY 
				inventorygroup.inventorygroupname,
				inventory.inventoryname,
				inventory.inventorycode,
				salesservice.datetrans) AS DERIVEDTBL, users
				WHERE DERIVEDTBL.datetrans BETWEEN users.begindate AND users.enddate AND users.username="'.$user.'"
				GROUP BY DERIVEDTBL.inventorycode, DERIVEDTBL.inventoryname, DERIVEDTBL.inventorygroupname) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['inventorygroupname'], $aRow['inventorycode'], $aRow['inventoryname'], $aRow['quantity'], $aRow['subtotal'], $aRow['discount'], $aRow['amount']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>