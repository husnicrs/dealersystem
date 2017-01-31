<?php

$id = intval($_REQUEST['idvehlicemodelgroupdet']);
$vehlicetype = $_REQUEST['vehlicetype'];

include '../../../../lib/conn.php';

$sql = "update vehlicemodelgroupdet set vehlicetype='$vehlicetype' where idvehlicemodelgroupdet=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => $id,
	'vehlicetype' => $vehlicetype,
	'success'=>true
));
?>