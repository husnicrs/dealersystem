<?php
include '../../../../lib/conn.php';

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$msearchdetail = isset($_POST['msearchdetail']) ? mysql_real_escape_string($_POST['msearchdetail']) : '';

$offset = ($page-1)*$rows;

$result = array();

$where = "accname like '%$msearchdetail%'";
$rs = mysql_query("select count(*) from cashbankdet where " . $where);
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT
					cashbankdet.idtransdet,
					cashbankdet.transid,
					cashbankdet.acccode,
					cashbankdet.accname,
					CONCAT(cashbank.cusname, ' : ' , cashbank.unit) AS description,
					FORMAT(cashbankdet.debet,0) AS debet,
					FORMAT(cashbankdet.credit,0) AS credit,
					FORMAT(cashbankdet.debet-cashbankdet.credit,0) AS remain,
					cashbank.notrans,
					DATE_FORMAT(cashbank.datetrans,'%d/%m/%Y') AS datetrans
					FROM
					cashbankdet
					INNER JOIN cashbank ON cashbankdet.transid = cashbank.idtrans
					WHERE " . $where . " limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;


// SUM() for footer --------------------
$rs = mysql_query("SELECT 'Total' AS description, FORMAT(SUM(debet),0) AS debet, FORMAT(SUM(credit),0) AS credit, FORMAT(SUM(debet-credit),0) AS remain FROM cashbankdet
WHERE " . $where . " limit $offset,$rows");

$totalitems = array();
while($row = mysql_fetch_object($rs)){

	array_push($totalitems, $row);			
}
$result["footer"] = $totalitems;
echo json_encode($result);
?>