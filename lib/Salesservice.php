<?php
include_once 'Database.php';
date_default_timezone_set("Asia/Bangkok");
class salesservice {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function insert($codetrans) {
        $sql = "INSERT INTO salesservice (codetrans, notrans, datetrans)
				SELECT :codetrans,
				IFNULL(CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(RIGHT(salesservice.notrans,3)),3))+1001,3)), CONCAT(:codetrans,'-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				salesservice
				WHERE codetrans=:codetrans";
        $arrData = array(':codetrans' => $codetrans);
        $this->data = $this->db->insertData($sql, $arrData);
		if($this->data == true){
			$key = $this->db->lastID();
            header("location:index.php?mod=salesservice_detail&key=$key");
        }		
    }
	
    function saveclose($key, $datetrans, $customerid, $payamount, $changeamount, $totalamount, $paytypeid, $remark, $serviceamount, $sparepartamount,
						$policeno, $customername, $vehiclemodel, $vahicletype, $vahiclejenis, $purchasedate, $mechineno, $rangka, $servicebook, $mekanikid, $employeeid, $km, $nextkm, $nextdatekm, $finishtime, $address, $telpno) {
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
		
		$varpurchasedate = $_POST['purchasedate']; 
		$date = str_replace('/', '-', $varpurchasedate);
		$purchasedate = date('Y-m-d', strtotime($date));
		
		$varnextdatekm = $_POST['nextdatekm']; 
		$date = str_replace('/', '-', $varnextdatekm);
		$nextdatekm = date('Y-m-d', strtotime($date));
		
        $sql = "UPDATE salesservice SET datetrans=:datetrans, customerid=:customerid, payamount=:payamount, changeamount=:changeamount, totalamount=:totalamount, paytypeid=:paytypeid,  remark=:remark,  serviceamount=:serviceamount,  sparepartamount=:sparepartamount,
		policeno=:policeno,  customername=:customername,  vehiclemodel=:vehiclemodel,  vahicletype=:vahicletype,  vahiclejenis=:vahiclejenis,  purchasedate=:purchasedate,  mechineno=:mechineno,  rangka=:rangka,  servicebook=:servicebook, employeeid=:employeeid, mekanikid=:mekanikid, km=:km, nextkm=:nextkm, nextdatekm=:nextdatekm, finishtime=:finishtime, address=:address, telpno=:telpno, status=1 WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':customerid' => $customerid, ':payamount' => $payamount, ':changeamount' => $changeamount, ':totalamount' => $totalamount, ':paytypeid' => $paytypeid, ':remark' => $remark, ':serviceamount' => $serviceamount, ':sparepartamount' => $sparepartamount,
		':policeno' => $policeno, ':customername' => $customername, ':vehiclemodel' => $vehiclemodel, ':vahicletype' => $vahicletype, ':vahiclejenis' => $vahiclejenis, ':purchasedate' => $purchasedate, ':mechineno' => $mechineno, ':rangka' => $rangka, ':servicebook' => $servicebook, ':employeeid' => $employeeid, ':mekanikid' => $mekanikid, ':km' => $km, ':nextkm' => $nextkm, ':nextdatekm' => $nextdatekm, ':finishtime' => $finishtime, ':address' => $address, ':telpno' => $telpno, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=salesservice");
        }
        return $this->data;
    }

