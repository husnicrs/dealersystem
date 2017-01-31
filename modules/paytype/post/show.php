<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','paytypename','colorstatus','descstatus'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				paytype.idpaytype AS idkey,
				paytype.paytypename,
				paytype.status,
				CASE WHEN paytype.status = 0 THEN "green" ELSE "red" END AS colorstatus,
				CASE WHEN paytype.status = 0 THEN "Active" ELSE "Not Active" END AS descstatus
				FROM
				paytype) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkey'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idkey'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['paytypename'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

