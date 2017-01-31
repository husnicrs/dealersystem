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
					arreceivedet
					INNER JOIN salesorder ON arreceivedet.salesorderid = salesorder.idtrans where " . $where);
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT
					arreceivedet.idtransdet,
					salesorder.notrans,
					DATE_FORMAT(salesorder.datetrans,'%d/%m/%Y') AS datetrans,
					FORMAT(arreceivedet.totalamount,0) AS totalamount
					FROM
					arreceivedet
					INNER JOIN salesorder ON arreceivedet.salesorderid = salesorder.idtrans
					WHERE arreceivedet.transid=".$key." AND " . $where . " limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;

echo json_encode($result);
?>