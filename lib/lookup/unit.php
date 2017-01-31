<?php
$q = isset($_POST['q']) ? strval($_POST['q']) : '';
include '../conn.php';
$rs = mysql_query("select * from unit WHERE unitname = '$q'
					UNION ALL select * from unit");
$result = array();
while($row = mysql_fetch_object($rs)){
	array_push($result, $row);
}

echo json_encode($result);

?>