<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idslip','slipname','module','sequencenumber','subnavmenuname'); 
	$sIndexColumn = 'idslip';
	$sTable = '(SELECT
				slip.idslip,
				slip.slipname,
				slip.module,
				slip.subnavmenuid,
				slip.sequencenumber,
				subnavmenu.subnavmenuname
				FROM
				slip
				INNER JOIN subnavmenu ON slip.subnavmenuid = subnavmenu.idsubnavmenu) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idslip'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idslip'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['slipname'], $aRow['module'], $aRow['sequencenumber'],  $aRow['subnavmenuname'] );
		$output['aaData'][] = $row;
	}
	
	echo json_encode( $output );

?>