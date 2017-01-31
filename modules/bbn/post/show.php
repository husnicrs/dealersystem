<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idtrans','notrans','datetrans','cusname','vehiclemodel','vehicletype','mechineno','rangkano','nota','adm','totalbbn','samsatname'); 
	$sIndexColumn = 'idtrans';
	$sTable = '(SELECT
				bbn.idtrans,
				bbn.codetrans,
				bbn.notrans,
				bbn.datetrans,
				bbn.remark,
				bbn.`status`,
				bbn.transcode,
				bbn.cusname,
				bbn.address,
				bbn.vehiclemodel,
				bbn.vehicletype,
				bbn.mechineno,
				bbn.rangkano,
				FORMAT(bbn.nota,0) AS nota,
				FORMAT(bbn.adm,0) AS adm,
				FORMAT(bbn.totalbbn,0) AS totalbbn,
				bbn.samsatid,
				samsat.samsatname
				FROM
				bbn
				LEFT JOIN samsat ON bbn.samsatid = samsat.idsamsat) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="?mod=bbn_detail&key='.$aRow['idtrans'].'")">'.$aRow['notrans'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['datetrans'], $aRow['cusname'], $aRow['vehiclemodel'], $aRow['vehicletype'], $aRow['mechineno'], $aRow['rangkano'], $aRow['nota'], $aRow['adm'], $aRow['totalbbn'], $aRow['samsatname']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

