<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','datetrans','subtotalservis','subtotalahm','subtotalpart','total'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT 1 AS idkey, DATE_FORMAT(DERIVEDTBL.datetrans,"%d/%m/%Y") AS datetrans, FORMAT(SUM(DERIVEDTBL.subtotalservis),0) AS subtotalservis, FORMAT(SUM(DERIVEDTBL.subtotalahm),0) AS subtotalahm, FORMAT(SUM(DERIVEDTBL.subtotalpart),0) AS subtotalpart, FORMAT(SUM(DERIVEDTBL.subtotalservis+DERIVEDTBL.subtotalahm+subtotalpart),0) AS total FROM
				(
				SELECT
				salesservice.datetrans,
				salesservicedet2.subtotal AS subtotalservis,
				0 AS subtotalahm,
				0 AS subtotalpart
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans

				
				UNION ALL
				
				SELECT partnonahm.datetrans, 0 AS subtotalservis, partnonahm.subtotalpart AS subtotalahm, 0 AS subtotalpart 
				FROM 				
				(SELECT
				salesorder.datetrans,
				salesorderdet.amount AS subtotalpart
				FROM
				salesorder
				LEFT JOIN salesorderdet ON salesorder.idtrans = salesorderdet.transid
				LEFT JOIN inventorygroupdet ON salesorderdet.inventoryid = inventorygroupdet.inventoryid
				LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
				WHERE inventorygroup.inventorygroupname IS NULL OR inventorygroup.inventorygroupname <> "OLI AHM"
				
				UNION ALL
				
				SELECT
				salesservice.datetrans,
				salesservicedet.amount AS subtotalpart
				FROM
				salesservice
				LEFT JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
				LEFT JOIN inventorygroupdet ON salesservicedet.inventoryid = inventorygroupdet.inventoryid
				LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
				WHERE inventorygroup.inventorygroupname IS NULL OR inventorygroup.inventorygroupname <> "OLI AHM") AS partnonahm
			
				
				UNION ALL
				
				SELECT partahm.datetrans, 0 AS subtotalservis, 0 AS subtotalahm, partahm.subtotalpart AS subtotal FROM (SELECT
				salesorder.datetrans,
				salesorderdet.amount AS subtotalpart
				FROM
				salesorder
				LEFT JOIN salesorderdet ON salesorder.idtrans = salesorderdet.transid
				LEFT JOIN inventorygroupdet ON salesorderdet.inventoryid = inventorygroupdet.inventoryid
				LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
				WHERE inventorygroup.inventorygroupname = "OLI AHM"
				
				UNION ALL
				
				SELECT
				salesservice.datetrans,
				salesservicedet.amount AS subtotalpart
				FROM
				salesservice
				LEFT JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
				LEFT JOIN inventorygroupdet ON salesservicedet.inventoryid = inventorygroupdet.inventoryid
				LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
				WHERE inventorygroup.inventorygroupname = "OLI AHM") AS partahm
				
				) AS DERIVEDTBL, users
				WHERE DERIVEDTBL.datetrans BETWEEN users.begindate AND users.enddate AND users.username="'.$user.'"
				GROUP BY DERIVEDTBL.datetrans) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['datetrans'], $aRow['subtotalservis'], $aRow['subtotalahm'], $aRow['subtotalpart'], $aRow['total']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>