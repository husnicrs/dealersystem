<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$descstatus = "CASE WHEN purchasereturn.status = 9 THEN 'Cancel' ELSE 'Validate' END";
	$colorstatus = "CASE WHEN purchasereturn.status = 9 THEN 'orange' ELSE 'green' END";
	$aColumns = array( 'idtrans','notrans','datetrans','suppliername','paytypename','remark','colorstatus','descstatus'); 
	$sIndexColumn = 'idtrans';
	$sTable = '(SELECT
				purchasereturn.idtrans,
				purchasereturn.codetrans,
				purchasereturn.notrans,
				DATE_FORMAT(purchasereturn.datetrans,"%d/%m/%Y") AS datetrans,
				purchasereturn.remark,
				purchasereturn.supplierid,
				supplier.suppliername,
				purchasereturn.paytypeid,
				paytype.paytypename,
				'.$colorstatus.' AS colorstatus,
				'.$descstatus.' AS descstatus
				FROM
				purchasereturn
				LEFT JOIN supplier ON purchasereturn.supplierid = supplier.idsupplier
				LEFT JOIN paytype ON purchasereturn.paytypeid = paytype.idpaytype) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="?mod=purchasereturn_detail&key='.$aRow['idtrans'].'")">'.$aRow['notrans'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['datetrans'], $aRow['suppliername'], $aRow['paytypename'], $aRow['remark'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

