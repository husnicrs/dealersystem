<?php
$q = isset($_POST['q']) ? strval($_POST['q']) : '';
include '../conn.php';
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;

$offset = ($page-1)*$rows;

$result = array();

$rs = mysql_query("select count(*) from vehiclestock");
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT
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
						DERIVEDTBL1.channelname
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
											-1 AS qty,
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
					WHERE
						(DERIVEDTBL1.qty > 0)
					AND (DERIVEDTBL1.mechineno LIKE '%$q%'
					OR DERIVEDTBL1.rangkano LIKE '%$q%'
					OR DERIVEDTBL1.vehlicemodel LIKE '%$q%'
					OR DERIVEDTBL1.vehicletype LIKE '%$q%') limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($result);



?>

