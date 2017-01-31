<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$descstatus = "CASE WHEN cashbank.status = 9 THEN 'Cancel' ELSE 'Validate' END";
	$colorstatus = "CASE WHEN cashbank.status = 9 THEN 'orange' ELSE 'green' END";
	$aColumns = array( 'idtrans','notrans','datetrans','cusname','address','unit','nofaktur','colorstatus','descstatus'); 
	$sIndexColumn = 'idtrans';
	$sTable = '(SELECT
				cashbank.idtrans,
				cashbank.codetrans,
				cashbank.notrans,
				DATE_FORMAT(cashbank.datetrans,"%d/%m/%Y") AS datetrans,
				cashbank.cusname,
				cashbank.address,
				cashbank.unit,
				cashbank.nofaktur,
				cashbank.remark,
				'.$colorstatus.' AS colorstatus,
				'.$descstatus.' AS descstatus
				FROM
				cashbank) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="?mod=cashbank_detail&key='.$aRow['idtrans'].'")">'.$aRow['notrans'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['datetrans'], $aRow['cusname'], $aRow['address'], $aRow['unit'], $aRow['nofaktur'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

