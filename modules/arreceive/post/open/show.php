<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../../lib/';
	$aColumns = array( 'idtrans','notrans','datetrans','spkno','dono','noktp','cusname','policeno','paytypename','vehiclemodel','pono','leasing','selisih'); 
	$sIndexColumn = 'idtrans';
	$sTable = '(SELECT
				salesvehicle.idtrans,
				salesvehicle.codetrans,
				salesvehicle.notrans,
				DATE_FORMAT(salesvehicle.datetrans,"%d/%m/%Y") AS datetrans,
				paytype.paytypename,
				salesvehicle.cusname,
				salesvehicle.policeno,
				salesvehicle.vehiclemodel,
				salesvehicle.noktp,
				salesvehicle.dono,
				salesvehicle.spkno,
				salesvehicle.pono,
				salesvehicle.leasing,
				FORMAT(salesvehicle.selisih,0) AS selisih
				FROM
				salesvehicle
				LEFT JOIN paytype ON salesvehicle.paytypeid = paytype.idpaytype
				WHERE salesvehicle.selisih >0 OR salesvehicle.selisih IS NULL AND paytype.paytypename="Credit"
				ORDER BY salesvehicle.status ASC) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="?mod=arreceive_ldetail&key='.$aRow['idtrans'].'")">'.$aRow['notrans'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['datetrans'], $aRow['spkno'], $aRow['dono'], $aRow['noktp'], $aRow['cusname'], $aRow['leasing'], $aRow['pono'], $aRow['vehiclemodel'], $aRow['selisih']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

