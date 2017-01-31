<?php
	$key = $_GET['key'];
	$user = $_GET['user'];
	mb_internal_encoding('UTF-8');	
	$lib='../../../lib/';
	$aColumns = array( 'idkey','datetrans1','cusname','address','telp','vehicletypesw','mechineno','leasing','channelname','salesmanname','otrsw',
	'creditgrossdpsw','subleasingsw','tunaiscpdaelersw','tunaiscpmdsw','creditnettdpsw'); 
	$sIndexColumn = 'idkey';
	$sTable = '(SELECT
				salesvehicle.idtrans AS idkey,
				salesvehicle.codetrans,
				salesvehicle.notrans,
				DATE_FORMAT(salesvehicle.datetrans,"%d/%m/%Y") AS datetrans,
				DATE_FORMAT(salesvehicle.datetrans,"%d/%m/%Y") AS datetrans1,
				salesvehicle.cusname,
				salesvehicle.policeno,
				salesvehicle.vehiclemodel AS vehiclemodelsw,
				salesvehicle.remark,
				salesvehicle.`status`,
				salesvehicle.`status` AS statustrans,
				salesvehicle.bpkbname,
				salesvehicle.noktp,
				salesvehicle.address,
				salesvehicle.nosim,
				salesvehicle.villageid,
				village.villagename,
				salesvehicle.districtsid,
				districts.districtsname,
				salesvehicle.telp,
				salesvehicle.handphone,
				salesvehicle.religion,
				salesvehicle.sex,
				DATE_FORMAT(salesvehicle.datebirth,"%d/%m/%Y") AS datebirth,
				salesvehicle.job,
				salesvehicle.maritalstatus,
				DATE_FORMAT(salesvehicle.deliverydate,"%d/%m/%Y") AS deliverydate,
				salesvehicle.pono,
				CONCAT("DO-",RIGHT(salesvehicle.notrans,8)) AS dono,
				salesvehicle.paytypeid,
				CASE WHEN salesvehicle.paytypeid=1 THEN "Tunai" ELSE CASE WHEN salesvehicle.paytypeid=2 THEN "Kredit" END END AS paytypename,
				salesvehicle.vehicletype AS vehicletypesw,
				salesvehicle.vehiclecolor,
				salesvehicle.mechineno,
				salesvehicle.rangkano,
				salesvehicle.`year`,
				salesvehicle.otr,
				FORMAT(salesvehicle.otr,0) AS otrsw,
				salesvehicle.beanotice,
				FORMAT(salesvehicle.beanotice,0) AS beanoticesw,
				salesvehicle.beaadm,
				FORMAT(salesvehicle.beaadm,0) AS beaadmsw,
				salesvehicle.bbntotal,
				FORMAT(salesvehicle.bbntotal,0) AS bbntotalsw,
				salesvehicle.stnkno,
				salesvehicle.nostock,
				DATE_FORMAT(salesvehicle.finishdate,"%d/%m/%Y") AS finishdate,
				salesvehicle.receiver,
				salesvehicle.bpkbname2,
				salesvehicle.bpkbno,
				salesvehicle.bpkbbkservice,
				salesvehicle.cityid,
				city.cityname,
				RIGHT(salesvehicle.notrans,8) AS customerid,
				salesvehicle.samsatid,
				samsat.samsatname,
				salesvehicle.tunaiscpmd,
				FORMAT(salesvehicle.tunaiscpmd,0) AS tunaiscpmdsw,
				salesvehicle.tunaiscpdaeler,
				FORMAT(salesvehicle.tunaiscpdaeler,0) AS tunaiscpdaelersw,
				salesvehicle.tunaidscmarketing,
				FORMAT(salesvehicle.tunaidscmarketing,0) AS tunaidscmarketingsw,
				salesvehicle.tunaidsckonsumen,
				FORMAT(salesvehicle.tunaidsckonsumen,0) AS tunaidsckonsumensw,
				salesvehicle.tunainettbayar,
				FORMAT(salesvehicle.tunainettbayar,0) AS tunainettbayarsw,
				salesvehicle.credittype,
				CASE WHEN salesvehicle.leasing = "" OR salesvehicle.leasing IS NULL THEN "TUNAI" ELSE salesvehicle.leasing END AS leasing,
				salesvehicle.subleasing,
				FORMAT(salesvehicle.subleasing,0) AS subleasingsw,
				salesvehicle.creditscmd,
				FORMAT(salesvehicle.creditscmd,0) AS creditscmdsw,
				salesvehicle.creditscpdealer,
				FORMAT(salesvehicle.creditscpdealer,0) AS creditscpdealersw,
				salesvehicle.creditsubsidi,
				FORMAT(salesvehicle.creditsubsidi,0) AS creditsubsidisw,
				salesvehicle.creditgrossdp,
				FORMAT(salesvehicle.creditgrossdp,0) AS creditgrossdpsw,
				salesvehicle.creditdiscmarketing,
				FORMAT(salesvehicle.creditdiscmarketing,0) AS creditdiscmarketingsw,
				salesvehicle.creditdisckonsumen,
				FORMAT(salesvehicle.creditdisckonsumen,0) AS creditdisckonsumensw,
				salesvehicle.creditnettdp,
				FORMAT(salesvehicle.creditnettdp,0) AS creditnettdpsw,
				salesvehicle.credittenor,
				FORMAT(salesvehicle.credittenor,0) AS credittenorsw,
				salesvehicle.creditcicilan,
				FORMAT(salesvehicle.creditcicilan,0) AS creditcicilansw,
				salesvehicle.creditcostadm,
				FORMAT(salesvehicle.creditcostadm,0) AS creditcostadmsw,
				salesvehicle.salesmanid,
				employee.employeename AS salesmanname,
				salesvehicle.username, 
				CONCAT("SPK/",EXTRACT(YEAR FROM datetrans),"/",roman.romanname,"/", RIGHT(salesvehicle.notrans,3)) AS spkno,
				salesvehicle.channelid,
				channel.channelname,
				DATE_FORMAT(salesvehicle.datebpkb,"%d/%m/%Y") AS datebpkb,
				DATE_FORMAT(salesvehicle.datestnk,"%d/%m/%Y") AS datestnk,
				vehiclecolor.vehiclecolorname
				FROM
				salesvehicle
				LEFT JOIN paytype ON salesvehicle.paytypeid = paytype.idpaytype
				LEFT JOIN village ON salesvehicle.villageid = village.idvillage
				LEFT JOIN districts ON salesvehicle.districtsid = districts.iddistricts
				LEFT JOIN city ON salesvehicle.cityid = city.idcity
				LEFT JOIN samsat ON salesvehicle.samsatid = samsat.idsamsat
				LEFT JOIN employee ON salesvehicle.salesmanid = employee.idemployee
				LEFT JOIN roman ON EXTRACT(MONTH FROM datetrans) = roman.number
				LEFT JOIN channel ON salesvehicle.channelid = channel.idchannel
				LEFT JOIN vehiclecolor ON salesvehicle.vehiclecolor = vehiclecolor.vehiclecolorcode,
				users
				WHERE users.username="'.$user.'" AND salesvehicle.salesmanid="'.$key.'" AND salesvehicle.datetrans BETWEEN users.begindate AND users.enddate) DERIVEDTBL'; 
	include_once ''.$lib.'Database.php';
	include_once ''.$lib.'showCore.php';
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}

		$row = array( $aRow['datetrans1'], $aRow['cusname'], $aRow['address'], $aRow['telp'], $aRow['vehicletypesw'], $aRow['mechineno'], $aRow['leasing'], $aRow['channelname'], $aRow['salesmanname'], $aRow['otrsw'], $aRow['creditgrossdpsw'], $aRow['subleasingsw'], $aRow['tunaiscpdaelersw'], $aRow['tunaiscpmdsw'], $aRow['creditnettdpsw']);
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );

?>
