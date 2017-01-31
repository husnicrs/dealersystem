<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','dono','vehlicemodel','vehlicetype','mechineno','rangkano','vehiclecolor','year','cc','otr','stockstatus'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				vehiclestock.idvehicle AS idkey,
				vehiclestock.dono,
				vehiclestock.seqno,
				vehiclestock.mechineno,
				vehiclestock.`year`,
				vehiclestock.vehicledate,
				vehiclestock.rangkano,
				vehicle.cc,
				FORMAT(vehicle.otr,0) AS otr,
				vehicle.vehlicetype,
				vehicle.vehlicemodel,
				vehicle.vehlicejenis,
				vehiclestock.vehiclecolor,
				CASE WHEN vehiclestock.channelid=0 AND vehiclestock.`status`=0 THEN "Ada" 
				ELSE CASE WHEN vehiclestock.channelid<>0 AND vehiclestock.`status`=0 THEN CONCAT("Mutasi: ", channel.channelname) 
				ELSE "Tidak Ada" END END AS stockstatus
				FROM
				vehiclestock
				LEFT JOIN channel ON vehiclestock.channelid = channel.idchannel
				LEFT JOIN vehicle ON vehiclestock.vehicletype = vehicle.vehlicetype
				INNER JOIN users ON vehicle.vehlicemodel = CASE WHEN users.modelfilter="" THEN vehicle.vehlicemodel ELSE users.modelfilter END
WHERE users.username="'.$user.'") DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="#" onClick="getDataModals(\''.$aRow['idkey'].'\')" data-dismiss="modal">Pilih</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
			
		}
		
		$row = array( $aRow['dono'], $aRow['vehlicemodel'], $aRow['vehlicetype'], $aRow['mechineno'], $aRow['rangkano'], $aRow['vehiclecolor'], $aRow['year'], $aRow['cc'], $aRow['otr'], $aRow['stockstatus'], $btn);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>