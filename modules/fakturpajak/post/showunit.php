<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','notrans','datetrans','cusname','address','villagename','districtsname','cityname','vehiclemodel','vehicletype',
	'vehiclejenis', 'mechineno','rangkano'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				salesvehicle.idtrans AS idkey,
				salesvehicle.notrans,
				salesvehicle.datetrans,
				salesvehicle.cusname,
				salesvehicle.address,
				village.villagename,
				districts.districtsname,
				city.cityname,
				salesvehicle.vehiclemodel,
				salesvehicle.vehicletype,
				salesvehicle.vehiclejenis,
				salesvehicle.vehiclecolor,
				salesvehicle.mechineno,
				salesvehicle.rangkano,
				salesvehicle.samsatid,
				salesvehicle.`year`
				FROM
				salesvehicle
				LEFT JOIN village ON salesvehicle.villageid = village.idvillage
				LEFT JOIN districts ON salesvehicle.districtsid = districts.iddistricts
				LEFT JOIN city ON city.idcity = salesvehicle.cityid) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="#" onClick="getDataModals(\''.$aRow['idkey'].'\')" data-dismiss="modal">Pilih</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
			
		}
		
		$row = array($aRow['cusname'], $aRow['address'], $aRow['villagename'], $aRow['districtsname'],
		$aRow['cityname'], $aRow['vehiclemodel'], $aRow['vehicletype'], $aRow['vehiclejenis'], $aRow['mechineno'], $aRow['rangkano'], $btn);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>