<?php
	$db=new Database();
	$rptdatefrom = $_POST['rptdatefrom'];
	$rptdateto = $_POST['rptdateto'];
	//error_reporting(0);
	$rptarreceivedetail = new Rptarreceivesum();
	$core=new Core();
	$data = $rptarreceivedetail->show($rptdatefrom, $rptdateto);
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
<link rel=File-List href="rptarreceivesum_files/filelist.xml">
<style id="Book4_20570_Styles">
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.xl6320570
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
.xl6420570
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
.xl6520570
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
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
	white-space:normal;}
.xl6620570
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
.xl6720570
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#BFBFBF;
	mso-pattern:black none;
	white-space:nowrap;}
.xl6820570
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
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6920570
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
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7020570
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
	text-align:right;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7120570
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
	vertical-align:middle;
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

<div id="Book4_20570" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=572 class=xl6420570
 style='border-collapse:collapse;table-layout:fixed;width:429pt'>
 <col class=xl6420570 width=237 style='mso-width-source:userset;mso-width-alt:
 8667;width:178pt'>
 <col class=xl6420570 width=169 style='mso-width-source:userset;mso-width-alt:
 6180;width:127pt'>
 <col class=xl6420570 width=71 style='mso-width-source:userset;mso-width-alt:
 2596;width:53pt'>
 <col class=xl6420570 width=95 style='mso-width-source:userset;mso-width-alt:
 3474;width:71pt'>
 <tr height=31 style='mso-height-source:userset;height:23.25pt'>
  <td colspan=4 height=31 class=xl6320570 width=572 style='height:23.25pt;
  width:429pt'>MITRA UTAMA MOTOR</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=4 height=20 class=xl6520570 width=572 style='height:15.0pt;
  width:429pt'>LAPORAN PENCAIRAN SUMMARY</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=4 height=20 class=xl6620570 width=572 style='height:15.0pt;
  width:429pt'>PERIODE : <?php echo $rptdatefrom; ?> SAMPAI <?php echo $rptdateto; ?></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6720570 style='height:15.0pt'>LEASING</td>
  <td class=xl6720570 style='border-left:none'>PENCAIRAN</td>
  <td class=xl6720570 style='border-left:none'>QTY</td>
  <td class=xl6720570 style='border-left:none'>LEAD AVG</td>
 </tr>
  <?php
		$i=1;
		if($data !=0){
		foreach ($data as $value) {
		extract($value);
	?>
 <tr class=xl6920570 height=16 style='height:12.0pt'>
  <td height=16 class=xl6820570 width=237 style='height:12.0pt;border-top:none;
  width:178pt'>
  <?php echo $leasing; ?></td>
  <td class=xl7020570 width=169 style='border-top:none;border-left:none;
  width:127pt'><?php echo $pencairansw; ?></td>
  <td class=xl7020570 width=71 style='border-top:none;border-left:none;
  width:53pt'><?php echo $counttrans; ?></td>
  <td class=xl7120570 width=95 style='border-top:none;border-left:none;
  width:71pt'><?php echo $leadsales; ?></td>
 </tr>
 <?php
	$i++;
		}
		} 
    ?>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=237 style='width:178pt'></td>
  <td width=169 style='width:127pt'></td>
  <td width=71 style='width:53pt'></td>
  <td width=95 style='width:71pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>

