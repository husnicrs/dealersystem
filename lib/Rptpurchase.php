	<?php
	include_once 'Database.php';
	class rptpurchase {
    private $db ='';
    private $data;
    public function __construct(){
        $this->db = new Database();
    }

	function show($datefrom, $dateto){
        $sql = "SELECT
				purchaseorder.idtrans AS idkey,
				purchaseorder.notrans,
				purchaseorder.datetrans,
				purchaseorder.supplierid,
				supplier.suppliername,
				purchaseorder.paytypeid,
				paytype.paytypename,
				purchaseorder.remark,
				inventory.inventoryname,
				purchaseorderdet.unit,
				FORMAT(purchaseorderdet.unitprice,0) AS unitprice,
				purchaseorderdet.discount,
				FORMAT(purchaseorderdet.amount,0) AS amount,
				purchaseorderdet.quantity
				FROM
				purchaseorder
				LEFT JOIN supplier ON purchaseorder.supplierid = supplier.idsupplier
				LEFT JOIN paytype ON purchaseorder.paytypeid = paytype.idpaytype
				LEFT JOIN purchaseorderdet ON purchaseorder.idtrans = purchaseorderdet.transid
				LEFT JOIN inventory ON purchaseorderdet.inventoryid = inventory.idinventory
				WHERE purchaseorder.datetrans BETWEEN :datefrom AND :dateto";
        $arrData = array(':datefrom' => $datefrom, ':dateto' => $dateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
	function showtotal($datefrom, $dateto){
        $sql = "SELECT
				FORMAT(SUM(purchaseorderdet.amount),0) AS tamount,
				FORMAT(SUM(purchaseorderdet.quantity),0) AS tquantity
				FROM
				purchaseorder
				LEFT JOIN purchaseorderdet ON purchaseorder.idtrans = purchaseorderdet.transid
				WHERE purchaseorder.datetrans BETWEEN :datefrom AND :dateto";
        $arrData = array(':datefrom' => $datefrom, ':dateto' => $dateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

