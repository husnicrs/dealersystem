<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','unitname'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				unit.idunit AS idkey,
				unit.unitname
				FROM
				unit) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkey'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idkey'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['unitname']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>