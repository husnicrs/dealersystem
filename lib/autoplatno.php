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

 	$policeno=$_GET['policeno'];
	$sqlshippackage=mysql_query("SELECT
					salesvehicle.bpkbname,
					salesvehicle.address,
					salesvehicle.vehiclemodelid,
					salesvehicle.vehicletypeid,
					salesvehicle.datetrans,
					salesvehicle.mechineno,
					salesvehicle.rangkano,
					salesvehicle.policeno
					FROM
					salesvehicle
					WHERE salesvehicle.policeno='$policeno'");
	while($showsqlshippackage=mysql_fetch_array($sqlshippackage)){
		echo "value='$showsqlshippackage[rangkano]'";
	}
?>
