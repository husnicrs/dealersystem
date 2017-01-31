	<?php
	include_once 'Database.php';
	class rptsalesservice {
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
				DERIVEDTBL.customername,
				DERIVEDTBL.vahicletype,
				DERIVEDTBL.mekanik AS mekanik,
				DERIVEDTBL.kasir AS kasir,
				RIGHT (DERIVEDTBL.notrans, 9) AS notrans,
				DERIVEDTBL.idtrans,
				format(Sum(DERIVEDTBL.sr_unitprice),0) AS sr_unitprice,
				format(Sum(DERIVEDTBL.sr_discountamt),0) AS sr_discountamt,
				format(Sum(DERIVEDTBL.sr_subtotal),0) AS sr_subtotal,
				format(Sum(DERIVEDTBL.pr_unitprice),0) AS pr_unitprice,
				format(Sum(DERIVEDTBL.pr_discountamt),0) AS pr_discountamt,
				format(Sum(DERIVEDTBL.pr_subtotal),0) AS pr_subtotal,
				FORMAT(
					SUM(
						IFNULL(DERIVEDTBL.sr_subtotal, 0) + IFNULL(DERIVEDTBL.pr_subtotal, 0)
					),
					0
				) AS total
			FROM
				(
					SELECT
						salesservice.customername,
						salesservice.vahicletype,
						employee.employeename AS mekanik,
						kasir.employeename AS kasir,
						RIGHT (salesservice.notrans, 9) AS notrans,
						salesservice.idtrans,
						Sum(salesservicedet2.unitprice) AS sr_unitprice,
						Sum(
							salesservicedet2.discountamt
						) AS sr_discountamt,
						Sum(salesservicedet2.subtotal) AS sr_subtotal,
						0 AS pr_unitprice,
						0 AS pr_discountamt,
						0 AS pr_subtotal
					FROM
						salesservice
					INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
					LEFT JOIN employee ON salesservice.mekanikid = employee.idemployee
					LEFT JOIN employee AS kasir ON salesservice.employeeid = kasir.idemployee
					WHERE
						salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
					GROUP BY
						salesservice.customername,
						salesservice.vehiclemodel,
						employee.employeename,
						kasir.employeename,
						salesservice.notrans,
						salesservice.idtrans
					UNION ALL
						SELECT
							salesservice.customername,
							salesservice.vahicletype,
							employee.employeename AS mekanik,
							kasir.employeename AS kasir,
							RIGHT (salesservice.notrans, 9) AS notrans,
							salesservice.idtrans,
							0 AS sr_unitprice,
							0 AS sr_discountamt,
							0 AS sr_subtotal,
							Sum(
								salesservicedet.unitprice * salesservicedet.quantity
							) AS pr_unitprice,
							Sum(
								salesservicedet.discountamt
							) AS pr_discountamt,
							Sum(salesservicedet.amount) AS pr_subtotal
						FROM
							salesservice
						LEFT JOIN employee ON salesservice.mekanikid = employee.idemployee
						LEFT JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
						LEFT JOIN employee AS kasir ON salesservice.employeeid = kasir.idemployee
						WHERE
							salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
						GROUP BY
							salesservice.customername,
							salesservice.vehiclemodel,
							employee.employeename,
							salesservice.notrans,
							salesservice.idtrans
				) DERIVEDTBL
			GROUP BY
				DERIVEDTBL.customername,
				DERIVEDTBL.mekanik,
				DERIVEDTBL.kasir,
				DERIVEDTBL.notrans,
				DERIVEDTBL.idtrans";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
	function showtotal($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
		
        $sql = "SELECT
				format(Sum(DERIVEDTBL.sr_unitprice),0) AS tsr_unitprice,
				format(Sum(DERIVEDTBL.sr_discountamt),0) AS tsr_discountamt,
				format(Sum(DERIVEDTBL.sr_subtotal),0) AS tsr_subtotal,
				format(Sum(DERIVEDTBL.pr_unitprice),0) AS tpr_unitprice,
				format(Sum(DERIVEDTBL.pr_discountamt),0) AS tpr_discountamt,
				format(Sum(DERIVEDTBL.pr_subtotal),0) AS tpr_subtotal,
				FORMAT(
					SUM(
						IFNULL(DERIVEDTBL.sr_subtotal, 0) + IFNULL(DERIVEDTBL.pr_subtotal, 0)
					),
					0
				) AS ttotal
			FROM
				(
					SELECT
						salesservice.customername,
						salesservice.vahicletype,
						employee.employeename AS mekanik,
						kasir.employeename AS kasir,
						RIGHT (salesservice.notrans, 9) AS notrans,
						salesservice.idtrans,
						Sum(salesservicedet2.unitprice) AS sr_unitprice,
						Sum(
							salesservicedet2.discountamt
						) AS sr_discountamt,
						Sum(salesservicedet2.subtotal) AS sr_subtotal,
						0 AS pr_unitprice,
						0 AS pr_discountamt,
						0 AS pr_subtotal
					FROM
						salesservice
					INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
					LEFT JOIN employee ON salesservice.mekanikid = employee.idemployee
					LEFT JOIN employee AS kasir ON salesservice.employeeid = kasir.idemployee
					WHERE
						salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
					GROUP BY
						salesservice.customername,
						salesservice.vehiclemodel,
						employee.employeename,
						kasir.employeename,
						salesservice.notrans,
						salesservice.idtrans
					UNION ALL
						SELECT
							salesservice.customername,
							salesservice.vahicletype,
							employee.employeename AS mekanik,
							kasir.employeename AS kasir,
							RIGHT (salesservice.notrans, 9) AS notrans,
							salesservice.idtrans,
							0 AS sr_unitprice,
							0 AS sr_discountamt,
							0 AS sr_subtotal,
							Sum(
								salesservicedet.unitprice * salesservicedet.quantity
							) AS pr_unitprice,
							Sum(
								salesservicedet.discountamt
							) AS pr_discountamt,
							Sum(salesservicedet.amount) AS pr_subtotal
						FROM
							salesservice
						LEFT JOIN employee ON salesservice.mekanikid = employee.idemployee
						LEFT JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
						LEFT JOIN employee AS kasir ON salesservice.employeeid = kasir.idemployee
						WHERE
							salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
						GROUP BY
							salesservice.customername,
							salesservice.vehiclemodel,
							employee.employeename,
							salesservice.notrans,
							salesservice.idtrans
				) DERIVEDTBL";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

	function showtotalkpb($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
		
        $sql = "SELECT
				FORMAT(SUM(salesservicedet2.subtotal),0) AS tkpbsr_subtotal
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE vehicleservice.vehliceservicetype='KPB'
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
	function showtotalnkpb($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
        $sql = "SELECT
				FORMAT(SUM(salesservicedet2.subtotal),0) AS tnkpbsr_subtotal
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE (vehicleservice.vehliceservicetype<>'KPB' OR vehicleservice.vehliceservicetype IS NULL)
				AND salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
	function showtotalntkpb($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
		
        $sql = "SELECT
				FORMAT(SUM(salesservicedet2.subtotal),0) AS tkpbnnkpbsr_subtotal
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

	function showtotalkpbdetail($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
		
        $sql = "SELECT
				FORMAT(SUM(salesservicedet2.subtotal),0) AS tkpbdet_subtotal,
				vehicleservice.vehliceservicetype,
				COUNT(salesservicedet2.idtransdet) qtykpb
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY vehicleservice.vehliceservicetype";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
	function showsumtotalkpbdetail($rptdatefrom, $rptdateto){
		$rptdatefrom = $_POST['rptdatefrom']; 
		$date = str_replace('/', '-', $rptdatefrom);
		$rptdatefrom = date('Y-m-d', strtotime($date));
		
		$rptdateto = $_POST['rptdateto']; 
		$date = str_replace('/', '-', $rptdateto);
		$rptdateto = date('Y-m-d', strtotime($date));
		
		
        $sql = "SELECT
				FORMAT(SUM(salesservicedet2.subtotal),0) AS sumtkpbsr_subtotal,
				COUNT(salesservicedet2.idtransdet) sumqtykpb
				FROM
				salesservice
				INNER JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE salesservice.datetrans BETWEEN :rptdatefrom AND :rptdateto";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
}
?>

