<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idvillage','villagename','postcode','districtsname','cityname'); 
	$sIndexColumn = 'idvillage';
	$sTable = '(SELECT
				village.idvillage,
				village.villagename,
				districts.districtsname,
				village.districtsid,
				city.cityname,
				village.postcode
				FROM
				districts
				RIGHT JOIN village ON districts.iddistricts = village.districtsid
				LEFT JOIN city ON city.idcity = districts.cityid) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idvillage'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idvillage'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['villagename'], $aRow['postcode'], $aRow['districtsname'], $aRow['cityname']);
		$output['aaData'][] = $row;
	}
	
	echo json_encode( $output );

?>