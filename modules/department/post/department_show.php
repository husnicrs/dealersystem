<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','departmentname'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				department.iddepartment AS idkey,
				department.departmentname
				FROM
				department) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkey'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idkey'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['departmentname']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>