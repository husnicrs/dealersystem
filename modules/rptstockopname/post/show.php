<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','notrans','datetrans','inventoryname','unit','stockqty','quantity','adjqty','unitprice'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				stockopname.idtrans AS idkey,
				stockopname.notrans,
				DATE_FORMAT(stockopname.datetrans,"%d/%m/%Y") AS datetrans,
				inventory.inventoryname,
				stockopnamedet.unit,
				stockopnamedet.stockqty,
				stockopnamedet.adjqty,
				stockopnamedet.quantity,
				FORMAT(inventory.unitprice,0) AS unitprice
				FROM
				stockopname
				INNER JOIN stockopnamedet ON stockopname.idtrans = stockopnamedet.transid
				INNER JOIN inventory ON stockopnamedet.inventoryid = inventory.idinventory) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['notrans'], $aRow['datetrans'], $aRow['inventoryname'], $aRow['unit'], $aRow['stockqty'], $aRow['quantity'], $aRow['adjqty'], 
		$aRow['unitprice']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>