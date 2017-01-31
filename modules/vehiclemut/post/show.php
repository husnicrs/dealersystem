<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$descstatus = "CASE WHEN vehiclemut.status = 9 THEN 'Cancel' ELSE 'Validate' END";
	$colorstatus = "CASE WHEN vehiclemut.status = 9 THEN 'orange' ELSE 'green' END";
	$aColumns = array( 'idtrans','notrans','datetrans','fromchannel','tochannel','remark','colorstatus','descstatus'); 
	$sIndexColumn = 'idtrans';
	$sTable = '(SELECT
				vehiclemut.idtrans,
				vehiclemut.codetrans,
				vehiclemut.notrans,
				DATE_FORMAT(vehiclemut.datetrans,"%d/%m/%Y") AS datetrans,
				vehiclemut.remark,
				vehiclemut.matusedtypeid,
				'.$colorstatus.' AS colorstatus,
				'.$descstatus.' AS descstatus,
				fromchannel.channelname AS fromchannel,
				tochannel.channelname AS tochannel
				FROM
				vehiclemut
				LEFT JOIN channel AS fromchannel ON vehiclemut.fromchannel = fromchannel.idchannel
				LEFT JOIN channel AS tochannel ON vehiclemut.tochannel = tochannel.idchannel) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="?mod=vehiclemut_detail&key='.$aRow['idtrans'].'")">'.$aRow['notrans'].'</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array($btn, $aRow['datetrans'], $aRow['fromchannel'], $aRow['tochannel'], $aRow['remark'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

