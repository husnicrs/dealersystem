<?php
	$db=new Database();
	$cashpayment = new Appayment();
	$core=new Core();
	if (isset($_GET['key'])) {
		$key = $_GET['key'];
		$data = $cashpayment->showListHeader($key);
		extract($data);
		$datadetail = $cashpayment->showslipdetail($key);
		$datatotal = $cashpayment->showsliptotal($key);
	}
?>
<style type="text/css">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
</style>

<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 15">
<link rel=File-List href="delivery%20order_files/filelist.xml">
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
	background:#E7E6E6;
	mso-pattern:black none;
	white-space:normal;}
.xl6512617
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
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6612617
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
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6812617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
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
.xl6912617
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
	white-space:normal;}
.xl7012617
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
	vertical-align:bottom;
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
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7212617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
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
	white-space:normal;}
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
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7412617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:22.0pt;
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
.xl7512617
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
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
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

<table border=0 cellpadding=0 cellspacing=0 width=816 style='border-collapse:
 collapse;table-layout:fixed;width:613pt'>
 <col width=20 style='mso-width-source:userset;mso-width-alt:731;width:15pt'>
 <col width=87 style='mso-width-source:userset;mso-width-alt:3181;width:65pt'>
 <col width=222 style='mso-width-source:userset;mso-width-alt:8118;width:167pt'>
 <col width=87 style='mso-width-source:userset;mso-width-alt:3181;width:65pt'>
 <col width=154 style='mso-width-source:userset;mso-width-alt:5632;width:116pt'>
 <col width=97 style='mso-width-source:userset;mso-width-alt:3547;width:73pt'>
 <col width=85 style='mso-width-source:userset;mso-width-alt:3108;width:64pt'>
 <col width=64 style='width:48pt'>
 <tr height=31 style='mso-height-source:userset;height:23.25pt'>
  <td height=31 class=xl1512617 width=20 style='height:23.25pt;width:15pt'></td>
  <td colspan=2 class=xl7412617 width=309 style='width:232pt'>DELIVERY ORDER</td>
  <td class=xl1512617 width=87 style='width:65pt'></td>
  <td class=xl1512617 width=154 style='width:116pt'></td>
  <td class=xl1512617 width=97 style='width:73pt'></td>
  <td class=xl1512617 width=85 style='width:64pt'></td>
  <td class=xl1512617 width=64 style='width:48pt'></td>
 </tr>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td height=22 class=xl1512617 style='height:16.5pt'></td>
  <td class=xl6612617 width=87 style='width:65pt'>DO No<span
  style='mso-spacerun:yes'>�</span></td>
  <td colspan=2 class=xl7212617 width=309 style='width:232pt'>: <?php echo $notrans; ?></td>
  <td class=xl6912617 width=154 style='width:116pt'></td>
  <td colspan=2 class=xl7212617 width=182 style='width:137pt'></td>
  <td class=xl6912617 width=64 style='width:48pt'></td>
 </tr>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td height=22 class=xl1512617 style='height:16.5pt'></td>
  <td class=xl6712617 width=87 style='width:65pt'>DO<span
  style='mso-spacerun:yes'>� </span>Date</td>
  <td colspan=2 class=xl7212617 width=309 style='width:232pt'>: <?php echo $datetrans; ?></td>
  <td class=xl7012617 width=154 style='width:116pt'></td>
  <td colspan=2 class=xl7212617 width=182 style='width:137pt'></td>
  <td class=xl7012617 width=64 style='width:48pt'></td>
 </tr>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td height=22 class=xl1512617 style='height:16.5pt'></td>
  <td class=xl6712617 width=87 style='width:65pt'>Customer</td>
  <td colspan=2 class=xl7212617 width=309 style='width:232pt'>: <?php echo $suppliername; ?></td>
  <td class=xl7012617 width=154 style='width:116pt'></td>
  <td colspan=2 class=xl7212617 width=182 style='width:137pt'></td>
  <td class=xl7012617 width=64 style='width:48pt'></td>
 </tr>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td height=22 class=xl1512617 style='height:16.5pt'></td>
  <td class=xl6712617 width=87 style='width:65pt'>Ship To</td>
  <td colspan=2 class=xl7212617 width=309 style='width:232pt'>: <?php echo $shiptoaddress; ?></td>
  <td class=xl7012617 width=154 style='width:116pt'></td>
  <td colspan=2 class=xl7212617 width=182 style='width:137pt'></td>
  <td class=xl7012617 width=64 style='width:48pt'></td>
 </tr>
 <tr height=7 style='mso-height-source:userset;height:5.25pt'>
  <td height=7 class=xl1512617 style='height:5.25pt'></td>
  <td class=xl1512617></td>
  <td class=xl7112617></td>
  <td class=xl7112617></td>
  <td class=xl7112617></td>
  <td class=xl7112617></td>
  <td class=xl7112617></td>
  <td class=xl1512617></td>
 </tr>
 <tr class=xl6312617 height=35 style='mso-height-source:userset;height:26.25pt'>
  <td height=35 class=xl6312617 style='height:26.25pt'></td>
  <td class=xl6412617 width=87 style='width:65pt'><span
  style='mso-spacerun:yes'>�</span>Code</td>
  <td class=xl6412617 width=222 style='border-left:none;width:167pt'>Product
  Name</td>
  <td class=xl6412617 width=87 style='border-left:none;width:65pt'>Unit</td>
  <td class=xl6412617 width=154 style='border-left:none;width:116pt'>SO No</td>
  <td class=xl6412617 width=97 style='border-left:none;width:73pt'>SO Date</td>
  <td class=xl6412617 width=85 style='border-left:none;width:64pt'>Qty</td>
  <td class=xl6312617></td>
 </tr>
  <?php
	$i=1;
	if($datadetail !=0){
	foreach ($datadetail as $value) {
	extract($value);
 ?>  
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl6812617 width=87 style='border-top:none;width:65pt'><?php echo $inventorycode ?></td>
  <td class=xl6812617 width=222 style='border-top:none;border-left:none;
  width:167pt'><?php echo $inventoryname ?></td>
  <td class=xl6812617 width=87 style='border-top:none;border-left:none;
  width:65pt'><?php echo $unit ?></td>
  <td class=xl6812617 width=154 style='border-top:none;border-left:none;
  width:116pt'><?php echo $notrans ?></td>
  <td class=xl6812617 width=97 style='border-top:none;border-left:none;
  width:73pt'><?php echo $datetrans ?></td>
  <td class=xl6812617 width=85 style='border-top:none;border-left:none;
  width:64pt'><?php echo $quantity ?></td>
  <td class=xl1512617></td>
 </tr>
 <?php
	$i++;
		}
		} else{
			$core->pesan_warning("Content is emty, please input a data or check your database");
		}
 ?>   
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
 </tr>
<?php
	$i=1;
	if($datatotal !=0){
	foreach ($datatotal as $value) {
	extract($value);
 ?>  
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl6512617>Total</td>
  <td class=xl1512617><?php echo number_format($tquantity) ?></td>
  <td class=xl1512617></td>
 </tr>
 <?php
	$i++;
		}
		} else{
			$core->pesan_warning("Content is emty, please input a data or check your database");
		}
 ?>  
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl6312617>Remark</td>
  <td class=xl6312617>:</td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td colspan=2 class=xl7512617>Dibuat Oleh,</td>
  <td class=xl1512617></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl6312617></td>
  <td class=xl1512617></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl6312617></td>
  <td class=xl1512617></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl6312617></td>
  <td class=xl1512617></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td colspan=2 class=xl7312617>(����������..)</td>
  <td class=xl1512617></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=20 style='width:15pt'></td>
  <td width=87 style='width:65pt'></td>
  <td width=222 style='width:167pt'></td>
  <td width=87 style='width:65pt'></td>
  <td width=154 style='width:116pt'></td>
  <td width=97 style='width:73pt'></td>
  <td width=85 style='width:64pt'></td>
  <td width=64 style='width:48pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>
