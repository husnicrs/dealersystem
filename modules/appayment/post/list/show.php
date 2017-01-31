<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../../lib/';
	$table="cashpayment";
	$descstatus = "CASE WHEN ".$table.".status = 0 THEN 'Validate' ELSE CASE WHEN ".$table.".status = 9 THEN 'Cancel' END END";
	$colorstatus = "CASE WHEN ".$table.".status = 0 THEN 'green' ELSE CASE WHEN ".$table.".status = 9 THEN 'red' END END";
	$aColumns = array( 'idtrans','notrans','datetrans','suppliername','bankname','paytypename','amount','datefaktur','nofaktur','remark','colorstatus','descstatus'); 
	$sIndexColumn = 'idtrans';
	$sTable = '(SELECT
				cashpayment.idtrans,
				cashpayment.codetrans,
				cashpayment.notrans,
				DATE_FORMAT(cashpayment.datetrans,"%d/%m/%Y") AS datetrans,
				DATE_FORMAT(cashpayment.datefaktur,"%d/%m/%Y") AS datefaktur,
				cashpayment.nofaktur,
				cashpayment.supplierid,
				supplier.suppliername,
				cashpayment.bankid,
				bank.bankname,
				paytype.paytypename,
				cashpayment.paytypeid,
				FORMAT(cashpayment.amount,0) AS amount,
				cashpayment.remark,
				'.$colorstatus.' AS colorstatus,
				'.$descstatus.' AS descstatus
				FROM
				cashpayment
				LEFT JOIN supplier ON cashpayment.supplierid = supplier.idsupplier
				LEFT JOIN bank ON cashpayment.bankid = bank.idbank
				LEFT JOIN paytype ON cashpayment.paytypeid = paytype.idpaytype
				WHERE cashpayment.codetrans="APPY") DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="index.php?mod=appayment_ldetail&key='.$aRow['idtrans'].';">'.$aRow['notrans'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['datetrans'],$aRow['suppliername'],$aRow['bankname'],$aRow['paytypename'],$aRow['nofaktur'],$aRow['datefaktur'],
		$aRow['amount'],$aRow['remark'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

