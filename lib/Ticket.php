<?php
include_once 'Database.php';
class ticket {
    private $db = '';
    private $data;
    public function __construct() {
        $this->db = new Database();
    }
    function showinbox($user) {
		$user=$_SESSION['uname'];
        $sql = "SELECT
				ticket.idticket,
				ticket.ticketdate,
				ticket.`subject`,
				LEFT(ticket.message,10) AS message,
				ticket.`status`,
				ticket.sender,
				ticket.receiver,
				ticket.atch,
				CASE WHEN ticket.atch='' THEN '' ELSE 'fa fa-paperclip' END AS attachmenticon
				FROM
				ticket WHERE ticket.receiver=:user";
        $arrData = array(':user'=>$user);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	function showinboxlow($user) {
		$user=$_SESSION['uname'];
        $sql = "SELECT
				ticket.idticket,
				ticket.ticketdate,
				ticket.`subject`,
				LEFT(ticket.message,10) AS message,
				ticket.`status`,
				ticket.sender,
				ticket.receiver,
				ticket.atch,
				CASE WHEN ticket.atch='' THEN '' ELSE 'fa fa-paperclip' END AS attachmenticon
				FROM
				ticket WHERE ticket.receiver=:user AND ticket.`status`=1";
        $arrData = array(':user'=>$user);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	function showinboxintermediate($user) {
		$user=$_SESSION['uname'];
        $sql = "SELECT
				ticket.idticket,
				ticket.ticketdate,
				ticket.`subject`,
				LEFT(ticket.message,10) AS message,
				ticket.`status`,
				ticket.sender,
				ticket.receiver,
				ticket.atch,
				CASE WHEN ticket.atch='' THEN '' ELSE 'fa fa-paperclip' END AS attachmenticon
				FROM
				ticket WHERE ticket.receiver=:user AND ticket.`status`=2";
        $arrData = array(':user'=>$user);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	function showinboxpriority($user) {
		$user=$_SESSION['uname'];
        $sql = "SELECT
				ticket.idticket,
				ticket.ticketdate,
				ticket.`subject`,
				LEFT(ticket.message,10) AS message,
				ticket.`status`,
				ticket.sender,
				ticket.receiver,
				ticket.atch,
				CASE WHEN ticket.atch='' THEN '' ELSE 'fa fa-paperclip' END AS attachmenticon
				FROM
				ticket WHERE ticket.receiver=:user AND ticket.`status`=3";
        $arrData = array(':user'=>$user);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
		function showinboxclose($user) {
		$user=$_SESSION['uname'];
        $sql = "SELECT
				ticket.idticket,
				ticket.ticketdate,
				ticket.`subject`,
				LEFT(ticket.message,10) AS message,
				ticket.`status`,
				ticket.sender,
				ticket.receiver,
				ticket.atch,
				CASE WHEN ticket.atch='' THEN '' ELSE 'fa fa-paperclip' END AS attachmenticon
				FROM
				ticket WHERE ticket.receiver=:user AND ticket.`status`=4";
        $arrData = array(':user'=>$user);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	function showDetail($key) {
        $sql = "SELECT
				ticket.idticket,
				ticket.ticketdate,
				ticket.`subject`,
				ticket.message,
				ticket.`status`,
				ticket.sender,
				ticket.receiver,
				CASE WHEN ticket.atch='' THEN '#' ELSE CONCAT('assets/mailbox/',ticket.atch) END AS atch,
				ticket.atch AS size,
				CASE WHEN ticket.atch='' THEN '' ELSE 'fa fa-paperclip' END AS attachmenticon
				FROM
				ticket WHERE ticket.idticket=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->getById($sql, $arrData);
        return $this->data;
    }
    function showsent($user) {
		$user=$_SESSION['uname'];
        $sql = "SELECT
				ticket.idticket,
				ticket.ticketdate,
				ticket.`subject`,
				LEFT(ticket.message,10) AS message,
				ticket.`status`,
				ticket.sender,
				ticket.receiver,
				ticket.atch,
				CASE WHEN ticket.atch='' THEN '' ELSE 'fa fa-paperclip' END AS attachmenticon
				FROM
				ticket WHERE ticket.sender=:user";
        $arrData = array(':user'=>$user);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }
	function inboxcount($user) {
		$user=$_SESSION['uname'];
        $sql = "SELECT
				IFNULL(COUNT(ticket.idticket),0) AS msgcount
				FROM
				ticket WHERE ticket.receiver=:user";
        $arrData = array(':user'=>$user);
        $this->data = $this->db->searchData($sql, $arrData);
        return $this->data;
    }

    function insert($receiver, $subject, $status, $message, $user, $atch) {
		$user=$_SESSION['uname'];
        $sql = "INSERT INTO ticket SET ticketdate=NOW(), receiver=:receiver, subject=:subject, status=:status, message=:message, sender=:user, atch=:atch";
        $arrData = array(':receiver' => $receiver, ':subject' => $subject, ':status' => $status, ':message' => $message,  ':user' => $user, ':atch' => $atch);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=ticket");
        }
        return $this->data;
    }
	function insertnoatch($receiver, $subject, $status, $message, $user) {
		$user=$_SESSION['uname'];
        $sql = "INSERT INTO ticket SET ticketdate=NOW(), receiver=:receiver, subject=:subject, status=:status, message=:message,  sender=:user";
        $arrData = array(':receiver' => $receiver, ':subject' => $subject, ':status' => $status, ':message' => $message,   ':user' => $user);
        $this->data = $this->db->insertData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=ticket");
        }
        return $this->data;
    }
    function delete($key) {
        $sql = "DELETE FROM ticket WHERE idticket=:key";
        $arrData = array(':key' => $key);
        $this->data = $this->db->deleteData($sql, $arrData);
        if ($this->data == true) {
            header("location:index.php?mod=ticket");
        }
    }
}
?>
