<?php
$key = $_GET['key'];
include '../../../../lib/conn.php';
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
	$msearchdetail = isset($_POST['msearchdetailjob']) ? mysql_real_escape_string($_POST['msearchdetailjob']) : '';
	
	$offset = ($page-1)*$rows;
	
	$result = array();
	
	$where = "company like '%$msearchdetail%'";
	$rs = mysql_query("select count(*) from employeejobexperience
						LEFT JOIN position ON employeejobexperience.positionid = position.idposition where " . $where);
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];

	$rs = mysql_query("SELECT
						employeejobexperience.idemployeejobexperience,
						employeejobexperience.employeeid,
						employeejobexperience.yearfrom,
						employeejobexperience.yearto,
						employeejobexperience.company,
						employeejobexperience.usinesstype,
						employeejobexperience.positionid,
						position.positionname,
						employeejobexperience.reportto,
						FORMAT(employeejobexperience.lastsalary,0) AS lastsalary,
						employeejobexperience.sparationtype
						FROM
						employeejobexperience
						LEFT JOIN position ON employeejobexperience.positionid = position.idposition
						where employeejobexperience.employeeid=".$key." AND " . $where . " limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($result);
?>
