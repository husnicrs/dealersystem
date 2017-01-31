<?php
	mb_internal_encoding('UTF-8');	
	$aColumns = array( 'idusertype','usertypename' ); 
	$sIndexColumn = 'idusertype';
	$sTable = 'usertype'; 
	
	include_once 'Database.php';
	include_once 'showCore.php';
	
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idusertype'].'\')">Edit</a> | <a href="#" onClick="deleteUser(\''.$aRow['idusertype'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['usertypename'] );
		$output['aaData'][] = $row;
	}
	
	echo json_encode( $output );
	
?>