	<?php
	include_once 'Database.php';
	class rptsalessuspend {
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
					salesvehicle.idtrans AS idkey,
					salesvehicle.codetrans,
					salesvehicle.notrans,
					DATE_FORMAT(
						salesvehicle.datetrans,
						'%d/%m/%Y'
					) AS datetrans,
					DATE_FORMAT(
						salesvehicle.datetrans,
						'%d/%m/%Y'
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
					'Tunai'
				ELSE
					CASE
				WHEN salesvehicle.paytypeid = 2 THEN
					'Kredit'
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
					'%d/%m/%Y'
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
				 salesvehicle.leasing,
				 salesvehicle.subleasing,
				 salesvehicle.salesmanid,
				 employee.employeename AS salesmanname,
				 employee.nik AS nik,
				 channel.channelname,
				 DATE_FORMAT(
					MAX(cashbank.datetranscashbank),
					'%d/%m/%Y'
				) AS datebayar,
				 FORMAT(
					salesvehicle.tunainettbayar + salesvehicle.creditnettdp,
					0
				) AS totaltagihan,
				 FORMAT(cashbank.amountcashbank, 0) AS totalbayar,
				 FORMAT(
					(
						salesvehicle.tunainettbayar + salesvehicle.creditnettdp
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
					INNER JOIN cashbankdet ON cashbank.idtrans = cashbankdet.transid
				) AS cashbank ON salesvehicle.idtrans = cashbank.soid
				WHERE (salesvehicle.tunainettbayar + salesvehicle.creditnettdp
					) - (IFNULL(amountcashbank, 0)) >0 AND
				salesvehicle.datetrans BETWEEN :rptdatefrom AND :rptdateto";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	

}
?>

