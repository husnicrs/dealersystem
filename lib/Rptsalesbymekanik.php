	<?php
	include_once 'Database.php';
	class rptsalesbymekanik {
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
					DERIVEDTBL.idkey,
					DERIVEDTBL.nik,
					DERIVEDTBL.employeename,
					SUM(DERIVEDTBL.amountpart) AS amountpart,
					SUM(DERIVEDTBL.qtypart) AS qtypart,
					SUM(DERIVEDTBL.amountsrv) AS amountsrv,
					SUM(DERIVEDTBL.qtyservice) AS qtyservice,
					SUM(DERIVEDTBL.total) AS total
				FROM
					(
						SELECT
							salesservice.mekanikid AS idkey,
							employee.nik,
							employee.employeename,
							salesservice.datetrans,
							salesservicedet.amount AS amountpart,
							salesservicedet.quantity AS qtypart,
							0 AS amountsrv,
							0 AS qtyservice,
							salesservicedet.amount AS total
						FROM
							salesservice
						LEFT JOIN employee ON salesservice.mekanikid = employee.idemployee
						LEFT JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
						UNION ALL
							SELECT
								salesservice.mekanikid AS idkey,
								employee.nik,
								employee.employeename,
								salesservice.datetrans,
								0 AS amountpart,
								0 AS qtypart,
								salesservicedet2.subtotal AS amountsrv,
								1 AS qtyservice,
								salesservicedet2.subtotal AS total
							FROM
								salesservice
							LEFT JOIN employee ON salesservice.mekanikid = employee.idemployee
							LEFT JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
					) AS DERIVEDTBL
				WHERE DERIVEDTBL.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY
					DERIVEDTBL.idkey,
					DERIVEDTBL.nik,
					DERIVEDTBL.employeename";
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
					SUM(DERIVEDTBL.amountpart) AS tamountpart,
					SUM(DERIVEDTBL.qtypart) AS tqtypart,
					SUM(DERIVEDTBL.amountsrv) AS tamountsrv,
					SUM(DERIVEDTBL.qtyservice) AS tqtyservice,
					SUM(DERIVEDTBL.total) AS ttotal
				FROM
					(
						SELECT
							salesservice.mekanikid AS idkey,
							employee.nik,
							employee.employeename,
							salesservice.datetrans,
							salesservicedet.amount AS amountpart,
							salesservicedet.quantity AS qtypart,
							0 AS amountsrv,
							0 AS qtyservice,
							salesservicedet.amount AS total
						FROM
							salesservice
						LEFT JOIN employee ON salesservice.mekanikid = employee.idemployee
						LEFT JOIN salesservicedet ON salesservicedet.transid = salesservice.idtrans
						UNION ALL
							SELECT
								salesservice.mekanikid AS idkey,
								employee.nik,
								employee.employeename,
								salesservice.datetrans,
								0 AS amountpart,
								0 AS qtypart,
								salesservicedet2.subtotal AS amountsrv,
								1 AS qtyservice,
								salesservicedet2.subtotal AS total
							FROM
								salesservice
							LEFT JOIN employee ON salesservice.mekanikid = employee.idemployee
							LEFT JOIN salesservicedet2 ON salesservicedet2.transid = salesservice.idtrans
					) AS DERIVEDTBL
				WHERE DERIVEDTBL.datetrans BETWEEN :rptdatefrom AND :rptdateto";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

