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
<link rel=File-List href="LBB%20Walk%20In_files/filelist.xml">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<style id="LBB Walk In_13891_Styles"><!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.font513891
	{color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;}
.font613891
	{color:black;
	font-size:10.0pt;
	font-weight:700;
	font-style:italic;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;}
.xl1513891
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
.xl6313891
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
	mso-pattern:black none;
	white-space:normal;}
.xl6413891
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
	mso-pattern:black none;
	white-space:normal;}
.xl6513891
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
	mso-pattern:black none;
	white-space:normal;}
.xl6613891
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
	mso-pattern:black none;
	white-space:normal;}
.xl6713891
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
.xl6813891
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
	mso-pattern:black none;
	white-space:normal;}
.xl6913891
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
.xl7013891
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
.xl7113891
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
	mso-pattern:black none;
	white-space:normal;}
.xl7213891
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
	mso-pattern:black none;
	white-space:normal;}
.xl7313891
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
	mso-pattern:black none;
	white-space:normal;}
.xl7413891
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
	mso-pattern:black none;
	white-space:normal;}
.xl7513891
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
	mso-pattern:black none;
	white-space:normal;}
.xl7613891
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
.xl7713891
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
	mso-pattern:black none;
	white-space:normal;}
.xl7813891
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
	mso-pattern:black none;
	white-space:normal;}
.xl7913891
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
	mso-pattern:black none;
	white-space:normal;}
.xl8013891
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
	mso-pattern:black none;
	white-space:normal;}
.xl8113891
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
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:black;
	mso-pattern:black none;
	white-space:normal;}
.xl8213891
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
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid white;
	background:black;
	mso-pattern:black none;
	white-space:normal;}
.xl8313891
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
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid black;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:black;
	mso-pattern:black none;
	white-space:normal;}
.xl8413891
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
.xl8513891
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
.xl8613891
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
	mso-pattern:black none;
	white-space:normal;}
.xl8713891
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
	mso-pattern:black none;
	white-space:normal;}
.xl8813891
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
	mso-pattern:black none;
	white-space:normal;}
.xl8913891
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
.xl9013891
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
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9113891
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
	background:#D9D9D9;
	mso-pattern:black none;
	white-space:normal;}
.xl9213891
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
	text-align:center;
	vertical-align:middle;
	border:1.0pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl9313891
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
	border:1.0pt solid black;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl9413891
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
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl9513891
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
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl9613891
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
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid black;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl9713891
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
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid black;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl9813891
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
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl9913891
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl10013891
	{padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:9.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:right;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl10113891
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
	text-align:center;
	vertical-align:middle;
	border:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl10213891
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
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl10313891
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
	text-align:general;
	vertical-align:middle;
	border:1.0pt solid windowtext;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl10413891
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
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl10513891
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
.xl10613891
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
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	background:black;
	mso-pattern:black none;
	white-space:normal;}
.xl10713891
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
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:#D9D9D9;
	mso-pattern:black none;
	white-space:normal;}
.xl10813891
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
	border-bottom:none;
	border-left:none;
	background:#D9D9D9;
	mso-pattern:black none;
	white-space:normal;}
.xl10913891
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
	border:1.0pt solid windowtext;
	background:#D9D9D9;
	mso-pattern:black none;
	white-space:normal;}
.xl11013891
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
	border:1.0pt solid black;
	background:#D9D9D9;
	mso-pattern:black none;
	white-space:normal;}
.xl11113891
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
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:1.0pt solid black;
	background:#D9D9D9;
	mso-pattern:black none;
	white-space:normal;}
.xl11213891
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
	text-align:general;
	vertical-align:middle;
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:1.0pt solid black;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl11313891
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
	border-top:1.0pt solid black;
	border-right:none;
	border-bottom:1.0pt solid black;
	border-left:1.0pt solid black;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl11413891
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
	text-align:center;
	vertical-align:middle;
	border:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl11513891
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

