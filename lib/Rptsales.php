	<?php
	include_once 'Database.php';
	class rptsales {
    private $db ='';
    private $data;
    public function __construct(){
        $this->db = new Database();
    }

	function show($datefrom, $dateto){
        $sql = "SELECT
				salesorder.idtrans AS idkey,
				salesorder.notrans,
				salesorder.datetrans,
				salesorder.customerid,
				customer.customername,
				salesorder.paytypeid,
				paytype.paytypename,
				salesorder.remark,
				inventory.inventoryname,
				salesorderdet.unit,
				FORMAT(salesorderdet.unitprice,0) AS unitprice,
				salesorderdet.discount,
				FORMAT(salesorderdet.amount,0) AS amount,
				salesorderdet.quantity
				FROM
				salesorder
				LEFT JOIN customer ON salesorder.customerid = customer.idcustomer
				LEFT JOIN paytype ON salesorder.paytypeid = paytype.idpaytype
				LEFT JOIN salesorderdet ON salesorder.idtrans = salesorderdet.transid
				LEFT JOIN inventory ON salesorderdet.inventoryid = inventory.idinventory
				WHERE salesorder.datetrans BETWEEN :datefrom AND :dateto";
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

