<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','dono','dodate','vehlicemodel','vehlicejenis','vehicletype','vehiclecolor','rangkano','year','cc','otr'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				vehicleupload.idvehicle AS idkey,
				vehicleupload.mechineno,
				vehicleupload.rangkano,
				vehicleupload.`year`,
				vehicleupload.vehicledate,
				vehicleupload.vehicletype,
				vehicleupload.vehiclecolor,
				vehicleupload.`status`,
				vehicleupload.dono,
				DATE_FORMAT(STR_TO_DATE(vehicleupload.dodate,"%d%m%Y" ),"%d/%m/%Y") as dodate,
				vehicle.vehlicemodel,
				vehicle.vehlicejenis,
				vehicle.cc,
				vehicle.otr
				FROM
				vehicleupload
				LEFT JOIN vehicle ON vehicleupload.vehicletype = vehicle.vehlicetype) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $aRow['dono'], $aRow['dodate'], $aRow['vehlicemodel'], $aRow['vehlicejenis'], $aRow['vehicletype'], $aRow['vehiclecolor'], $aRow['rangkano'], $aRow['year'], $aRow['cc'], $aRow['otr']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>