	<?php
	include_once 'Database.php';
	class rptsalesbyqty {
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
					idkey,
					inventorycode,
					inventoryname,
					rackno,
					SUM(quantity) AS quantity,
					FORMAT(SUM(unitprice) / SUM(quantity),0) AS unitprice,
					FORMAT(SUM(unitprice) / SUM(quantity) * SUM(quantity),0) AS amount
				FROM
					(
						SELECT
							inventory.idinventory AS idkey,
							inventory.inventoryname,
							FORMAT(
								Sum(salesorderdet.quantity),
								0
							) AS quantity,
							inventory.inventorycode,
							rackpurchase.rackno,
							Sum(salesorderdet.unitprice) AS unitprice
						FROM
							salesorder
						LEFT JOIN salesorderdet ON salesorder.idtrans = salesorderdet.transid
						LEFT JOIN inventory ON salesorderdet.inventoryid = inventory.idinventory
						LEFT JOIN (
							SELECT
								purchaseorderdet.inventoryid,
								MAX(purchaseorderdet.rackno) AS rackno
							FROM
								purchaseorderdet
							GROUP BY
								purchaseorderdet.inventoryid
						) AS rackpurchase ON rackpurchase.inventoryid = inventory.idinventory
					WHERE
						salesorder.datetrans BETWEEN  :rptdatefrom AND :rptdateto
					GROUP BY
						inventory.inventoryname,
						inventory.inventorycode,
						rackpurchase.rackno
					UNION ALL
						SELECT
							inventory.idinventory AS idkey,
							inventory.inventoryname,
							FORMAT(
								Sum(salesservicedet.quantity),
								0
							) AS quantity,
							inventory.inventorycode,
							rackpurchase.rackno,
							Sum(salesservicedet.unitprice) AS unitprice
						FROM
							salesservice
						LEFT JOIN salesservicedet ON salesservice.idtrans = salesservicedet.transid
						LEFT JOIN inventory ON salesservicedet.inventoryid = inventory.idinventory
						LEFT JOIN (
							SELECT
								purchaseorderdet.inventoryid,
								MAX(purchaseorderdet.rackno) AS rackno
							FROM
								purchaseorderdet
							GROUP BY
								purchaseorderdet.inventoryid
						) AS rackpurchase ON rackpurchase.inventoryid = inventory.idinventory
					WHERE
						salesservice.datetrans BETWEEN  :rptdatefrom AND :rptdateto
					GROUP BY
						inventory.inventoryname,
						inventory.inventorycode,
						rackpurchase.rackno
					) AS DERIVEDTBL
				GROUP BY
					idkey,
					inventorycode,
					inventoryname,
					rackno";
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
				FORMAT(SUM(salesorderdet.amount),0) AS tamount,
				FORMAT(Sum(salesorderdet.quantity),0) AS tquantity,
				SUM((inventory.unitprice*salesorderdet.quantity)-(salesorderdet.amount)) AS tdiscount
				FROM
				salesorder
				LEFT JOIN salesorderdet ON salesorder.idtrans = salesorderdet.transid
				LEFT JOIN inventory ON salesorderdet.inventoryid = inventory.idinventory
				LEFT JOIN (SELECT
				purchaseorderdet.inventoryid,
				MAX(purchaseorderdet.rackno) AS rackno
				FROM
				purchaseorderdet
				GROUP BY
				purchaseorderdet.inventoryid) AS rackpurchase ON rackpurchase.inventoryid = inventory.idinventory,
				users
				WHERE salesorder.datetrans BETWEEN :rptdatefrom AND :rptdateto";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