<div id="LBB Walk In_13891" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=1150 style='border-collapse:
 collapse;table-layout:fixed;width:863pt'>
 <col width=39 style='mso-width-source:userset;mso-width-alt:1426;width:29pt'>
 <col width=232 style='mso-width-source:userset;mso-width-alt:8484;width:174pt'>
 <col width=50 style='mso-width-source:userset;mso-width-alt:1828;width:38pt'>
 <col width=64 span=3 style='width:48pt'>
 <col width=79 style='mso-width-source:userset;mso-width-alt:2889;width:59pt'>
 <col width=86 style='mso-width-source:userset;mso-width-alt:3145;width:65pt'>
 <col width=64 style='width:48pt'>
 <col width=60 style='mso-width-source:userset;mso-width-alt:2194;width:45pt'>
 <col width=64 style='width:48pt'>
 <col width=64 span=2 style='width:48pt'>
 <col width=92 style='mso-width-source:userset;mso-width-alt:3364;width:69pt'>
 <col width=64 style='width:48pt'>
 <tr height=11 style='mso-height-source:userset;height:8.25pt'>
  <td height=11 class=xl6413891 width=39 style='height:8.25pt;width:29pt'>&nbsp;</td>
  <td class=xl6513891 width=232 style='width:174pt'>&nbsp;</td>
  <td class=xl6513891 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl6513891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6513891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6513891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6513891 width=79 style='width:59pt'>&nbsp;</td>
  <td class=xl6513891 width=86 style='width:65pt'>&nbsp;</td>
  <td class=xl6513891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6513891 width=60 style='width:45pt'>&nbsp;</td>
  <td class=xl6513891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6513891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6513891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6513891 width=92 style='width:69pt'>&nbsp;</td>
  <td class=xl1513891 width=64 style='width:48pt'></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.75pt'>
  <td colspan=14 height=21 class=xl7513891 width=1086 style='height:15.75pt;
  width:815pt'>LAPORAN BULANAN BENGKEL</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.75pt'>
  <td colspan=14 height=21 class=xl6413891 width=1086 style='height:15.75pt;
  width:815pt'>( L.B.B WALK IN)</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6613891 width=39 style='height:15.0pt;width:29pt'>&nbsp;</td>
  <td class=xl6713891 width=232 style='width:174pt'></td>
  <td class=xl6713891 width=50 style='width:38pt'></td>
  <td class=xl6713891 width=64 style='width:48pt'></td>
  <td class=xl6713891 width=64 style='width:48pt'></td>
  <td class=xl6713891 width=64 style='width:48pt'></td>
  <td class=xl6713891 width=79 style='width:59pt'></td>
  <td class=xl6713891 width=86 style='width:65pt'></td>
  <td class=xl6713891 width=64 style='width:48pt'></td>
  <td class=xl6713891 width=60 style='width:45pt'></td>
  <td class=xl6713891 width=64 style='width:48pt'></td>
  <td class=xl6713891 width=64 style='width:48pt'></td>
  <td class=xl6713891 width=64 style='width:48pt'></td>
  <td class=xl6713891 width=92 style='width:69pt'></td>
  <td class=xl1513891></td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td colspan=2 height=19 class=xl6813891 width=271 style='height:14.25pt;
  width:203pt'>Nomor AHASS</td>
  <td colspan=3 class=xl7613891 width=178 style='width:134pt'>13071</td>
  <td class=xl6713891 width=64 style='width:48pt'></td>
  <td class=xl6713891 width=79 style='width:59pt'></td>
  <td class=xl6913891 width=86 style='width:65pt'></td>
  <td colspan=2 class=xl6813891 width=124 style='width:93pt'>Laporan Bulan</td>
  <td colspan=3 class=xl7613891 width=192 style='width:144pt'><?php echo $rptdatefrom; ?> s/d <?php echo $rptdateto; ?></td>
  <td class=xl1513891></td>
  <td class=xl1513891></td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td colspan=2 height=19 class=xl6813891 width=271 style='height:14.25pt;
  width:203pt'>Nama AHASS</td>
  <td colspan=3 class=xl7613891 width=178 style='width:134pt'>MITRA UTAMA</td>
  <td class=xl6713891 width=64 style='width:48pt'></td>
  <td class=xl6713891 width=79 style='width:59pt'></td>
  <td class=xl6913891 width=86 style='width:65pt'></td>
  <td colspan=2 class=xl11513891 width=124 style='width:93pt'>Web</td>
  <td colspan=4 class=xl9013891 width=284 style='width:213pt'>www.mitrautamacirebon.blogspot.co.id</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td colspan=2 height=19 class=xl6813891 width=271 style='height:14.25pt;
  width:203pt'>Status</td>
  <td colspan=3 class=xl7613891 width=178 style='width:134pt'>H123</td>
  <td class=xl6713891 width=64 style='width:48pt'></td>
  <td class=xl6713891 width=79 style='width:59pt'></td>
  <td class=xl6913891 width=86 style='width:65pt'></td>
  <td colspan=2 class=xl11513891 width=124 style='width:93pt'>Twitter</td>
  <td class=xl6913891 width=64 style='width:48pt'>-</td>
  <td class=xl6713891 width=64 style='width:48pt'></td>
  <td class=xl6713891 width=64 style='width:48pt'></td>
  <td class=xl6713891 width=92 style='width:69pt'></td>
  <td class=xl1513891></td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td colspan=2 height=19 class=xl6813891 width=271 style='height:14.25pt;
  width:203pt'>Kota</td>
  <td colspan=3 class=xl7613891 width=178 style='width:134pt'>KUNINGAN</td>
  <td class=xl6913891 width=64 style='width:48pt'></td>
  <td class=xl6913891 width=79 style='width:59pt'></td>
  <td class=xl6713891 width=86 style='width:65pt'></td>
  <td colspan=2 class=xl11513891 width=124 style='width:93pt'>Facebook</td>
  <td colspan=4 class=xl6713891 width=284 style='width:213pt'>AHASS MITRA UTAMA</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td colspan=2 height=19 class=xl6813891 width=271 style='height:14.25pt;
  width:203pt'>Jumlah PIT AHASS</td>
  <td colspan=3 class=xl7613891 width=178 style='width:134pt'>8</td>
  <td class=xl6913891 width=64 style='width:48pt'></td>
  <td class=xl6913891 width=79 style='width:59pt'></td>
  <td class=xl6713891 width=86 style='width:65pt'></td>
  <td colspan=2 class=xl6713891 width=124 style='width:93pt'>Instagram</td>
  <td colspan=4 class=xl6713891 width=284 style='width:213pt'>AHASS MITRA UTAMA</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl6613891 width=39 style='height:12.0pt;width:29pt'>&nbsp;</td>
  <td class=xl6313891 width=232 style='width:174pt'>&nbsp;</td>
  <td class=xl6313891 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=79 style='width:59pt'>&nbsp;</td>
  <td class=xl6313891 width=86 style='width:65pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=60 style='width:45pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=92 style='width:69pt'>&nbsp;</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td colspan=6 height=21 class=xl7713891 width=513 style='height:15.75pt;
  width:385pt'>I. LAPORAN PENDAPATAN BENGKEL</td>
  <td class=xl6313891 width=79 style='width:59pt'>&nbsp;</td>
  <td class=xl6313891 width=86 style='width:65pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=60 style='width:45pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=92 style='width:69pt'>&nbsp;</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.75pt'>
  <td colspan=6 height=21 class=xl10713891 width=513 style='height:15.75pt;
  width:385pt'>&nbsp;1. Pendapatan jasa dan reparasi</td>
  <td colspan=8 class=xl10913891 width=573 style='width:430pt'>&nbsp;2.
  Pendapatan penjualan Parts</td>
  <td rowspan=2 height=46 class=xl1513891 width=64 style='mso-ignore:colspan-rowspan;
  height:34.5pt;width:48pt'><!--[if gte vml 1]><v:shapetype id="_x0000_t75"
   coordsize="21600,21600" o:spt="75" o:preferrelative="t" path="m@4@5l@4@11@9@11@9@5xe"
   filled="f" stroked="f">
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
  </v:shapetype><v:shape id="AutoShape_x0020_1" o:spid="_x0000_s1030" type="#_x0000_t75"
   alt="http://localhost/pointsisdealer/LBB%20WALK%20IN_files/LBB%20WALK%20IN_10918_image002.png"
   style='position:absolute;margin-left:0;margin-top:0;width:45.75pt;height:30pt;
   z-index:1;visibility:visible;mso-wrap-style:square;v-text-anchor:top'
   o:gfxdata="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
