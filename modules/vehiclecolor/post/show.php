<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','vehiclecolorcode','vehiclecolorname','colorstatus','descstatus'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				vehiclecolor.idvehiclecolor AS idkey,
				vehiclecolor.vehiclecolorcode,
				vehiclecolor.vehiclecolorname,
				vehiclecolor.status,
				CASE WHEN vehiclecolor.status = 0 THEN "green" ELSE "red" END AS colorstatus,
				CASE WHEN vehiclecolor.status = 0 THEN "Active" ELSE "Not Active" END AS descstatus
				FROM
				vehiclecolor) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkey'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idkey'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['vehiclecolorcode'], $aRow['vehiclecolorname'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>