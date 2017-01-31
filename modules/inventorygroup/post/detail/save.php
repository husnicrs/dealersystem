<?php
$key = $_GET['key'];
$inventoryid = $_REQUEST['inventoryid'];
$userid = isset($_POST['userid']) ? mysql_real_escape_string($_POST['userid']) : '';

include '../../../../lib/conn.php';

$sql = "insert into inventorygroupdet(inventoryid,inventorygroupid) values('$inventoryid','$key')";
@mysql_query($sql);
echo json_encode(array(
	'idinventorygroupdet' => mysql_insert_id(),
	'inventoryid' => $inventoryid,
	'inventorygroupid' => $inventorygroupid	
));

?>