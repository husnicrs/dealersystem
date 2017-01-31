<?php
	$db=new Database();
	$rptdatefrom = $_POST['rptdatefrom'];
	$rptdateto = $_POST['rptdateto'];
	//error_reporting(0);
	$rptlbbwalkin = new Rptlbbwalkin();
	$core=new Core();
	$datashow_pjr = $rptlbbwalkin->show_pjr($rptdatefrom, $rptdateto);
	extract($datashow_pjr);
	
	$datashowtotal_pjr = $rptlbbwalkin->showtotal_pjr($rptdatefrom, $rptdateto);
	extract($datashowtotal_pjr);
	
	$datashow_unit = $rptlbbwalkin->show_unit($rptdatefrom, $rptdateto);
	extract($datashow_unit);
	
	$datashow_totalunit = $rptlbbwalkin->show_totalunit($rptdatefrom, $rptdateto);
	extract($datashow_totalunit);
	
	$datashow_totalyear = $rptlbbwalkin->show_totalyear($rptdatefrom, $rptdateto);
	extract($datashow_totalyear);
	
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
<link rel=File-List href="LBB%20WALK%20IN_files/filelist.xml">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<style id="LBB WALK IN_10918_Styles"><!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.font510918
	{color:black;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;}
.font610918
	{color:black;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;}
.font710918
	{color:black;
	font-size:9.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;}
.font810918
	{color:black;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Tahoma, sans-serif;
	mso-font-charset:0;}
.font910918
	{color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;}
.font1010918
	{color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;}
.font1110918
	{color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;}
.xl6410918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#EDEDED;
	mso-pattern:black none;
	white-space:normal;}
.xl6510918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#EDEDED;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl6610918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#EDEDED;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl6710918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:2.0pt double black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl6810918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid black;
	border-bottom:1.0pt solid black;
	border-left:.5pt solid black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl6910918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:2.0pt double black;
	border-bottom:1.0pt solid black;
	border-left:1.0pt solid black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl7010918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl7110918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl7210918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl7310918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#EDEDED;
	mso-pattern:yellow none;
	white-space:normal;}
.xl7410918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:#EDEDED;
	mso-pattern:yellow none;
	white-space:normal;}
.xl7510918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:#EDEDED;
	mso-pattern:yellow none;
	white-space:normal;}
.xl7610918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double black;
	border-right:1.0pt solid black;
	border-bottom:none;
	border-left:.5pt solid black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl7710918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid black;
	border-bottom:none;
	border-left:.5pt solid black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl7810918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double black;
	border-right:.5pt solid black;
	border-bottom:none;
	border-left:2.0pt double black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl7910918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid black;
	border-bottom:none;
	border-left:2.0pt double black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl8010918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid black;
	border-bottom:1.0pt solid black;
	border-left:2.0pt double black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl8110918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:1.0pt solid black;
	border-bottom:none;
	border-left:1.0pt solid black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl8210918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid black;
	border-bottom:1.0pt solid black;
	border-left:1.0pt solid black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl8310918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double black;
	border-right:2.0pt double black;
	border-bottom:none;
	border-left:1.0pt solid black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl8410918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:2.0pt double black;
	border-bottom:none;
	border-left:1.0pt solid black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl8510918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl8610918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl8710918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl8810918
	{padding:0px;
	mso-ignore:padding;
	color:white;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl8910918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9010918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:underline;
	text-underline-style:single;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl9110918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:underline;
	text-underline-style:single;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl9210918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl9310918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9410918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl9510918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt hairline black;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9610918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9710918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt hairline black;
	border-right:none;
	border-bottom:.5pt hairline black;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9810918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9910918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"mmm\\-yy";
	text-align:left;
	vertical-align:middle;
	border-top:.5pt hairline black;
	border-right:none;
	border-bottom:.5pt hairline black;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl10010918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl10110918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl10210918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-421\]\#\,\#\#0\\ \;\[$Rp-421\]\\\(\#\,\#\#0\\\)\;\[$Rp-421\]\\-\#\\ \;\@\\ ";
	text-align:general;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl10310918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl10410918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-421\]\#\,\#\#0\\ \;\[$Rp-421\]\\\(\#\,\#\#0\\\)\;\[$Rp-421\]\\-\#\\ \;\@\\ ";
	text-align:general;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl10510918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-421\]\#\,\#\#0\\ \;\[$Rp-421\]\\\(\#\,\#\#0\\\)\;\[$Rp-421\]\\-\#\\ \;\@\\ ";
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl10610918
	{padding:0px;
	mso-ignore:padding;
	color:white;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-421\]\#\,\#\#0\\ \;\[$Rp-421\]\\\(\#\,\#\#0\\\)\;\[$Rp-421\]\\-\#\\ \;\@\\ ";
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid white;
	background:black;
	mso-pattern:#003300 none;
	white-space:normal;}
.xl10710918
	{padding:0px;
	mso-ignore:padding;
	color:white;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-421\]\#\,\#\#0\\ \;\[$Rp-421\]\\\(\#\,\#\#0\\\)\;\[$Rp-421\]\\-\#\\ \;\@\\ ";
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:black;
	mso-pattern:#003300 none;
	white-space:normal;}
.xl10810918
	{padding:0px;
	mso-ignore:padding;
	color:white;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-421\]\#\,\#\#0\\ \;\[$Rp-421\]\\\(\#\,\#\#0\\\)\;\[$Rp-421\]\\-\#\\ \;\@\\ ";
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:black;
	mso-pattern:#003300 none;
	white-space:normal;}
.xl10910918
	{padding:0px;
	mso-ignore:padding;
	color:white;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl11010918
	{padding:0px;
	mso-ignore:padding;
	color:white;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
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
	white-space:normal;}
.xl11110918
	{padding:0px;
	mso-ignore:padding;
	color:white;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:black;
	mso-pattern:#003300 none;
	white-space:normal;}
.xl11210918
	{padding:0px;
	mso-ignore:padding;
	color:white;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-421\]\#\,\#\#0";
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:black;
	mso-pattern:#003300 none;
	white-space:normal;}
.xl11310918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl11410918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-421\]\#\,\#\#0\\ \;\[$Rp-421\]\\\(\#\,\#\#0\\\)\;\[$Rp-421\]\\-\#\\ \;\@\\ ";
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl11510918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-421\]\#\,\#\#0\\ \;\[$Rp-421\]\\\(\#\,\#\#0\\\)\;\[$Rp-421\]\\-\#\\ \;\@\\ ";
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl11610918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-421\]\#\,\#\#0\\ \;\[$Rp-421\]\\\(\#\,\#\#0\\\)\;\[$Rp-421\]\\-\#\\ \;\@\\ ";
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:1.0pt solid black;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl11710918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl11810918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl11910918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl12010918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl12110918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl12210918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double black;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl12310918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double black;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:2.0pt double black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl12410918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double black;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:none;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl12510918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double black;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid black;
	border-left:none;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl12610918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:2.0pt double black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl12710918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:none;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl12810918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:1.0pt solid black;
	border-bottom:1.0pt solid black;
	border-left:none;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl12910918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:1.0pt solid black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl13010918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl13110918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid black;
	border-bottom:1.0pt solid black;
	border-left:.5pt solid black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl13210918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:.5pt solid black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl13310918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\@";
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid black;
	border-bottom:1.0pt solid black;
	border-left:.5pt solid black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl13410918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid black;
	border-bottom:1.0pt solid black;
	border-left:1.0pt solid black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl13510918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid black;
	border-left:1.0pt solid black;
	background:#D9D9D9;
	mso-pattern:teal none;
	white-space:normal;}
