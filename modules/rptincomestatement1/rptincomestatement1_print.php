<?php
	$db=new Database();
	$rptdatefrom = $_POST['rptdatefrom'];
	$rptdateto = $_POST['rptdateto'];
	//error_reporting(0);
	$rptincomestatement1 = new Rptincomestatement1();
	$core=new Core();
	$datashow_pendapatan = $rptincomestatement1->show_pendapatan($rptdatefrom, $rptdateto);
	extract($datashow_pendapatan);
	
	$datashow_tpendapatan = $rptincomestatement1->show_tpendapatan($rptdatefrom, $rptdateto);
	extract($datashow_tpendapatan);
	
	$datashow_asset = $rptincomestatement1->show_asset($rptdatefrom, $rptdateto);
	extract($datashow_asset);
	
	$datashow_tasset = $rptincomestatement1->show_tasset($rptdatefrom, $rptdateto);
	extract($datashow_tasset);
	
	$datashow_generalcash = $rptincomestatement1->show_generalcash($rptdatefrom, $rptdateto);
	extract($datashow_generalcash);
	
	$datashow_tgeneralcash = $rptincomestatement1->show_tgeneralcash($rptdatefrom, $rptdateto);
	extract($datashow_tgeneralcash);
	
	$datashow_pettycash = $rptincomestatement1->show_pettycash($rptdatefrom, $rptdateto);
	extract($datashow_pettycash);
	
	$datashow_tpettycash = $rptincomestatement1->show_tpettycash($rptdatefrom, $rptdateto);
	extract($datashow_tpettycash);
	
	
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



<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 15">
<link rel=File-List href="Laba%20Rugi_files/filelist.xml">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<style id="Laba Rugi_6428_Styles"><!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.font56428
	{color:windowtext;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman";
	mso-generic-font-family:auto;
	mso-font-charset:134;}
