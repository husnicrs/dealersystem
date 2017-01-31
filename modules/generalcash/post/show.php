<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$descstatus = "CASE WHEN generalcash.status = 9 THEN 'Cancel' ELSE 'Validate' END";
	$colorstatus = "CASE WHEN generalcash.status = 9 THEN 'orange' ELSE 'green' END";
	$aColumns = array( 'idtrans','notrans','datetrans','remark','colorstatus','descstatus'); 
	$sIndexColumn = 'idtrans';
	$sTable = '(SELECT
				generalcash.idtrans,
				generalcash.codetrans,
				generalcash.notrans,
				DATE_FORMAT(generalcash.datetrans,"%d/%m/%Y") AS datetrans,
				generalcash.remark,
				'.$colorstatus.' AS colorstatus,
				'.$descstatus.' AS descstatus
				FROM
				generalcash) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="?mod=generalcash_detail&key='.$aRow['idtrans'].'")">'.$aRow['notrans'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['datetrans'], $aRow['remark'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

