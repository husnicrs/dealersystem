<?php 
// connect to db
$dbname='hondamit_kuningan';
$link = mysql_connect('localhost', 'hondamit_admin', '123Sampai9');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

if (! mysql_select_db($dbname) ) {
    die ('Can\'t use database : ' . mysql_error());
}	// connect to db

 	$vehiclemodel=$_GET['vehiclemodel'];
	$sqlshippackage=mysql_query("SELECT
					vehicle.vehlicemodel,
					vehicle.vehlicetype
					FROM
					vehicle
					WHERE vehicle.vehlicemodel='$vehiclemodel'
					GROUP BY
					vehicle.vehlicemodel,
					vehicle.vehlicetype");
	while($showsqlshippackage=mysql_fetch_array($sqlshippackage)){
		echo "<option value='$showsqlshippackage[vehlicetype]'>$showsqlshippackage[vehlicetype]</option>";
	}
?>
