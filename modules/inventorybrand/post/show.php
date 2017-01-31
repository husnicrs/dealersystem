<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','inventorybrandname','colorstatus','descstatus'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				inventorybrand.idinventorybrand AS idkey,
				inventorybrand.inventorybrandname,
				inventorybrand.status,
				CASE WHEN inventorybrand.status = 0 THEN "green" ELSE "red" END AS colorstatus,
				CASE WHEN inventorybrand.status = 0 THEN "Active" ELSE "Not Active" END AS descstatus
				FROM
				inventorybrand) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkey'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idkey'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['inventorybrandname'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>