.xl13610918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:2.0pt double black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl13710918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:.5pt solid black;
	border-right:1.0pt solid black;
	border-bottom:.5pt solid black;
	border-left:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl13810918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:2.0pt double black;
	border-bottom:none;
	border-left:1.0pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl13910918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:.5pt solid black;
	border-left:2.0pt double black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl14010918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:.5pt solid black;
	border-bottom:.5pt solid black;
	border-left:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl14110918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:.5pt solid black;
	border-bottom:.5pt solid black;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl14210918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl14310918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:1.0pt solid black;
	border-bottom:none;
	border-left:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl14410918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl14510918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid black;
	border-bottom:none;
	border-left:1.0pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl14610918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid black;
	border-bottom:none;
	border-left:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl14710918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid black;
	border-bottom:none;
	border-left:.5pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl14810918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid black;
	border-bottom:none;
	border-left:1.0pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl14910918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:1.0pt solid black;
	border-bottom:none;
	border-left:1.0pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl15010918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl15110918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:2.0pt double black;
	background:silver;
	mso-pattern:#CCCCFF none;
	white-space:normal;}
.xl15210918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:1.0pt solid black;
	border-bottom:1.0pt solid black;
	border-left:none;
	background:silver;
	mso-pattern:#CCCCFF none;
	white-space:normal;}
.xl15310918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:2.0pt double black;
	border-bottom:1.0pt solid black;
	border-left:1.0pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl15410918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:2.0pt double black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl15510918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:.5pt solid black;
	border-bottom:1.0pt solid black;
	border-left:.5pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl15610918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:.5pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl15710918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:1.0pt solid black;
	border-bottom:1.0pt solid black;
	border-left:.5pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl15810918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl15910918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:.5pt solid black;
	border-bottom:1.0pt solid black;
	border-left:1.0pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl16010918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:1.0pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl16110918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid black;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl16210918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:2.0pt double black;
	border-left:2.0pt double black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl16310918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:1.0pt solid black;
	border-bottom:2.0pt double black;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl16410918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:2.0pt double black;
	border-bottom:2.0pt double black;
	border-left:1.0pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl16510918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double black;
	border-left:2.0pt double black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl16610918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid black;
	border-bottom:2.0pt double black;
	border-left:.5pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl16710918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double black;
	border-left:.5pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl16810918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid black;
	border-bottom:2.0pt double black;
	border-left:.5pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl16910918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double black;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl17010918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid black;
	border-bottom:2.0pt double black;
	border-left:1.0pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl17110918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid black;
	border-bottom:2.0pt double black;
	border-left:1.0pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl17210918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:2.0pt double black;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl17310918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:.5pt solid black;
	border-right:none;
	border-bottom:.5pt solid black;
	border-left:.5pt solid black;
	background:#D9D9D9;
	mso-pattern:yellow none;
	white-space:normal;}
.xl17410918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#D9D9D9;
	mso-pattern:yellow none;
	white-space:normal;}
.xl17510918
	{padding:0px;
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
	background:#D9D9D9;
	mso-pattern:yellow none;
	white-space:normal;}
.xl17610918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:.5pt solid black;
	border-right:none;
	border-bottom:.5pt solid black;
	border-left:.5pt solid black;
	background:#D9D9D9;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl17710918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:white;
	mso-pattern:yellow none;
	white-space:normal;}
.xl17810918
	{padding:0px;
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
	background:white;
	mso-pattern:yellow none;
	white-space:normal;}
.xl17910918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl18010918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl18110918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.5pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl18210918
	{padding:0px;
	mso-ignore:padding;
	color:white;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl18310918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl18410918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl18510918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:none;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl18610918
	{padding:0px;
	mso-ignore:padding;
	color:white;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl18710918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl18810918
	{padding:0px;
	mso-ignore:padding;
	color:white;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	background:red;
	mso-pattern:black none;
	white-space:normal;}
.xl18910918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt hairline black;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl19010918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl19110918
	{padding:0px;
	mso-ignore:padding;
	color:red;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl19210918
	{padding:0px;
	mso-ignore:padding;
	color:red;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl19310918
	{padding:0px;
	mso-ignore:padding;
	color:red;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl19410918
	{padding:0px;
	mso-ignore:padding;
	color:white;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:black;
	mso-pattern:#003300 none;
	white-space:normal;}
.xl19510918
	{padding:0px;
	mso-ignore:padding;
	color:white;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid white;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:black;
	mso-pattern:#003300 none;
	white-space:normal;}
.xl19610918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl19710918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl19810918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid black;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl19910918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-421\]\#\,\#\#0\\ \;\[$Rp-421\]\\\(\#\,\#\#0\\\)\;\[$Rp-421\]\\-\#\\ \;\@\\ ";
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl20010918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-421\]\#\,\#\#0\\ \;\[$Rp-421\]\\\(\#\,\#\#0\\\)\;\[$Rp-421\]\\-\#\\ \;\@\\ ";
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl20110918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-421\]\#\,\#\#0\\ \;\[$Rp-421\]\\\(\#\,\#\#0\\\)\;\[$Rp-421\]\\-\#\\ \;\@\\ ";
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl20210918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-3809\]\#\,\#\#0";
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl20310918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-3809\]\#\,\#\#0";
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl20410918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-3809\]\#\,\#\#0";
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl20510918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-421\]\#\,\#\#0\\ \;\[$Rp-421\]\\\(\#\,\#\#0\\\)\;\[$Rp-421\]\\-\#\\ \;\@\\ ";
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl20610918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-421\]\#\,\#\#0\\ \;\[$Rp-421\]\\\(\#\,\#\#0\\\)\;\[$Rp-421\]\\-\#\\ \;\@\\ ";
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl20710918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-421\]\#\,\#\#0\\ \;\[$Rp-421\]\\\(\#\,\#\#0\\\)\;\[$Rp-421\]\\-\#\\ \;\@\\ ";
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl20810918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-3809\]\#\,\#\#0";
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl20910918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:1.0pt solid windowtext;
	background:#E2EFDA;
	mso-pattern:yellow none;
	white-space:normal;}
.xl21010918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:none;
	background:#E2EFDA;
	mso-pattern:yellow none;
	white-space:normal;}
.xl21110918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid black;
	border-bottom:1.0pt solid black;
	border-left:none;
	background:#E2EFDA;
	mso-pattern:yellow none;
	white-space:normal;}
.xl21210918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl21310918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl21410918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:.5pt solid black;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl21510918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:1.0pt solid black;
	background:#E2EFDA;
	mso-pattern:yellow none;
	white-space:normal;}
.xl21610918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid black;
	border-left:none;
	background:#E2EFDA;
	mso-pattern:yellow none;
	white-space:normal;}
.xl21710918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl21810918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-421\]\#\,\#\#0\\ \;\[$Rp-421\]\\\(\#\,\#\#0\\\)\;\[$Rp-421\]\\-\#\\ \;\@\\ ";
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid black;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl21910918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-421\]\#\,\#\#0\\ \;\[$Rp-421\]\\\(\#\,\#\#0\\\)\;\[$Rp-421\]\\-\#\\ \;\@\\ ";
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl22010918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"\[$Rp-421\]\#\,\#\#0\\ \;\[$Rp-421\]\\\(\#\,\#\#0\\\)\;\[$Rp-421\]\\-\#\\ \;\@\\ ";
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl22110918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#E2EFDA;
	mso-pattern:yellow none;
	white-space:normal;}
