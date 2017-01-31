<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$descstatus = "CASE WHEN purchaseorder.status = 9 THEN 'Cancel' ELSE 'Validate' END";
	$colorstatus = "CASE WHEN purchaseorder.status = 9 THEN 'orange' ELSE 'green' END";
	$aColumns = array( 'idtrans','notrans','datetrans','suppliername','paytypename','top','remark','orderref','duedate','colorstatus','descstatus'); 
	$sIndexColumn = 'idtrans';
	$sTable = '(SELECT
				purchaseorder.idtrans,
				purchaseorder.codetrans,
				purchaseorder.notrans,
				DATE_FORMAT(purchaseorder.datetrans,"%d/%m/%Y") AS datetrans,
				purchaseorder.remark,
				purchaseorder.supplierid,
				supplier.suppliername,
				purchaseorder.paytypeid,
				purchaseorder.top,
				paytype.paytypename,
				purchaseorder.orderref,
				DATE_FORMAT(purchaseorder.duedate,"%d/%m/%Y") AS duedate,
				'.$colorstatus.' AS colorstatus,
				'.$descstatus.' AS descstatus
				FROM
				purchaseorder
				LEFT JOIN supplier ON purchaseorder.supplierid = supplier.idsupplier
				LEFT JOIN paytype ON purchaseorder.paytypeid = paytype.idpaytype) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="?mod=purchaseorder_detail&key='.$aRow['idtrans'].'")">'.$aRow['notrans'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['datetrans'], $aRow['suppliername'], $aRow['orderref'], $aRow['paytypename'], $aRow['top'], $aRow['duedate'], $aRow['remark'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

