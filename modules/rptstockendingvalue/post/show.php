<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','inventoryname','stockunit','unitprice','qty'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT inventory.idinventory AS idkey, inventory.inventoryname, inventory.stockunit, FORMAT(inventory.unitprice,0) AS unitprice, FORMAT(SUM(DERIVEDTBL.qty),0) AS qty 
				FROM 
				(SELECT
				salesorderdet.inventoryid,
				-salesorderdet.quantity AS qty
				FROM
				salesorderdet
				
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
				GROUP BY inventory.idinventory, inventory.inventoryname, inventory.unitprice, inventory.stockunit) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['inventoryname'], $aRow['stockunit'], $aRow['qty'], $aRow['unitprice']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>