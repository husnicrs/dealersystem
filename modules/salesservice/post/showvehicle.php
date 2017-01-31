<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey', 'vehlicetype','vehlicemodel', 'vehlicejenis', 'cc', 'otr','colorstatus','descstatus','year'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				vehicle.vehlicetype AS idkey,
				vehicle.vehlicetype,
				vehicle.vehlicemodel,
				vehicle.vehlicejenis,
				vehicle.cc,
				FORMAT(vehicle.otr,0) AS otr,
				vehicle.`status`,
				stok.year, 
				CASE WHEN vehicle.status = 0 THEN "green" ELSE "red" END AS colorstatus,
				CASE WHEN vehicle.status = 0 THEN "Active" ELSE "Not Active" END AS descstatus
				FROM
				vehicle
				LEFT JOIN (SELECT
				vehiclestock.vehicletype,
				MAX(vehiclestock.`year`) AS year
				FROM
				vehiclestock
				GROUP BY
				vehiclestock.vehicletype) AS stok ON vehicle.vehlicetype=stok.vehicletype) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="#" onClick="getDataModals(\''.$aRow['idkey'].'\')" data-dismiss="modal">Pilih</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $aRow['vehlicetype'], $aRow['vehlicemodel'], $aRow['vehlicejenis'], $aRow['cc'], $aRow['otr'], $aRow['year'], $btn);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

