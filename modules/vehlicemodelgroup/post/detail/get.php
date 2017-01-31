<?php
$key = $_GET['key'];
include '../../../../lib/conn.php';


$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$msearchdetail = isset($_POST['msearchdetail']) ? mysql_real_escape_string($_POST['msearchdetail']) : '';

$offset = ($page-1)*$rows;

$result = array();

$where = "vehlicemodelgroupdet.vehlicemodel like '%$msearchdetail%'";
$rs = mysql_query("select count(*) FROM
					vehlicemodelgroupdet
					LEFT JOIN vehicle ON vehlicemodelgroupdet.vehlicemodel = vehicle.vehlicemodel
					where " . $where);
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT
					vehlicemodelgroupdet.idvehlicemodelgroupdet,
					vehlicemodelgroupdet.vehlicemodelgroupid,
					vehicle.vehlicemodel,
					vehlicemodelgroupdet.vehlicetype
					FROM
					vehlicemodelgroupdet
					LEFT JOIN vehicle ON vehlicemodelgroupdet.vehlicetype = vehicle.vehlicetype
					WHERE vehlicemodelgroupdet.vehlicemodelgroupid=".$key." AND " . $where . " 
					GROUP BY
					vehlicemodelgroupdet.idvehlicemodelgroupdet,
					vehlicemodelgroupdet.vehlicemodelgroupid,
					vehlicemodelgroupdet.vehlicemodel,
					vehicle.vehlicetype
					limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;


echo json_encode($result);
?>