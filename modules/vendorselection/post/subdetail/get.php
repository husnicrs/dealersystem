<?php
$key = $_GET['key'];
include '../../../../lib/conn.php';
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
	$msearchdetail = isset($_POST['msearchdetail']) ? mysql_real_escape_string($_POST['msearchdetail']) : '';
	
	$offset = ($page-1)*$rows;
	
	$result = array();
	
	$where = "CONCAT(IFNULL(supplier.suppliername,''), IFNULL(purchasebidding.currency,'')) like '%$msearchdetail%'";
	$rs = mysql_query("select count(*) FROM
						purchasebidding
						LEFT JOIN supplier ON purchasebidding.supplierid = supplier.idsupplier where " . $where);
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];

	$rs = mysql_query("SELECT
						purchasebidding.idtranssubdet,
						purchasebidding.transdetid,
						purchasebidding.supplierid,
						supplier.suppliername,
						purchasebidding.currency,
						purchasebidding.price,
						purchasebidding.rate,
						purchasebidding.disc,
						purchasebidding.paydue,
						purchasebidding.leadtime,
						purchasebidding.minorder,
						CASE WHEN purchasebidding.selected=1 THEN 'Y' ELSE '' END AS selected
						FROM
						purchasebidding
						LEFT JOIN supplier ON purchasebidding.supplierid = supplier.idsupplier
						where purchasebidding.transdetid=".$key." AND " . $where . " limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;

echo json_encode($result);
?>