<?php

include '../conn.php';
$rs = mysql_query('SELECT
					major.idmajor,
					major.majorname
					FROM
					major');
$result = array();
while($row = mysql_fetch_object($rs)){
	array_push($result, $row);
}

echo json_encode($result);

?>