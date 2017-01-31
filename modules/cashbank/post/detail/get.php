<?php
$key = $_GET['key'];
include '../../../../lib/conn.php';

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$msearchdetail = isset($_POST['msearchdetail']) ? mysql_real_escape_string($_POST['msearchdetail']) : '';

$offset = ($page-1)*$rows;

$result = array();

$where = "CONCAT(acccode,accname) like '%$msearchdetail%'";
$rs = mysql_query("select count(*) from cashbankdet where " . $where);
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT
					cashbankdet.idtransdet,
					cashbankdet.transid,
					cashbankdet.acccode,
					cashbankdet.accname,
					cashbankdet.description,
					FORMAT(cashbankdet.debet,0) AS debet,
					FORMAT(cashbankdet.credit,0) AS credit,
					CASE WHEN cashbankdet.print=1 THEN 'Y' ELSE 'N' END AS print
					FROM
					cashbankdet
					WHERE cashbankdet.transid=".$key." AND " . $where . " limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;


// SUM() for footer --------------------
$rs = mysql_query("SELECT 'Total' AS description, FORMAT(SUM(debet),0) AS debet, FORMAT(SUM(credit),0) AS credit FROM cashbankdet
WHERE cashbankdet.transid=".$key." AND " . $where . " limit $offset,$rows");

$totalitems = array();
while($row = mysql_fetch_object($rs)){

	array_push($totalitems, $row);			
}
$result["footer"] = $totalitems;
echo json_encode($result);
?>