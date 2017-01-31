<?php
	$db=new Database();
	$rptdatefrom = $_POST['rptdatefrom'];
	$rptdateto = $_POST['rptdateto'];
	//error_reporting(0);
	$rptsalesservice = new Rptsalesservice();
	$core=new Core();
	$data = $rptsalesservice->show($rptdatefrom, $rptdateto);
	extract($data);
	
	$datatotal = $rptsalesservice->showtotal($rptdatefrom, $rptdateto);
	extract($datatotal);
	
	$datashowtotalkpb = $rptsalesservice->showtotalkpb($rptdatefrom, $rptdateto);
	extract($datashowtotalkpb);
	
	$datashowtotalnkpb = $rptsalesservice->showtotalnkpb($rptdatefrom, $rptdateto);
	extract($datashowtotalnkpb);
	
	$datashowtotalntkpb = $rptsalesservice->showtotalntkpb($rptdatefrom, $rptdateto);
	extract($datashowtotalntkpb);
	
	$datashowtotalkpbdetail = $rptsalesservice->showtotalkpbdetail($rptdatefrom, $rptdateto);
	extract($datashowtotalkpbdetail);
	
	$datashowsumtotalkpbdetail = $rptsalesservice->showsumtotalkpbdetail($rptdatefrom, $rptdateto);
	extract($datashowsumtotalkpbdetail);
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
<link rel=File-List href="Laporan%20Pendapatan%20Bengkel_files/filelist.xml">
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
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6712617
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
	font-size:9.0pt;
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
	text-align:center;
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
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
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
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
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
	border-right:.5pt solid windowtext;
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
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:middle;
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
.xl7712617
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
.xl7812617
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
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7912617
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
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8012617
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
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8112617
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
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8212617
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
.xl8312617
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
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8412617
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
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8512617
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
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8612617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:bottom;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8712617
	{padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:bottom;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8812617
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
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8912617
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
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9012617
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
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9112617
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
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
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

<div id="Book1_12617" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=814 style='border-collapse:
 collapse;table-layout:fixed;width:612pt'>
 <col width=19 style='mso-width-source:userset;mso-width-alt:694;width:14pt'>
 <col width=30 style='mso-width-source:userset;mso-width-alt:1097;width:23pt'>
 <col width=82 style='mso-width-source:userset;mso-width-alt:2998;width:62pt'>
 <col width=89 span=2 style='mso-width-source:userset;mso-width-alt:3254;
 width:67pt'>
 <col width=75 style='mso-width-source:userset;mso-width-alt:2742;width:56pt'>
 <col width=66 style='mso-width-source:userset;mso-width-alt:2413;width:50pt'>
 <col width=52 span=4 style='mso-width-source:userset;mso-width-alt:1901;
 width:39pt'>
 <col width=52 style='mso-width-source:userset;mso-width-alt:1901;width:39pt'>
 <col width=52 span=2 style='mso-width-source:userset;mso-width-alt:1901;
 width:39pt'>
 <tr height=12 style='mso-height-source:userset;height:9.0pt'>
  <td height=12 class=xl1512617 width=19 style='height:9.0pt;width:14pt'></td>
  <td class=xl1512617 width=30 style='width:23pt'></td>
  <td class=xl1512617 width=82 style='width:62pt'></td>
  <td class=xl1512617 width=89 style='width:67pt'></td>
  <td class=xl1512617 width=89 style='width:67pt'></td>
  <td class=xl1512617 width=75 style='width:56pt'></td>
  <td class=xl1512617 width=66 style='width:50pt'></td>
  <td class=xl1512617 width=52 style='width:39pt'></td>
  <td class=xl1512617 width=52 style='width:39pt'></td>
  <td class=xl1512617 width=52 style='width:39pt'></td>
  <td class=xl1512617 width=52 style='width:39pt'></td>
  <td class=xl1512617 width=52 style='width:39pt'></td>
  <td class=xl1512617 width=52 style='width:39pt'></td>
  <td class=xl1512617 width=52 style='width:39pt'></td>
 </tr>
 <tr height=8 style='mso-height-source:userset;height:6.0pt'>
  <td height=8 class=xl1512617 style='height:6.0pt'></td>
  <td colspan=5 rowspan=2 class=xl6412617>LAPORAN PENDAPATAN BENGKEL</td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
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
  <td class=xl1512617></td>
  <td class=xl1512617></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl6512617 colspan=3>PEIODE: <?php echo $rptdatefrom; ?> S/D <?php echo $rptdateto; ?></td>
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
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td height=19 class=xl1512617 style='height:14.25pt'></td>
  <td rowspan=2 class=xl6712617 width=30 style='width:23pt'>NO</td>
  <td rowspan=2 class=xl6712617 width=82 style='width:62pt'>NAMA</td>
  <td rowspan=2 class=xl6712617 width=89 style='width:67pt'>TYPE</td>
  <td rowspan=2 class=xl7612617 width=89 style='width:67pt'>MEKANIK</td>
  <td rowspan=2 class=xl7612617 width=75 style='width:56pt'>KASIR</td>
  <td rowspan=2 class=xl6712617 width=66 style='width:50pt'>NOTA</td>
  <td colspan=3 class=xl7012617 width=156 style='border-left:none;width:117pt'>JASA SERVIS</td>
  <td colspan=3 class=xl7012617 width=156 style='border-left:none;width:117pt'>SPAREPART</td>
  <td rowspan=2 class=xl7612617 width=52 style='width:39pt'>TOTAL</td>
 </tr>
 <tr class=xl6312617 height=19 style='mso-height-source:userset;height:14.25pt'>
  <td height=19 class=xl6312617 style='height:14.25pt'></td>
  <td class=xl7612617 width=52 style='border-top:none;border-left:none;
  width:39pt'>BIAYA</td>
  <td class=xl7612617 width=52 style='border-top:none;border-left:none;
  width:39pt'>DISC</td>
  <td class=xl7012617 width=52 style='border-top:none;border-left:none;
  width:39pt'>TOTAL</td>
  <td class=xl7612617 width=52 style='border-top:none;border-left:none;
  width:39pt'>BIAYA</td>
  <td class=xl7612617 width=52 style='border-top:none;border-left:none;
  width:39pt'>DISC</td>
  <td class=xl7012617 width=52 style='border-top:none;border-left:none;
  width:39pt'>TOTAL</td>
 </tr>
  <?php
	$i=1;
	if($data !=0){
	foreach ($data as $value) {
	extract($value);
	?> 
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl6812617 width=30 style='border-top:none;width:23pt'><?php echo $i; ?></td>
  <td class=xl6812617 width=82 style='border-top:none;border-left:none;
  width:62pt'><?php echo $customername; ?></td>
  <td class=xl6812617 width=89 style='border-top:none;border-left:none;
  width:67pt'><?php echo $vahicletype; ?></td>
  <td class=xl6812617 width=89 style='border-top:none;border-left:none;
  width:67pt'><?php echo $mekanik; ?></td>
  <td class=xl6812617 width=75 style='border-top:none;border-left:none;
  width:56pt'><?php echo $kasir; ?></td>
  <td class=xl6812617 width=66 style='border-top:none;border-left:none;
  width:50pt'><?php echo $notrans; ?></td>
  <td class=xl6912617 width=52 style='border-top:none;border-left:none;
  width:39pt'><?php echo $sr_unitprice; ?></td>
  <td class=xl6912617 width=52 style='border-top:none;border-left:none;
  width:39pt'><?php echo $sr_discountamt; ?></td>
  <td class=xl6912617 width=52 style='border-top:none;border-left:none;
  width:39pt'><?php echo $sr_subtotal; ?></td>
  <td class=xl6912617 width=52 style='border-top:none;border-left:none;
  width:39pt'><?php echo $pr_unitprice; ?></td>
  <td class=xl6912617 width=52 style='border-top:none;border-left:none;
  width:39pt'><?php echo $pr_discountamt; ?></td>
  <td class=xl6912617 width=52 style='border-top:none;border-left:none;
  width:39pt'><?php echo $pr_subtotal; ?></td>
  <td class=xl6912617 width=52 style='border-top:none;border-left:none;
  width:39pt'><?php echo $total; ?></td>
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
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl1512617 style='height:12.0pt'></td>
  <td colspan=6 rowspan=2 class=xl7512617 width=431 style='width:325pt'>GRAND
  TOTAL : </td>
  <td class=xl8612617 width=52 style='border-top:none;border-left:none;
  width:39pt'><?php echo $tsr_unitprice; ?></td>
  <td class=xl8612617 width=52 style='border-top:none;border-left:none;
  width:39pt'>&nbsp;</td>
  <td class=xl8612617 width=52 style='border-top:none;border-left:none;
  width:39pt'><?php echo $tsr_subtotal; ?></td>
  <td class=xl8612617 width=52 style='border-top:none;border-left:none;
  width:39pt'><?php echo $tpr_unitprice; ?></td>
  <td class=xl8612617 width=52 style='border-top:none;border-left:none;
  width:39pt'>&nbsp;</td>
  <td class=xl8612617 width=52 style='border-top:none;border-left:none;
  width:39pt'><?php echo $tpr_subtotal; ?></td>
  <td class=xl8612617 width=52 style='border-top:none;border-left:none;
  width:39pt'><?php echo $ttotal; ?></td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl1512617 style='height:12.0pt'></td>
  <td class=xl8712617 width=52 style='border-left:none;width:39pt'>&nbsp;</td>
  <td class=xl8712617 width=52 style='border-left:none;width:39pt'><?php echo $tsr_discountamt; ?></td>
  <td class=xl8712617 width=52 style='border-left:none;width:39pt'>&nbsp;</td>
  <td class=xl8712617 width=52 style='border-left:none;width:39pt'>&nbsp;</td>
  <td class=xl8712617 width=52 style='border-left:none;width:39pt'><?php echo $tpr_discountamt; ?></td>
  <td class=xl8712617 width=52 style='border-left:none;width:39pt'>&nbsp;</td>
  <td class=xl8712617 width=52 style='border-left:none;width:39pt'>&nbsp;</td>
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
  <td class=xl7712617 width=30 style='width:23pt'></td>
  <td class=xl7712617 width=82 style='width:62pt'></td>
  <td class=xl7712617 width=89 style='width:67pt'></td>
  <td class=xl7712617 width=89 style='width:67pt'></td>
  <td class=xl7712617 width=75 style='width:56pt'></td>
  <td class=xl7712617 width=66 style='width:50pt'></td>
  <td class=xl7712617 width=52 style='width:39pt'></td>
  <td class=xl7712617 width=52 style='width:39pt'></td>
  <td class=xl7712617 width=52 style='width:39pt'></td>
  <td class=xl7712617 width=52 style='width:39pt'></td>
  <td class=xl7712617 width=52 style='width:39pt'></td>
  <td class=xl7712617 width=52 style='width:39pt'></td>
  <td class=xl7712617 width=52 style='width:39pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td colspan=2 class=xl6712617 width=112 style='width:85pt'>MANAGER</td>
  <td class=xl6712617 width=89 style='border-left:none;width:67pt'>ACCOUNTING</td>
  <td class=xl6712617 width=89 style='border-left:none;width:67pt'>ADMIN</td>
  <td class=xl7712617 width=75 style='width:56pt'></td>
  <td class=xl7712617 width=66 style='width:50pt'></td>
  <td class=xl8312617 width=52 style='width:39pt'></td>
  <td colspan=2 class=xl7612617 width=104 style='width:78pt'>KPB</td>
  <td colspan=2 class=xl7612617 width=104 style='border-left:none;width:78pt'>NON
  KPB</td>
  <td colspan=2 class=xl7612617 width=104 style='border-left:none;width:78pt'>JUMLAH</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td colspan=2 rowspan=3 class=xl8112617 width=112 style='width:85pt'>&nbsp;</td>
  <td rowspan=3 class=xl7812617 width=89 style='border-bottom:.5pt solid black;
  border-top:none;width:67pt'>&nbsp;</td>
  <td rowspan=3 class=xl7812617 width=89 style='border-bottom:.5pt solid black;
  border-top:none;width:67pt'>&nbsp;</td>
  <td class=xl7712617 width=75 style='width:56pt'></td>
  <td class=xl7712617 width=66 style='width:50pt'></td>
  <td class=xl8312617 width=52 style='width:39pt'></td>
  
  <?php
	$i=1;
	if($datatotal !=0){
	foreach ($datatotal as $value) {
	extract($value);
	?> 
  <td colspan=2 class=xl8412617 width=104 style='border-right:.5pt solid black;
  width:78pt'><?php echo $tsr_discountamt; ?></td>
  <?php
	$i++;
		}
		} else{
			$core->pesan_warning("0");
		}
    ?>  
  
   <?php
	$i=1;
	if($datatotal !=0){
	foreach ($datatotal as $value) {
	extract($value);
	?> 
  <td colspan=2 class=xl8412617 width=104 style='border-right:.5pt solid black;
  border-left:none;width:78pt'><?php echo $tsr_unitprice; ?></td>
 <?php
	$i++;
		}
		} else{
			$core->pesan_warning("0");
		}
		?> 
  
   <?php
	$i=1;
	if($datatotal !=0){
	foreach ($datatotal as $value) {
	extract($value);
	?>
  <td colspan=2 class=xl8412617 width=104 style='border-right:.5pt solid black;
  border-left:none;width:78pt'><?php echo $tsr_subtotal; ?></td>
  
   <?php
	$i++;
		}
		} else{
			$core->pesan_warning("0");
		}
		?>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl7712617 width=75 style='width:56pt'></td>
  <td class=xl7712617 width=66 style='width:50pt'></td>
  <td class=xl7712617 width=52 style='width:39pt'></td>
  <td class=xl7712617 width=52 style='width:39pt'></td>
  <td class=xl7712617 width=52 style='width:39pt'></td>
  <td class=xl7712617 width=52 style='width:39pt'></td>
  <td class=xl7712617 width=52 style='width:39pt'></td>
  <td class=xl7712617 width=52 style='width:39pt'></td>
  <td class=xl7712617 width=52 style='width:39pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl7712617 width=75 style='width:56pt'></td>
  <td class=xl7712617 width=66 style='width:50pt'></td>
  <td class=xl7712617 width=52 style='width:39pt'></td>
  <td colspan=2 class=xl7112617 width=104 style='border-right:.5pt solid black;
  width:78pt'>DESKRIPSI</td>
  <td colspan=2 class=xl7112617 width=104 style='border-right:.5pt solid black;
  border-left:none;width:78pt'>QTY</td>
  <td colspan=2 class=xl7112617 width=104 style='border-right:.5pt solid black;
  border-left:none;width:78pt'>JUMLAH</td>
 </tr>
 <?php
	$i=1;
	if($datashowtotalkpbdetail !=0){
	foreach ($datashowtotalkpbdetail as $value) {
	extract($value);
	?>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl8212617 width=30 style='width:23pt'></td>
  <td class=xl8212617 width=82 style='width:62pt'></td>
  <td class=xl7712617 width=89 style='width:67pt'></td>
  <td class=xl7712617 width=89 style='width:67pt'></td>
  <td class=xl7712617 width=75 style='width:56pt'></td>
  <td class=xl7712617 width=66 style='width:50pt'></td>
  <td class=xl7712617 width=52 style='width:39pt'></td>
  <td colspan=2 class=xl8812617 width=104 style='border-right:.5pt solid black;
  width:78pt'><?php echo $vehliceservicetype; ?></td>
  <td colspan=2 class=xl9012617 width=104 style='border-right:.5pt solid black;
  border-left:none;width:78pt'><?php echo $qtykpb; ?></td>
  <td colspan=2 class=xl9012617 width=104 style='border-right:.5pt solid black;
  border-left:none;width:78pt'><?php echo $tkpbdet_subtotal; ?></td>
 </tr>
  <?php
	$i++;
		}
		} else{
			$core->pesan_warning("0");
		}
		?>
   <?php
	$i=1;
	if($datashowsumtotalkpbdetail !=0){
	foreach ($datashowsumtotalkpbdetail as $value) {
	extract($value);
	?>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl8212617 width=30 style='width:23pt'></td>
  <td class=xl8212617 width=82 style='width:62pt'></td>
  <td class=xl7712617 width=89 style='width:67pt'></td>
  <td class=xl7712617 width=89 style='width:67pt'></td>
  <td class=xl7712617 width=75 style='width:56pt'></td>
  <td class=xl7712617 width=66 style='width:50pt'></td>
  <td class=xl7712617 width=52 style='width:39pt'></td>
  <td colspan=2 class=xl7312617 width=104 style='border-right:.5pt solid black;
  width:78pt'>TOTAL</td>
  <td colspan=2 class=xl7312617 width=104 style='border-right:.5pt solid black;
  border-left:none;width:78pt'><?php echo $sumqtykpb; ?></td>
  <td colspan=2 class=xl7312617 width=104 style='border-right:.5pt solid black;
  border-left:none;width:78pt'><?php echo $sumtkpbsr_subtotal; ?></td>
 </tr>
  <?php
	$i++;
		}
		} else{
			$core->pesan_warning("0");
		}
		?>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td colspan=2 class=xl6612617></td>
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
  <td class=xl1512617></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=19 style='width:14pt'></td>
  <td width=30 style='width:23pt'></td>
  <td width=82 style='width:62pt'></td>
  <td width=89 style='width:67pt'></td>
  <td width=89 style='width:67pt'></td>
  <td width=75 style='width:56pt'></td>
  <td width=66 style='width:50pt'></td>
  <td width=52 style='width:39pt'></td>
  <td width=52 style='width:39pt'></td>
  <td width=52 style='width:39pt'></td>
  <td width=52 style='width:39pt'></td>
  <td width=52 style='width:39pt'></td>
  <td width=52 style='width:39pt'></td>
  <td width=52 style='width:39pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>


