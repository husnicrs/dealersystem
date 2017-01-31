<?php

$id = intval($_REQUEST['idtransdet']);
$quantity = $_REQUEST['quantity'];

include '../../../../../lib/conn.php';

$sql = "update goodreceivedet set quantity='$quantity' where idtransdet=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'quantity' => $quantity,
	'success'=>true
));
?>