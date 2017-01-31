<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$descstatus = "CASE WHEN purchasereq.status = 1 THEN 'Validate' ELSE CASE WHEN purchasereq.status = 2 THEN 'Bidding' ELSE CASE WHEN purchasereq.status = 9 THEN 'Cancel' END END END";
	$colorstatus = "CASE WHEN purchasereq.status = 1 THEN 'orange' ELSE CASE WHEN purchasereq.status = 2 THEN 'green' ELSE CASE WHEN purchasereq.status = 9 THEN 'red' END END END";
	$aColumns = array( 'idtrans','notrans','datetrans','remark','colorstatus','descstatus'); 
	$sIndexColumn = 'idtrans';
	$sTable = '(SELECT
				purchasereq.idtrans,
				purchasereq.codetrans,
				purchasereq.notrans,
				DATE_FORMAT(purchasereq.datetrans,"%d/%m/%Y") AS datetrans,
				purchasereq.remark,
				purchasereq.status,
				'.$colorstatus.' AS colorstatus,
				'.$descstatus.' AS descstatus
				FROM
				purchasereq) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="?mod=bidding_detail&key='.$aRow['idtrans'].'")">'.$aRow['notrans'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['datetrans'], $aRow['remark'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

