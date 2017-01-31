<?php
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','datetrans1','cusname','address','telp','vehicletypesw','mechineno','leasing','channelname','salesmanname','totalbayar','datebayar','sisabayar','totaltagihan','nik'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
					salesvehicle.idtrans AS idkey,
					salesvehicle.codetrans,
					salesvehicle.notrans,
					DATE_FORMAT(
						salesvehicle.datetrans,
						"%d/%m/%Y"
					) AS datetrans,
					DATE_FORMAT(
						salesvehicle.datetrans,
						"%d/%m/%Y"
					) AS datetrans1,
					salesvehicle.cusname,
					salesvehicle.policeno,
					salesvehicle.vehiclemodel AS vehiclemodelsw,
					salesvehicle.remark,
					salesvehicle.address,
					salesvehicle.telp,
					salesvehicle.handphone,
					salesvehicle.paytypeid,
					salesvehicle.vehicletype AS vehicletypesw,
					CASE
				WHEN salesvehicle.paytypeid = 1 THEN
					"Tunai"
				ELSE
					CASE
				WHEN salesvehicle.paytypeid = 2 THEN
					"Kredit"
				END
				END AS paytypename,
				 salesvehicle.vehiclecolor,
				 salesvehicle.mechineno,
				 salesvehicle.rangkano,
				 salesvehicle.`year`,
				 salesvehicle.otr,
				 FORMAT(salesvehicle.otr, 0) AS otrsw,
				 salesvehicle.beanotice,
				 FORMAT(salesvehicle.beanotice, 0) AS beanoticesw,
				 salesvehicle.beaadm,
				 FORMAT(salesvehicle.beaadm, 0) AS beaadmsw,
				 salesvehicle.bbntotal,
				 FORMAT(salesvehicle.bbntotal, 0) AS bbntotalsw,
				 salesvehicle.stnkno,
				 salesvehicle.nostock,
				 DATE_FORMAT(
					salesvehicle.finishdate,
					"%d/%m/%Y"
				) AS finishdate,
				 salesvehicle.receiver,
				 salesvehicle.bpkbname2,
				 salesvehicle.bpkbno,
				 salesvehicle.bpkbbkservice,
				 salesvehicle.cityid,
				 RIGHT (salesvehicle.notrans, 8) AS customerid,
				 salesvehicle.samsatid,
				 samsat.samsatname,
				 salesvehicle.tunaiscpmd,
				 CASE WHEN salesvehicle.leasing = "" OR salesvehicle.leasing IS NULL THEN "TUNAI" ELSE salesvehicle.leasing END AS leasing,
				 salesvehicle.subleasing,
				 salesvehicle.salesmanid,
				 employee.employeename AS salesmanname,
				 employee.nik AS nik,
				 channel.channelname,
				 DATE_FORMAT(
					cashbank.datetranscashbank,
					"%d/%m/%Y"
				) AS datebayar,
				 FORMAT(
					IFNULL(salesvehicle.tunainettbayar,0) + IFNULL(salesvehicle.creditnettdp,0),
					0
				) AS totaltagihan,
				 FORMAT(IFNULL(cashbank.amountcashbank,0), 0) AS totalbayar,
				 FORMAT(
					(
						IFNULL(salesvehicle.tunainettbayar,0) + IFNULL(salesvehicle.creditnettdp,0)
					) - (IFNULL(amountcashbank, 0)),
					0
				) AS sisabayar
				FROM
					salesvehicle
				LEFT JOIN paytype ON salesvehicle.paytypeid = paytype.idpaytype
				LEFT JOIN samsat ON salesvehicle.samsatid = samsat.idsamsat
				LEFT JOIN employee ON salesvehicle.salesmanid = employee.idemployee
				LEFT JOIN roman ON EXTRACT(MONTH FROM datetrans) = roman.number
				LEFT JOIN channel ON salesvehicle.channelid = channel.idchannel
				LEFT JOIN vehiclecolor ON salesvehicle.vehiclecolor = vehiclecolor.vehiclecolorcode
				LEFT JOIN (
					SELECT
						SUM(cashbankdet.debet) AS amountcashbank,
						cashbank.soid,
						MAX(cashbank.datetrans) datetranscashbank
					FROM
						cashbank
					INNER JOIN cashbankdet ON cashbank.idtrans = cashbankdet.transid GROUP BY cashbank.soid
				) AS cashbank ON salesvehicle.idtrans = cashbank.soid,
				 users
				WHERE (IFNULL(salesvehicle.tunainettbayar,0) + IFNULL(salesvehicle.creditnettdp,0)
					) - (IFNULL(amountcashbank, 0)) >0
				AND
					users.username = "'.$user.'"
				AND salesvehicle.datetrans BETWEEN users.begindate
				AND users.enddate) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['datetrans1'], $aRow['cusname'], $aRow['vehicletypesw'], $aRow['mechineno'], $aRow['leasing'], $aRow['salesmanname'], $aRow['channelname'], $aRow['datebayar'], $aRow['totaltagihan'], $aRow['totalbayar'], $aRow['sisabayar'], $aRow['nik']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>
