<?php
	$db=new Database();
	$rptdatefrom = $_POST['rptdatefrom'];
	$rptdateto = $_POST['rptdateto'];
	//error_reporting(0);
	$rptsalesvehicledetail = new Rptsalesvehicledetail();
	$core=new Core();
	$data = $rptsalesvehicledetail->show($rptdatefrom, $rptdateto);
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
<link rel=File-List href="Penjualan%20Detail_files/filelist.xml">
<style id="Penjualan Detail_14570_Styles"><!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.xl6314570
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
.xl6414570
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
.xl6514570
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
.xl6614570
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
.xl6714570
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
.xl6814570
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
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6914570
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

<div id="Penjualan Detail_14570" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=2021 class=xl6414570
 style='border-collapse:collapse;table-layout:fixed;width:1518pt'>

 <col class=xl6414570 width=68 style='mso-width-source:userset;mso-width-alt:
 2486;width:51pt'>
 <col class=xl6414570 width=110 style='mso-width-source:userset;mso-width-alt:
 4022;width:83pt'>
 <col class=xl6414570 width=435 style='mso-width-source:userset;mso-width-alt:
 15908;width:326pt'>
 <col class=xl6414570 width=84 style='mso-width-source:userset;mso-width-alt:
 3072;width:63pt'>
 <col class=xl6414570 width=105 span=3 style='mso-width-source:userset;
 mso-width-alt:3840;width:79pt'>
 <col class=xl6414570 width=91 style='mso-width-source:userset;mso-width-alt:
 3328;width:68pt'>
 <col class=xl6414570 width=66 style='mso-width-source:userset;mso-width-alt:
 2413;width:50pt'>
 <col class=xl6414570 width=71 style='mso-width-source:userset;mso-width-alt:
 2596;width:53pt'>
 <col class=xl6414570 width=82 style='mso-width-source:userset;mso-width-alt:
 2998;width:62pt'>
 <col class=xl6414570 width=90 style='mso-width-source:userset;mso-width-alt:
 3291;width:68pt'>
 <col class=xl6414570 width=88 style='mso-width-source:userset;mso-width-alt:
 3218;width:66pt'>
 <col class=xl6414570 width=113 style='mso-width-source:userset;mso-width-alt:
 4132;width:85pt'>
 <col class=xl6414570 width=115 style='mso-width-source:userset;mso-width-alt:
 4205;width:86pt'>
 <col class=xl6414570 width=56 style='mso-width-source:userset;mso-width-alt:
 2048;width:42pt'>
 <col class=xl6414570 width=59 style='mso-width-source:userset;mso-width-alt:
 2157;width:44pt'>
 <col class=xl6414570 width=68 style='mso-width-source:userset;mso-width-alt:
 2486;width:51pt'>
 <col class=xl6414570 width=110 style='mso-width-source:userset;mso-width-alt:
 4022;width:83pt'>
 <tr height=29 style='mso-height-source:userset;height:21.75pt'>
  <td colspan=19 height=29 class=xl6314570 width=2021 style='height:21.75pt;
  width:1518pt'>MITRA UTAMA MOTOR</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=19 height=20 class=xl6514570 width=2021 style='height:15.0pt;
  width:1518pt'>LAPORAN PENJUALAN KENDARAAN DETAIL</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=19 height=20 class=xl6514570 width=2021 style='height:15.0pt;
  width:1518pt'>PERIODE :  <?php echo $rptdatefrom; ?> SAMPAI <?php echo $rptdateto; ?></td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl6614570 width=68 style='height:19.5pt;width:51pt'>TANGGAL</td>
  <td class=xl6614570 width=110 style='border-left:none;width:83pt'>NAMA</td>
  <td class=xl6614570 width=435 style='border-left:none;width:326pt'>ALAMAT</td>
  <td class=xl6614570 width=84 style='border-left:none;width:63pt'>HP</td>
  <td class=xl6614570 width=105 style='border-left:none;width:79pt'>TYPE</td>
  <td class=xl6614570 width=105 style='border-left:none;width:79pt'>NO MESIN</td>
  <td class=xl6614570 width=105 style='border-left:none;width:79pt'>CARA BAYAR</td>
  <td class=xl6614570 width=91 style='border-left:none;width:68pt'>POS</td>
  <td class=xl6614570 width=66 style='border-left:none;width:50pt'>SALES</td>
  <td class=xl6614570 width=71 style='border-left:none;width:53pt'>OTR</td>
  <td class=xl6614570 width=82 style='border-left:none;width:62pt'>DP GROSS</td>
  <td class=xl6614570 width=90 style='border-left:none;width:68pt'>SUB LEAS SPK</td>
  <td class=xl6614570 width=88 style='border-left:none;width:66pt'>SUB LEASING</td>
  <td class=xl6614570 width=113 style='border-left:none;width:85pt'>DISK
  KONSUMEN</td>
  <td class=xl6614570 width=115 style='border-left:none;width:86pt'>DISK
  MARKETING</td>
  <td class=xl6614570 width=56 style='border-left:none;width:42pt'>SCP DLR</td>
  <td class=xl6614570 width=59 style='border-left:none;width:44pt'>SCP MD</td>
  <td class=xl6614570 width=68 style='border-left:none;width:51pt'>OI</td>
  <td class=xl6614570 width=110 style='border-left:none;width:83pt'>NETT</td>
 </tr>
 <?php
		$i=1;
		if($data !=0){
		foreach ($data as $value) {
		extract($value);
	?>
 <tr class=xl6514570 height=20 style='height:15.0pt'>
  <td height=20 class=xl6714570 width=68 style='height:15.0pt;border-top:none;
  width:51pt'><?php echo $datetrans1; ?></td>
  <td class=xl6914570 width=110 style='border-top:none;border-left:none;
  width:83pt'><?php echo $cusname; ?></td>
  <td class=xl6914570 width=435 style='border-top:none;border-left:none;
  width:326pt'><?php echo $address; ?></td>
  <td class=xl6714570 width=84 style='border-top:none;border-left:none;
  width:63pt'><?php echo $telp; ?></td>
  <td class=xl6714570 width=105 style='border-top:none;border-left:none;
  width:79pt'><?php echo $vehicletypesw; ?></td>
  <td class=xl6714570 width=105 style='border-top:none;border-left:none;
  width:79pt'><?php echo $mechineno; ?></td>
  <td class=xl6714570 width=105 style='border-top:none;border-left:none;
  width:79pt'><?php echo $leasing; ?></td>
  <td class=xl6714570 width=91 style='border-top:none;border-left:none;
  width:68pt'><?php echo $channelname; ?></td>
  <td class=xl6914570 width=66 style='border-top:none;border-left:none;
  width:50pt'><?php echo $salesmanname; ?></td>
  <td class=xl6814570 width=71 style='border-top:none;border-left:none;
  width:53pt'><?php echo $otrsw; ?></td>
  <td class=xl6814570 width=82 style='border-top:none;border-left:none;
  width:62pt'><?php echo $creditgrossdpsw; ?></td>
  <td class=xl6814570 width=90 style='border-top:none;border-left:none;
  width:68pt'>&nbsp;</td>
  <td class=xl6814570 width=88 style='border-top:none;border-left:none;
  width:66pt'><?php echo $subleasingsw; ?></td>
  <td class=xl6814570 width=113 style='border-top:none;border-left:none;
  width:85pt'><?php echo number_format($tunaidsckonsumen + $creditdisckonsumen); ?></td>
  <td class=xl6814570 width=115 style='border-top:none;border-left:none;
  width:86pt'><?php echo number_format($tunaidscmarketing + $creditdiscmarketing); ?></td>
  <td class=xl6814570 width=56 style='border-top:none;border-left:none;
  width:42pt'><?php echo $tunaiscpdaelersw; ?></td>
  <td class=xl6814570 width=59 style='border-top:none;border-left:none;
  width:44pt'><?php echo $tunaiscpmdsw; ?></td>
  <td class=xl6814570 width=68 style='border-top:none;border-left:none;
  width:51pt'>&nbsp;</td>
  <td class=xl6814570 width=110 style='border-top:none;border-left:none;
  width:83pt'><?php echo $creditnettdpsw; ?></td>
 </tr>
 <?php
	$i++;
		}
		} 
    ?>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=68 style='width:51pt'></td>
  <td width=110 style='width:83pt'></td>
  <td width=435 style='width:326pt'></td>
  <td width=84 style='width:63pt'></td>
  <td width=105 style='width:79pt'></td>
  <td width=105 style='width:79pt'></td>
  <td width=105 style='width:79pt'></td>
  <td width=91 style='width:68pt'></td>
  <td width=66 style='width:50pt'></td>
  <td width=71 style='width:53pt'></td>
  <td width=82 style='width:62pt'></td>
  <td width=90 style='width:68pt'></td>
  <td width=88 style='width:66pt'></td>
  <td width=113 style='width:85pt'></td>
  <td width=115 style='width:86pt'></td>
  <td width=56 style='width:42pt'></td>
  <td width=59 style='width:44pt'></td>
  <td width=68 style='width:51pt'></td>
  <td width=110 style='width:83pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>




