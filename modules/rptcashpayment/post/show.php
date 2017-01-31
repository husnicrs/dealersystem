<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','notrans','datetrans','suppliername','bankname','paytypename','amount'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				cashpayment.idtrans AS idkey,
				cashpayment.notrans,
				DATE_FORMAT(cashpayment.datetrans,"%d/%m/%Y") AS datetrans,
				supplier.suppliername,
				bank.bankname,
				paytype.paytypename,
				FORMAT(cashpayment.amount,0) AS amount
				FROM
				cashpayment
				INNER JOIN supplier ON cashpayment.supplierid = supplier.idsupplier
				INNER JOIN bank ON cashpayment.bankid = bank.idbank
				INNER JOIN paytype ON cashpayment.paytypeid = paytype.idpaytype) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['notrans'], $aRow['datetrans'], $aRow['suppliername'], $aRow['bankname'], $aRow['paytypename'], $aRow['amount']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>