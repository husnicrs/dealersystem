<?php
$key = $_GET['key'];
include '../../../../lib/conn.php';

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$msearchdetail = isset($_POST['msearchdetail']) ? mysql_real_escape_string($_POST['msearchdetail']) : '';

$offset = ($page-1)*$rows;

$result = array();

$where = "rangkano like '%$msearchdetail%'";
$rs = mysql_query("select count(*) from vehiclemutdet where " . $where);
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

$rs = mysql_query("SELECT
					vehiclemutdet.idtransdet,
					vehiclemutdet.transid,
					vehiclemutdet.userid,
					vehiclemutdet.dono,
					vehiclemutdet.vehicletype,
					vehiclemutdet.rangkano,
					vehiclemutdet.mechineno,
					vehiclemutdet.vehiclecolor,
					vehiclemutdet.vehiclemodel,
					vehiclemutdet.vehiclejenis
					FROM
					vehiclemutdet
					WHERE vehiclemutdet.transid=".$key." AND " . $where . " limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($result);
?>