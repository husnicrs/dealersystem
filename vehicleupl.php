<?php
include "excel_reader2.php";
$username = "hondamit_admin";
$password = "123Sampai9";
$database = "hondamit_kuningan";
error_reporting(0);
mysql_connect("localhost", $username, $password);
mysql_select_db($database);

// file yang tadinya di upload, di simpan di temporary file PHP, file tersebut yang kita ambil
// dan baca dengan PHP Excel Class
$data = new Spreadsheet_Excel_Reader($_FILES['fileexcel']['tmp_name']);
$hasildata = $data->rowcount($sheet_index=0);
// default nilai 
$sukses = 0;
$gagal = 0;

$querydl = "DELETE FROM vehicleupload";
$hasildl = mysql_query($querydl);

for ($i=1; $i<=$hasildata; $i++)
{
	$id = $data->val($i,1); 
	$vehicledate = $data->val($i,2); 
	$ndno = $data->val($i,5); 
	$mechineno = $data->val($i,7); 
	$rangkano = $data->val($i,8); 
	$year = $data->val($i,9); 
	$vehicletype = $data->val($i,10); 
	$vehiclecolor = $data->val($i,11); 
	$rand = rand();

$query = "INSERT INTO vehicleupload (dono, dodate, vehicledate, ndno, mechineno, rangkano, year, vehicletype, vehiclecolor)  VALUES ('$id', '$vehicledate', '$vehicledate', '$ndno', '$mechineno', '$rangkano', '$year', '$vehicletype', '$vehiclecolor')";
$hasil = mysql_query($query);

/*
$query = "INSERT INTO vehiclestock (vehicledate, mechineno, rangkano, year, vehicletype, vehiclecolor)
		SELECT
		vehicleupload.vehicledate,
		vehicleupload.mechineno,
		vehicleupload.rangkano,
		vehicleupload.`year`,
		vehicleupload.vehicletype,
		vehicleupload.vehiclecolor
		FROM
		vehicleupload
		WHERE vehicleupload.rangkano NOT IN (SELECT rangkano FROM vehiclestock)";
$hasil = mysql_query($query);
*/
if ($hasildata) $sukses++;
else $gagal++;
 

}
error_reporting(0);
header("location:index.php?mod=vehicleuplsin");
echo "<b>import data selesai.</b> <br>";
echo "Data yang berhasil di import : " . $sukses .  "<br>";
echo "Data yang gagal diimport : ".$gagal .  "<br>";
echo "<a href='index.php?mod=vehicleuplsin'>Sinkronisasi</a>";
?>
