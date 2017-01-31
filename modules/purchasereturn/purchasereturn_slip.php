<?php
	$db=new Database();
	$moddetail=$_GET['mod'];
	$modulename=str_replace("_slip","", $moddetail);
	${"$modulename"} = new Purchasereturn();
	$core=new Core();
	if (isset($_GET['key'])) {
		$key = $_GET['key'];
		$data = ${"$modulename"}->showDetail($key);
		extract($data);
		$datadetail = ${"$modulename"}->showslipdetail($key);
		$datatotal = ${"$modulename"}->showsliptotal($key);
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
<link rel=File-List href="purchasereturn%20order_files/filelist.xml">
<style id="Book1_12617_Styles"><!--table
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
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#E7E6E6;
	mso-pattern:black none;
	white-space:normal;}
.xl6612617
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
.xl6712617
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
.xl6812617
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
.xl6912617
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
.xl7012617
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
.xl7112617
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
.xl7212617
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
.xl7312617
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
.xl7412617
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
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
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

<div id="Book1_12617" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=902 style='border-collapse:
 collapse;table-layout:fixed;width:677pt'>
 <col width=20 style='mso-width-source:userset;mso-width-alt:731;width:15pt'>
 <col width=87 style='mso-width-source:userset;mso-width-alt:3181;width:65pt'>
 <col width=222 style='mso-width-source:userset;mso-width-alt:8118;width:167pt'>
 <col width=87 style='mso-width-source:userset;mso-width-alt:3181;width:65pt'>
 <col width=99 style='mso-width-source:userset;mso-width-alt:3620;width:74pt'>
 <col width=62 style='mso-width-source:userset;mso-width-alt:2267;width:47pt'>
 <col width=85 style='mso-width-source:userset;mso-width-alt:3108;width:64pt'>
 <col width=176 style='mso-width-source:userset;mso-width-alt:6436;width:132pt'>
 <col width=64 style='width:48pt'>
 <tr height=31 style='mso-height-source:userset;height:23.25pt'>
  <td height=31 class=xl1512617 width=20 style='height:23.25pt;width:15pt'></td>
  <td colspan=2 class=xl6412617 width=309 style='width:232pt'>PURCHASE RETURN</td>
  <td class=xl1512617 width=87 style='width:65pt'></td>
  <td class=xl1512617 width=99 style='width:74pt'></td>
  <td class=xl1512617 width=62 style='width:47pt'></td>
  <td class=xl1512617 width=85 style='width:64pt'></td>
  <td class=xl1512617 width=176 style='width:132pt'></td>
  <td class=xl1512617 width=64 style='width:48pt'></td>
 </tr>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td height=22 class=xl1512617 style='height:16.5pt'></td>
  <td class=xl6812617 width=87 style='width:65pt'>No<span
  style='mso-spacerun:yes'> </span></td>
  <td colspan=2 class=xl7412617 width=309 style='width:232pt'>: <?php echo $notrans; ?></td>
  <td class=xl7112617 width=64 style='width:48pt'></td>
 </tr>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td height=22 class=xl1512617 style='height:16.5pt'></td>
  <td class=xl6912617 width=87 style='width:65pt'>Date</td>
  <td colspan=2 class=xl7412617 width=309 style='width:232pt'>: <?php echo $datetrans; ?></td>
  <td class=xl7212617 width=64 style='width:48pt'></td>
 </tr>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td height=22 class=xl1512617 style='height:16.5pt'></td>
  <td class=xl6912617 width=87 style='width:65pt'>Supplier</td>
  <td colspan=2 class=xl7412617 width=309 style='width:232pt'>: <?php echo $suppliername; ?></td>
  <td class=xl7212617 width=64 style='width:48pt'></td>
 </tr>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td height=22 class=xl1512617 style='height:16.5pt'></td>
  <td class=xl7212617 width=64 style='width:48pt'></td>
 </tr>
 <tr height=7 style='mso-height-source:userset;height:5.25pt'>
  <td height=7 class=xl1512617 style='height:5.25pt'></td>
  <td class=xl1512617></td>
  <td class=xl7312617></td>
  <td class=xl7312617></td>
  <td class=xl7312617></td>
  <td class=xl7312617></td>
  <td class=xl7312617></td>
  <td class=xl7312617></td>
  <td class=xl1512617></td>
 </tr>
 <tr class=xl6312617 height=35 style='mso-height-source:userset;height:26.25pt'>
  <td height=35 class=xl6312617 style='height:26.25pt'></td>
  <td class=xl6512617 width=87 style='width:65pt'><span
  style='mso-spacerun:yes'> </span>Code</td>
  <td class=xl6512617 width=222 style='border-left:none;width:167pt'>Product
  Name</td>
  <td class=xl6512617 width=87 style='border-left:none;width:65pt'>Unit</td>
  <td class=xl6512617 width=99 style='border-left:none;width:74pt'>Price</td>
  <td class=xl6512617 width=62 style='border-left:none;width:47pt'>Disc</td>
  <td class=xl6512617 width=85 style='border-left:none;width:64pt'>Qty</td>
  <td class=xl6512617 width=176 style='border-left:none;width:132pt'>Subtotal</td>
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
  <td class=xl7012617 width=87 style='border-top:none;width:65pt'><?php echo $inventorycode ?></td>
  <td class=xl7012617 width=222 style='border-top:none;border-left:none;
  width:167pt'><?php echo $inventoryname ?></td>
  <td class=xl7012617 width=87 style='border-top:none;border-left:none;
  width:65pt'><?php echo $unit ?></td>
  <td class=xl7012617 width=99 style='border-top:none;border-left:none;
  width:74pt'><?php echo number_format($unitprice) ?></td>
  <td class=xl7012617 width=62 style='border-top:none;border-left:none;
  width:47pt'><?php echo $discount ?></td>
  <td class=xl7012617 width=85 style='border-top:none;border-left:none;
  width:64pt'><?php echo $quantity ?></td>
  <td class=xl7012617 width=176 style='border-top:none;border-left:none;
  width:132pt'><?php echo number_format($amount) ?></td>
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
  <td class=xl6612617>Total</td>
  <td class=xl1512617><?php echo number_format($tquantity) ?></td>
  <td class=xl1512617><?php echo number_format($tamount) ?></td>
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
  <td class=xl1512617></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td colspan=2 class=xl6712617>Dibuat Oleh,</td>
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
  <td colspan=2 class=xl7512617>(……………………………………………..)</td>
  <td class=xl1512617></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=20 style='width:15pt'></td>
  <td width=87 style='width:65pt'></td>
  <td width=222 style='width:167pt'></td>
  <td width=87 style='width:65pt'></td>
  <td width=99 style='width:74pt'></td>
  <td width=62 style='width:47pt'></td>
  <td width=85 style='width:64pt'></td>
  <td width=176 style='width:132pt'></td>
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


