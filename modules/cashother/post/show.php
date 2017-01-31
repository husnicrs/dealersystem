<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$descstatus = "CASE WHEN cashother.status = 9 THEN 'Cancel' ELSE 'Validate' END";
	$colorstatus = "CASE WHEN cashother.status = 9 THEN 'orange' ELSE 'green' END";
	$aColumns = array( 'idtrans','notrans','datetrans','cashothertype','amount','taxamount','total','colorstatus','descstatus'); 
	$sIndexColumn = 'idtrans';
	$sTable = '(SELECT
				cashother.idtrans,
				cashother.codetrans,
				DATE_FORMAT(cashother.datetrans,"%d/%m/%Y") AS datetrans,
				cashother.notrans,
				FORMAT(cashother.amount,0) AS amount,
				FORMAT(cashother.taxamount,0) AS taxamount,
				FORMAT(cashother.total,0) AS total,
				cashother.`status`,
				cashother.cashothertype,
				'.$colorstatus.' AS colorstatus,
				'.$descstatus.' AS descstatus
				FROM
				cashother) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="?mod=cashother_detail&key='.$aRow['idtrans'].'")">'.$aRow['notrans'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['datetrans'], $aRow['cashothertype'], $aRow['amount'], $aRow['taxamount'], $aRow['total'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

