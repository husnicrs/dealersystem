<?php
	$db=new Database();
	$moddetail=$_GET['mod'];
	$modulename=str_replace("_slip","", $moddetail);
	${"$modulename"} = new Deliveryorder();
	$core=new Core();
	if (isset($_GET['key'])) {
		$key = $_GET['key'];
		$data = ${"$modulename"}->showDetail($key);
		extract($data);
	}
?>
<style type="text/css">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
</style>

<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 15">
<link rel=File-List href="Surat%20Jalan_files/filelist.xml">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<style id="Book1_12617_Styles"><!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.font512617
	{color:black;
	font-size:14.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:underline;
	text-underline-style:single;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;}
.xl6312617
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
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6412617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:top;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6512617
	{padding:0px;
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
.xl6612617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:top;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6712617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:18.0pt;
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
.xl6812617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:top;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl6912617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:14.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:top;
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7012617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:top;
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7112617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt dashed windowtext;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt dashed windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl7212617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt dashed windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl7312617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt dashed windowtext;
	border-right:1.0pt dashed windowtext;
	border-bottom:none;
	border-left:none;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl7412617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:top;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt dashed windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl7512617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:top;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl7612617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:top;
	border-top:none;
	border-right:1.0pt dashed windowtext;
	border-bottom:none;
	border-left:none;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl7712617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:top;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt dashed windowtext;
	border-left:1.0pt dashed windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl7812617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:top;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt dashed windowtext;
	border-left:none;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl7912617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:top;
	border-top:none;
	border-right:1.0pt dashed windowtext;
	border-bottom:1.0pt dashed windowtext;
	border-left:none;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl8012617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:1.0pt;
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
.xl8112617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:1.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8212617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:1.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border-top:2.0pt double windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8312617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8412617
	{padding:0px;
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
.xl8512617
	{padding:0px;
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
	vertical-align:top;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8612617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:top;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8712617
	{padding:0px;
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
	vertical-align:top;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt dashed windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8812617
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
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8912617
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
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9012617
	{padding:0px;
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

<table border=0 cellpadding=0 cellspacing=0 width=1214 class=xl6312617
 style='border-collapse:collapse;table-layout:fixed;width:913pt'>
 <col class=xl6312617 width=20 style='mso-width-source:userset;mso-width-alt:
 731;width:15pt'>
 <col class=xl6312617 width=88 style='mso-width-source:userset;mso-width-alt:
 3218;width:66pt'>
 <col class=xl6312617 width=205 style='mso-width-source:userset;mso-width-alt:
 7497;width:154pt'>
 <col class=xl6312617 width=265 style='mso-width-source:userset;mso-width-alt:
 9691;width:199pt'>
 <col class=xl6312617 width=202 style='mso-width-source:userset;mso-width-alt:
 7387;width:152pt'>
 <col class=xl6312617 width=118 style='mso-width-source:userset;mso-width-alt:
 4315;width:89pt'>
 <col class=xl6312617 width=98 style='mso-width-source:userset;mso-width-alt:
 3584;width:74pt'>
 <col class=xl6312617 width=101 style='mso-width-source:userset;mso-width-alt:
 3693;width:76pt'>
 <col class=xl6312617 width=117 style='mso-width-source:userset;mso-width-alt:
 4278;width:88pt'>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl6312617 width=20 style='height:17.25pt;width:15pt'></td>
  <td width=88 style='width:66pt' align=left valign=top><!--[if gte vml 1]><v:shapetype
   id="_x0000_t75" coordsize="21600,21600" o:spt="75" o:preferrelative="t"
   path="m@4@5l@4@11@9@11@9@5xe" filled="f" stroked="f">
   <v:stroke joinstyle="miter"/>
   <v:formulas>
    <v:f eqn="if lineDrawn pixelLineWidth 0"/>
    <v:f eqn="sum @0 1 0"/>
    <v:f eqn="sum 0 0 @1"/>
    <v:f eqn="prod @2 1 2"/>
    <v:f eqn="prod @3 21600 pixelWidth"/>
    <v:f eqn="prod @3 21600 pixelHeight"/>
    <v:f eqn="sum @0 0 1"/>
    <v:f eqn="prod @6 1 2"/>
    <v:f eqn="prod @7 21600 pixelWidth"/>
    <v:f eqn="sum @8 21600 0"/>
    <v:f eqn="prod @7 21600 pixelHeight"/>
    <v:f eqn="sum @10 21600 0"/>
   </v:formulas>
   <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/>
   <o:lock v:ext="edit" aspectratio="t"/>
  </v:shapetype><v:shape id="Picture_x0020_1" o:spid="_x0000_s1074" type="#_x0000_t75"
   style='position:absolute;margin-left:2.25pt;margin-top:16.5pt;width:111.75pt;
   height:65.25pt;z-index:1;visibility:visible' o:gfxdata="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
">
   <v:imagedata src="Surat%20Jalan_files/Book1_12617_image001.png" o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:3px;margin-top:22px;width:149px;
  height:87px'><img width=149 height=87
  src="Surat%20Jalan_files/Book1_12617_image002.png" v:shapes="Picture_x0020_1"></span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=23 class=xl6312617 width=88 style='height:17.25pt;width:66pt'></td>
   </tr>
  </table>
  </span></td>
  <td colspan=4 rowspan=2 class=xl6712617 width=790 style='width:594pt'><span
  style='mso-spacerun:yes'>         </span>MITRA UTAMA MOTOR</td>
  <td class=xl6612617 width=98 style='width:74pt'>Nomor DO</td>
  <td colspan=2 class=xl9012617 width=218 style='width:164pt'>: <?php echo $dono; ?></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6312617 width=20 style='height:15.0pt;width:15pt'></td>
  <td class=xl6312617 width=88 style='width:66pt'></td>
  <td class=xl6612617 width=98 style='width:74pt'>Nomor SJ</td>
  <td colspan=2 class=xl6412617 width=218 style='width:164pt'>: <?php echo $sjno; ?></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6312617 width=20 style='height:15.0pt;width:15pt'></td>
  <td class=xl6312617 width=88 style='width:66pt'></td>
  <td colspan=4 class=xl6412617 width=790 style='width:594pt'><span
  style='mso-spacerun:yes'>               </span>JL.Raya Bandorasa Wetan No.3
  Kuningan</td>
  <td class=xl6412617 width=98 style='width:74pt'>Nomor SPK</td>
  <td colspan=2 class=xl6412617 width=218 style='width:164pt'>:  <?php echo $spkno; ?></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6312617 width=20 style='height:15.0pt;width:15pt'></td>
  <td class=xl6312617 width=88 style='width:66pt'></td>
  <td colspan=4 class=xl6412617 width=790 style='width:594pt'><span
  style='mso-spacerun:yes'>               </span>0232-8910488</td>
  <td class=xl6412617 width=98 style='width:74pt'>Tanggal</td>
  <td colspan=2 class=xl6412617 width=218 style='width:164pt'>: <?php echo $dateprint; ?></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6312617 width=20 style='height:15.0pt;width:15pt'></td>
  <td class=xl6312617 width=88 style='width:66pt'></td>
  <td colspan=2 rowspan=2 class=xl6812617 width=470 style='border-bottom:2.0pt double black;
  width:353pt'><span style='mso-spacerun:yes'>            </span><font
  class="font512617">SURAT JALAN</font></td>
  <td class=xl6412617 width=202 style='width:152pt'></td>
  <td class=xl6412617 width=118 style='width:89pt'></td>
  <td class=xl6412617 width=98 style='width:74pt'>PDI</td>
  <td colspan=2 class=xl6412617 width=218 style='width:164pt'>: </td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6312617 width=20 style='height:15.0pt;width:15pt'></td>
  <td class=xl6312617 width=88 style='width:66pt'></td>
  <td class=xl6412617 width=202 style='width:152pt'></td>
  <td class=xl6412617 width=118 style='width:89pt'></td>
  <td class=xl6412617 width=98 style='width:74pt'>POS/Sales</td>
  <td colspan=2 class=xl7012617 width=218 style='width:164pt'>: <?php echo $channelname; ?> / <?php echo $salesmanname; ?></td>
 </tr>
 <tr class=xl8012617 height=5 style='mso-height-source:userset;height:3.75pt'>
  <td height=5 class=xl8012617 width=20 style='height:3.75pt;width:15pt'></td>
  <td class=xl8112617 width=88 style='width:66pt'>&nbsp;</td>
  <td class=xl8112617 width=205 style='border-top:none;width:154pt'>&nbsp;</td>
  <td class=xl8112617 width=265 style='border-top:none;width:199pt'>&nbsp;</td>
  <td class=xl8112617 width=202 style='width:152pt'>&nbsp;</td>
  <td class=xl8112617 width=118 style='width:89pt'>&nbsp;</td>
  <td class=xl8212617 width=98 style='width:74pt'>&nbsp;</td>
  <td class=xl8112617 width=101 style='border-top:none;width:76pt'>&nbsp;</td>
  <td class=xl8112617 width=117 style='border-top:none;width:88pt'>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.75pt'>
  <td height=21 class=xl6312617 width=20 style='height:15.75pt;width:15pt'></td>
  <td class=xl6512617 width=88 style='width:66pt'>Nama</td>
  <td class=xl6512617 width=205 style='width:154pt'>: <?php echo $cusname; ?></td>
  <td class=xl6512617 width=265 style='width:199pt'></td>
  <td class=xl6512617 width=202 style='width:152pt'></td>
  <td colspan=2 class=xl8312617 width=216 style='width:163pt'></td>
  <td colspan=2 class=xl8412617 width=218 style='width:164pt'></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.75pt'>
  <td height=21 class=xl6312617 width=20 style='height:15.75pt;width:15pt'></td>
  <td class=xl6512617 width=88 style='width:66pt'>Alamat</td>
  <td colspan=7 class=xl8412617 width=1106 style='width:832pt'>: <?php echo $address; ?></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.75pt'>
  <td height=21 class=xl6312617 width=20 style='height:15.75pt;width:15pt'></td>
  <td class=xl6512617 width=88 style='width:66pt'>No Telp/HP</td>
  <td class=xl6512617 width=205 style='width:154pt'>: <?php echo $telp; ?> / <?php echo $handphone; ?></td>
  <td class=xl6512617 width=265 style='width:199pt'></td>
  <td class=xl6312617 width=202 style='width:152pt'></td>
  <td class=xl8312617 width=118 style='width:89pt'></td>
  <td class=xl8312617 width=98 style='width:74pt'></td>
  <td class=xl8412617 width=101 style='width:76pt'></td>
  <td class=xl8412617 width=117 style='width:88pt'></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.75pt'>
  <td height=21 class=xl6312617 width=20 style='height:15.75pt;width:15pt'></td>
  <td class=xl6512617 width=88 style='width:66pt'>Type</td>
  <td colspan=3 class=xl8412617 width=672 style='width:505pt'>: <?php echo $vehicletypesw; ?> / <?php echo $vehiclemodelsw; ?></td>
  <td class=xl6512617 width=118 style='width:89pt'>No Mesin</td>
  <td colspan=3 class=xl8412617 width=316 style='width:238pt'>: <?php echo $mechineno; ?></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.75pt'>
  <td height=21 class=xl6312617 width=20 style='height:15.75pt;width:15pt'></td>
  <td class=xl6512617 width=88 style='width:66pt'>Tahun<span
  style='mso-spacerun:yes'> </span></td>
  <td colspan=3 class=xl8412617 width=672 style='width:505pt'>: <?php echo $year; ?></td>
  <td class=xl6512617 width=118 style='width:89pt'>No Rangka</td>
  <td colspan=3 class=xl8412617 width=316 style='width:238pt'>: <?php echo $rangkano; ?></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.75pt'>
  <td height=21 class=xl6312617 width=20 style='height:15.75pt;width:15pt'></td>
  <td class=xl6512617 width=88 style='width:66pt'>Pembayaran</td>
  <td colspan=3 class=xl8412617 width=672 style='width:505pt'>: <?php echo $vehicletypesw; ?></td>
  <td class=xl6512617 width=118 style='width:89pt'>Warna</td>
  <td colspan=3 class=xl8412617 width=316 style='width:238pt'>: <?php echo $vehiclecolorname; ?></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.75pt'>
  <td height=21 class=xl6312617 width=20 style='height:15.75pt;width:15pt'></td>
  <td class=xl6512617 width=88 style='width:66pt'>Perlengkapan</td>
  <td width=205 style='width:154pt' align=left valign=top><!--[if gte vml 1]><v:group
   id="Group_x0020_4" o:spid="_x0000_s1076" style='position:absolute;
   margin-left:6.75pt;margin-top:2.25pt;width:87pt;height:39.75pt;z-index:3'
   coordorigin="11144,24479" coordsize="11028,5021">
   <o:lock v:ext="edit" text="t"/>
   <v:shape id="Rectangle_x0020_2" o:spid="_x0000_s1093" type="#_x0000_t75"
    style='position:absolute;left:11094;top:24685;width:2378;height:1954;
    visibility:visible;mso-wrap-style:square;v-text-anchor:top' o:gfxdata="UEsDBBQABgAIAAAAIQDw94q7/QAAAOIBAAATAAAAW0NvbnRlbnRfVHlwZXNdLnhtbJSRzUrEMBDH
74LvEOYqbaoHEWm6B6tHFV0fYEimbdg2CZlYd9/edD8u4goeZ+b/8SOpV9tpFDNFtt4puC4rEOS0
N9b1Cj7WT8UdCE7oDI7ekYIdMayay4t6vQvEIrsdKxhSCvdSsh5oQi59IJcvnY8TpjzGXgbUG+xJ
3lTVrdTeJXKpSEsGNHVLHX6OSTxu8/pAEmlkEA8H4dKlAEMYrcaUSeXszI+W4thQZudew4MNfJUx
QP7asFzOFxx9L/lpojUkXjGmZ5wyhjSRJQ8YKGvKv1MWzIkL33VWU9lGfl98J6hz4cZ/uUjzf7Pb
bHuj+ZQu9z/UfAMAAP//AwBQSwMEFAAGAAgAAAAhADHdX2HSAAAAjwEAAAsAAABfcmVscy8ucmVs
c6SQwWrDMAyG74O9g9G9cdpDGaNOb4VeSwe7CltJTGPLWCZt376mMFhGbzvqF/o+8e/2tzCpmbJ4
jgbWTQuKomXn42Dg63xYfYCSgtHhxJEM3Elg372/7U40YalHMvokqlKiGBhLSZ9aix0poDScKNZN
zzlgqWMedEJ7wYH0pm23Ov9mQLdgqqMzkI9uA+p8T9X8hx28zSzcl8Zy0Nz33r6iasfXeKK5UjAP
VAy4LM8w09zU50C/9q7/6ZURE31X/kL8TKv1x6wXNXYPAAAA//8DAFBLAwQUAAYACAAAACEAERfw
RvUBAACSBQAAEAAAAGRycy9zaGFwZXhtbC54bWysVE1v2zAMvQ/YfxB4b/2xJM2MKgXaorsMW5Cs
P4C15cStLBmS4Dr99aMkuy2GYocmF9siab7HR5GXV0MrWS+MbbTikJ2nwIQqddWoHYf7P3dnS2DW
oapQaiU4HISFq9XXL5dDZQr98ChKxyiFsgUZOOyd64okseVetGjPdScUeWttWnR0NLukMvhMyVuZ
5Gm6SGxnBFZ2L4S7jR5Yhdy2Yy2WRnMA5sTgZKOe6Ds6Vb/t1iZ+l7/6tWFNxeEbMIUtkdwQK1Q7
KVgOyWuU/4VOiWf+PoENqbAYatOOteAnKmmxUUQPC13XbCAts2w2y+fADhzy2cVinqaeDBZUDCsp
IM+XC7KxkgKyZfr9Yu79SSTiAztj3Q+hjybFfCIOhlQJBLH/aV2EmiBGWaIUXiDrDlJ4ElJtBNUT
WvxpWag9vuCAHu6GuJGG9Sg5VE/ZWHZA8pB1I+XJQLOPQKWbQEes0Je6JoVOBpx+BPxWrZjQQsVa
nQ64bZQ2/wevI97U9dhr33Y3XOvq4Ck90Jvm6tjG02pxv+lRS/3MoZRNB2yvzcu/NuPkjabrQPOA
qqQIDi6Oi7Ru6wkeSyXMXndsFi8N7QuGckf7Uo4Trao1GtyQXdLe4SDU2f2WFueLXwNx7mmuu1Hv
SeSwiexkjct09RcAAP//AwBQSwMEFAAGAAgAAAAhAJ4VeZ4aAQAAlQEAAA8AAABkcnMvZG93bnJl
di54bWx0kMtOwzAQRfdI/IM1SOxaxyFNmlK3QhWPsqnawoKlG0+aiNgOtunj73EKUiUQy5kz987c
GU8PqiE7tK42mgPrR0BQF0bWesvh9eWhNwTivNBSNEYjhyM6mE4uL8ZiJM1er3C39lsSTLQbCQ6V
9+2IUldUqITrmxZ1YKWxSvhQ2i2VVuyDuWpoHEUpVaLWYUMlWpxVWLyvPxWHj8XycWaWa83ss7RF
IhV9YzHn11eHu1sgHg/+PPyjnksON0DKp+PG1nIlnEfLIcQJ4UIwmISLW4tF7fC+LLHwi7J06F3X
b0jI3kvyQTAINnE8TKMIaIf8CWU5S0+IDaM8G3wj26GE5eyPaNORNMmyXxr63wkBnL85+QIAAP//
AwBQSwECLQAUAAYACAAAACEA8PeKu/0AAADiAQAAEwAAAAAAAAAAAAAAAAAAAAAAW0NvbnRlbnRf
VHlwZXNdLnhtbFBLAQItABQABgAIAAAAIQAx3V9h0gAAAI8BAAALAAAAAAAAAAAAAAAAAC4BAABf
cmVscy8ucmVsc1BLAQItABQABgAIAAAAIQARF/BG9QEAAJIFAAAQAAAAAAAAAAAAAAAAACkCAABk
cnMvc2hhcGV4bWwueG1sUEsBAi0AFAAGAAgAAAAhAJ4VeZ4aAQAAlQEAAA8AAAAAAAAAAAAAAAAA
TAQAAGRycy9kb3ducmV2LnhtbFBLBQYAAAAABAAEAPUAAACTBQAAAAA=
" o:insetmode="auto">
    <v:imagedata src="Surat%20Jalan_files/Book1_12617_image003.png" o:title=""/>
    <o:lock v:ext="edit" aspectratio="f"/>
    <x:ClientData ObjectType="Pict">
     <x:CF>Bitmap</x:CF>
     <x:AutoPict/>
    </x:ClientData>
   </v:shape><v:shape id="Rectangle_x0020_5" o:spid="_x0000_s1094" type="#_x0000_t75"
    style='position:absolute;left:11094;top:27185;width:2378;height:1953;
    visibility:visible;mso-wrap-style:square;v-text-anchor:top' o:gfxdata="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
" o:insetmode="auto">
    <v:imagedata src="Surat%20Jalan_files/Book1_12617_image003.png" o:title=""/>
    <o:lock v:ext="edit" aspectratio="f"/>
    <x:ClientData ObjectType="Pict">
     <x:CF>Bitmap</x:CF>
     <x:AutoPict/>
    </x:ClientData>
   </v:shape><v:shape id="TextBox_x0020_3" o:spid="_x0000_s1095" type="#_x0000_t75"
    style='position:absolute;left:13898;top:24502;width:8291;height:2625;
    visibility:visible;mso-wrap-style:square;v-text-anchor:top' o:gfxdata="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
AAAEAAQA9QAAACUGAAAAAA==
" o:insetmode="auto">
    <v:imagedata src="Surat%20Jalan_files/Book1_12617_image004.png" o:title=""/>
    <o:lock v:ext="edit" aspectratio="f"/>
    <x:ClientData ObjectType="Pict">
     <x:CF>Bitmap</x:CF>
     <x:AutoPict/>
    </x:ClientData>
   </v:shape><v:shape id="TextBox_x0020_9" o:spid="_x0000_s1096" type="#_x0000_t75"
    style='position:absolute;left:13898;top:26941;width:5121;height:2563;
    visibility:visible;mso-wrap-style:square;v-text-anchor:top' o:gfxdata="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
" o:insetmode="auto">
    <v:imagedata src="Surat%20Jalan_files/Book1_12617_image005.png" o:title=""/>
    <o:lock v:ext="edit" aspectratio="f"/>
    <x:ClientData ObjectType="Pict">
     <x:CF>Bitmap</x:CF>
     <x:AutoPict/>
    </x:ClientData>
   </v:shape></v:group><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:3;margin-left:8px;margin-top:3px;width:117px;
  height:53px'><img width=117 height=53
  src="Surat%20Jalan_files/Book1_12617_image006.png" v:shapes="Group_x0020_4 Rectangle_x0020_2 Rectangle_x0020_5 TextBox_x0020_3 TextBox_x0020_9"></span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=21 class=xl6512617 width=205 style='height:15.75pt;width:154pt'></td>
   </tr>
  </table>
  </span></td>
  <td width=265 style='width:199pt' align=left valign=top><!--[if gte vml 1]><v:group
   id="Group_x0020_16" o:spid="_x0000_s1077" style='position:absolute;
   margin-left:35.25pt;margin-top:3.75pt;width:99pt;height:39.75pt;z-index:4'
   coordorigin="11144,24479" coordsize="12561,5021">
   <o:lock v:ext="edit" text="t"/>
   <v:shape id="Rectangle_x0020_17" o:spid="_x0000_s1089" type="#_x0000_t75"
    style='position:absolute;left:11113;top:24678;width:2378;height:1953;
    visibility:visible;mso-wrap-style:square;v-text-anchor:top' o:gfxdata="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
" o:insetmode="auto">
    <v:imagedata src="Surat%20Jalan_files/Book1_12617_image003.png" o:title=""/>
    <o:lock v:ext="edit" aspectratio="f"/>
    <x:ClientData ObjectType="Pict">
     <x:CF>Bitmap</x:CF>
     <x:AutoPict/>
    </x:ClientData>
   </v:shape><v:shape id="Rectangle_x0020_18" o:spid="_x0000_s1090" type="#_x0000_t75"
    style='position:absolute;left:11113;top:27177;width:2378;height:1954;
    visibility:visible;mso-wrap-style:square;v-text-anchor:top' o:gfxdata="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
" o:insetmode="auto">
    <v:imagedata src="Surat%20Jalan_files/Book1_12617_image003.png" o:title=""/>
    <o:lock v:ext="edit" aspectratio="f"/>
    <x:ClientData ObjectType="Pict">
     <x:CF>Bitmap</x:CF>
     <x:AutoPict/>
    </x:ClientData>
   </v:shape><v:shape id="TextBox_x0020_19" o:spid="_x0000_s1091" type="#_x0000_t75"
    style='position:absolute;left:13917;top:24495;width:9815;height:2563;
    visibility:visible;mso-wrap-style:square;v-text-anchor:top' o:gfxdata="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
" o:insetmode="auto">
    <v:imagedata src="Surat%20Jalan_files/Book1_12617_image007.png" o:title=""/>
    <o:lock v:ext="edit" aspectratio="f"/>
    <x:ClientData ObjectType="Pict">
     <x:CF>Bitmap</x:CF>
     <x:AutoPict/>
    </x:ClientData>
   </v:shape><v:shape id="TextBox_x0020_20" o:spid="_x0000_s1092" type="#_x0000_t75"
    style='position:absolute;left:13917;top:26933;width:9449;height:2624;
    visibility:visible;mso-wrap-style:square;v-text-anchor:top' o:gfxdata="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
" o:insetmode="auto">
    <v:imagedata src="Surat%20Jalan_files/Book1_12617_image008.png" o:title=""/>
    <o:lock v:ext="edit" aspectratio="f"/>
    <x:ClientData ObjectType="Pict">
     <x:CF>Bitmap</x:CF>
     <x:AutoPict/>
    </x:ClientData>
   </v:shape></v:group><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:4;margin-left:47px;margin-top:5px;width:132px;
  height:54px'><img width=132 height=54
  src="Surat%20Jalan_files/Book1_12617_image009.png" v:shapes="Group_x0020_16 Rectangle_x0020_17 Rectangle_x0020_18 TextBox_x0020_19 TextBox_x0020_20"></span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=21 class=xl6512617 width=265 style='height:15.75pt;width:199pt'></td>
   </tr>
  </table>
  </span></td>
  <td width=202 style='width:152pt' align=left valign=top><!--[if gte vml 1]><v:group
   id="Group_x0020_21" o:spid="_x0000_s1078" style='position:absolute;
   margin-left:55.5pt;margin-top:4.5pt;width:91.5pt;height:39.75pt;z-index:5'
   coordorigin="11144,24479" coordsize="11659,5021">
   <o:lock v:ext="edit" text="t"/>
   <v:shape id="Rectangle_x0020_22" o:spid="_x0000_s1085" type="#_x0000_t75"
    style='position:absolute;left:11098;top:24704;width:2377;height:1954;
    visibility:visible;mso-wrap-style:square;v-text-anchor:top' o:gfxdata="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
" o:insetmode="auto">
    <v:imagedata src="Surat%20Jalan_files/Book1_12617_image003.png" o:title=""/>
    <o:lock v:ext="edit" aspectratio="f"/>
    <x:ClientData ObjectType="Pict">
     <x:CF>Bitmap</x:CF>
     <x:AutoPict/>
    </x:ClientData>
   </v:shape><v:shape id="Rectangle_x0020_23" o:spid="_x0000_s1086" type="#_x0000_t75"
    style='position:absolute;left:11098;top:27204;width:2377;height:1892;
    visibility:visible;mso-wrap-style:square;v-text-anchor:top' o:gfxdata="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
" o:insetmode="auto">
    <v:imagedata src="Surat%20Jalan_files/Book1_12617_image010.png" o:title=""/>
    <o:lock v:ext="edit" aspectratio="f"/>
    <x:ClientData ObjectType="Pict">
     <x:CF>Bitmap</x:CF>
     <x:AutoPict/>
    </x:ClientData>
   </v:shape><v:shape id="TextBox_x0020_24" o:spid="_x0000_s1087" type="#_x0000_t75"
    style='position:absolute;left:13902;top:24461;width:4999;height:2563;
    visibility:visible;mso-wrap-style:square;v-text-anchor:top' o:gfxdata="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
" o:insetmode="auto">
    <v:imagedata src="Surat%20Jalan_files/Book1_12617_image011.png" o:title=""/>
    <o:lock v:ext="edit" aspectratio="f"/>
    <x:ClientData ObjectType="Pict">
     <x:CF>Bitmap</x:CF>
     <x:AutoPict/>
    </x:ClientData>
   </v:shape><v:shape id="TextBox_x0020_25" o:spid="_x0000_s1088" type="#_x0000_t75"
    style='position:absolute;left:13902;top:26960;width:8900;height:2563;
    visibility:visible;mso-wrap-style:square;v-text-anchor:top' o:gfxdata="UEsDBBQABgAIAAAAIQDw94q7/QAAAOIBAAATAAAAW0NvbnRlbnRfVHlwZXNdLnhtbJSRzUrEMBDH
74LvEOYqbaoHEWm6B6tHFV0fYEimbdg2CZlYd9/edD8u4goeZ+b/8SOpV9tpFDNFtt4puC4rEOS0
N9b1Cj7WT8UdCE7oDI7ekYIdMayay4t6vQvEIrsdKxhSCvdSsh5oQi59IJcvnY8TpjzGXgbUG+xJ
3lTVrdTeJXKpSEsGNHVLHX6OSTxu8/pAEmlkEA8H4dKlAEMYrcaUSeXszI+W4thQZudew4MNfJUx
QP7asFzOFxx9L/lpojUkXjGmZ5wyhjSRJQ8YKGvKv1MWzIkL33VWU9lGfl98J6hz4cZ/uUjzf7Pb
bHuj+ZQu9z/UfAMAAP//AwBQSwMEFAAGAAgAAAAhADHdX2HSAAAAjwEAAAsAAABfcmVscy8ucmVs
c6SQwWrDMAyG74O9g9G9cdpDGaNOb4VeSwe7CltJTGPLWCZt376mMFhGbzvqF/o+8e/2tzCpmbJ4
jgbWTQuKomXn42Dg63xYfYCSgtHhxJEM3Elg372/7U40YalHMvokqlKiGBhLSZ9aix0poDScKNZN
zzlgqWMedEJ7wYH0pm23Ov9mQLdgqqMzkI9uA+p8T9X8hx28zSzcl8Zy0Nz33r6iasfXeKK5UjAP
VAy4LM8w09zU50C/9q7/6ZURE31X/kL8TKv1x6wXNXYPAAAA//8DAFBLAwQUAAYACAAAACEAMq3K
L2cCAADtBgAAEAAAAGRycy9zaGFwZXhtbC54bWy8Vctu2zAQvBfoPxC8O5KfiYXIQZvCPbRIgzw+
gKaomA1FCiRjy/n6zlJKWvQYt4Fhmiapndnh7uj8omsM2ykftLMlH5/knCkrXaXtQ8nv79ajM85C
FLYSxllV8oMK/GL18cN5V/nCbX4qGRlC2FBgoeTbGNsiy4LcqkaEE9cqi93a+UZE/PUPWeXFHsEb
k03yfJGF1itRha1S8Uu/w1cpdmhZI6R3Jecsqi4abR8x7zft7ra99v1cXu2uPdNVyScLzqxowPIO
D3x2HZvMefZ6ih5hscM6EqX1jHL4M1RIQUXR1b4ZshJvyKkR2oKoKFxdMwKbLvPFHMoeiONyPj9N
tEQBlkziwNnZ8nQ65kzSgflstpwmej0RCtT6EL8qdzQpRoFK7nFriaDYfQ+RlPgNQXDWrbUxxyrw
onCvKmkd4sEoAjD2RkGaVDdvVhh3Du3ylEiQ/mFzaTxDDUJo1C7GDY19dgmQkGsk9s7YAyShq7qG
9O+M/wqa8nf23+E32jo/6I+GV3QBO2FKHru+waB3jzc021AAVAvUiNWBKG3wi848thpgYvEHhtq4
fcml0S1nW+ef/17be9GW3MLNOPPRXDrwRbEIK3Ea1Pt82k9PEV0wNEdPkciaEG+pio+li7JEzx0b
hYL4NEBAI8izlR3d38Kzn+E747zvDiOitiweWlULSfaoGxXYldqzG9cIy1krrAvYyCf4LPJpPs9n
+E4wm2FXR7ldi0Yb+NMYLwS5FT4oGElqL1HI8N+Cw5k8Ob0o4urbk5V69EgjOVZMvoU9cq+hwF6q
Kll7eFnt31OrXwAAAP//AwBQSwMEFAAGAAgAAAAhACdFJ8MdAQAAkgEAAA8AAABkcnMvZG93bnJl
di54bWx0kF1PwjAUhu9N/A/NMfHGQMc250AKMaJiNDEZeIF3ZTv7cFu3tJXBv/dMTPDGy/bp+5zz
djrf1xXboTZFowSMhg4wVHGTFCoT8L5+HITAjJUqkVWjUMABDcxn52dTOUmaTkW4W9mMkUSZiRSQ
W9tOODdxjrU0w6ZFRSxtdC0tHXXGEy07ktcVdx0n4LUsFE3IZYv3Ocbl6qsWUL5uisVV5Gfd02e5
WL5o31l/bIS4vNjf3QKzuLenx7/p50SAGwBLl4etLpJIGotaAPWhdtQMZrRyqzEuDD6kKcb2LU0N
WtPfV4zKD7xwBIw0YTi+8UbAe2J74gck7v3Xvj/2jkD/RMZH8Dex7YHrOUfXKcL/G0/g9JWzbwAA
AP//AwBQSwECLQAUAAYACAAAACEA8PeKu/0AAADiAQAAEwAAAAAAAAAAAAAAAAAAAAAAW0NvbnRl
bnRfVHlwZXNdLnhtbFBLAQItABQABgAIAAAAIQAx3V9h0gAAAI8BAAALAAAAAAAAAAAAAAAAAC4B
AABfcmVscy8ucmVsc1BLAQItABQABgAIAAAAIQAyrcovZwIAAO0GAAAQAAAAAAAAAAAAAAAAACkC
AABkcnMvc2hhcGV4bWwueG1sUEsBAi0AFAAGAAgAAAAhACdFJ8MdAQAAkgEAAA8AAAAAAAAAAAAA
AAAAvgQAAGRycy9kb3ducmV2LnhtbFBLBQYAAAAABAAEAPUAAAAIBgAAAAA=
" o:insetmode="auto">
    <v:imagedata src="Surat%20Jalan_files/Book1_12617_image012.png" o:title=""/>
    <o:lock v:ext="edit" aspectratio="f"/>
    <x:ClientData ObjectType="Pict">
     <x:CF>Bitmap</x:CF>
     <x:AutoPict/>
    </x:ClientData>
   </v:shape></v:group><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:5;margin-left:74px;margin-top:6px;width:122px;
  height:53px'><img width=122 height=53
  src="Surat%20Jalan_files/Book1_12617_image013.png" v:shapes="Group_x0020_21 Rectangle_x0020_22 Rectangle_x0020_23 TextBox_x0020_24 TextBox_x0020_25"></span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=21 class=xl6512617 width=202 style='height:15.75pt;width:152pt'></td>
   </tr>
  </table>
  </span></td>
  <td colspan=2 height=21 width=216 style='height:15.75pt;width:163pt'
  align=left valign=top><!--[if gte vml 1]><v:group id="Group_x0020_26" o:spid="_x0000_s1079"
   style='position:absolute;margin-left:89.25pt;margin-top:1.5pt;width:169.5pt;
   height:39.75pt;z-index:6' coordorigin="11144,24479" coordsize="21536,5021">
   <o:lock v:ext="edit" text="t"/>
   <v:shape id="Rectangle_x0020_27" o:spid="_x0000_s1081" type="#_x0000_t75"
    style='position:absolute;left:11102;top:24720;width:2377;height:1892;
    visibility:visible;mso-wrap-style:square;v-text-anchor:top' o:gfxdata="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
" o:insetmode="auto">
    <v:imagedata src="Surat%20Jalan_files/Book1_12617_image010.png" o:title=""/>
    <o:lock v:ext="edit" aspectratio="f"/>
    <x:ClientData ObjectType="Pict">
     <x:CF>Bitmap</x:CF>
     <x:AutoPict/>
    </x:ClientData>
   </v:shape><v:shape id="Rectangle_x0020_28" o:spid="_x0000_s1082" type="#_x0000_t75"
    style='position:absolute;left:11102;top:27158;width:2377;height:1954;
    visibility:visible;mso-wrap-style:square;v-text-anchor:top' o:gfxdata="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
" o:insetmode="auto">
    <v:imagedata src="Surat%20Jalan_files/Book1_12617_image003.png" o:title=""/>
    <o:lock v:ext="edit" aspectratio="f"/>
    <x:ClientData ObjectType="Pict">
     <x:CF>Bitmap</x:CF>
     <x:AutoPict/>
    </x:ClientData>
   </v:shape><v:shape id="TextBox_x0020_29" o:spid="_x0000_s1083" type="#_x0000_t75"
    style='position:absolute;left:13906;top:24476;width:10485;height:2563;
    visibility:visible;mso-wrap-style:square;v-text-anchor:top' o:gfxdata="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
" o:insetmode="auto">
    <v:imagedata src="Surat%20Jalan_files/Book1_12617_image014.png" o:title=""/>
    <o:lock v:ext="edit" aspectratio="f"/>
    <x:ClientData ObjectType="Pict">
     <x:CF>Bitmap</x:CF>
     <x:AutoPict/>
    </x:ClientData>
   </v:shape><v:shape id="TextBox_x0020_30" o:spid="_x0000_s1084" type="#_x0000_t75"
    style='position:absolute;left:13906;top:26975;width:18776;height:2563;
    visibility:visible;mso-wrap-style:square;v-text-anchor:top' o:gfxdata="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
" o:insetmode="auto">
    <v:imagedata src="Surat%20Jalan_files/Book1_12617_image015.png" o:title=""/>
    <o:lock v:ext="edit" aspectratio="f"/>
    <x:ClientData ObjectType="Pict">
     <x:CF>Bitmap</x:CF>
     <x:AutoPict/>
    </x:ClientData>
   </v:shape></v:group><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:6;margin-left:119px;margin-top:2px;width:226px;
  height:53px'><img width=226 height=53
  src="Surat%20Jalan_files/Book1_12617_image016.png" v:shapes="Group_x0020_26 Rectangle_x0020_27 Rectangle_x0020_28 TextBox_x0020_29 TextBox_x0020_30"></span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td colspan=2 height=21 class=xl8312617 width=216 style='height:15.75pt;
    width:163pt'></td>
   </tr>
  </table>
  </span></td>
  <td colspan=2 class=xl8412617 width=218 style='width:164pt'></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.75pt'>
  <td height=21 class=xl6312617 width=20 style='height:15.75pt;width:15pt'></td>
  <td class=xl6512617 width=88 style='width:66pt'></td>
  <td class=xl6512617 width=205 style='width:154pt'></td>
  <td class=xl6512617 width=265 style='width:199pt'></td>
  <td class=xl6512617 width=202 style='width:152pt'></td>
  <td class=xl8312617 width=118 style='width:89pt'></td>
  <td class=xl8312617 width=98 style='width:74pt'></td>
  <td class=xl8412617 width=101 style='width:76pt'></td>
  <td class=xl8412617 width=117 style='width:88pt'></td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl6312617 width=20 style='height:18.0pt;width:15pt'></td>
  <td class=xl8512617 width=88 style='width:66pt'></td>
  <td class=xl8512617 width=205 style='width:154pt'></td>
  <td class=xl8512617 width=265 style='width:199pt'></td>
  <td class=xl8512617 width=202 style='width:152pt'></td>
  <td colspan=2 class=xl8612617 width=216 style='width:163pt'></td>
  <td colspan=2 class=xl8512617 width=218 style='width:164pt'></td>
 </tr>
 <tr height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl6312617 width=20 style='height:21.0pt;width:15pt'></td>
  <td class=xl8512617 width=88 style='width:66pt'>Ket</td>
  <td colspan=7 class=xl8712617 width=1106 style='width:832pt'>: </td>
 </tr>
 <tr class=xl8812617 height=19 style='mso-height-source:userset;height:14.25pt'>
  <td height=19 class=xl8812617 width=20 style='height:14.25pt;width:15pt'></td>
  <td colspan=8 class=xl7112617 width=1194 style='border-right:1.0pt dashed black;
  width:898pt'>1. HARAP PERIKSA DAN DICOCOKAN NO MESIN DAN NO RANGKA UNIT YANG
  DITERIMA DENGAN SURAT JALAN</td>
 </tr>
 <tr class=xl8812617 height=19 style='mso-height-source:userset;height:14.25pt'>
  <td height=19 class=xl8812617 width=20 style='height:14.25pt;width:15pt'></td>
  <td colspan=8 rowspan=2 class=xl7412617 width=1194 style='border-right:1.0pt dashed black;
  border-bottom:1.0pt dashed black;width:898pt'>2. DENGAN DITANDATANGANINYA
  SURAT JALAN INI OLEH PENERIMA, PENERIMA TELAH MENYATAKAN TELAH MENERIMA UNIT
  INI DAN PERLENGKAPANNYA DALAM KEADAAN BAIK</td>
 </tr>
 <tr height=6 style='mso-height-source:userset;height:4.5pt'>
  <td height=6 class=xl6312617 width=20 style='height:4.5pt;width:15pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6312617 width=20 style='height:15.0pt;width:15pt'></td>
  <td colspan=3 class=xl6512617 width=558 style='width:419pt'></td>
  <td class=xl6512617 width=202 style='width:152pt'></td>
  <td colspan=2 class=xl6512617 width=216 style='width:163pt'></td>
  <td colspan=2 class=xl6512617 width=218 style='width:164pt'></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6312617 width=20 style='height:15.0pt;width:15pt'></td>
  <td class=xl6312617 width=88 style='width:66pt'></td>
  <td class=xl6312617 width=205 style='width:154pt'></td>
  <td class=xl6312617 width=265 style='width:199pt'></td>
  <td class=xl6312617 width=202 style='width:152pt'></td>
  <td class=xl6312617 width=118 style='width:89pt'></td>
  <td class=xl6312617 width=98 style='width:74pt'></td>
  <td width=101 style='width:76pt' align=left valign=top><!--[if gte vml 1]><v:shape
   id="TextBox_x0020_15" o:spid="_x0000_s1075" type="#_x0000_t75" style='position:absolute;
   margin-left:43.5pt;margin-top:0;width:14.25pt;height:19.5pt;z-index:2;
   visibility:visible;mso-wrap-style:square;v-text-anchor:top' o:gfxdata="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
BAAEAPUAAAAjBgAAAAA=
" o:insetmode="auto">
   <v:imagedata src="Surat%20Jalan_files/Book1_12617_image017.png" o:title=""/>
   <o:lock v:ext="edit" aspectratio="f"/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:2;margin-left:58px;margin-top:0px;width:19px;
  height:26px'><img width=19 height=26
  src="Surat%20Jalan_files/Book1_12617_image018.png" v:shapes="TextBox_x0020_15"></span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=20 class=xl6312617 width=101 style='height:15.0pt;width:76pt'></td>
   </tr>
  </table>
  </span></td>
  <td class=xl6312617 width=117 style='width:88pt'></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6312617 width=20 style='height:15.0pt;width:15pt'></td>
  <td class=xl6312617 width=88 style='width:66pt'></td>
  <td class=xl6312617 width=205 style='width:154pt'></td>
  <td class=xl6312617 width=265 style='width:199pt'></td>
  <td class=xl6312617 width=202 style='width:152pt'></td>
  <td class=xl8912617 width=118 style='width:89pt'>PENERIMA</td>
  <td class=xl8912617 width=98 style='border-left:none;width:74pt'>PENGIRIM<span
  style='mso-spacerun:yes'> </span></td>
  <td class=xl8912617 width=101 style='border-left:none;width:76pt'>SECURITY</td>
  <td class=xl8912617 width=117 style='border-left:none;width:88pt'>PIC</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6312617 width=20 style='height:15.0pt;width:15pt'></td>
  <td class=xl6312617 width=88 style='width:66pt'></td>
  <td class=xl6312617 width=205 style='width:154pt'></td>
  <td class=xl6312617 width=265 style='width:199pt'></td>
  <td class=xl6312617 width=202 style='width:152pt'></td>
  <td class=xl8912617 width=118 style='border-top:none;width:89pt'>&nbsp;</td>
  <td class=xl8912617 width=98 style='border-top:none;border-left:none;
  width:74pt'>&nbsp;</td>
  <td class=xl8912617 width=101 style='border-top:none;border-left:none;
  width:76pt'>&nbsp;</td>
  <td class=xl8912617 width=117 style='border-top:none;border-left:none;
  width:88pt'><?php echo $dateprint; ?></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6312617 width=20 style='height:15.0pt;width:15pt'></td>
  <td class=xl6312617 width=88 style='width:66pt'></td>
  <td class=xl6312617 width=205 style='width:154pt'></td>
  <td class=xl6312617 width=265 style='width:199pt'></td>
  <td class=xl6312617 width=202 style='width:152pt'></td>
  <td rowspan=3 class=xl8912617 width=118 style='border-top:none;width:89pt'>&nbsp;</td>
  <td rowspan=3 class=xl8912617 width=98 style='border-top:none;width:74pt'>&nbsp;</td>
  <td rowspan=3 height=60 width=101 style='height:45.0pt;width:76pt'
  align=left valign=top><!--[if gte vml 1]><v:shape id="TextBox_x0020_31"
   o:spid="_x0000_s1080" type="#_x0000_t75" style='position:absolute;
   margin-left:43.5pt;margin-top:30pt;width:14.25pt;height:20.25pt;z-index:7;
   visibility:visible;mso-wrap-style:square;v-text-anchor:top' o:gfxdata="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
AAAAAAQABAD1AAAAJwYAAAAA
" o:insetmode="auto">
   <v:imagedata src="Surat%20Jalan_files/Book1_12617_image019.png" o:title=""/>
   <o:lock v:ext="edit" aspectratio="f"/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:7;margin-left:58px;margin-top:40px;width:19px;
  height:27px'><img width=19 height=27
  src="Surat%20Jalan_files/Book1_12617_image020.png" v:shapes="TextBox_x0020_31"></span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td rowspan=3 height=60 class=xl8912617 width=101 style='height:45.0pt;
    border-top:none;width:76pt'>&nbsp;</td>
   </tr>
  </table>
  </span></td>
  <td rowspan=3 class=xl8912617 width=117 style='border-top:none;width:88pt'>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6312617 width=20 style='height:15.0pt;width:15pt'></td>
  <td class=xl6312617 width=88 style='width:66pt'></td>
  <td class=xl6312617 width=205 style='width:154pt'></td>
  <td class=xl6312617 width=265 style='width:199pt'></td>
  <td class=xl6312617 width=202 style='width:152pt'></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6312617 width=20 style='height:15.0pt;width:15pt'></td>
  <td class=xl6312617 width=88 style='width:66pt'></td>
  <td class=xl6312617 width=205 style='width:154pt'></td>
  <td class=xl6312617 width=265 style='width:199pt'></td>
  <td class=xl6312617 width=202 style='width:152pt'></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6312617 width=20 style='height:15.0pt;width:15pt'></td>
  <td class=xl6312617 width=88 style='width:66pt'></td>
  <td class=xl6312617 width=205 style='width:154pt'></td>
  <td class=xl6312617 width=265 style='width:199pt'></td>
  <td class=xl6312617 width=202 style='width:152pt'></td>
  <td class=xl8912617 width=118 style='border-top:none;width:89pt'><?php echo $cusname; ?></td>
  <td class=xl8912617 width=98 style='border-top:none;border-left:none;
  width:74pt'><?php echo $driver; ?></td>
  <td class=xl8912617 width=101 style='border-top:none;border-left:none;
  width:76pt'>&nbsp;</td>
  <td class=xl8912617 width=117 style='border-top:none;border-left:none;
  width:88pt'>RINI</td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=20 style='width:15pt'></td>
  <td width=88 style='width:66pt'></td>
  <td width=205 style='width:154pt'></td>
  <td width=265 style='width:199pt'></td>
  <td width=202 style='width:152pt'></td>
  <td width=118 style='width:89pt'></td>
  <td width=98 style='width:74pt'></td>
  <td width=101 style='width:76pt'></td>
  <td width=117 style='width:88pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>






