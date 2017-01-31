<?php
	$db=new Database();
	$moddetail=$_GET['mod'];
	$modulename=str_replace("_slip","", $moddetail);
	${"$modulename"} = new Generalcash();
	$core=new Core();
	if (isset($_GET['key'])) {
		$key = $_GET['key'];
		$data = ${"$modulename"}->showslipcredit($key);
		extract($data);
	}
$user=$_SESSION['uname'];

function Terbilang($x)
{
  $abil = array("", "SATU", "DUA", "TIGA", "EMPAT", "LIMA", "ENAM", "TUJUH", "DELAPAN", "SEMBILAN", "SEPULUH", "SEBELAS");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return Terbilang($x - 10) . "BELAS";
  elseif ($x < 100)
    return Terbilang($x / 10) . " PULUH" . Terbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . Terbilang($x - 100);
  elseif ($x < 1000)
    return Terbilang($x / 100) . " RATUS" . Terbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . Terbilang($x - 1000);
  elseif ($x < 1000000)
    return Terbilang($x / 1000) . " RIBU" . Terbilang($x % 1000);
  elseif ($x < 1000000000)
    return Terbilang($x / 1000000) . " JUTA" . Terbilang($x % 1000000);
}
// echo ucwords(Terbilang(32424664)); 
?>
<?php
function TanggalIndo($date){
	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl   = substr($date, 8, 2);
 
	$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
	return($result);
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
<link rel=File-List href="Kas%20Keluar_files/filelist.xml">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<style id="Book1_12617_Styles">
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.xl1512617
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
	white-space:nowrap;}
.xl6312617
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
	white-space:nowrap;}
.xl6412617
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
.xl6512617
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
	white-space:nowrap;}
.xl6612617
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
	white-space:nowrap;}
.xl6712617
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
	white-space:nowrap;}
.xl6812617
	{padding:0px;
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
	white-space:nowrap;}
.xl6912617
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
.xl7012617
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
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7112617
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
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7212617
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
	text-align:center;
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7312617
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
	white-space:nowrap;}
.xl7412617
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
	white-space:nowrap;}
.xl7512617
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
	vertical-align:bottom;
	border:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7612617
	{padding:0px;
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
	vertical-align:top;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7712617
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
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7812617
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
.xl7912617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
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
.xl8012617
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
	white-space:nowrap;}
.xl8112617
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
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8212617
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:16.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#D9D9D9;
	mso-pattern:black none;
	white-space:nowrap;}
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
	text-align:left;
	vertical-align:bottom;
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

<table border=0 cellpadding=0 cellspacing=0 width=1140 style='border-collapse:
 collapse;table-layout:fixed;width:856pt'>
 <col width=20 style='mso-width-source:userset;mso-width-alt:731;width:15pt'>
 <col width=88 style='mso-width-source:userset;mso-width-alt:3218;width:66pt'>
 <col width=89 style='mso-width-source:userset;mso-width-alt:3254;width:67pt'>
 <col width=265 style='mso-width-source:userset;mso-width-alt:9691;width:199pt'>
 <col width=161 style='mso-width-source:userset;mso-width-alt:5888;width:121pt'>
 <col width=109 style='mso-width-source:userset;mso-width-alt:3986;width:82pt'>
 <col width=136 span=3 style='mso-width-source:userset;mso-width-alt:4973;
 width:102pt'>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl6412617 width=20 style='height:17.25pt;width:15pt'></td>
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
  </v:shapetype><v:shape id="Picture_x0020_1" o:spid="_x0000_s1025" type="#_x0000_t75"
   style='position:absolute;margin-left:5.25pt;margin-top:5.25pt;width:73.5pt;
   height:38.25pt;z-index:1;visibility:visible' o:gfxdata="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
