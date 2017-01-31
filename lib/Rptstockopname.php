	<?php
	include_once 'Database.php';
	class rptstockopname {
    private $db ='';
    private $data;
    public function __construct(){
        $this->db = new Database();
    }

	function show($datefrom, $dateto){
        $sql = "SELECT
				stockopname.idtrans AS idkey,
				stockopname.notrans,
				DATE_FORMAT(stockopname.datetrans,'%d/%m/%Y') AS datetrans,
				inventory.inventoryname,
				stockopnamedet.unit,
				stockopnamedet.stockqty,
				stockopnamedet.adjqty,
				stockopnamedet.quantity,
				FORMAT(inventory.unitprice,0) AS unitprice
				FROM
				stockopname
				INNER JOIN stockopnamedet ON stockopname.idtrans = stockopnamedet.transid
				INNER JOIN inventory ON stockopnamedet.inventoryid = inventory.idinventory
				WHERE stockopname.datetrans BETWEEN :datefrom AND :dateto";
        $arrData = array(':datefrom' => $datefrom, ':dateto' => $dateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
	function showtotal($datefrom, $dateto){
        $sql = "SELECT
				FORMAT(SUM(salesorderdet.amount),0) AS tamount,
				FORMAT(SUM(salesorderdet.quantity),0) AS tquantity
				FROM
				salesorder
				LEFT JOIN salesorderdet ON salesorder.idtrans = salesorderdet.transid
				WHERE salesorder.datetrans BETWEEN :datefrom AND :dateto";
        $arrData = array(':datefrom' => $datefrom, ':dateto' => $dateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

