<?php
	mb_internal_encoding('UTF-8');	
	$aColumns = array( 'idnotification','description','recoreded','username','status' ); 
	$sIndexColumn = 'idnotification';
	$active = 'Aktif';
	$notactive = 'Tidak Aktif';
	$sTable = '(SELECT
				notification.idnotification,
				notification.description,
				notification.recoreded,
				notification.username,
				CASE WHEN notification.status=0 THEN "Aktif" ELSE "Tidak Aktif" END AS status
				FROM
				notification ORDER BY notification.idnotification DESC) DERIVEDTBL'; 
	
	include_once 'Database.php';
	include_once 'showCore.php';
	
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idnotification'].'\')">Edit</a> | <a href="#" onClick="deleteUser(\''.$aRow['idnotification'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['description'], $aRow['recoreded'], $aRow['username'], $aRow['status'] );
		$output['aaData'][] = $row;
	}
	
	echo json_encode( $output );
	
?>