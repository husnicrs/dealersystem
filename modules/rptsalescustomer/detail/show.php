<?php
	$key = $_GET['key'];
	mb_internal_encoding('UTF-8');
	$lib='../../../lib/';
	$aColumns = array( 'idkey', 'policeno', 'customername', 'customername', 'telpno', 'notrans', 'datetrans', 'kasir', 'mekanik', 'tservice', 'tpart'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				salesservice.policeno AS idkey,
				salesservice.policeno,
				salesservice.customername,
				salesservice.notrans,
				DATE_FORMAT(salesservice.datetrans,"%d/%m/%Y") AS datetrans,
				FORMAT(SUM(salesservicedet2.subtotal),0) AS tservice,
				FORMAT(SUM(salesservicedet.amount),0) AS tpart,
				employee.employeename AS kasir,
				mekanik.employeename AS mekanik,
				salesservice.telpno
				FROM
				salesservice
				LEFT JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
				LEFT JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				LEFT JOIN employee ON salesservice.employeeid = employee.idemployee
				LEFT JOIN employee AS mekanik ON salesservice.mekanikid = mekanik.idemployee
				WHERE salesservice.policeno="'.$key.'"
				GROUP BY
				salesservice.policeno,
				salesservice.customername,
				salesservice.notrans,
				salesservice.datetrans,
				employee.employeename,
				mekanik.employeename,
				salesservice.telpno) DERIVEDTBL '; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($aRow['policeno'], $aRow['customername'], $aRow['telpno'],  $aRow['notrans'], $aRow['datetrans'], $aRow['kasir'], $aRow['mekanik'], $aRow['tservice'], $aRow['tpart']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );
	
?>