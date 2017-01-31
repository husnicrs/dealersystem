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
<link rel=File-List href="OTTO_files/filelist.xml">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<style id="OTTO_11605_Styles"><!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.font511605
	{color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;}
.font611605
	{color:black;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;}
.xl6311605
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
.xl6411605
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
.xl6511605
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
.xl6611605
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
.xl6711605
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
.xl6811605
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
.xl6911605
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
.xl7011605
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
	white-space:normal;}
.xl7111605
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
.xl7211605
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
.xl7311605
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
	white-space:normal;}
.xl7411605
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
.xl7511605
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

<div id="OTTO_11605" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=696 class=xl6811605
 style='border-collapse:collapse;table-layout:fixed;width:522pt'>
 
 <col class=xl6811605 width=31 style='mso-width-source:userset;mso-width-alt:
 1133;width:23pt'>
 <col class=xl6811605 width=91 style='mso-width-source:userset;mso-width-alt:
 3328;width:68pt'>
 <col class=xl6811605 width=64 style='width:48pt'>
 <col class=xl6811605 width=81 style='mso-width-source:userset;mso-width-alt:
 2962;width:61pt'>
 <col class=xl6811605 width=64 span=2 style='width:48pt'>
 <col class=xl6811605 width=81 style='mso-width-source:userset;mso-width-alt:
 2962;width:61pt'>
 <col class=xl6811605 width=127 style='mso-width-source:userset;mso-width-alt:
 4644;width:95pt'>
 <col class=xl6811605 width=93 style='mso-width-source:userset;mso-width-alt:
 3401;width:70pt'>
 <tr height=31 style='mso-height-source:userset;height:23.25pt'>
  <td height=31 width=31 style='height:23.25pt;width:23pt' align=left
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
  </v:shapetype><v:shape id="Picture_x0020_1" o:spid="_x0000_s1028" type="#_x0000_t75"
   style='position:absolute;margin-left:9.75pt;margin-top:3.75pt;width:76.5pt;
   height:52.5pt;z-index:1;visibility:visible' o:gfxdata="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
">
   <v:imagedata src="OTTO_files/OTTO_11605_image001.png" o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><v:shape id="Straight_x0020_Connector_x0020_2" o:spid="_x0000_s1029"
   type="#_x0000_t75" style='position:absolute;margin-left:2.25pt;margin-top:54pt;
   width:450.75pt;height:2.25pt;z-index:2;visibility:visible' o:gfxdata="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
BQAAAAA=
">
   <v:imagedata src="OTTO_files/OTTO_11605_image002.png" o:title=""/>
   <o:lock v:ext="edit" aspectratio="f"/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><v:shape id="Straight_x0020_Connector_x0020_3" o:spid="_x0000_s1030"
   type="#_x0000_t75" style='position:absolute;margin-left:2.25pt;margin-top:55.5pt;
   width:450.75pt;height:2.25pt;z-index:3;visibility:visible' o:gfxdata="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
