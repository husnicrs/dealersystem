<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','inventorycode','inventoryname','stockunit','stockunit','rackno','qty'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT inventory.idinventory AS idkey, inventory.inventorycode, inventory.inventoryname, inventory.stockunit,  rackpurchase.rackno, SUM(DERIVEDTBL.qty) AS qty 
				FROM 
				(SELECT
				salesorderdet.inventoryid,
				-salesorderdet.quantity AS qty
				FROM
				salesorderdet
				
				UNION ALL
				
				SELECT
				salesorderdet.inventoryid,
				salesorderdet.quantity AS qty
				FROM
				salesorderdet
				INNER JOIN salesorder ON salesorder.idtrans = salesorderdet.transid
				WHERE salesorder.`status`=10
				
				UNION ALL
				
				SELECT
				salesservicedet.inventoryid,
				-salesservicedet.quantity AS qty
				FROM
				salesservicedet
				
				UNION ALL
				
				SELECT
				inventoryadjdet.inventoryid,
				inventoryadjdet.quantity AS qty
				FROM
				inventoryadjdet
				
				UNION ALL
				
				SELECT
				salesreturndet.inventoryid,
				salesreturndet.quantity AS qty
				FROM
				salesreturndet
				
				UNION ALL
				
				SELECT
				purchaseorderdet.inventoryid,
				purchaseorderdet.quantity AS qty
				FROM
				purchaseorderdet
				
				UNION ALL
				
				SELECT
				purchasereturndet.inventoryid,
				-purchasereturndet.quantity AS qty
				FROM
				purchasereturndet
				
				UNION ALL
				
				SELECT
				materialuseddet.inventoryid,
				-materialuseddet.quantity AS qty
				FROM
				materialuseddet
				
				UNION ALL
				
				SELECT
				stockopnamedet.inventoryid,
				stockopnamedet.adjqty AS qty
				FROM
				stockopnamedet
				) AS DERIVEDTBL INNER JOIN inventory ON DERIVEDTBL.inventoryid=inventory.idinventory
				LEFT JOIN (SELECT
				purchaseorderdet.inventoryid,
				MAX(purchaseorderdet.rackno) AS rackno
				FROM
				purchaseorderdet
				GROUP BY
				purchaseorderdet.inventoryid) AS rackpurchase ON rackpurchase.inventoryid = inventory.idinventory
				GROUP BY inventory.idinventory, inventory.inventorycode, inventory.inventoryname, inventory.stockunit) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
			
		}
		
		$row = array($aRow['inventorycode'], $aRow['inventoryname'], $aRow['stockunit'], $aRow['rackno'], $aRow['qty']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>