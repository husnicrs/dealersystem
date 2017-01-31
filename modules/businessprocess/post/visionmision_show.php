<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idvisionmision','task','function','vision','mision','policy' ); 
	$sIndexColumn = 'idvisionmision';
	$sTable = '(SELECT
				visionmision.idvisionmision,
				visionmision.task,
				visionmision.`function`,
				LEFT(visionmision.vision,50) AS vision,
				LEFT(visionmision.mision,50) AS mision,
				visionmision.policy
				FROM
				visionmision) DERIVEDTBL'; 
	
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idvisionmision'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idvisionmision'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $btn, $aRow['task'], $aRow['function'], $aRow['vision'], $aRow['mision'], $aRow['policy'] );
		$output['aaData'][] = $row;
	}
	
	echo json_encode( $output );

?>