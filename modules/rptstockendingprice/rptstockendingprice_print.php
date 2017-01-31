<?php
	$db=new Database();
	//error_reporting(0);
	$rptstockending = new Rptstockendingvalue();
	$core=new Core();
	$data = $rptstockending->show();
	extract($data);
	$datatotal = $rptstockending->showtotal();
	extract($datatotal);
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
<link rel=File-List href="Laporan%20Stok%20Sparepart_files/filelist.xml">
<style id="Book1_12617_Styles">
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.xl1512617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6312617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6412617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6512617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6612617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6712617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6812617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6912617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7012617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7112617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7212617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:15.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7312617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7412617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7512617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7612617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
-->
</style>
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

<div id="Book1_12617" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=595 style='border-collapse:
 collapse;table-layout:fixed;width:447pt'>
 <col width=9 style='mso-width-source:userset;mso-width-alt:329;width:7pt'>
 <col width=30 style='mso-width-source:userset;mso-width-alt:1097;width:23pt'>
 <col width=107 style='mso-width-source:userset;mso-width-alt:3913;width:80pt'>
 <col width=236 style='mso-width-source:userset;mso-width-alt:8630;width:177pt'>
 <col width=61 style='mso-width-source:userset;mso-width-alt:2230;width:46pt'>
 <col width=87 style='mso-width-source:userset;mso-width-alt:3181;width:65pt'>
 <col width=65 style='mso-width-source:userset;mso-width-alt:2377;width:49pt'>
 <tr height=12 style='mso-height-source:userset;height:9.0pt'>
  <td height=12 class=xl1512617 width=9 style='height:9.0pt;width:7pt'></td>
  <td class=xl1512617 width=30 style='width:23pt'></td>
  <td class=xl1512617 width=107 style='width:80pt'></td>
  <td class=xl1512617 width=236 style='width:177pt'></td>
  <td class=xl1512617 width=61 style='width:46pt'></td>
  <td class=xl1512617 width=87 style='width:65pt'></td>
  <td class=xl1512617 width=65 style='width:49pt'></td>
  <td class=xl1512617 width=87 style='width:65pt'></td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl1512617 style='height:17.25pt'></td>
  <td colspan=6 class=xl7212617>LAPORAN STOK SPAREPART</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl6512617>*</td>
  <td class=xl6412617></td>
  <td class=xl6412617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
 </tr>
 <tr class=xl6312617 height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6312617 style='height:15.0pt'></td>
  <td class=xl6812617 width=30 style='width:23pt'>No</td>
  <td class=xl6812617 width=107 style='border-left:none;width:80pt'>Kode Part</td>
  <td class=xl6812617 width=236 style='border-left:none;width:177pt'>Nama Part</td>
  <td class=xl6912617 width=61 style='border-left:none;width:46pt'>No Rak</td>
  <td class=xl6812617 width=87 style='border-left:none;width:65pt'>Harga</td>
  <td class=xl6812617 width=65 style='border-left:none;width:49pt'>Qty</td>
  <td class=xl6812617 width=87 style='border-left:none;width:65pt'>Total</td>
 </tr>
 <?php
		$i=1;
		if($data !=0){
		foreach ($data as $value) {
		extract($value);
	?> 
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl7512617 width=30 style='border-top:none;width:23pt'><?php echo $i; ?></td>
  <td class=xl7512617 width=107 style='border-top:none;border-left:none;
  width:80pt'><?php echo $inventorycode; ?></td>
  <td class=xl7512617 width=236 style='border-top:none;border-left:none;
  width:177pt'><?php echo $inventoryname; ?></td>
  <td class=xl7512617 width=61 style='border-top:none;border-left:none;
  width:46pt'><?php echo $rackno; ?></td>
  <td class=xl7512617 width=87 style='border-top:none;border-left:none;
  width:65pt'><?php echo number_format($unitprice); ?></td>
  <td class=xl7612617 width=65 style='border-top:none;border-left:none;
  width:49pt'><?php echo number_format($qty); ?></td>
<td class=xl7612617 width=87 style='border-top:none;border-left:none;
  width:65pt'><?php echo number_format($total); ?></td>
 </tr>
 <?php
	$i++;
		}
		} else{
			$core->pesan_warning("Data is empty");
		}
	?>
 <?php
	$i=1;
	if($datatotal !=0){
	foreach ($datatotal as $value) {
	extract($value);
	?> 
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td colspan=5 class=xl7312617 width=521 style='width:391pt'>TOTAL</td>
  <td class=xl7012617 width=65 style='border-top:none;width:49pt'><?php echo number_format($tqty); ?></td>
  <td class=xl7012617 width=65 style='border-top:none;width:49pt'><?php echo number_format($ttotal); ?></td>
 </tr>
 <?php
	$i++;
		}
		} else{
			$core->pesan_warning("Data is empty");
		}
    ?> 
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl6712617 width=30 style='width:23pt'></td>
  <td class=xl6712617 width=107 style='width:80pt'></td>
  <td class=xl6612617 width=236 style='width:177pt'></td>
  <td class=xl6612617 width=61 style='width:46pt'></td>
  <td class=xl6612617 width=87 style='width:65pt'></td>
  <td class=xl6612617 width=65 style='width:49pt'></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl6712617 width=30 style='width:23pt'></td>
  <td class=xl6712617 width=107 style='width:80pt'></td>
  <td class=xl6612617 width=236 style='width:177pt'></td>
  <td class=xl6612617 width=61 style='width:46pt'></td>
  <td class=xl6612617 width=87 style='width:65pt'></td>
  <td class=xl6612617 width=65 style='width:49pt'></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td colspan=2 class=xl7112617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=9 style='width:7pt'></td>
  <td width=30 style='width:23pt'></td>
  <td width=107 style='width:80pt'></td>
  <td width=236 style='width:177pt'></td>
  <td width=61 style='width:46pt'></td>
  <td width=87 style='width:65pt'></td>
  <td width=65 style='width:49pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>
