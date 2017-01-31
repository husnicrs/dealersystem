<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','inventorycode','inventoryname','quantity','rackno','unitprice','amount'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
					idkey,
					inventorycode,
					inventoryname,
					rackno,
					SUM(quantity) AS quantity,
					FORMAT(SUM(unitprice) / SUM(quantity),0) AS unitprice,
					FORMAT(SUM(unitprice) / SUM(quantity) * SUM(quantity),0) AS amount
				FROM
					(
						SELECT
							inventory.idinventory AS idkey,
							inventory.inventoryname,
							FORMAT(
								Sum(salesorderdet.quantity),
								0
							) AS quantity,
							inventory.inventorycode,
							rackpurchase.rackno,
							Sum(salesorderdet.unitprice) AS unitprice
						FROM
							salesorder
						LEFT JOIN salesorderdet ON salesorder.idtrans = salesorderdet.transid
						LEFT JOIN inventory ON salesorderdet.inventoryid = inventory.idinventory
						LEFT JOIN (
							SELECT
								purchaseorderdet.inventoryid,
								MAX(purchaseorderdet.rackno) AS rackno
							FROM
								purchaseorderdet
							GROUP BY
								purchaseorderdet.inventoryid
						) AS rackpurchase ON rackpurchase.inventoryid = inventory.idinventory,
						users
					WHERE
						salesorder.datetrans BETWEEN users.begindate
					AND users.enddate
					AND users.username = "'.$user.'"
					GROUP BY
						inventory.inventoryname,
						inventory.inventorycode,
						rackpurchase.rackno
					UNION ALL
						SELECT
							inventory.idinventory AS idkey,
							inventory.inventoryname,
							FORMAT(
								Sum(salesservicedet.quantity),
								0
							) AS quantity,
							inventory.inventorycode,
							rackpurchase.rackno,
							Sum(salesservicedet.unitprice) AS unitprice
						FROM
							salesservice
						LEFT JOIN salesservicedet ON salesservice.idtrans = salesservicedet.transid
						LEFT JOIN inventory ON salesservicedet.inventoryid = inventory.idinventory
						LEFT JOIN (
							SELECT
								purchaseorderdet.inventoryid,
								MAX(purchaseorderdet.rackno) AS rackno
							FROM
								purchaseorderdet
							GROUP BY
								purchaseorderdet.inventoryid
						) AS rackpurchase ON rackpurchase.inventoryid = inventory.idinventory,
						users
					WHERE
						salesservice.datetrans BETWEEN users.begindate
					AND users.enddate
					AND users.username = "'.$user.'"
					GROUP BY
						inventory.inventoryname,
						inventory.inventorycode,
						rackpurchase.rackno
					) AS DERIVEDTBL
				GROUP BY
					idkey,
					inventorycode,
					inventoryname,
					rackno) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['inventorycode'], $aRow['inventoryname'], $aRow['rackno'], $aRow['quantity'], $aRow['unitprice'], $aRow['amount']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>