<?php

$id = intval($_REQUEST['idtransdet']);
$totalamount = $_REQUEST['totalamount'];

include '../../../../../lib/conn.php';

$sql = "update appaymentdet set totalamount='$totalamount' where idtransdet=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'totalamount' => $totalamount,
	'success'=>true
));
?>