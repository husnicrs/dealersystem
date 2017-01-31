<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../../lib/';
	$aColumns = array( 'idtrans','notrans','datetrans','spkno','dono','noktp','cusname','policeno','paytypename','vehiclemodel','pono','leasing',
	'dateclear','nokontrak','penagihan','pencairan','cairschema','selisih','desccashreceive'); 
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
				salesvehicle.desccashreceive,
				DATE_FORMAT(salesvehicle.dateclear,"%d/%m/%Y") AS dateclear,
				FORMAT(salesvehicle.nokontrak,0) AS nokontrak,
				FORMAT(salesvehicle.penagihan,0) AS penagihan,
				FORMAT(salesvehicle.pencairan,0) AS pencairan,
				FORMAT(salesvehicle.cairschema,0) AS cairschema,
				FORMAT(salesvehicle.selisih,0) AS selisih
				FROM
				salesvehicle
				LEFT JOIN paytype ON salesvehicle.paytypeid = paytype.idpaytype
				WHERE salesvehicle.selisih =0
				ORDER BY salesvehicle.status ASC) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="?mod=arreceive_ldetail&key='.$aRow['idtrans'].'")">'.$aRow['notrans'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['dateclear'], $aRow['cusname'], $aRow['vehiclemodel'], $aRow['leasing'], $aRow['nokontrak'], $aRow['penagihan'],
		$aRow['pencairan'], $aRow['selisih'], $aRow['desccashreceive']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

