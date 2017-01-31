<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','accountlvl1name'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				accountlvl1.idaccountlvl1 AS idkey,
				accountlvl1.accountlvl1name
				FROM
				accountlvl1) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkey'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idkey'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['accountlvl1name']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>