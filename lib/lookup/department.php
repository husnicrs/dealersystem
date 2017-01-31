<?php

include '../conn.php';
$rs = mysql_query('SELECT
					department.iddepartment,
					department.departmentname
					FROM
					department');
$result = array();
while($row = mysql_fetch_object($rs)){
	array_push($result, $row);
}

echo json_encode($result);

?>