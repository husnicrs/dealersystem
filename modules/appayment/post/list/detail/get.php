<?php
$key = $_GET['key'];
include '../../../../../lib/conn.php';

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$msearchdetail = isset($_POST['msearchdetail']) ? mysql_real_escape_string($_POST['msearchdetail']) : '';

$offset = ($page-1)*$rows;

$result = array();

$where = "notrans like '%$msearchdetail%'";
$rs = mysql_query("select count(*) FROM
					appaymentdet
					INNER JOIN purchaseorder ON appaymentdet.purchaseorderid = purchaseorder.idtrans where " . $where);
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT
					appaymentdet.idtransdet,
					purchaseorder.notrans,
					DATE_FORMAT(purchaseorder.datetrans,'%d/%m/%Y') AS datetrans,
					FORMAT(appaymentdet.totalamount,0) AS totalamount
					FROM
					appaymentdet
					INNER JOIN purchaseorder ON appaymentdet.purchaseorderid = purchaseorder.idtrans
					WHERE appaymentdet.transid=".$key." AND " . $where . " limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;

echo json_encode($result);
?>