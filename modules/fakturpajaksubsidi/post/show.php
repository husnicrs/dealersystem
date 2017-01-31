<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idtrans','datetrans','nourut','vehicletype','rangkano','mechineno','kuantum','hargajual','dpp','ppn','jumlahdpp'); 
	$sIndexColumn = 'idtrans';
	$sTable = '(SELECT
					fakturpajaksubsidi.idtrans,
					fakturpajaksubsidi.codetrans,
					fakturpajaksubsidi.notrans,
					DATE_FORMAT(fakturpajaksubsidi.datetrans,"%d/%m/%Y") AS datetrans,
					fakturpajaksubsidi.remark,
					fakturpajaksubsidi.`status`,
					fakturpajaksubsidi.transcode,
					fakturpajaksubsidi.vehiclemodel,
					fakturpajaksubsidi.vehicletype,
					fakturpajaksubsidi.mechineno,
					fakturpajaksubsidi.rangkano,
					fakturpajaksubsidi.soid,
					fakturpajaksubsidi.nourut,
					fakturpajaksubsidi.kuantum,
					FORMAT(fakturpajaksubsidi.hargajual,0) AS hargajual,
					FORMAT(fakturpajaksubsidi.dpp,0) AS dpp,
					FORMAT(fakturpajaksubsidi.ppn,0) AS ppn,
					FORMAT(fakturpajaksubsidi.jumlahdpp,0) AS jumlahdpp
				FROM
					fakturpajaksubsidi) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="?mod=fakturpajaksubsidi_detail&key='.$aRow['idtrans'].'")">'.$aRow['datetrans'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		
		$row = array($btn, $aRow['nourut'], $aRow['vehicletype'], $aRow['rangkano'], $aRow['mechineno'], $aRow['kuantum'], $aRow['hargajual'], $aRow['dpp'], $aRow['ppn'], $aRow['jumlahdpp']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

