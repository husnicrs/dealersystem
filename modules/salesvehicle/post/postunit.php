<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
										vehiclestock.idvehicle AS idkey,
										vehiclestock.dono,
										DERIVEDTBL1.mechineno,
										DERIVEDTBL1.`year`,
										DERIVEDTBL1.vehicledate,
										DERIVEDTBL1.rangkano,
										DERIVEDTBL1.vehlicemodel AS vehiclemodel,
										DERIVEDTBL1.vehlicejenis AS vehiclejenis,
										DERIVEDTBL1.cc,
										DERIVEDTBL1.otr,
										FORMAT(DERIVEDTBL1.otr,0) AS otrsw,
										DERIVEDTBL1.vehiclecolor AS vehiclecolor,
										DERIVEDTBL1.vehicletype AS vehicletype,
										DERIVEDTBL1.channelname,
										DERIVEDTBL1.idchannel
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
												channel.idchannel,
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
									INNER JOIN vehiclestock ON DERIVEDTBL1.rangkano = vehiclestock.rangkano
									 
									WHERE
										DERIVEDTBL1.qty > 0
									AND vehiclestock.idvehicle='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	
} 
?>
