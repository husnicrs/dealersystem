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

 	$villageid=$_GET['villageid'];
	$sql=mysql_query("SELECT
					village.idvillage,
					village.villagename,
					districts.districtsname,
					districts.iddistricts
					FROM
					village
					INNER JOIN districts ON village.districtsid = districts.iddistricts
					WHERE  village.idvillage='$villageid'");
	while($sqlshow=mysql_fetch_array($sql)){
		echo "<option value='$sqlshow[iddistricts]'>$sqlshow[districtsname]</option>";
	}
?>
