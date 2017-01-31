<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','notrans','datetrans','customername','bankname','paytypename','amount','remark','colorstatus','descstatus'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				cashreceipt.idtrans AS idkey,
				cashreceipt.codetrans,
				cashreceipt.notrans,
				DATE_FORMAT(cashreceipt.datetrans,"%d/%m/%Y") AS datetrans,
				cashreceipt.customerid,
				customer.customername,
				cashreceipt.bankid,
				bank.bankname,
				paytype.paytypename,
				cashreceipt.paytypeid,
				FORMAT(cashreceipt.amount,0) AS amount,
				cashreceipt.remark,
				cashreceipt.status,
				CASE WHEN cashreceipt.status = 0 THEN "green" ELSE "red" END AS colorstatus,
				CASE WHEN cashreceipt.status = 0 THEN "Validate" ELSE "Cancel" END AS descstatus
				FROM
				cashreceipt
				LEFT JOIN customer ON cashreceipt.customerid = customer.idcustomer
				LEFT JOIN bank ON cashreceipt.bankid = bank.idbank
				LEFT JOIN paytype ON cashreceipt.paytypeid = paytype.idpaytype) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkey'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idkey'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['notrans'], $aRow['datetrans'],$aRow['customername'],$aRow['bankname'],$aRow['paytypename'],
		$aRow['amount'],$aRow['remark'],$status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

