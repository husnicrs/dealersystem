<?php
$lib='../../../lib/';
include_once ''.$lib.'Database.php';
switch ($_POST['type']) {
	case "get":
		$SQL = mysqli_query($con, "SELECT
				cashpayment.idtrans AS idkey,
				cashpayment.codetrans,
				cashpayment.notrans,
				DATE_FORMAT(cashpayment.datetrans,'%d/%m/%Y') AS datetrans,
				cashpayment.supplierid,
				supplier.suppliername,
				cashpayment.bankid,
				bank.bankname,
				paytype.paytypename,
				cashpayment.paytypeid,
				FORMAT(cashpayment.amount,0) AS amount,
				cashpayment.remark,
				cashpayment.status
				FROM
				cashpayment
				LEFT JOIN supplier ON cashpayment.supplierid = supplier.idsupplier
				LEFT JOIN bank ON cashpayment.bankid = bank.idbank
				LEFT JOIN paytype ON cashpayment.paytypeid = paytype.idpaytype
				WHERE cashpayment.idtrans='".$_POST['idkey']."'");
		$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
		echo json_encode($return);
		break;
	case "new":
		$SQL = mysqli_query($con, 
		"INSERT INTO cashpayment (codetrans, notrans, datetrans)
				SELECT 'CSPY',
				IFNULL(CONCAT('CSPY','-',DATE_FORMAT(NOW(), '%d%m%y'),RIGHT((RIGHT(MAX(cashpayment.notrans),3))+1001,3)), CONCAT('CSPY','-',DATE_FORMAT(NOW(), '%d%m%y'),'001')), DATE(NOW())  
				FROM
				cashpayment
				WHERE codetrans='CSPY'");
		if($SQL){
			echo json_encode("OK");
		}
		
		$SQL1 = mysqli_query($con, 
		"UPDATE cashpayment A INNER JOIN (SELECT
		MAX(cashpayment.idtrans) AS idtrans
		FROM
		cashpayment) U SET supplierid='".$_POST['supplierid']."',
		bankid='".$_POST['bankid']."',paytypeid='".$_POST['paytypeid']."',amount='".$_POST['amount']."',remark='".$_POST['remark']."'  WHERE A.idtrans=U.idtrans");
		if($SQL1){
			echo json_encode("OK");
		}
		
		break;
		
	case "edit":
		$vardatetime = $_POST['datetrans'];
		$datetrans = date('Y-m-d', strtotime($vardatetime));
		
		$SQL = mysqli_query($con, 
		"UPDATE cashpayment SET datetrans='".$_POST['datetrans']."',supplierid='".$_POST['supplierid']."',
		bankid='".$_POST['bankid']."',paytypeid='".$_POST['paytypeid']."',amount='".$_POST['amount']."',remark='".$_POST['remark']."' WHERE idtrans='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
	case "delete":
		$SQL = mysqli_query($con, "DELETE FROM cashpayment WHERE idtrans='".$_POST['idkey']."'");
		if($SQL){
			echo json_encode("OK");
		}			
		break;
} 
?>
