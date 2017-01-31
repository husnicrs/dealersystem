<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','notrans','datetrans','suppliername','bankname','paytypename','amount','remark','colorstatus','descstatus'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				cashpayment.idtrans AS idkey,
				cashpayment.codetrans,
				cashpayment.notrans,
				DATE_FORMAT(cashpayment.datetrans,"%d/%m/%Y") AS datetrans,
				cashpayment.supplierid,
				supplier.suppliername,
				cashpayment.bankid,
				bank.bankname,
				paytype.paytypename,
				cashpayment.paytypeid,
				FORMAT(cashpayment.amount,0) AS amount,
				cashpayment.remark,
				cashpayment.status,
				CASE WHEN cashpayment.status = 0 THEN "green" ELSE "red" END AS colorstatus,
				CASE WHEN cashpayment.status = 0 THEN "Validate" ELSE "Cancel" END AS descstatus
				FROM
				cashpayment
				LEFT JOIN supplier ON cashpayment.supplierid = supplier.idsupplier
				LEFT JOIN bank ON cashpayment.bankid = bank.idbank
				LEFT JOIN paytype ON cashpayment.paytypeid = paytype.idpaytype) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkey'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idkey'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['notrans'], $aRow['datetrans'],$aRow['suppliername'],$aRow['bankname'],$aRow['paytypename'],
		$aRow['amount'],$aRow['remark'],$status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