.xl22210918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:#E2EFDA;
	mso-pattern:yellow none;
	white-space:normal;}
.xl22310918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:#E2EFDA;
	mso-pattern:yellow none;
	white-space:normal;}
.xl22410918
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:2.0pt double black;
	border-left:none;
	background:white;
	mso-pattern:#FFFFCC none;
	white-space:normal;}
.xl22510918
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	background:white;
	mso-pattern:#FFFFCC none;
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

<div id="LBB WALK IN_10918" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=1531 class=xl8910918
 style='border-collapse:collapse;table-layout:fixed;width:1149pt'>
 <col class=xl8910918 width=36 style='mso-width-source:userset;mso-width-alt:
 1316;width:27pt'>
 <col class=xl8910918 width=37 style='mso-width-source:userset;mso-width-alt:
 1353;width:28pt'>
 <col class=xl8910918 width=185 style='mso-width-source:userset;mso-width-alt:
 6765;width:139pt'>
 <col class=xl8910918 width=75 style='mso-width-source:userset;mso-width-alt:
 2742;width:56pt'>
 <col class=xl8910918 width=98 style='mso-width-source:userset;mso-width-alt:
 3584;width:74pt'>
 <col class=xl8910918 width=75 span=6 style='mso-width-source:userset;
 mso-width-alt:2742;width:56pt'>
 <col class=xl8910918 width=78 style='mso-width-source:userset;mso-width-alt:
 2852;width:59pt'>
 <col class=xl8910918 width=94 style='mso-width-source:userset;mso-width-alt:
 3437;width:71pt'>
 <col class=xl8910918 width=75 style='mso-width-source:userset;mso-width-alt:
 2742;width:56pt'>
 <col class=xl8910918 width=94 style='mso-width-source:userset;mso-width-alt:
 3437;width:71pt'>
 <col class=xl8910918 width=87 style='mso-width-source:userset;mso-width-alt:
 3181;width:65pt'>
 <col class=xl8910918 width=57 style='mso-width-source:userset;mso-width-alt:
 2084;width:43pt'>
 <col class=xl8910918 width=73 style='mso-width-source:userset;mso-width-alt:
 2669;width:55pt'>
 <col class=xl8910918 width=12 style='mso-width-source:userset;mso-width-alt:
 438;width:9pt'>
 <col class=xl8810918 width=80 style='mso-width-source:userset;mso-width-alt:
 2925;width:60pt'>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl8510918 width=36 style='height:15.75pt;width:27pt'>&nbsp;</td>
  <td class=xl8610918 width=37 style='width:28pt'>&nbsp;</td>
  <td class=xl8710918 width=185 style='width:139pt'>&nbsp;</td>
  <td class=xl8710918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8710918 width=98 style='width:74pt'>&nbsp;</td>
  <td class=xl8710918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8710918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8710918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8710918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8710918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8710918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8710918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl8710918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8710918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8710918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8710918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl8710918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl8510918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl8510918 width=36 style='height:15.75pt;width:27pt'>&nbsp;</td>
  <td colspan=16 class=xl9010918 width=1330 style='width:998pt'>LAPORAN BULANAN
  BENGKEL</td>
  <td class=xl9110918 width=73 style='width:55pt'><u style='visibility:hidden;
  mso-ignore:visibility'>&nbsp;</u></td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl8510918 width=36 style='height:15.75pt;width:27pt'>&nbsp;</td>
  <td colspan=16 class=xl8610918 width=1330 style='width:998pt'>( L.B.B WALK
  IN)</td>
  <td class=xl9210918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl8510918 width=36 style='height:12.75pt;width:27pt'>&nbsp;</td>
  <td class=xl9210918 width=37 style='width:28pt'>&nbsp;</td>
  <td class=xl9310918 width=185 style='width:139pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=98 style='width:74pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=78 style='width:59pt'></td>
  <td class=xl9310918 width=94 style='width:71pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=94 style='width:71pt'></td>
  <td class=xl9310918 width=87 style='width:65pt'></td>
  <td class=xl8510918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl8510918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td colspan=2 class=xl9410918 width=222 style='width:167pt'>Nomor AHASS</td>
  <td colspan=3 class=xl9510918 width=248 style='width:186pt'>06909</td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl9610918 width=78 style='width:59pt'>Web</td>
  <td class=xl8910918 width=94 style='width:71pt'></td>
  <td colspan=3 class=xl18910918 width=256 style='width:192pt'>www.mitrautamacirebon.blogspot.co.id</td>
  <td class=xl8510918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl8510918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td colspan=2 class=xl9410918 width=222 style='width:167pt'>Nama AHASS</td>
  <td colspan=3 class=xl9710918 width=248 style='width:186pt'>MITRA UTAMA</td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl9610918 width=78 style='width:59pt'>Twitter</td>
  <td class=xl8910918 width=94 style='width:71pt'></td>
  <td colspan=3 class=xl9710918 width=256 style='width:192pt'>&nbsp;</td>
  <td class=xl8510918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl8510918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td colspan=2 class=xl9410918 width=222 style='width:167pt'>Status</td>
  <td colspan=3 class=xl9710918 width=248 style='width:186pt'>H123</td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl9610918 width=78 style='width:59pt'>Facebook</td>
  <td class=xl8910918 width=94 style='width:71pt'></td>
  <td colspan=3 class=xl9710918 width=256 style='width:192pt'>AHASS MITRA UTAMA</td>
  <td class=xl8510918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl8510918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td colspan=2 class=xl9410918 width=222 style='width:167pt'>Kota</td>
  <td colspan=3 class=xl9710918 width=248 style='width:186pt'>KUNINGAN</td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=78 style='width:59pt'>Instagram</td>
  <td class=xl9310918 width=94 style='width:71pt'></td>
  <td colspan=3 class=xl9710918 width=256 style='width:192pt'>AHASS MITRA UTAMA</td>
  <td class=xl8510918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl8510918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td colspan=2 class=xl9410918 width=222 style='width:167pt'>Jumlah PIT AHASS</td>
  <td colspan=3 class=xl9710918 width=248 style='width:186pt'>8</td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=78 style='width:59pt'></td>
  <td class=xl9310918 width=94 style='width:71pt'></td>
  <td class=xl9810918 width=75 style='width:56pt'></td>
  <td class=xl9810918 width=94 style='width:71pt'></td>
  <td class=xl9810918 width=87 style='width:65pt'></td>
  <td class=xl8510918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl8510918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td colspan=2 class=xl9410918 width=222 style='width:167pt'>Laporan Bulan</td>
  <td colspan=3 class=xl9910918 width=248 style='width:186pt'> <?php echo $rptdatefrom; ?> s/d <?php echo $rptdateto; ?></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=78 style='width:59pt'></td>
  <td class=xl9310918 width=94 style='width:71pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=94 style='width:71pt'></td>
  <td class=xl9310918 width=87 style='width:65pt'></td>
  <td class=xl8510918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl8510918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td class=xl9210918 width=37 style='width:28pt'>&nbsp;</td>
  <td class=xl8510918 width=185 style='width:139pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=98 style='width:74pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl8510918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl8510918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td class=xl9210918 width=37 style='width:28pt'>&nbsp;</td>
  <td class=xl8510918 width=185 style='width:139pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=98 style='width:74pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl8510918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl8510918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl8510918 width=36 style='height:18.0pt;width:27pt'>&nbsp;</td>
  <td colspan=6 class=xl19010918 width=545 style='width:409pt'>I. LAPORAN
  PENDAPATAN BENGKEL</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl10010918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl10010918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl8510918 width=36 style='height:18.0pt;width:27pt'>&nbsp;</td>
  <td colspan=6 class=xl22110918 width=545 style='border-right:1.0pt solid black;
  width:409pt'>&nbsp;1. Pendapatan jasa dan reparasi</td>
  <td colspan=10 class=xl22110918 width=785 style='border-right:1.0pt solid black;
  border-left:none;width:589pt'>&nbsp;2. Pendapatan penjualan Parts.</td>
  <td width=73 style='width:55pt' align=left valign=top><!--[if gte vml 1]><v:shapetype
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
  </v:shapetype><v:shape id="TextBox_x0020_1" o:spid="_x0000_s1035" type="#_x0000_t75"
   style='position:absolute;margin-left:12.75pt;margin-top:14.25pt;width:45.75pt;
   height:30pt;z-index:7;visibility:visible;mso-wrap-style:square;
   v-text-anchor:top' o:gfxdata="UEsDBBQABgAIAAAAIQDw94q7/QAAAOIBAAATAAAAW0NvbnRlbnRfVHlwZXNdLnhtbJSRzUrEMBDH
