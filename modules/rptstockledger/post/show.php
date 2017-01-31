<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','inventorycode','inventoryname','stockunit','stockunit','rackno','notrans','datetrans','description','qty'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT inventory.idinventory AS idkey, inventory.inventorycode, inventory.inventoryname, inventory.stockunit,  rackpurchase.rackno, DERIVEDTBL.notrans,
				DATE_FORMAT(DERIVEDTBL.datetrans,"%d/%m/%Y") AS datetrans,
				DERIVEDTBL.description, SUM(DERIVEDTBL.qty) AS qty 
				FROM 
				(SELECT
				salesorderdet.inventoryid,
				-salesorderdet.quantity AS qty,
				salesorder.notrans,
				salesorder.datetrans,
				"Penjualan Sparepart" AS description
				FROM
				salesorderdet
				INNER JOIN salesorder ON salesorderdet.transid = salesorder.idtrans
				
				UNION ALL
				
				SELECT
				salesorderdet.inventoryid,
				salesorderdet.quantity AS qty,
				salesorder.notrans,
				salesorder.datetrans,
				"Retur Sparepart" AS description
				FROM
				salesorderdet
				INNER JOIN salesorder ON salesorderdet.transid = salesorder.idtrans
				WHERE salesorder.`status`=10
				
				
				UNION ALL
				
				SELECT
				salesservicedet.inventoryid,
				-salesservicedet.quantity AS qty,
				salesservice.notrans,
				salesservice.datetrans,
				"Penjualan Sparepart Bengkel" AS description
				FROM
				salesservicedet
				INNER JOIN salesservice ON salesservicedet.transid = salesservice.idtrans

				
				UNION ALL
				
				SELECT
				inventoryadjdet.inventoryid,
				inventoryadjdet.quantity AS qty,
				inventoryadj.notrans,
				inventoryadj.datetrans,
				"Koreksi Stok" AS description
				FROM
				inventoryadjdet
				INNER JOIN inventoryadj ON inventoryadjdet.transid = inventoryadj.idtrans

				
				UNION ALL
				
				SELECT
				salesreturndet.inventoryid,
				salesreturndet.quantity AS qty,
				salesreturn.notrans,
				salesreturn.datetrans,
				"Retur Penjualan" AS description
				FROM
				salesreturndet
				INNER JOIN salesreturn ON salesreturndet.transid = salesreturn.idtrans

				
				UNION ALL
				
				SELECT
				purchaseorderdet.inventoryid,
				purchaseorderdet.quantity AS qty,
				purchaseorder.notrans,
				purchaseorder.datetrans,
				"Pembelian" AS description
				FROM
				purchaseorderdet
				INNER JOIN purchaseorder ON purchaseorderdet.transid = purchaseorder.idtrans

				UNION ALL
				
				SELECT
				purchasereturndet.inventoryid,
				-purchasereturndet.quantity AS qty,
				purchasereturn.notrans,
				purchasereturn.datetrans,
				"Retur Pembelian" AS description
				FROM
				purchasereturndet
				INNER JOIN purchasereturn ON purchasereturndet.transid = purchasereturn.idtrans

				
				UNION ALL
				
				SELECT
				materialuseddet.inventoryid,
				-materialuseddet.quantity AS qty,
				materialused.notrans,
				materialused.datetrans,
				"Pemakaian Material" AS description
				FROM
				materialuseddet
				INNER JOIN materialused ON materialuseddet.transid = materialused.idtrans

				
				UNION ALL
				
				SELECT
				stockopnamedet.inventoryid,
				stockopnamedet.adjqty AS qty,
				stockopname.notrans,
				stockopname.datetrans,
				"Stok Opname" AS description
				FROM
				stockopnamedet
				INNER JOIN stockopname ON stockopnamedet.transid = stockopname.idtrans

				) AS DERIVEDTBL INNER JOIN inventory ON DERIVEDTBL.inventoryid=inventory.idinventory
				LEFT JOIN (SELECT
				purchaseorderdet.inventoryid,
				MAX(purchaseorderdet.rackno) AS rackno
				FROM
				purchaseorderdet
				GROUP BY
				purchaseorderdet.inventoryid) AS rackpurchase ON rackpurchase.inventoryid = inventory.idinventory
				GROUP BY inventory.idinventory, inventory.inventorycode, inventory.inventoryname, inventory.stockunit, DERIVEDTBL.notrans,DERIVEDTBL.datetrans,DERIVEDTBL.description) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
			
		}
		
		$row = array($aRow['inventorycode'], $aRow['inventoryname'], $aRow['stockunit'], $aRow['rackno'], $aRow['notrans'], $aRow['datetrans'], $aRow['description'], $aRow['qty']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>