<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'iddistricts','districtsname','cityname'); 
	$sIndexColumn = 'iddistricts';
	$sTable = '(SELECT
				districts.iddistricts,
				districts.districtsname,
				city.cityname,
				districts.cityid
				FROM
				city
				RIGHT JOIN districts ON city.idcity = districts.cityid) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="#" onClick="showModals(\''.$aRow['iddistricts'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['iddistricts'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['districtsname'], $aRow['cityname']);
		$output['aaData'][] = $row;
	}
	
	echo json_encode( $output );

?>