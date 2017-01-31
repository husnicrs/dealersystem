<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','dono','dodate','vehlicemodel','vehicletype','mechineno','rangkano','vehiclecolor','year','unitprice','stockstatus','channelname'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
					1 AS idkey,
					DERIVEDTBL.dono,
					DATE_FORMAT(
					DERIVEDTBL.dodate,
						"%d/%m/%Y"
					) AS dodate,
					DERIVEDTBL.mechineno,
					DERIVEDTBL.`year`,
					DERIVEDTBL.vehicledate,
					DERIVEDTBL.rangkano,
					DERIVEDTBL.vehlicemodel,
					DERIVEDTBL.vehlicejenis,
					DERIVEDTBL.cc,
					DERIVEDTBL.otr,
					DERIVEDTBL.vehiclecolor,
					DERIVEDTBL.vehicletype,
					FORMAT(DERIVEDTBL.unitprice,0) unitprice,
					channel.channelname,
					CASE WHEN SUM(qty) >0 THEN "Ada" ELSE "Tidak Ada" END AS stockstatus
				FROM
					(
						SELECT
							vehiclestock.dono,
							vehiclestock.dodate,
							vehiclestock.mechineno,
							vehiclestock.`year`,
							vehiclestock.vehicledate,
							vehiclestock.rangkano,
							vehicle.vehlicemodel,
							vehicle.vehlicejenis,
							vehicle.cc,
							vehicle.otr,
							vehiclestock.vehiclecolor,
							vehiclestock.vehicletype,
							vehiclestock.unitprice,
							1 AS qty,
							1 AS channelid
						FROM
							vehiclestock
						LEFT JOIN channel ON vehiclestock.channelid = channel.idchannel
						LEFT JOIN vehicle ON vehiclestock.vehicletype = vehicle.vehlicetype
						UNION ALL
							SELECT
								vehiclestock.dono,
								vehiclestock.dodate,
								vehiclestock.mechineno,
								vehiclestock.`year`,
								vehiclestock.vehicledate,
								vehiclestock.rangkano,
								vehicle.vehlicemodel,
								vehicle.vehlicejenis,
								vehicle.cc,
								vehicle.otr,
								vehiclestock.vehiclecolor,
								vehiclestock.vehicletype,
								vehiclestock.unitprice,
								- 1 AS qty,
								salesvehicle.channelid
							FROM
								vehiclestock
							LEFT JOIN vehicle ON vehiclestock.vehicletype = vehicle.vehlicetype
							INNER JOIN salesvehicle ON vehiclestock.mechineno = salesvehicle.mechineno
							UNION ALL
								SELECT
											vehiclestock.dono,
											vehiclestock.dodate,
											vehiclestock.mechineno,
											vehiclestock.`year`,
											vehiclestock.vehicledate,
											vehiclestock.rangkano,
											vehicle.vehlicemodel,
											vehicle.vehlicejenis,
											vehicle.cc,
											vehicle.otr,
											vehiclestock.vehiclecolor,
											vehiclestock.vehicletype,
											vehiclestock.unitprice,
											-1 AS qty,
											vehiclemut.fromchannel AS channelid
											FROM
											vehiclestock
											LEFT JOIN vehicle ON vehiclestock.vehicletype = vehicle.vehlicetype
											INNER JOIN vehiclemutdet ON vehiclestock.mechineno = vehiclemutdet.mechineno
											INNER JOIN vehiclemut ON vehiclemutdet.transid = vehiclemut.idtrans
								UNION ALL
									SELECT
												vehiclestock.dono,
												vehiclestock.dodate,
												vehiclestock.mechineno,
												vehiclestock.`year`,
												vehiclestock.vehicledate,
												vehiclestock.rangkano,
												vehicle.vehlicemodel,
												vehicle.vehlicejenis,
												vehicle.cc,
												vehicle.otr,
												vehiclestock.vehiclecolor,
												vehiclestock.vehicletype,
												vehiclestock.unitprice,
												1 AS qty,
												vehiclemut.tochannel AS channelid
												FROM
												vehiclestock
												LEFT JOIN vehicle ON vehiclestock.vehicletype = vehicle.vehlicetype
												INNER JOIN vehiclemutdet ON vehiclestock.mechineno = vehiclemutdet.mechineno
												INNER JOIN vehiclemut ON vehiclemutdet.transid = vehiclemut.idtrans
					) AS DERIVEDTBL
				LEFT JOIN channel ON DERIVEDTBL.channelid = channel.idchannel
				INNER JOIN users ON DERIVEDTBL.vehicletype = CASE
				WHEN users.typefilter = "" THEN
					DERIVEDTBL.vehicletype
				ELSE
					users.typefilter
				END AND channel.channelname = CASE
				WHEN users.channelfilter = "" THEN
					channel.channelname
				ELSE
					users.channelfilter
				END
				WHERE users.username = "'.$user.'"
				GROUP BY
					DERIVEDTBL.dono,
					DERIVEDTBL.dodate,
					DERIVEDTBL.mechineno,
					DERIVEDTBL.`year`,
					DERIVEDTBL.vehicledate,
					DERIVEDTBL.rangkano,
					DERIVEDTBL.vehlicemodel,
					DERIVEDTBL.vehlicejenis,
					DERIVEDTBL.cc,
					DERIVEDTBL.otr,
					DERIVEDTBL.vehiclecolor,
					DERIVEDTBL.vehicletype,
					DERIVEDTBL.unitprice,
					channel.channelname
				HAVING SUM(qty) >0) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
			
		}
		
		$row = array($aRow['dono'], $aRow['dodate'], $aRow['vehlicemodel'], $aRow['vehicletype'], $aRow['mechineno'], $aRow['rangkano'], $aRow['vehiclecolor'], $aRow['year'], $aRow['unitprice'], $aRow['stockstatus'], $aRow['channelname']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>