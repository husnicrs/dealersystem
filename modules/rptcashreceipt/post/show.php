<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','notrans','datetrans','customername','bankname','paytypename','amount'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				cashreceipt.idtrans AS idkey,
				cashreceipt.notrans,
				DATE_FORMAT(cashreceipt.datetrans,"%d/%m/%Y") AS datetrans,
				customer.customername,
				bank.bankname,
				paytype.paytypename,
				FORMAT(cashreceipt.amount,0) AS amount
				FROM
				cashreceipt
				INNER JOIN customer ON cashreceipt.customerid = customer.idcustomer
				INNER JOIN bank ON cashreceipt.bankid = bank.idbank
				INNER JOIN paytype ON cashreceipt.paytypeid = paytype.idpaytype) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['notrans'], $aRow['datetrans'], $aRow['customername'], $aRow['bankname'], $aRow['paytypename'], $aRow['amount']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>