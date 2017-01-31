<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idtrans','customername','vahicletype','mekanik','kasir','notrans','sr_unitprice','sr_discountamt','sr_subtotal','pr_unitprice','pr_discountamt','pr_subtotal','total'); 
	$sIndexColumn = 'idtrans';
	$sTable = '(SELECT
				salesservice.customername,
				salesservice.vahicletype,
				employee.employeename AS mekanik,
				kasir.employeename AS kasir,
				salesservice.notrans,
				salesservice.idtrans,
				FORMAT(SUM(salesservicedet2.unitprice),0) AS sr_unitprice,
				FORMAT(SUM(salesservicedet2.discountamt),0) AS sr_discountamt,
				FORMAT(SUM(salesservicedet2.subtotal),0) AS sr_subtotal,
				FORMAT(SUM(salesservicedet.unitprice*salesservicedet.quantity),0) AS pr_unitprice,
				FORMAT(SUM(salesservicedet.discountamt),0) AS pr_discountamt,
				FORMAT(SUM(salesservicedet.amount),0) AS pr_subtotal,
				FORMAT(SUM(IFNULL(salesservicedet2.subtotal,0)+IFNULL(salesservicedet.amount,0)),0) AS total
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				LEFT JOIN employee ON salesservice.mekanikid = employee.idemployee
				LEFT JOIN employee AS kasir ON salesservice.employeeid = kasir.idemployee
				LEFT JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans,
				users
				WHERE salesservice.datetrans BETWEEN users.begindate AND users.enddate AND users.username="'.$user.'"
				GROUP BY
				salesservice.customername,
				salesservice.vehiclemodel,
				employee.employeename,
				kasir.employeename,
				salesservice.notrans,
				salesservice.idtrans) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['customername'], $aRow['vahicletype'], $aRow['mekanik'], $aRow['kasir'], $aRow['notrans'], $aRow['sr_unitprice'], $aRow['sr_discountamt'], $aRow['sr_subtotal'], $aRow['pr_unitprice'], $aRow['pr_discountamt'], $aRow['pr_subtotal'], $aRow['total']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>