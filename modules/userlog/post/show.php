<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','username','logindate'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				userlog.iduserlog AS idkey,
				userlog.username,
				DATE_FORMAT(userlog.logindate,"%d %b %Y %T") AS logindate
				FROM
				userlog
				ORDER BY iduserlog DESC) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $aRow['username'], $aRow['logindate']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>