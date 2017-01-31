<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','datetrans','cusname','vehicletype','vehiclecolor','vehiclecolorname','mechineno','policeno','stnkno','datestnk','datebpkb','tglambil','receiver','bpkbname2','bpkbno','bpkbbkservice','prosesstatus'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
					salesvehicle.idtrans AS idkey,
					DATE_FORMAT(salesvehicle.datetrans,"%d/%m/%Y") AS datetrans,
					salesvehicle.cusname,
					salesvehicle.address,
					salesvehicle.vehicletype,
					salesvehicle.vehiclecolor,
					vehiclecolor.vehiclecolorname,
					salesvehicle.mechineno,
					salesvehicle.policeno,
					salesvehicle.stnkno,
					DATE_FORMAT(salesvehicle.datestnk,"%d/%m/%Y") AS datestnk,
					DATE_FORMAT(salesvehicle.datebpkb,"%d/%m/%Y") AS datebpkb,
					DATE_FORMAT(salesvehicle.tglambil,"%d/%m/%Y") AS tglambil,
					salesvehicle.receiver,
					salesvehicle.bpkbname2,
					salesvehicle.bpkbno,
					salesvehicle.bpkbbkservice,
					employee.employeename, CASE
				WHEN salesvehicle.stnkno = ""  OR salesvehicle.stnkno IS NULL THEN
					"BELUM DIBUAT"
				ELSE
					CASE
				WHEN (salesvehicle.stnkno <> "" OR salesvehicle.stnkno IS NOT NULL)
				AND (salesvehicle.tglambil = "1970-01-01" OR salesvehicle.tglambil = "0000-00-00") THEN
					"BELUM DIAMBIL"
				ELSE
					CASE
				WHEN (salesvehicle.stnkno <> "" OR salesvehicle.stnkno IS NOT NULL)
				AND (salesvehicle.tglambil <> "1970-01-01" OR salesvehicle.tglambil <> "0000-00-00") THEN
					"SUDAH DIAMBIL"
				END
				END
				END AS prosesstatus
				FROM
					salesvehicle
				LEFT JOIN vehiclecolor ON salesvehicle.vehicletype = vehiclecolor.vehiclecolorcode
				LEFT JOIN employee ON salesvehicle.salesmanid = employee.idemployee INNER JOIN
				users ON users.statusstnk = CASE
				WHEN salesvehicle.stnkno = "" OR salesvehicle.stnkno IS NULL THEN
					"BELUM DIBUAT"
				ELSE
					CASE
				WHEN (salesvehicle.stnkno <> "" OR salesvehicle.stnkno IS NOT NULL)
				AND (salesvehicle.tglambil = "1970-01-01" OR salesvehicle.tglambil = "0000-00-00") THEN
					"BELUM DIAMBIL"
				ELSE
					CASE
				WHEN (salesvehicle.stnkno <> "" OR salesvehicle.stnkno IS NOT NULL)
				AND (salesvehicle.tglambil <> "1970-01-01" OR salesvehicle.tglambil <> "0000-00-00") THEN
					"SUDAH DIAMBIL"
				END
				END
				END
				WHERE users.username="'.$user.'" AND salesvehicle.datetrans BETWEEN users.begindate AND users.enddate) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		
		
		$row = array( $aRow['datetrans'], $aRow['cusname'], $aRow['vehicletype'], $aRow['vehiclecolorname'], $aRow['mechineno'], $aRow['policeno'],$aRow['stnkno'],$aRow['datestnk'],$aRow['datebpkb'],$aRow['tglambil'],$aRow['receiver'],$aRow['bpkbname2'],$aRow['bpkbno'],$aRow['bpkbbkservice'],$aRow['prosesstatus']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>