AAQA9QAAACIGAAAAAA==
" o:insetmode="auto">
   <v:imagedata src="LBB%20Walk%20In_files/LBB%20Walk%20In_13891_image001.png"
    o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td width=0 height=0></td>
   </tr>
   <tr>
    <td></td>
    <td></td>
    <td width=3></td>
   </tr>
   <tr>
    <td height=6></td>
   </tr>
  </table>
  </span><![endif]><!--[if !mso & vml]><span style='width:48.0pt;height:34.5pt'></span><![endif]--></td>
 </tr>
   <?php
	$i=1;
	if($datashow_pjr !=0){
	foreach ($datashow_pjr as $value) {
	extract($value);
	?> 
 <tr height=25 style='mso-height-source:userset;height:18.75pt'>
  <td colspan=3 height=25 class=xl9413891 width=321 style='border-right:.5pt solid black;
  height:18.75pt;width:241pt'>&nbsp;<?php echo $i; ?>. &nbsp;<?php echo $vehliceservicetype_pjr; ?></td>
  <td colspan=3 class=xl9713891 width=192 style='border-left:none;width:144pt'><?php echo number_format($subtotal__pjr); ?>&nbsp;</td>
  <td colspan=2 class=xl9413891 width=165 style='border-right:1.0pt solid black;
  width:124pt'>&nbsp;<?php echo $inventorygroupname_ppp; ?></td>
  <td colspan=2 class=xl9913891 width=124 style='border-right:1.0pt solid black;
  border-left:none;width:93pt'>&nbsp;<?php echo number_format($amount_ppp); ?>&nbsp;</td>
  <td colspan=3 class=xl9413891 width=192 style='border-right:1.0pt solid black;
  border-left:none;width:144pt'>&nbsp;<?php echo $inventorygroupname_ppp2; ?></td>
  <td class=xl10313891 align=right width=92 style='border-top:none;border-left:
  none;width:69pt'><?php echo number_format($amount_ppp2); ?>&nbsp;</td>
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
 <tr height=21 style='mso-height-source:userset;height:15.75pt'>
  <td colspan=3 height=21 class=xl7813891 width=321 style='border-right:.5pt solid white;
  height:15.75pt;width:241pt'>Total Pendapatan Jasa</td>
  <td colspan=3 class=xl8213891 width=192 style='border-right:1.0pt solid black;
  border-left:none;width:144pt'><?php echo number_format($tsubtotal__pjr); ?>&nbsp;&nbsp;</td>
  <td class=xl7013891 width=79 style='border-top:none;width:59pt'>&nbsp;</td>
  <td colspan=6 class=xl7813891 width=402 style='width:302pt'>Total Pendapatan
  Spare Part</td>
  <td class=xl10613891 align=right width=92 style='border-top:none;width:69pt'><?php echo number_format($tamount_ppp); ?>&nbsp;</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl6913891 width=39 style='height:18.0pt;width:29pt'></td>
  <td class=xl6913891 width=232 style='width:174pt'></td>
  <td class=xl6913891 width=50 style='width:38pt'></td>
  <td class=xl6913891 width=64 style='width:48pt'></td>
  <td class=xl6913891 width=64 style='width:48pt'></td>
  <td class=xl6913891 width=64 style='width:48pt'></td>
  <td class=xl6913891 width=79 style='width:59pt'></td>
  <td colspan=6 class=xl8413891 width=402 style='border-right:1.0pt solid black;
  width:302pt'>TOTAL PENGHASILAN BENGKEL</td>
  <td class=xl10413891 align=right width=92 style='border-top:none;width:69pt'><?php echo number_format($tpjrppp); ?>&nbsp; </td>
  <td class=xl1513891></td>
 </tr>
 <?php
	$i++;
		}
		} else{
			$core->pesan_warning("Data is empty");
		}
    ?> 
 <tr height=17 style='mso-height-source:userset;height:12.75pt'>
  <td height=17 class=xl6813891 width=39 style='height:12.75pt;width:29pt'>&nbsp;</td>
  <td class=xl6313891 width=232 style='width:174pt'>&nbsp;</td>
  <td class=xl6313891 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=79 style='width:59pt'>&nbsp;</td>
  <td class=xl6313891 width=86 style='width:65pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=60 style='width:45pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=92 style='width:69pt'>&nbsp;</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td colspan=8 height=21 class=xl6813891 width=678 style='height:15.75pt;
  width:509pt'>IV. JUMLAH&nbsp;<font class="font613891">UNIT</font><font
  class="font513891">&nbsp;SEPEDAMOTOR YANG DIKERJAKAN</font></td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=60 style='width:45pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=92 style='width:69pt'>&nbsp;</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td rowspan=3 height=64 class=xl9113891 width=39 style='height:48.0pt;
  width:29pt'>No.</td>
  <td rowspan=3 class=xl9113891 width=232 style='width:174pt'>Type</td>
  <td rowspan=3 class=xl9113891 width=50 style='width:38pt'>Total Unit Entry</td>
  <td colspan=11 class=xl9113891 width=765 style='border-left:none;width:574pt'>YANG
  DIKERJAKAN DARI UNIT INI</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td colspan=4 height=21 class=xl9113891 width=271 style='height:15.75pt;
  border-left:none;width:203pt'>Kartu Perawatan Berkala / ASS</td>
  <td rowspan=2 class=xl9113891 width=86 style='border-top:none;width:65pt'>CLAIM
  C2</td>
  <td colspan=3 class=xl9113891 width=188 style='border-left:none;width:141pt'>Quick
  Service (QS)</td>
  <td rowspan=2 class=xl9113891 width=64 style='border-top:none;width:48pt'>LR</td>
  <td rowspan=2 class=xl9113891 width=64 style='border-top:none;width:48pt'>HR</td>
  <td rowspan=2 class=xl9113891 width=92 style='border-top:none;width:69pt'>TOTAL</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl8613891 width=64 style='height:15.75pt;border-top:none;
  border-left:none;width:48pt'>1</td>
  <td class=xl8613891 width=64 style='border-top:none;border-left:none;
  width:48pt'>2</td>
  <td class=xl8613891 width=64 style='border-top:none;border-left:none;
  width:48pt'>3</td>
  <td class=xl8613891 width=79 style='border-top:none;border-left:none;
  width:59pt'>4</td>
  <td class=xl8613891 width=64 style='border-top:none;border-left:none;
  width:48pt'>CS</td>
  <td class=xl8613891 width=60 style='border-top:none;border-left:none;
  width:45pt'>LS</td>
  <td class=xl8613891 width=64 style='border-top:none;border-left:none;
  width:48pt'>OR +</td>
  <td class=xl1513891></td>
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
 <tr height=21 style='height:15.75pt'>
  <td colspan=2 height=21 class=xl11013891 width=271 style='height:15.75pt;
  width:203pt'>TOTAL&nbsp;&nbsp;<?php echo $vahiclejenis; ?></td>
  <td class=xl10113891 width=50 style='width:38pt'><?php echo $sumqtyentry; ?></td>
  <td class=xl10113891 width=64 style='border-left:none;width:48pt'><?php echo $sumqtykpb1; ?></td>
  <td class=xl10113891 width=64 style='border-left:none;width:48pt'><?php echo $sumqtykpb2; ?></td>
  <td class=xl10113891 width=64 style='border-left:none;width:48pt'><?php echo $sumqtykpb3; ?></td>
  <td class=xl10113891 width=79 style='border-left:none;width:59pt'><?php echo $sumqtykpb4; ?></td>
  <td class=xl10113891 width=86 style='border-left:none;width:65pt'><?php echo $sumqtyc2; ?></td>
  <td class=xl10113891 width=64 style='border-left:none;width:48pt'><?php echo $sumqtycs; ?></td>
  <td class=xl10113891 width=60 style='border-left:none;width:45pt'><?php echo $sumqtyls; ?></td>
  <td class=xl10113891 width=64 style='border-left:none;width:48pt'><?php echo $sumqtyqrplus; ?></td>
  <td class=xl10113891 width=64 style='border-left:none;width:48pt'><?php echo $sumqtylr; ?></td>
  <td class=xl10113891 width=64 style='border-left:none;width:48pt'><?php echo $sumqtyhr; ?></td>
  <td class=xl10113891 width=92 style='border-left:none;width:69pt'><?php echo $sumtotalqty; ?></td>
  <td class=xl1513891></td>
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
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td height=22 class=xl9213891 width=39 style='height:16.5pt;border-top:none;
  width:29pt'><?php echo $rs+1; ?></td>
  <td class=xl11213891 width=232 style='border-top:none;border-left:none;
  width:174pt'><?php echo $vehiclemodelshow; ?></td>
  <td class=xl11413891 width=50 style='border-top:none;width:38pt'><?php echo $qtyentryshow; ?></td>
  <td class=xl11413891 width=64 style='border-top:none;border-left:none;
  width:48pt'><?php echo $qtykpb1show; ?>&nbsp;</td>
  <td class=xl11413891 width=64 style='border-top:none;border-left:none;
  width:48pt'><?php echo $qtykpb2show; ?>&nbsp;</td>
  <td class=xl11413891 width=64 style='border-top:none;border-left:none;
  width:48pt'><?php echo $qtykpb3show; ?>&nbsp;</td>
  <td class=xl11413891 width=64 style='border-top:none;border-left:none;
  width:48pt'><?php echo $qtykpb4show; ?>&nbsp;</td>
  <td class=xl11413891 width=86 style='border-top:none;border-left:none;
  width:65pt'><?php echo $qtyc2show; ?></td>
  <td class=xl11413891 width=64 style='border-top:none;border-left:none;
  width:48pt'><?php echo $qtycsshow; ?></td>
  <td class=xl11413891 width=60 style='border-top:none;border-left:none;
  width:45pt'><?php echo $qtylsshow; ?></td>
  <td class=xl11413891 width=64 style='border-top:none;border-left:none;
  width:48pt'><?php echo $qtyqrplusshow; ?></td>
  <td class=xl11413891 width=64 style='border-top:none;border-left:none;
  width:48pt'><?php echo $qtylrshow; ?></td>
  <td class=xl11413891 width=64 style='border-top:none;border-left:none;
  width:48pt'><?php echo $qtyhrshow; ?>&nbsp;</td>
  <td class=xl11413891 width=92 style='border-top:none;border-left:none;
  width:69pt'><?php echo $totalqtyshow; ?></td>
  <td class=xl1513891></td>
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
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td colspan=2 height=23 class=xl9313891 width=271 style='height:17.25pt;
  width:203pt'>TOTAL CUB+MATIC+SPORT</td>
  <td class=xl10113891 width=50 style='border-top:none;width:38pt'><?php echo $tsumqtyentry; ?></td>
  <td class=xl10113891 width=64 style='border-top:none;border-left:none;
  width:48pt'><?php echo $tsumqtykpb1; ?></td>
  <td class=xl10113891 width=64 style='border-top:none;border-left:none;
  width:48pt'><?php echo $tsumqtykpb2; ?></td>
  <td class=xl10113891 width=64 style='border-top:none;border-left:none;
  width:48pt'><?php echo $tsumqtykpb3; ?></td>
  <td class=xl10113891 width=79 style='border-top:none;border-left:none;
  width:59pt'><?php echo $tsumqtykpb4; ?></td>
  <td class=xl10113891 width=86 style='border-top:none;border-left:none;
  width:65pt'><?php echo $tsumqtyc2; ?></td>
  <td class=xl10113891 width=64 style='border-top:none;border-left:none;
  width:48pt'><?php echo $tsumqtycs; ?></td>
  <td class=xl10113891 width=60 style='border-top:none;border-left:none;
  width:45pt'><?php echo $tsumqtyls; ?></td>
  <td class=xl10113891 width=64 style='border-top:none;border-left:none;
  width:48pt'><?php echo $tsumqtyqrplus; ?></td>
  <td class=xl10113891 width=64 style='border-top:none;border-left:none;
  width:48pt'><?php echo $tsumqtylr; ?></td>
  <td class=xl10113891 width=64 style='border-top:none;border-left:none;
  width:48pt'><?php echo $tsumqtyhr; ?></td>
  <td class=xl10113891 width=92 style='border-top:none;border-left:none;
  width:69pt'><?php echo $tsumtotalqty; ?></td>
  <td class=xl1513891></td>
 </tr>
   <?php
	$i++;
		}
		} else{
			$core->pesan_warning("Data is empty");
		}
    ?> 
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl6613891 width=39 style='height:15.0pt;width:29pt'>&nbsp;</td>
  <td class=xl6613891 width=232 style='width:174pt'>&nbsp;</td>
  <td class=xl6813891 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl6613891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6613891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6613891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6613891 width=79 style='width:59pt'>&nbsp;</td>
  <td class=xl6613891 width=86 style='width:65pt'>&nbsp;</td>
  <td class=xl6613891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6613891 width=60 style='width:45pt'>&nbsp;</td>
  <td class=xl6613891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6613891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6613891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6613891 width=92 style='width:69pt'>&nbsp;</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=7 height=20 class=xl8713891 width=592 style='height:15.0pt;
  width:444pt'>Keterangan :&nbsp;&nbsp;BODY REPAIR (PRES &amp; PENGECATAN)
  MASUKAN KEDALAM &quot;HR&quot;</td>
  <td class=xl6313891 width=86 style='width:65pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=60 style='width:45pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=92 style='width:69pt'>&nbsp;</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl7113891 width=39 style='height:15.0pt;width:29pt'>&nbsp;</td>
  <td class=xl6313891 width=232 style='width:174pt'>&nbsp;</td>
  <td class=xl6313891 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=79 style='width:59pt'>&nbsp;</td>
  <td class=xl6313891 width=86 style='width:65pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=60 style='width:45pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl6313891 width=92 style='width:69pt'>&nbsp;</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=2 height=20 class=xl7213891 width=271 style='height:15.0pt;
  width:203pt'>&nbsp;</td>
  <td class=xl7213891 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td colspan=2 class=xl7213891 width=165 style='width:124pt'>Diperiksa,</td>
  <td class=xl7213891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=60 style='width:45pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td colspan=3 class=xl7213891 width=220 style='width:165pt'>Mengetahui,</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl7213891 width=39 style='height:15.0pt;width:29pt'>&nbsp;</td>
  <td class=xl7113891 width=232 style='width:174pt'>&nbsp;</td>
  <td class=xl7113891 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=79 style='width:59pt'>&nbsp;</td>
  <td class=xl7113891 width=86 style='width:65pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=60 style='width:45pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=92 style='width:69pt'>&nbsp;</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=2 height=20 class=xl7213891 width=271 style='height:15.0pt;
  width:203pt'>&nbsp;</td>
  <td class=xl7213891 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=79 style='width:59pt'>&nbsp;</td>
  <td class=xl7213891 width=86 style='width:65pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=60 style='width:45pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=92 style='width:69pt'>&nbsp;</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl7313891 width=39 style='height:15.75pt;width:29pt'>&nbsp;</td>
  <td class=xl7413891 width=232 style='width:174pt'>&nbsp;</td>
  <td class=xl7113891 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7413891 width=79 style='width:59pt'>&nbsp;</td>
  <td class=xl7313891 width=86 style='width:65pt'>&nbsp;</td>
  <td class=xl7213891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=60 style='width:45pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td colspan=3 class=xl7313891 width=220 style='width:165pt'>&nbsp;</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=2 height=20 class=xl7213891 width=271 style='height:15.0pt;
  width:203pt'>&nbsp;</td>
  <td class=xl7213891 width=50 style='width:38pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td colspan=2 class=xl8813891 width=165 style='width:124pt'>Kepala Bengkel</td>
  <td class=xl7213891 width=64 style='width:48pt'>&nbsp;</td>
  <td class=xl7113891 width=60 style='width:45pt'>&nbsp;</td>
  <td class=xl7113891 width=64 style='width:48pt'>&nbsp;</td>
  <td colspan=3 class=xl8813891 width=220 style='width:165pt'>Pemilik /
  Pimpinan</td>
  <td class=xl1513891></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=14 height=20 class=xl8913891 width=1086 style='height:15.0pt;
  width:815pt'>&nbsp;</td>
  <td class=xl1513891></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=39 style='width:29pt'></td>
  <td width=232 style='width:174pt'></td>
  <td width=50 style='width:38pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=79 style='width:59pt'></td>
  <td width=86 style='width:65pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=60 style='width:45pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=92 style='width:69pt'></td>
  <td width=64 style='width:48pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>





