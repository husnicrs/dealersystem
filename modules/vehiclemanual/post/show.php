<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','dono','dodate','vehicletype','vehiclecolor','vehlicemodel','vehlicejenis','cc','otr','mechineno','rangkano','year','colorstatus','descstatus'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				vehiclestock.idvehicle AS idkey,
				vehiclestock.dono,
				DATE_FORMAT(vehiclestock.dodate,"%d/%m/%Y") AS dodate,
				vehiclestock.vehicletype,
				vehiclestock.vehiclecolor,
				vehiclestock.mechineno,
				vehiclestock.year,
				vehiclestock.rangkano,
				vehicle.vehlicemodel,
				vehicle.vehlicejenis,
				vehicle.cc,
				vehicle.otr,
				CASE WHEN vehiclestock.manual = 0 OR vehiclestock.manual IS NULL THEN "green" ELSE "red" END AS colorstatus,
				CASE WHEN vehiclestock.manual = 0 OR vehiclestock.manual IS NULL THEN "Upload" ELSE "Manual" END AS descstatus
				FROM
				vehiclestock
				LEFT JOIN vehicle ON vehiclestock.vehicletype = vehicle.vehlicetype) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkey'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idkey'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['dono'], $aRow['dodate'], $aRow['vehicletype'], $aRow['vehiclecolor'], $aRow['vehlicemodel'], $aRow['vehlicejenis'],
		$aRow['cc'], $aRow['otr'], $aRow['mechineno'], $aRow['rangkano'], $aRow['year'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>