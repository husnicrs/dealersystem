<?php
$key = $_GET['key'];
include '../../../../lib/conn.php';
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
	$msearchdetail = isset($_POST['msearchdetailedu']) ? mysql_real_escape_string($_POST['msearchdetailedu']) : '';
	
	$offset = ($page-1)*$rows;
	
	$result = array();
	
	$where = "educationtypename like '%$msearchdetail%'";
	$rs = mysql_query("select count(*) from employeeeducation
						LEFT JOIN educationtype ON employeeeducation.educationtypeid = educationtype.ideducationtype
						LEFT JOIN major ON employeeeducation.majorid = major.idmajor where " . $where);
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];

	$rs = mysql_query("SELECT
						employeeeducation.idemployeeeducation,
						employeeeducation.employeeid,
						employeeeducation.educationtypeid,
						educationtype.educationtypename,
						employeeeducation.employeeeducationname,
						employeeeducation.address,
						employeeeducation.majorid,
						major.majorname,
						employeeeducation.yearfrom,
						employeeeducation.yearto,
						employeeeducation.gpa,
						employeeeducation.description
						FROM
						employeeeducation
						LEFT JOIN educationtype ON employeeeducation.educationtypeid = educationtype.ideducationtype
						LEFT JOIN major ON employeeeducation.majorid = major.idmajor
						where employeeeducation.employeeid=".$key." AND " . $where . " limit $offset,$rows");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($result);
?>