.xl636428
	{padding:0px;
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
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl646428
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri;
	mso-generic-font-family:auto;
	mso-font-charset:134;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl656428
	{padding:0px;
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
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl666428
	{padding:0px;
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
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl676428
	{padding:0px;
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
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl686428
	{padding:0px;
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
.xl696428
	{padding:0px;
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
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl706428
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri;
	mso-generic-font-family:auto;
	mso-font-charset:134;
	mso-number-format:General;
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl716428
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri;
	mso-generic-font-family:auto;
	mso-font-charset:134;
	mso-number-format:General;
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl726428
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri;
	mso-generic-font-family:auto;
	mso-font-charset:134;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl736428
	{padding:0px;
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
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl746428
	{padding:0px;
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
.xl756428
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri;
	mso-generic-font-family:auto;
	mso-font-charset:134;
	mso-number-format:General;
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl766428
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri;
	mso-generic-font-family:auto;
	mso-font-charset:134;
	mso-number-format:General;
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl776428
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri;
	mso-generic-font-family:auto;
	mso-font-charset:134;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl786428
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri;
	mso-generic-font-family:auto;
	mso-font-charset:134;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl796428
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri;
	mso-generic-font-family:auto;
	mso-font-charset:134;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl806428
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri;
	mso-generic-font-family:auto;
	mso-font-charset:134;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl816428
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:18.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:underline;
	text-underline-style:single;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl826428
	{padding:0px;
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
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl836428
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri;
	mso-generic-font-family:auto;
	mso-font-charset:134;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl846428
	{padding:0px;
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
	border:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl856428
	{padding:0px;
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
	vertical-align:middle;
	border:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl866428
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl876428
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl886428
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl896428
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
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
.xl906428
	{padding:0px;
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
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl916428
	{padding:0px;
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

<div id="Laba Rugi_6428" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=860 class=xl636428
 style='border-collapse:collapse;table-layout:fixed;width:648pt'>
 <col class=xl636428 width=62 style='width:47pt'>
 <col class=xl636428 width=23 style='mso-width-source:userset;mso-width-alt:
 841;width:17pt'>
 <col class=xl636428 width=32 style='mso-width-source:userset;mso-width-alt:
 1170;width:24pt'>
 <col class=xl636428 width=64 style='mso-width-source:userset;mso-width-alt:
 2340;width:48pt'>
 <col class=xl636428 width=62 style='width:47pt'>
 <col class=xl636428 width=72 style='mso-width-source:userset;mso-width-alt:
 2633;width:54pt'>
 <col class=xl636428 width=62 style='width:47pt'>
 <col class=xl636428 width=73 style='mso-width-source:userset;mso-width-alt:
 2669;width:55pt'>
 <col class=xl636428 width=65 style='mso-width-source:userset;mso-width-alt:
 2377;width:49pt'>
 <col class=xl636428 width=72 style='mso-width-source:userset;mso-width-alt:
 2633;width:54pt'>
 <col class=xl636428 width=87 style='mso-width-source:userset;mso-width-alt:
 3181;width:65pt'>
 <col class=xl636428 width=62 span=3 style='width:47pt'>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl636428 width=62 style='height:15.0pt;width:47pt'></td>
  <td class=xl636428 width=23 style='width:17pt'></td>
  <td class=xl636428 width=32 style='width:24pt'></td>
  <td class=xl636428 width=64 style='width:48pt'></td>
  <td class=xl636428 width=62 style='width:47pt'></td>
  <td class=xl636428 width=72 style='width:54pt'></td>
  <td class=xl636428 width=62 style='width:47pt'></td>
  <td class=xl636428 width=73 style='width:55pt'></td>
  <td class=xl636428 width=65 style='width:49pt'></td>
  <td class=xl636428 width=72 style='width:54pt'></td>
  <td class=xl636428 width=87 style='width:65pt'></td>
  <td class=xl636428 width=62 style='width:47pt'></td>
  <td class=xl636428 width=62 style='width:47pt'></td>
  <td class=xl636428 width=62 style='width:47pt'></td>
 </tr>
 <tr height=31 style='height:23.25pt'>
  <td height=31 class=xl636428 style='height:23.25pt'></td>
  <td colspan=6 class=xl816428>LAPORAN LABA RUGI</td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl636428 style='height:15.0pt'></td>
  <td colspan=6 class=xl646428>PERIODE :  <?php echo $rptdatefrom; ?> SAMPAI <?php echo $rptdateto; ?></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl636428 style='height:15.75pt'></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl636428 style='height:15.75pt'></td>
  <td colspan=7 class=xl846428>DESKRIPSI</td>
  <td class=xl856428 style='border-left:none'>&nbsp;</td>
  <td class=xl846428 style='border-left:none'>DEBET</td>
  <td class=xl846428 style='border-left:none'>KREDIT</td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl636428 style='height:15.0pt'></td>
  <td colspan=7 class=xl866428>1.PENDAPATAN</td>
  <td class=xl656428 style='border-top:none'>&nbsp;</td>
  <td class=xl656428 style='border-top:none'>&nbsp;</td>
  <td class=xl666428 style='border-top:none'>&nbsp;</td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
 <?php
	$i=1;
	if($datashow_pendapatan !=0){
	foreach ($datashow_pendapatan as $value) {
	extract($value);
	?>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl636428 style='height:15.0pt'></td>
  <td class=xl676428>&nbsp;</td>
  <td colspan=6 class=xl686428><?php echo $description; ?></td>
  <td class=xl636428></td>
  <td class=xl636428 align=right><?php echo number_format($pend_amount); ?></td>
  <td class=xl696428>&nbsp;</td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
 <?php
	$i++;
		}
		} 
    ?>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl636428 style='height:15.75pt'></td>
  <td class=xl676428>&nbsp;</td>
  <td colspan=6 class=xl686428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl696428>&nbsp;</td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
 <?php
	$i=1;
	if($datashow_tpendapatan !=0){
	foreach ($datashow_tpendapatan as $value) {
	extract($value);
	?>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl636428 style='height:15.75pt'></td>
  <td colspan=8 class=xl706428>TOTAL PENDAPATAN</td>
  <td class=xl726428 align=right><?php echo number_format($tpend_amount); ?></td>
  <td class=xl736428>&nbsp;</td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
 <?php
	$i++;
		}
		} 
    ?>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl636428 style='height:15.0pt'></td>
  <td colspan=7 class=xl886428>2. ASSET USAHA</td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl696428>&nbsp;</td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
 
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl636428 style='height:15.0pt'></td>
  <td class=xl676428>&nbsp;</td>
  <td class=xl916428>JML</td>
  <td class=xl916428>UNIT</td>
  <td colspan=4 class=xl916428>MODEL KENDARAAN</td>
  <td class=xl906428>HARGA</td>
  <td class=xl636428></td>
  <td class=xl696428>&nbsp;</td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
 <?php
	$i=1;
	if($datashow_asset !=0){
	foreach ($datashow_asset as $value) {
	extract($value);
	?>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl636428 style='height:15.0pt'></td>
  <td class=xl676428>&nbsp;</td>
  <td class=xl636428 align=right><?php echo number_format($stock); ?></td>
  <td class=xl636428>UNIT</td>
  <td colspan=4><?php echo $vehlicemodel; ?></td>
  <td class=xl636428 align=right><?php echo number_format($unitprice); ?></td>
  <td class=xl636428 align=right><?php echo number_format($amountasset); ?></td>
  <td class=xl696428>&nbsp;</td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
 <?php
	$i++;
		}
		} 
    ?>
<?php
	$i=1;
	if($datashow_tasset !=0){
	foreach ($datashow_tasset as $value) {
	extract($value);
	?>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl636428 style='height:15.75pt'></td>
  <td colspan=8 class=xl756428>TOTAL ASSET USAHA</td>
  <td class=xl776428 align=right><?php echo number_format($tamountasset); ?></td>
  <td class=xl666428>&nbsp;</td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
  <?php
	$i++;
		}
		} 
    ?>
    
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl636428 style='height:15.0pt'></td>
  <td colspan=7 class=xl866428>3. PENGELUARAN</td>
  <td class=xl656428>&nbsp;</td>
  <td class=xl656428>&nbsp;</td>
  <td class=xl666428>&nbsp;</td>
  <td colspan=3 class=xl686428></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl636428 style='height:15.0pt'></td>
  <td class=xl676428>&nbsp;</td>
  <td colspan=2 class=xl746428>KODE COA</td>
  <td colspan=5 class=xl746428>DESKRIPSI</td>
  <td class=xl636428></td>
  <td class=xl696428>&nbsp;</td>
  <td colspan=3 class=xl686428></td>
 </tr>
 <?php
	$i=1;
	if($datashow_generalcash !=0){
	foreach ($datashow_generalcash as $value) {
	extract($value);
	?>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl636428 style='height:15.0pt'></td>
  <td class=xl676428>&nbsp;</td>
  <td colspan=2 class=xl746428><?php echo $acccode; ?></td>
  <td colspan=5 class=xl686428><?php echo $accname; ?></td>
  <td class=xl636428></td>
  <td class=xl696428 align=right><?php echo number_format($gbiaya_amount); ?></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
  <?php
	$i++;
		}
		} 
    ?>

 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl636428 style='height:15.75pt'></td>
  <td class=xl676428>&nbsp;</td>
  <td colspan=2 class=xl746428></td>
  <td colspan=5 class=xl686428></td>
  <td class=xl636428></td>
  <td class=xl696428>&nbsp;</td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
 <?php
	$i=1;
	if($datashow_tgeneralcash !=0){
	foreach ($datashow_tgeneralcash as $value) {
	extract($value);
	?>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl636428 style='height:15.75pt'></td>
  <td colspan=8 class=xl706428>TOTAL PENGELUARAN</td>
  <td class=xl726428>&nbsp;</td>
  <td class=xl736428 align=right><?php echo number_format($tgbiaya_amount); ?></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
  <?php
	$i++;
		}
		} 
    ?>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl636428 style='height:15.0pt'></td>
  <td colspan=7 class=xl866428>3. LAIN - LAIN</td>
  <td class=xl656428 style='border-top:none'>&nbsp;</td>
  <td class=xl656428 style='border-top:none'>&nbsp;</td>
  <td class=xl666428 style='border-top:none'>&nbsp;</td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
 
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl636428 style='height:15.0pt'></td>
  <td class=xl676428>&nbsp;</td>
  <td colspan=2 class=xl746428>KODE COA</td>
  <td colspan=5 class=xl746428>DESKRIPSI</td>
  <td class=xl636428></td>
  <td class=xl696428>&nbsp;</td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
  <?php
	$i=1;
	if($datashow_pettycash !=0){
	foreach ($datashow_pettycash as $value) {
	extract($value);
	?>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl636428 style='height:15.0pt'></td>
  <td class=xl676428>&nbsp;</td>
  <td colspan=2 class=xl746428><?php echo $pettycash_accountcode; ?></td>
  <td colspan=5 class=xl686428><?php echo $pettycash_accountname; ?></td>
  <td class=xl636428 align=right><?php echo number_format($pettycash_debet); ?></td>
  <td class=xl696428 align=right><?php echo number_format($pettycash_credit); ?></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
  <?php
	$i++;
		}
		} 
    ?>
    <?php
	$i=1;
	if($datashow_tpettycash !=0){
	foreach ($datashow_tpettycash as $value) {
	extract($value);
	?>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl636428 style='height:15.75pt'></td>
  <td colspan=8 class=xl706428>TOTAL LAIN - LAIN</td>
  <td class=xl726428>&nbsp;</td>
  <td class=xl736428 align=right><?php echo number_format($pettycash_amount); ?></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
 <?php
	$i++;
		}
		} 
    ?>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl636428 style='height:15.75pt'></td>
  <td colspan=8 class=xl786428>TOTAL HASIL USAHA : Rp. <?php echo number_format($pettycash_amount+$tamountasset+$tpend_amount-$tgbiaya_amount); ?></td>
  <td class=xl826428 align=right style='border-top:none'></td>
  <td class=xl836428 align=right style='border-top:none'></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl636428 style='height:15.0pt'></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl636428 style='height:15.0pt'></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl806428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl636428 style='height:15.0pt'></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
  <td class=xl636428></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=62 style='width:47pt'></td>
  <td width=23 style='width:17pt'></td>
  <td width=32 style='width:24pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=62 style='width:47pt'></td>
  <td width=72 style='width:54pt'></td>
  <td width=62 style='width:47pt'></td>
  <td width=73 style='width:55pt'></td>
  <td width=65 style='width:49pt'></td>
  <td width=72 style='width:54pt'></td>
  <td width=87 style='width:65pt'></td>
  <td width=62 style='width:47pt'></td>
  <td width=62 style='width:47pt'></td>
  <td width=62 style='width:47pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>




