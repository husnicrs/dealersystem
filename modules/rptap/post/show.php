<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','notrans','datetrans','suppliername','paytypename','top','totalamount','apamount','apremain'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				purchaseorder.idtrans AS idkey,
				purchaseorder.notrans,
				purchaseorder.datetrans,
				purchaseorder.supplierid,
				supplier.suppliername,
				purchaseorder.paytypeid,
				paytype.paytypename,
				purchaseorder.remark,
				purchaseorder.top,
				FORMAT(purchaseorder.totalamount,0) AS totalamount,
				FORMAT(purchaseorder.apamount,0) AS apamount,
				FORMAT(purchaseorder.totalamount-purchaseorder.apamount,0) AS apremain
				FROM
				purchaseorder
				LEFT JOIN supplier ON purchaseorder.supplierid = supplier.idsupplier
				LEFT JOIN paytype ON purchaseorder.paytypeid = paytype.idpaytype
				WHERE purchaseorder.totalamount-purchaseorder.apamount>0) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['notrans'], $aRow['datetrans'], $aRow['suppliername'], $aRow['paytypename'], $aRow['top'], $aRow['totalamount'], $aRow['apamount'], 
		$aRow['apremain']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>