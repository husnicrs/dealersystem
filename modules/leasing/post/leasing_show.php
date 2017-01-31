<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','leasingname','companyname','address','payment','dppo','otr','subleasing','scheme','accessories','spformat'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				leasing.idleasing AS idkey,
				leasing.leasingname,
				leasing.companyname,
				leasing.address,
				leasing.payment,
				leasing.dppo,
				leasing.otr,
				leasing.subleasing,
				leasing.scheme,
				leasing.accessories,
				leasing.spformat,
				leasing.`status`,
				leasing.paymentformat,
				leasing.dppoformat,
				leasing.otrformat,
				leasing.subleasingformat,
				leasing.schemeformat,
				leasing.accessoriesformat
				FROM
				leasing) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkey'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idkey'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['leasingname'], $aRow['companyname'], $aRow['address'], $aRow['payment'], $aRow['dppo'], $aRow['otr'],
		$aRow['subleasing'], $aRow['scheme'], $aRow['accessories'], $aRow['spformat']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>