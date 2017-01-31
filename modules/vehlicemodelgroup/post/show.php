<?php
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','vehlicemodelgroupname','colorstatus','descstatus'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				vehlicemodelgroup.idvehlicemodelgroup AS idkey,
				vehlicemodelgroup.vehlicemodelgroupname,
				vehlicemodelgroup.status,
				CASE WHEN vehlicemodelgroup.status = 0 THEN "green" ELSE "red" END AS colorstatus,
				CASE WHEN vehlicemodelgroup.status = 0 THEN "Active" ELSE "Not Active" END AS descstatus
				FROM
				vehlicemodelgroup) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$detail = '<a onclick="PopupCenterDual(\'winopen.php?mod=vehlicemodelgroup_detail&key='.$aRow['idkey'].'\',\'NIGRAPHIC\',\'700\',\'500\'); " href="javascript:void(0);"><button class="btn btn-default btn-xs"><i class="fa fa-folder-open"></i> Detail</button></a>';
		$status= '<span class="badge bg-'.$aRow['colorstatus'].'">'.$aRow['descstatus'].'</span>';
		$btn = '<a href="#" onClick="showModals(\''.$aRow['idkey'].'\')">Edit</a> | <a href="#" onClick="deleteData(\''.$aRow['idkey'].'\')">Delete</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		$row = array( $detail, $btn, $aRow['vehlicemodelgroupname'], $status);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>

