<?php
include "excel_reader2.php";
$username = "hondamit_admin";
$password = "123Sampai9";
$database = "hondamit_kuningan";

mysql_connect("localhost", $username, $password);
mysql_select_db($database);

// file yang tadinya di upload, di simpan di temporary file PHP, file tersebut yang kita ambil
// dan baca dengan PHP Excel Class
$data = new Spreadsheet_Excel_Reader($_FILES['fileexcel']['tmp_name']);
$hasildata = $data->rowcount($sheet_index=0);
// default nilai 
$sukses = 0;
$gagal = 0;

for ($i=1; $i<=$hasildata; $i++)
{
	$id = $data->val($i,1); 
	$partcode = $data->val($i,1); 
	$partname = $data->val($i,2); 
	$unitprice = $data->val($i,3); 
	$rand = rand();

$query = "DELETE FROM partupload";
$hasil = mysql_query($query);

$query = "INSERT INTO partupload (partcode, partname, unitprice)  VALUES ('$partcode', '$partname', '$unitprice')";
$hasil = mysql_query($query);

$query = "INSERT INTO inventory (inventory.inventorycode,
		inventory.inventoryname,
		inventory.unitprice)
		SELECT
		partupload.partcode,
		partupload.partname,
		partupload.unitprice
		FROM
		partupload
		WHERE partupload.partcode NOT IN (SELECT inventorycode FROM inventory)";
$hasil = mysql_query($query);

$query = "UPDATE inventory AS A INNER JOIN (SELECT
partupload.partcode,
partupload.partname,
partupload.unitprice
FROM
partupload) AS U SET A.inventoryname=U.partname, A.unitprice=U.unitprice WHERE A.inventorycode=U.partcode";
$hasil = mysql_query($query);


if ($hasildata) $sukses++;
else $gagal++;
 

}
echo "<b>import data selesai.</b> <br>";
echo "Data yang berhasil di import : " . $sukses .  "<br>";
echo "Data yang gagal diimport : ".$gagal .  "<br>";
echo "back <a href='#' onClick='history.back()'>import</a>";
?>