74LvEOYqbaoHEWm6B6tHFV0fYEimbdg2CZlYd9/edD8u4goeZ+b/8SOpV9tpFDNFtt4puC4rEOS0
N9b1Cj7WT8UdCE7oDI7ekYIdMayay4t6vQvEIrsdKxhSCvdSsh5oQi59IJcvnY8TpjzGXgbUG+xJ
3lTVrdTeJXKpSEsGNHVLHX6OSTxu8/pAEmlkEA8H4dKlAEMYrcaUSeXszI+W4thQZudew4MNfJUx
QP7asFzOFxx9L/lpojUkXjGmZ5wyhjSRJQ8YKGvKv1MWzIkL33VWU9lGfl98J6hz4cZ/uUjzf7Pb
bHuj+ZQu9z/UfAMAAP//AwBQSwMEFAAGAAgAAAAhADHdX2HSAAAAjwEAAAsAAABfcmVscy8ucmVs
c6SQwWrDMAyG74O9g9G9cdpDGaNOb4VeSwe7CltJTGPLWCZt376mMFhGbzvqF/o+8e/2tzCpmbJ4
jgbWTQuKomXn42Dg63xYfYCSgtHhxJEM3Elg372/7U40YalHMvokqlKiGBhLSZ9aix0poDScKNZN
zzlgqWMedEJ7wYH0pm23Ov9mQLdgqqMzkI9uA+p8T9X8hx28zSzcl8Zy0Nz33r6iasfXeKK5UjAP
VAy4LM8w09zU50C/9q7/6ZURE31X/kL8TKv1x6wXNXYPAAAA//8DAFBLAwQUAAYACAAAACEA4SIH
O5kCAACyBwAAEAAAAGRycy9zaGFwZXhtbC54bWy8Vdtu2zAMfR+wfxD03tpO7MQJYhdbgg4DhjVo
uw9QbDkxKkuepOWyrx8p2U6zx6boi6OQIs8ReUQt7o6NIHuuTa1kRqPbkBIuC1XWcpvRX8/3Nykl
xjJZMqEkz+iJG3qXf/60OJZ6zmSxU5pACmnmYMjoztp2HgSm2PGGmVvVcgneSumGWfirt0Gp2QGS
NyIYheEkMK3mrDQ7zu3Ke2juctuDWnIhvjgIb6q0avyqUCKPposASeDaRcDioaryaBKPZ/HgQ5Nz
a3XIo7G347o3upjpNA3DwediXPIzpFUDSh6lQ/rBiDHJeJqOBtclcjJkv0QOo0k6GXxn5B7PtKRh
hVYZpcTyoxW1fIG1TyL3T+1adxx+7tea1GVGR5RI1kCznmH/V3UkEQ2GPRhA7BHM0G60u3O+TmRc
SjY/Vrrpesve0NmG1RJosrmqKoJgoziB3sSUnDI6DuM4HSWIz+bAkhSwI0njaTSmpIAN0WiWxOnE
EfRUcGerjf3G1dW0CCbKqOaFdRTZ/oexWIszBMIZJeryvhbiPcrg7gRfCk32TGRUWF/9VygIKeS1
WOSQ0VkCtSVF04IajNy6M0qFJ/GHFLLru+81XiNjT4J7Bo8cGubu9Jv7DjqEhoYO2BR6u8Fzw3yA
8QJzBb4b/PZkABCRK+D3wdgdJKLzqgI5fDD+AOrOr+T74Te1VLqrPwzjs/DKl154lcfrpeAFgFrA
8VCekNIGfmFeXKsGeGDsA3wqoUCdhahbSuDl+Pu/7aBZC4r9/YdpTom2YqngqoBc/EsDoVb7mSGM
fULC11JzA6i9NovTjyzXTLNHKJdg+HrW5c33VafxtityX1k3dA1Y3Qsmai7tilmGF8I14PLxczZf
gvwfAAAA//8DAFBLAwQUAAYACAAAACEAwppQuCABAACeAQAADwAAAGRycy9kb3ducmV2LnhtbFxQ
y07DMBC8I/EP1iJxo076SlviVAWJxwEhtVRwNcnmocZ2ZZs26dezJRUV3DyzM7M7jueNqtkOrauM
FhD2AmCoU5NVuhCwfnu4mQBzXupM1kajgBYdzJPLi1jOMrPXS9ytfMEoRLuZFFB6v51x7tISlXQ9
s0VNs9xYJT1BW/DMyj2Fq5r3g2DMlaw0bSjlFu9LTDerLyXg4FodPrqwOOCg/TDhy+bufb0R4vqq
WdwC89j4s/jkfs4E9IHlT+2nrbKldB6tAKpD5agYJHRxUy90WhrL8iW66kB1Oj63RjFr9oQHwFJT
0yOCI/Oa5w49wUkwjUY/s19qHE77I+DHYG9O9k5y1P+1B8Pon30YjTs3P9+VxATO35p8AwAA//8D
AFBLAQItABQABgAIAAAAIQDw94q7/QAAAOIBAAATAAAAAAAAAAAAAAAAAAAAAABbQ29udGVudF9U
eXBlc10ueG1sUEsBAi0AFAAGAAgAAAAhADHdX2HSAAAAjwEAAAsAAAAAAAAAAAAAAAAALgEAAF9y
ZWxzLy5yZWxzUEsBAi0AFAAGAAgAAAAhAOEiBzuZAgAAsgcAABAAAAAAAAAAAAAAAAAAKQIAAGRy
cy9zaGFwZXhtbC54bWxQSwECLQAUAAYACAAAACEAwppQuCABAACeAQAADwAAAAAAAAAAAAAAAADw
BAAAZHJzL2Rvd25yZXYueG1sUEsFBgAAAAAEAAQA9QAAAD0GAAAAAA==
" o:insetmode="auto">
   <v:imagedata src="LBB%20WALK%20IN_files/LBB%20WALK%20IN_10918_image001.png"
    o:title=""/>
   <o:lock v:ext="edit" aspectratio="f"/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:7;margin-left:17px;margin-top:19px;width:61px;
  height:40px'><img width=61 height=40
  src="LBB%20WALK%20IN_files/LBB%20WALK%20IN_10918_image002.png" v:shapes="TextBox_x0020_1"></span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=24 class=xl9310918 width=73 style='height:18.0pt;width:55pt'></td>
   </tr>
  </table>
  </span></td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
   <?php
	$i=1;
	if($datashow_pjr !=0){
	foreach ($datashow_pjr as $value) {
	extract($value);
	?> 
  
  
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl8510918 width=36 style='height:18.0pt;width:27pt'>&nbsp;</td>
  <td colspan=3 class=xl19610918 width=297 style='border-right:.5pt solid black;
  width:223pt'>&nbsp;<?php echo $i; ?>. <?php echo $vehliceservicetype_pjr; ?>&nbsp;</td>
  <td colspan=3 class=xl19910918 width=248 style='border-right:.5pt solid black;
  border-left:none;width:186pt'>&nbsp;<?php echo number_format($subtotal__pjr); ?>&nbsp;</td>
  <td class=xl10110918 width=75 style='border-top:none;border-left:none;
  width:56pt'>&nbsp;<?php echo $inventorygroupname_ppp; ?></td>
  <td class=xl10210918 width=75 style='border-top:none;width:56pt'>&nbsp;</td>
  <td colspan=3 class=xl20210918 width=228 style='border-right:.5pt solid black;
  border-left:none;width:171pt'>&nbsp;<?php echo number_format($amount_ppp); ?></td>
  <td class=xl10310918 width=94 style='width:71pt'><?php echo $inventorygroupname_ppp2; ?></td>
  <td class=xl10410918 width=75 style='width:56pt'>&nbsp;</td>
  <td colspan=3 class=xl20210918 width=238 style='border-right:1.0pt solid black;
  width:179pt'><?php echo number_format($amount_ppp2); ?></td>
  <td class=xl10510918 width=73 style='width:55pt'></td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
  
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
	if($datashowtotal_pjr !=0){
	foreach ($datashowtotal_pjr as $value) {
	extract($value);
	?> 
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl8510918 width=36 style='height:18.0pt;width:27pt'>&nbsp;</td>
  <td colspan=3 class=xl19410918 width=297 style='border-right:.5pt solid white;
  width:223pt'>Total Pendapatan Jasa</td>
  <td colspan=3 class=xl10610918 width=248 style='border-right:1.0pt solid black;
  border-left:none;width:186pt'><?php echo number_format($tsubtotal__pjr); ?>&nbsp; </td>
  <td class=xl10910918 width=75 style='border-left:none;width:56pt'>&nbsp;</td>
  <td class=xl11010918 width=75 style='width:56pt'>&nbsp;</td>
  <td colspan=3 class=xl11110918 width=228 style='width:171pt'>Total Pendapatan
  Spare Part</td>
  <td colspan=5 class=xl11210918 width=407 style='width:306pt'><?php echo number_format($tamount_ppp); ?>&nbsp;</td>
  <td class=xl10510918 width=73 style='width:55pt'></td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>

 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl8510918 width=36 style='height:18.0pt;width:27pt'>&nbsp;</td>
  <td class=xl8910918 width=37 style='width:28pt'></td>
  <td class=xl8910918 width=185 style='width:139pt'></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl8910918 width=98 style='width:74pt'></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td colspan=3 class=xl19110918 width=228 style='border-right:1.0pt solid black;
  width:171pt'>TOTAL PENGHASILAN BENGKEL</td>
  <td colspan=5 class=xl20510918 width=407 style='border-right:1.0pt solid black;
  border-left:none;width:306pt'><?php echo number_format($tpjrppp); ?>&nbsp; </td>
  <td class=xl10510918 width=73 style='width:55pt'></td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
  <?php
	$i++;
		}
		} else{
			$core->pesan_warning("Data is empty");
		}
    ?> 
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl8510918 width=36 style='height:18.0pt;width:27pt'>&nbsp;</td>
  <td class=xl8910918 width=37 style='width:28pt'></td>
  <td class=xl8910918 width=185 style='width:139pt'></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl8910918 width=98 style='width:74pt'></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl8910918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=75 style='width:56pt'></td>
  <td class=xl9310918 width=78 style='width:59pt'></td>
  <td colspan=5 class=xl11310918 width=407 style='width:306pt'>&nbsp;</td>
  <td class=xl10510918 width=73 style='width:55pt'></td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl8510918 width=36 style='height:18.0pt;width:27pt'>&nbsp;</td>
  <td colspan=8 class=xl19010918 width=695 style='width:521pt'>II. LAPORAN
  PEMBELIAN SPARE PART DAN PENGELUARAN BENGKEL</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl10010918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl10510918 width=73 style='width:55pt'></td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl8510918 width=36 style='height:18.0pt;width:27pt'>&nbsp;</td>
  <td colspan=8 class=xl20910918 width=695 style='border-right:1.0pt solid black;
  width:521pt'>1. Pembelian ke Main Dealer</td>
  <td colspan=8 class=xl21510918 width=635 style='border-right:1.0pt solid black;
  border-left:none;width:477pt'>2. Pengeluaran operasional AHASS</td>
  <td class=xl10510918 width=73 style='width:55pt'></td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl8510918 width=36 style='height:18.0pt;width:27pt'>&nbsp;</td>
  <td colspan=3 class=xl21210918 width=297 style='border-right:.5pt solid black;
  width:223pt'>a. PO Part AHASS ke Main Dealer (Rp.)</td>
  <td colspan=5 class=xl11410918 width=398 style='border-right:1.0pt solid black;
  border-left:none;width:298pt'> </td>
  <td colspan=4 class=xl21710918 width=322 style='border-right:.5pt solid black;
  border-left:none;width:242pt'>a. Total Pengeluaran Operasional Bengkel (Rp.)</td>
  <td colspan=4 class=xl21810918 width=313 style='border-right:1.0pt solid black;
  border-left:none;width:235pt'> </td>
  <td class=xl10510918 width=73 style='width:55pt'></td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td class=xl9410918 width=37 style='width:28pt'>&nbsp;</td>
  <td class=xl8510918 width=185 style='width:139pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=98 style='width:74pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl8510918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl8510918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td colspan=9 class=xl19010918 width=770 style='width:577pt'>III. LAPORAN <font
  class="font1110918">UNIT </font><font class="font1010918">BTL dan Paket
  Servis</font></td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl8510918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl8510918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=78 style='mso-height-source:userset;height:59.1pt'>
  <td height=78 class=xl8510918 width=36 style='height:59.1pt;width:27pt'>&nbsp;</td>
  <td colspan=3 class=xl7310918 width=297 style='border-right:.5pt solid black;
  width:223pt'>Unit Entry BTL dan Paket Servis</td>
  <td class=xl6410918 width=98 style='border-top:none;border-left:none;
  width:74pt'>Jumlah Konsumen yang beli part atau oli saja</td>
  <td class=xl6510918 width=75 style='border-top:none;border-left:none;
  width:56pt'>Booking Servis</td>
  <td class=xl6510918 width=75 style='border-top:none;border-left:none;
  width:56pt'>Always Honda</td>
  <td class=xl6510918 width=75 style='border-top:none;border-left:none;
  width:56pt'>CVT Cleaner</td>
  <td class=xl6510918 width=75 style='border-top:none;border-left:none;
  width:56pt'>Kuras Tangki</td>
  <td class=xl6510918 width=75 style='border-top:none;border-left:none;
  width:56pt'>Kuras Oli Rem</td>
  <td class=xl6510918 width=75 style='border-left:none;width:56pt'>Cuci Rantai</td>
  <td class=xl6510918 width=78 style='border-left:none;width:59pt'>Kuras
  Radiator</td>
  <td class=xl6510918 width=94 style='border-left:none;width:71pt'>Ganti Oli
  Shock</td>
  <td class=xl6610918 width=75 style='border-left:none;width:56pt'>TOTAL</td>
  <td class=xl9210918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl9210918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl9210918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl9210918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td colspan=3 class=xl11710918 width=297 style='border-right:.5pt solid black;
  width:223pt'>Jumlah Unit</td>
  <td class=xl12010918 width=98 style='border-left:none;width:74pt'></td>
  <td class=xl12010918 width=75 style='border-left:none;width:56pt'></td>
  <td class=xl12010918 width=75 style='border-left:none;width:56pt'></td>
  <td class=xl12010918 width=75 style='border-left:none;width:56pt'></td>
  <td class=xl12010918 width=75 style='border-left:none;width:56pt'>&nbsp;</td>
  <td class=xl12010918 width=75 style='border-left:none;width:56pt'></td>
  <td class=xl12010918 width=75 style='border-left:none;width:56pt'>&nbsp;</td>
  <td class=xl12010918 width=78 style='border-left:none;width:59pt'>&nbsp;</td>
  <td class=xl12010918 width=94 style='border-left:none;width:71pt'></td>
  <td class=xl12110918 width=75 style='border-left:none;width:56pt'></td>
  <td class=xl9210918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl9210918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl9210918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl9210918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td class=xl9410918 width=37 style='width:28pt'>&nbsp;</td>
  <td class=xl8510918 width=185 style='width:139pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=98 style='width:74pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl8510918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl8510918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td height=22 class=xl8510918 width=36 style='height:16.5pt;width:27pt'>&nbsp;</td>
  <td colspan=9 class=xl22410918 width=770 style='width:577pt'>IV. JUMLAH <font
  class="font1110918">UNIT</font><font class="font1010918"> SEPEDAMOTOR YANG
  DIKERJAKAN</font></td>
  <td class=xl12210918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl12210918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl12210918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl12210918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl12210918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl12210918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl12210918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl8510918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td height=22 class=xl8510918 width=36 style='height:16.5pt;width:27pt'>&nbsp;</td>
  <td rowspan=3 class=xl7810918 width=37 style='border-bottom:1.0pt solid black;
  border-top:none;width:28pt'>No.</td>
  <td rowspan=3 class=xl7610918 width=185 style='border-bottom:1.0pt solid black;
  border-top:none;width:139pt'>Type</td>
  <td rowspan=3 class=xl8310918 width=75 style='border-bottom:1.0pt solid black;
  border-top:none;width:56pt'>Total Unit Entry</td>
  <td colspan=13 class=xl12310918 width=1033 style='border-right:1.0pt solid black;
  border-left:none;width:775pt'>YANG DIKERJAKAN DARI UNIT INI</td>
  <td rowspan=3 class=xl7010918 width=73 style='border-bottom:1.0pt solid black;
  width:55pt'>Jumlah Unit PIT Express</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td height=22 class=xl8510918 width=36 style='height:16.5pt;width:27pt'>&nbsp;</td>
  <td colspan=5 class=xl12610918 width=398 style='border-right:1.0pt solid black;
  border-left:none;width:298pt'>Kartu Perawatan Berkala / ASS</td>
  <td rowspan=2 class=xl8110918 width=75 style='border-bottom:1.0pt solid black;
  border-top:none;width:56pt'>CLAIM C2</td>
  <td colspan=3 class=xl12910918 width=247 style='border-right:1.0pt solid black;
  border-left:none;width:186pt'>Quick Service (QS)</td>
  <td rowspan=2 class=xl8110918 width=75 style='border-bottom:1.0pt solid black;
  border-top:none;width:56pt'>LR</td>
  <td rowspan=2 class=xl8110918 width=94 style='border-bottom:1.0pt solid black;
  border-top:none;width:71pt'>HR</td>
  <td rowspan=2 class=xl8110918 width=87 style='border-bottom:1.0pt solid black;
  border-top:none;width:65pt'>TOTAL</td>
  <td rowspan=2 class=xl13010918 width=57 style='border-bottom:1.0pt solid black;
  border-top:none;width:43pt'>JR</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td height=22 class=xl9210918 width=36 style='height:16.5pt;width:27pt'>&nbsp;</td>
  <td class=xl6710918 width=98 style='border-left:none;width:74pt'>1</td>
  <td class=xl13110918 width=75 style='width:56pt'>2</td>
  <td class=xl13110918 width=75 style='border-left:none;width:56pt'>3</td>
  <td class=xl13210918 width=75 style='border-left:none;width:56pt'>4</td>
  <td class=xl13310918 width=75 style='width:56pt'>5 - 10</td>
  <td class=xl13410918 width=75 style='border-left:none;width:56pt'>CS</td>
  <td class=xl13110918 width=78 style='border-left:none;width:59pt'>LS</td>
  <td class=xl6810918 width=94 style='border-left:none;width:71pt'>OR +</td>
  <td class=xl9210918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 
 <?php
	$i=1;
	if($datashow_unit !=0){
	foreach ($datashow_unit as $value) {
	extract($value);
	$vehiclemodel = split(",",$value["vehiclemodel"]);
	$qtyentry = split(",",$value["qtyentry"]);
	$qtykpb1 = split(",",$value["qtykpb1"]);
	$qtykpb2 = split(",",$value["qtykpb2"]);
	$qtykpb3 = split(",",$value["qtykpb3"]);
	$qtykpb4 = split(",",$value["qtykpb4"]);
	$qtyc2 = split(",",$value["qtyc2"]);
	$qtycs = split(",",$value["qtycs"]);
	$qtyls = split(",",$value["qtyls"]);
	$qtyqrplus = split(",",$value["qtyqrplus"]);
	$qtylr = split(",",$value["qtylr"]);
	$qtyhr = split(",",$value["qtyhr"]);
	$totalqty = split(",",$value["totalqty"]);
	
	$counti = count($vehiclemodel);
 ?>  
  
 <tr height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl8510918 width=36 style='height:21.0pt;width:27pt'>&nbsp;</td>
  <td colspan=2 class=xl15110918 width=222 style='border-right:1.0pt solid black;
  width:167pt'>TOTAL<span style='mso-spacerun:yes'>  </span><?php echo $vahiclejenis; ?></td>
  <td class=xl15310918 width=75 style='border-left:none;width:56pt'><?php echo $sumqtyentry; ?></td>
  <td class=xl15410918 width=98 style='border-left:none;width:74pt'><?php echo $sumqtykpb1; ?></td>
  <td class=xl15510918 width=75 style='width:56pt'><?php echo $sumqtykpb2; ?></td>
  <td class=xl15510918 width=75 style='border-left:none;width:56pt'><?php echo $sumqtykpb3; ?></td>
  <td class=xl15610918 width=75 style='border-left:none;width:56pt'><?php echo $sumqtykpb4; ?></td>
  <td class=xl15710918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl15810918 width=75 style='width:56pt'><?php echo $sumqtyc2; ?></td>
  <td class=xl15910918 width=75 style='width:56pt'><?php echo $sumqtycs; ?></td>
  <td class=xl15510918 width=78 style='border-left:none;width:59pt'><?php echo $sumqtyls; ?></td>
  <td class=xl15710918 width=94 style='border-left:none;width:71pt'><?php echo $sumqtyqrplus; ?></td>
  <td class=xl15810918 width=75 style='width:56pt'><?php echo $sumqtylr; ?></td>
  <td class=xl16010918 width=94 style='width:71pt'><?php echo $sumqtyhr; ?></td>
  <td class=xl15810918 width=87 style='width:65pt'><?php echo $sumtotalqty; ?></td>
  <td class=xl16010918 width=57 style='width:43pt'></td>
  <td class=xl16110918 width=73 style='width:55pt'> </td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 
 <?php 
   error_reporting(0);
	$c=count($vehiclemodel);
	for($rs=0;$rs<=$c-1;$rs++) {
	$vehiclemodelshow = $vehiclemodel[$rs];
	$qtyentryshow = $qtyentry[$rs];
	$qtykpb1show = $qtykpb1[$rs];
	$qtykpb2show = $qtykpb2[$rs];
	$qtykpb3show = $qtykpb3[$rs];
	$qtykpb4show = $qtykpb4[$rs];
	$qtyc2show = $qtyc2[$rs];
	$qtycsshow = $qtycs[$rs];
	$qtylsshow = $qtyls[$rs];
	$qtyqrplusshow = $qtyqrplus[$rs];
	$qtylrshow = $qtylr[$rs];
	$qtyhrshow = $qtyhr[$rs];
	$totalqtyshow = $totalqty[$rs];
  ?>
 
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl8510918 width=36 style='height:18.0pt;width:27pt'>&nbsp;</td>
  <td class=xl13610918 width=37 style='width:28pt'><?php echo $rs+1; ?></td>
  <td class=xl13710918 width=185 style='width:139pt'><?php echo $vehiclemodelshow; ?></td>
  <td class=xl13810918 width=75 style='border-left:none;width:56pt'><?php echo $qtyentryshow; ?></td>
  <td class=xl13910918 width=98 style='border-top:none;border-left:none;
  width:74pt'><?php echo $qtykpb1show; ?>&nbsp;</td>
  <td class=xl14010918 width=75 style='border-top:none;width:56pt'><?php echo $qtykpb2show; ?>&nbsp;</td>
  <td class=xl14110918 width=75 style='border-top:none;width:56pt'><?php echo $qtykpb3show; ?>&nbsp;</td>
  <td class=xl14210918 width=75 style='border-top:none;width:56pt'><?php echo $qtykpb4show; ?>&nbsp;</td>
  <td class=xl14310918 width=75 style='border-top:none;width:56pt'>&nbsp;</td>
  <td class=xl14410918 width=75 style='width:56pt'><?php echo $qtyc2show; ?></td>
  <td class=xl14510918 width=75 style='width:56pt'><?php echo $qtycsshow; ?></td>
  <td class=xl14610918 width=78 style='border-left:none;width:59pt'><?php echo $qtylsshow; ?></td>
  <td class=xl14710918 width=94 style='border-left:none;width:71pt'><?php echo $qtyqrplusshow; ?></td>
  <td class=xl14410918 width=75 style='width:56pt'><?php echo $qtylrshow; ?></td>
  <td class=xl14810918 width=94 style='width:71pt'><?php echo $qtyhrshow; ?>&nbsp;</td>
  <td class=xl14410918 width=87 style='width:65pt'><?php echo $totalqtyshow; ?></td>
  <td class=xl14910918 width=57 style='border-top:none;width:43pt'>&nbsp;</td>
  <td class=xl15010918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'>Cub Low</td>
 </tr>
 
 
 

 
 <?php
		  
		}
	$i++;
		}
		}else{
			$core->pesan_warning("Tidak ada data yang ditampilkan");
		}
?> 
 
    <?php
	$i=1;
	if($datashow_totalunit !=0){
	foreach ($datashow_totalunit as $value) {
	extract($value);
	?> 
 <tr height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl8510918 width=36 style='height:21.0pt;width:27pt'>&nbsp;</td>
  <td colspan=2 class=xl16210918 width=222 style='border-right:1.0pt solid black;
  width:167pt'>TOTAL CUB+MATIC+SPORT</td>
  <td class=xl16410918 width=75 style='border-top:none;border-left:none;
  width:56pt'><?php echo $tsumqtyentry; ?></td>
  <td class=xl16510918 width=98 style='border-left:none;width:74pt'><?php echo $tsumqtykpb1; ?></td>
  <td class=xl16610918 width=75 style='width:56pt'><?php echo $tsumqtykpb2; ?></td>
  <td class=xl16610918 width=75 style='border-left:none;width:56pt'><?php echo $tsumqtykpb3; ?></td>
  <td class=xl16710918 width=75 style='border-left:none;width:56pt'><?php echo $tsumqtykpb4; ?></td>
  <td class=xl16810918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl16910918 width=75 style='width:56pt'><?php echo $tsumqtyc2; ?></td>
  <td class=xl17010918 width=75 style='width:56pt'><?php echo $tsumqtycs; ?></td>
  <td class=xl16610918 width=78 style='border-left:none;width:59pt'><?php echo $tsumqtyls; ?></td>
  <td class=xl16810918 width=94 style='border-left:none;width:71pt'><?php echo $tsumqtyqrplus; ?></td>
  <td class=xl16910918 width=75 style='width:56pt'><?php echo $tsumqtylr; ?></td>
  <td class=xl17110918 width=94 style='width:71pt'><?php echo $tsumqtyhr; ?></td>
  <td class=xl16910918 width=87 style='width:65pt'><?php echo $tsumtotalqty; ?></td>
  <td class=xl17110918 width=57 style='width:43pt'></td>
  <td class=xl17210918 width=73 style='width:55pt'></td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
  <?php
	$i++;
		}
		} else{
			$core->pesan_warning("Data is empty");
		}
    ?> 
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td class=xl9210918 width=37 style='width:28pt'>&nbsp;</td>
  <td class=xl9210918 width=185 style='width:139pt'>&nbsp;</td>
  <td class=xl9410918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl9210918 width=98 style='width:74pt'>&nbsp;</td>
  <td class=xl9210918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl9210918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl9210918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl9210918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl9210918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl9210918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl9210918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl9210918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl9210918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl9210918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl9210918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl9210918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl9210918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td colspan=9 class=xl9410918 width=770 style='width:577pt'>V. JUMLAH <font
  class="font1110918">UNIT</font><font class="font1010918"> SEPEDAMOTOR YANG
  DIKERJAKAN BERDASARKAN TAHUN PRODUKSI</font></td>
  <td class=xl9210918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl9210918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl9210918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl9210918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl9210918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl9210918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl9210918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl9210918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td class=xl8910918 width=37 style='width:28pt'></td>
   
  <td class=xl17310918 width=185 style='width:139pt'>Tahun Kendaraan</td>
  <?php
	$i=1;
	if($datashow_totalyear !=0){
	foreach ($datashow_totalyear as $value) {
	extract($value);
	?> 
  <td class=xl17410918 width=75 style='width:56pt'><?php echo $year; ?></td>
   <?php
	$i++;
		}
		} else{
			$core->pesan_warning("Data is empty");
		}
    ?> 
  <td class=xl14410918 width=94 style='width:71pt'></td>
  
  <td class=xl14410918 width=75 style='width:56pt'></td>
  <td class=xl9210918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl9210918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl9210918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl9210918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
 </tr>
 
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td class=xl9210918 width=37 style='width:28pt'>&nbsp;</td>
  <td class=xl17610918 width=185 style='border-top:none;width:139pt'>Jumlah
  Unit</td>
  <?php
	$i=1;
	if($datashow_totalyear !=0){
	foreach ($datashow_totalyear as $value) {
	extract($value);
	?> 
  <td class=xl17710918 width=75 style='border-top:none;width:56pt'><?php echo $qtyyear; ?></td>
   <?php
	$i++;
		}
		} else{
			$core->pesan_warning("Data is empty");
		}
    ?> 


 
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td class=xl9210918 width=37 style='width:28pt'>&nbsp;</td>
  <td class=xl9210918 width=185 style='width:139pt'>&nbsp;</td>
  <td class=xl9410918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl9210918 width=98 style='width:74pt'>&nbsp;</td>
  <td class=xl9210918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl9210918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl9210918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl9210918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl9210918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl9210918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl9210918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl9210918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl9210918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl9210918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl9210918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl9210918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl9210918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td colspan=8 class=xl22510918 width=695 style='width:521pt'>Keterangan
  :<span style='mso-spacerun:yes'>  </span>BODY REPAIR (PRES &amp; PENGECATAN)
  MASUKAN KEDALAM &quot;HR&quot;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl8510918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl8510918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td class=xl17910918 width=37 style='width:28pt'>&nbsp;</td>
  <td class=xl8510918 width=185 style='width:139pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=98 style='width:74pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl8510918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl8510918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td class=xl17910918 width=37 style='width:28pt'>&nbsp;</td>
  <td class=xl8510918 width=185 style='width:139pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=98 style='width:74pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl8510918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl8510918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl8510918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr class=xl17910918 height=17 style='height:12.75pt'>
  <td colspan=3 height=17 class=xl18010918 width=258 style='height:12.75pt;
  width:194pt'>Dibuat,</td>
  <td class=xl18010918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=98 style='width:74pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td colspan=3 class=xl18010918 width=225 style='width:168pt'>Diperiksa,</td>
  <td class=xl18010918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl17910918 width=94 style='width:71pt'>&nbsp;</td>
  <td colspan=3 class=xl18010918 width=256 style='width:192pt'>Mengetahui,</td>
  <td class=xl17910918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl17910918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl17910918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl18210918 width=80 style='width:60pt'>&nbsp;</td>
 </tr>
 <tr class=xl17910918 height=17 style='height:12.75pt'>
  <td height=17 class=xl17910918 width=36 style='height:12.75pt;width:27pt'>&nbsp;</td>
  <td class=xl18010918 width=37 style='width:28pt'>&nbsp;</td>
  <td class=xl17910918 width=185 style='width:139pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=98 style='width:74pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl17910918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl17910918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl17910918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl17910918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl17910918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl18210918 width=80 style='width:60pt'>&nbsp;</td>
 </tr>
 <tr class=xl17910918 height=17 style='height:12.75pt'>
  <td colspan=3 height=17 class=xl18010918 width=258 style='height:12.75pt;
  width:194pt'>&nbsp;</td>
  <td class=xl18010918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=98 style='width:74pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl18010918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl18010918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl17910918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl17910918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl17910918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl17910918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl17910918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl18210918 width=80 style='width:60pt'>&nbsp;</td>
 </tr>
 <tr class=xl17910918 height=18 style='height:13.5pt'>
  <td height=18 class=xl17910918 width=36 style='height:13.5pt;width:27pt'>&nbsp;</td>
  <td class=xl18310918 width=37 style='width:28pt'>&nbsp;</td>
  <td class=xl18410918 width=185 style='width:139pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=98 style='width:74pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl18410918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl18310918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl18310918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl18010918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl17910918 width=94 style='width:71pt'>&nbsp;</td>
  <td colspan=3 class=xl18310918 width=256 style='width:192pt'>&nbsp;</td>
  <td class=xl18010918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl18010918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl17910918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl18210918 width=80 style='width:60pt'>&nbsp;</td>
 </tr>
 <tr class=xl17910918 height=17 style='height:12.75pt'>
  <td colspan=3 height=17 class=xl18010918 width=258 style='height:12.75pt;
  width:194pt'>Front desk</td>
  <td class=xl18010918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=98 style='width:74pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=75 style='width:56pt'>&nbsp;</td>
  <td colspan=3 class=xl18510918 width=225 style='width:168pt'>Kepala Bengkel</td>
  <td class=xl18010918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl17910918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl17910918 width=94 style='width:71pt'>&nbsp;</td>
  <td colspan=3 class=xl18510918 width=256 style='width:192pt'>Pemilik /
  Pimpinan</td>
  <td class=xl18010918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl18010918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl17910918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl18210918 width=80 style='width:60pt'>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl8510918 width=36 style='height:15.0pt;width:27pt'>&nbsp;</td>
  <td class=xl9210918 width=37 style='width:28pt'>&nbsp;</td>
  <td class=xl8510918 width=185 style='width:139pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=98 style='width:74pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl8510918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl18610918 width=73 style='width:55pt'>TPR</td>
  <td class=xl18610918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td height=17 class=xl8510918 width=36 style='height:12.75pt;width:27pt'>&nbsp;</td>
  <td class=xl9210918 width=37 style='width:28pt'>&nbsp;</td>
  <td class=xl8510918 width=185 style='width:139pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=98 style='width:74pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=78 style='width:59pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=75 style='width:56pt'>&nbsp;</td>
  <td class=xl8510918 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl8510918 width=87 style='width:65pt'>&nbsp;</td>
  <td class=xl18710918 width=57 style='width:43pt'>&nbsp;</td>
  <td class=xl18710918 width=73 style='width:55pt'>&nbsp;</td>
  <td class=xl18710918 width=12 style='width:9pt'>&nbsp;</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <tr height=17 style='height:12.75pt'>
  <td colspan=19 height=17 class=xl18810918 width=1451 style='height:12.75pt;
  width:1089pt'>Laporan ini selambat-lambatnya sudah harus diterima oleh PT.
  DAM pada tanggal 3 setiap bulannya</td>
  <td class=xl8810918 width=80 style='width:60pt'></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=36 style='width:27pt'></td>
  <td width=37 style='width:28pt'></td>
  <td width=185 style='width:139pt'></td>
  <td width=75 style='width:56pt'></td>
  <td width=98 style='width:74pt'></td>
  <td width=75 style='width:56pt'></td>
  <td width=75 style='width:56pt'></td>
  <td width=75 style='width:56pt'></td>
  <td width=75 style='width:56pt'></td>
  <td width=75 style='width:56pt'></td>
  <td width=75 style='width:56pt'></td>
  <td width=78 style='width:59pt'></td>
  <td width=94 style='width:71pt'></td>
  <td width=75 style='width:56pt'></td>
  <td width=94 style='width:71pt'></td>
  <td width=87 style='width:65pt'></td>
  <td width=57 style='width:43pt'></td>
  <td width=73 style='width:55pt'></td>
  <td width=12 style='width:9pt'></td>
  <td width=80 style='width:60pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>



