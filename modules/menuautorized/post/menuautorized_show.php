<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'iduser','username', 'name', 'email', 'usertypename'); 
	$sIndexColumn = 'iduser';
	$sTable = '(SELECT
				users.iduser,
				users.username,
				users.`name`,
				usertype.usertypename,
				users.email
				FROM
				users
				INNER JOIN usertype ON users.usertypeid = usertype.idusertype) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="?mod=menuautorized_detail&key='.$aRow['iduser'].'")">Otorisasi</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['username'],  $aRow['name'], $aRow['email'], $aRow['usertypename'] );
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );
	
?>