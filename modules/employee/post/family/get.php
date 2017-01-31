<?php
$key = $_GET['key'];
include '../../../../lib/conn.php';
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
	$msearchdetail = isset($_POST['msearchdetailfam']) ? mysql_real_escape_string($_POST['msearchdetailfam']) : '';
	
	$offset = ($page-1)*$rows;
	
	$result = array();
	
	$where = "familyname like '%$msearchdetail%'";
	$rs = mysql_query("select count(*) from employeefamily where " . $where);
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];

	$rs = mysql_query("SELECT
						employeefamily.idemployeefamily,
						employeefamily.employeeid,
						employeefamily.familyname,
						employeefamily.placebirth,
						employeefamily.datebirth,
						employeefamily.lasteducation,
						employeefamily.occupation,
						employeefamily.medicalprotection,
						employeefamily.job,
						employeefamily.sex
						FROM
						employeefamily where employeefamily.employeeid=".$key." AND " . $where . " limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($result);
?>
