<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey', 'vehlicetype','vehlicemodel', 'vehlicejenis', 'cc', 'otr','colorstatus','descstatus'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				vehicle.idvehicle AS idkey,
				vehicle.vehlicetype,
				vehicle.vehlicemodel,
				vehicle.vehlicejenis,
				vehicle.cc,
				FORMAT(vehicle.otr,0) AS otr,
				vehicle.`status`,
				CASE WHEN vehicle.status = 0 THEN "green" ELSE "red" END AS colorstatus,
				CASE WHEN vehicle.status = 0 THEN "Active" ELSE "Not Active" END AS descstatus
				FROM
				vehicle) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkey'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idkey'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn,  $aRow['vehlicetype'], $aRow['vehlicemodel'], $aRow['vehlicejenis'], $aRow['cc'], $aRow['otr'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

