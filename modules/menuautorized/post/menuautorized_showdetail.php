<?php
	$key = $_GET['key'];
	$lib='../../../lib/';
	include_once ''.$lib.'Database.php';
	mb_internal_encoding('UTF-8');
	$aColumns = array( 'iduserautorized', 'menuid', 'subnavmenuname', 'sequencenumber', 'submodule', 'subnavmenuname'); 
	$sIndexColumn = 'iduserautorized';
	$sTable = '(SELECT
				userauthorized.iduserautorized,
				userauthorized.menuid,
				userauthorized.userid,
				subnavmenu.idsubnavmenu,
				subnavmenu.subnavmenuname,
				subnavmenu.navmenuid,
				subnavmenu.sequencenumber,
				subnavmenu.submodule,
				subnavmenu.specialcharacter
				FROM
				userauthorized
				INNER JOIN subnavmenu ON userauthorized.menuid = subnavmenu.idsubnavmenu WHERE userauthorized.userid='.$key.') DERIVEDTBL '; 
	
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="#" onClick="showModals(\''.$aRow['iduserautorized'].'\')">Edit</a> | <a href="#" onClick="deleteUser(\''.$aRow['iduserautorized'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['subnavmenuname'],  $aRow['sequencenumber'], $aRow['submodule'], $aRow['subnavmenuname'] );
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );
	
?>