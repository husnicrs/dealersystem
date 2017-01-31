<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey', 'policeno','customername','address','mechineno','datetrans','notrans','employeename'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT 1 AS idkey, transaksi.policeno, transaksi.customername, transaksi.address, transaksi.mechineno, transaksi.datetrans, transaksi.notrans, mekanik.employeename
				FROM
				(
				SELECT
				salesservice.policeno,
				salesservice.customername,
				salesservice.address,
				CONCAT(salesservice.vehiclemodel, " / ", salesservice.mechineno) AS mechineno,
				MAX(salesservice.datetrans) AS datetrans,
				MAX(salesservice.notrans) AS notrans
				FROM
				salesservice
				LEFT JOIN employee ON salesservice.employeeid = employee.idemployee
				GROUP BY
				policeno,
				salesservice.customername,
				salesservice.address,
				CONCAT(salesservice.vehiclemodel, " / ", salesservice.mechineno) 
				) transaksi
				LEFT JOIN
				(SELECT
				employee.employeename,
				salesservice.notrans
				FROM
				salesservice
				INNER JOIN employee ON salesservice.mekanikid = employee.idemployee) AS mekanik
				ON transaksi.notrans=mekanik.notrans,
				users
				WHERE DATEDIFF(users.enddate, transaksi.datetrans)>180 AND users.username="'.$user.'") DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['policeno'], $aRow['customername'], $aRow['address'], $aRow['mechineno'], $aRow['datetrans'], $aRow['notrans'], $aRow['employeename']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>