APkAAACqBQAAAAA=
">
   <v:imagedata src="OTTO_files/OTTO_11605_image002.png" o:title=""/>
   <o:lock v:ext="edit" aspectratio="f"/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:3px;margin-top:5px;width:601px;
  height:72px'><img width=601 height=72 src="report/OTTO_files/OTTO_11605_image003.png"
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
    <td height=31 class=xl6811605 width=31 style='height:23.25pt;width:23pt'></td>
   </tr>
  </table>
  </span></span></td>
  <span lang=EN-GB>
  <td class=xl6811605 width=91 style='width:68pt'></td>
  <td colspan=6 class=xl6911605 width=481 style='width:361pt'><span
  style='mso-spacerun:yes'> </span>MITRA UTAMA MOTOR<span
  style='mso-spacerun:yes'> </span></td>
  <td class=xl7411605 width=93 style='width:70pt'></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl6811605 style='height:15.75pt'></td>
  <td class=xl6811605></td>
  <td colspan=6 class=xl6311605>Jl. Raya Sunan Gunung Jati No. 47 Tangkil
  Cirebon</td>
  <td class=xl6811605></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl6811605 style='height:15.75pt'></td>
  <td class=xl6811605></td>
  <td colspan=6 class=xl6311605>(0231) 202534, 221100</td>
  <td class=xl6811605></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6811605 style='height:15.0pt'></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=8 height=20 class=xl6411605 style='height:15.0pt'>SURAT
  PERNYATAAN</td>
  <td class=xl6811605></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6411605 style='height:15.0pt'></td>
  <td class=xl6411605></td>
  <td class=xl6411605></td>
  <td class=xl6411605></td>
  <td class=xl6411605></td>
  <td class=xl6411605></td>
  <td class=xl6411605></td>
  <td class=xl6411605></td>
  <td class=xl6811605></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=8 height=20 class=xl6511605 style='height:15.0pt'>Saya yang
  bertanda tangan dibawah ini</td>
  <td class=xl6811605></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.75pt'>
  <td height=25 class=xl6511605 style='height:18.75pt'></td>
  <td class=xl6511605>Nama</td>
  <td colspan=6 class=xl6511605>: LILIS</td>
  <td class=xl6811605></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.75pt'>
  <td height=25 class=xl6511605 style='height:18.75pt'></td>
  <td class=xl6511605>Alamat</td>
  <td colspan=6 class=xl6511605>: JL. RAYA SUNAN GUNUNGJATI NO 47 CIREBON</td>
  <td class=xl7411605></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.75pt'>
  <td height=25 class=xl6511605 style='height:18.75pt'></td>
  <td class=xl6511605>No KTP</td>
  <td colspan=6 class=xl6511605>: 721378127381738172312</td>
  <td class=xl6811605></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6511605 style='height:15.0pt'></td>
  <td class=xl6511605></td>
  <td class=xl6511605></td>
  <td class=xl6511605></td>
  <td class=xl6511605></td>
  <td class=xl6511605></td>
  <td class=xl6511605></td>
  <td class=xl6511605></td>
  <td class=xl6811605></td>
 </tr>
 <tr height=68 style='mso-height-source:userset;height:51.0pt'>
  <td colspan=8 height=68 class=xl6711605 width=603 style='height:51.0pt;
  width:452pt'>Dalam hal ini bertindak selaku pimpinan/direktur dari MITRA
  UTAMA MOTOR yang beralamat di JL. RAYA SUNAN GUNUNGJATI NO.47 CIREBON
  (selanjutnya disebut &quot;Dealer&quot;) karenanya berhak dan berwenang untuk
  dan atas nama dealer.<span style='mso-spacerun:yes'> </span></td>
  <td class=xl6811605></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6511605 colspan=4 style='height:15.0pt'>Dengan ini
  menyatakan sebagai berikut :</td>
  <td class=xl7011605 width=64 style='width:48pt'></td>
  <td class=xl7011605 width=64 style='width:48pt'></td>
  <td class=xl7011605 width=81 style='width:61pt'></td>
  <td class=xl7011605 width=127 style='width:95pt'></td>
  <td class=xl6811605></td>
 </tr>
 <tr height=66 style='mso-height-source:userset;height:49.5pt'>
  <td height=66 class=xl7211605 style='height:49.5pt'>1</td>
  <td colspan=7 class=xl6711605 width=572 style='width:429pt'>Bahwa benar
  Dealer adalah pihak yang bertanggung jawab dalam pengurusan dokumen kendaraan
  namun tidak terbatas pada Bukti Pemilik Kendaraan Bermotor (BPKB) dan Surat
  Tanda Nomor Kendaraan (STNK) untuk konsumen atas nama <font class="font611605"><?php echo $cusname ?></font><font
  class="font511605"> dengan data sebagai berikut:</font></td>
  <td class=xl6811605></td>
 </tr>
 <tr height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl6511605 style='height:21.0pt'></td>
  <td colspan=7 class=xl7111605>* Merek HONDA Tipe HONDA / <?php echo $vehicletype ?> Tahun
  <?php echo $year ?> Warna <?php echo $vehiclecolorname ?></td>
  <td class=xl6811605></td>
 </tr>
 <tr height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl6511605 style='height:21.0pt'></td>
  <td class=xl7111605>* No Rangka</td>
  <td colspan=6 class=xl7111605>: <?php echo $rangkano ?></td>
  <td class=xl6811605></td>
 </tr>
 <tr height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl6511605 style='height:21.0pt'></td>
  <td class=xl7111605>* No Mesin</td>
  <td colspan=6 class=xl7111605>: <?php echo $mechineno ?></td>
  <td class=xl6811605></td>
 </tr>
 <tr height=88 style='mso-height-source:userset;height:66.0pt'>
  <td height=88 class=xl7211605 style='height:66.0pt'>2</td>
  <td colspan=7 class=xl6711605 width=572 style='width:429pt'>Bahwa dokumen -
  dokumen kendaraan tersebut diatas akan dibuat dengan atas nama <font
  class="font611605"><?php echo $cusname ?></font><font class="font511605"> dengan alamat </font><font
  class="font611605"><?php echo $address ?> <?php echo $villagename ?> <?php echo $districtsname ?> <?php echo $cityname ?></font><font class="font511605"> akan diselesaikan
  selambat-lambatnya 90 (sembilan puluh) hari kalender untuk BPKB dan 30 (tiga
  puluh) hari kalender untuk STNK.</font></td>
  <td class=xl6811605></td>
 </tr>
 <tr height=50 style='mso-height-source:userset;height:37.5pt'>
  <td height=50 class=xl7211605 style='height:37.5pt'>3</td>
  <td colspan=7 class=xl6711605 width=572 style='width:429pt'>Bahwa apabila
  dokumen kendaraan diatas telah selesai pengurusannya maka dealer wajib
  menyerahkan kepada berupa asli BPKB, asli copy FAKTUR, beserta dokumen lain
  yang terkait.</td>
  <td class=xl7511605></td>
 </tr>
 <tr height=91 style='mso-height-source:userset;height:68.25pt'>
  <td height=91 class=xl7311605 width=31 style='height:68.25pt;width:23pt'>4</td>
  <td colspan=7 class=xl6711605 width=572 style='width:429pt'>Bahwa Dealer akan
  bertanggungjawab atas kesalahan, keterlambatan, kehilangan dan pengurusan
  dokumen kendaraan termasuk kesalahan dalam penyerahan dokumen kendaraan yang
  disebutkan pada angka (3) diatas dan membebaskan dengan menanggung segala
  tuntutan dan ganti rugi dari pihak lain termasuk dari konsumen sendiri yang
  akan timbul di kemudian hari.</td>
  <td class=xl6811605></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6811605 style='height:15.0pt'></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=8 height=20 class=xl6511605 style='height:15.0pt'>Demikian
  penyertaan ini saya buat untuk dipergunakan sebagaimana mestinya,</td>
  <td class=xl6811605></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6811605 style='height:15.0pt'></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=8 height=20 class=xl6511605 style='height:15.0pt'>Cirebon, 18
  November 2016</td>
  <td class=xl6811605></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6811605 colspan=2 style='height:15.0pt'>Yang menyatakan</td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6811605 style='height:15.0pt'></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6811605 style='height:15.0pt'></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6811605 style='height:15.0pt'></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
  <td class=xl6811605></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=8 height=20 class=xl6511605 style='height:15.0pt'>LILIS</td>
  <td class=xl6811605></td>
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

