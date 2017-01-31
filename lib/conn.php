<?php

$conn = @mysql_connect('localhost','hondamit_admin','123Sampai9');
if (!$conn) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db('hondamit_kuningan', $conn);

?>
