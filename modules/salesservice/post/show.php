<?php
//				WHERE DATE(salesservice.datetrans)= CURDATE()
//ORDER BY salesservice.datetrans DESC

	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idtrans','notrans','datetrans','policeno','customername','paytypename','telpno','totalamount','remark','employeename','mekanik','colorstatus','descstatus'); 
	$sIndexColumn = 'idtrans';
	$sTable = '(SELECT
				salesservice.idtrans,
				salesservice.codetrans,
				salesservice.notrans,
				DATE_FORMAT(salesservice.datetrans,"%d/%m/%Y") AS datetrans,
				salesservice.remark,
				salesservice.customerid,
				salesservice.customername,
				salesservice.`status`,
				salesservice.paytypeid,
				paytype.paytypename,
				FORMAT(salesservice.payamount,0) AS payamount,
				FORMAT(salesservice.changeamount,0) AS changeamount,
				FORMAT(salesservice.totalamount,0) AS totalamount,
				salesservice.username,
				employee.employeename,
				mekanik.employeename AS mekanik, 
				salesservice.policeno,
				salesservice.telpno,
				CASE WHEN salesservice.status = 2 THEN "green" ELSE "red" END AS colorstatus,
				CASE WHEN salesservice.status = 2 THEN "Y" ELSE "T" END AS descstatus
				FROM
				salesservice
				LEFT JOIN customer ON salesservice.customerid = customer.idcustomer
				LEFT JOIN paytype ON salesservice.paytypeid = paytype.idpaytype
				LEFT JOIN employee ON salesservice.employeeid = employee.idemployee
				LEFT JOIN employee AS mekanik ON salesservice.mekanikid = mekanik.idemployee

				) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="?mod=salesservice_detail&key='.$aRow['idtrans'].'")">'.$aRow['notrans'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['datetrans'], $aRow['policeno'], $aRow['customername'], $aRow['paytypename'], $aRow['telpno'], $aRow['employeename'],  $aRow['mekanik'], $aRow['totalamount'], $aRow['remark'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

