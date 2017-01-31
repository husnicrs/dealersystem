	<?php
	include_once 'Database.php';
	class rptincomestatement1 {
    private $db ='';
    private $data;
    public function __construct(){
        $this->db = new Database();
    }

	function show_pendapatan($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
        $sql = "SELECT
				Sum(cashbankdet.debet+cashbankdet.credit) AS pend_amount,
				accountlvl1.accountlvl1name,
				account.accountname, 'PENJUALAN TUNAI' AS description
				FROM
				cashbank
				INNER JOIN cashbankdet ON cashbank.idtrans = cashbankdet.transid
				INNER JOIN account ON cashbankdet.acccode = account.accountcode
				INNER JOIN accountlvl1 ON account.accountlvl1id = accountlvl1.idaccountlvl1
				WHERE account.accountname = 'Penjualan Tunai'
				GROUP BY
				accountlvl1.accountlvl1name,
				account.accountname
				
				UNION ALL
				
				SELECT
				Sum(cashbankdet.debet+cashbankdet.credit) AS pend_amount,
				accountlvl1.accountlvl1name,
				account.accountname, 'PENJUALAN KREDIT' AS description
				FROM
				cashbank
				INNER JOIN cashbankdet ON cashbank.idtrans = cashbankdet.transid
				INNER JOIN account ON cashbankdet.acccode = account.accountcode
				INNER JOIN accountlvl1 ON account.accountlvl1id = accountlvl1.idaccountlvl1
				WHERE account.accountname = 'Penjualan Kredit'
				GROUP BY
				accountlvl1.accountlvl1name,
				account.accountname
				
				UNION ALL
				
				SELECT
				Sum(cashbankdet.debet+cashbankdet.credit) AS pend_amount,
				accountlvl1.accountlvl1name,
				account.accountname, 'TITIPAN TANDA JADI' AS description
				FROM
				cashbank
				INNER JOIN cashbankdet ON cashbank.idtrans = cashbankdet.transid
				INNER JOIN account ON cashbankdet.acccode = account.accountcode
				INNER JOIN accountlvl1 ON account.accountlvl1id = accountlvl1.idaccountlvl1
				WHERE account.accountname = 'Titipan Tanda Jadi'
				GROUP BY
				accountlvl1.accountlvl1name,
				account.accountname
				
				UNION ALL
				
				SELECT
					SUM(cashother.total) AS pend_amount,
					'' AS accountlvl1name,
					'' AS accountname,
					cashother.cashothertype AS description
				FROM
					cashother
				WHERE
					cashother.cashothertype = 'REFUND LEASING'
				GROUP BY
					cashother.cashothertype";
		
		$arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	

	function show_tpendapatan($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
        $sql = "SELECT
					SUM(pend_amount) AS tpend_amount
				FROM
					(
						SELECT
							Sum(
								cashbankdet.debet + cashbankdet.credit
							) AS pend_amount,
							accountlvl1.accountlvl1name,
							account.accountname,
							'PENJUALAN TUNAI' AS description
						FROM
							cashbank
						INNER JOIN cashbankdet ON cashbank.idtrans = cashbankdet.transid
						INNER JOIN account ON cashbankdet.acccode = account.accountcode
						INNER JOIN accountlvl1 ON account.accountlvl1id = accountlvl1.idaccountlvl1
						WHERE
							account.accountname = 'Penjualan Tunai'
						GROUP BY
							accountlvl1.accountlvl1name,
							account.accountname
						UNION ALL
							SELECT
								Sum(
									cashbankdet.debet + cashbankdet.credit
								) AS pend_amount,
								accountlvl1.accountlvl1name,
								account.accountname,
								'PENJUALAN KREDIT' AS description
							FROM
								cashbank
							INNER JOIN cashbankdet ON cashbank.idtrans = cashbankdet.transid
							INNER JOIN account ON cashbankdet.acccode = account.accountcode
							INNER JOIN accountlvl1 ON account.accountlvl1id = accountlvl1.idaccountlvl1
							WHERE
								account.accountname = 'Penjualan Kredit'
							GROUP BY
								accountlvl1.accountlvl1name,
								account.accountname
							UNION ALL
								SELECT
									Sum(
										cashbankdet.debet + cashbankdet.credit
									) AS pend_amount,
									accountlvl1.accountlvl1name,
									account.accountname,
									'TITIPAN TANDA JADI' AS description
								FROM
									cashbank
								INNER JOIN cashbankdet ON cashbank.idtrans = cashbankdet.transid
								INNER JOIN account ON cashbankdet.acccode = account.accountcode
								INNER JOIN accountlvl1 ON account.accountlvl1id = accountlvl1.idaccountlvl1
								WHERE
									account.accountname = 'Titipan Tanda Jadi'
								GROUP BY
									accountlvl1.accountlvl1name,
									account.accountname
								UNION ALL
									SELECT
										SUM(cashother.total) AS pend_amount,
										'' AS accountlvl1name,
										'' AS accountname,
										cashother.cashothertype AS description
									FROM
										cashother
									WHERE
										cashother.cashothertype = 'REFUND LEASING'
									GROUP BY
										cashother.cashothertype
					) AS DERIVEDTBL";
		
		$arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }


	function show_pengeluaran($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
        $sql = "SELECT
				Sum(cashbankdet.debet+cashbankdet.credit) AS pend_amount,
				accountlvl1.accountlvl1name,
				account.accountname
				FROM
				cashbank
				INNER JOIN cashbankdet ON cashbank.idtrans = cashbankdet.transid
				INNER JOIN account ON cashbankdet.acccode = account.accountcode
				INNER JOIN accountlvl1 ON account.accountlvl1id = accountlvl1.idaccountlvl1
				WHERE account.accountname = 'Subsidei Leasing'
				GROUP BY
				accountlvl1.accountlvl1name,
				account.accountname
				
				UNION ALL
				
				SELECT
				Sum(cashbankdet.debet+cashbankdet.credit) AS pend_amount,
				accountlvl1.accountlvl1name,
				account.accountname
				FROM
				cashbank
				INNER JOIN cashbankdet ON cashbank.idtrans = cashbankdet.transid
				INNER JOIN account ON cashbankdet.acccode = account.accountcode
				INNER JOIN accountlvl1 ON account.accountlvl1id = accountlvl1.idaccountlvl1
				WHERE account.accountname = 'Subsidi Dealer'
				GROUP BY
				accountlvl1.accountlvl1name,
				account.accountname
				
				UNION ALL
				
				SELECT
				Sum(cashbankdet.debet+cashbankdet.credit) AS pend_amount,
				accountlvl1.accountlvl1name,
				account.accountname
				FROM
				cashbank
				INNER JOIN cashbankdet ON cashbank.idtrans = cashbankdet.transid
				INNER JOIN account ON cashbankdet.acccode = account.accountcode
				INNER JOIN accountlvl1 ON account.accountlvl1id = accountlvl1.idaccountlvl1
				WHERE account.accountname = 'SCP Main Dealer'
				GROUP BY
				accountlvl1.accountlvl1name,
				account.accountname
				
				UNION ALL
				
				SELECT
				Sum(cashbankdet.debet+cashbankdet.credit) AS pend_amount,
				accountlvl1.accountlvl1name,
				account.accountname
				FROM
				cashbank
				INNER JOIN cashbankdet ON cashbank.idtrans = cashbankdet.transid
				INNER JOIN account ON cashbankdet.acccode = account.accountcode
				INNER JOIN accountlvl1 ON account.accountlvl1id = accountlvl1.idaccountlvl1
				WHERE account.accountname = 'Pengambilan Tanda Jadi'
				GROUP BY
				accountlvl1.accountlvl1name,
				account.accountname";
		
		$arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
	function show_asset($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
        $sql = "SELECT
					1 AS idkey,
					DERIVEDTBL.vehlicemodel,
					DERIVEDTBL.unitprice,
					SUM(qty) AS stock,
					SUM(qty) * DERIVEDTBL.unitprice AS amountasset
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
									- 1 AS qty,
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
				GROUP BY
					DERIVEDTBL.vehlicemodel,
					DERIVEDTBL.unitprice
				HAVING
					SUM(qty) > 0";
		
		$arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

	
	function show_tasset($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
        $sql = "SELECT
					SUM(qty * IFNULL(DERIVEDTBL.unitprice,0)) AS tamountasset
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
									- 1 AS qty,
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
				HAVING
					SUM(qty) > 0";
		
		$arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

	function show_generalcash($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
        $sql = "SELECT
					'200' AS acccode,
					'PEMBELIAN UNIT' AS accname,
					SUM(notadebet.grandtotal) AS gbiaya_amount
				FROM
					notadebet
				UNION ALL
					SELECT
						generalcashdet.acccode,
						generalcashdet.accname,
						SUM(
							generalcashdet.debet - generalcashdet.credit
						) AS amount
					FROM
						generalcash
					INNER JOIN generalcashdet ON generalcash.idtrans = generalcashdet.transid
					GROUP BY
						generalcashdet.acccode,
						generalcashdet.accname
					UNION ALL
						SELECT
							'205' AS acccode,
							'PEMBAYARAN PAJAK' AS accname,
							SUM(cashother.total) AS gbiaya_amount
						FROM
							cashother
						WHERE
							cashother.cashothertype = 'PEMBAYARAN PAJAK'
						GROUP BY
							cashother.cashothertype";
		
		$arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

	function show_tgeneralcash($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
        $sql = "SELECT
					SUM(gbiaya_amount) AS tgbiaya_amount
				FROM
					(
						SELECT
							'200' AS acccode,
							'PEMBELIAN UNIT' AS accname,
							SUM(notadebet.grandtotal) AS gbiaya_amount
						FROM
							notadebet
						UNION ALL
							SELECT
								generalcashdet.acccode,
								generalcashdet.accname,
								SUM(
									generalcashdet.debet - generalcashdet.credit
								) AS amount
							FROM
								generalcash
							INNER JOIN generalcashdet ON generalcash.idtrans = generalcashdet.transid
							GROUP BY
								generalcashdet.acccode,
								generalcashdet.accname
							UNION ALL
								SELECT
									'205' AS acccode,
									'PEMBAYARAN PAJAK' AS accname,
									SUM(cashother.total) AS gbiaya_amount
								FROM
									cashother
								WHERE
									cashother.cashothertype = 'PEMBAYARAN PAJAK'
								GROUP BY
									cashother.cashothertype
					) AS DERIVEDTBL";
		
		$arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
	function show_pettycash($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
        $sql = "SELECT
				Sum(pettycashdet.debet) AS pettycash_debet,
				Sum(pettycashdet.credit) AS pettycash_credit,
				pettycashdet.acccode AS pettycash_accountcode,
				pettycashdet.accname AS pettycash_accountname
				FROM
				pettycash
				INNER JOIN pettycashdet ON pettycash.idtrans = pettycashdet.transid
				GROUP BY
				pettycashdet.accname,
				pettycashdet.acccode";
		$arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

	function show_tpettycash($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
        $sql = "SELECT
				Sum(pettycashdet.debet-pettycashdet.credit) AS pettycash_amount
				FROM
				pettycash
				INNER JOIN pettycashdet ON pettycash.idtrans = pettycashdet.transid";
		$arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

