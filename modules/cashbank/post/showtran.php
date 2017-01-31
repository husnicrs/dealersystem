<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','notrans','datetrans','cusname','address','unit'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
					salesvehicle.idtrans AS idkey,
					salesvehicle.notrans,
					salesvehicle.datetrans,
					salesvehicle.cusname,
					salesvehicle.address,
					CONCAT(
						salesvehicle.vehicletype,
						" - ",
						salesvehicle.vehiclemodel,
						" - ",
						salesvehicle.mechineno,
						" - ",
						salesvehicle.rangkano
					) AS unit
				FROM
					salesvehicle) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="#" onClick="getDataModals(\''.$aRow['idkey'].'\')" data-dismiss="modal">Pilih</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		
		$row = array( $aRow['notrans'], $aRow['datetrans'], $aRow['cusname'], $aRow['address'], $aRow['unit'], $btn);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>