">
   <v:imagedata src="Kas%20Keluar_files/Book1_12617_image001.png" o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:7px;margin-top:7px;width:98px;
  height:51px'><img width=98 height=51
  src="report/Kas%20Keluar_files/Book1_12617_image002.png" v:shapes="Picture_x0020_1"></span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=23 class=xl6412617 width=88 style='height:17.25pt;width:66pt'></td>
   </tr>
  </table>
  </span></td>
  <td colspan=5 class=xl7612617 width=760 style='width:571pt'><span
  style='mso-spacerun:yes'>            </span>MITRA UTAMA MOTOR<br>
    </td>
  <td class=xl6412617 width=136 style='width:102pt'></td>
  <td class=xl6412617 width=136 style='width:102pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6412617 width=20 style='height:15.0pt;width:15pt'></td>
  <td class=xl6412617 width=88 style='width:66pt'></td>
  <td colspan=6 class=xl7812617 width=896 style='width:673pt'><span
  style='mso-spacerun:yes'>               </span>JL.Raya Bandorasa Wetan No.3
  Kuningan</td>
  <td class=xl6412617 width=136 style='width:102pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl6412617 width=20 style='height:15.0pt;width:15pt'></td>
  <td class=xl6412617 width=88 style='width:66pt'></td>
  <td colspan=5 class=xl7712617 width=760 style='width:571pt'><span
  style='mso-spacerun:yes'>               </span>0232-8910488</td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
 </tr>
 <tr class=xl6512617 height=5 style='mso-height-source:userset;height:3.75pt'>
  <td height=5 class=xl6512617 style='height:3.75pt'></td>
  <td class=xl6612617>&nbsp;</td>
  <td class=xl6612617 style='border-top:none'>&nbsp;</td>
  <td class=xl6612617 style='border-top:none'>&nbsp;</td>
  <td class=xl6612617 style='border-top:none'>&nbsp;</td>
  <td class=xl6612617 style='border-top:none'>&nbsp;</td>
  <td class=xl6712617 style='border-top:none'>&nbsp;</td>
  <td class=xl6612617>&nbsp;</td>
  <td class=xl6612617>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.75pt'>
  <td height=21 class=xl1512617 style='height:15.75pt'></td>
  <td colspan=2 class=xl7912617 width=177 style='width:133pt'>BUKTI KAS KELUAR</td>
  <td class=xl6812617></td>
  <td class=xl6312617></td>
  <td colspan=2 class=xl8012617></td>
  <td colspan=2 class=xl7312617></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.75pt'>
  <td height=21 class=xl1512617 style='height:15.75pt'></td>
  <td colspan=2 class=xl7312617>NO TRANSAKSI</td>
  <td colspan=6 class=xl7312617>: <?php echo $notrans ?></td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl1512617 style='height:18.0pt'></td>
  <td colspan=2 class=xl7412617>UANG SEJUMLAH</td>
  <td colspan=6 class=xl7412617>: <b><?php echo ucwords(Terbilang($amount)); ?></b></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td colspan=2 class=xl8312617 width=177 style='width:133pt'>UNTUK PEMBAYARAN</td>
  <td colspan=6 class=xl8312617 width=943 style='width:708pt'>: <?php echo strtoupper($description) ?></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl6912617></td>
  <td class=xl6912617></td>
  <td class=xl6912617></td>
  <td class=xl6912617></td>
 </tr>
 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <td height=30 class=xl1512617 style='height:22.5pt'></td>
  <td class=xl1512617></td>
  <td colspan=2 class=xl8212617>RP. <?php echo number_format($amount) ?></td>
  <td class=xl1512617></td>
  <td class=xl6912617></td>
  <td class=xl6912617></td>
  <td colspan=2 class=xl8112617></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td colspan=2 class=xl8112617></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl7012617>DISETUJUI OLEH</td>
  <td class=xl7012617 style='border-left:none'>KASIR</td>
  <td class=xl7012617 style='border-left:none'>PENERIMA</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td class=xl1512617></td>
  <td rowspan=4 class=xl7512617 style='border-top:none'>&nbsp;</td>
  <td rowspan=4 class=xl7212617 style='border-top:none'>&nbsp;</td>
  <td rowspan=4 class=xl7212617 style='border-top:none'>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
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
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1512617 style='height:15.0pt'></td>
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
  <td class=xl7112617 style='border-top:none'>&nbsp;</td>
  <td class=xl7212617 style='border-top:none;border-left:none'><?php echo strtoupper($user) ?></td>
  <td class=xl7112617 style='border-top:none;border-left:none'>&nbsp;</td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=20 style='width:15pt'></td>
  <td width=88 style='width:66pt'></td>
  <td width=89 style='width:67pt'></td>
  <td width=265 style='width:199pt'></td>
  <td width=161 style='width:121pt'></td>
  <td width=109 style='width:82pt'></td>
  <td width=136 style='width:102pt'></td>
  <td width=136 style='width:102pt'></td>
  <td width=136 style='width:102pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>





