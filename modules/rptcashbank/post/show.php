<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','datetrans','account','nofaktur','notrans','description','debet','credit','balance'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				cashbank.idtrans AS idkey,
				cashbank.codetrans,
				cashbank.notrans,
				DATE_FORMAT(cashbank.datetrans,"%d/%m/%Y") AS datetrans,
				CONCAT(cashbankdet.acccode, " - ", cashbankdet.accname) AS account,
				LEFT(cashbankdet.description,20) AS description,
				cashbank.nofaktur,
				FORMAT(cashbankdet.debet,0) AS debet,
				FORMAT(cashbankdet.credit,0) AS credit,
				FORMAT(cashbankdet.debet-cashbankdet.credit,0) AS balance
				FROM
				cashbank
				INNER JOIN cashbankdet ON cashbank.idtrans = cashbankdet.transid, users
				WHERE users.username="'.$user.'" AND cashbank.datetrans BETWEEN users.begindate AND users.enddate) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['datetrans'], $aRow['account'], $aRow['nofaktur'], $aRow['notrans'], $aRow['description'], $aRow['debet'], $aRow['credit'], $aRow['balance']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>
