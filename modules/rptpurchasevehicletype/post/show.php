<?php
	$key = $_GET['key'];
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','dodate','dono','vehlicemodel','vehicletype','mechineno','rangkano','vehiclecolor','year','cc','otr','channelname'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
					vehiclestock.idvehicle AS idkey,
					vehiclestock.dono,
					DATE_FORMAT(vehiclestock.dodate,"%d/%m/%Y") AS dodate,
					DERIVEDTBL1.mechineno,
					DERIVEDTBL1.`year`,
					DERIVEDTBL1.vehicledate,
					DERIVEDTBL1.rangkano,
					DERIVEDTBL1.vehlicemodel,
					DERIVEDTBL1.vehlicejenis,
					DERIVEDTBL1.cc,
					DERIVEDTBL1.otr,
					DERIVEDTBL1.vehiclecolor,
					DERIVEDTBL1.vehicletype,
					IFNULL(DERIVEDTBL1.channelname, "TERJUAL") AS channelname
				FROM
					(
						SELECT
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
							channel.channelname,
							SUM(qty) AS qty
						FROM
							(
								SELECT
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
											vehiclemut.fromchannel AS channelid
										FROM
											vehiclestock
										LEFT JOIN vehicle ON vehiclestock.vehicletype = vehicle.vehlicetype
										INNER JOIN vehiclemutdet ON vehiclestock.mechineno = vehiclemutdet.mechineno
										INNER JOIN vehiclemut ON vehiclemutdet.transid = vehiclemut.idtrans
										UNION ALL
											SELECT
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
						GROUP BY
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
							channel.channelname
					) AS DERIVEDTBL1
				INNER JOIN vehiclestock ON DERIVEDTBL1.rangkano = vehiclestock.rangkano, users  
				WHERE users.username="'.$user.'" AND DERIVEDTBL1.vehicletype="'.$key.'" AND vehiclestock.dodate BETWEEN users.begindate AND users.enddate) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		$btn = '<a href="#" onClick="getDataModals(\''.$aRow['idkey'].'\')" data-dismiss="modal">Pilih</a>';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
			
		}
		
		$row = array( $aRow['dodate'], $aRow['dono'], $aRow['vehicletype'], $aRow['mechineno'], $aRow['rangkano'], $aRow['vehiclecolor'], $aRow['year'], $aRow['channelname']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>
