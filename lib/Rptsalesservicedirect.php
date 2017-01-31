	<?php
	include_once 'Database.php';
	class rptsalesservicedirect {
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
		
		
        $sql = "SELECT DERIVEDTBL1.inventorygroupname, GROUP_CONCAT(REPLACE(DERIVEDTBL1.inventorycode,',',' ')) AS inventorycode, GROUP_CONCAT(REPLACE(DERIVEDTBL1.inventoryname,',',' ')) AS inventoryname, GROUP_CONCAT(DERIVEDTBL1.quantity) AS quantity, GROUP_CONCAT(DERIVEDTBL1.subtotal) AS subtotal,
				GROUP_CONCAT(DERIVEDTBL1.discount) AS discount, GROUP_CONCAT(DERIVEDTBL1.amount) AS amount
				FROM
				(
				SELECT  DERIVEDTBL.inventorygroupname, DERIVEDTBL.inventorycode, DERIVEDTBL.inventoryname, SUM(DERIVEDTBL.quantity) AS quantity, SUM(DERIVEDTBL.subtotal) AS subtotal, SUM(DERIVEDTBL.discount) AS discount, SUM(DERIVEDTBL.amount) AS amount
				FROM
				(
				SELECT
				inventory.inventoryname,
				salesorderdet.unitprice*salesorderdet.quantity AS subtotal,
				salesorderdet.amount AS amount,
				salesorderdet.quantity AS quantity,
				inventory.inventorycode,
				(salesorderdet.unitprice*salesorderdet.quantity)-(salesorderdet.amount) AS discount,
				inventorygroup.inventorygroupname,
				salesorder.datetrans
				FROM
				salesorder
				LEFT JOIN salesorderdet ON salesorder.idtrans = salesorderdet.transid
				LEFT JOIN inventory ON salesorderdet.inventoryid = inventory.idinventory
				LEFT JOIN inventorygroupdet ON inventory.idinventory = inventorygroupdet.inventoryid
				LEFT JOIN inventorygroup ON inventorygroupdet.inventorygroupid = inventorygroup.idinventorygroup
WHERE salesorder.status <> 10
				GROUP BY 
				inventorygroup.inventorygroupname,
				inventory.inventoryname,
				inventory.inventorycode,
				salesorder.datetrans) AS DERIVEDTBL
				WHERE DERIVEDTBL.datetrans BETWEEN :rptdatefrom AND :rptdateto 
				GROUP BY DERIVEDTBL.inventorycode, DERIVEDTBL.inventoryname, DERIVEDTBL.inventorygroupname
				) AS DERIVEDTBL1
				GROUP BY DERIVEDTBL1.inventorygroupname";
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
				SUM(salesorder.brutoamount) AS tamount,
				SUM(IFNULL(salesorder.brutoamount,0)-IFNULL(salesorder.totalamount,0)) AS tpot,
				SUM(salesorder.totalamount) AS tnetto
				FROM
				salesorder
				WHERE salesorder.datetrans BETWEEN :rptdatefrom AND :rptdateto AND salesorder.status <> 10";
        $arrData = array(':rptdatefrom' => $rptdatefrom, ':rptdateto' => $rptdateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

