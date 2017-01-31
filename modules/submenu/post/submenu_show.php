<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idsubnavmenu','subnavmenuname','sequencenumber','submodule','navmenuname'); 
	$sIndexColumn = 'idsubnavmenu';
	$sTable = '(SELECT
				subnavmenu.idsubnavmenu,
				subnavmenu.subnavmenuname,
				subnavmenu.navmenuid,
				subnavmenu.sequencenumber,
				subnavmenu.submodule,
				subnavmenu.specialcharacter,
				navmenu.navmenuname
				FROM
				subnavmenu
				INNER JOIN navmenu ON subnavmenu.navmenuid = navmenu.idnavmenu  ORDER BY navmenu.navmenuname) DERIVEDTBL'; 
	
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idsubnavmenu'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idsubnavmenu'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['subnavmenuname'], $aRow['sequencenumber'], $aRow['submodule'], $aRow['navmenuname'] );
		$output['aaData'][] = $row;
	}
	
	echo json_encode( $output );

?>