<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','accountcode','accountname','accountlvl1name','colorstatus','descstatus'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				account.idaccount AS idkey,
				account.accountname,
				account.accountcode,
				account.status,
				CASE WHEN account.status = 0 THEN "green" ELSE "red" END AS colorstatus,
				CASE WHEN account.status = 0 THEN "Active" ELSE "Not Active" END AS descstatus,
				account.accountlvl1id,
				accountlvl1.accountlvl1name
				FROM
				account
				LEFT JOIN accountlvl1 ON account.accountlvl1id = accountlvl1.idaccountlvl1) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkey'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idkey'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['accountcode'], $aRow['accountname'], $aRow['accountlvl1name'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>