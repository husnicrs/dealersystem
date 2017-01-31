<?php

$id = intval($_REQUEST['idtransdet']);
$acccode = $_REQUEST['acccode'];
$accname = $_REQUEST['accname'];
$description = $_REQUEST['description'];
$debet = $_REQUEST['debet'];
$credit = $_REQUEST['credit'];
$print = $_REQUEST['print'];

include '../../../../lib/conn.php';

$sql = "update cashbankdet set acccode='$acccode',accname='$accname',description='$description',debet='$debet',credit='$credit',print='$print' where idtransdet=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'acccode' => $acccode,
	'accname' => $accname,
	'debet' => $debet,
	'credit' => $credit,
	'print' => $print,
	'success'=>true
));
?>