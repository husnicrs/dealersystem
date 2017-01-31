<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','inventorycode','inventoryname','salesunit','quantity','unitprice','amount','rackno'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				inventory.idinventory AS idkey,
				inventory.inventoryname,
				FORMAT(SUM(salesorderdet.amount),0) AS amount,
				FORMAT(Sum(salesorderdet.quantity),0) AS quantity,
				inventory.inventorycode,
				FORMAT(inventory.unitprice,0) AS unitprice,
				inventory.salesunit,
				rackpurchase.rackno
				FROM
				salesorder
				LEFT JOIN salesorderdet ON salesorder.idtrans = salesorderdet.transid
				LEFT JOIN inventory ON salesorderdet.inventoryid = inventory.idinventory
				LEFT JOIN (SELECT
				purchaseorderdet.inventoryid,
				MAX(purchaseorderdet.rackno) AS rackno
				FROM
				purchaseorderdet
				GROUP BY
				purchaseorderdet.inventoryid) AS rackpurchase ON rackpurchase.inventoryid = inventory.idinventory,
				users
				WHERE salesorder.datetrans BETWEEN users.begindate AND users.enddate AND users.username="'.$user.'"
				GROUP BY 
				inventory.inventoryname,
				salesorderdet.unit,
				inventory.inventorycode,
				inventory.salesunit,
rackpurchase.rackno) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['inventorycode'], $aRow['inventoryname'], $aRow['salesunit'], $aRow['rackno'], $aRow['quantity'], $aRow['unitprice'], $aRow['amount']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>