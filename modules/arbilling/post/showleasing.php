<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkeyleasing','leasingname'); 
	$sIndexColumn = 'idkeyleasing';
	$sTable = '(SELECT
				leasing.idleasing AS idkeyleasing,
				leasing.leasingname,
				leasing.companyname,
				leasing.address,
				leasing.payment,
				leasing.dppo,
				leasing.otr,
				leasing.subleasing,
				leasing.scheme,
				leasing.accessories,
				leasing.`status`
				FROM
				leasing) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkeyleasing'].'\')">Edit</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $aRow['leasingname'], $btn);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>