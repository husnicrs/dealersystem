<?php
$key = $_GET['key'];
$vehlicetype = $_REQUEST['vehlicetype'];
$userid = isset($_POST['userid']) ? mysql_real_escape_string($_POST['userid']) : '';

include '../../../../lib/conn.php';

$sql = "insert into vehlicemodelgroupdet(vehlicetype,vehlicemodelgroupid) values('$vehlicetype','$key')";
@mysql_query($sql);
echo json_encode(array(
	'idvehlicemodelgroupdet' => mysql_insert_id(),
	'vehlicetype' => $vehlicetype,
	'vehlicemodelgroupid' => $vehlicemodelgroupid	
));

?>