function savepay($key, $datetrans, $customerid, $payamount, $changeamount, $totalamount, $paytypeid, $remark, $serviceamount, $sparepartamount,
						$policeno, $customername, $vehiclemodel, $vahicletype, $vahiclejenis, $purchasedate, $mechineno, $rangka, $servicebook, $mekanikid, $employeeid, $km, $nextkm, $nextdatekm, $finishtime, $address, $telpno) {
		$vardatetime = $_POST['datetrans']; 
		$date = str_replace('/', '-', $vardatetime);
		$datetrans = date('Y-m-d', strtotime($date));
		
		$varpurchasedate = $_POST['purchasedate']; 
		$date = str_replace('/', '-', $varpurchasedate);
		$purchasedate = date('Y-m-d', strtotime($date));
		
		$varnextdatekm = $_POST['nextdatekm']; 
		$date = str_replace('/', '-', $varnextdatekm);
		$nextdatekm = date('Y-m-d', strtotime($date));
		
        $sql = "UPDATE salesservice SET datetrans=:datetrans, customerid=:customerid, payamount=:payamount, changeamount=:changeamount, totalamount=:totalamount, paytypeid=:paytypeid,  remark=:remark,  serviceamount=:serviceamount,  sparepartamount=:sparepartamount,
		policeno=:policeno,  customername=:customername,  vehiclemodel=:vehiclemodel,  vahicletype=:vahicletype,  vahiclejenis=:vahiclejenis,  purchasedate=:purchasedate,  mechineno=:mechineno,  rangka=:rangka,  servicebook=:servicebook, employeeid=:employeeid, mekanikid=:mekanikid, km=:km, nextkm=:nextkm, nextdatekm=:nextdatekm, finishtime=:finishtime, address=:address, telpno=:telpno, status=2 WHERE idtrans=:key";
        $arrData = array(':datetrans' => $datetrans, ':customerid' => $customerid, ':payamount' => $payamount, ':changeamount' => $changeamount, ':totalamount' => $totalamount, ':paytypeid' => $paytypeid, ':remark' => $remark, ':serviceamount' => $serviceamount, ':sparepartamount' => $sparepartamount,
		':policeno' => $policeno, ':customername' => $customername, ':vehiclemodel' => $vehiclemodel, ':vahicletype' => $vahicletype, ':vahiclejenis' => $vahiclejenis, ':purchasedate' => $purchasedate, ':mechineno' => $mechineno, ':rangka' => $rangka, ':servicebook' => $servicebook, ':employeeid' => $employeeid, ':mekanikid' => $mekanikid, ':km' => $km, ':nextkm' => $nextkm, ':nextdatekm' => $nextdatekm, ':finishtime' => $finishtime, ':address' => $address, ':telpno' => $telpno, ':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=salesservice_finish&key=$key");
        }
        return $this->data;
    }

    function updateprice($key) {
		
        $sql = "UPDATE salesservicedet A INNER JOIN (SELECT
				inventory.idinventory,
				inventory.unitprice,
				salesservicedet.quantity*inventory.unitprice AS amount
				FROM
				inventory
				INNER JOIN salesservicedet ON inventory.idinventory = salesservicedet.inventoryid) AS U SET A.unitprice=U.unitprice, A.amount=U.amount WHERE A.inventoryid=U.idinventory AND A.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=salesservice_finish&key=$key");
        }
        return $this->data;
    }


    function cancel($key) {
        $sql = "UPDATE salesservice SET status=9 WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=salesservice");
        }
        return $this->data;
    }

    function showDetail($key) {
        $sql = "SELECT
				salesservice.idtrans,
				salesservice.codetrans,
				salesservice.notrans,
				DATE_FORMAT(salesservice.datetrans,'%d/%m/%Y') AS datetrans1,
				salesservice.remark AS remarkhead,
				salesservice.datetrans,
				CASE WHEN salesservice.customerid=0 THEN 1 ELSE salesservice.customerid END AS customerid,
				CASE WHEN salesservice.paytypeid=0 THEN 1 ELSE salesservice.paytypeid END AS paytypeid,
				salesservice.transcode,
				CASE WHEN salesservice.customerid=0 THEN 'CUSTOMER CASH' ELSE customer.customername END AS customername,
				CASE WHEN salesservice.paytypeid=0 THEN 'Cash' ELSE paytype.paytypename END AS paytypename,
				salesservice.payamount,
				salesservice.changeamount,
				salesservice.totalamount,
				salesservice.policeno,
				salesservice.customername,				
				DATE_FORMAT(salesservice.purchasedate,'%d/%m/%Y') AS purchasedate,
				salesservice.mechineno,
				salesservice.rangka,
				salesservice.servicebook,
				salesservice.km,
				salesservice.nextkm,
				salesservice.finishtime,
				DATE_FORMAT(DATE_ADD(datetrans,INTERVAL 60 DAY),'%d/%m/%Y') AS nextdatekm,
				employee.employeename AS kasirname,
				employee.idemployee AS kasirid,
				mekanik.idemployee AS mekanikid,
				mekanik.employeename AS mekanikname,
				salesservice.vahicletype,
				salesservice.vehiclemodel,
				salesservice.vehiclemodel AS vehiclemodelsw,
				salesservice.vahiclejenis,
				salesservice.address,
				salesservice.telpno,
				vehicleyear.`year` AS vehicleyear
				FROM
				salesservice
				LEFT JOIN customer ON salesservice.customerid = customer.idcustomer
				LEFT JOIN paytype ON salesservice.paytypeid = paytype.idpaytype
				LEFT JOIN employee ON salesservice.employeeid = employee.idemployee
				LEFT JOIN employee AS mekanik ON salesservice.mekanikid = mekanik.idemployee
				LEFT JOIN
				(
				SELECT
				vehiclestock.vehicletype,
				MAX(vehiclestock.`year`) AS `year`
				FROM
				vehiclestock
				GROUP BY
				vehiclestock.vehicletype
				) AS vehicleyear ON salesservice.vahicletype=vehicleyear.vehicletype
				WHERE salesservice.idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }

	function delete($key) {
        $sql = "DELETE FROM salesservice WHERE idtrans=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=salesserviceupload_detail&key=$key");
        }
    }
	function showpartslipdetail($key) {
        $sql = "SELECT
				salesservicedet.idtransdet,
				salesservicedet.transid,
				salesservicedet.inventoryid,
				inventory.inventorycode,
				inventory.inventoryname,
				salesservicedet.unit,
				salesservicedet.unitprice,
				salesservicedet.discount,
				salesservicedet.amount,
				salesservicedet.quantity
				FROM
				salesservicedet
				INNER JOIN inventory ON salesservicedet.inventoryid = inventory.idinventory
				WHERE  salesservicedet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	function showserviceslipdetail($key) {
        $sql = "SELECT
				salesservicedet2.idtransdet,
				salesservicedet2.transid,
				salesservicedet2.vehicleserviceid,
				vehicleservice.vehicleservicename,
				salesservicedet2.unitprice AS unitpriceservice,
				salesservicedet2.discount as discountservice,
				salesservicedet2.discountamt as discountserviceamt,
				salesservicedet2.subtotal AS subtotalservice,
				vehicleservice.vehliceservicetype
				FROM
				salesservicedet2
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE  salesservicedet2.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	function showslipservicetotal($key) {
        $sql = "SELECT
				SUM(salesservicedet2.subtotal) AS subtotalservice
				FROM
				salesservicedet2
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE  salesservicedet2.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	function showslipparttotal($key) {
        $sql = "SELECT
				SUM(salesservicedet.amount) AS subtotalpart
				FROM
				salesservicedet
				WHERE  salesservicedet.transid=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
   	function showsliptotal($key) {
        $sql = "SELECT SUM(subtotal) AS totalpartservice FROM (SELECT
				SUM(salesservicedet.amount) AS subtotal
				FROM
				salesservicedet
				WHERE  salesservicedet.transid=:key
				UNION ALL
				SELECT
				SUM(salesservicedet2.subtotal) AS subtotal
				FROM
				salesservicedet2
				INNER JOIN vehicleservice ON salesservicedet2.vehicleserviceid = vehicleservice.idvehicleservice
				WHERE  salesservicedet2.transid=:key) AS DERIVEDTBL";
        $arrData = array(':key' => $key);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

}
?>
