	<?php
	include_once 'Database.php';
	class rptap {
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
				purchaseorder.top,
				FORMAT(purchaseorder.totalamount,0) AS totalamount,
				FORMAT(purchaseorder.apamount,0) AS apamount,
				FORMAT(purchaseorder.totalamount-purchaseorder.apamount,0) AS apremain
				FROM
				purchaseorder
				LEFT JOIN supplier ON purchaseorder.supplierid = supplier.idsupplier
				LEFT JOIN paytype ON purchaseorder.paytypeid = paytype.idpaytype
				WHERE purchaseorder.totalamount-purchaseorder.apamount>0
				AND purchaseorder.datetrans BETWEEN :datefrom AND :dateto";
        $arrData = array(':datefrom' => $datefrom, ':dateto' => $dateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	
	function showtotal($datefrom, $dateto){
        $sql = "SELECT
				FORMAT(SUM(purchaseorder.totalamount),0) AS ttotalamount,
				FORMAT(SUM(purchaseorder.apamount),0) AS tapamount,
				FORMAT(SUM(purchaseorder.totalamount-purchaseorder.apamount),0) AS tapremain
				FROM
				purchaseorder
				WHERE purchaseorder.datetrans BETWEEN :datefrom AND :dateto";
        $arrData = array(':datefrom' => $datefrom, ':dateto' => $dateto);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>

