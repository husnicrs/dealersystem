<?php
$q = isset($_POST['q']) ? strval($_POST['q']) : '';

include '../conn.php';
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;

$offset = ($page-1)*$rows;

$result = array();

$rs = mysql_query("select count(*) from account");
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT
					account.idaccount,
					account.accountcode,
					account.accountname,
					account.`status`
					FROM
					account
					WHERE accountcode like '%$q%' or accountname like '%$q%'
					limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($result);



?>

