<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','dono','dodate','ndno','subtotal','potongan','total','ppn','grandtotal'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				notadebet.idvehicle AS idkey,
				notadebet.dono,
				DATE_FORMAT(notadebet.dodate,"%d/%m/%Y") AS dodate,
				notadebet.ndno,
				FORMAT(notadebet.subtotal,0) AS subtotal,
				FORMAT(notadebet.potongan,0) AS potongan,
				FORMAT(notadebet.total,0) AS total,
				FORMAT(notadebet.ppn,0) AS ppn,
				FORMAT(notadebet.grandtotal,0) AS grandtotal
				FROM
				notadebet) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="?mod=notadebet_detail&key='.$aRow['ndno'].'")">'.$aRow['ndno'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['dodate'], $aRow['dono'], $aRow['subtotal'], $aRow['potongan'], $aRow['total'], $aRow['ppn'], $aRow['grandtotal']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

