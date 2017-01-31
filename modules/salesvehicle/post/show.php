<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$descstatus = "CASE WHEN salesvehicle.status = 9 THEN 'Cancel' ELSE CASE WHEN salesvehicle.status = 0 THEN 'Jual'  ELSE CASE WHEN salesvehicle.status = 1 THEN 'SJ' END END END";
	$colorstatus = "CASE WHEN salesvehicle.status = 9 THEN 'red' ELSE CASE WHEN salesvehicle.status = 0 THEN 'orange'  ELSE CASE WHEN salesvehicle.status = 1 THEN 'green' END END END";
	$aColumns = array( 'idtrans','notrans','datetrans','spkno','dono','noktp','cusname','policeno','paytypename','vehiclemodel','colorstatus','descstatus'); 
	$sIndexColumn = 'idtrans';
	$sTable = '(SELECT
				salesvehicle.idtrans,
				salesvehicle.codetrans,
				salesvehicle.notrans,
				DATE_FORMAT(salesvehicle.datetrans,"%d/%m/%Y") AS datetrans,
				paytype.paytypename,
				'.$colorstatus.' AS colorstatus,
				'.$descstatus.' AS descstatus,
				salesvehicle.cusname,
				salesvehicle.policeno,
				salesvehicle.vehiclemodel,
				salesvehicle.noktp,
				salesvehicle.dono,
				salesvehicle.spkno
				FROM
				salesvehicle
				LEFT JOIN paytype ON salesvehicle.paytypeid = paytype.idpaytype
				ORDER BY salesvehicle.status ASC) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="?mod=salesvehicle_detail&key='.$aRow['idtrans'].'")">'.$aRow['notrans'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['datetrans'], $aRow['spkno'], $aRow['dono'], $aRow['noktp'], $aRow['cusname'], $aRow['policeno'], $aRow['paytypename'], $aRow['vehiclemodel'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

