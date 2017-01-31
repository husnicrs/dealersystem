<?php
$id = intval($_REQUEST['idtranssubdet']);
$selected = $_REQUEST['selected'];

include '../../../../lib/conn.php';
$sql = "update purchasebidding set selected='$selected'  where idtranssubdet=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'selected' => $selected,
	'success'=>true
));
?>