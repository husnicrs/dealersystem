<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey', 'inventorycode','inventoryname','salesunit','rackno',
	'unitprice','barcode','colorstatus','descstatus'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				inventory.idinventory AS idkey,
				inventory.inventorycode,
				inventory.inventoryname,
				inventory.spec,
				inventory.salesunit,
				inventory.purchaseunit,
				inventory.stockunit,
				inventory.inventorygroupid,
				inventorygroup.inventorygroupname,
				inventory.barcode,
				inventory.weight,
				inventory.inventorytypeid,
				inventorytype.inventorytypename,
				FORMAT(inventory.unitprice,0) AS unitprice,
				inventory.floorprice,
				inventory.inventorybrandid,
				inventorybrand.inventorybrandname,
				inventory.inventorycolorid,
				inventorycolor.inventorycolorname,
				inventorysize.inventorysizename,
				inventory.inventorysizeid,
				rackpurchase.rackno,
				CASE WHEN inventory.status = 0 THEN "green" ELSE "red" END AS colorstatus,
				CASE WHEN inventory.status = 0 THEN "Active" ELSE "Not Active" END AS descstatus
				FROM
				inventory
				LEFT JOIN inventorycolor ON inventory.inventorycolorid = inventorycolor.idinventorycolor
				LEFT JOIN inventorygroup ON inventory.inventorygroupid = inventorygroup.idinventorygroup
				LEFT JOIN inventorytype ON inventory.inventorytypeid = inventorytype.idinventorytype
				LEFT JOIN inventorybrand ON inventory.inventorybrandid = inventorybrand.idinventorybrand
				LEFT JOIN inventorysize ON inventory.inventorysizeid= inventorysize.idinventorysize
				LEFT JOIN (SELECT
				purchaseorderdet.inventoryid,
				MAX(purchaseorderdet.rackno) AS rackno
				FROM
				purchaseorderdet
				GROUP BY
				purchaseorderdet.inventoryid) AS rackpurchase ON rackpurchase.inventoryid = inventory.idinventory) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkey'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idkey'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['inventorycode'], $aRow['inventoryname'], 
		$aRow['salesunit'], $aRow['unitprice'], $aRow['rackno'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

