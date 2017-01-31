<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','vehlicemodel','vehicletype','vehiclecolor','year','qty'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
						1 AS idkey,				 
						DERIVEDTBL.`year`,
						DERIVEDTBL.vehlicemodel,
						DERIVEDTBL.vehiclecolor,
						DERIVEDTBL.vehicletype,
						SUM(qty) AS qty
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
					WHERE users.username =  "'.$user.'" 
					GROUP BY
						DERIVEDTBL.`year`,
						DERIVEDTBL.vehlicemodel,
						DERIVEDTBL.vehiclecolor,
						DERIVEDTBL.vehicletype
	HAVING SUM(qty) >0) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array($aRow['vehlicemodel'], $aRow['vehicletype'], $aRow['vehiclecolor'], $aRow['year'], $aRow['qty']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>