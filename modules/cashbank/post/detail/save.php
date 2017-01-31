<?php
$key = $_GET['key'];
$acccode = $_REQUEST['acccode'];
$accname = $_REQUEST['accname'];
$description = $_REQUEST['description'];
$debet = $_REQUEST['debet'];
$credit = $_REQUEST['credit'];
$print = $_REQUEST['print'];
$transid = $_REQUEST['transid'];
$userid = isset($_POST['userid']) ? mysql_real_escape_string($_POST['userid']) : '';
//$transid = isset($_POST['transid']) ? mysql_real_escape_string($_POST['transid']) : '';

include '../../../../lib/conn.php';

$sql = "insert into cashbankdet(acccode,accname,description,debet,credit,print,transid) values('$acccode','$accname','$description','$debet','$credit','$print','$key')";
@mysql_query($sql);
echo json_encode(array(
	'idtransdet' => mysql_insert_id(),
	'acccode' => $acccode,
	'accname' => $accname,
	'debet' => $debet,
	'credit' => $credit,
	'print' => $print,
	'transid' => $transid
	
));

?>