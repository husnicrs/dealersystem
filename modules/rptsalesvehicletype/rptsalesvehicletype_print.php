<?php
	$db=new Database();
	$rptdatefrom = $_POST['rptdatefrom'];
	$rptdateto = $_POST['rptdateto'];
	//error_reporting(0);
	$rptsalesvehicletype = new Rptsalesvehicletype();
	$core=new Core();
	$data = $rptsalesvehicletype->show($rptdatefrom, $rptdateto);
	extract($data);
?>


<style type="text/css">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
	
<!--	@media print {
  <!-- thead {display: table-header-group;}
<!-- }
</style>

<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 15">
<link rel=File-List href="Penjualan%20Type_files/filelist.xml">
<style id="Penjualan Type_3061_Styles"><!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.xl633061
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:18.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl643061
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl653061
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl663061
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#D9D9D9;
	mso-pattern:black none;
	white-space:normal;}
.xl673061
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl683061
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl693061
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:8.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
--></style>
</head>

<body>
<!--[if !excel]>&nbsp;&nbsp;<![endif]-->
<!--The following information was generated by Microsoft Excel's Publish as Web
Page wizard.-->
<!--If the same item is republished from Excel, all information between the DIV
tags will be replaced.-->
<!----------------------------->
<!--START OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD -->
<!----------------------------->

<div id="Penjualan Type_3061" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=513 class=xl643061
 style='border-collapse:collapse;table-layout:fixed;width:385pt'>
 <col class=xl643061 width=200 style='mso-width-source:userset;mso-width-alt:
 7314;width:150pt'>
 <col class=xl643061 width=242 style='mso-width-source:userset;mso-width-alt:
 8850;width:182pt'>
 <col class=xl643061 width=71 style='mso-width-source:userset;mso-width-alt:
 2596;width:53pt'>
 <tr height=31 style='height:23.25pt'>
  <td colspan=3 height=31 class=xl633061 width=513 style='height:23.25pt;
  width:385pt'>MITRA UTAMA MOTOR</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=3 height=20 class=xl653061 width=513 style='height:15.0pt;
  width:385pt'>LAPORAN PENJUALAN KENDARAAN BY TYPE</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=3 height=20 class=xl653061 width=513 style='height:15.0pt;
  width:385pt'>PERIODE :  <?php echo $rptdatefrom; ?> SAMPAI <?php echo $rptdateto; ?></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl663061 width=200 style='height:15.0pt;width:150pt'>TYPE</td>
  <td class=xl663061 width=242 style='border-left:none;width:182pt'>MODEL</td>
  <td class=xl663061 width=71 style='border-left:none;width:53pt'>QTY</td>
 </tr>
  <?php
		$i=1;
		if($data !=0){
		foreach ($data as $value) {
		extract($value);
	?>
 <tr class=xl653061 height=20 style='height:15.0pt'>
  <td height=20 class=xl673061 width=200 style='height:15.0pt;border-top:none;
  width:150pt'><?php echo $vehicletype; ?></td>
  <td class=xl683061 width=242 style='border-top:none;border-left:none;
  width:182pt'><?php echo $vehiclemodel; ?></td>
  <td class=xl693061 width=71 style='border-top:none;border-left:none;
  width:53pt'><?php echo $countvehicle; ?></td>
 </tr>
 <?php
	$i++;
		}
		} 
    ?>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=200 style='width:150pt'></td>
  <td width=242 style='width:182pt'></td>
  <td width=71 style='width:53pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>

