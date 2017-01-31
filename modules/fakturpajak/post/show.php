<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idtrans','datetrans','nourut','vehicletype','rangkano','mechineno','kuantum','hargajual','dpp','ppn','jumlahdpp'); 
	$sIndexColumn = 'idtrans';
	$sTable = '(SELECT
					fakturpajak.idtrans,
					fakturpajak.codetrans,
					fakturpajak.notrans,
					DATE_FORMAT(fakturpajak.datetrans,"%d/%m/%Y") AS datetrans,
					fakturpajak.remark,
					fakturpajak.`status`,
					fakturpajak.transcode,
					fakturpajak.vehiclemodel,
					fakturpajak.vehicletype,
					fakturpajak.mechineno,
					fakturpajak.rangkano,
					fakturpajak.soid,
					fakturpajak.nourut,
					fakturpajak.kuantum,
					FORMAT(fakturpajak.hargajual,0) AS hargajual,
					FORMAT(fakturpajak.dpp,0) AS dpp,
					FORMAT(fakturpajak.ppn,0) AS ppn,
					FORMAT(fakturpajak.jumlahdpp,0) AS jumlahdpp
				FROM
					fakturpajak) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="?mod=fakturpajak_detail&key='.$aRow['idtrans'].'")">'.$aRow['datetrans'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		
		$row = array($btn, $aRow['nourut'], $aRow['vehicletype'], $aRow['rangkano'], $aRow['mechineno'], $aRow['kuantum'], $aRow['hargajual'], $aRow['dpp'], $aRow['ppn'], $aRow['jumlahdpp']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

