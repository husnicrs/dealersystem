<?php
	$db=new Database();
	$datefrom = $_POST['rptdatefrom'];
	$dateto = $_POST['rptdateto'];
	//error_reporting(0);
	$rptstockopname = new Rptstockopname();
	$core=new Core();
	$data = $rptstockopname->show($datefrom, $dateto);
	extract($data);
	$datatotal = $rptstockopname->showtotal($datefrom, $dateto);
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
<link rel=File-List href="sales%20order_files/filelist.xml">
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
	font-weight:400;
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
	font-size:16.0pt;
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
.xl6712617
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
	text-align:general;
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
	background:#EDEDED;
	mso-pattern:black none;
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
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
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
	text-align:right;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7212617
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
.xl7312617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:20.0pt;
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

<table border=0 cellpadding=0 cellspacing=0 width=983 style='border-collapse:
 collapse;table-layout:fixed;width:738pt'>
 <col width=20 style='mso-width-source:userset;mso-width-alt:731;width:15pt'>
 <col width=95 style='mso-width-source:userset;mso-width-alt:3474;width:71pt'>
 <col width=69 style='mso-width-source:userset;mso-width-alt:2523;width:52pt'>
 <col width=188 style='mso-width-source:userset;mso-width-alt:6875;width:141pt'>
 <col width=123 style='mso-width-source:userset;mso-width-alt:4498;width:92pt'>
 <col width=178 style='mso-width-source:userset;mso-width-alt:6509;width:134pt'>
 <col width=58 style='mso-width-source:userset;mso-width-alt:2121;width:44pt'>
 <col width=71 style='mso-width-source:userset;mso-width-alt:2596;width:53pt'>
 <col width=64 style='width:48pt'>
 <col width=41 style='mso-width-source:userset;mso-width-alt:1499;width:31pt'>
 <col width=76 style='mso-width-source:userset;mso-width-alt:2779;width:57pt'>
 <tr height=12 style='mso-height-source:userset;height:9.0pt'>
  <td height=12 class=xl1512617 width=20 style='height:9.0pt;width:15pt'></td>
  <td class=xl1512617 width=95 style='width:71pt'></td>
  <td class=xl1512617 width=69 style='width:52pt'></td>
  <td class=xl1512617 width=188 style='width:141pt'></td>
  <td class=xl1512617 width=123 style='width:92pt'></td>
  <td class=xl1512617 width=178 style='width:134pt'></td>
  <td class=xl1512617 width=58 style='width:44pt'></td>
  <td class=xl1512617 width=71 style='width:53pt'></td>
  <td class=xl1512617 width=64 style='width:48pt'></td>
  <td class=xl1512617 width=41 style='width:31pt'></td>
  <td class=xl1512617 width=76 style='width:57pt'></td>
 </tr>
 <tr height=13 style='mso-height-source:userset;height:9.75pt'>
  <td height=13 class=xl1512617 style='height:9.75pt'></td>
  <td colspan=4 rowspan=2 class=xl7312617>APOTIK BERKAT FARMA<span
  style='mso-spacerun:yes'>�</span></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
 </tr>
 <tr height=13 style='mso-height-source:userset;height:9.75pt'>
  <td height=13 class=xl1512617 style='height:9.75pt'></td>

  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
 </tr>
 <tr height=27 style='mso-height-source:userset;height:20.25pt'>
  <td height=27 class=xl1512617 style='height:20.25pt'></td>
  <td class=xl6612617 colspan=2>STOCK OPNAME REPORT</td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td colspan=6 class=xl7112617>Period: <?php echo $datefrom; ?> to <?php echo $dateto; ?></td>
 </tr>
 <tr class=xl6312617 height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl6312617 style='height:21.0pt'></td>
  <td class=xl6912617 width=95 style='width:71pt'>No Trans</td>
  <td class=xl6912617 width=69 style='border-left:none;width:52pt'>Date Trans</td>
  <td class=xl6912617 width=188 style='border-left:none;width:141pt'>Product Name</td>
  <td class=xl6912617 width=123 style='border-left:none;width:92pt'>Unit</td>
  <td class=xl6912617 width=178 style='border-top:none;border-left:none;
  width:134pt'>Stock System</td>
  <td class=xl6912617 width=58 style='border-top:none;border-left:none;
  width:44pt'>Stock Fisik</td>
  <td class=xl6912617 width=71 style='border-top:none;border-left:none;
  width:53pt'>Stock Adjustment</td>
  <td class=xl6912617 width=64 style='border-top:none;border-left:none;
  width:48pt'>Price</td>
 </tr>
 <?php
		$i=1;
		if($data !=0){
		foreach ($data as $value) {
		extract($value);
	?>  
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl6712617 width=95 style='border-top:none;width:71pt'><?php echo $notrans; ?></td>
  <td class=xl6712617 width=69 style='border-top:none;border-left:none;
  width:52pt'><?php echo $datetrans; ?></td>
  <td class=xl6712617 width=188 style='border-top:none;border-left:none;
  width:141pt'><?php echo $inventoryname; ?></td>
  <td class=xl6712617 width=123 style='border-top:none;border-left:none;
  width:92pt'><?php echo $unit; ?></td>
  <td class=xl6712617 width=178 style='border-top:none;border-left:none;
  width:134pt'><?php echo $stockqty; ?></td>
  <td class=xl6712617 width=58 style='border-top:none;border-left:none;
  width:44pt'><?php echo $quantity; ?></td>
  <td class=xl6812617 width=71 style='border-top:none;border-left:none;
  width:53pt'><?php echo $adjqty; ?></td>
  <td class=xl6812617 width=64 style='border-top:none;border-left:none;
  width:48pt'><?php echo $unitprice; ?></td>
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
  <td class=xl1512617></td>
  <td class=xl1512617></td>
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
  <td class=xl1512617></td>
  <td class=xl1512617></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td colspan=2 class=xl7012617>Dibuat Oleh,</td>
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
  <td class=xl1512617></td>
  <td class=xl1512617></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td colspan=2 class=xl7012617>(������������..)</td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=20 style='width:15pt'></td>
  <td width=95 style='width:71pt'></td>
  <td width=69 style='width:52pt'></td>
  <td width=188 style='width:141pt'></td>
  <td width=123 style='width:92pt'></td>
  <td width=178 style='width:134pt'></td>
  <td width=58 style='width:44pt'></td>
  <td width=71 style='width:53pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=41 style='width:31pt'></td>
  <td width=76 style='width:57pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>


