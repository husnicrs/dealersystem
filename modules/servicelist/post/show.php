<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','interator','policeno','customername','colorstatus','descstatus'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				@i:=@i+1 AS interator,
				CASE WHEN salesservice.policeno="" THEN "Tidak Diinput" ELSE salesservice.policeno END AS policeno,
				salesservice.idtrans AS idkey,
				CASE WHEN salesservice.customername="" THEN "Tidak Diinput" ELSE salesservice.customername END AS customername, 
				CASE WHEN salesservice.status = 2 THEN "green" ELSE "red" END AS colorstatus,
				CASE WHEN salesservice.status = 2 THEN "Y" ELSE "T" END AS descstatus
				FROM
				salesservice
				LEFT JOIN customer ON salesservice.customerid = customer.idcustomer, (SELECT @i:=0) AS r
				WHERE DATE(salesservice.datetrans)= CURDATE()) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkey'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idkey'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $aRow['interator'], $aRow['policeno'], $aRow['customername'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

