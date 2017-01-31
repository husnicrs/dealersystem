	<?php
	include_once 'Database.php';
	class rptpurchasevehicle {
    private $db ='';
    private $data;
    public function __construct(){
        $this->db = new Database();
    }

	function show($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));

        $sql = "SELECT
					vehiclestock.idvehicle AS idkey,
					vehiclestock.dono,
					DATE_FORMAT(vehiclestock.dodate,'%d/%m/%Y') AS dodate,
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
					FORMAT(vehiclestock.unitprice,0) AS unitprice,
					IFNULL(DERIVEDTBL1.channelname, 'TERJUAL') AS channelname
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
				INNER JOIN vehiclestock ON DERIVEDTBL1.rangkano = vehiclestock.rangkano
				WHERE vehiclestock.dodate BETWEEN :rptdatefrom AND :rptdateto";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	

}
?>

