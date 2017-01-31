<?php

include '../conn.php';
$rs = mysql_query('SELECT
					vehicle.vehlicetype
					FROM
					vehicle
					GROUP BY
					vehicle.vehlicetype');
$result = array();
while($row = mysql_fetch_object($rs)){
	array_push($result, $row);
}

echo json_encode($result);

?>