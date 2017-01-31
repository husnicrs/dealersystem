<?php
$id = intval($_REQUEST['id']);
include '../../../../lib/conn.php';

$sql = "delete from vehlicemodelgroupdet where idvehlicemodelgroupdet=$id";
@mysql_query($sql);
echo json_encode(array('success'=>true));
?>

<?php

