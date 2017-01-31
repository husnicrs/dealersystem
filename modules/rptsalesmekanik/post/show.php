<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','nik','employeename','qtypart','amountpart','qtyservice','amountsrv','total'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
					DERIVEDTBL.idkey,
					DERIVEDTBL.nik,
					DERIVEDTBL.employeename,
					FORMAT(SUM(DERIVEDTBL.amountpart),0) AS amountpart,
					FORMAT(SUM(DERIVEDTBL.qtypart),0) AS qtypart,
					FORMAT(SUM(DERIVEDTBL.amountsrv),0) AS amountsrv,
					FORMAT(SUM(DERIVEDTBL.qtyservice),0) AS qtyservice,
					FORMAT(SUM(DERIVEDTBL.total),0) AS total
				FROM
					(
						SELECT
							salesservice.mekanikid AS idkey,
							employee.nik,
							employee.employeename,
							salesservice.datetrans,
							salesservicedet.amount AS amountpart,
							salesservicedet.quantity AS qtypart,
							0 AS amountsrv,
							0 AS qtyservice,
							salesservicedet.amount AS total
						FROM
							salesservice
						LEFT JOIN employee ON salesservice.mekanikid = employee.idemployee
						LEFT JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
						UNION ALL
							SELECT
								salesservice.mekanikid AS idkey,
								employee.nik,
								employee.employeename,
								salesservice.datetrans,
								0 AS amountpart,
								0 AS qtypart,
								salesservicedet2.subtotal AS amountsrv,
								1 AS qtyservice,
								salesservicedet2.subtotal AS total
							FROM
								salesservice
							LEFT JOIN employee ON salesservice.mekanikid = employee.idemployee
							LEFT JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
					) AS DERIVEDTBL,
				users
				WHERE DERIVEDTBL.datetrans BETWEEN users.begindate AND users.enddate AND users.username="'.$user.'"
				GROUP BY
					DERIVEDTBL.idkey,
					DERIVEDTBL.nik,
					DERIVEDTBL.employeename) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['nik'], $aRow['employeename'], $aRow['qtypart'], $aRow['amountpart'], $aRow['qtyservice'], $aRow['amountsrv'], $aRow['total']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>