<?php

include '../conn.php';
$rs = mysql_query('SELECT
					vehicle.vehlicemodel
					FROM
					vehicle
					GROUP BY
					vehicle.vehlicemodel');
$result = array();
while($row = mysql_fetch_object($rs)){
	array_push($result, $row);
}

echo json_encode($result);

?>