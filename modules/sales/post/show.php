<?php
//WHERE DATE(salesorder.datetrans)= CURDATE()
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idtrans','notrans','datetrans','customername','paytypename','employeename','duedate','brutoamount','disc','totalamount','remark'); 
	$sIndexColumn = 'idtrans';
	$sTable = '(SELECT
				salesorder.idtrans,
				salesorder.codetrans,
				salesorder.notrans,
				DATE_FORMAT(salesorder.datetrans,"%d/%m/%Y") AS datetrans,
				DATE_FORMAT(salesorder.duedate,"%d/%m/%Y") AS duedate,
				salesorder.remark,
				salesorder.customerid,
				customer.customername,
				salesorder.`status`,
				salesorder.paytypeid,
				paytype.paytypename,
				FORMAT(salesorder.payamount,0) AS payamount,
				FORMAT(salesorder.changeamount,0) AS changeamount,
				FORMAT(salesorder.brutoamount,0) AS brutoamount,
				FORMAT(IFNULL(salesorder.brutoamount,0)-IFNULL(totalamount,0),0) AS disc,
				FORMAT(salesorder.totalamount,0) AS totalamount,
				salesorder.username,
				employee.employeename
				FROM
				salesorder
				LEFT JOIN customer ON salesorder.customerid = customer.idcustomer
				LEFT JOIN paytype ON salesorder.paytypeid = paytype.idpaytype
				LEFT JOIN employee ON salesorder.employeeid = employee.idemployee) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="?mod=sales_detail&key='.$aRow['idtrans'].'")">'.$aRow['notrans'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['datetrans'], $aRow['customername'], $aRow['paytypename'], $aRow['employeename'], $aRow['duedate'], $aRow['brutoamount'], $aRow['disc'], $aRow['totalamount'], $aRow['remark']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

