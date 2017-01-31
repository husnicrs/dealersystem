<?php
include_once 'Database.php';
class dasboard {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
	function ticketcount($user) {
		$user=$_SESSION['uname'];
        $sql = "SELECT
				IFNULL(COUNT(ticket.idticket),0) AS ticketcount
				FROM
				ticket WHERE ticket.receiver=:user";
        $arrData = array(':user'=>$user);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	function notifcount() {
        $sql = "SELECT
				IFNULL(COUNT(notification.idnotification),0) AS notificationcount
				FROM
				notification";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function usercount() {
        $sql = "SELECT
				IFNULL(COUNT(users.iduser),0) AS countuser
				FROM
				users";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function valsales() {
        $sql = "SELECT
				COUNT(salesorder.idtrans) AS valsales
				FROM
				salesorder
				WHERE salesorder.datetrans = DATE(NOW())";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function valsalessalesservice() {
        $sql = "SELECT
				COUNT(salesservice.idtrans) AS valsalesservice
				FROM
				salesservice
				WHERE salesservice.datetrans = DATE(NOW())";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function valsalesvehicle() {
        $sql = "SELECT
				COUNT(salesvehicle.idtrans) AS valsalesvehicle
				FROM
				salesvehicle
				WHERE salesvehicle.datetrans = DATE(NOW())";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function valsalesvehiclesj() {
        $sql = "SELECT
				COUNT(salesvehicle.idtrans) AS valsalesvehiclesj
				FROM
				salesvehicle
				WHERE salesvehicle.status=1 AND salesvehicle.datetrans = DATE(NOW())";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function valpurchase() {
        $sql = "SELECT
				COUNT(purchaseorder.idtrans) AS valpurchase
				FROM
				purchaseorder
				WHERE purchaseorder.status=0 AND purchaseorder.datetrans = DATE(NOW())";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function valcashreceipt() {
        $sql = "SELECT
				COUNT(cashreceive.idtrans) AS valcashreceipt
				FROM
				cashreceive
				WHERE cashreceive.status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function valcashpayment() {
        $sql = "SELECT
				COUNT(cashpayment.idtrans) AS valcashpayment
				FROM
				cashpayment
				WHERE cashpayment.status=0 AND cashpayment.codetrans='CPPY'";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }
	function valappayment() {
        $sql = "SELECT
				COUNT(cashpayment.idtrans) AS valappayment
				FROM
				cashpayment
				WHERE cashpayment.status=0";
        $this->data = $this->db->loadData($sql);
        return $this->data;
    }

}
?>
