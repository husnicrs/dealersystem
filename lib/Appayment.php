<?php
include_once 'Database.php';
class appayment {
    private $db = '';
    private $data;
	private $table = 'cashpayment';
    public function __construct() {
        $this->db = new Database();
    }
	function showOpenHeader($key) {
        $sql = "SELECT
				supplier.idsupplier,
				supplier.suppliername
				FROM
				supplier
				WHERE  supplier.idsupplier=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }
	function showListHeader($key) {
        $sql = "SELECT
				cashpayment.idtrans AS idkey,
				cashpayment.codetrans,
				cashpayment.notrans,
				DATE_FORMAT(cashpayment.datetrans,'%d/%m/%Y') AS datetrans,
				cashpayment.supplierid,
				supplier.suppliername,
				cashpayment.bankid,
				bank.bankname AS bankname,
				paytype.paytypename,
				cashpayment.paytypeid,
				FORMAT(cashpayment.amount,0) AS amount,
				cashpayment.remark,
				cashpayment.nofaktur,
				DATE_FORMAT(cashpayment.datefaktur,'%d/%m/%Y') AS datefaktur,
				cashpayment.status
				FROM
				cashpayment
				LEFT JOIN supplier ON cashpayment.supplierid = supplier.idsupplier
				LEFT JOIN bank ON cashpayment.bankid = bank.idbank
				LEFT JOIN paytype ON cashpayment.paytypeid = paytype.idpaytype
				WHERE  cashpayment.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }
	function showOpenDetail($key) {
        $sql = "SELECT
				purchaseorder.supplierid AS idkey,
				purchaseorder.totalamount AS amount,
				purchaseorder.apamount AS payamount,
				purchaseorder.totalamount-purchaseorder.apamount AS remainamount,
				purchaseorder.notrans,
				DATE_FORMAT(purchaseorder.datetrans,'%d/%m/%Y') AS datetrans,
				purchaseorder.remark,
				purchaseorder.idtrans,
				DATE_FORMAT(purchaseorder.duedate,'%d/%m/%Y') AS duedate
				FROM
				purchaseorder
				LEFT JOIN paytype ON purchaseorder.paytypeid = paytype.idpaytype
				WHERE purchaseorder.totalamount-purchaseorder.apamount>0 AND purchaseorder.paytypeid=2 AND purchaseorder.supplierid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

    function pickheader($codetrans, $notrans, $datetrans, $supplierid) {
        $sql = "INSERT INTO cashpayment (codetrans, notrans, datetrans, supplierid)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(cashpayment.notrans),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW()), :supplierid 
				FROM
				cashpayment
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans, ':notrans' => $notrans, ':datetrans' => $datetrans, ':supplierid' => $supplierid);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:winopen.php?mod=appayment_ldetail&key=$key");
        }		
    }

	function pickdetail($idtrans, $totalpick) {
		$key = $this->db->lastID();		
		$count = count($_POST['checkedid']);
		
		for($i=0;$i<=$count;$i++) {
		$idtrans= $_POST['checkedid'][$i];
		$totalpick= $_POST['totalpick'][$i];
		
        $sql = "INSERT INTO appaymentdet (purchaseorderid, transid, totalamount)
				SELECT
				:idtrans,
				'".$key."',
				:totalpick
				FROM
				purchaseorder
				WHERE purchaseorder.idtrans = '".$idtrans."'";
        $arrData = array(':idtrans' => $idtrans, ':totalpick' => $totalpick);
        $this->data = $this->db->insertData($sql, $arrData);
		} 
		if ($this->data == true) {
            
        }
		return $this->data;
    }
	
	function updateremain($idtrans) {
		$count = count($_POST['checkedid']);
		
		for($i=0;$i<=$count;$i++) {
		$idtrans= $_POST['checkedid'][$i];
		
        $sql = "UPDATE purchaseorder A INNER JOIN (SELECT
				appaymentdet.purchaseorderid,
				SUM(appaymentdet.totalamount) AS totalamount
				FROM
				appaymentdet
				WHERE purchaseorderid = '".$idtrans."'
				GROUP BY appaymentdet.purchaseorderid) AS U SET A.apamount=U.totalamount WHERE A.idtrans=U.purchaseorderid";
        $arrData = array(':idtrans' => $idtrans);
        $this->data = $this->db->insertData($sql, $arrData);
		} 
		if ($this->data == true) {
            
        }
		return $this->data;
    }
	
    function saveclose($key, $datetrans, $paytypeid, $bankid, $nofaktur, $datefaktur, $remark) {
		$keysupplier=$_POST['supplierid'];
		$moddetail=$_GET['mod'];
		$modulename=str_replace("_ldetail","", $moddetail );
		
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
		
		$vardatetime1 = $_POST['datefaktur']; 
		$date1 = str_replace('/', '-', $vardatetime1);
		$datefaktur = date('Y-m-d', strtotime($date1));
				
        $sql = "UPDATE cashpayment SET datetrans=:datetrans, paytypeid=:paytypeid, bankid=:bankid, nofaktur=:nofaktur, datefaktur=:datefaktur, remark=:remark WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':paytypeid' => $paytypeid, ':bankid' => $bankid, ':nofaktur' => $nofaktur, ':datefaktur' => $datefaktur,':remark' => $remark, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=appayment");
        }
        return $this->data;
    }
	function cancel($key) {
		$key=$_POST['supplierid'];
		$moddetail=$_GET['mod'];
		$modulename=str_replace("_ldetail","", $moddetail );
        $sql = "UPDATE $this->table SET status=9 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=appayment");
        }
        return $this->data;
    }
	function delete($key) {
		$key=$_POST['supplierid'];
		$moddetail=$_GET['mod'];
		$modulename=str_replace("_ldetail","", $moddetail );
        $sql = "DELETE FROM $this->table WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:winopen.php?mod=appayment");
        }
    }
	function showslipdetail($key) {
        $sql = "SELECT
				purchaseorderdet.idtransdet,
				purchaseorderdet.transid,
				purchaseorderdet.inventoryid,
				inventory.inventorycode,
				inventory.inventoryname,
				purchaseorderdet.unit,
				purchaseorderdet.unitprice,
				purchaseorderdet.discount,
				purchaseorderdet.amount,
				purchaseorderdet.quantity,
				salesorder.notrans,
				salesorder.datetrans
				FROM
				purchaseorderdet
				INNER JOIN inventory ON purchaseorderdet.inventoryid = inventory.idinventory
				INNER JOIN salesorderdet ON purchaseorderdet.salesorderdetid = salesorderdet.idtransdet
				INNER JOIN salesorder ON salesorderdet.transid = salesorder.idtrans
				WHERE  purchaseorderdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	function showsliptotal($key) {
        $sql = "SELECT
				SUM(purchaseorderdet.quantity) AS tquantity
				FROM
				purchaseorderdet
				WHERE  purchaseorderdet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>
