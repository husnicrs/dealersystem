<?php
$id = intval($_REQUEST['id']);
include '../../../../../lib/conn.php';

$sql = "delete from deliveryorderdet where idtransdet=$id";
@mysql_query($sql);
echo json_encode(array('success'=>true));
?>