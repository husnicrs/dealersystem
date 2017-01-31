<?php
	$key = $_GET['key'];
	$lib='../../../lib/';
	include_once ''.$lib.'Database.php';
	mb_internal_encoding('UTF-8');
	$aColumns = array( 'iduserautorized', 'locationname'); 
	$sIndexColumn = 'iduserautorized';
	$sTable = '(SELECT
				userlocauthorized.locationid,
				location.locationname,
				userlocauthorized.userid,
				userlocauthorized.iduserautorized
				FROM
				userlocauthorized
				INNER JOIN location ON userlocauthorized.locationid = location.idlocation
				WHERE userlocauthorized.userid='.$key.') DERIVEDTBL '; 
	
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="#" onClick="showModals(\''.$aRow['iduserautorized'].'\')">Edit</a> | <a href="#" onClick="deleteUser(\''.$aRow['iduserautorized'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['locationname'] );
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );
	
?>