<?php
include_once 'Database.php';
class goodreceive {
    private $db = '';
    private $data;
	private $table = 'goodreceive';
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
				goodreceive.idtrans,
				goodreceive.codetrans,
				goodreceive.notrans,
				DATE_FORMAT(goodreceive.datetrans,'%d/%m/%Y') AS datetransdet,
				goodreceive.supplierid,
				supplier.suppliername,
				goodreceive.paydue,
				goodreceive.currency,
				goodreceive.remark
				FROM
				goodreceive
				LEFT JOIN supplier ON goodreceive.supplierid = supplier.idsupplier
				WHERE  goodreceive.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }
	function showOpenDetail($key) {
        $sql = "SELECT
				purchaseorderdet.idtransdet,
				purchaseorderdet.inventoryid,
				inventory.inventorycode,
				inventory.inventoryname,
				purchaseorderdet.unit,
				purchaseorderdet.quantity,
				purchaseorderdet.sizeid,
				inventorysize.inventorysizename,
				purchaseorderdet.colorid,
				purchaseorder.notrans,
				inventorycolor.inventorycolorname,
				purchaseorderdet.grqty,
				IFNULL(purchaseorderdet.quantity,0)-IFNULL(purchaseorderdet.grqty,0) AS remain
				FROM
				purchaseorder
				INNER JOIN purchaseorderdet ON purchaseorder.idtrans = purchaseorderdet.transid
				INNER JOIN inventory ON purchaseorderdet.inventoryid = inventory.idinventory
				LEFT JOIN inventorysize ON purchaseorderdet.sizeid = inventorysize.idinventorysize
				LEFT JOIN inventorycolor ON purchaseorderdet.colorid = inventorycolor.idinventorycolor
				WHERE 
				IFNULL(purchaseorderdet.quantity,0)-IFNULL(purchaseorderdet.grqty,0)>0 AND purchaseorder.supplierid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

    function pickheader($codetrans, $notrans, $datetrans, $supplierid) {
        $sql = "INSERT INTO goodreceive (codetrans, notrans, datetrans, supplierid)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(goodreceive.notrans),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW()), :supplierid 
				FROM
				goodreceive
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans, ':notrans' => $notrans, ':datetrans' => $datetrans, ':supplierid' => $supplierid);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:index.php?mod=goodreceive_ldetail&key=$key");
        }		
    }

	function pickdetail($idtransdet, $totalpick) {
		$key = $this->db->lastID();		
		$count = count($_POST['checkedid']);
		for($i=0;$i<=$count;$i++) {
		$idtransdet= $_POST['checkedid'][$i];
		$totalpick= $_POST['totalpick'][$i];
        $sql = "INSERT INTO goodreceivedet (purchaseorddetid, transid, inventoryid, unit, unitprice, discount, quantity, sizeid, colorid)
				SELECT
				:idtransdet,
				'".$key."',
				purchaseorderdet.inventoryid,
				purchaseorderdet.unit,
				purchaseorderdet.unitprice,
				purchaseorderdet.discount,
				:totalpick,
				purchaseorderdet.sizeid,
				purchaseorderdet.colorid
				FROM
				purchaseorderdet
				WHERE purchaseorderdet.idtransdet = '".$idtransdet."'";
        $arrData = array(':idtransdet' => $idtransdet, ':totalpick' => $totalpick);
        $this->data = $this->db->insertData($sql, $arrData);
		} 
		if ($this->data == true) {
            
        }
		return $this->data;
    }
	function updateremain($idtransdet) {
		$count = count($_POST['checkedid']);
		
		for($i=0;$i<=$count;$i++) {
		$idtransdet= $_POST['checkedid'][$i];
		
        $sql = "UPDATE purchaseorderdet A INNER JOIN (SELECT
				goodreceivedet.purchaseorddetid,
				SUM(goodreceivedet.quantity) AS totalpick
				FROM
				goodreceivedet
				WHERE purchaseorddetid = '".$idtransdet."'
				GROUP BY goodreceivedet.purchaseorddetid) AS U SET A.grqty=U.totalpick WHERE A.idtransdet=U.purchaseorddetid";
        $arrData = array(':idtransdet' => $idtransdet);
        $this->data = $this->db->insertData($sql, $arrData);
		} 
		if ($this->data == true) {
            
        }
		return $this->data;
    }
    function saveclose($key, $datetrans, $remark) {
		$customerid=$_POST['customerid'];
		$moddetail=$_GET['mod'];
		$modulename=str_replace("_ldetail","", $moddetail );
		
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
				
        $sql = "UPDATE goodreceive SET datetrans=:datetrans, remark=:remark WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':remark' => $remark, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=$modulename");
        }
        return $this->data;
    }
	function savevalidate($key, $datetrans, $remark) {
		$customerid=$_POST['customerid'];
		$moddetail=$_GET['mod'];
		$modulename=str_replace("_ldetail","", $moddetail );
		
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
				
        $sql = "UPDATE goodreceive SET datetrans=:datetrans, remark=:remark, status=1 WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':remark' => $remark, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=$modulename");
        }
        return $this->data;
    }
	function shipment($key) {	
		$moddetail=$_GET['mod'];
		$modulename=str_replace("_detail","", $moddetail );	
				
        $sql = "UPDATE goodreceive SET status=2 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=$modulename");
        }
        return $this->data;
    }

	function cancel($key) {
		$customerid=$_POST['customerid'];
		$moddetail=$_GET['mod'];
		$modulename=str_replace("_ldetail","", $moddetail );
        $sql = "UPDATE $this->table SET status=9 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=$modulename");
        }
        return $this->data;
    }
	function delete($key) {
		$customerid=$_POST['customerid'];
		$moddetail=$_GET['mod'];
		$modulename=str_replace("_ldetail","", $moddetail );
        $sql = "DELETE FROM $this->table WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=$modulename");
        }
    }
	function showslipdetail($key) {
        $sql = "SELECT
				goodreceivedet.idtransdet,
				goodreceivedet.transid,
				goodreceivedet.inventoryid,
				inventory.inventorycode,
				inventory.inventoryname,
				goodreceivedet.unit,
				goodreceivedet.unitprice,
				goodreceivedet.discount,
				goodreceivedet.amount,
				goodreceivedet.quantity,
				salesorder.notrans,
				salesorder.datetrans
				FROM
				goodreceivedet
				INNER JOIN inventory ON goodreceivedet.inventoryid = inventory.idinventory
				INNER JOIN salesorderdet ON goodreceivedet.salesorderdetid = salesorderdet.idtransdet
				INNER JOIN salesorder ON salesorderdet.transid = salesorder.idtrans
				WHERE  goodreceivedet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	function showsliptotal($key) {
        $sql = "SELECT
				SUM(goodreceivedet.quantity) AS tquantity
				FROM
				goodreceivedet
				WHERE  goodreceivedet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>
