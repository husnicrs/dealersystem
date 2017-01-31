<?php

include '../conn.php';
$rs = mysql_query('SELECT "Male" AS id, "Male" AS description
UNION ALL
SELECT "Female" AS id, "Female" AS description');
$result = array();
while($row = mysql_fetch_object($rs)){
	array_push($result, $row);
}

echo json_encode($result);

?>