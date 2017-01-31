<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../../lib/';
	$table="goodreceive";
	$descstatus = "CASE WHEN ".$table.".status = 0 THEN 'Open' ELSE CASE WHEN ".$table.".status = 1 THEN 'Validate' ELSE CASE WHEN ".$table.".status = 9 THEN 'Cancel' END END END";
	$colorstatus = "CASE WHEN ".$table.".status = 0 THEN 'orange' ELSE CASE WHEN ".$table.".status = 1 THEN 'green' ELSE CASE WHEN ".$table.".status = 9 THEN 'red' END END END";
	$aColumns = array( 'idtrans','notrans','datetrans','suppliername','currency','remark','colorstatus','descstatus'); 
	$sIndexColumn = 'idtrans';
	$sTable = '(SELECT
				goodreceive.idtrans,
				goodreceive.codetrans,
				goodreceive.notrans,
				goodreceive.datetrans,
				goodreceive.supplierid,
				supplier.suppliername,
				goodreceive.paydue,
				goodreceive.currency,
				goodreceive.remark,
				'.$colorstatus.' AS colorstatus,
				'.$descstatus.' AS descstatus
				FROM
				goodreceive
				LEFT JOIN supplier ON goodreceive.supplierid = supplier.idsupplier) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="index.php?mod=goodreceive_ldetail&key='.$aRow['idtrans'].'">'.$aRow['notrans'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['datetrans'], $aRow['suppliername'], $aRow['currency'], $aRow['remark'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

