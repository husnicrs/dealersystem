<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','vehicleservicename','vehliceservicetype','vehiclegroupmodel','unitprice','colorstatus','descstatus'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				vehicleservice.idvehicleservice AS idkey,
				vehicleservice.vehicleservicename,
				vehicleservice.vehliceservicetype,
				FORMAT(vehicleservice.unitprice,0) AS unitprice,
				vehicleservice.vehiclegroupmodel,
				vehicleservice.status,
				CASE WHEN vehicleservice.status = 0 THEN "green" ELSE "red" END AS colorstatus,
				CASE WHEN vehicleservice.status = 0 THEN "Active" ELSE "Not Active" END AS descstatus
				FROM
				vehicleservice) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$test= '';
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkey'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idkey'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['vehicleservicename'], $aRow['vehliceservicetype'], $aRow['vehiclegroupmodel'], $test, $aRow['unitprice'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>