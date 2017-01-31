<?php
	$db=new Database();
	$moddetail=$_GET['mod'];
	$arbiling = new Arbilling();
	$core=new Core();
	
	$user=$_SESSION['uname'];
	$data = $arbiling->showDetail($user);
	extract($data);
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
<link rel=File-List href="WOM_files/filelist.xml">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<style id="WOM_8142_Styles">
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.font58142
	{color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;}
.xl638142
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
.xl648142
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:16.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0\.00_\)\;_\(* \\\(\#\,\#\#0\.00\\\)\;_\(* \0022-\0022??_\)\;_\(\@_\)";
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl658142
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:"_\(* \#\,\#\#0\.00_\)\;_\(* \\\(\#\,\#\#0\.00\\\)\;_\(* \0022-\0022??_\)\;_\(\@_\)";
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl668142
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
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl678142
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:underline;
	text-underline-style:single;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl688142
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
.xl698142
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
.xl708142
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
.xl718142
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
	vertical-align:top;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl728142
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
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl738142
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
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
.xl748142
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
	vertical-align:top;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl758142
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
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl768142
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
	vertical-align:top;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl778142
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:underline;
	text-underline-style:single;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
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

<div id="WOM_8142" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=696 class=xl638142
 style='border-collapse:collapse;table-layout:fixed;width:522pt'>
 <col class=xl638142 width=31 style='mso-width-source:userset;mso-width-alt:
 1133;width:23pt'>
 <col class=xl638142 width=91 style='mso-width-source:userset;mso-width-alt:
 3328;width:68pt'>
 <col class=xl638142 width=64 style='width:48pt'>
 <col class=xl638142 width=81 style='mso-width-source:userset;mso-width-alt:
 2962;width:61pt'>
 <col class=xl638142 width=64 span=2 style='width:48pt'>
 <col class=xl638142 width=81 style='mso-width-source:userset;mso-width-alt:
 2962;width:61pt'>
 <col class=xl638142 width=127 style='mso-width-source:userset;mso-width-alt:
 4644;width:95pt'>
 <col class=xl638142 width=93 style='mso-width-source:userset;mso-width-alt:
 3401;width:70pt'>
 <tr height=39 style='mso-height-source:userset;height:29.25pt'>
  <td height=39 width=31 style='height:29.25pt;width:23pt' align=left
  valign=top><!--[if gte vml 1]><v:shapetype id="_x0000_t75" coordsize="21600,21600"
   o:spt="75" o:preferrelative="t" path="m@4@5l@4@11@9@11@9@5xe" filled="f"
   stroked="f">
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
   style='position:absolute;margin-left:10.5pt;margin-top:7.5pt;width:70.5pt;
   height:55.5pt;z-index:1;visibility:visible' o:gfxdata="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
">
   <v:imagedata src="WOM_files/WOM_8142_image001.png" o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><v:shape id="Straight_x0020_Connector_x0020_2" o:spid="_x0000_s1026"
   type="#_x0000_t75" style='position:absolute;margin-left:2.25pt;margin-top:60.75pt;
   width:450.75pt;height:1.5pt;z-index:2;visibility:visible' o:gfxdata="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
AA==
">
   <v:imagedata src="WOM_files/WOM_8142_image002.png" o:title=""/>
   <o:lock v:ext="edit" aspectratio="f"/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><v:shape id="Straight_x0020_Connector_x0020_3" o:spid="_x0000_s1027"
   type="#_x0000_t75" style='position:absolute;margin-left:2.25pt;margin-top:62.25pt;
   width:450.75pt;height:1.5pt;z-index:3;visibility:visible' o:gfxdata="UEsDBBQABgAIAAAAIQD+JeulAAEAAOoBAAATAAAAW0NvbnRlbnRfVHlwZXNdLnhtbJSRzU7EIBDH
7ya+A+FqWqoHY0zpHqwe1Zj1AQhMW2I7EAbr7ts73e5ejGviEeb/8RuoN7tpFDMk8gG1vC4rKQBt
cB57Ld+3T8WdFJQNOjMGBC33QHLTXF7U230EEuxG0nLIOd4rRXaAyVAZIiBPupAmk/mYehWN/TA9
qJuqulU2YAbMRV4yZFO30JnPMYvHHV+vJAlGkuJhFS5dWpoYR29NZlI1o/vRUhwbSnYeNDT4SFeM
IdWvDcvkfMHR98JPk7wD8WpSfjYTYyiXaNkAweaQWFf+nbSgTlSErvMWyjYRL7V6T3DnSlz4wgTz
f/Nbtr3BfEpXh59qvgEAAP//AwBQSwMEFAAGAAgAAAAhAJYFM1jUAAAAlwEAAAsAAABfcmVscy8u
cmVsc6SQPWsDMQyG90L/g9He8yVDKSW+bIWsIYWuxtZ9kLNkJHNN/n1MoaVXsnWUXvQ8L9rtL2k2
C4pOTA42TQsGKXCcaHDwfnp7egGjxVP0MxM6uKLCvnt82B1x9qUe6ThlNZVC6mAsJb9aq2HE5LXh
jFSTniX5UkcZbPbh7Ae027Z9tvKbAd2KaQ7RgRziFszpmqv5DztNQVi5L03gZLnvp3CPaiN/0hGX
SvEyYHEQRb+WgktTy4G979380xuYCENh+aiOlfwnqfbvBnb1zu4GAAD//wMAUEsDBBQABgAIAAAA
IQD5jV7ZDQIAANYFAAAUAAAAZHJzL2Nvbm5lY3RvcnhtbC54bWysVMFu2zAMvQ/YPwi6r7aTeEmN
2MWQorsMW7Guu2u2FAuTKUMSHOfvR0mOMxRdgbXxSSZFvkc+UtubsVNk4MZKDSXNrlJKONS6kbAv
6eOPuw8bSqxj0DClgZf0yC29qd6/246NKRjUrTYEU4At0FDS1rm+SBJbt7xj9kr3HNArtOmYw1+z
TxrDDpi8U8kiTT8mtjecNbbl3N1GD61CbnfQO67UpwARTcLoLp5qrap0m3gO/hgC8PBNiGq5ydKz
y1uC1+hDtYwR/niyeX92neZTBLpCRMh8hnN6hqg2z8P+H+Rik6/zmc0ZcgYa4aEnHauNLunUEBh2
3npvJi5fh3tDZFPSFSXAOtTmwRkm960jOw3Aa4fSLGkyX5/C0RDKe5LPhsysGIXpJkXZK/TsmARK
hJL9TxwnpM4KLQQZSxqEoeRY0nW2Wq5zz4wVfHSkRm++TvMVGkmNF67zRXAnkY6/1xvrPnP9dmo+
UUmVBB7IseGLdb4lZwgPp+CtPfBZrFayuZMKJxR/zP7XThkyMFXSNHy+BQj81zX8UzAJFBXxM27d
UfFI6zvHZoZ9e706ssGGL0L5YVH5TKv5nU2cFCCShxRI/2Kg6cugE5aH5ULgBF8MOE7iP6ud0ULF
Gi4H3EnQ5rmq3XhqtYh4J9Wj1vFt8ws/7a+SHNwtc+y0v08eyBAQH+TqDwAAAP//AwBQSwMEFAAG
AAgAAAAhAB1wldQRAQAAhAEAAA8AAABkcnMvZG93bnJldi54bWxUkNlOwzAQRd+R+AdrkHijTrO0
aYhTtQiqPiF1+QCTOIsa25FtmsDXM2VR6OPcmXPnzqTLQbbkLIxttGIwnXhAhMp10aiKwfHw8hAD
sY6rgrdaCQYfwsIyu71JeVLoXu3Eee8qgibKJpxB7VyXUGrzWkhuJ7oTCnulNpI7LE1FC8N7NJct
9T1vRiVvFG6oeSeeapGf9u8SY4TNzD+egnh+CNdu44bN89taMnZ/N6wegTgxuHH4l94WDEK4nII8
ZJhvaFcqr7Uh5U7Y5hPD/+il0ZIY3TMIgOS6ZYBHY/1allY4nFp4ESrY+VP8OJpHQC+mTl+j+J5/
aBBPvWt0EfnfJB3zZCkW4/OyLwAAAP//AwBQSwECLQAUAAYACAAAACEA/iXrpQABAADqAQAAEwAA
AAAAAAAAAAAAAAAAAAAAW0NvbnRlbnRfVHlwZXNdLnhtbFBLAQItABQABgAIAAAAIQCWBTNY1AAA
AJcBAAALAAAAAAAAAAAAAAAAADEBAABfcmVscy8ucmVsc1BLAQItABQABgAIAAAAIQD5jV7ZDQIA
ANYFAAAUAAAAAAAAAAAAAAAAAC4CAABkcnMvY29ubmVjdG9yeG1sLnhtbFBLAQItABQABgAIAAAA
IQAdcJXUEQEAAIQBAAAPAAAAAAAAAAAAAAAAAG0EAABkcnMvZG93bnJldi54bWxQSwUGAAAAAAQA
BAD5AAAAqwUAAAAA
">
   <v:imagedata src="WOM_files/WOM_8142_image002.png" o:title=""/>
   <o:lock v:ext="edit" aspectratio="f"/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:3px;margin-top:10px;width:601px;
  height:75px'><img width=601 height=75 src="report/WOM_files/WOM_8142_image003.png"
  v:shapes="Picture_x0020_1 Straight_x0020_Connector_x0020_2 Straight_x0020_Connector_x0020_3"></span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
  <?php
		$i=1;
		if($data !=0){
		foreach ($data as $value) {
		extract($value);
	?> 
   <tr>
    <td height=39 class=xl638142 width=31 style='height:29.25pt;width:23pt'></td>
   </tr>
  </table>
  </span></td>
  <td class=xl638142 width=91 style='width:68pt'></td>
  <td colspan=6 class=xl648142 width=481 style='width:361pt'><span
  style='mso-spacerun:yes'> </span>MITRA UTAMA MOTOR<span
  style='mso-spacerun:yes'> </span></td>
  <td class=xl658142 width=93 style='width:70pt'></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl638142 style='height:15.75pt'></td>
  <td class=xl638142></td>
  <td colspan=6 class=xl668142>Jl. Raya Sunan Gunung Jati No. 47 Tangkil
  Cirebon</td>
  <td class=xl638142></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl638142 style='height:15.75pt'></td>
  <td class=xl638142></td>
  <td colspan=6 class=xl668142>(0231) 202534, 221100</td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl638142 style='height:15.0pt'></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=8 height=20 class=xl678142 style='height:15.0pt'>SURAT PERNYATAAN
  DAN KUASA</td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl678142 style='height:15.0pt'></td>
  <td class=xl678142></td>
  <td class=xl678142></td>
  <td class=xl678142></td>
  <td class=xl678142></td>
  <td class=xl678142></td>
  <td class=xl678142></td>
  <td class=xl678142></td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=8 height=20 class=xl688142 style='height:15.0pt'>Saya yang
  bertanda tangan dibawah ini</td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl688142 style='height:15.0pt'></td>
  <td class=xl688142>Nama</td>
  <td colspan=6 class=xl688142>: <font class="font58142">LILIS</font></td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl688142 style='height:15.0pt'></td>
  <td class=xl688142>Jabatan</td>
  <td class=xl688142 colspan=5>: ADMIN HEAD MITRA UTAMA MOTOR</td>
  <td class=xl688142></td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl688142 style='height:15.0pt'></td>
  <td class=xl688142>Alamat</td>
  <td colspan=6 class=xl688142>: JL. RAYA SUNAN GUNUNGJATI NO 47 CIREBON</td>
  <td class=xl658142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl688142 style='height:15.0pt'></td>
  <td class=xl688142>No KTP</td>
  <td colspan=6 class=xl688142>: 721378127381738172312</td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl688142 style='height:15.0pt'></td>
  <td class=xl688142></td>
  <td class=xl688142></td>
  <td class=xl688142></td>
  <td class=xl688142></td>
  <td class=xl688142></td>
  <td class=xl688142></td>
  <td class=xl688142></td>
  <td class=xl638142></td>
 </tr>
 <tr height=41 style='mso-height-source:userset;height:30.75pt'>
  <td colspan=8 height=41 class=xl698142 width=603 style='height:30.75pt;
  width:452pt'>Dalam hal ini bertindak selaku kuasa dan dengan demikian sah
  mewaklili dan bertindak untuk dan atas nama MITRA UTAMA MOTOR.</td>
  <td class=xl638142></td>
 </tr>
 <tr height=10 style='mso-height-source:userset;height:7.5pt'>
  <td height=10 class=xl688142 style='height:7.5pt'></td>
  <td class=xl708142></td>
  <td class=xl748142></td>
  <td class=xl748142></td>
  <td class=xl748142></td>
  <td class=xl748142></td>
  <td class=xl748142></td>
  <td class=xl748142></td>
  <td class=xl638142></td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td colspan=8 height=23 class=xl698142 width=603 style='height:17.25pt;
  width:452pt'>Dengan ini menerangkan dan menyatakan hal-hal sebagai berikut :</td>
  <td class=xl638142></td>
 </tr>
 <tr height=44 style='mso-height-source:userset;height:33.0pt'>
  <td height=44 class=xl708142 style='height:33.0pt'>*</td>
  <td colspan=7 class=xl698142 width=572 style='width:429pt'>Bahwa konsumen
  (sebagaimana didefinisikan dibawah ini) telah membeli kendaraan dari Dealer
  dengan data-data sebagai berikut :</td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl688142 style='height:15.0pt'></td>
  <td colspan=2 class=xl758142>Nama Konsumen</td>
  <td colspan=5 class=xl728142>: <?php echo $cusname ?></td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl688142 style='height:15.0pt'></td>
  <td colspan=2 class=xl758142>Jenis Kendaraan<span
  style='mso-spacerun:yes'> </span></td>
  <td colspan=5 class=xl728142>: Sepeda Motor</td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl688142 style='height:15.0pt'></td>
  <td colspan=2 class=xl758142>Merek</td>
  <td colspan=5 class=xl728142>: HONDA</td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl688142 style='height:15.0pt'></td>
  <td colspan=2 class=xl758142>Type</td>
  <td colspan=5 class=xl728142>: HONDA / <?php echo $vehicletype ?>/T</td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl688142 style='height:15.0pt'></td>
  <td colspan=2 class=xl758142>Tahun</td>
  <td colspan=5 class=xl728142>: <?php echo $year ?></td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl718142 style='height:15.0pt'></td>
  <td colspan=2 class=xl768142>No Rangka</td>
  <td colspan=5 class=xl708142>: <?php echo $rangkano ?></td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl718142 style='height:15.0pt'></td>
  <td colspan=2 class=xl768142>No Mesin</td>
  <td colspan=5 class=xl708142>: <?php echo $mechineno ?></td>
  <td class=xl738142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl718142 style='height:15.0pt'></td>
  <td colspan=2 class=xl768142>Atas Nama</td>
  <td colspan=5 class=xl708142>: <?php echo $bpkbname ?></td>
  <td class=xl638142></td>
 </tr>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td height=40 class=xl718142 style='height:30.0pt'></td>
  <td colspan=2 class=xl768142>Alamat</td>
  <td colspan=5 class=xl698142 width=417 style='width:313pt'>: <?php echo $address ?> <?php echo $villagename ?> <?php echo $districtsname ?> <?php echo $cityname ?></td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl718142 style='height:15.0pt'></td>
  <td colspan=2 class=xl768142>No. Telpon (jika ada)</td>
  <td colspan=5 class=xl708142>: <?php echo $telp ?></td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl638142 style='height:15.0pt'></td>
  <td class=xl638142 colspan=3>Selanjutnya disebut &quot;Kendaraan&quot;</td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
 </tr>
 <tr height=44 style='mso-height-source:userset;height:33.0pt'>
  <td height=44 class=xl718142 style='height:33.0pt'>-</td>
  <td colspan=7 class=xl698142 width=572 style='width:429pt'>Bahwa buku
  pemilikan kendaraan bermotor (BPKB) dan faktur atas kendaraan tersebut saat
  ini sedang dalam proses pengurusan pada instansi terkait.</td>
  <td class=xl638142></td>
 </tr>
 <tr height=45 style='mso-height-source:userset;height:33.75pt'>
  <td height=45 class=xl718142 style='height:33.75pt'>-</td>
  <td colspan=7 class=xl698142 width=572 style='width:429pt'>Bahwa Dealer akan
  menyerahkan BPKB dan Faktur atas kendaraan tersebut, maka dengan ini Dealer
  setuju sebagai berikut;</td>
  <td class=xl638142></td>
 </tr>
 <tr height=43 style='mso-height-source:userset;height:32.25pt'>
  <td height=43 class=xl718142 style='height:32.25pt'>-</td>
  <td colspan=7 class=xl698142 width=572 style='width:429pt'>Apabila pada
  tanggal penyerahan, Dealer tidak dapat menyerahkan BPKB dan Faktur kendaraan
  tersebut, maka dengan ini Dealer setuju sebagai berikut:<span
  style='mso-spacerun:yes'> </span></td>
  <td class=xl638142></td>
 </tr>
 <tr height=63 style='mso-height-source:userset;height:47.25pt'>
  <td height=63 class=xl718142 style='height:47.25pt'>(i)</td>
  <td colspan=7 class=xl698142 width=572 style='width:429pt'>menyerahkan faktur
  berikut dokumen lainnya yang diperlukan untuk pengurusan BPKB atau tanda
  bukti pengurusan BPKB dengan instansi terkait, kepada WOM cabang &amp; semua
  biaya atas pengurusan BPKB tersebut akan menjadi beban sepenuhnya dari
  Dealer; dan / atau</td>
  <td class=xl638142></td>
 </tr>
 <tr height=123 style='mso-height-source:userset;height:92.25pt'>
  <td height=123 class=xl718142 style='height:92.25pt'>(ii)</td>
  <td colspan=7 class=xl698142 width=572 style='width:429pt'>memberi kuasa atau
  hak substansi kepada PT. Wahana Ottomitra Multiartha Tbk, (&quot;WOM
  Finance&quot;); untuk mengambil dan menerima Dokumen BPKB dan/atau
  dokumen-dokumen pengurus BPKB dari pihak ketiga (termasuk tidak terbatas
  rekanan biro jasa dari Dealer) dari Dealer dan main dealer, Instansi
  berwenang (Kepolisian/Samsat) maupun pihak lainnya, sehingga dengan demikian
  tidak diperlukan lagi kuasa khusus tersendiri agar WOM finance melaksanakan
  hak-haknya tersebut; dan<span style='mso-spacerun:yes'> </span></td>
  <td class=xl638142></td>
 </tr>
 <tr height=43 style='mso-height-source:userset;height:32.25pt'>
  <td height=43 class=xl718142 style='height:32.25pt'>(iii)</td>
  <td colspan=7 class=xl698142 width=572 style='width:429pt'>melaksanakan
  hak-haknya sebagaimana ditentukan dalam Perjanjian Kerjasama Dealer Nomor
  ……………… Tanggal …………….</td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl638142 style='height:15.0pt'></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl638142 style='height:15.0pt'></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=8 height=20 class=xl688142 style='height:15.0pt'>Demikian Surat
  Pernyataan dan Kuasa ini dibuat untuk dipergunakan sebagaimana mestinya</td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl638142 style='height:15.0pt'></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=8 height=20 class=xl688142 style='height:15.0pt'>Cirebon, 18
  November 2016</td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl638142 colspan=3 style='height:15.0pt'>Yang membuat
  pernyataan</td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl638142 colspan=3 style='height:15.0pt'>MITRA UTAMA
  MOTOR</td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl638142 style='height:15.0pt'></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl638142 style='height:15.0pt'></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl638142 style='height:15.0pt'></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=8 height=20 class=xl778142 style='height:15.0pt'>LILIS</td>
  <td class=xl638142></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl638142 colspan=2 style='height:15.0pt'>ADH Dealer</td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
  <td class=xl638142></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=31 style='width:23pt'></td>
  <td width=91 style='width:68pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=81 style='width:61pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=81 style='width:61pt'></td>
  <td width=127 style='width:95pt'></td>
  <td width=93 style='width:70pt'></td>
 </tr>
 <![endif]>
 <?php
	$i++;
		}
		}
 ?>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>
