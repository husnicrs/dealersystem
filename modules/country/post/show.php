<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','countryname','countrycode','colorstatus','descstatus'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				country.idcountry AS idkey,
				country.countryname,
				country.countrycode,
				country.status,
				CASE WHEN country.status = 0 THEN "green" ELSE "red" END AS colorstatus,
				CASE WHEN country.status = 0 THEN "Active" ELSE "Not Active" END AS descstatus
				FROM
				country) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkey'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idkey'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['countryname'], $aRow['countrycode'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

