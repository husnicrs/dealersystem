	<?php
	include_once 'Database.php';
	class rptsalesbypart {
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
				inventory.idinventory AS idkey,
				inventory.inventoryname,
				FORMAT(SUM(salesorderdet.amount),0) AS amount,
				FORMAT(Sum(salesorderdet.quantity),0) AS quantity,
				inventory.inventorycode,
				FORMAT(inventory.unitprice,0) AS unitprice,
				inventory.salesunit,
				rackpurchase.rackno,
				SUM((inventory.unitprice*salesorderdet.quantity)-(salesorderdet.amount)) AS discount
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
				WHERE salesorder.datetrans BETWEEN :rptdatefrom AND :rptdateto
				GROUP BY 
				inventory.inventoryname,
				salesorderdet.unit,
				inventory.inventorycode,
				inventory.salesunit,
				rackpurchase.rackno";
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

