<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','datetrans','account','notrans','description','debet','credit','balance'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				pettycash.idtrans AS idkey,
				pettycash.codetrans,
				pettycash.notrans,
				DATE_FORMAT(pettycash.datetrans,"%d/%m/%Y") AS datetrans,
				CONCAT(pettycashdet.acccode, " - ", pettycashdet.accname) AS account,
				LEFT(pettycashdet.description,20) AS description,
				FORMAT(pettycashdet.debet,0) AS debet,
				FORMAT(pettycashdet.credit,0) AS credit,
				FORMAT(pettycashdet.debet-pettycashdet.credit,0) AS balance
				FROM
				pettycash
				INNER JOIN pettycashdet ON pettycash.idtrans = pettycashdet.transid, users
				WHERE users.username="'.$user.'" AND pettycash.datetrans BETWEEN users.begindate AND users.enddate) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['datetrans'], $aRow['account'], $aRow['notrans'], $aRow['description'], $aRow['debet'], $aRow['credit'], $aRow['balance']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>
