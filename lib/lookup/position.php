<?php

include '../conn.php';
$rs = mysql_query('SELECT
					position.idposition,
					position.positionname
					FROM
					position');
$result = array();
while($row = mysql_fetch_object($rs)){
	array_push($result, $row);
}

echo json_encode($result);

?>