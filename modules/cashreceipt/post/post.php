<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				cashreceipt.idtrans AS idkey,
				cashreceipt.codetrans,
				cashreceipt.notrans,
				DATE_FORMAT(cashreceipt.datetrans,'%d/%m/%Y') AS datetrans,
				cashreceipt.customerid,
				customer.customername,
				cashreceipt.bankid,
				bank.bankname,
				paytype.paytypename,
				cashreceipt.paytypeid,
				FORMAT(cashreceipt.amount,0) AS amount,
				cashreceipt.remark,
				cashreceipt.status
				FROM
				cashreceipt
				LEFT JOIN customer ON cashreceipt.customerid = customer.idcustomer
				LEFT JOIN bank ON cashreceipt.bankid = bank.idbank
				LEFT JOIN paytype ON cashreceipt.paytypeid = paytype.idpaytype
				WHERE cashreceipt.idtrans='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO cashreceipt (codetrans, notrans, datetrans)
				SELECT 'CSRC',
				IFNULL(CONCAT('CSRC','-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(cashreceipt.notrans),3))+1001,3)), CONCAT('CSRC','-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				cashreceipt
				WHERE codetrans='CSRC'");
		if($SQL){
			echo json_encode("OK");
		}
		
		$SQL1 = mysqli_query($con, 
		"UPDATE cashreceipt A INNER JOIN (SELECT
		MAX(cashreceipt.idtrans) AS idtrans
		FROM
		cashreceipt) U SET customerid='".$_POST['customerid']."',
		bankid='".$_POST['bankid']."',paytypeid='".$_POST['paytypeid']."',amount='".$_POST['amount']."',remark='".$_POST['remark']."'  WHERE A.idtrans=U.idtrans");
		if($SQL1){
			echo json_encode("OK");
		}
		
		break;
		
	case "edit":
		$vardatetime = $_POST['datetrans'];
		$datetrans = date('Y-m-d', strtotime($vardatetime));
		
		$SQL = mysqli_query($con, 
		"UPDATE cashreceipt SET datetrans='".$_POST['datetrans']."',customerid='".$_POST['customerid']."',
		bankid='".$_POST['bankid']."',paytypeid='".$_POST['paytypeid']."',amount='".$_POST['amount']."',remark='".$_POST['remark']."' WHERE idtrans='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM cashreceipt WHERE idtrans='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>
